@extends('admin.layout')

@section('title', 'Edit Service: ' . $service->title)

@section('content')
<div class="max-w-2xl mx-auto bg-white p-5 sm:p-8 rounded-2xl border border-slate-200 shadow-xs">
    
    <div class="mb-5 pb-3 border-b border-slate-100 flex items-center justify-between gap-2">
        <div>
            <h1 class="text-lg font-black text-slate-900">Edit Service</h1>
            <p class="text-xs text-slate-500 mt-0.5">{{ $service->title }}</p>
        </div>
        <a href="{{ route('admin.services.index') }}" class="text-xs font-bold text-slate-500 hover:text-slate-800 shrink-0">
            &larr; Back
        </a>
    </div>

    <form action="{{ route('admin.services.update', $service) }}" method="POST" enctype="multipart/form-data" class="space-y-4">
        @csrf
        @method('PUT')

        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Service Title *</label>
            <input type="text" name="title" value="{{ old('title', $service->title) }}" required 
                   class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
        </div>

        <div class="grid grid-cols-1 sm:grid-cols-3 gap-3.5">
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Category *</label>
                <select name="category" required class="w-full px-3 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none bg-white">
                    <option value="modular_kitchen" {{ $service->category === 'modular_kitchen' ? 'selected' : '' }}>Modular Kitchen</option>
                    <option value="wardrobe" {{ $service->category === 'wardrobe' ? 'selected' : '' }}>Wardrobe</option>
                    <option value="glazing" {{ $service->category === 'glazing' ? 'selected' : '' }}>Aluminium Glazing</option>
                    <option value="ceiling" {{ $service->category === 'ceiling' ? 'selected' : '' }}>False Ceiling</option>
                    <option value="interior" {{ $service->category === 'interior' ? 'selected' : '' }}>Turnkey Interior</option>
                </select>
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Starting Price (₹)</label>
                <input type="text" name="starting_price" value="{{ old('starting_price', $service->starting_price) }}" 
                       class="w-full px-3 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
            </div>
            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Price Unit</label>
                <select name="price_unit" class="w-full px-3 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none bg-white">
                    <option value="/sq ft" {{ ($service->price_unit ?? '/sq ft') === '/sq ft' ? 'selected' : '' }}>/sq ft</option>
                    <option value="/running ft" {{ ($service->price_unit ?? '') === '/running ft' ? 'selected' : '' }}>/running ft</option>
                    <option value="/unit" {{ ($service->price_unit ?? '') === '/unit' ? 'selected' : '' }}>/unit</option>
                    <option value=" onward" {{ ($service->price_unit ?? '') === ' onward' ? 'selected' : '' }}>onward</option>
                </select>
            </div>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Change Cover Image</label>
            @if($service->image_path)
                <div class="mb-2">
                    <img src="{{ asset('storage/' . $service->image_path) }}" alt="{{ $service->title }}" class="h-20 w-32 object-cover rounded-lg border border-slate-200">
                </div>
            @endif
            <input type="file" name="image" accept="image/*" 
                   class="w-full text-xs text-slate-600 file:mr-2 file:py-1.5 file:px-2.5 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-slate-900 file:text-white cursor-pointer">
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Description</label>
            <textarea name="description" rows="3" 
                      class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">{{ old('description', $service->description) }}</textarea>
        </div>

        <div>
            <label class="block text-xs font-bold text-slate-700 mb-1">Key Features (One feature per line)</label>
            <textarea name="features" rows="4" 
                      class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">{{ old('features', implode("\n", $service->features ?? [])) }}</textarea>
        </div>

        <div class="flex flex-col-reverse sm:flex-row sm:items-center sm:justify-end gap-2.5 pt-4 border-t border-slate-100">
            <a href="{{ route('admin.services.index') }}" class="w-full sm:w-auto px-4 py-2.5 rounded-lg border border-slate-300 text-xs font-bold text-slate-700 text-center">
                Cancel
            </a>
            <button type="submit" class="w-full sm:w-auto px-5 py-2.5 rounded-lg bg-amber-500 hover:bg-amber-400 text-slate-950 font-black text-xs transition-all shadow-xs cursor-pointer text-center active:scale-98">
                Save Changes
            </button>
        </div>
    </form>

</div>
@endsection
