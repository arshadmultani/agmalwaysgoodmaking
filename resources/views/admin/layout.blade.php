<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, viewport-fit=cover">
    <title>@yield('title', 'Admin Dashboard') | AGM Always Good Making</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-slate-100 text-slate-800 font-sans min-h-screen flex flex-col pb-20 md:pb-0 antialiased" x-data="{ mobileNav: false }">

    <!-- Admin Header -->
    <header class="bg-slate-900 text-white border-b border-slate-800 sticky top-0 z-30 shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 h-16 flex items-center justify-between gap-3">
            
            <!-- Brand Logo & Title -->
            <a href="{{ route('admin.dashboard') }}" class="flex items-center gap-2.5 shrink-0">
                <div class="w-8 h-8 rounded-lg bg-amber-500 text-slate-950 font-black flex items-center justify-center text-sm shadow-xs">
                    AGM
                </div>
                <div class="flex flex-col">
                    <span class="font-extrabold text-sm tracking-tight text-white leading-tight">AGM Admin</span>
                    <span class="text-[10px] text-slate-400 font-medium hidden sm:inline">Always Good Making</span>
                </div>
            </a>

            <!-- Desktop Nav Links -->
            <nav class="hidden md:flex items-center gap-1 lg:gap-2 text-xs font-semibold">
                <a href="{{ route('admin.dashboard') }}" 
                   class="px-3 py-1.5 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'bg-slate-800 text-amber-400' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' }} transition-colors">
                    Overview
                </a>
                <a href="{{ route('admin.portfolio.index') }}" 
                   class="px-3 py-1.5 rounded-lg {{ request()->routeIs('admin.portfolio.*') ? 'bg-slate-800 text-amber-400' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' }} transition-colors">
                    Photos & Works
                </a>
                <a href="{{ route('admin.services.index') }}" 
                   class="px-3 py-1.5 rounded-lg {{ request()->routeIs('admin.services.*') ? 'bg-slate-800 text-amber-400' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' }} transition-colors">
                    Services
                </a>
                <a href="{{ route('admin.categories.index') }}" 
                   class="px-3 py-1.5 rounded-lg {{ request()->routeIs('admin.categories.*') ? 'bg-slate-800 text-amber-400' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' }} transition-colors">
                    Categories
                </a>
                <a href="{{ route('admin.leads.index') }}" 
                   class="px-3 py-1.5 rounded-lg {{ request()->routeIs('admin.leads.*') ? 'bg-slate-800 text-amber-400' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' }} transition-colors flex items-center gap-1.5">
                    Inquiries
                </a>
                <a href="{{ route('admin.settings.index') }}" 
                   class="px-3 py-1.5 rounded-lg {{ request()->routeIs('admin.settings.*') ? 'bg-slate-800 text-amber-400' : 'text-slate-300 hover:text-white hover:bg-slate-800/60' }} transition-colors">
                    Settings
                </a>
            </nav>

            <!-- Actions (Desktop & Mobile) -->
            <div class="flex items-center gap-2 sm:gap-3">
                <a href="{{ route('home') }}" target="_blank" class="px-2.5 py-1.5 rounded-lg bg-slate-800/80 hover:bg-slate-800 text-xs text-slate-300 hover:text-white transition-colors flex items-center gap-1">
                    <span class="hidden sm:inline">View Site</span>
                    <span class="sm:hidden text-xs">Site &nearr;</span>
                    <svg class="w-3.5 h-3.5 hidden sm:inline" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/></svg>
                </a>

                <form action="{{ route('admin.logout') }}" method="POST" class="hidden sm:block">
                    @csrf
                    <button type="submit" class="px-3 py-1.5 rounded-lg bg-slate-800 hover:bg-slate-700 text-slate-300 hover:text-white text-xs font-bold transition-colors cursor-pointer">
                        Sign Out
                    </button>
                </form>

                <!-- Mobile Hamburger Button -->
                <button @click="mobileNav = !mobileNav" 
                        class="md:hidden p-2 rounded-lg text-slate-300 hover:text-white hover:bg-slate-800 focus:outline-none" 
                        aria-label="Toggle navigation menu">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path x-show="!mobileNav" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        <path x-show="mobileNav" x-cloak stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>

        </div>

        <!-- Mobile Nav Drawer -->
        <div x-show="mobileNav" 
             x-cloak 
             @click.away="mobileNav = false" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-2"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-2"
             class="md:hidden bg-slate-900 border-t border-slate-800 px-4 py-3 space-y-2 shadow-2xl">
            <a href="{{ route('admin.dashboard') }}" 
               @click="mobileNav = false"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('admin.dashboard') ? 'bg-amber-500/10 text-amber-400 font-bold' : 'text-slate-300 hover:bg-slate-800' }}">
                <span>📊</span> Overview
            </a>
            <a href="{{ route('admin.portfolio.index') }}" 
               @click="mobileNav = false"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('admin.portfolio.*') ? 'bg-amber-500/10 text-amber-400 font-bold' : 'text-slate-300 hover:bg-slate-800' }}">
                <span>📸</span> Photos & Works
            </a>
            <a href="{{ route('admin.services.index') }}" 
               @click="mobileNav = false"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('admin.services.*') ? 'bg-amber-500/10 text-amber-400 font-bold' : 'text-slate-300 hover:bg-slate-800' }}">
                <span>🛠️</span> Services & Catalog
            </a>
            <a href="{{ route('admin.categories.index') }}" 
               @click="mobileNav = false"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('admin.categories.*') ? 'bg-amber-500/10 text-amber-400 font-bold' : 'text-slate-300 hover:bg-slate-800' }}">
                <span>🏷️</span> Categories
            </a>
            <a href="{{ route('admin.leads.index') }}" 
               @click="mobileNav = false"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('admin.leads.*') ? 'bg-amber-500/10 text-amber-400 font-bold' : 'text-slate-300 hover:bg-slate-800' }}">
                <span>💬</span> Customer Inquiries
            </a>
            <a href="{{ route('admin.settings.index') }}" 
               @click="mobileNav = false"
               class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-semibold {{ request()->routeIs('admin.settings.*') ? 'bg-amber-500/10 text-amber-400 font-bold' : 'text-slate-300 hover:bg-slate-800' }}">
                <span>⚙️</span> Settings & Profile
            </a>

            <div class="pt-3 border-t border-slate-800 flex items-center justify-between gap-3">
                <a href="{{ route('home') }}" target="_blank" class="flex-1 text-center py-2 px-3 rounded-lg bg-slate-800 text-xs text-slate-300 font-bold">
                    View Live Site &nearr;
                </a>
                <form action="{{ route('admin.logout') }}" method="POST" class="flex-1">
                    @csrf
                    <button type="submit" class="w-full text-center py-2 px-3 rounded-lg bg-red-950/60 border border-red-900 text-xs text-red-300 font-bold">
                        Sign Out
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content Area -->
    <main class="max-w-7xl mx-auto px-3.5 sm:px-6 py-6 sm:py-8 flex-1 w-full">
        
        <!-- Alerts -->
        @if(session('success'))
            <div class="mb-5 p-3.5 sm:p-4 rounded-xl bg-emerald-50 border border-emerald-200 text-emerald-900 text-xs font-bold flex items-center justify-between shadow-xs">
                <span class="flex items-center gap-2">
                    <span class="text-emerald-600 font-black">✓</span> {{ session('success') }}
                </span>
                <span class="text-emerald-700 hover:text-emerald-900 cursor-pointer p-1 text-base leading-none" onclick="this.parentElement.remove()">&times;</span>
            </div>
        @endif

        @if(isset($errors) && $errors->any())
            <div class="mb-5 p-3.5 sm:p-4 rounded-xl bg-red-50 border border-red-200 text-red-900 text-xs font-bold shadow-xs">
                <ul class="list-disc pl-4 space-y-1">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @yield('content')
    </main>

    <!-- Mobile Bottom App Bar -->
    <nav class="md:hidden fixed bottom-0 left-0 right-0 z-40 bg-slate-900/95 backdrop-blur-md border-t border-slate-800 px-2 py-1.5 shadow-2xl flex items-center justify-around safe-area-bottom">
        <a href="{{ route('admin.dashboard') }}" 
           class="flex flex-col items-center justify-center py-1 px-2 rounded-lg {{ request()->routeIs('admin.dashboard') ? 'text-amber-400 font-bold' : 'text-slate-400 hover:text-slate-200' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/></svg>
            <span class="text-[10px] mt-0.5">Overview</span>
        </a>
        <a href="{{ route('admin.portfolio.index') }}" 
           class="flex flex-col items-center justify-center py-1 px-2 rounded-lg {{ request()->routeIs('admin.portfolio.*') ? 'text-amber-400 font-bold' : 'text-slate-400 hover:text-slate-200' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            <span class="text-[10px] mt-0.5">Photos</span>
        </a>
        <a href="{{ route('admin.services.index') }}" 
           class="flex flex-col items-center justify-center py-1 px-2 rounded-lg {{ request()->routeIs('admin.services.*') ? 'text-amber-400 font-bold' : 'text-slate-400 hover:text-slate-200' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/></svg>
            <span class="text-[10px] mt-0.5">Services</span>
        </a>
        <a href="{{ route('admin.leads.index') }}" 
           class="flex flex-col items-center justify-center py-1 px-2 rounded-lg {{ request()->routeIs('admin.leads.*') ? 'text-amber-400 font-bold' : 'text-slate-400 hover:text-slate-200' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/></svg>
            <span class="text-[10px] mt-0.5">Inquiries</span>
        </a>
        <a href="{{ route('admin.settings.index') }}" 
           class="flex flex-col items-center justify-center py-1 px-2 rounded-lg {{ request()->routeIs('admin.settings.*') ? 'text-amber-400 font-bold' : 'text-slate-400 hover:text-slate-200' }}">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
            <span class="text-[10px] mt-0.5">Settings</span>
        </a>
    </nav>

    <!-- Desktop Footer -->
    <footer class="bg-white border-t border-slate-200 py-4 text-center text-xs text-slate-500 hidden md:block">
        AGM Always Good Making • Admin Management System
    </footer>

</body>
</html>
