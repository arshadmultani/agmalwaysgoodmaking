@extends('layouts.app')

@section('title', 'AGM Always Good Making | Modular Kitchens, Wardrobes & Aluminium Glazing Indore')
@section('meta_description', 'AGM Always Good Making - Factory-direct Modular Kitchens (from ₹850/sq ft), Sliding Wardrobes (from ₹900/sq ft), Aluminium Glazing & False Ceilings in Indore. Contact Nasir Multani: 9977350503. GST: 23BQAPM4037J1Z1.')

@section('content')

    <!-- Flash Notifications -->
    @if(session('success'))
        <div class="bg-emerald-600 text-white py-3 px-4 shadow-md sticky top-18 z-30 transition-all" x-data="{ show: true }" x-show="show">
            <div class="max-w-7xl mx-auto flex items-center justify-between gap-3 text-sm font-semibold">
                <div class="flex items-center gap-2">
                    <svg class="w-5 h-5 text-emerald-200" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/></svg>
                    <span>{{ session('success') }}</span>
                    @if(session('whatsapp_redirect'))
                        <a href="{{ session('whatsapp_redirect') }}" target="_blank" rel="noopener" class="underline ml-2 bg-emerald-700 px-2.5 py-1 rounded text-xs font-bold hover:bg-emerald-800">
                            Open in WhatsApp &rarr;
                        </a>
                    @endif
                </div>
                <button @click="show = false" class="text-white hover:text-emerald-200">&times;</button>
            </div>
        </div>
    @endif

    <!-- HERO SECTION -->
    <section class="relative bg-slate-900 text-white overflow-hidden pt-8 pb-16 lg:pt-16 lg:pb-24">
        <!-- Subtle architectural grid background -->
        <div class="absolute inset-0 opacity-10 bg-[linear-gradient(to_right,#808080_1px,transparent_1px),linear-gradient(to_bottom,#808080_1px,transparent_1px)] bg-[size:32px_32px]"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                
                <!-- Left Hero Content -->
                <div class="lg:col-span-7 space-y-6 text-center lg:text-left">
                    
                    <!-- Trust Badges Row -->
                    <div class="flex flex-wrap items-center justify-center lg:justify-start gap-2.5">
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-amber-500/10 text-amber-400 font-bold text-xs border border-amber-500/30">
                            ★ 4.2 Rated on Justdial
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-emerald-500/10 text-emerald-400 font-bold text-xs border border-emerald-500/30">
                            ✓ GST Verified Manufacturer
                        </span>
                        <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full bg-slate-800 text-slate-300 font-medium text-xs border border-slate-700">
                            Indore & MP
                        </span>
                    </div>

                    <!-- Main Headline -->
                    <h1 class="text-3xl sm:text-4xl lg:text-5xl font-black text-white tracking-tight leading-tight">
                        Factory-Direct <span class="text-transparent bg-clip-text bg-gradient-to-r from-amber-400 via-amber-300 to-amber-500">Modular Kitchens</span> & Wardrobes in Indore
                    </h1>

                    <!-- Subtitle -->
                    <p class="text-base sm:text-lg text-slate-300 max-w-2xl mx-auto lg:mx-0 leading-relaxed font-normal">
                        Precision-crafted acrylic kitchens, sliding wardrobes, aluminium glazing & turnkey interiors by <strong class="text-white">Nasir Multani</strong>. Get 100% authentic materials, factory pricing, and free on-site 3D design measurements.
                    </p>

                    <!-- Key Starting Price Pill -->
                    <div class="inline-flex flex-wrap items-center justify-center lg:justify-start gap-4 p-3 rounded-xl bg-slate-800/80 border border-slate-700/80 text-xs">
                        <div>
                            <span class="text-slate-400 block">Modular Kitchens</span>
                            <strong class="text-amber-400 font-extrabold text-sm">from ₹850 / sq ft</strong>
                        </div>
                        <div class="w-px h-8 bg-slate-700 hidden sm:block"></div>
                        <div>
                            <span class="text-slate-400 block">Sliding Wardrobes</span>
                            <strong class="text-amber-400 font-extrabold text-sm">from ₹900 / sq ft</strong>
                        </div>
                        <div class="w-px h-8 bg-slate-700 hidden sm:block"></div>
                        <div>
                            <span class="text-slate-400 block">Aluminium Glazing</span>
                            <strong class="text-amber-400 font-extrabold text-sm">from ₹380 / sq ft</strong>
                        </div>
                    </div>

                    <!-- Hero Call to Action Buttons -->
                    <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-3.5 pt-2">
                        <!-- WhatsApp Direct -->
                        <a href="https://wa.me/919977350503?text={{ rawurlencode('Hello Nasir ji, I want a free quote and site visit for Modular Kitchen / Wardrobe in Indore.') }}" 
                           target="_blank"
                           rel="noopener"
                           class="w-full sm:w-auto inline-flex items-center justify-center gap-2.5 px-6 py-3.5 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-black text-sm tracking-wide transition-all shadow-lg hover:shadow-emerald-600/30 active:scale-98">
                            <svg class="w-5 h-5 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.634.072-1.802-.412-1.464-.607-2.42-2.079-2.493-2.176-.073-.098-.592-.787-.592-1.501 0-.714.375-1.066.508-1.213.133-.147.29-.184.387-.184.097 0 .193.001.277.006.088.005.207-.034.323.246.12.289.412 1.004.448 1.077.036.073.06.159.012.256-.048.098-.073.159-.145.244-.073.085-.153.19-.219.255-.073.073-.149.153-.064.298.085.145.378.623.811 1.009.559.497 1.03.651 1.176.724.145.073.23.061.316-.037.085-.098.363-.423.46-.568.097-.145.194-.122.327-.073.133.049.845.399.99.472.145.073.242.109.278.17.036.06.036.353-.108.758z"/></svg>
                            <span>WhatsApp Nasir Multani</span>
                        </a>

                        <!-- Direct Call -->
                        <a href="tel:9977350503" 
                           class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-6 py-3.5 rounded-xl bg-slate-800 hover:bg-slate-700 text-white font-bold text-sm border border-slate-700 transition-all">
                            <svg class="w-4 h-4 text-amber-400" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 4V3z"/></svg>
                            <span>Call 9977350503</span>
                        </a>

                        <!-- Book Visit Modal Trigger -->
                        <button @click="quoteModal = true"
                                type="button"
                                class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-3.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-black text-sm transition-all shadow-md cursor-pointer">
                            Book Free Site Visit
                        </button>
                    </div>

                    <!-- Trust Checklist -->
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3 pt-4 text-xs text-slate-400 border-t border-slate-800">
                        <div class="flex items-center gap-2 justify-center lg:justify-start">
                            <span class="text-amber-400">✓</span> 100% BWP Marine Ply
                        </div>
                        <div class="flex items-center gap-2 justify-center lg:justify-start">
                            <span class="text-amber-400">✓</span> Soft-Close Fittings
                        </div>
                        <div class="flex items-center gap-2 justify-center lg:justify-start">
                            <span class="text-amber-400">✓</span> 10-Yr Warranty
                        </div>
                        <div class="flex items-center gap-2 justify-center lg:justify-start">
                            <span class="text-amber-400">✓</span> On-Time Handover
                        </div>
                    </div>

                </div>

                <!-- Right Hero Visual Card -->
                <div class="lg:col-span-5 relative">
                    <div class="relative mx-auto max-w-md rounded-2xl overflow-hidden shadow-2xl border border-slate-700 bg-slate-800 group">
                        <img src="{{ asset('storage/portfolio/acrylic-kitchen.jpg') }}" 
                             alt="Acrylic Modular Kitchen by AGM Always Good Making Indore" 
                             class="w-full h-80 sm:h-96 object-cover transition-transform duration-500 group-hover:scale-105"
                             width="500" 
                             height="500" 
                             fetchpriority="high"
                             loading="eager">
                        
                        <!-- Overlay Tag -->
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950 via-slate-950/20 to-transparent"></div>

                        <div class="absolute bottom-4 left-4 right-4 text-left">
                            <span class="inline-block px-2.5 py-1 rounded bg-amber-500 text-slate-950 font-black text-[11px] uppercase tracking-wider mb-1">
                                High Gloss Acrylic Kitchen
                            </span>
                            <h3 class="text-white font-extrabold text-base leading-snug">
                                Real Execution at Nipania, Indore
                            </h3>
                            <p class="text-xs text-slate-300 mt-1 flex items-center justify-between">
                                <span>Starting from <strong>₹850 / sq ft</strong></span>
                                <span class="text-emerald-400 font-bold">10-Year Warranty</span>
                            </p>
                        </div>
                    </div>

                    <!-- Floating Local Experience Badge -->
                    <div class="hidden sm:flex absolute -bottom-5 -left-4 bg-white text-slate-900 px-4 py-3 rounded-xl shadow-xl border border-slate-100 items-center gap-3">
                        <div class="w-10 h-10 rounded-full bg-amber-500/10 text-amber-600 flex items-center justify-center font-black text-lg">
                            12+
                        </div>
                        <div class="text-left">
                            <span class="block text-xs font-black text-slate-900">Years in Indore</span>
                            <span class="block text-[11px] text-slate-500">Over 650+ Projects Handed Over</span>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

    <!-- TRUST STATS STRIP -->
    <section class="bg-white border-b border-slate-200 py-6">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 text-center">
                <div class="p-3">
                    <span class="block text-2xl sm:text-3xl font-black text-slate-900">650+</span>
                    <span class="text-xs text-slate-500 font-medium">Projects Delivered in MP</span>
                </div>
                <div class="p-3">
                    <span class="block text-2xl sm:text-3xl font-black text-amber-600">₹850</span>
                    <span class="text-xs text-slate-500 font-medium">Starting Rate / Sq Ft</span>
                </div>
                <div class="p-3">
                    <span class="block text-2xl sm:text-3xl font-black text-emerald-600">100%</span>
                    <span class="text-xs text-slate-500 font-medium">Factory Direct Precision</span>
                </div>
                <div class="p-3">
                    <span class="block text-2xl sm:text-3xl font-black text-slate-900">4.2 ★</span>
                    <span class="text-xs text-slate-500 font-medium">Verified Customer Rating</span>
                </div>
            </div>
        </div>
    </section>

    <!-- SERVICES & PRICING SECTION -->
    <section id="services" class="py-16 bg-slate-50" x-data="{ activeTab: 'all' }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            
            <div class="text-center max-w-3xl mx-auto mb-10">
                <span class="text-xs font-bold text-amber-600 uppercase tracking-wider">Transparent Rates</span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-slate-900 tracking-tight mt-1">
                    Our Manufacturing & Interior Services
                </h2>
                <p class="text-sm text-slate-600 mt-2">
                    Every unit is factory-cut with heavy-duty edge banding, premium hardware, and installed by trained carpenters under the personal supervision of Nasir Multani.
                </p>

                <!-- Filter Tabs -->
                <div class="flex flex-wrap items-center justify-center gap-2 mt-6">
                    <button @click="activeTab = 'all'" 
                            :class="activeTab === 'all' ? 'bg-slate-900 text-white shadow-xs' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200'"
                            class="px-4 py-1.5 rounded-full text-xs font-bold transition-all cursor-pointer">
                        All Services
                    </button>
                    <button @click="activeTab = 'modular_kitchen'" 
                            :class="activeTab === 'modular_kitchen' ? 'bg-slate-900 text-white shadow-xs' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200'"
                            class="px-4 py-1.5 rounded-full text-xs font-bold transition-all cursor-pointer">
                        Modular Kitchens
                    </button>
                    <button @click="activeTab = 'wardrobe'" 
                            :class="activeTab === 'wardrobe' ? 'bg-slate-900 text-white shadow-xs' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200'"
                            class="px-4 py-1.5 rounded-full text-xs font-bold transition-all cursor-pointer">
                        Wardrobes
                    </button>
                    <button @click="activeTab = 'glazing'" 
                            :class="activeTab === 'glazing' ? 'bg-slate-900 text-white shadow-xs' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200'"
                            class="px-4 py-1.5 rounded-full text-xs font-bold transition-all cursor-pointer">
                        Aluminium Glazing
                    </button>
                    <button @click="activeTab = 'ceiling'" 
                            :class="activeTab === 'ceiling' ? 'bg-slate-900 text-white shadow-xs' : 'bg-white text-slate-700 hover:bg-slate-100 border border-slate-200'"
                            class="px-4 py-1.5 rounded-full text-xs font-bold transition-all cursor-pointer">
                        False Ceilings
                    </button>
                </div>
            </div>

            <!-- Services Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($services as $service)
                    <div x-show="activeTab === 'all' || activeTab === '{{ $service->category }}'"
                         x-transition
                         class="bg-white rounded-2xl overflow-hidden border border-slate-200 hover:border-amber-400 transition-all duration-300 hover:shadow-xl flex flex-col group">
                        
                        <!-- Image Container -->
                        <div class="relative h-56 overflow-hidden bg-slate-100">
                            @if($service->image_path)
                                <img src="{{ asset('storage/' . $service->image_path) }}" 
                                     alt="{{ $service->title }}" 
                                     class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-105"
                                     loading="lazy">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-slate-200 text-slate-400 font-bold text-xs">
                                    AGM Always Good Making
                                </div>
                            @endif

                            <div class="absolute top-3 left-3 bg-slate-900/90 text-white px-2.5 py-1 rounded-md text-[11px] font-bold tracking-wide backdrop-blur-xs">
                                {{ strtoupper(str_replace('_', ' ', $service->category)) }}
                            </div>

                            @if($service->starting_price)
                                <div class="absolute bottom-3 right-3 bg-amber-500 text-slate-950 px-3 py-1 rounded-lg text-xs font-extrabold shadow-md">
                                    From ₹{{ number_format((float) $service->starting_price) }}{{ $service->price_unit }}
                                </div>
                            @endif
                        </div>

                        <!-- Card Body -->
                        <div class="p-6 flex-1 flex flex-col justify-between">
                            <div>
                                <h3 class="text-lg font-extrabold text-slate-900 group-hover:text-amber-600 transition-colors">
                                    {{ $service->title }}
                                </h3>
                                
                                <p class="text-xs text-slate-600 mt-2 leading-relaxed">
                                    {{ $service->description }}
                                </p>

                                @if(!empty($service->features))
                                    <ul class="mt-4 space-y-1.5 border-t border-slate-100 pt-3 text-xs text-slate-700">
                                        @foreach(array_slice($service->features, 0, 4) as $feature)
                                            <li class="flex items-center gap-2">
                                                <svg class="w-3.5 h-3.5 text-emerald-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                                                <span>{{ $feature }}</span>
                                            </li>
                                        @endforeach
                                    </ul>
                                @endif
                            </div>

                            <!-- Action Buttons -->
                            <div class="mt-6 pt-4 border-t border-slate-100 flex items-center gap-2">
                                <a href="https://wa.me/919977350503?text={{ rawurlencode('Hello Nasir ji, I want to inquire about ' . $service->title . ' (Starting ' . $service->formatted_price . ').') }}"
                                   target="_blank"
                                   rel="noopener"
                                   class="flex-1 py-2.5 px-3 rounded-lg bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs text-center transition-colors shadow-xs flex items-center justify-center gap-1.5">
                                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.634.072-1.802-.412-1.464-.607-2.42-2.079-2.493-2.176-.073-.098-.592-.787-.592-1.501 0-.714.375-1.066.508-1.213.133-.147.29-.184.387-.184.097 0 .193.001.277.006.088.005.207-.034.323.246.12.289.412 1.004.448 1.077.036.073.06.159.012.256-.048.098-.073.159-.145.244-.073.085-.153.19-.219.255-.073.073-.149.153-.064.298.085.145.378.623.811 1.009.559.497 1.03.651 1.176.724.145.073.23.061.316-.037.085-.098.363-.423.46-.568.097-.145.194-.122.327-.073.133.049.845.399.99.472.145.073.242.109.278.17.036.06.036.353-.108.758z"/></svg>
                                    <span>WhatsApp</span>
                                </a>

                                <button @click="quoteModal = true" 
                                        class="flex-1 py-2.5 px-3 rounded-lg bg-slate-900 hover:bg-slate-800 text-white font-bold text-xs text-center transition-colors cursor-pointer">
                                    Book Visit
                                </button>
                            </div>
                        </div>

                    </div>
                @endforeach
            </div>

        </div>
    </section>

    <!-- REAL PROJECT GALLERY WITH LIGHTBOX -->
    <section id="portfolio" class="py-16 bg-white" x-data="{ 
        galleryTab: 'all',
        lightboxOpen: false,
        lightboxImg: '',
        lightboxTitle: '',
        lightboxCaption: '',
        openLightbox(img, title, caption) {
            this.lightboxImg = img;
            this.lightboxTitle = title;
            this.lightboxCaption = caption;
            this.lightboxOpen = true;
        }
    }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            
            <div class="flex flex-col md:flex-row md:items-end justify-between gap-6 mb-10">
                <div>
                    <span class="text-xs font-bold text-amber-600 uppercase tracking-wider">Proof of Work</span>
                    <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-slate-900 tracking-tight mt-1">
                        Real Project Gallery in Indore
                    </h2>
                    <p class="text-sm text-slate-600 mt-2 max-w-xl">
                        Explore our actual installations across Vijay Nagar, Nipania, Saket, Khajrana, and Ring Road areas. Tap any photo for details.
                    </p>
                </div>

                <!-- Gallery Category Filter -->
                <div class="flex flex-wrap items-center gap-2">
                    <button @click="galleryTab = 'all'" 
                            :class="galleryTab === 'all' ? 'bg-amber-500 text-slate-950 font-black' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-semibold'"
                            class="px-3.5 py-1.5 rounded-lg text-xs transition-colors cursor-pointer">
                        All Works
                    </button>
                    <button @click="galleryTab = 'kitchen'" 
                            :class="galleryTab === 'kitchen' ? 'bg-amber-500 text-slate-950 font-black' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-semibold'"
                            class="px-3.5 py-1.5 rounded-lg text-xs transition-colors cursor-pointer">
                        Kitchens
                    </button>
                    <button @click="galleryTab = 'wardrobe'" 
                            :class="galleryTab === 'wardrobe' ? 'bg-amber-500 text-slate-950 font-black' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-semibold'"
                            class="px-3.5 py-1.5 rounded-lg text-xs transition-colors cursor-pointer">
                        Wardrobes
                    </button>
                    <button @click="galleryTab = 'glazing'" 
                            :class="galleryTab === 'glazing' ? 'bg-amber-500 text-slate-950 font-black' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-semibold'"
                            class="px-3.5 py-1.5 rounded-lg text-xs transition-colors cursor-pointer">
                        Aluminium Windows
                    </button>
                    <button @click="galleryTab = 'ceiling'" 
                            :class="galleryTab === 'ceiling' ? 'bg-amber-500 text-slate-950 font-black' : 'bg-slate-100 text-slate-700 hover:bg-slate-200 font-semibold'"
                            class="px-3.5 py-1.5 rounded-lg text-xs transition-colors cursor-pointer">
                        Ceilings
                    </button>
                </div>
            </div>

            <!-- Gallery Grid -->
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                @foreach($portfolio as $item)
                    <div x-show="galleryTab === 'all' || galleryTab === '{{ $item->category }}'"
                         x-transition
                         @click="openLightbox('{{ asset('storage/' . $item->image_path) }}', '{{ addslashes($item->title) }}', '{{ addslashes($item->caption ?? '') }}')"
                         class="group relative h-64 rounded-xl overflow-hidden bg-slate-100 cursor-pointer shadow-xs hover:shadow-xl transition-all border border-slate-200">
                        
                        <img src="{{ asset('storage/' . $item->image_path) }}" 
                             alt="{{ $item->title }}"
                             class="w-full h-full object-cover transition-transform duration-500 group-hover:scale-110"
                             loading="lazy">

                        <!-- Overlay on hover/touch -->
                        <div class="absolute inset-0 bg-gradient-to-t from-slate-950/90 via-slate-950/30 to-transparent opacity-90 group-hover:opacity-100 transition-opacity flex flex-col justify-end p-4">
                            <span class="inline-block px-2 py-0.5 rounded bg-amber-500/90 text-slate-950 text-[10px] font-black uppercase tracking-wider w-max mb-1">
                                {{ strtoupper($item->category) }}
                            </span>
                            <h4 class="text-white font-bold text-sm leading-tight line-clamp-2">
                                {{ $item->title }}
                            </h4>
                            @if($item->caption)
                                <p class="text-[11px] text-slate-300 mt-1 line-clamp-1">
                                    {{ $item->caption }}
                                </p>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>

        </div>

        <!-- Lightbox Modal -->
        <div x-show="lightboxOpen" x-cloak class="fixed inset-0 z-50 overflow-y-auto" role="dialog" aria-modal="true">
            <div class="fixed inset-0 bg-slate-950/90 backdrop-blur-md" @click="lightboxOpen = false"></div>
            
            <div class="flex min-h-full items-center justify-center p-4">
                <div class="relative max-w-3xl w-full bg-slate-900 rounded-2xl overflow-hidden shadow-2xl border border-slate-800"
                     @click.away="lightboxOpen = false">
                    
                    <button @click="lightboxOpen = false" class="absolute top-4 right-4 z-20 p-2 rounded-full bg-black/60 text-white hover:bg-black transition-colors">
                        &times;
                    </button>

                    <div class="relative bg-black flex items-center justify-center max-h-[70vh] overflow-hidden">
                        <img :src="lightboxImg" :alt="lightboxTitle" class="max-h-[70vh] w-auto max-w-full object-contain">
                    </div>

                    <div class="p-5 text-white flex flex-col sm:flex-row sm:items-center justify-between gap-4">
                        <div>
                            <h3 class="text-lg font-bold" x-text="lightboxTitle"></h3>
                            <p class="text-xs text-slate-400 mt-1" x-text="lightboxCaption"></p>
                        </div>

                        <a :href="'https://wa.me/919977350503?text=' + encodeURIComponent('Hi Nasir ji, I am interested in this design: ' + lightboxTitle + '. Please share more details and estimated pricing.')"
                           target="_blank"
                           rel="noopener"
                           class="inline-flex items-center justify-center gap-2 px-4 py-2.5 rounded-lg bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold transition-colors shrink-0">
                            Inquire via WhatsApp
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </section>

    <!-- INTERACTIVE ESTIMATE CALCULATOR -->
    <section id="calculator" class="py-16 bg-slate-900 text-white relative overflow-hidden" 
             x-data="{ 
                 calcService: 'kitchen',
                 sqft: 120,
                 quality: 'premium',
                 rates: {
                     kitchen: { standard: 850, premium: 1100, luxury: 1400 },
                     wardrobe: { standard: 900, premium: 1200, luxury: 1550 },
                     glazing: { standard: 380, premium: 480, luxury: 650 },
                     ceiling: { standard: 95, premium: 125, luxury: 160 }
                 },
                 get totalEstimate() {
                     let rate = this.rates[this.calcService][this.quality];
                     return this.sqft * rate;
                 },
                 get formattedTotal() {
                     return '₹ ' + this.totalEstimate.toLocaleString('en-IN');
                 }
             }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 relative z-10">
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-bold text-amber-400 uppercase tracking-wider">Fast Budget Planner</span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-white tracking-tight mt-1">
                    Instant Room Cost Estimator
                </h2>
                <p class="text-sm text-slate-400 mt-2">
                    Estimate your project cost in 10 seconds based on Indore factory-direct manufacturing rates.
                </p>
            </div>

            <div class="max-w-3xl mx-auto bg-slate-800/90 rounded-2xl p-6 sm:p-8 border border-slate-700 shadow-2xl backdrop-blur-md">
                <div class="space-y-6">
                    
                    <!-- Step 1: Select Work Type -->
                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">1. Select Requirement</label>
                        <div class="grid grid-cols-2 sm:grid-cols-4 gap-2">
                            <button type="button" @click="calcService = 'kitchen'" :class="calcService === 'kitchen' ? 'bg-amber-500 text-slate-950 font-black' : 'bg-slate-700 text-slate-300 font-semibold'" class="py-2.5 px-3 rounded-lg text-xs transition-colors cursor-pointer">
                                Modular Kitchen
                            </button>
                            <button type="button" @click="calcService = 'wardrobe'" :class="calcService === 'wardrobe' ? 'bg-amber-500 text-slate-950 font-black' : 'bg-slate-700 text-slate-300 font-semibold'" class="py-2.5 px-3 rounded-lg text-xs transition-colors cursor-pointer">
                                Sliding Wardrobe
                            </button>
                            <button type="button" @click="calcService = 'glazing'" :class="calcService === 'glazing' ? 'bg-amber-500 text-slate-950 font-black' : 'bg-slate-700 text-slate-300 font-semibold'" class="py-2.5 px-3 rounded-lg text-xs transition-colors cursor-pointer">
                                Aluminium Glazing
                            </button>
                            <button type="button" @click="calcService = 'ceiling'" :class="calcService === 'ceiling' ? 'bg-amber-500 text-slate-950 font-black' : 'bg-slate-700 text-slate-300 font-semibold'" class="py-2.5 px-3 rounded-lg text-xs transition-colors cursor-pointer">
                                False Ceiling
                            </button>
                        </div>
                    </div>

                    <!-- Step 2: Approximate Area Slider -->
                    <div>
                        <div class="flex justify-between items-center mb-2">
                            <label class="text-xs font-bold text-slate-300 uppercase tracking-wider">2. Approximate Area</label>
                            <span class="text-amber-400 font-extrabold text-base" x-text="sqft + ' sq ft'"></span>
                        </div>
                        <input type="range" min="30" max="400" step="10" x-model="sqft" 
                               class="w-full h-2 bg-slate-700 rounded-lg appearance-none cursor-pointer accent-amber-500">
                        <div class="flex justify-between text-[11px] text-slate-500 mt-1">
                            <span>Small (30 sq ft)</span>
                            <span>Standard (150 sq ft)</span>
                            <span>Large (400 sq ft)</span>
                        </div>
                    </div>

                    <!-- Step 3: Material Grade -->
                    <div>
                        <label class="block text-xs font-bold text-slate-300 uppercase tracking-wider mb-2">3. Finish / Hardware Grade</label>
                        <div class="grid grid-cols-3 gap-2">
                            <button type="button" @click="quality = 'standard'" :class="quality === 'standard' ? 'bg-amber-500 text-slate-950 font-bold' : 'bg-slate-700 text-slate-300'" class="py-2 px-3 rounded-lg text-xs transition-colors cursor-pointer">
                                Standard (Laminate)
                            </button>
                            <button type="button" @click="quality = 'premium'" :class="quality === 'premium' ? 'bg-amber-500 text-slate-950 font-bold' : 'bg-slate-700 text-slate-300'" class="py-2 px-3 rounded-lg text-xs transition-colors cursor-pointer">
                                Premium (Acrylic / Glass)
                            </button>
                            <button type="button" @click="quality = 'luxury'" :class="quality === 'luxury' ? 'bg-amber-500 text-slate-950 font-bold' : 'bg-slate-700 text-slate-300'" class="py-2 px-3 rounded-lg text-xs transition-colors cursor-pointer">
                                Luxury (Italian Gola)
                            </button>
                        </div>
                    </div>

                    <!-- Result Box -->
                    <div class="pt-6 border-t border-slate-700 flex flex-col sm:flex-row items-center justify-between gap-4">
                        <div>
                            <span class="text-xs text-slate-400 block">Estimated Approximate Price</span>
                            <span class="text-2xl sm:text-3xl font-black text-amber-400" x-text="formattedTotal"></span>
                            <span class="text-[11px] text-slate-400 block mt-0.5">*Includes factory fabrication & site installation</span>
                        </div>

                        <a :href="'https://wa.me/919977350503?text=' + encodeURIComponent('Hi Nasir ji, I used your AGM calculator for ' + calcService + ' (' + sqft + ' sq ft, ' + quality + ' grade) with estimated budget ' + formattedTotal + '. Please schedule a free site measurement.')"
                           target="_blank"
                           rel="noopener"
                           class="w-full sm:w-auto inline-flex items-center justify-center gap-2 px-5 py-3 rounded-xl bg-emerald-600 hover:bg-emerald-500 text-white font-bold text-xs tracking-wide shadow-md transition-colors">
                            <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.634.072-1.802-.412-1.464-.607-2.42-2.079-2.493-2.176-.073-.098-.592-.787-.592-1.501 0-.714.375-1.066.508-1.213.133-.147.29-.184.387-.184.097 0 .193.001.277.006.088.005.207-.034.323.246.12.289.412 1.004.448 1.077.036.073.06.159.012.256-.048.098-.073.159-.145.244-.073.085-.153.19-.219.255-.073.073-.149.153-.064.298.085.145.378.623.811 1.009.559.497 1.03.651 1.176.724.145.073.23.061.316-.037.085-.098.363-.423.46-.568.097-.145.194-.122.327-.073.133.049.845.399.99.472.145.073.242.109.278.17.036.06.036.353-.108.758z"/></svg>
                            <span>Send Estimate to WhatsApp</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- WHY CHOOSE AGM (MANUFACTURING ADVANTAGE) -->
    <section id="why-us" class="py-16 bg-slate-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-bold text-amber-600 uppercase tracking-wider">The AGM Guarantee</span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-slate-900 tracking-tight mt-1">
                    Why Homeowners in Indore Trust Us
                </h2>
                <p class="text-sm text-slate-600 mt-2">
                    Unlike brokers who outsource work to random carpenters, AGM Always Good Making owns its fabrication workshop in Khajrana / Ring Road.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                
                <!-- Benefit 1 -->
                <div class="bg-white p-7 rounded-2xl border border-slate-200 shadow-xs hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 rounded-xl bg-amber-500/10 text-amber-600 flex items-center justify-center font-black text-xl mb-5">
                        🏭
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Direct Factory Pricing</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Save 25% to 35% by bypassing expensive showroom margins. We manufacture all carcasses, shutters, and aluminium frames in our own Indore facility.
                    </p>
                </div>

                <!-- Benefit 2 -->
                <div class="bg-white p-7 rounded-2xl border border-slate-200 shadow-xs hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 rounded-xl bg-emerald-500/10 text-emerald-600 flex items-center justify-center font-black text-xl mb-5">
                        🛡️
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">100% Genuine Certified Core</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        We only use calibrated BWP marine ply, high-density HDHMR boards, and Jindal-grade aluminium sections. Resistant to termites, boiling water, and harsh weather.
                    </p>
                </div>

                <!-- Benefit 3 -->
                <div class="bg-white p-7 rounded-2xl border border-slate-200 shadow-xs hover:shadow-md transition-shadow">
                    <div class="w-12 h-12 rounded-xl bg-blue-500/10 text-blue-600 flex items-center justify-center font-black text-xl mb-5">
                        🤝
                    </div>
                    <h3 class="text-lg font-bold text-slate-900 mb-2">Personal Accountability</h3>
                    <p class="text-xs text-slate-600 leading-relaxed">
                        Direct access to proprietor <strong>Nasir Multani (9977350503)</strong> from the first site measurement to post-handover service. No call center runarounds.
                    </p>
                </div>

            </div>

            <!-- Comparison Table: AGM vs Local Carpenters -->
            <div class="mt-12 bg-white rounded-2xl border border-slate-200 overflow-hidden shadow-xs">
                <div class="p-6 bg-slate-900 text-white flex flex-col sm:flex-row justify-between items-start sm:items-center gap-2">
                    <h3 class="font-extrabold text-base">Direct Comparison</h3>
                    <span class="text-xs text-slate-400">Why factory modular always beats messy on-site carpentry</span>
                </div>
                <div class="overflow-x-auto">
                    <table class="w-full text-left text-xs text-slate-700">
                        <thead class="bg-slate-100 text-slate-800 font-bold uppercase border-b border-slate-200">
                            <tr>
                                <th class="p-4">Key Factor</th>
                                <th class="p-4 text-emerald-700 bg-emerald-50/70 font-extrabold">AGM Always Good Making</th>
                                <th class="p-4 text-slate-500">Unorganized Local Carpenters</th>
                            </tr>
                        </thead>
                        <tbody class="divide-y divide-slate-100">
                            <tr>
                                <td class="p-4 font-semibold text-slate-900">Edge Banding</td>
                                <td class="p-4 bg-emerald-50/40 text-emerald-950 font-bold">Machine hot-melt glued (never peels off)</td>
                                <td class="p-4 text-slate-500">Hand cut with fevicol (peels in 6-12 months)</td>
                            </tr>
                            <tr>
                                <td class="p-4 font-semibold text-slate-900">Dust & Mess at Home</td>
                                <td class="p-4 bg-emerald-50/40 text-emerald-950 font-bold">Zero dust: 90% pre-cut in factory, 2-day fit</td>
                                <td class="p-4 text-slate-500">Weeks of sawdust, noise, and fumes at home</td>
                            </tr>
                            <tr>
                                <td class="p-4 font-semibold text-slate-900">Warranty & GST Invoice</td>
                                <td class="p-4 bg-emerald-50/40 text-emerald-950 font-bold">10-Year written warranty + GSTIN Bill</td>
                                <td class="p-4 text-slate-500">No bill, no legal warranty, untraceable</td>
                            </tr>
                            <tr>
                                <td class="p-4 font-semibold text-slate-900">Delivery Timelines</td>
                                <td class="p-4 bg-emerald-50/40 text-emerald-950 font-bold">Committed 15-21 days handover</td>
                                <td class="p-4 text-slate-500">Constantly delayed with missing labor</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </section>

    <!-- CUSTOMER REVIEWS & PROOF -->
    <section id="reviews" class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            
            <div class="text-center max-w-2xl mx-auto mb-12">
                <span class="text-xs font-bold text-amber-600 uppercase tracking-wider">Verified Feedback</span>
                <h2 class="text-2xl sm:text-3xl lg:text-4xl font-black text-slate-900 tracking-tight mt-1">
                    What Customers in Indore Say
                </h2>
                <p class="text-sm text-slate-600 mt-2">
                    Verified reviews from Justdial and IndiaMART directory listings.
                </p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                
                <!-- Review 1 -->
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-1 text-amber-400 text-sm mb-3">
                            ★★★★★
                        </div>
                        <p class="text-xs text-slate-700 leading-relaxed italic">
                            "AGM Always Good Making offers flexible appointments and cost-efficient services. I am thoroughly satisfied with their modular kitchen work and pricing in Indore."
                        </p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-slate-200 flex items-center justify-between text-xs">
                        <strong class="text-slate-900 font-bold">Vikas</strong>
                        <span class="text-slate-400">Dec 2024 • Justdial</span>
                    </div>
                </div>

                <!-- Review 2 -->
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-1 text-amber-400 text-sm mb-3">
                            ★★★★★
                        </div>
                        <p class="text-xs text-slate-700 leading-relaxed italic">
                            "Best interior craftsmanship in Indore city! I really appreciate the work and dedication of the team. Top quality finishes and on-time completion."
                        </p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-slate-200 flex items-center justify-between text-xs">
                        <strong class="text-slate-900 font-bold">Nomaan</strong>
                        <span class="text-slate-400">Feb 2023 • Indore</span>
                    </div>
                </div>

                <!-- Review 3 -->
                <div class="p-6 rounded-2xl bg-slate-50 border border-slate-200 flex flex-col justify-between">
                    <div>
                        <div class="flex items-center gap-1 text-amber-400 text-sm mb-3">
                            ★★★★★
                        </div>
                        <p class="text-xs text-slate-700 leading-relaxed italic">
                            "Very good service for sliding wardrobe and aluminium window work. Nasir ji gave the best quotation and completed the work cleanly."
                        </p>
                    </div>
                    <div class="mt-4 pt-4 border-t border-slate-200 flex items-center justify-between text-xs">
                        <strong class="text-slate-900 font-bold">Arti</strong>
                        <span class="text-slate-400">Oct 2023 • Justdial</span>
                    </div>
                </div>

            </div>

        </div>
    </section>

    <!-- LEAD CAPTURE & SITE MEASUREMENT BOOKING FORM -->
    <section id="contact" class="py-16 bg-slate-900 text-white relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-10 items-center">
                
                <!-- Left Details -->
                <div class="lg:col-span-6 space-y-6">
                    <span class="text-xs font-bold text-amber-400 uppercase tracking-wider">Book Free Consultation</span>
                    <h2 class="text-3xl sm:text-4xl font-black text-white tracking-tight">
                        Schedule a Free Site Measurement in Indore
                    </h2>
                    <p class="text-sm text-slate-300 leading-relaxed">
                        We visit your flat, villa, or commercial site anywhere in Indore with physical material samples (acrylics, veneers, laminates, and aluminium profiles). Get a transparent 3D design and quotation.
                    </p>

                    <div class="space-y-4 pt-2 text-sm">
                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-amber-500/20 text-amber-400 flex items-center justify-center shrink-0 mt-0.5">
                                📞
                            </div>
                            <div>
                                <span class="text-xs text-slate-400 block">Direct Phone & WhatsApp</span>
                                <a href="tel:9977350503" class="text-white font-extrabold hover:text-amber-400 transition-colors">+91 99773 50503 (Nasir Multani)</a>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-amber-500/20 text-amber-400 flex items-center justify-center shrink-0 mt-0.5">
                                📍
                            </div>
                            <div>
                                <span class="text-xs text-slate-400 block">Office & Registered Address</span>
                                <span class="text-white font-medium">51 Dawoody Nagar, Khajrana, Indore, MP - 452016</span>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-amber-500/20 text-amber-400 flex items-center justify-center shrink-0 mt-0.5">
                                🏭
                            </div>
                            <div>
                                <span class="text-xs text-slate-400 block">Workshop Facility</span>
                                <span class="text-white font-medium">Shop No. C-1, Radha Kunj Colony, Near Ring Road, Khajrana, Indore - 452010</span>
                            </div>
                        </div>

                        <div class="flex items-start gap-3">
                            <div class="w-8 h-8 rounded-lg bg-emerald-500/20 text-emerald-400 flex items-center justify-center shrink-0 mt-0.5">
                                🧾
                            </div>
                            <div>
                                <span class="text-xs text-slate-400 block">GST Registered Entity</span>
                                <span class="text-emerald-400 font-bold">23BQAPM4037J1Z1</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Form Box -->
                <div class="lg:col-span-6">
                    <div class="bg-white text-slate-900 rounded-2xl p-6 sm:p-8 shadow-2xl border border-slate-100">
                        <div class="mb-5">
                            <h3 class="text-xl font-extrabold text-slate-900">Request Callback / Visit</h3>
                            <p class="text-xs text-slate-500 mt-1">Fill this quick form and Nasir Multani will call you within 30 minutes.</p>
                        </div>

                        <form action="{{ route('leads.store') }}" method="POST" class="space-y-4">
                            @csrf
                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Your Name *</label>
                                <input type="text" name="name" required placeholder="e.g. Deepak Patel" 
                                       class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition-all">
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Contact Phone Number *</label>
                                <input type="tel" name="phone" required placeholder="10-digit mobile number" 
                                       pattern="[0-9]{10}"
                                       class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition-all">
                            </div>

                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-3">
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1">Interested Service</label>
                                    <select name="service_type" class="w-full px-3 py-2.5 rounded-lg border border-slate-300 text-xs focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition-all bg-white">
                                        <option value="Modular Kitchen">Modular Kitchen</option>
                                        <option value="Sliding Wardrobe">Sliding Wardrobe</option>
                                        <option value="Aluminium Windows & Glazing">Aluminium Windows</option>
                                        <option value="False Ceiling (POP)">False Ceiling</option>
                                        <option value="Turnkey Interior">Full Home Renovation</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-xs font-semibold text-slate-700 mb-1">Area / Location in Indore</label>
                                    <input type="text" name="location" placeholder="e.g. Vijay Nagar, Khajrana" 
                                           class="w-full px-3 py-2.5 rounded-lg border border-slate-300 text-xs focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition-all">
                                </div>
                            </div>

                            <div>
                                <label class="block text-xs font-semibold text-slate-700 mb-1">Message or Requirements</label>
                                <textarea name="message" rows="2" placeholder="Mention approx size or questions..." 
                                          class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-xs focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition-all"></textarea>
                            </div>

                            <button type="submit" class="w-full py-3.5 rounded-xl bg-amber-500 hover:bg-amber-400 text-slate-950 font-black text-sm tracking-wide shadow-md hover:shadow-lg transition-all cursor-pointer">
                                Submit & Request Visit
                            </button>
                        </form>
                    </div>
                </div>

            </div>
        </div>
    </section>

@endsection
