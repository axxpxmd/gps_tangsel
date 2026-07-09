<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>@yield('title', 'CMS') — GPS TangSel</title>

    <link rel="icon" href="{{ asset('logo-gps.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
        @theme {
            --color-primary: #2F5FA3;
            --color-primary-dark: #244B82;
            --color-primary-light: #E8EEF7;
            --color-gold: #D4A437;
            --color-gold-light: #F5E6B8;
            --color-dawn-night: #0A1633;
            --color-dawn-deep: #1E2A5E;
            --font-sans: 'Plus Jakarta Sans', 'Inter', ui-sans-serif, system-ui, sans-serif;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Inter', ui-sans-serif, system-ui, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased min-h-screen">
    <div class="flex min-h-screen">
        {{-- Sidebar --}}
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

        {{-- Main Content --}}
        <div class="flex-1 lg:pl-64">
            {{-- Top Bar --}}
            <header class="sticky top-0 z-30 bg-white border-b border-gray-200 h-16 flex items-center px-4 sm:px-6 lg:px-8">
                <button type="button" class="lg:hidden p-2 -ml-2 rounded-lg hover:bg-gray-100 mr-3" id="mobile-sidebar-toggle">
                    <svg class="w-6 h-6 text-gray-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                </button>
                <h1 class="text-sm font-semibold text-gray-700">@yield('page_title', 'Dashboard')</h1>
            </header>

            {{-- Page Content --}}
            <main class="p-4 sm:p-6 lg:p-8">
                @yield('content')
            </main>
        </div>
    </div>

    {{-- Mobile Sidebar Overlay --}}
    <div class="lg:hidden fixed inset-0 z-30 bg-black/50 hidden" id="sidebar-overlay"></div>
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

    <script>
        const toggle = document.getElementById('mobile-sidebar-toggle');
        const sidebar = document.getElementById('mobile-sidebar');
        const overlay = document.getElementById('sidebar-overlay');
        const close = document.getElementById('mobile-sidebar-close');

        function openSidebar() {
            sidebar.classList.remove('-translate-x-full');
            overlay.classList.remove('hidden');
        }
        function closeSidebar() {
            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }

        if (toggle) toggle.addEventListener('click', openSidebar);
        if (close) close.addEventListener('click', closeSidebar);
        if (overlay) overlay.addEventListener('click', closeSidebar);
    </script>
</body>
</html>
