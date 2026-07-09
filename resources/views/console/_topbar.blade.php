{{-- Top Bar --}}
<header class="sticky top-0 z-30 bg-white/80 backdrop-blur-md border-b border-gray-200/60 h-16 flex items-center justify-between px-4 sm:px-6 lg:px-8">
    <div class="flex items-center gap-3">
        <button type="button" class="lg:hidden p-2 -ml-2 rounded-xl hover:bg-gray-100 transition-colors duration-200" id="mobile-sidebar-toggle">
            <svg class="w-5 h-5 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
            </svg>
        </button>

        <div>
            <h1 class="text-sm font-bold text-gray-800">@yield('page_title', 'Dashboard')</h1>
            <p class="text-[11px] text-gray-400 hidden sm:block">{{ date('l, d F Y') }}</p>
        </div>
    </div>

    <div class="flex items-center gap-3">
        <a href="{{ route('home') }}" target="_blank" class="hidden sm:inline-flex items-center gap-1.5 px-3 py-1.5 rounded-lg text-xs font-medium text-gray-500 hover:text-primary hover:bg-primary-light transition-all duration-200">
            <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/>
            </svg>
            Lihat Website
        </a>

        <div class="h-6 w-px bg-gray-200 hidden sm:block"></div>

        <div class="flex items-center gap-2">
            <div class="w-8 h-8 rounded-full bg-gradient-to-br from-gold to-amber-600 flex items-center justify-center text-xs font-bold text-white shadow-sm">
                {{ auth()->user()->initials() }}
            </div>
            <span class="text-sm font-medium text-gray-700 hidden sm:block">{{ auth()->user()->name }}</span>
        </div>
    </div>
</header>
