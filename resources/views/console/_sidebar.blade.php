{{-- Desktop Sidebar --}}
<aside class="hidden lg:flex lg:flex-col w-64 bg-dawn-night fixed inset-y-0 left-0 z-40">
    <div class="flex items-center gap-3 px-6 h-16 border-b border-white/10">
        <img src="{{ asset('logo-gps.png') }}" alt="GPS TangSel" class="w-9 h-9 rounded-lg">
        <div>
            <span class="text-sm font-bold text-white block leading-tight">GPS TangSel</span>
            <span class="text-[10px] text-white/40 tracking-wider uppercase">CMS Panel</span>
        </div>
    </div>

    <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
        <p class="px-3 mb-2 text-[10px] font-semibold text-white/30 uppercase tracking-wider">Menu</p>

        <a href="{{ route('console.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-white/70 hover:text-white hover:bg-white/10 transition-colors duration-200 {{ request()->routeIs('console.dashboard') ? 'bg-white/10 text-white' : '' }}">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zm0 9.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zm0 9.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
            </svg>
            Dashboard
        </a>
    </nav>

    <div class="p-4 border-t border-white/10">
        <div class="flex items-center gap-3 px-3 py-2.5">
            <div class="w-8 h-8 rounded-full bg-primary flex items-center justify-center text-xs font-bold text-white">
                {{ auth()->user()->initials() }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-medium text-white truncate">{{ auth()->user()->name }}</p>
                <p class="text-[10px] text-white/40 truncate">{{ auth()->user()->email }}</p>
            </div>
        </div>
        <form action="{{ route('console.logout') }}" method="POST" class="mt-2">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-lg text-xs font-medium text-white/50 hover:text-red-400 hover:bg-red-500/10 transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/>
                </svg>
                Keluar
            </button>
        </form>
    </div>
</aside>

{{-- Mobile Sidebar Overlay --}}
<div class="lg:hidden fixed inset-0 z-30 bg-black/50 hidden" id="sidebar-overlay"></div>

{{-- Mobile Sidebar --}}
<div class="lg:hidden fixed inset-y-0 left-0 z-40 w-64 bg-dawn-night transform -translate-x-full transition-transform duration-300" id="mobile-sidebar">
    <div class="flex items-center justify-between px-6 h-16 border-b border-white/10">
        <div class="flex items-center gap-3">
            <img src="{{ asset('logo-gps.png') }}" alt="GPS TangSel" class="w-9 h-9 rounded-lg">
            <span class="text-sm font-bold text-white">CMS Panel</span>
        </div>
        <button type="button" class="p-1 rounded-lg hover:bg-white/10 text-white/50" id="mobile-sidebar-close">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
    <nav class="px-3 py-4 space-y-1">
        <a href="{{ route('console.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-lg text-sm font-medium text-white/70 hover:text-white hover:bg-white/10 transition-colors duration-200">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zm0 9.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zm0 9.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
            </svg>
            Dashboard
        </a>
    </nav>
</div>
