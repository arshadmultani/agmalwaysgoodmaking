@extends('admin.layout')

@section('title', 'Manage Service Categories')

@section('content')
<div class="space-y-6 sm:space-y-8" x-data="{ 
    addModal: false, 
    editModal: false, 
    editItem: { id: null, name: '', slug: '', description: '', sort_order: 0, url: '' },
    openEdit(item, url) {
        this.editItem = { ...item, url: url };
        this.editModal = true;
    }
}">

    <!-- Page Header & Add Action -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-white p-5 sm:p-6 rounded-2xl border border-slate-200 shadow-xs">
        <div>
            <div class="flex items-center gap-2">
                <h1 class="text-xl font-extrabold text-slate-900">Service Categories</h1>
                <span class="px-2.5 py-0.5 rounded-full bg-amber-100 text-amber-900 font-bold text-xs">
                    {{ count($categories) }}
                </span>
            </div>
            <p class="text-xs text-slate-500 mt-1">Manage categories for your services, portfolio photos, and homepage filter tabs.</p>
        </div>
        <div class="flex items-center gap-2.5">
            <a href="{{ route('admin.services.index') }}" class="px-3.5 py-2.5 rounded-xl border border-slate-200 hover:bg-slate-50 text-slate-700 font-bold text-xs transition-all">
                &larr; Services Catalog
            </a>
            <button @click="addModal = true" class="flex-1 sm:flex-none px-4 py-2.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-black text-xs transition-all shadow-xs cursor-pointer text-center active:scale-98">
                + Add Category
            </button>
        </div>
    </div>

    @if($errors->has('category_error'))
        <div class="p-4 rounded-xl bg-red-50 border border-red-200 text-red-900 text-xs font-bold shadow-xs flex items-start gap-2.5">
            <svg class="w-4 h-4 text-red-600 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/></svg>
            <div>{{ $errors->first('category_error') }}</div>
        </div>
    @endif

    <!-- Mobile View: Category Cards (Visible < 768px) -->
    <div class="md:hidden space-y-3.5">
        @forelse($categories as $cat)
            <div class="bg-white p-4 rounded-2xl border border-slate-200 shadow-xs space-y-3">
                <div class="flex items-start justify-between gap-2">
                    <div>
                        <div class="flex items-center gap-2 flex-wrap">
                            <strong class="text-sm font-extrabold text-slate-900">{{ $cat->name }}</strong>
                            <span class="px-2 py-0.5 rounded bg-slate-100 font-mono text-[10px] text-slate-600 font-semibold">
                                {{ $cat->slug }}
                            </span>
                        </div>
                        @if($cat->description)
                            <p class="text-xs text-slate-500 mt-1 line-clamp-2">{{ $cat->description }}</p>
                        @endif
                    </div>
                    <span class="text-[10px] px-2 py-0.5 rounded bg-slate-100 text-slate-500 font-bold shrink-0">
                        Order #{{ $cat->sort_order }}
                    </span>
                </div>

                <div class="flex items-center gap-3 text-xs text-slate-500 pt-1">
                    <span class="inline-flex items-center gap-1">
                        <strong class="text-slate-800 font-bold">{{ $cat->services_count }}</strong> services
                    </span>
                    <span>•</span>
                    <span class="inline-flex items-center gap-1">
                        <strong class="text-slate-800 font-bold">{{ $cat->portfolio_items_count }}</strong> photos
                    </span>
                </div>

                <div class="flex items-center justify-end gap-2 pt-2 border-t border-slate-100">
                    <button type="button" 
                            @click="openEdit({{ Js::from($cat) }}, '{{ route('admin.categories.update', $cat) }}')"
                            class="flex-1 text-center py-2 px-3 rounded-lg bg-slate-100 hover:bg-slate-200 text-slate-800 text-xs font-bold transition-colors cursor-pointer">
                        Edit
                    </button>
                    @if($cat->services_count === 0 && $cat->portfolio_items_count === 0)
                        <form action="{{ route('admin.categories.destroy', $cat) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete category \'{{ $cat->name }}\'?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="py-2 px-3 rounded-lg bg-red-50 hover:bg-red-100 text-red-600 text-xs font-bold transition-colors cursor-pointer">
                                Delete
                            </button>
                        </form>
                    @else
                        <span class="py-2 px-3 rounded-lg bg-slate-50 text-slate-400 text-xs font-medium cursor-not-allowed" title="Cannot delete category while it has linked services or photos">
                            In Use
                        </span>
                    @endif
                </div>
            </div>
        @empty
            <div class="bg-white p-8 rounded-2xl border border-slate-200 text-center text-xs text-slate-400">
                No categories found. Click "+ Add Category" to create your first category.
            </div>
        @endforelse
    </div>

    <!-- Desktop View: Categories Table (Visible >= 768px) -->
    <div class="hidden md:block bg-white rounded-2xl border border-slate-200 shadow-xs overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left text-xs text-slate-700">
                <thead class="bg-slate-50 text-slate-800 font-bold uppercase border-b border-slate-200">
                    <tr>
                        <th class="p-4 w-16 text-center">Order</th>
                        <th class="p-4">Category Name</th>
                        <th class="p-4">Slug Identifier</th>
                        <th class="p-4">Description</th>
                        <th class="p-4 text-center">Services</th>
                        <th class="p-4 text-center">Photos</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100">
                    @forelse($categories as $cat)
                        <tr class="hover:bg-slate-50/50 transition-colors">
                            <td class="p-4 text-center font-bold text-slate-500">
                                {{ $cat->sort_order }}
                            </td>
                            <td class="p-4">
                                <strong class="text-sm font-extrabold text-slate-900">{{ $cat->name }}</strong>
                            </td>
                            <td class="p-4 font-mono text-[11px] text-slate-600">
                                <span class="px-2 py-0.5 rounded bg-slate-100 font-semibold">
                                    {{ $cat->slug }}
                                </span>
                            </td>
                            <td class="p-4 text-slate-500 max-w-xs truncate">
                                {{ $cat->description ?: '—' }}
                            </td>
                            <td class="p-4 text-center">
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-bold {{ $cat->services_count > 0 ? 'bg-amber-50 text-amber-700 border border-amber-200' : 'bg-slate-100 text-slate-500' }}">
                                    {{ $cat->services_count }}
                                </span>
                            </td>
                            <td class="p-4 text-center">
                                <span class="px-2.5 py-1 rounded-full text-[11px] font-bold {{ $cat->portfolio_items_count > 0 ? 'bg-blue-50 text-blue-700 border border-blue-200' : 'bg-slate-100 text-slate-500' }}">
                                    {{ $cat->portfolio_items_count }}
                                </span>
                            </td>
                            <td class="p-4 text-right space-x-2">
                                <button type="button" 
                                        @click="openEdit({{ Js::from($cat) }}, '{{ route('admin.categories.update', $cat) }}')"
                                        class="text-xs font-bold text-slate-700 hover:text-amber-600 hover:underline cursor-pointer">
                                    Edit
                                </button>
                                @if($cat->services_count === 0 && $cat->portfolio_items_count === 0)
                                    <form action="{{ route('admin.categories.destroy', $cat) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure you want to delete \'{{ $cat->name }}\'?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="text-xs font-bold text-red-600 hover:underline cursor-pointer">
                                            Delete
                                        </button>
                                    </form>
                                @else
                                    <span class="text-xs text-slate-300 font-medium cursor-not-allowed" title="Linked to services or photos">
                                        In Use
                                    </span>
                                @endif
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="p-8 text-center text-xs text-slate-400">
                                No categories found. Click "+ Add Category" to create your first category.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <!-- Add Category Modal -->
    <div x-show="addModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-slate-950/70 backdrop-blur-xs" @click="addModal = false"></div>
        <div class="flex min-h-full items-center justify-center p-3.5 sm:p-4">
            <div class="w-full max-w-lg bg-white rounded-2xl p-5 sm:p-7 shadow-2xl relative border border-slate-200" @click.away="addModal = false">
                <button @click="addModal = false" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 text-xl font-bold p-1">&times;</button>
                
                <h3 class="text-lg font-black text-slate-900 mb-0.5">Add New Category</h3>
                <p class="text-xs text-slate-500 mb-4">Categories organize your service offerings, portfolio gallery, and homepage filter tabs.</p>

                <form action="{{ route('admin.categories.store') }}" method="POST" class="space-y-4">
                    @csrf

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Category Name *</label>
                        <input type="text" name="name" required placeholder="e.g. Wooden Flooring or TV Units" 
                               class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Slug Identifier (Optional)</label>
                            <input type="text" name="slug" placeholder="e.g. wooden_flooring" 
                                   class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 font-mono text-xs focus:border-amber-500 outline-none">
                            <span class="text-[10px] text-slate-400 mt-1 block">Auto-generated if left empty.</span>
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Sort Order</label>
                            <input type="number" name="sort_order" value="0" min="0" 
                                   class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
                            <span class="text-[10px] text-slate-400 mt-1 block">Lowest numbers appear first.</span>
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Short Description</label>
                        <textarea name="description" rows="2" placeholder="Brief summary of what this category covers..." 
                                  class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none"></textarea>
                    </div>

                    <div class="flex flex-col-reverse sm:flex-row sm:items-center sm:justify-end gap-2.5 pt-2">
                        <button type="button" @click="addModal = false" class="w-full sm:w-auto px-4 py-2.5 rounded-lg border border-slate-300 text-xs font-bold text-slate-700 text-center">
                            Cancel
                        </button>
                        <button type="submit" class="w-full sm:w-auto px-5 py-2.5 rounded-lg bg-amber-500 hover:bg-amber-400 text-slate-950 font-black text-xs transition-all shadow-xs cursor-pointer text-center active:scale-98">
                            Save Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Edit Category Modal -->
    <div x-show="editModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto" role="dialog" aria-modal="true">
        <div class="fixed inset-0 bg-slate-950/70 backdrop-blur-xs" @click="editModal = false"></div>
        <div class="flex min-h-full items-center justify-center p-3.5 sm:p-4">
            <div class="w-full max-w-lg bg-white rounded-2xl p-5 sm:p-7 shadow-2xl relative border border-slate-200" @click.away="editModal = false">
                <button @click="editModal = false" class="absolute top-4 right-4 text-slate-400 hover:text-slate-600 text-xl font-bold p-1">&times;</button>
                
                <h3 class="text-lg font-black text-slate-900 mb-0.5">Edit Category</h3>
                <p class="text-xs text-slate-500 mb-4">Updating the category name or slug will automatically keep all linked services and portfolio items synced.</p>

                <form :action="editItem.url" method="POST" class="space-y-4">
                    @csrf
                    @method('PUT')

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Category Name *</label>
                        <input type="text" name="name" x-model="editItem.name" required 
                               class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
                    </div>

                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Slug Identifier *</label>
                            <input type="text" name="slug" x-model="editItem.slug" required 
                                   class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 font-mono text-xs focus:border-amber-500 outline-none">
                        </div>
                        <div>
                            <label class="block text-xs font-bold text-slate-700 mb-1">Sort Order</label>
                            <input type="number" name="sort_order" x-model="editItem.sort_order" min="0" 
                                   class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Short Description</label>
                        <textarea name="description" x-model="editItem.description" rows="2" 
                                  class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none"></textarea>
                    </div>

                    <div class="flex flex-col-reverse sm:flex-row sm:items-center sm:justify-end gap-2.5 pt-2">
                        <button type="button" @click="editModal = false" class="w-full sm:w-auto px-4 py-2.5 rounded-lg border border-slate-300 text-xs font-bold text-slate-700 text-center">
                            Cancel
                        </button>
                        <button type="submit" class="w-full sm:w-auto px-5 py-2.5 rounded-lg bg-amber-500 hover:bg-amber-400 text-slate-950 font-black text-xs transition-all shadow-xs cursor-pointer text-center active:scale-98">
                            Update Category
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
@endsection
