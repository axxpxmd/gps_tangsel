{{-- Desktop Sidebar --}}
<aside class="hidden lg:flex lg:flex-col w-64 bg-white border-r border-gray-200 fixed inset-y-0 left-0 z-40">
    {{-- Brand --}}
    <a href="{{ route('console.dashboard') }}" class="flex items-center gap-3 px-5 h-16 border-b border-gray-200 hover:bg-gray-50 transition-colors duration-200">
        <img src="{{ asset('logo-gps.png') }}" alt="GPS TangSel" class="w-9 h-9 rounded-xl object-cover">
        <div>
            <span class="text-sm font-extrabold text-gray-900 tracking-tight leading-tight">GPS TANGSEL</span>
            <span class="block text-[9px] text-primary/70 tracking-[0.15em] uppercase">CMS Panel</span>
        </div>
    </a>

    {{-- Navigation --}}
    <nav class="flex-1 px-3 py-5 space-y-5 overflow-y-auto">
        {{-- Dashboard --}}
        <div>
            <p class="px-3 mb-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Dashboard</p>
            <a href="{{ route('console.dashboard') }}" class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('console.dashboard') ? 'bg-primary/10 text-primary shadow-sm' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50' }}">
                <span class="w-8 h-8 rounded-lg flex items-center justify-center transition-all duration-200 {{ request()->routeIs('console.dashboard') ? 'bg-primary text-white shadow-sm' : 'bg-gray-100 text-gray-500 group-hover:bg-gray-200 group-hover:text-gray-700' }}">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zm0 9.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zm0 9.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
                    </svg>
                </span>
                <span>Dashboard</span>
                @if (request()->routeIs('console.dashboard'))
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-gold"></span>
                @endif
            </a>
        </div>

        {{-- Konten --}}
        <div>
            <p class="px-3 mb-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Konten</p>
            <div class="space-y-1">
                <a href="{{ route('console.articles.index') }}" class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('console.articles.*') ? 'bg-primary/10 text-primary shadow-sm' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50' }}">
                    <span class="w-8 h-8 rounded-lg flex items-center justify-center transition-all duration-200 {{ request()->routeIs('console.articles.*') ? 'bg-primary text-white shadow-sm' : 'bg-gray-100 text-gray-500 group-hover:bg-gray-200 group-hover:text-gray-700' }}">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/></svg>
                    </span>
                    <span>Artikel</span>
                    @if (request()->routeIs('console.articles.*'))
                        <span class="ml-auto w-1.5 h-1.5 rounded-full bg-gold"></span>
                    @endif
                </a>

                <a href="{{ route('console.programs.index') }}" class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('console.programs.*') ? 'bg-primary/10 text-primary shadow-sm' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50' }}">
                    <span class="w-8 h-8 rounded-lg flex items-center justify-center transition-all duration-200 {{ request()->routeIs('console.programs.*') ? 'bg-primary text-white shadow-sm' : 'bg-gray-100 text-gray-500 group-hover:bg-gray-200 group-hover:text-gray-700' }}">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zm0 9.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zm0 9.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
                        </svg>
                    </span>
                    <span>Program</span>
                    @if (request()->routeIs('console.programs.*'))
                        <span class="ml-auto w-1.5 h-1.5 rounded-full bg-gold"></span>
                    @endif
                </a>

                <a href="{{ route('console.activities.index') }}" class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('console.activities.*') ? 'bg-primary/10 text-primary shadow-sm' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50' }}">
                    <span class="w-8 h-8 rounded-lg flex items-center justify-center transition-all duration-200 {{ request()->routeIs('console.activities.*') ? 'bg-primary text-white shadow-sm' : 'bg-gray-100 text-gray-500 group-hover:bg-gray-200 group-hover:text-gray-700' }}">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/></svg>
                    </span>
                    <span>Agenda</span>
                    @if (request()->routeIs('console.activities.*'))
                        <span class="ml-auto w-1.5 h-1.5 rounded-full bg-gold"></span>
                    @endif
                </a>

                <a href="{{ route('console.galleries.index') }}" class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('console.galleries.*') ? 'bg-primary/10 text-primary shadow-sm' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50' }}">
                    <span class="w-8 h-8 rounded-lg flex items-center justify-center transition-all duration-200 {{ request()->routeIs('console.galleries.*') ? 'bg-primary text-white shadow-sm' : 'bg-gray-100 text-gray-500 group-hover:bg-gray-200 group-hover:text-gray-700' }}">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                    </span>
                    <span>Galeri</span>
                    @if (request()->routeIs('console.galleries.*'))
                        <span class="ml-auto w-1.5 h-1.5 rounded-full bg-gold"></span>
                    @endif
                </a>
            </div>
        </div>

        {{-- Data Master --}}
        <div>
            <p class="px-3 mb-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Data Master</p>
            <div class="space-y-1">
                <a href="{{ route('console.categories.index') }}" class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('console.categories.*') ? 'bg-primary/10 text-primary shadow-sm' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50' }}">
                    <span class="w-8 h-8 rounded-lg flex items-center justify-center transition-all duration-200 {{ request()->routeIs('console.categories.*') ? 'bg-primary text-white shadow-sm' : 'bg-gray-100 text-gray-500 group-hover:bg-gray-200 group-hover:text-gray-700' }}">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"/><path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z"/></svg>
                    </span>
                    <span>Kategori</span>
                    @if (request()->routeIs('console.categories.*'))
                        <span class="ml-auto w-1.5 h-1.5 rounded-full bg-gold"></span>
                    @endif
                </a>

                <a href="{{ route('console.tags.index') }}" class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('console.tags.*') ? 'bg-primary/10 text-primary shadow-sm' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50' }}">
                    <span class="w-8 h-8 rounded-lg flex items-center justify-center transition-all duration-200 {{ request()->routeIs('console.tags.*') ? 'bg-primary text-white shadow-sm' : 'bg-gray-100 text-gray-500 group-hover:bg-gray-200 group-hover:text-gray-700' }}">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M5.25 2.25a3 3 0 00-3 3v4.318a3 3 0 00.879 2.121l9.58 9.581c.92.92 2.39 1.138 3.548.428a18.849 18.849 0 005.441-5.44c.71-1.157.51-2.625-.428-3.548l-9.58-9.581a3 3 0 00-2.122-.88H5.25zM6.375 7.5a1.125 1.125 0 100-2.25 1.125 1.125 0 000 2.25z"/></svg>
                    </span>
                    <span>Tag</span>
                    @if (request()->routeIs('console.tags.*'))
                        <span class="ml-auto w-1.5 h-1.5 rounded-full bg-gold"></span>
                    @endif
                </a>

                <a href="{{ route('console.hadits.index') }}" class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('console.hadits.*') ? 'bg-primary/10 text-primary shadow-sm' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50' }}">
                    <span class="w-8 h-8 rounded-lg flex items-center justify-center transition-all duration-200 {{ request()->routeIs('console.hadits.*') ? 'bg-primary text-white shadow-sm' : 'bg-gray-100 text-gray-500 group-hover:bg-gray-200 group-hover:text-gray-700' }}">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 16.8 5.8 21.3l2.4-7.4L2 9.4h7.6z"/></svg>
                    </span>
                    <span>Hadits</span>
                    @if (request()->routeIs('console.hadits.*'))
                        <span class="ml-auto w-1.5 h-1.5 rounded-full bg-gold"></span>
                    @endif
                </a>
            </div>
        </div>

        {{-- Organisasi --}}
        <div>
            <p class="px-3 mb-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Organisasi</p>
            <div class="space-y-1">
                <a href="{{ route('console.board-members.index') }}" class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('console.board-members.*') ? 'bg-primary/10 text-primary shadow-sm' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50' }}">
                    <span class="w-8 h-8 rounded-lg flex items-center justify-center transition-all duration-200 {{ request()->routeIs('console.board-members.*') ? 'bg-primary text-white shadow-sm' : 'bg-gray-100 text-gray-500 group-hover:bg-gray-200 group-hover:text-gray-700' }}">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                    </span>
                    <span>Pengurus</span>
                    @if (request()->routeIs('console.board-members.*'))
                        <span class="ml-auto w-1.5 h-1.5 rounded-full bg-gold"></span>
                    @endif
                </a>

                <a href="{{ route('console.partners.index') }}" class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('console.partners.*') ? 'bg-primary/10 text-primary shadow-sm' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50' }}">
                    <span class="w-8 h-8 rounded-lg flex items-center justify-center transition-all duration-200 {{ request()->routeIs('console.partners.*') ? 'bg-primary text-white shadow-sm' : 'bg-gray-100 text-gray-500 group-hover:bg-gray-200 group-hover:text-gray-700' }}">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                        </svg>
                    </span>
                    <span>Partner</span>
                    @if (request()->routeIs('console.partners.*'))
                        <span class="ml-auto w-1.5 h-1.5 rounded-full bg-gold"></span>
                    @endif
                </a>
            </div>
        </div>

        {{-- Tools --}}
        <div>
            <p class="px-3 mb-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Tools</p>
            <a href="{{ route('console.article-old.index') }}" class="group flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium transition-all duration-200 {{ request()->routeIs('console.article-old.*') ? 'bg-primary/10 text-primary shadow-sm' : 'text-gray-500 hover:text-gray-900 hover:bg-gray-50' }}">
                <span class="w-8 h-8 rounded-lg flex items-center justify-center transition-all duration-200 {{ request()->routeIs('console.article-old.*') ? 'bg-primary text-white shadow-sm' : 'bg-gray-100 text-gray-500 group-hover:bg-gray-200 group-hover:text-gray-700' }}">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                </span>
                <span>Berita WP</span>
                @if (request()->routeIs('console.article-old.*'))
                    <span class="ml-auto w-1.5 h-1.5 rounded-full bg-gold"></span>
                @endif
            </a>
        </div>
    </nav>

    {{-- User Info --}}
    <div class="mx-3 mb-3 rounded-2xl bg-gray-50 border border-gray-200 p-4">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-gold to-amber-600 flex items-center justify-center text-sm font-bold text-white shadow-md">
                {{ auth()->user()->initials() }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-gray-900 truncate">{{ auth()->user()->name }}</p>
                <p class="text-[11px] text-gray-500 truncate">{{ auth()->user()->username }}</p>
            </div>
        </div>
        <form action="{{ route('console.logout') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-xl text-xs font-medium text-gray-400 hover:text-red-500 hover:bg-red-50 transition-all duration-200">
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
<div class="lg:hidden fixed inset-y-0 left-0 z-40 w-72 bg-white border-r border-gray-200 transform -translate-x-full transition-transform duration-300 ease-out shadow-2xl" id="mobile-sidebar">
    <div class="flex items-center justify-between px-5 h-16 border-b border-gray-200">
        <div class="flex items-center gap-3">
            <img src="{{ asset('logo-gps.png') }}" alt="GPS TangSel" class="w-9 h-9 rounded-xl object-cover">
            <div>
                <span class="text-xs font-extrabold text-gray-900 leading-tight">GPS TangSel</span>
                <span class="block text-[9px] text-primary/70 tracking-[0.15em] uppercase">CMS Panel</span>
            </div>
        </div>
        <button type="button" class="p-1.5 rounded-xl hover:bg-gray-100 text-gray-400 hover:text-gray-700 transition-colors duration-200" id="mobile-sidebar-close">
            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    <nav class="px-4 py-5 space-y-4 overflow-y-auto">
        {{-- Dashboard --}}
        <div>
            <p class="px-3 mb-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Dashboard</p>
            <a href="{{ route('console.dashboard') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50 transition-all duration-200">
                <span class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zm0 9.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zm0 9.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
                    </svg>
                </span>
                <span>Dashboard</span>
            </a>
        </div>

        {{-- Konten --}}
        <div>
            <p class="px-3 mb-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Konten</p>
            <div class="space-y-1.5">
                <a href="{{ route('console.articles.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50 transition-all duration-200">
                    <span class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/></svg>
                    </span>
                    <span>Artikel</span>
                </a>

                <a href="{{ route('console.programs.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50 transition-all duration-200">
                    <span class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zm0 9.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zm0 9.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
                        </svg>
                    </span>
                    <span>Program</span>
                </a>

                <a href="{{ route('console.activities.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50 transition-all duration-200">
                    <span class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/></svg>
                    </span>
                    <span>Agenda</span>
                </a>

                <a href="{{ route('console.galleries.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50 transition-all duration-200">
                    <span class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                    </span>
                    <span>Galeri</span>
                </a>
            </div>
        </div>

        {{-- Data Master --}}
        <div>
            <p class="px-3 mb-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Data Master</p>
            <div class="space-y-1.5">
                <a href="{{ route('console.categories.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50 transition-all duration-200">
                    <span class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"/><path stroke-linecap="round" stroke-linejoin="round" d="M6 6h.008v.008H6V6z"/></svg>
                    </span>
                    <span>Kategori</span>
                </a>

                <a href="{{ route('console.tags.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50 transition-all duration-200">
                    <span class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M5.25 2.25a3 3 0 00-3 3v4.318a3 3 0 00.879 2.121l9.58 9.581c.92.92 2.39 1.138 3.548.428a18.849 18.849 0 005.441-5.44c.71-1.157.51-2.625-.428-3.548l-9.58-9.581a3 3 0 00-2.122-.88H5.25zM6.375 7.5a1.125 1.125 0 100-2.25 1.125 1.125 0 000 2.25z"/></svg>
                    </span>
                    <span>Tag</span>
                </a>

                <a href="{{ route('console.hadits.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50 transition-all duration-200">
                    <span class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 16.8 5.8 21.3l2.4-7.4L2 9.4h7.6z"/></svg>
                    </span>
                    <span>Hadits</span>
                </a>
            </div>
        </div>

        {{-- Organisasi --}}
        <div>
            <p class="px-3 mb-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Organisasi</p>
            <div class="space-y-1.5">
                <a href="{{ route('console.board-members.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50 transition-all duration-200">
                    <span class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/></svg>
                    </span>
                    <span>Pengurus</span>
                </a>

                <a href="{{ route('console.partners.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50 transition-all duration-200">
                    <span class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                        </svg>
                    </span>
                    <span>Partner</span>
                </a>
            </div>
        </div>

        {{-- Tools --}}
        <div>
            <p class="px-3 mb-2 text-[10px] font-bold text-gray-400 uppercase tracking-widest">Tools</p>
            <a href="{{ route('console.article-old.index') }}" class="flex items-center gap-3 px-3 py-2.5 rounded-xl text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-50 transition-all duration-200">
                <span class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center text-gray-500">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/></svg>
                </span>
                <span>Berita WP</span>
            </a>
        </div>
    </nav>

    <div class="mx-4 mb-4 rounded-2xl bg-gray-50 border border-gray-200 p-4">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-full bg-gradient-to-br from-gold to-amber-600 flex items-center justify-center text-sm font-bold text-white shadow-md">
                {{ auth()->user()->initials() }}
            </div>
            <div class="flex-1 min-w-0">
                <p class="text-sm font-semibold text-gray-900 truncate">{{ auth()->user()->name }}</p>
                <p class="text-[11px] text-gray-500 truncate">{{ auth()->user()->username }}</p>
            </div>
        </div>
        <form action="{{ route('console.logout') }}" method="POST" class="mt-3">
            @csrf
            <button type="submit" class="w-full flex items-center justify-center gap-2 px-3 py-2 rounded-xl text-xs font-medium text-gray-400 hover:text-red-500 hover:bg-red-50 transition-all duration-200">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15m3 0l3-3m0 0l-3-3m3 3H9"/>
                </svg>
                Keluar
            </button>
        </form>
    </div>
</div>
