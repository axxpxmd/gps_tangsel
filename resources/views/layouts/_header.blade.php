{{-- Navbar: floating glass pill --}}
<header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" id="navbar">
    <div>
        <div class="relative border border-white/15 glass transition-all duration-300 overflow-hidden" id="navbar-pill">
            {{-- Subtle gradient accent line on top --}}
            <div class="absolute top-0 inset-x-0 h-px bg-gradient-to-r from-transparent via-gold/40 to-transparent"></div>

            <div class="flex items-center justify-between h-16 lg:h-20 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 transition-all duration-300" id="navbar-inner">
                {{-- Logo --}}
                <a href="{{ route('home') }}" class="flex items-center gap-2.5 group" id="logo">
                    <div class="relative">
                        <img src="{{ asset('logo-gps.png') }}" alt="Logo GPS TangSel" class="w-10 h-10 lg:w-11 lg:h-11 rounded-xl object-cover transition-all duration-300 group-hover:scale-105 ring-1 ring-white/20">
                        <span class="absolute -inset-0.5 rounded-xl bg-gradient-to-br from-gold/30 to-primary/20 opacity-0 group-hover:opacity-100 blur transition-opacity duration-300 -z-10"></span>
                    </div>
                    <span class="flex flex-col leading-none">
                        <span class="text-lg lg:text-xl font-extrabold tracking-tight transition-colors duration-300 navbar-brand text-white">GPS TANGSEL</span>
                        <span class="block text-[9px] font-medium tracking-[0.2em] uppercase text-gold-light/70 mt-0.5 transition-colors duration-300 navbar-tagline">Pejuang Subuh</span>
                    </span>
                </a>

                {{-- Desktop Navigation --}}
                <nav class="hidden lg:flex items-center gap-0.5" id="desktop-nav">
                    <a href="{{ route('home') }}" wire:navigate class="nav-link navbar-link navbar-active relative group px-4 py-2 text-sm font-medium rounded-lg transition-colors duration-200 {{ request()->routeIs('home') ? 'text-white' : 'text-white/80 hover:text-white' }}">
                        <span>Beranda</span>
                        <span class="absolute bottom-0.5 left-1/2 -translate-x-1/2 h-0.5 rounded-full bg-gradient-to-r from-gold-light to-gold transition-all duration-300 {{ request()->routeIs('home') ? 'w-5' : 'w-0 group-hover:w-5' }}"></span>
                    </a>
                    <a href="{{ route('tentang') }}" wire:navigate class="nav-link relative group px-4 py-2 text-sm font-medium rounded-lg navbar-link text-white/80 hover:text-white transition-colors duration-200">
                        <span>Tentang</span>
                        <span class="absolute bottom-0.5 left-1/2 -translate-x-1/2 h-0.5 w-0 group-hover:w-5 rounded-full bg-gradient-to-r from-gold-light to-gold transition-all duration-300"></span>
                    </a>
                    <a href="#program" class="nav-link relative group px-4 py-2 text-sm font-medium rounded-lg navbar-link text-white/80 hover:text-white transition-colors duration-200">
                        <span>Program</span>
                        <span class="absolute bottom-0.5 left-1/2 -translate-x-1/2 h-0.5 w-0 group-hover:w-5 rounded-full bg-gradient-to-r from-gold-light to-gold transition-all duration-300"></span>
                    </a>
                    <a href="#kalender" class="nav-link relative group px-4 py-2 text-sm font-medium rounded-lg navbar-link text-white/80 hover:text-white transition-colors duration-200">
                        <span>Kalender</span>
                        <span class="absolute bottom-0.5 left-1/2 -translate-x-1/2 h-0.5 w-0 group-hover:w-5 rounded-full bg-gradient-to-r from-gold-light to-gold transition-all duration-300"></span>
                    </a>
                    <a href="{{ route('berita') }}" wire:navigate class="nav-link navbar-link navbar-active relative group px-4 py-2 text-sm font-medium rounded-lg transition-colors duration-200 {{ request()->routeIs('berita') ? 'text-white' : 'text-white/80 hover:text-white' }}">
                        <span>Berita</span>
                        <span class="absolute bottom-0.5 left-1/2 -translate-x-1/2 h-0.5 rounded-full bg-gradient-to-r from-gold-light to-gold transition-all duration-300 {{ request()->routeIs('berita') ? 'w-5' : 'w-0 group-hover:w-5' }}"></span>
                    </a>
                    <a href="#galeri" class="nav-link relative group px-4 py-2 text-sm font-medium rounded-lg navbar-link text-white/80 hover:text-white transition-colors duration-200">
                        <span>Galeri</span>
                        <span class="absolute bottom-0.5 left-1/2 -translate-x-1/2 h-0.5 w-0 group-hover:w-5 rounded-full bg-gradient-to-r from-gold-light to-gold transition-all duration-300"></span>
                    </a>
                    <a href="#kontak" class="nav-link relative group px-4 py-2 text-sm font-medium rounded-lg navbar-link text-white/80 hover:text-white transition-colors duration-200">
                        <span>Kontak</span>
                        <span class="absolute bottom-0.5 left-1/2 -translate-x-1/2 h-0.5 w-0 group-hover:w-5 rounded-full bg-gradient-to-r from-gold-light to-gold transition-all duration-300"></span>
                    </a>
                </nav>

                {{-- CTA Desktop --}}
                <div class="hidden lg:block">
                    <a href="#kontak" class="group/cta inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-dawn-night bg-gold rounded-xl border border-gold/50 hover:-translate-y-0.5 transition-all duration-200" id="cta-nav">
                        <span>Hubungi Kami</span>
                        <svg class="w-4 h-4 group-hover/cta:translate-x-0.5 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
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

            {{-- Mobile Menu --}}
            <div class="lg:hidden hidden border-t border-white/10" id="mobile-menu">
                <div class="px-4 py-4 space-y-1">
                    <a href="{{ route('home') }}" wire:navigate class="mobile-nav-link navbar-link navbar-active block px-4 py-2.5 text-sm font-medium rounded-lg {{ request()->routeIs('home') ? 'text-white bg-white/10' : 'text-white/80 hover:text-white hover:bg-gray-100' }} transition-colors duration-200">
                        Beranda
                    </a>
                    <a href="{{ route('tentang') }}" wire:navigate class="mobile-nav-link navbar-link block px-4 py-2.5 text-sm font-medium rounded-lg text-white/80 hover:text-white hover:bg-gray-100 transition-colors duration-200">
                        Tentang
                    </a>
                    <a href="#program" class="mobile-nav-link navbar-link block px-4 py-2.5 text-sm font-medium rounded-lg text-white/80 hover:text-white hover:bg-gray-100 transition-colors duration-200">
                        Program
                    </a>
                    <a href="#kalender" class="mobile-nav-link navbar-link block px-4 py-2.5 text-sm font-medium rounded-lg text-white/80 hover:text-white hover:bg-gray-100 transition-colors duration-200">
                        Kalender
                    </a>
                    <a href="{{ route('berita') }}" wire:navigate class="mobile-nav-link navbar-link block px-4 py-2.5 text-sm font-medium rounded-lg text-white/80 hover:text-white hover:bg-gray-100 transition-colors duration-200">
                        Berita
                    </a>
                    <a href="#galeri" class="mobile-nav-link navbar-link block px-4 py-2.5 text-sm font-medium rounded-lg text-white/80 hover:text-white hover:bg-gray-100 transition-colors duration-200">
                        Galeri
                    </a>
                    <a href="#kontak" class="mobile-nav-link navbar-link block px-4 py-2.5 text-sm font-medium rounded-lg text-white/80 hover:text-white hover:bg-gray-100 transition-colors duration-200">
                        Kontak
                    </a>
                    <div class="pt-2">
                        <a href="#kontak" class="mobile-nav-link flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-semibold text-dawn-night bg-gradient-to-r from-gold-light to-gold rounded-lg border border-gold/50 transition-colors duration-200">
                            Hubungi Kami
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
