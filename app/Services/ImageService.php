<?php

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Str;

class ImageService
{
    /**
     * Process an uploaded image: optimize, resize, convert to WebP if supported, and generate thumbnail.
     *
     * @return array{image_path: string, thumbnail_path: string}
     */
    public function processAndStore(UploadedFile $file, string $folder = 'portfolio'): array
    {
        $storageDir = storage_path('app/public/'.$folder);
        $thumbDir = storage_path('app/public/'.$folder.'/thumbnails');

        if (! is_dir($storageDir)) {
            mkdir($storageDir, 0755, true);
        }
        if (! is_dir($thumbDir)) {
            mkdir($thumbDir, 0755, true);
        }

        $baseName = Str::random(24);
        $useWebp = function_exists('imagecreatefromwebp') && function_exists('imagewebp');
        $ext = $useWebp ? 'webp' : 'jpg';

        $imageRelPath = $folder.'/'.$baseName.'.'.$ext;
        $thumbRelPath = $folder.'/thumbnails/'.$baseName.'.'.$ext;

        $targetFullPath = storage_path('app/public/'.$imageRelPath);
        $thumbFullPath = storage_path('app/public/'.$thumbRelPath);

        // Load image using GD
        $source = null;
        $mime = $file->getMimeType();

        switch ($mime) {
            case 'image/jpeg':
            case 'image/jpg':
                $source = @imagecreatefromjpeg($file->getRealPath());
                break;
            case 'image/png':
                $source = @imagecreatefrompng($file->getRealPath());
                break;
            case 'image/webp':
                $source = @imagecreatefromwebp($file->getRealPath());
                break;
            default:
                // Fallback: standard Laravel store
                $path = $file->store($folder, 'public');

                return [
                    'image_path' => $path,
                    'thumbnail_path' => $path,
                ];
        }

        if (! $source) {
            $path = $file->store($folder, 'public');

            return [
                'image_path' => $path,
                'thumbnail_path' => $path,
            ];
        }

        $origWidth = imagesx($source);
        $origHeight = imagesy($source);

        // 1. Process Main Image (Max width 1600px)
        $mainWidth = min(1600, $origWidth);
        $mainHeight = (int) round($origHeight * ($mainWidth / $origWidth));

        $mainCanvas = imagecreatetruecolor($mainWidth, $mainHeight);
        imagealphablending($mainCanvas, false);
        imagesavealpha($mainCanvas, true);
        imagecopyresampled($mainCanvas, $source, 0, 0, 0, 0, $mainWidth, $mainHeight, $origWidth, $origHeight);

        if ($useWebp) {
            imagewebp($mainCanvas, $targetFullPath, 82);
        } else {
            imagejpeg($mainCanvas, $targetFullPath, 85);
        }
        imagedestroy($mainCanvas);

        // 2. Process Thumbnail (Max width 450px)
        $thumbWidth = min(450, $origWidth);
        $thumbHeight = (int) round($origHeight * ($thumbWidth / $origWidth));

        $thumbCanvas = imagecreatetruecolor($thumbWidth, $thumbHeight);
        imagealphablending($thumbCanvas, false);
        imagesavealpha($thumbCanvas, true);
        imagecopyresampled($thumbCanvas, $source, 0, 0, 0, 0, $thumbWidth, $thumbHeight, $origWidth, $origHeight);

        if ($useWebp) {
            imagewebp($thumbCanvas, $thumbFullPath, 80);
        } else {
            imagejpeg($thumbCanvas, $thumbFullPath, 82);
        }
        imagedestroy($thumbCanvas);
        imagedestroy($source);

        return [
            'image_path' => $imageRelPath,
            'thumbnail_path' => $thumbRelPath,
        ];
    }
}
