{{-- Desktop Sidebar --}}
<aside class="hidden lg:flex lg:flex-col w-64 bg-gradient-to-b from-dawn-night to-dawn-deep fixed inset-y-0 left-0 z-40">
    {{-- Brand --}}
    <a href="{{ route('console.dashboard') }}" class="flex items-center gap-3 px-6 h-16 border-b border-white/10 hover:bg-white/5 transition-colors duration-200">
        <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center shadow-lg shadow-primary/20">
            <span class="text-xs font-extrabold text-white">GPS</span>
        </div>
        <div>
            <span class="text-sm font-extrabold text-white tracking-tight leading-tight">GPS TangSel</span>
            <span class="block text-[9px] text-gold-light/60 tracking-[0.15em] uppercase">CMS Panel</span>
        </div>
    </a>

    {{-- Navigation --}}
    <nav class="flex-1 px-3 py-5 space-y-1 overflow-y-auto">
        <p class="px-3 mb-3 text-[10px] font-bold text-white/25 uppercase tracking-widest">Menu Utama</p>

        <a href="{{ route('console.dashboard') }}" class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('console.dashboard') ? 'bg-white/10 text-white shadow-sm' : 'text-white/50 hover:text-white hover:bg-white/5' }}">
            <span class="w-8 h-8 rounded-lg flex items-center justify-center transition-all duration-200 {{ request()->routeIs('console.dashboard') ? 'bg-primary text-white shadow-sm' : 'bg-white/5 text-white/40 group-hover:bg-white/10 group-hover:text-white/70' }}">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zm0 9.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zm0 9.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
                </svg>
            </span>
            <span>Dashboard</span>
            @if (request()->routeIs('console.dashboard'))
                <span class="ml-auto w-1.5 h-1.5 rounded-full bg-gold"></span>
            @endif
        </a>

        <a href="{{ route('console.programs.index') }}" class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('console.programs.*') ? 'bg-white/10 text-white shadow-sm' : 'text-white/50 hover:text-white hover:bg-white/5' }}">
            <span class="w-8 h-8 rounded-lg flex items-center justify-center transition-all duration-200 {{ request()->routeIs('console.programs.*') ? 'bg-primary text-white shadow-sm' : 'bg-white/5 text-white/40 group-hover:bg-white/10 group-hover:text-white/70' }}">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zm0 9.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zm0 9.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
                </svg>
            </span>
            <span>Program</span>
            @if (request()->routeIs('console.programs.*'))
                <span class="ml-auto w-1.5 h-1.5 rounded-full bg-gold"></span>
            @endif
        </a>

        <a href="{{ route('console.partners.index') }}" class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('console.partners.*') ? 'bg-white/10 text-white shadow-sm' : 'text-white/50 hover:text-white hover:bg-white/5' }}">
            <span class="w-8 h-8 rounded-lg flex items-center justify-center transition-all duration-200 {{ request()->routeIs('console.partners.*') ? 'bg-primary text-white shadow-sm' : 'bg-white/5 text-white/40 group-hover:bg-white/10 group-hover:text-white/70' }}">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                </svg>
            </span>
            <span>Partner</span>
            @if (request()->routeIs('console.partners.*'))
                <span class="ml-auto w-1.5 h-1.5 rounded-full bg-gold"></span>
            @endif
        </a>
    </nav>

    {{-- User Info --}}
    <div class="mx-3 mb-3 rounded-2xl bg-white/5 border border-white/10 p-4">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-gold to-amber-600 flex items-center justify-center text-sm font-bold text-white shadow-md">
                {{ auth()->user()->initials() }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-white truncate">{{ auth()->user()->name }}</p>
                <p class="text-[11px] text-white/40 truncate">{{ auth()->user()->email }}</p>
            </div>
        </div>
        <form action="{{ route('console.logout') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-xl text-xs font-medium text-white/40 hover:text-red-400 hover:bg-red-500/10 transition-all duration-200">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/>
                </svg>
                Keluar
            </button>
        </form>
    </div>
</aside>

{{-- Mobile Sidebar Overlay --}}
<div class="lg:hidden fixed inset-0 z-30 bg-black/60 backdrop-blur-sm hidden transition-opacity duration-300" id="sidebar-overlay"></div>

{{-- Mobile Sidebar --}}
<div class="lg:hidden fixed inset-y-0 left-0 z-40 w-72 bg-gradient-to-b from-dawn-night to-dawn-deep transform -translate-x-full transition-transform duration-300 ease-out shadow-2xl" id="mobile-sidebar">
    <div class="flex items-center justify-between px-5 h-16 border-b border-white/10">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center shadow-lg shadow-primary/20">
                <span class="text-xs font-extrabold text-white">GPS</span>
            </div>
            <span class="text-sm font-extrabold text-white">CMS Panel</span>
        </div>
        <button type="button" class="p-1.5 rounded-xl hover:bg-white/10 text-white/40 hover:text-white transition-colors duration-200" id="mobile-sidebar-close">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <nav class="px-4 py-5 space-y-1.5">
        <p class="px-3 mb-3 text-[10px] font-bold text-white/25 uppercase tracking-widest">Menu Utama</p>

        <a href="{{ route('console.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-white/50 hover:text-white hover:bg-white/5 transition-all duration-200">
            <span class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-white/40">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zm0 9.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zm0 9.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
                </svg>
            </span>
            <span>Dashboard</span>
        </a>

        <a href="{{ route('console.programs.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-white/50 hover:text-white hover:bg-white/5 transition-all duration-200">
            <span class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-white/40">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zm0 9.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zm0 9.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
                </svg>
            </span>
            <span>Program</span>
        </a>

        <a href="{{ route('console.partners.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-white/50 hover:text-white hover:bg-white/5 transition-all duration-200">
            <span class="w-8 h-8 rounded-lg bg-white/5 flex items-center justify-center text-white/40">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                </svg>
            </span>
            <span>Partner</span>
        </a>
    </nav>

    <div class="mx-4 mb-4 rounded-2xl bg-white/5 border border-white/10 p-4">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-gold to-amber-600 flex items-center justify-center text-sm font-bold text-white shadow-md">
                {{ auth()->user()->initials() }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-white truncate">{{ auth()->user()->name }}</p>
                <p class="text-[11px] text-white/40 truncate">{{ auth()->user()->email }}</p>
            </div>
        </div>
        <form action="{{ route('console.logout') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-xl text-xs font-medium text-white/40 hover:text-red-400 hover:bg-red-500/10 transition-all duration-200">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/>
                </svg>
                Keluar
            </button>
        </form>
    </div>
</div>
