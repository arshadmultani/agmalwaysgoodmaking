<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\PortfolioItem;
use App\Services\ImageService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PortfolioController extends Controller
{
    public function __construct(
        protected ImageService $imageService
    ) {}

    public function index(Request $request): View
    {
        $query = PortfolioItem::query();

        if ($category = $request->input('category')) {
            $query->where('category', $category);
        }

        $items = $query->orderBy('sort_order')->latest()->paginate(24);
        $categories = Category::orderBy('sort_order')->get();

        return view('admin.portfolio.index', compact('items', 'categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'exists:categories,slug'],
            'photo' => ['required', 'image', 'mimes:jpeg,png,jpg,webp', 'max:15360'], // up to 15MB
            'caption' => ['nullable', 'string', 'max:500'],
            'is_featured' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $storedPaths = $this->imageService->processAndStore($request->file('photo'), 'portfolio');

        PortfolioItem::create([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'image_path' => $storedPaths['image_path'],
            'thumbnail_path' => $storedPaths['thumbnail_path'],
            'caption' => $validated['caption'] ?? null,
            'is_featured' => $request->boolean('is_featured'),
            'sort_order' => (int) ($validated['sort_order'] ?? 0),
        ]);

        return redirect()->back()->with('success', 'Photo uploaded and optimized successfully!');
    }

    public function destroy(PortfolioItem $portfolioItem): RedirectResponse
    {
        if ($portfolioItem->image_path) {
            Storage::disk('public')->delete($portfolioItem->image_path);
        }
        if ($portfolioItem->thumbnail_path) {
            Storage::disk('public')->delete($portfolioItem->thumbnail_path);
        }

        $portfolioItem->delete();

        return redirect()->back()->with('success', 'Photo removed successfully.');
    }
}
