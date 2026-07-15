<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Gerakan Pejuang Subuh (GPS) Tangerang Selatan — Mengajak masyarakat istiqomah shalat subuh berjamaah di masjid.')">

    <title>@yield('title', 'Beranda') — GPS TANGSEL</title>

    <link rel="icon" href="{{ asset('logo-gps.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Amiri:wght@400;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

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
            --color-dawn-glow: #3D3578;
            --font-sans: 'Plus Jakarta Sans', 'Inter', ui-sans-serif, system-ui, sans-serif;
            --font-arabic: 'Amiri', 'Plus Jakarta Sans', serif;
        }
    </style>

        <style>
            html {
                scroll-behavior: smooth;
            }

            [x-cloak] { display: none !important; }

            body {
            font-family: 'Plus Jakarta Sans', 'Inter', ui-sans-serif, system-ui, sans-serif;
        }

        .font-arabic {
            font-family: 'Amiri', serif;
        }

        {{-- Islamic geometric pattern (8-pointed star / khatim) --}}
        .islamic-pattern {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' viewBox='0 0 80 80'%3E%3Cg fill='none' stroke='white' stroke-width='1'%3E%3Cpath d='M40 8 L52 28 L72 40 L52 52 L40 72 L28 52 L8 40 L28 28 Z'/%3E%3Cpath d='M40 20 L48 32 L60 40 L48 48 L40 60 L32 48 L20 40 L32 32 Z'/%3E%3Ccircle cx='40' cy='40' r='6'/%3E%3C/g%3E%3C/svg%3E");
            background-size: 80px 80px;
        }

        .islamic-pattern-dark {
            background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='80' height='80' viewBox='0 0 80 80'%3E%3Cg fill='none' stroke='%232F5FA3' stroke-width='1'%3E%3Cpath d='M40 8 L52 28 L72 40 L52 52 L40 72 L28 52 L8 40 L28 28 Z'/%3E%3Cpath d='M40 20 L48 32 L60 40 L48 48 L40 60 L32 48 L20 40 L32 32 Z'/%3E%3Ccircle cx='40' cy='40' r='6'/%3E%3C/g%3E%3C/svg%3E");
            background-size: 80px 80px;
        }

        {{-- Text gradient helpers --}}
        .text-gradient-gold {
            background: linear-gradient(135deg, #F5E6B8 0%, #D4A437 50%, #B8860B 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        .text-gradient-primary {
            background: linear-gradient(135deg, #2F5FA3 0%, #4A7BC8 50%, #2F5FA3 100%);
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
        }

        {{-- Glassmorphism --}}
        .glass {
            background: rgba(255, 255, 255, 0.08);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.15);
        }

        {{-- Animations --}}
        @keyframes floaty {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-12px); }
        }
        .animate-floaty { animation: floaty 6s ease-in-out infinite; }
        .animate-floaty-slow { animation: floaty 8s ease-in-out infinite; }

        @keyframes pulseGlow {
            0%, 100% { opacity: 0.4; transform: scale(1); }
            50% { opacity: 0.7; transform: scale(1.08); }
        }
        .animate-pulse-glow { animation: pulseGlow 5s ease-in-out infinite; }

        @keyframes shimmer {
            0% { background-position: -200% 0; }
            100% { background-position: 200% 0; }
        }

        {{-- Scroll reveal --}}
        .reveal {
            opacity: 0;
            transform: translateY(28px);
            transition: opacity 0.7s cubic-bezier(0.22, 1, 0.36, 1), transform 0.7s cubic-bezier(0.22, 1, 0.36, 1);
        }
        .reveal.is-visible {
            opacity: 1;
            transform: translateY(0);
        }

        {{-- Gradient border card on hover --}}
        .gradient-border {
            position: relative;
            overflow: hidden;
        }
        .gradient-border::before {
            content: '';
            position: absolute;
            inset: 0;
            padding: 1px;
            border-radius: inherit;
            background: linear-gradient(135deg, #2F5FA3, #D4A437);
            -webkit-mask: linear-gradient(#fff 0 0) content-box, linear-gradient(#fff 0 0);
            -webkit-mask-composite: xor;
            mask-composite: exclude;
            opacity: 0;
            transition: opacity 0.3s ease;
        }
        .gradient-border:hover::before {
            opacity: 1;
        }

        {{-- Scrollbar polish --}}
        ::-webkit-scrollbar { width: 10px; height: 10px; }
        ::-webkit-scrollbar-track { background: #f1f5f9; }
        ::-webkit-scrollbar-thumb { background: #cbd5e1; border-radius: 9999px; border: 2px solid #f1f5f9; }
        ::-webkit-scrollbar-thumb:hover { background: #94a3b8; }
    </style>

    @stack('styles')
</head>
<body class="font-sans text-gray-800 bg-white antialiased">

    @include('layouts._header')

    {{-- Main Content --}}
    <main>
        @yield('content')
        {!! $slot ?? '' !!}
    </main>

    @include('layouts._footer')

    {{-- Mobile Menu & Interactions Script --}}
    <script>
        function initPage() {
            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            const iconOpen = document.getElementById('menu-icon-open');
            const iconClose = document.getElementById('menu-icon-close');

            if (btn) {
                btn.addEventListener('click', function () {
                    const isOpen = !menu.classList.contains('hidden');
                    menu.classList.toggle('hidden');
                    iconOpen.classList.toggle('hidden');
                    iconClose.classList.toggle('hidden');
                });
            }

            // Close mobile menu when clicking on anchor links
            document.querySelectorAll('.mobile-nav-link').forEach(function (link) {
                link.addEventListener('click', function () {
                    if (menu) menu.classList.add('hidden');
                    if (iconOpen) iconOpen.classList.remove('hidden');
                    if (iconClose) iconClose.classList.add('hidden');
                });
            });

            // Mobile profile submenu toggle
            const mobileProfilToggle = document.getElementById('mobile-profil-toggle');
            const mobileProfilSubmenu = document.getElementById('mobile-profil-submenu');
            const mobileProfilIcon = document.getElementById('mobile-profil-icon');
            if (mobileProfilToggle && mobileProfilSubmenu) {
                mobileProfilToggle.addEventListener('click', function (e) {
                    e.stopPropagation();
                    mobileProfilSubmenu.classList.toggle('hidden');
                    if (mobileProfilIcon) {
                        mobileProfilIcon.classList.toggle('rotate-180');
                    }
                });
                mobileProfilSubmenu.querySelectorAll('.mobile-nav-link').forEach(function (link) {
                    link.addEventListener('click', function () {
                        if (menu) menu.classList.add('hidden');
                        if (iconOpen) iconOpen.classList.remove('hidden');
                        if (iconClose) iconClose.classList.add('hidden');
                    });
                });
            }

            // Navbar scroll effect: transparent glass pill over hero -> solid white pill on scroll
            const navbarPill = document.getElementById('navbar-pill');
            const navbarInner = document.getElementById('navbar-inner');
            const brand = document.querySelector('.navbar-brand');
            const tagline = document.querySelector('.navbar-tagline');
            const navLinks = document.querySelectorAll('.navbar-link');
            const mobileMenuPanel = document.querySelector('.mobile-menu-panel');

            function applyNavbarState(scrolled) {
                if (!navbarPill || !navbarInner) return;

                if (scrolled) {
                    navbarPill.classList.remove('glass', 'border-white/15');
                    navbarPill.classList.add('bg-white', 'border-gray-200');
                    if (mobileMenuPanel) {
                        mobileMenuPanel.classList.remove('border-white/10');
                        mobileMenuPanel.classList.add('border-gray-200');
                    }
                    if (brand) {
                        brand.classList.remove('text-white');
                        brand.classList.add('text-primary');
                    }
                    if (tagline) {
                        tagline.classList.remove('text-gold-light/70');
                        tagline.classList.add('text-gold/80');
                    }
                } else {
                    navbarPill.classList.add('glass', 'border-white/15');
                    navbarPill.classList.remove('bg-white', 'border-gray-200');
                    if (mobileMenuPanel) {
                        mobileMenuPanel.classList.add('border-white/10');
                        mobileMenuPanel.classList.remove('border-gray-200');
                    }
                    if (brand) {
                        brand.classList.add('text-white');
                        brand.classList.remove('text-primary');
                    }
                    if (tagline) {
                        tagline.classList.add('text-gold-light/70');
                        tagline.classList.remove('text-gold/80');
                    }
                }

                navLinks.forEach(function (link) {
                    link.classList.remove(
                        'text-white/80', 'hover:text-white', 'text-white', 'bg-white/10',
                        'text-gray-800', 'hover:text-primary', 'text-primary', 'font-semibold'
                    );

                    if (scrolled) {
                        link.classList.add('text-gray-800', 'hover:text-primary');
                    } else {
                        link.classList.add('text-white/80', 'hover:text-white');
                    }
                });
            }

            let ticking = false;
            window.onScrollNavbar = function () {
                if (!ticking) {
                    window.requestAnimationFrame(function () {
                        applyNavbarState(window.scrollY > 24);
                        ticking = false;
                    });
                    ticking = true;
                }
            };
            window.removeEventListener('scroll', window.onScrollNavbar);
            window.addEventListener('scroll', window.onScrollNavbar);
            applyNavbarState(window.scrollY > 24);

            // Scroll reveal via IntersectionObserver
            const revealEls = document.querySelectorAll('.reveal');
            if ('IntersectionObserver' in window) {
                const observer = new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
                revealEls.forEach(function (el) { observer.observe(el); });
            } else {
                revealEls.forEach(function (el) { el.classList.add('is-visible'); });
            }

            // Count-up animation for [data-count] elements
            function animateCount(el) {
                const target = parseInt(el.getAttribute('data-count'), 10);
                if (isNaN(target)) { return; }
                const duration = 1600;
                const start = performance.now();
                function frame(now) {
                    const progress = Math.min((now - start) / duration, 1);
                    const eased = 1 - Math.pow(1 - progress, 3);
                    el.textContent = Math.floor(eased * target).toString();
                    if (progress < 1) { requestAnimationFrame(frame); }
                    else { el.textContent = target.toString(); }
                }
                requestAnimationFrame(frame);
            }
            const countEls = document.querySelectorAll('[data-count]');
            if ('IntersectionObserver' in window) {
                const countObserver = new IntersectionObserver(function (entries) {
                    entries.forEach(function (entry) {
                        if (entry.isIntersecting) {
                            animateCount(entry.target);
                            countObserver.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.5 });
                countEls.forEach(function (el) { countObserver.observe(el); });
            } else {
                countEls.forEach(function (el) { el.textContent = el.getAttribute('data-count'); });
            }

            // Back to top button logic
            const backToTopBtn = document.getElementById('back-to-top');
            if (backToTopBtn) {
                window.addEventListener('scroll', function () {
                    if (window.scrollY > 300) {
                        backToTopBtn.classList.remove('opacity-0', 'pointer-events-none', 'translate-y-4');
                        backToTopBtn.classList.add('opacity-100', 'translate-y-0');
                    } else {
                        backToTopBtn.classList.add('opacity-0', 'pointer-events-none', 'translate-y-4');
                        backToTopBtn.classList.remove('opacity-100', 'translate-y-0');
                    }
                });

                backToTopBtn.addEventListener('click', function () {
                    window.scrollTo({
                        top: 0,
                        behavior: 'smooth'
                    });
                });
            }
        }

        document.addEventListener('DOMContentLoaded', initPage);
        document.addEventListener('livewire:navigated', initPage);

        {{-- Alpine directive: re-runs after Livewire DOM morphs (e.g. pagination),
            so newly inserted elements get a fresh IntersectionObserver. --}}
        document.addEventListener('alpine:init', () => {
            window.Alpine.directive('reveal', (el) => {
                if (!('IntersectionObserver' in window)) {
                    el.classList.add('is-visible');
                    return;
                }
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) {
                            entry.target.classList.add('is-visible');
                            observer.unobserve(entry.target);
                        }
                    });
                }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
                observer.observe(el);
            });
        });

        {{-- Re-observe .reveal elements after Livewire component updates (pagination, filtering, etc.) --}}
        function observeReveal(el) {
            if (!('IntersectionObserver' in window)) {
                el.classList.add('is-visible');
                return;
            }
            const observer = new IntersectionObserver((entries) => {
                entries.forEach((entry) => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('is-visible');
                        observer.unobserve(entry.target);
                    }
                });
            }, { threshold: 0.12, rootMargin: '0px 0px -40px 0px' });
            observer.observe(el);
        }

        function initLivewireReveal() {
            if (typeof Livewire === 'undefined') return;
            Livewire.hook('morphed', ({ el }) => {
                el.querySelectorAll('.reveal:not(.is-visible)').forEach(observeReveal);
            });
        }

        if (window.Livewire) {
            initLivewireReveal();
        } else {
            document.addEventListener('livewire:initialized', initLivewireReveal);
        }
    </script>

    {{-- Back to Top Button --}}
    <button id="back-to-top" class="fixed bottom-6 right-6 z-50 p-3 rounded-full bg-[#2F5FA3] hover:bg-[#244B82] text-white shadow-lg opacity-0 pointer-events-none transition-all duration-300 transform translate-y-4 hover:-translate-y-0.5 focus:outline-none" aria-label="Kembali ke atas">
        <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="3">
            <path stroke-linecap="round" stroke-linejoin="round" d="M5 10l7-7m0 0l7 7m-7-7v18"/>
        </svg>
    </button>

    @stack('scripts')
</body>
</html>
