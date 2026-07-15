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
                    <li><a href="{{ route('home') }}" wire:navigate class="text-sm text-white/60 hover:text-gold-light transition-colors duration-200">Beranda</a></li>
                    <li><a href="{{ route('tentang') }}" wire:navigate class="text-sm text-white/60 hover:text-gold-light transition-colors duration-200">Tentang Kami</a></li>
                    <li><a href="{{ route('program') }}" wire:navigate class="text-sm text-white/60 hover:text-gold-light transition-colors duration-200">Program Kerja</a></li>
                    <li><a href="{{ route('berita') }}" wire:navigate class="text-sm text-white/60 hover:text-gold-light transition-colors duration-200">Berita & Artikel</a></li>
                    <li><a href="{{ route('galeri') }}" wire:navigate class="text-sm text-white/60 hover:text-gold-light transition-colors duration-200">Galeri</a></li>
                </ul>
            </div>

            {{-- Programs --}}
            <div>
                <h4 class="text-sm font-semibold uppercase tracking-wider mb-4 text-gold-light">Program</h4>
                <ul class="space-y-2.5">
                    <li><a href="{{ route('program') }}" wire:navigate class="text-sm text-white/60 hover:text-gold-light transition-colors duration-200">Safari Sholat Subuh (S4)</a></li>
                    <li><a href="{{ route('program') }}" wire:navigate class="text-sm text-white/60 hover:text-gold-light transition-colors duration-200">Puskesmas Cerdas Ceria</a></li>
                    <li><a href="{{ route('program') }}" wire:navigate class="text-sm text-white/60 hover:text-gold-light transition-colors duration-200">Pasar Bahagia</a></li>
                    <li><a href="{{ route('program') }}" wire:navigate class="text-sm text-white/60 hover:text-gold-light transition-colors duration-200">Thibbun Nabawi</a></li>
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
                        <span class="text-sm text-white/60">infogpstangsel@gmail.com</span>
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
