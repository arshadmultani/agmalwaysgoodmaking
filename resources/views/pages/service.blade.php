@extends('layouts.app')

@section('title', $service->title . ' in Indore | AGM Always Good Making')
@section('meta_description', $service->title . ' starting from ' . $service->formatted_price . ' by AGM Always Good Making in Indore. Factory direct precision by Nasir Multani: 9977350503.')

@section('content')
<div class="py-12 bg-slate-50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6">
        
        <!-- Breadcrumbs -->
        <nav class="flex items-center gap-2 text-xs text-slate-500 mb-6">
            <a href="{{ route('home') }}" class="hover:text-slate-900">Home</a>
            <span>/</span>
            <a href="{{ route('home') }}#services" class="hover:text-slate-900">Services</a>
            <span>/</span>
            <span class="text-slate-800 font-semibold">{{ $service->title }}</span>
        </nav>

        <div class="grid grid-cols-1 lg:grid-cols-12 gap-10">
            
            <!-- Left Main Column -->
            <div class="lg:col-span-8 space-y-8">
                
                <div class="bg-white rounded-2xl overflow-hidden border border-slate-200 shadow-xs p-6 sm:p-8">
                    
                    <div class="flex flex-wrap items-center justify-between gap-4 mb-4">
                        <span class="px-3 py-1 rounded-full bg-slate-900 text-white font-bold text-xs">
                            {{ strtoupper(str_replace('_', ' ', $service->category)) }}
                        </span>
                        
                        @if($service->starting_price)
                            <div class="text-right">
                                <span class="text-xs text-slate-500 block">Factory Rate</span>
                                <span class="text-2xl font-black text-amber-600">{{ $service->formatted_price }}</span>
                            </div>
                        @endif
                    </div>

                    <h1 class="text-2xl sm:text-3xl font-black text-slate-900 tracking-tight">
                        {{ $service->title }} in Indore
                    </h1>

                    @if($service->image_path)
                        <div class="mt-6 rounded-xl overflow-hidden bg-slate-100 max-h-96">
                            <img src="{{ asset('storage/' . $service->image_path) }}" 
                                 alt="{{ $service->title }}" 
                                 class="w-full h-full object-cover">
                        </div>
                    @endif

                    <div class="mt-8 prose prose-slate max-w-none text-sm text-slate-700 leading-relaxed">
                        <p>{{ $service->description }}</p>
                    </div>

                    @if(!empty($service->features))
                        <div class="mt-8 pt-6 border-t border-slate-200">
                            <h3 class="text-base font-bold text-slate-900 mb-4">Specifications & Materials Used:</h3>
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                @foreach($service->features as $feature)
                                    <div class="flex items-start gap-2.5 text-xs text-slate-700 bg-slate-50 p-3 rounded-lg border border-slate-100">
                                        <svg class="w-4 h-4 text-emerald-500 shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                        <span>{{ $feature }}</span>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

                    <!-- Direct Contact Buttons -->
                    <div class="mt-8 pt-6 border-t border-slate-200 flex flex-wrap gap-4 items-center">
                        <a href="https://wa.me/919977350503?text={{ rawurlencode('Hello Nasir ji, I am viewing ' . $service->title . ' on AGM website. Please send me pricing and catalogue.') }}" 
                           target="_blank" 
                           rel="noopener"
                           class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs tracking-wide shadow-md transition-colors">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.634.072-1.802-.412-1.464-.607-2.42-2.079-2.493-2.176-.073-.098-.592-.787-.592-1.501 0-.714.375-1.066.508-1.213.133-.147.29-.184.387-.184.097 0 .193.001.277.006.088.005.207-.034.323.246.12.289.412 1.004.448 1.077.036.073.06.159.012.256-.048.098-.073.159-.145.244-.073.085-.153.19-.219.255-.073.073-.149.153-.064.298.085.145.378.623.811 1.009.559.497 1.03.651 1.176.724.145.073.23.061.316-.037.085-.098.363-.423.46-.568.097-.145.194-.122.327-.073.133.049.845.399.99.472.145.073.242.109.278.17.036.06.036.353-.108.758z"/></svg>
                            Inquire via WhatsApp
                        </a>

                        <a href="tel:9977350503" 
                           class="inline-flex items-center gap-2 px-5 py-3 rounded-xl bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs tracking-wide transition-colors">
                            Call Nasir Multani: 9977350503
                        </a>
                    </div>

                </div>

                <!-- Related Work Gallery -->
                @if($relatedPortfolio->isNotEmpty())
                    <div class="bg-white rounded-2xl p-6 sm:p-8 border border-slate-200">
                        <h3 class="text-lg font-bold text-slate-900 mb-4">Related Work Projects</h3>
                        <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                            @foreach($relatedPortfolio as $item)
                                <div class="rounded-lg overflow-hidden h-36 bg-slate-100 border border-slate-200">
                                    <img src="{{ asset('storage/' . $item->image_path) }}" alt="{{ $item->title }}" class="w-full h-full object-cover">
                                </div>
                            @endforeach
                        </div>
                    </div>
                @endif

            </div>

            <!-- Right Sidebar Column: Lead Capture & Other Services -->
            <div class="lg:col-span-4 space-y-6">
                
                <!-- Sticky Callback Box -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200 shadow-xs">
                    <span class="text-[11px] font-bold text-amber-600 uppercase tracking-wider block">Direct Booking</span>
                    <h3 class="text-base font-extrabold text-slate-900 mt-1">Book Free Measurement</h3>
                    <p class="text-xs text-slate-500 mt-1">Nasir Multani will personally visit your site in Indore.</p>

                    <form action="{{ route('leads.store') }}" method="POST" class="mt-4 space-y-3">
                        @csrf
                        <input type="hidden" name="service_type" value="{{ $service->title }}">
                        
                        <div>
                            <input type="text" name="name" required placeholder="Your Name" 
                                   class="w-full px-3 py-2 rounded-lg border border-slate-300 text-xs focus:border-amber-500 outline-none">
                        </div>

                        <div>
                            <input type="tel" name="phone" required placeholder="10-digit Phone" pattern="[0-9]{10}"
                                   class="w-full px-3 py-2 rounded-lg border border-slate-300 text-xs focus:border-amber-500 outline-none">
                        </div>

                        <div>
                            <input type="text" name="location" placeholder="Location in Indore" 
                                   class="w-full px-3 py-2 rounded-lg border border-slate-300 text-xs focus:border-amber-500 outline-none">
                        </div>

                        <button type="submit" class="w-full py-2.5 rounded-lg bg-amber-500 hover:bg-amber-400 text-slate-950 font-bold text-xs tracking-wide transition-all shadow-xs cursor-pointer">
                            Request Free Visit
                        </button>
                    </form>
                </div>

                <!-- Other Services List -->
                <div class="bg-white rounded-2xl p-6 border border-slate-200">
                    <h4 class="text-xs font-bold text-slate-900 uppercase tracking-wider mb-3">Other Services</h4>
                    <ul class="divide-y divide-slate-100 text-xs">
                        @foreach($otherServices as $other)
                            <li class="py-2.5 flex items-center justify-between">
                                <a href="{{ route('service.show', $other->slug) }}" class="font-semibold text-slate-800 hover:text-amber-600 transition-colors">
                                    {{ $other->title }}
                                </a>
                                @if($other->starting_price)
                                    <span class="text-slate-400 font-medium">{{ $other->formatted_price }}</span>
                                @endif
                            </li>
                        @endforeach
                    </ul>
                </div>

            </div>

        </div>

    </div>
</div>
@endsection
