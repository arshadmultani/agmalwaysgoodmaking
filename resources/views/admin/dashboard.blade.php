@extends('admin.layout')

@section('title', 'Overview')

@section('content')
<div class="space-y-6 sm:space-y-8">

    <!-- Header Banner -->
    <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-4 bg-slate-900 text-white p-5 sm:p-6 rounded-2xl shadow-sm">
        <div>
            <h1 class="text-xl sm:text-2xl font-black">Welcome, Nasir Multani</h1>
            <p class="text-xs text-slate-400 mt-1">Here is a quick snapshot of your website leads, services, and photo gallery.</p>
        </div>
        <div class="flex flex-col sm:flex-row items-stretch sm:items-center gap-2.5 sm:gap-3 w-full sm:w-auto">
            <a href="{{ route('admin.portfolio.index') }}" class="px-4 py-2.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 text-xs font-black transition-all text-center justify-center flex items-center gap-1.5 shadow-sm active:scale-98">
                <span>+ Upload New Photo</span>
            </a>
            <a href="{{ route('admin.leads.index') }}" class="px-4 py-2.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-white text-xs font-bold transition-all text-center justify-center flex items-center gap-1.5 active:scale-98">
                <span>View Inquiries ({{ $stats['new_leads'] }} New)</span>
            </a>
        </div>
    </div>

    <!-- Stat Metric Cards -->
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-3 sm:gap-6">
        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200 shadow-xs">
            <span class="text-xs font-bold text-slate-500 block">Total Inquiries</span>
            <span class="text-2xl sm:text-3xl font-black text-slate-900 mt-1 block">{{ $stats['total_leads'] }}</span>
            <span class="text-[11px] text-slate-400 mt-1 block line-clamp-1 sm:line-clamp-none">Customer requests</span>
        </div>

        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200 shadow-xs">
            <span class="text-xs font-bold text-amber-600 block">Pending Action</span>
            <span class="text-2xl sm:text-3xl font-black text-amber-600 mt-1 block">{{ $stats['new_leads'] }}</span>
            <span class="text-[11px] text-slate-400 mt-1 block line-clamp-1 sm:line-clamp-none">New leads awaiting contact</span>
        </div>

        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200 shadow-xs">
            <span class="text-xs font-bold text-slate-500 block">Live Portfolio Photos</span>
            <span class="text-2xl sm:text-3xl font-black text-slate-900 mt-1 block">{{ $stats['total_portfolio'] }}</span>
            <span class="text-[11px] text-slate-400 mt-1 block line-clamp-1 sm:line-clamp-none">Uploaded project images</span>
        </div>

        <div class="bg-white p-4 sm:p-5 rounded-2xl border border-slate-200 shadow-xs">
            <span class="text-xs font-bold text-slate-500 block">Active Services</span>
            <span class="text-2xl sm:text-3xl font-black text-slate-900 mt-1 block">{{ $stats['total_services'] }}</span>
            <span class="text-[11px] text-slate-400 mt-1 block line-clamp-1 sm:line-clamp-none">Catalog offerings with rates</span>
        </div>
    </div>

    <!-- Quick Actions Grid -->
    <div class="grid grid-cols-1 lg:grid-cols-12 gap-6 sm:gap-8">
        
        <!-- Left 6: Quick Photo Upload Form -->
        <div class="lg:col-span-6 bg-white p-5 sm:p-7 rounded-2xl border border-slate-200 shadow-xs">
            <div class="mb-4 pb-3 border-b border-slate-100">
                <h2 class="text-base font-extrabold text-slate-900">⚡ Quick Upload Work Photo</h2>
                <p class="text-xs text-slate-500 mt-0.5">Upload a photo from your phone camera or gallery. Automatically converts to fast WebP.</p>
            </div>

            <form action="{{ route('admin.portfolio.store') }}" method="POST" enctype="multipart/form-data" class="space-y-4">
                @csrf
                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Work Title / Headline *</label>
                    <input type="text" name="title" required placeholder="e.g. Acrylic Kitchen with Breakfast Bar" 
                           class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 gap-3.5">
                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Category *</label>
                        <select name="category" required class="w-full px-3 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none bg-white">
                            @foreach($categories as $cat)
                                <option value="{{ $cat->slug }}">{{ $cat->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div>
                        <label class="block text-xs font-bold text-slate-700 mb-1">Select Image File *</label>
                        <input type="file" name="photo" required accept="image/*"
                               class="w-full text-xs text-slate-600 file:mr-2 file:py-2 file:px-3 file:rounded-lg file:border-0 file:text-xs file:font-bold file:bg-slate-900 file:text-white hover:file:bg-slate-800 cursor-pointer">
                    </div>
                </div>

                <div>
                    <label class="block text-xs font-bold text-slate-700 mb-1">Location / Details Caption</label>
                    <input type="text" name="caption" placeholder="e.g. Executed at Vijay Nagar, Indore. Soft-close drawers & quartz stone." 
                           class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-xs sm:text-sm focus:border-amber-500 outline-none">
                </div>

                <div class="flex flex-col sm:flex-row sm:items-center justify-between gap-3 pt-2">
                    <label class="flex items-center gap-2 text-xs font-semibold text-slate-700 cursor-pointer select-none">
                        <input type="checkbox" name="is_featured" value="1" checked class="rounded border-slate-300 text-amber-500 focus:ring-0 w-4 h-4">
                        <span>Show on Homepage</span>
                    </label>

                    <button type="submit" class="w-full sm:w-auto px-6 py-3 sm:py-2.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-black text-xs transition-all shadow-xs cursor-pointer text-center active:scale-98">
                        Upload & Publish
                    </button>
                </div>
            </form>
        </div>

        <!-- Right 6: Recent Inquiries & Quick Action -->
        <div class="lg:col-span-6 bg-white p-5 sm:p-7 rounded-2xl border border-slate-200 shadow-xs flex flex-col justify-between">
            <div>
                <div class="mb-4 pb-3 border-b border-slate-100 flex items-center justify-between gap-2">
                    <div>
                        <h2 class="text-base font-extrabold text-slate-900">Recent Customer Inquiries</h2>
                        <p class="text-xs text-slate-500 mt-0.5">Direct callback & measurement requests.</p>
                    </div>
                    <a href="{{ route('admin.leads.index') }}" class="text-xs text-amber-600 font-bold hover:underline shrink-0">
                        View All &rarr;
                    </a>
                </div>

                <div class="space-y-3">
                    @forelse($recentLeads as $lead)
                        <div class="p-3.5 sm:p-4 rounded-xl bg-slate-50 border border-slate-100 flex flex-col sm:flex-row sm:items-center justify-between gap-3">
                            <div>
                                <div class="flex items-center gap-2 flex-wrap">
                                    <strong class="text-xs sm:text-sm font-bold text-slate-900">{{ $lead->name }}</strong>
                                    <span class="text-[10px] px-2 py-0.5 rounded-full font-bold {{ $lead->status === 'new' ? 'bg-amber-100 text-amber-800' : 'bg-slate-200 text-slate-600' }}">
                                        {{ strtoupper($lead->status) }}
                                    </span>
                                </div>
                                <span class="text-[11px] text-slate-500 block mt-1">
                                    {{ $lead->service_type ?: 'General Inquiry' }} • {{ $lead->location ?: 'Indore' }}
                                </span>
                            </div>

                            <div class="grid grid-cols-2 sm:flex sm:items-center gap-2 w-full sm:w-auto">
                                <a href="{{ $lead->whatsapp_url }}" target="_blank" rel="noopener" 
                                   class="inline-flex items-center justify-center gap-1.5 px-3 py-2 rounded-lg bg-emerald-600 text-white font-bold text-xs hover:bg-emerald-500 transition-colors shadow-xs active:scale-95">
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.634.072-1.802-.412-1.464-.607-2.42-2.079-2.493-2.176-.073-.098-.592-.787-.592-1.501 0-.714.375-1.066.508-1.213.133-.147.29-.184.387-.184.097 0 .193.001.277.006.088.005.207-.034.323.246.12.289.412 1.004.448 1.077.036.073.06.159.012.256-.048.098-.073.159-.145.244-.073.085-.153.19-.219.255-.073.073-.149.153-.064.298.085.145.378.623.811 1.009.559.497 1.03.651 1.176.724.145.073.23.061.316-.037.085-.098.363-.423.46-.568.097-.145.194-.122.327-.073.133.049.845.399.99.472.145.073.242.109.278.17.036.06.036.353-.108.758z"/></svg>
                                    <span>WhatsApp</span>
                                </a>
                                <a href="tel:{{ $lead->clean_phone }}" 
                                   class="inline-flex items-center justify-center gap-1.5 px-3 py-2 rounded-lg bg-slate-900 text-white font-bold text-xs hover:bg-slate-800 transition-colors active:scale-95">
                                    <svg class="w-3.5 h-3.5 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 4V3z"/></svg>
                                    <span>Call</span>
                                </a>
                            </div>
                        </div>
                    @empty
                        <div class="text-center py-8 text-xs text-slate-400">
                            No inquiries received yet. When visitors fill the quote form, they appear here.
                        </div>
                    @endforelse
                </div>
            </div>

            <div class="mt-4 pt-3 border-t border-slate-100 text-right">
                <a href="{{ route('admin.leads.index') }}" class="text-xs font-semibold text-slate-600 hover:text-slate-900">
                    Open Inquiries Inbox &rarr;
                </a>
            </div>
        </div>

    </div>

    <!-- Recent Uploaded Photos Preview -->
    <div class="bg-white p-5 sm:p-7 rounded-2xl border border-slate-200 shadow-xs">
        <div class="mb-4 flex items-center justify-between gap-2">
            <h2 class="text-base font-extrabold text-slate-900">Recent Portfolio Photos</h2>
            <a href="{{ route('admin.portfolio.index') }}" class="text-xs text-amber-600 font-bold hover:underline shrink-0">
                Manage All Photos &rarr;
            </a>
        </div>

        <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-2.5 sm:gap-3">
            @foreach($recentPortfolio as $photo)
                <div class="group relative rounded-xl overflow-hidden h-28 sm:h-32 bg-slate-100 border border-slate-200">
                    <img src="{{ asset('storage/' . ($photo->thumbnail_path ?: $photo->image_path)) }}" 
                         alt="{{ $photo->title }}" class="w-full h-full object-cover">
                    <div class="absolute inset-0 bg-slate-950/60 opacity-0 group-hover:opacity-100 transition-opacity flex items-center justify-center p-2 text-center text-white text-[11px] font-bold">
                        {{ $photo->title }}
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</div>
@endsection

