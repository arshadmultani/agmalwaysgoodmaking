@extends('admin.layout')

@section('title', 'Manage Work Photos')

@section('content')
<div class="space-y-8">
    
    <!-- Upload Section -->
    <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200 shadow-xs">
        <h2 class="text-base font-extrabold text-slate-900 mb-1">Upload New Work Photo</h2>
        <p class="text-xs text-slate-500 mb-5">Select a photo from site work or finished installation. Automatically optimized to high-speed WebP format.</p>

        <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data" class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 items-end">
            @csrf

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Title *</label>
                <input type="text" name="title" required placeholder="e.g. Italian Modular Kitchen" 
                       class="w-full px-3 py-2 rounded-lg border border-slate-300 text-xs focus:border-amber-500 outline-none">
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Category *</label>
                <select name="category" required class="w-full px-3 py-2 rounded-lg border border-slate-300 text-xs focus:border-amber-500 outline-none bg-white">
                    @foreach($categories as $cat)
                        <option value="{{ $cat->slug }}">{{ $cat->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label class="block text-xs font-bold text-slate-700 mb-1">Photo File *</label>
                <input type="file" name="photo" required accept="image/*" 
                       class="w-full text-xs text-slate-500 file:mr-2 file:py-1.5 file:px-2.5 file:rounded-md file:border-0 file:text-xs file:font-semibold file:bg-slate-900 file:text-white cursor-pointer">
            </div>

            <div>
                <button type="submit" class="w-full py-2.5 rounded-lg bg-amber-500 hover:bg-amber-400 text-slate-950 font-black text-xs transition-all shadow-xs cursor-pointer">
                    Upload & Save
                </button>
            </div>
        </form>
    </div>

    <!-- Photos Grid Header & Filter -->
    <div class="bg-white p-6 sm:p-7 rounded-2xl border border-slate-200 shadow-xs space-y-6">
        
        <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 border-b border-slate-100 pb-4">
            <div>
                <h3 class="text-base font-extrabold text-slate-900">All Published Photos ({{ $items->total() }})</h3>
                <p class="text-xs text-slate-500 mt-0.5">Live images visible on your website's portfolio and project gallery.</p>
            </div>

            <div class="flex items-center gap-1.5 overflow-x-auto pb-1 -mx-1 px-1 sm:overflow-visible sm:pb-0 text-xs shrink-0">
                <a href="{{ route('admin.portfolio.index') }}" 
                   class="px-3 py-1.5 rounded-lg whitespace-nowrap {{ !request('category') ? 'bg-slate-900 text-white font-bold' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                    All
                </a>
                @foreach($categories as $cat)
                    <a href="{{ route('admin.portfolio.index', ['category' => $cat->slug]) }}" 
                       class="px-3 py-1.5 rounded-lg whitespace-nowrap {{ request('category') === $cat->slug ? 'bg-slate-900 text-white font-bold' : 'bg-slate-100 text-slate-700 hover:bg-slate-200' }}">
                        {{ $cat->name }}
                    </a>
                @endforeach
            </div>
        </div>

        <!-- Grid of Photos -->
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-5">
            @forelse($items as $item)
                <div class="rounded-xl overflow-hidden border border-slate-200 bg-slate-50 flex flex-col justify-between group">
                    <div class="relative h-48 bg-slate-200 overflow-hidden">
                        <img src="{{ asset('storage/' . ($item->thumbnail_path ?: $item->image_path)) }}" 
                             alt="{{ $item->title }}" class="w-full h-full object-cover">
                        <span class="absolute top-2 left-2 px-2 py-0.5 rounded bg-slate-900/80 text-white text-[10px] font-bold uppercase tracking-wider backdrop-blur-xs">
                            {{ $item->category }}
                        </span>
                    </div>

                    <div class="p-3.5 flex-1 flex flex-col justify-between">
                        <div>
                            <h4 class="text-xs font-bold text-slate-900 line-clamp-1">{{ $item->title }}</h4>
                            @if($item->caption)
                                <p class="text-[11px] text-slate-500 mt-1 line-clamp-2">{{ $item->caption }}</p>
                            @endif
                        </div>

                        <div class="mt-3 pt-2 border-t border-slate-200 flex items-center justify-between">
                            <span class="text-[10px] text-slate-400">{{ $item->created_at->format('d M Y') }}</span>

                            <form action="{{ route('admin.portfolio.destroy', $item) }}" method="POST" onsubmit="return confirm('Are you sure you want to remove this photo?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="text-xs font-bold text-red-600 hover:text-red-700 hover:underline cursor-pointer">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-span-full text-center py-12 text-xs text-slate-400">
                    No photos found in this category. Upload one above!
                </div>
            @endforelse
        </div>

        <!-- Pagination -->
        @if($items->hasPages())
            <div class="pt-4 border-t border-slate-100">
                {{ $items->links() }}
            </div>
        @endif

    </div>

</div>
@endsection
