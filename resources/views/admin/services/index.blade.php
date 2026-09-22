@extends('admin.layout')

@section('title', 'Manage Services & Rates')

@section('content')
<div class="space-y-8" x-data="{ addServiceModal: false }">

    <!-- Header & Add Button -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-5 sm:p-6 rounded-2xl border border-slate-200 shadow-xs">
        <div>
            <h1 class="text-xl font-extrabold text-slate-900">Services & Pricing Catalog</h1>
            <p class="text-xs text-slate-500 mt-0.5">Manage service offerings, specifications, and starting rates displayed on the website.</p>
        </div>
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2.5">
            <a href="{{ route('admin.categories.index') }}" class="px-4 py-2.5 rounded-xl border border-slate-200 hover:bg-slate-50 text-slate-700 font-bold text-xs transition-all text-center">
                🏷️ Manage Categories
            </a>
            <button @click="addServiceModal = true" class="w-full sm:w-auto px-5 py-3 sm:py-2.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-black text-xs transition-all shadow-xs cursor-pointer text-center active:scale-98">
                + Add New Service
            </button>
        </div>
    </div>

    <!-- Mobile View: Service Cards (Visible on screens < 768px) -->
    <div class="md:hidden space-y-3.5">
        @foreach($services as $service)
            <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-xs space-y-3">
                <div class="flex items-start gap-3">
                    @if($service->image_path)
                        <img src="{{ asset('storage/' . $service->image_path) }}" alt="{{ $service->title }}" class="w-14 h-14 rounded-xl object-cover bg-slate-100 border border-slate-200 shrink-0">
                    @else
                        <div class="w-14 h-14 rounded-xl bg-slate-100 border border-slate-200 flex items-center justify-center text-slate-400 font-bold text-xs shrink-0">
                            AGM
                        </div>
                    @endif
                    <div class="flex-1 min-w-0">
                        <div class="flex items-center gap-1.5 flex-wrap">
                            <span class="px-2 py-0.5 rounded bg-slate-100 font-bold text-[10px] text-slate-700 uppercase">
                                {{ str_replace('_', ' ', $service->category) }}
                            </span>
                            <span class="text-xs font-black text-amber-600 ml-auto">
                                {{ $service->formatted_price }}
                            </span>
                        </div>
                        <strong class="text-sm font-extrabold text-slate-900 block mt-1 line-clamp-1">{{ $service->title }}</strong>
                        <span class="text-[11px] text-slate-400 block">{{ count($service->features ?? []) }} specs listed</span>
                    </div>
                </div>

                <div class="flex items-center justify-end gap-2 pt-2 border-t border-slate-100">
                    <a href="{{ route('admin.services.edit', $service) }}" class="flex-1 text-center py-2 px-3 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-bold transition-colors">
                        Edit Service
                    </a>
                    <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline" onsubmit="return confirm('Delete this service?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="py-2 px-3 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 text-xs font-bold transition-colors cursor-pointer">
                            Delete
                        </button>
                    </form>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Desktop View: Services Table (Visible on screens >= 768px) -->
    <div class="hidden md:block bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-700">
                <thead class="bg-slate-50 text-slate-800 font-bold uppercase border-b border-slate-200">
                    <tr>
                        <th class="p-4">Service</th>
                        <th class="p-4">Category</th>
                        <th class="p-4">Starting Rate</th>
                        <th class="p-4">Key Features</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @foreach($services as $service)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="p-4">
                                <div class="flex items-center gap-3">
                                    @if($service->image_path)
                                        <img src="{{ asset('storage/' . $service->image_path) }}" alt="{{ $service->title }}" class="w-10 h-10 rounded-lg object-cover bg-slate-100 border border-slate-200">
                                    @endif
                                    <div>
                                        <strong class="text-sm font-bold text-slate-900 block">{{ $service->title }}</strong>
                                        <span class="text-[11px] text-slate-400">/services/{{ $service->slug }}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="p-4">
                                <span class="px-2.5 py-1 rounded bg-slate-100 font-bold text-[10px] text-slate-700 uppercase">
                                    {{ str_replace('_', ' ', $service->category) }}
                                </span>
                            </td>
                            <td class="p-4 font-black text-amber-600 text-sm">
                                {{ $service->formatted_price }}
                            </td>
                            <td class="p-4 text-slate-500">
                                {{ count($service->features ?? []) }} specs listed
                            </td>
                            <td class="p-4 text-right space-x-2">
                                <a href="{{ route('admin.services.edit', $service) }}" class="text-xs font-bold text-slate-700 hover:text-amber-600 hover:underline">
                                    Edit
                                </a>
                                <form action="{{ route('admin.services.destroy', $service) }}" method="POST" class="inline" onsubmit="return confirm('Delete this service?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="text-xs font-bold text-red-600 hover:underline cursor-pointer">
                                        Delete
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Service Modal -->
    <div x-show="addServiceModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-slate-950/70 backdrop-blur-xs" @click="addServiceModal = false"></div>

        <div class="flex min-h-full items-center justify-center p-3.5 sm:p-4">
            <div class="w-full max-w-xl bg-white rounded-2xl p-5 sm:p-7 shadow-2xl relative border border-slate-200" @click.away="addServiceModal = false">
                <button @click="addServiceModal = false" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 text-xl font-bold p-1">&times;</button>
                
                <h3 class="text-lg font-black text-slate-900 mb-0.5">Add New Service</h3>
                <p class="text-xs text-slate-500 mb-4">Create a service card for the website catalog.</p>

                <form action="{{ route('admin.services.store') }}" method="POST" enctype="multipart/form-data" class="space-y-3.5">
                    @csrf

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Service Title *</label>
                        <input type="text" name="title" required placeholder="e.g. UV Marble Sheet Panel Service" 
                               class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-3 gap-3">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Category *</label>
                            <select name="category" required class="w-full px-3 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none bg-white">
                                @foreach($categories as $category)
                                    <option value="{{ $category->slug }}">{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Starting Price (₹)</label>
                            <input type="text" name="starting_price" placeholder="e.g. 850" 
                                   class="w-full px-3 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Price Unit</label>
                            <select name="price_unit" class="w-full px-3 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none bg-white">
                                <option value="/sq ft">/sq ft</option>
                                <option value="/running ft">/running ft</option>
                                <option value="/unit">/unit</option>
                                <option value=" onward">onward</option>
                            </select>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Cover Image</label>
                        <input type="file" name="image" accept="image/*" 
                               class="w-full text-xs text-slate-600 file:mr-2 file:py-1.5 file:px-2.5 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-slate-900 file:text-white cursor-pointer">
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Description</label>
                        <textarea name="description" rows="3" placeholder="Brief service details and customer value..." 
                                  class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none"></textarea>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Key Features (One feature per line)</label>
                        <textarea name="features" rows="3" placeholder="10-Year structural warranty&#10;BWP Marine ply core&#10;Soft-close hardware" 
                                  class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none"></textarea>
                    </div>

                    <div class="flex flex-col-reverse sm:flex-row sm:items-center sm:justify-end gap-2.5 pt-2">
                        <button type="button" @click="addServiceModal = false" class="w-full sm:w-auto px-4 py-2.5 rounded-lg border border-slate-300 text-xs font-bold text-slate-700 text-center">
                            Cancel
                        </button>
                        <button type="submit" class="w-full sm:w-auto px-5 py-2.5 rounded-lg bg-amber-500 hover:bg-amber-400 text-slate-950 font-black text-xs transition-all shadow-xs cursor-pointer text-center active:scale-98">
                            Create Service
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
