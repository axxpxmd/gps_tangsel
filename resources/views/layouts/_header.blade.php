{{-- Navbar: floating glass pill --}}
<header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300" id="navbar">
    <div>
        <div class="relative border border-white/15 glass transition-all duration-300" id="navbar-pill">
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
                <nav class="hidden lg:flex items-center gap-0.5 text-white/80" id="desktop-nav">
                    {{-- Beranda --}}
                    <a href="{{ route('home') }}" wire:navigate class="nav-link relative group px-4 py-2 text-sm font-medium rounded-lg navbar-link transition-colors duration-200">
                        <span>Beranda</span>
                        <span class="absolute bottom-0.5 left-1/2 -translate-x-1/2 h-0.5 w-0 group-hover:w-5 rounded-full bg-gradient-to-r from-gold-light to-gold transition-all duration-300"></span>
                    </a>

                    {{-- Profil Dropdown --}}
                    <div class="relative group" id="profil-dropdown">
                        <button type="button" class="relative flex items-center gap-1.5 px-4 py-2 text-sm font-medium rounded-lg navbar-link transition-colors duration-200">
                            <span>Profil</span>
                            <svg class="w-4 h-4 transition-transform duration-200 group-hover:rotate-180" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                            <span class="absolute bottom-0.5 left-1/2 -translate-x-1/2 h-0.5 w-0 group-hover:w-5 rounded-full bg-gradient-to-r from-gold-light to-gold transition-all duration-300"></span>
                        </button>
                        <div class="absolute top-full left-1/2 -translate-x-1/2 pt-3 z-50 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition-all duration-200">
                            <div class="relative bg-white rounded-xl shadow-xl shadow-black/15 border border-gray-200 py-3 min-w-[280px]">
                                <div class="absolute -top-2 left-1/2 -translate-x-1/2 w-4 h-4 rotate-45 bg-white border-l border-t border-gray-200"></div>
                                <a href="{{ route('tentang') }}" wire:navigate class="flex items-center gap-3 px-5 py-3 text-sm font-medium text-gray-700 hover:text-primary hover:bg-primary/5 rounded-lg mx-1 transition-all duration-200">
                                    <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block">Tentang Kami</span>
                                        <span class="block text-[11px] text-gray-400 font-normal">Mengenal GPS TangSel</span>
                                    </div>
                                </a>
                                <a href="{{ route('visi-misi') }}" wire:navigate class="flex items-center gap-3 px-5 py-3 text-sm font-medium text-gray-700 hover:text-primary hover:bg-primary/5 rounded-lg mx-1 transition-all duration-200">
                                    <div class="w-8 h-8 rounded-lg bg-gold/10 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block">Visi & Misi</span>
                                        <span class="block text-[11px] text-gray-400 font-normal">Tujuan & cita-cita</span>
                                    </div>
                                </a>
                                <a href="{{ route('pengurus') }}" wire:navigate class="flex items-center gap-3 px-5 py-3 text-sm font-medium text-gray-700 hover:text-primary hover:bg-primary/5 rounded-lg mx-1 transition-all duration-200">
                                    <div class="w-8 h-8 rounded-lg bg-amber-100 flex items-center justify-center flex-shrink-0">
                                        <svg class="w-4 h-4 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                                        </svg>
                                    </div>
                                    <div>
                                        <span class="block">Pengurus</span>
                                        <span class="block text-[11px] text-gray-400 font-normal">Tim inti GPS TangSel</span>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>

                    {{-- Program --}}
                    <a href="{{ route('program') }}" wire:navigate class="nav-link relative group px-4 py-2 text-sm font-medium rounded-lg navbar-link transition-colors duration-200">
                        <span>Program</span>
                        <span class="absolute bottom-0.5 left-1/2 -translate-x-1/2 h-0.5 w-0 group-hover:w-5 rounded-full bg-gradient-to-r from-gold-light to-gold transition-all duration-300"></span>
                    </a>

                    {{-- Agenda --}}
                    <a href="{{ url('/#kalender') }}" class="nav-link relative group px-4 py-2 text-sm font-medium rounded-lg navbar-link transition-colors duration-200">
                        <span>Agenda</span>
                        <span class="absolute bottom-0.5 left-1/2 -translate-x-1/2 h-0.5 w-0 group-hover:w-5 rounded-full bg-gradient-to-r from-gold-light to-gold transition-all duration-300"></span>
                    </a>

                    {{-- Berita --}}
                    <a href="{{ route('berita') }}" wire:navigate class="nav-link relative group px-4 py-2 text-sm font-medium rounded-lg navbar-link transition-colors duration-200">
                        <span>Berita</span>
                        <span class="absolute bottom-0.5 left-1/2 -translate-x-1/2 h-0.5 w-0 group-hover:w-5 rounded-full bg-gradient-to-r from-gold-light to-gold transition-all duration-300"></span>
                    </a>

                    {{-- Galeri --}}
                    <a href="{{ route('galeri') }}" wire:navigate class="nav-link relative group px-4 py-2 text-sm font-medium rounded-lg navbar-link transition-colors duration-200">
                        <span>Galeri</span>
                        <span class="absolute bottom-0.5 left-1/2 -translate-x-1/2 h-0.5 w-0 group-hover:w-5 rounded-full bg-gradient-to-r from-gold-light to-gold transition-all duration-300"></span>
                    </a>
                </nav>

                {{-- CTA Desktop --}}
                <div class="hidden lg:block">
                    <a href="{{ url('/#kontak') }}" class="group/cta inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-dawn-night bg-gold rounded-xl border border-gold/50 hover:-translate-y-0.5 transition-all duration-200" id="cta-nav">
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
            <div class="lg:hidden hidden border-t border-white/10 mobile-menu-panel" id="mobile-menu">
                <div class="px-4 py-4 space-y-1">
                    <a href="{{ route('home') }}" wire:navigate class="mobile-nav-link block px-4 py-2.5 text-sm font-medium rounded-lg navbar-link transition-colors duration-200">
                        Beranda
                    </a>
                    <div class="mobile-profil-menu">
                        <button type="button" class="w-full flex items-center justify-between px-4 py-2.5 text-sm font-medium rounded-lg navbar-link transition-colors duration-200" id="mobile-profil-toggle">
                            <span>Profil</span>
                            <svg class="w-4 h-4 transition-transform duration-200" id="mobile-profil-icon" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M19 9l-7 7-7-7"/>
                            </svg>
                        </button>
                        <div class="hidden pl-4 space-y-1 mt-1" id="mobile-profil-submenu">
                            <a href="{{ route('tentang') }}" wire:navigate class="mobile-nav-link block px-4 py-2 text-sm rounded-lg navbar-link transition-colors duration-200">
                                Tentang Kami
                            </a>
                            <a href="{{ route('visi-misi') }}" wire:navigate class="mobile-nav-link block px-4 py-2 text-sm rounded-lg navbar-link transition-colors duration-200">
                                Visi & Misi
                            </a>
                            <a href="{{ route('pengurus') }}" wire:navigate class="mobile-nav-link block px-4 py-2 text-sm rounded-lg navbar-link transition-colors duration-200">
                                Pengurus
                            </a>
                        </div>
                    </div>
                    <a href="{{ route('program') }}" wire:navigate class="mobile-nav-link block px-4 py-2.5 text-sm font-medium rounded-lg navbar-link transition-colors duration-200">
                        Program
                    </a>
                    <a href="{{ url('/#kalender') }}" class="mobile-nav-link block px-4 py-2.5 text-sm font-medium rounded-lg navbar-link transition-colors duration-200">
                        Agenda
                    </a>
                    <a href="{{ route('berita') }}" wire:navigate class="mobile-nav-link block px-4 py-2.5 text-sm font-medium rounded-lg navbar-link transition-colors duration-200">
                        Berita
                    </a>
                    <a href="{{ route('galeri') }}" wire:navigate class="mobile-nav-link block px-4 py-2.5 text-sm font-medium rounded-lg navbar-link transition-colors duration-200">
                        Galeri
                    </a>
                    <div class="pt-2">
                        <a href="{{ url('/#kontak') }}" class="mobile-nav-link flex items-center justify-center gap-2 px-4 py-2.5 text-sm font-semibold text-dawn-night bg-gradient-to-r from-gold-light to-gold rounded-lg border border-gold/50 transition-colors duration-200">
                            Hubungi Kami
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
