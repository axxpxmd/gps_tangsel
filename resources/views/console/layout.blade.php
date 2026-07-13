<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
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
    @stack('scripts_head')
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
            --font-arabic: 'Amiri', 'Plus Jakarta Sans', serif;
        }
    </style>
    <style>
        body {
            font-family: 'Plus Jakarta Sans', 'Inter', ui-sans-serif, system-ui, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">

    @include('console._sidebar')

    <div class="lg:pl-64">
        @include('console._topbar')

        <main class="p-4 sm:p-6 bg-[#F5F5F5] lg:p-8 min-h-[calc(100vh-4rem)]">
            @yield('content')
        </main>
    </div>

    <script>
        (function () {
            var toggleBtn = document.getElementById('mobile-sidebar-toggle');
            var sidebarEl = document.getElementById('mobile-sidebar');
            var overlayEl = document.getElementById('sidebar-overlay');
            var closeBtn = document.getElementById('mobile-sidebar-close');

            function openSidebar() {
                if (sidebarEl) sidebarEl.classList.remove('-translate-x-full');
                if (overlayEl) overlayEl.classList.remove('hidden');
            }

            function closeSidebar() {
                if (sidebarEl) sidebarEl.classList.add('-translate-x-full');
                if (overlayEl) overlayEl.classList.add('hidden');
            }

            if (toggleBtn) toggleBtn.addEventListener('click', openSidebar);
            if (closeBtn) closeBtn.addEventListener('click', closeSidebar);
            if (overlayEl) overlayEl.addEventListener('click', closeSidebar);
        })();
    </script>
    @stack('scripts')
</body>
</html>
