<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="@yield('meta_description', 'Gerakan Pejuang Subuh (GPS) Tangerang Selatan — Mengajak masyarakat istiqomah shalat subuh berjamaah di masjid.')">

    <title>@yield('title', 'Beranda') — GPS TangSel</title>

    <link rel="icon" href="{{ asset('logo-gps.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Amiri:wght@400;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

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

    {{-- Navbar --}}
    <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-transparent" id="navbar">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20 lg:h-24 transition-all duration-300" id="navbar-inner">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 group" id="logo">
                    <img src="{{ asset('logo-gps.png') }}" alt="Logo GPS TangSel" class="w-11 h-11 lg:w-12 lg:h-12 rounded-xl object-cover transition-all duration-300 group-hover:scale-105">
                    <span class="text-xl lg:text-2xl font-extrabold tracking-tight transition-colors duration-300 navbar-brand text-white">GPS TangSel</span>
                </a>

                {{-- Desktop Navigation --}}
                <nav class="hidden lg:flex items-center gap-1" id="desktop-nav">
                    <a href="{{ route('home') }}" class="nav-link navbar-link navbar-active px-4 py-2 text-sm font-medium rounded-lg transition-colors duration-200 {{ request()->routeIs('home') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white hover:bg-white/10' }}">
                        Beranda
                    </a>
                    <a href="#tentang" class="nav-link px-4 py-2 text-sm font-medium rounded-lg navbar-link text-white/80 hover:text-white hover:bg-white/10 transition-colors duration-200">
                        Tentang
                    </a>
                    <a href="#program" class="nav-link px-4 py-2 text-sm font-medium rounded-lg navbar-link text-white/80 hover:text-white hover:bg-white/10 transition-colors duration-200">
                        Program
                    </a>
                    <a href="#berita" class="nav-link px-4 py-2 text-sm font-medium rounded-lg navbar-link text-white/80 hover:text-white hover:bg-white/10 transition-colors duration-200">
                        Berita
                    </a>
                    <a href="#galeri" class="nav-link px-4 py-2 text-sm font-medium rounded-lg navbar-link text-white/80 hover:text-white hover:bg-white/10 transition-colors duration-200">
                        Galeri
                    </a>
                    <a href="#kontak" class="nav-link px-4 py-2 text-sm font-medium rounded-lg navbar-link text-white/80 hover:text-white hover:bg-white/10 transition-colors duration-200">
                        Kontak
                    </a>
                </nav>

                {{-- CTA Desktop --}}
                <div class="hidden lg:block">
                    <a href="#kontak" class="inline-flex items-center px-5 py-2.5 text-sm font-semibold text-dawn-night bg-gradient-to-r from-gold-light to-gold rounded-lg border border-gold/50 hover:-translate-y-0.5 transition-all duration-200" id="cta-nav">
                        Hubungi Kami
                    </a>
                </div>

                {{-- Mobile Menu Toggle --}}
                <button type="button" class="lg:hidden p-2 rounded-lg navbar-link text-white hover:bg-white/10 transition-colors duration-200" id="mobile-menu-btn" aria-label="Toggle menu">
                    <svg class="w-6 h-6" id="menu-icon-open" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
                    </svg>
                    <svg class="w-6 h-6 hidden" id="menu-icon-close" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                    </svg>
                </button>
            </div>
        </div>

        {{-- Mobile Menu --}}
        <div class="lg:hidden hidden border-t border-white/10 bg-dawn-night/95 backdrop-blur-md" id="mobile-menu">
            <div class="px-4 py-4 space-y-1">
                <a href="{{ route('home') }}" class="block px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('home') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white hover:bg-white/10' }} transition-colors duration-200">
                    Beranda
                </a>
                <a href="#tentang" class="mobile-nav-link block px-4 py-2.5 text-sm font-medium rounded-lg text-white/80 hover:text-white hover:bg-white/10 transition-colors duration-200">
                    Tentang
                </a>
                <a href="#program" class="mobile-nav-link block px-4 py-2.5 text-sm font-medium rounded-lg text-white/80 hover:text-white hover:bg-white/10 transition-colors duration-200">
                    Program
                </a>
                <a href="#berita" class="mobile-nav-link block px-4 py-2.5 text-sm font-medium rounded-lg text-white/80 hover:text-white hover:bg-white/10 transition-colors duration-200">
                    Berita
                </a>
                <a href="#galeri" class="mobile-nav-link block px-4 py-2.5 text-sm font-medium rounded-lg text-white/80 hover:text-white hover:bg-white/10 transition-colors duration-200">
                    Galeri
                </a>
                <a href="#kontak" class="mobile-nav-link block px-4 py-2.5 text-sm font-medium rounded-lg text-white/80 hover:text-white hover:bg-white/10 transition-colors duration-200">
                    Kontak
                </a>
                <div class="pt-2">
                    <a href="#kontak" class="mobile-nav-link block text-center px-4 py-2.5 text-sm font-semibold text-dawn-night bg-gradient-to-r from-gold-light to-gold rounded-lg border border-gold/50 transition-colors duration-200">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </header>

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="relative overflow-hidden bg-dawn-night text-white" id="footer">
        <div class="absolute inset-0 islamic-pattern opacity-[0.04]"></div>
        <div class="absolute -top-24 right-10 w-72 h-72 bg-primary/20 rounded-full blur-3xl"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Footer Top --}}
            <div class="py-12 lg:py-16 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-10">
                {{-- Brand --}}
                <div class="lg:col-span-1">
                    <div class="flex items-center gap-2.5 mb-4">
                        <img src="{{ asset('logo-gps.png') }}" alt="Logo GPS TangSel" class="w-11 h-11 rounded-xl object-cover">
                        <span class="text-xl font-extrabold tracking-tight">GPS TangSel</span>
                    </div>
                    <p class="text-sm text-white/60 leading-relaxed mb-5">
                        Gerakan Pejuang Subuh Tangerang Selatan — Mengajak masyarakat istiqomah shalat subuh berjamaah di masjid.
                    </p>
                    <p class="font-arabic text-lg text-gold-light/90" dir="rtl">اللّٰهُمَّ بَارِكْ لَنَا فِي الصُّبْحِ</p>
                </div>

                {{-- Quick Links --}}
                <div>
                    <h4 class="text-sm font-semibold uppercase tracking-wider mb-4 text-gold-light">Navigasi</h4>
                    <ul class="space-y-2.5">
                        <li><a href="{{ route('home') }}" class="text-sm text-white/60 hover:text-gold-light transition-colors duration-200">Beranda</a></li>
                        <li><a href="#tentang" class="text-sm text-white/60 hover:text-gold-light transition-colors duration-200">Tentang Kami</a></li>
                        <li><a href="#program" class="text-sm text-white/60 hover:text-gold-light transition-colors duration-200">Program Kerja</a></li>
                        <li><a href="#berita" class="text-sm text-white/60 hover:text-gold-light transition-colors duration-200">Berita & Artikel</a></li>
                        <li><a href="#galeri" class="text-sm text-white/60 hover:text-gold-light transition-colors duration-200">Galeri</a></li>
                    </ul>
                </div>

                {{-- Programs --}}
                <div>
                    <h4 class="text-sm font-semibold uppercase tracking-wider mb-4 text-gold-light">Program</h4>
                    <ul class="space-y-2.5">
                        <li><a href="#program" class="text-sm text-white/60 hover:text-gold-light transition-colors duration-200">Safari Sholat Subuh (S4)</a></li>
                        <li><a href="#program" class="text-sm text-white/60 hover:text-gold-light transition-colors duration-200">Puskesmas Cerdas Ceria</a></li>
                        <li><a href="#program" class="text-sm text-white/60 hover:text-gold-light transition-colors duration-200">Pasar Bahagia</a></li>
                        <li><a href="#program" class="text-sm text-white/60 hover:text-gold-light transition-colors duration-200">Thibbun Nabawi</a></li>
                    </ul>
                </div>

                {{-- Contact --}}
                <div>
                    <h4 class="text-sm font-semibold uppercase tracking-wider mb-4 text-gold-light">Kontak</h4>
                    <ul class="space-y-2.5">
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 mt-0.5 flex-shrink-0 text-gold/70" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                            </svg>
                            <span class="text-sm text-white/60">Tangerang Selatan, Banten, Indonesia</span>
                        </li>
                        <li class="flex items-start gap-2">
                            <svg class="w-4 h-4 mt-0.5 flex-shrink-0 text-gold/70" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                            </svg>
                            <span class="text-sm text-white/60">info@gpstangsel.or.id</span>
                        </li>
                    </ul>
                </div>
            </div>

            {{-- Footer Bottom --}}
            <div class="py-5 border-t border-white/10">
                <div class="flex flex-col sm:flex-row items-center justify-between gap-3">
                    <p class="text-xs text-white/40">&copy; {{ date('Y') }} GPS Tangerang Selatan. Seluruh hak cipta dilindungi.</p>
                    <p class="text-xs text-white/40">SK AHU-0017966.AH.01.04 Tahun 2024</p>
                </div>
            </div>
        </div>
    </footer>

    {{-- Mobile Menu & Interactions Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const btn = document.getElementById('mobile-menu-btn');
            const menu = document.getElementById('mobile-menu');
            const iconOpen = document.getElementById('menu-icon-open');
            const iconClose = document.getElementById('menu-icon-close');

            btn.addEventListener('click', function () {
                const isOpen = !menu.classList.contains('hidden');
                menu.classList.toggle('hidden');
                iconOpen.classList.toggle('hidden');
                iconClose.classList.toggle('hidden');
            });

            // Close mobile menu when clicking on anchor links
            document.querySelectorAll('.mobile-nav-link').forEach(function (link) {
                link.addEventListener('click', function () {
                    menu.classList.add('hidden');
                    iconOpen.classList.remove('hidden');
                    iconClose.classList.add('hidden');
                });
            });

            // Navbar scroll effect: transparent over hero -> solid white on scroll
            const navbar = document.getElementById('navbar');
            const navbarInner = document.getElementById('navbar-inner');
            const brand = document.querySelector('.navbar-brand');
            const navLinks = document.querySelectorAll('.navbar-link');
            const activeLink = document.querySelector('.navbar-active');

            function applyNavbarState(scrolled) {
                if (scrolled) {
                    navbar.classList.add('bg-white/95', 'backdrop-blur-md', 'shadow-sm', 'border-b', 'border-gray-100');
                    navbarInner.classList.add('h-16', 'lg:h-18');
                    navbarInner.classList.remove('h-20', 'lg:h-24');
                    if (brand) {
                        brand.classList.remove('text-white');
                        brand.classList.add('text-primary');
                    }
                    navLinks.forEach(function (link) {
                        link.classList.remove('text-white/80', 'hover:text-white', 'hover:bg-white/10');
                        link.classList.add('text-gray-600', 'hover:text-primary', 'hover:bg-gray-50');
                    });
                    if (activeLink) {
                        activeLink.classList.remove('text-white', 'bg-white/10', 'hover:text-primary', 'hover:bg-gray-50');
                        activeLink.classList.add('text-primary', 'bg-primary-light', 'font-semibold');
                    }
                } else {
                    navbar.classList.remove('bg-white/95', 'backdrop-blur-md', 'shadow-sm', 'border-b', 'border-gray-100');
                    navbarInner.classList.remove('h-16', 'lg:h-18');
                    navbarInner.classList.add('h-20', 'lg:h-24');
                    if (brand) {
                        brand.classList.add('text-white');
                        brand.classList.remove('text-primary');
                    }
                    navLinks.forEach(function (link) {
                        link.classList.add('text-white/80', 'hover:text-white', 'hover:bg-white/10');
                        link.classList.remove('text-gray-600', 'hover:text-primary', 'hover:bg-gray-50');
                    });
                    if (activeLink) {
                        activeLink.classList.remove('text-primary', 'bg-primary-light', 'font-semibold', 'text-gray-600');
                        activeLink.classList.add('text-white', 'bg-white/10');
                    }
                }
            }

            let ticking = false;
            window.addEventListener('scroll', function () {
                if (!ticking) {
                    window.requestAnimationFrame(function () {
                        applyNavbarState(window.scrollY > 24);
                        ticking = false;
                    });
                    ticking = true;
                }
            });
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
        });
    </script>

    @stack('scripts')
</body>
</html>
