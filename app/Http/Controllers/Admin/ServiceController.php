<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Service;
use App\Services\ImageService;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ServiceController extends Controller
{
    public function __construct(
        protected ImageService $imageService
    ) {}

    public function index(): View
    {
        $services = Service::orderBy('sort_order')->get();
        $categories = Category::orderBy('sort_order')->get();

        return view('admin.services.index', compact('services', 'categories'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'exists:categories,slug'],
            'starting_price' => ['nullable', 'string', 'max:50'],
            'price_unit' => ['nullable', 'string', 'max:20'],
            'description' => ['nullable', 'string'],
            'features' => ['nullable', 'string'], // newline separated
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:10240'],
            'is_featured' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $features = [];
        if (! empty($validated['features'])) {
            $features = array_values(array_filter(array_map('trim', explode("\n", $validated['features']))));
        }

        $imagePath = null;
        if ($request->hasFile('image')) {
            $paths = $this->imageService->processAndStore($request->file('image'), 'services');
            $imagePath = $paths['image_path'];
        }

        Service::create([
            'slug' => Str::slug($validated['title']).'-'.rand(100, 999),
            'title' => $validated['title'],
            'category' => $validated['category'],
            'starting_price' => $validated['starting_price'] ?? null,
            'price_unit' => (! empty($validated['price_unit'])) ? $validated['price_unit'] : '/sq ft',
            'description' => $validated['description'] ?? null,
            'features' => $features,
            'image_path' => $imagePath,
            'is_featured' => $request->boolean('is_featured'),
            'sort_order' => (int) ($validated['sort_order'] ?? 0),
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Service created successfully.');
    }

    public function edit(Service $service): View
    {
        $categories = Category::orderBy('sort_order')->get();

        return view('admin.services.edit', compact('service', 'categories'));
    }

    public function update(Request $request, Service $service): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'category' => ['required', 'string', 'exists:categories,slug'],
            'starting_price' => ['nullable', 'string', 'max:50'],
            'price_unit' => ['nullable', 'string', 'max:20'],
            'description' => ['nullable', 'string'],
            'features' => ['nullable', 'string'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,webp', 'max:10240'],
            'is_featured' => ['nullable', 'boolean'],
            'sort_order' => ['nullable', 'integer'],
        ]);

        $features = [];
        if (! empty($validated['features'])) {
            $features = array_values(array_filter(array_map('trim', explode("\n", $validated['features']))));
        }

        $imagePath = $service->image_path;
        if ($request->hasFile('image')) {
            $paths = $this->imageService->processAndStore($request->file('image'), 'services');
            $imagePath = $paths['image_path'];
        }

        $service->update([
            'title' => $validated['title'],
            'category' => $validated['category'],
            'starting_price' => $validated['starting_price'] ?? null,
            'price_unit' => (! empty($validated['price_unit'])) ? $validated['price_unit'] : ($service->price_unit ?? '/sq ft'),
            'description' => $validated['description'] ?? null,
            'features' => $features,
            'image_path' => $imagePath,
            'is_featured' => $request->boolean('is_featured'),
            'sort_order' => (int) ($validated['sort_order'] ?? 0),
        ]);

        return redirect()->route('admin.services.index')->with('success', 'Service updated successfully.');
    }

    public function destroy(Service $service): RedirectResponse
    {
        $service->delete();

        return redirect()->route('admin.services.index')->with('success', 'Service deleted successfully.');
    }
}
