<!DOCTYPE html>
<html lang="en" class="scroll-smooth">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    
    <title>@yield('title', 'AGM Always Good Making | Modular Kitchens, Wardrobes & Glazing Indore')</title>
    <meta name="description" content="@yield('meta_description', 'AGM Always Good Making - Indore\'s trusted manufacturer of Acrylic Modular Kitchens, Designer Sliding Wardrobes, Aluminium Glazing, POP False Ceilings & Turnkey Interiors. Contact Nasir Multani: 9977350503.')">
    <meta name="keywords" content="modular kitchen indore, sliding wardrobe indore, aluminium glazing indore, false ceiling indore, interior designer khajrana indore, AGM always good making, nasir multani">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph / Social Sharing -->
    <meta property="og:type" content="business.business">
    <meta property="og:title" content="@yield('title', 'AGM Always Good Making | Modular Kitchens, Wardrobes & Glazing Indore')">
    <meta property="og:description" content="@yield('meta_description', 'Premier factory-direct Modular Kitchens, Wardrobes & Aluminium Glazing in Indore. GST: 23BQAPM4037J1Z1. Call Nasir Multani: 9977350503.')">
    <meta property="og:url" content="{{ url()->current() }}">
    <meta property="og:site_name" content="AGM Always Good Making">
    <meta property="og:locale" content="en_IN">
    <meta property="og:image" content="{{ asset('storage/portfolio/acrylic-kitchen.jpg') }}">

    <!-- Theme Color -->
    <meta name="theme-color" content="#0f172a">

    <!-- Schema.org Structured Data -->
    <script type="application/ld+json">
    {!! json_encode([
        '@context' => 'https://schema.org',
        '@type' => 'HomeAndConstructionBusiness',
        'name' => 'AGM Always Good Making',
        'image' => asset('storage/portfolio/acrylic-kitchen.jpg'),
        '@id' => 'https://agmalwaysgoodmaking.in',
        'url' => 'https://agmalwaysgoodmaking.in',
        'telephone' => '+919977350503',
        'priceRange' => '₹₹',
        'taxID' => '23BQAPM4037J1Z1',
        'address' => [
            '@type' => 'PostalAddress',
            'streetAddress' => '51 Dawoody Nagar, Khajrana',
            'addressLocality' => 'Indore',
            'addressRegion' => 'Madhya Pradesh',
            'postalCode' => '452016',
            'addressCountry' => 'IN',
        ],
        'geo' => [
            '@type' => 'GeoCoordinates',
            'latitude' => 22.7360316,
            'longitude' => 75.9256992,
        ],
        'openingHoursSpecification' => [
            '@type' => 'OpeningHoursSpecification',
            'dayOfWeek' => ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday'],
            'opens' => '09:30',
            'closes' => '20:00',
        ],
        'aggregateRating' => [
            '@type' => 'AggregateRating',
            'ratingValue' => '4.2',
            'reviewCount' => '58',
        ],
    ], JSON_UNESCAPED_SLASHES | JSON_PRETTY_PRINT) !!}
    </script>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-50 text-slate-900 font-sans antialiased selection:bg-amber-500 selection:text-white pb-20 md:pb-0" x-data="{ quoteModal: false }">

    <!-- Top Announcement & Trust Bar -->
    <div class="bg-slate-900 text-slate-300 text-xs py-2 border-b border-slate-800">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 flex flex-wrap items-center justify-between gap-2">
            <div class="flex items-center gap-3 flex-wrap">
                <span class="inline-flex items-center gap-1.5 px-2 py-0.5 rounded bg-emerald-950 text-emerald-400 font-semibold border border-emerald-800 text-[11px]">
                    <span class="w-1.5 h-1.5 rounded-full bg-emerald-400 animate-pulse"></span> GSTIN: 23BQAPM4037J1Z1
                </span>
                <span class="hidden sm:inline text-slate-400">•</span>
                <span class="hidden sm:inline text-slate-300">51 Dawoody Nagar & Ring Road Workshop, Indore</span>
                <span class="hidden sm:inline text-slate-400">•</span>
                <span class="hidden lg:inline text-amber-400 font-medium">★ 4.2 Rated Interior Manufacturer</span>
            </div>
            <div class="flex items-center gap-4 text-xs ml-auto">
                <a href="tel:9977350503" class="hover:text-amber-400 transition-colors flex items-center gap-1 font-semibold text-white">
                    <svg class="w-3.5 h-3.5 text-amber-500" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 4V3z"/></svg>
                    Nasir Multani: +91 99773 50503
                </a>
            </div>
        </div>
    </div>

    <!-- Main Navigation Bar -->
    <header class="sticky top-0 z-40 bg-white/95 backdrop-blur-md shadow-xs border-b border-slate-100" x-data="{ mobileMenu: false }">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 h-18 flex items-center justify-between gap-4">
            
            <!-- Brand Logo -->
            <a href="{{ route('home') }}" class="flex items-center gap-3 group">
                <div class="w-10 h-10 rounded-lg bg-linear-to-br from-slate-900 to-slate-800 flex items-center justify-center text-amber-400 font-black text-xl shadow-md border border-slate-700 tracking-wider">
                    AGM
                </div>
                <div class="flex flex-col">
                    <span class="font-extrabold text-slate-900 text-lg leading-tight tracking-tight group-hover:text-amber-600 transition-colors">
                        AGM <span class="text-amber-600">Always Good Making</span>
                    </span>
                    <span class="text-[11px] text-slate-500 font-medium tracking-wide">
                        Modular Kitchens • Wardrobes • Glazing • Indore
                    </span>
                </div>
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden md:flex items-center gap-7 text-sm font-semibold text-slate-700">
                <a href="#services" class="hover:text-amber-600 transition-colors">Services & Pricing</a>
                <a href="#portfolio" class="hover:text-amber-600 transition-colors">Work Gallery</a>
                <a href="#calculator" class="hover:text-amber-600 transition-colors">Cost Calculator</a>
                <a href="#why-us" class="hover:text-amber-600 transition-colors">Why Choose AGM</a>
                <a href="#reviews" class="hover:text-amber-600 transition-colors">Reviews</a>
                <a href="#contact" class="hover:text-amber-600 transition-colors">Contact</a>
            </nav>

            <!-- CTA Actions Desktop -->
            <div class="hidden sm:flex items-center gap-3">
                <a href="https://wa.me/919977350503?text={{ rawurlencode('Hello Nasir ji, I would like to consult with AGM Always Good Making for my home/office interior.') }}" 
                   target="_blank" 
                   rel="noopener"
                   class="inline-flex items-center gap-2 px-3.5 py-2 rounded-lg bg-emerald-600 hover:bg-emerald-500 text-white text-xs font-bold transition-all shadow-xs hover:shadow-md">
                    <svg class="w-4 h-4 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.634.072-1.802-.412-1.464-.607-2.42-2.079-2.493-2.176-.073-.098-.592-.787-.592-1.501 0-.714.375-1.066.508-1.213.133-.147.29-.184.387-.184.097 0 .193.001.277.006.088.005.207-.034.323.246.12.289.412 1.004.448 1.077.036.073.06.159.012.256-.048.098-.073.159-.145.244-.073.085-.153.19-.219.255-.073.073-.149.153-.064.298.085.145.378.623.811 1.009.559.497 1.03.651 1.176.724.145.073.23.061.316-.037.085-.098.363-.423.46-.568.097-.145.194-.122.327-.073.133.049.845.399.99.472.145.073.242.109.278.17.036.06.036.353-.108.758z"/></svg>
                    WhatsApp
                </a>

                <button @click="quoteModal = true"
                        type="button" 
                        class="inline-flex items-center gap-2 px-4 py-2 rounded-lg bg-amber-500 hover:bg-amber-400 text-slate-950 text-xs font-extrabold tracking-wide transition-all shadow-xs hover:shadow-md cursor-pointer">
                    Book Free Site Visit
                </button>
            </div>

            <!-- Mobile Hamburger Toggle -->
            <button @click="mobileMenu = !mobileMenu" class="md:hidden p-2 rounded-lg text-slate-700 hover:bg-slate-100" aria-label="Toggle Navigation Menu">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path x-show="!mobileMenu" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path x-show="mobileMenu" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        </div>

        <!-- Mobile Menu Drawer -->
        <div x-show="mobileMenu" x-cloak @click.away="mobileMenu = false" class="md:hidden border-t border-slate-100 bg-white px-4 pt-3 pb-6 space-y-3 shadow-xl">
            <a href="#services" @click="mobileMenu = false" class="block py-2 text-base font-semibold text-slate-800 border-b border-slate-100">Services & Pricing</a>
            <a href="#portfolio" @click="mobileMenu = false" class="block py-2 text-base font-semibold text-slate-800 border-b border-slate-100">Work Gallery</a>
            <a href="#calculator" @click="mobileMenu = false" class="block py-2 text-base font-semibold text-slate-800 border-b border-slate-100">Cost Calculator</a>
            <a href="#why-us" @click="mobileMenu = false" class="block py-2 text-base font-semibold text-slate-800 border-b border-slate-100">Why Choose AGM</a>
            <a href="#reviews" @click="mobileMenu = false" class="block py-2 text-base font-semibold text-slate-800 border-b border-slate-100">Reviews & Ratings</a>
            <a href="#contact" @click="mobileMenu = false" class="block py-2 text-base font-semibold text-slate-800 border-b border-slate-100">Contact & Address</a>
            
            <div class="pt-2 grid grid-cols-2 gap-2">
                <a href="tel:9977350503" class="w-full text-center py-2.5 rounded-lg bg-slate-900 text-white text-xs font-bold">
                    Call: 9977350503
                </a>
                <button @click="quoteModal = true; mobileMenu = false" class="w-full text-center py-2.5 rounded-lg bg-amber-500 text-slate-950 text-xs font-extrabold">
                    Free Consultation
                </button>
            </div>
        </div>
    </header>

    <!-- Main Content Yield -->
    <main>
        @yield('content')
    </main>

    <!-- Site Footer -->
    <footer class="bg-slate-950 text-slate-400 pt-16 pb-24 md:pb-12 border-t border-slate-800 text-sm">
        <div class="max-w-7xl mx-auto px-4 sm:px-6">
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10 pb-12 border-b border-slate-800">
                
                <!-- Col 1: About AGM -->
                <div class="space-y-4">
                    <div class="flex items-center gap-3">
                        <div class="w-9 h-9 rounded bg-amber-500 text-slate-950 font-black flex items-center justify-center text-lg">AGM</div>
                        <span class="text-white font-extrabold text-lg">Always Good Making</span>
                    </div>
                    <p class="text-xs leading-relaxed text-slate-400">
                        Indore's leading manufacturer of custom Acrylic Modular Kitchens, Designer Sliding Wardrobes, Aluminium Toughened Glass Glazing, and Turnkey Home Interior Execution.
                    </p>
                    <div class="inline-flex items-center gap-2 px-3 py-1.5 rounded bg-slate-900 border border-slate-800 text-xs font-semibold text-emerald-400">
                        <svg class="w-4 h-4 text-emerald-500" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"/></svg>
                        GST Verified: 23BQAPM4037J1Z1
                    </div>
                </div>

                <!-- Col 2: Services -->
                <div>
                    <h4 class="text-white font-bold text-sm tracking-wider uppercase mb-4">Our Services</h4>
                    <ul class="space-y-2 text-xs">
                        <li><a href="#services" class="hover:text-amber-400 transition-colors">Acrylic Modular Kitchens (from ₹850/sq ft)</a></li>
                        <li><a href="#services" class="hover:text-amber-400 transition-colors">Italian Minimalist Kitchen Cabinets</a></li>
                        <li><a href="#services" class="hover:text-amber-400 transition-colors">Printed Sliding Wardrobes (from ₹1,200/sq ft)</a></li>
                        <li><a href="#services" class="hover:text-amber-400 transition-colors">Designer Bedroom Wardrobes (from ₹900/sq ft)</a></li>
                        <li><a href="#services" class="hover:text-amber-400 transition-colors">Aluminium Sliding Windows & Partitions</a></li>
                        <li><a href="#services" class="hover:text-amber-400 transition-colors">POP & Gypsum False Ceiling Lighting</a></li>
                        <li><a href="#services" class="hover:text-amber-400 transition-colors">Full Bungalow & Villa Renovation</a></li>
                    </ul>
                </div>

                <!-- Col 3: Direct Contact -->
                <div>
                    <h4 class="text-white font-bold text-sm tracking-wider uppercase mb-4">Direct Contact</h4>
                    <ul class="space-y-3 text-xs">
                        <li class="flex items-start gap-2.5">
                            <svg class="w-4 h-4 text-amber-500 shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                            <div>
                                <span class="text-white font-medium block">Nasir Multani</span>
                                <span class="text-slate-400">Proprietor & Master Craftsman</span>
                            </div>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-amber-500 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 4V3z"/></svg>
                            <a href="tel:9977350503" class="hover:text-amber-400 transition-colors font-bold text-white text-sm">+91 99773 50503</a>
                        </li>
                        <li class="flex items-center gap-2.5">
                            <svg class="w-4 h-4 text-emerald-400 shrink-0 fill-current" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.634.072-1.802-.412-1.464-.607-2.42-2.079-2.493-2.176-.073-.098-.592-.787-.592-1.501 0-.714.375-1.066.508-1.213.133-.147.29-.184.387-.184.097 0 .193.001.277.006.088.005.207-.034.323.246.12.289.412 1.004.448 1.077.036.073.06.159.012.256-.048.098-.073.159-.145.244-.073.085-.153.19-.219.255-.073.073-.149.153-.064.298.085.145.378.623.811 1.009.559.497 1.03.651 1.176.724.145.073.23.061.316-.037.085-.098.363-.423.46-.568.097-.145.194-.122.327-.073.133.049.845.399.99.472.145.073.242.109.278.17.036.06.036.353-.108.758z"/></svg>
                            <a href="https://wa.me/919977350503" target="_blank" rel="noopener" class="text-emerald-400 hover:underline">Instant WhatsApp Chat</a>
                        </li>
                    </ul>
                </div>

                <!-- Col 4: Location & Workshop -->
                <div>
                    <h4 class="text-white font-bold text-sm tracking-wider uppercase mb-4">Location & Hours</h4>
                    <ul class="space-y-3 text-xs leading-relaxed">
                        <li>
                            <strong class="text-white block">Registered Office:</strong>
                            51 Dawoody Nagar, Khajrana, Indore, MP - 452016
                        </li>
                        <li>
                            <strong class="text-white block">Workshop / Service Facility:</strong>
                            Shop No. C-1, Radha Kunj Colony, Near Ring Road, Khajrana, Indore - 452010
                        </li>
                        <li>
                            <strong class="text-white block">Operating Hours:</strong>
                            9:30 AM – 8:00 PM (Monday to Sunday)
                        </li>
                    </ul>
                </div>

            </div>

            <div class="pt-8 flex flex-col sm:flex-row items-center justify-between gap-4 text-xs">
                <p>&copy; {{ date('Y') }} AGM Always Good Making. All Rights Reserved. GSTIN: 23BQAPM4037J1Z1.</p>
                <div class="flex items-center gap-4">
                    <span>Indore, Madhya Pradesh</span>
                    <a href="{{ route('admin.login') }}" class="text-slate-500 hover:text-slate-300 transition-colors">Admin Login</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- STICKY MOBILE BOTTOM BAR (Max Conversion on Smartphones) -->
    <div class="md:hidden fixed bottom-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md border-t border-slate-200 px-3 py-2 shadow-2xl flex items-center justify-between gap-2 safe-area-bottom">
        <!-- Call Button -->
        <a href="tel:9977350503" class="flex-1 inline-flex items-center justify-center gap-1.5 py-2.5 px-2 rounded-lg bg-slate-900 text-white font-bold text-xs active:scale-95 transition-transform shadow-xs">
            <svg class="w-4 h-4 text-amber-400 shrink-0" fill="currentColor" viewBox="0 0 20 20"><path d="M2 3a1 1 0 011-1h2.153a1 1 0 01.986.836l.74 4.435a1 1 0 01-.54 1.06l-1.548.773a11.037 11.037 0 006.105 6.105l.774-1.548a1 1 0 011.059-.54l4.435.74a1 1 0 01.836.986V17a1 1 0 01-1 1h-2C7.82 18 2 12.18 2 4V3z"/></svg>
            <span>Call Now</span>
        </a>

        <!-- WhatsApp Button -->
        <a href="https://wa.me/919977350503?text={{ rawurlencode('Hello Nasir ji, I would like to get a quote from AGM Always Good Making.') }}" 
           target="_blank" 
           rel="noopener"
           class="flex-1 inline-flex items-center justify-center gap-1.5 py-2.5 px-2 rounded-lg bg-emerald-600 text-white font-bold text-xs active:scale-95 transition-transform shadow-xs">
            <svg class="w-4 h-4 fill-current shrink-0" viewBox="0 0 24 24"><path d="M12.031 6.172c-3.181 0-5.767 2.586-5.768 5.766-.001 1.298.38 2.27 1.019 3.287l-.582 2.128 2.182-.573c.978.58 1.911.928 3.145.929 3.178 0 5.767-2.587 5.768-5.766.001-3.187-2.575-5.771-5.764-5.771zm3.392 8.244c-.144.405-.837.774-1.17.824-.312.045-.634.072-1.802-.412-1.464-.607-2.42-2.079-2.493-2.176-.073-.098-.592-.787-.592-1.501 0-.714.375-1.066.508-1.213.133-.147.29-.184.387-.184.097 0 .193.001.277.006.088.005.207-.034.323.246.12.289.412 1.004.448 1.077.036.073.06.159.012.256-.048.098-.073.159-.145.244-.073.085-.153.19-.219.255-.073.073-.149.153-.064.298.085.145.378.623.811 1.009.559.497 1.03.651 1.176.724.145.073.23.061.316-.037.085-.098.363-.423.46-.568.097-.145.194-.122.327-.073.133.049.845.399.99.472.145.073.242.109.278.17.036.06.036.353-.108.758z"/></svg>
            <span>WhatsApp</span>
        </a>

        <!-- Free Quote Modal Button -->
        <button @click="quoteModal = true" 
                class="flex-1 inline-flex items-center justify-center gap-1 py-2.5 px-2 rounded-lg bg-amber-500 text-slate-950 font-black text-xs active:scale-95 transition-transform shadow-xs">
            <span>Free Quote</span>
        </button>
    </div>

    <!-- Quick Quote / Site Consultation Modal -->
    <div x-show="quoteModal" x-cloak class="fixed inset-0 z-50 overflow-y-auto" role="dialog" aria-modal="true">
        <!-- Backdrop -->
        <div class="fixed inset-0 bg-slate-950/70 backdrop-blur-xs transition-opacity" @click="quoteModal = false"></div>

        <div class="flex min-h-full items-center justify-center p-4 text-center">
            <div class="w-full max-w-md transform overflow-hidden rounded-2xl bg-white p-6 text-left align-middle shadow-2xl transition-all relative border border-slate-100"
                 @click.away="quoteModal = false">
                
                <button @click="quoteModal = false" class="absolute top-4 right-4 p-1.5 rounded-full text-slate-400 hover:text-slate-600 hover:bg-slate-100 transition-colors">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
                </button>

                <div class="mb-4">
                    <span class="text-xs font-bold text-amber-600 uppercase tracking-wider">Fast Response</span>
                    <h3 class="text-xl font-extrabold text-slate-900 mt-0.5">Book Free Site Measurement</h3>
                    <p class="text-xs text-slate-500 mt-1">Direct consultation with Nasir Multani. No obligation, 100% free 3D design quote.</p>
                </div>

                <form action="{{ route('leads.store') }}" method="POST" class="space-y-3.5">
                    @csrf
                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Your Full Name *</label>
                        <input type="text" name="name" required placeholder="e.g. Rahul Sharma" 
                               class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition-all">
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Mobile Number (WhatsApp Preferred) *</label>
                        <input type="tel" name="phone" required placeholder="10-digit mobile number" 
                               pattern="[0-9]{10}"
                               class="w-full px-3.5 py-2.5 rounded-lg border border-slate-300 text-sm focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition-all">
                    </div>

                    <div class="grid grid-cols-2 gap-2.5">
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Service Required</label>
                            <select name="service_type" class="w-full px-3 py-2.5 rounded-lg border border-slate-300 text-xs focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition-all bg-white">
                                <option value="Modular Kitchen">Modular Kitchen</option>
                                <option value="Sliding Wardrobe">Sliding Wardrobe</option>
                                <option value="Aluminium Windows & Glazing">Aluminium Glazing</option>
                                <option value="False Ceiling (POP)">False Ceiling</option>
                                <option value="Full Home Renovation">Full Renovation</option>
                            </select>
                        </div>
                        <div>
                            <label class="block text-xs font-semibold text-slate-700 mb-1">Location in Indore</label>
                            <input type="text" name="location" placeholder="e.g. Vijay Nagar, Khajrana" 
                                   class="w-full px-3 py-2.5 rounded-lg border border-slate-300 text-xs focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition-all">
                        </div>
                    </div>

                    <div>
                        <label class="block text-xs font-semibold text-slate-700 mb-1">Requirement Details (Optional)</label>
                        <textarea name="message" rows="2" placeholder="e.g. Need L-shaped acrylic kitchen for 12x10 ft space..." 
                                  class="w-full px-3.5 py-2 rounded-lg border border-slate-300 text-xs focus:border-amber-500 focus:ring-2 focus:ring-amber-200 outline-none transition-all"></textarea>
                    </div>

                    <button type="submit" class="w-full py-3 rounded-lg bg-amber-500 hover:bg-amber-400 text-slate-950 font-black text-sm tracking-wide transition-all shadow-md cursor-pointer">
                        Confirm & Request Site Visit
                    </button>
                    
                    <p class="text-[11px] text-center text-slate-400 mt-2">
                        Or directly call Nasir Multani at <a href="tel:9977350503" class="text-slate-800 font-bold hover:underline">9977350503</a>
                    </p>
                </form>
            </div>
        </div>
    </div>

</body>
</html>
