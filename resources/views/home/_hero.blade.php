{{-- ============ HERO SECTION ============ --}}
<section class="relative overflow-hidden pt-24 sm:pt-32 pb-32 sm:pb-40 lg:pt-44 lg:pb-48" id="hero">
    {{-- Dawn gradient background: night -> pre-dawn -> warm glow --}}
    <div class="absolute inset-0 bg-gradient-to-b from-dawn-night via-dawn-deep to-dawn-glow"></div>
    <div class="absolute inset-x-0 bottom-0 h-72 bg-gradient-to-t from-amber-500/35 via-amber-500/10 to-transparent"></div>

    {{-- Islamic geometric pattern overlay --}}
    <div class="absolute inset-0 islamic-pattern opacity-[0.07]"></div>

    {{-- Decorative glow orbs --}}
    <div class="absolute top-24 -left-24 w-80 h-80 bg-primary/30 rounded-full blur-3xl animate-pulse-glow"></div>
    <div class="absolute bottom-40 -right-20 w-96 h-96 bg-gold/20 rounded-full blur-3xl animate-pulse-glow" style="animation-delay: -2.5s"></div>

    {{-- Rising sun glow on the horizon --}}
    <div class="absolute bottom-16 left-1/2 -translate-x-1/2 w-[40rem] h-40 bg-gradient-to-t from-gold/40 to-transparent rounded-full blur-2xl"></div>

    {{-- Mosque silhouette at the bottom --}}
    <svg class="absolute inset-x-0 bottom-0 w-full h-24 lg:h-32 text-dawn-night" viewBox="0 0 1200 120" preserveAspectRatio="none" fill="currentColor" aria-hidden="true">
        {{-- Minarets + domes skyline --}}
        <rect x="60" y="60" width="10" height="60" />
        <circle cx="65" cy="58" r="8" />
        <rect x="120" y="40" width="80" height="80" />
        <path d="M160 10 q-30 28 0 50 q30 -22 0 -50" />
        <rect x="260" y="50" width="8" height="50" />
        <circle cx="264" cy="48" r="6" />
        <rect x="320" y="55" width="120" height="65" />
        <path d="M380 20 q-45 35 0 60 q45 -25 0 -60" />
        <rect x="520" y="45" width="8" height="75" />
        <circle cx="524" cy="43" r="6" />
        <rect x="560" y="35" width="100" height="85" />
        <path d="M610 5 q-55 40 0 70 q55 -30 0 -70" />
        <rect x="720" y="50" width="8" height="50" />
        <circle cx="724" cy="48" r="6" />
        <rect x="780" y="45" width="120" height="75" />
        <path d="M840 15 q-45 35 0 60 q45 -25 0 -60" />
        <rect x="960" y="55" width="8" height="45" />
        <circle cx="964" cy="53" r="6" />
        <rect x="1010" y="40" width="90" height="60" />
        <path d="M1055 12 q-40 30 0 52 q40 -22 0 -52" />
        <rect x="1140" y="60" width="10" height="60" />
        <circle cx="1145" cy="58" r="8" />
        <rect x="0" y="95" width="1200" height="25" />
    </svg>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 lg:gap-10 items-center">
            {{-- Hero Text --}}
            <div class="lg:col-span-7 text-center lg:text-left">
                <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full glass mb-6 reveal">
                    <span class="w-1.5 h-1.5 rounded-full bg-gold animate-pulse"></span>
                    <span class="text-xs font-semibold text-gold-light uppercase tracking-wider">Berbadan Hukum — SK AHU 2024</span>
                </div>

                <p class="font-arabic text-3xl sm:text-4xl text-gold-light/90 mb-4 reveal" dir="rtl" style="transition-delay: 80ms">الفَجْر</p>

                <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white leading-[1.1] tracking-tight mb-6 reveal" style="transition-delay: 140ms">
                    Gerakan<br>
                    <span class="text-gradient-gold">Pejuang Subuh</span><br>
                    Tangerang Selatan
                </h1>

                <p class="text-lg text-white/70 leading-relaxed max-w-xl mx-auto lg:mx-0 mb-9 reveal" style="transition-delay: 220ms">
                    Mengajak masyarakat, terutama generasi muda, untuk istiqomah melaksanakan shalat subuh berjamaah di masjid. Bergerak setiap Sabtu dari masjid ke masjid di seluruh Tangerang Selatan.
                </p>

                <div class="flex flex-col sm:flex-row gap-3 justify-center lg:justify-start reveal" style="transition-delay: 300ms">
                    <a href="#program" class="inline-flex items-center justify-center gap-2 px-6 py-3 text-sm font-semibold text-dawn-night bg-gradient-to-r from-gold-light to-gold rounded-lg border border-gold/50 hover:-translate-y-0.5 transition-all duration-200" id="hero-cta-primary">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                        Lihat Jadwal S4
                    </a>
                    <a href="#tentang" class="inline-flex items-center justify-center gap-2 px-6 py-3 text-sm font-semibold text-white glass rounded-lg hover:bg-white/15 hover:-translate-y-0.5 transition-all duration-200" id="hero-cta-secondary">
                        Tentang Kami
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                        </svg>
                    </a>
                </div>
            </div>

            {{-- Hero Visual: Live prayer schedule card --}}
            <div class="lg:col-span-5 reveal" style="transition-delay: 220ms">
                <div class="relative max-w-md mx-auto">
                    {{-- Main glass card --}}
                    <div class="relative glass rounded-3xl p-6 lg:p-7 shadow-2xl shadow-dawn-night/40 overflow-hidden">

                        {{-- Arabic header --}}
                        <div class="mb-5">
                            <div class="flex items-center justify-between gap-3 mb-1.5">
                                <p class="font-arabic text-xl text-gold-light/90" dir="rtl">حَافِظُوا عَلَى الصَّلَوَاتِ</p>
                                @if (! empty($prayerSchedule['hijri_date']))
                                    <span class="font-arabic text-sm text-gold-light/70" dir="rtl">{{ $prayerSchedule['hijri_date'] }}</span>
                                @endif
                            </div>
                            <p class="text-xs font-semibold text-gold-light uppercase tracking-widest">Jadwal Sholat Hari Ini</p>
                            <div class="flex items-center gap-2 mt-0.5">
                                <h3 class="text-base font-bold text-white" id="prayer-date-label">{{ $prayerSchedule['gregorian_date'] }}</h3>
                            </div>
                            <p class="text-[11px] text-white/40 mt-0.5">{{ $prayerSchedule['location'] }} · Metode Kemenag RI</p>
                        </div>

                        {{-- Live countdown to next prayer --}}
                        <div class="relative rounded-2xl bg-gradient-to-br from-dawn-night/60 via-dawn-deep/40 to-dawn-glow/30 p-5 mb-4 overflow-hidden border border-white/10">
                            <div class="absolute inset-0 islamic-pattern opacity-[0.08]"></div>
                            <div class="relative flex items-center justify-between gap-4">
                                <div class="flex-1">
                                    <p class="text-[10px] font-semibold text-gold-light/70 uppercase tracking-widest mb-1">Menuju Sholat</p>
                                    <p class="text-2xl font-extrabold text-white tracking-tight" id="next-prayer-name">Subuh</p>
                                    <p class="text-xs text-white/50 mt-0.5" id="next-prayer-time">04:45 WIB</p>
                                </div>
                                {{-- Circular countdown --}}
                                <div class="relative w-20 h-20 flex-shrink-0">
                                    <svg class="w-20 h-20 -rotate-90" viewBox="0 0 80 80">
                                        <circle cx="40" cy="40" r="34" fill="none" stroke="rgba(255,255,255,0.1)" stroke-width="5"/>
                                        <circle cx="40" cy="40" r="34" fill="none" stroke="url(#countdownGrad)" stroke-width="5" stroke-linecap="round" id="countdown-ring" stroke-dasharray="213.6" stroke-dashoffset="213.6"/>
                                        <defs>
                                            <linearGradient id="countdownGrad" x1="0" y1="0" x2="1" y2="1">
                                                <stop offset="0%" stop-color="#F5E6B8"/>
                                                <stop offset="100%" stop-color="#D4A437"/>
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                    <div class="absolute inset-0 flex flex-col items-center justify-center">
                                        <span class="text-[10px] font-extrabold text-white tabular-nums" id="countdown-text">00:00:00</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        {{-- Five prayer times grid (server-driven from Aladhan API) --}}
                        @php
                            $prayerIcons = [
                                'subuh' => '<path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m8.66-13.07l-.71.71M4.05 19.95l-.71.71M21 12h-1M4 12H3m16.95 7.95l-.71-.71M4.76 4.76l-.71-.71M16 12a4 4 0 11-8 0 4 4 0 018 0z" />',
                                'dzuhur' => '<circle cx="12" cy="12" r="4"/><path stroke-linecap="round" stroke-linejoin="round" d="M12 2v2m0 16v2M2 12h2m16 0h2m-2.93-7.07l-1.41 1.41M6.34 17.66l-1.41 1.41m0-15.56l1.41 1.41m11.32 12.92l1.41 1.41"/>',
                                'ashar' => '<path stroke-linecap="round" stroke-linejoin="round" d="M3 12c2-3 6-3 9 0s7 3 9 0M3 18c2-3 6-3 9 0s7 3 9 0M3 6c2-3 6-3 9 0s7 3 9 0"/>',
                                'maghrib' => '<path stroke-linecap="round" stroke-linejoin="round" d="M17 18a5 5 0 00-10 0M12 2v4m6.36 1.64l-2.83 2.83M22 18h-4M4 18H0m16.36 4.36l-2.83-2.83M7.64 7.64L4.81 4.81M12 22a4 4 0 00-4-4M3 18h18"/>',
                                'isya' => '<path stroke-linecap="round" stroke-linejoin="round" d="M21 12.79A9 9 0 1111.21 3 7 7 0 0021 12.79z"/>',
                            ];
                        @endphp
                        <div class="grid grid-cols-5 gap-1.5 mb-4">
                            @foreach ($prayerSchedule['prayers'] as $prayer)
                                <div class="prayer-slot group flex flex-col items-center gap-1.5 py-3 px-1 rounded-xl bg-white/5 border border-white/10 hover:bg-white/10 transition-colors duration-200" data-prayer="{{ $prayer['key'] }}" data-time="{{ $prayer['time'] }}">
                                    <svg class="w-4 h-4 text-gold-light/70" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        {!! $prayerIcons[$prayer['key']] ?? '' !!}
                                    </svg>
                                    <span class="text-[9px] font-semibold text-white/60 uppercase tracking-wide prayer-name">{{ $prayer['name'] }}</span>
                                    <span class="text-[11px] font-bold text-white tabular-nums prayer-time">{{ $prayer['time'] }}</span>
                                </div>
                            @endforeach
                        </div>

                        {{-- Next Safari Subuh feature strip --}}
                        <a href="#program" class="group block relative rounded-2xl bg-gradient-to-r from-primary/30 via-primary/20 to-gold/20 p-4 border border-gold/20 hover:border-gold/40 transition-all duration-200 hover:-translate-y-0.5">
                            <div class="flex items-center gap-3">
                                <div class="w-11 h-11 rounded-xl bg-gradient-to-br from-gold-light to-gold flex items-center justify-center flex-shrink-0 shadow-lg shadow-gold/20">
                                    <svg class="w-6 h-6 text-dawn-night" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M5 21V8l7-5 7 5v13M9 21v-6h6v6M9 11h.01M15 11h.01"/>
                                    </svg>
                                </div>
                                <div class="flex-1 min-w-0">
                                    <p class="text-[10px] font-semibold text-gold-light uppercase tracking-widest mb-0.5">Safari Subuh Berikutnya</p>
                                    <p class="text-sm font-bold text-white truncate">Masjid Al-Hidayah, Ciputat</p>
                                    <p class="text-[11px] text-white/60 mt-0.5">Sabtu, 04:45 WIB — Gratis & Terbuka untuk Umum</p>
                                </div>
                                <svg class="w-5 h-5 text-gold-light flex-shrink-0 group-hover:translate-x-1 transition-transform duration-200" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                                </svg>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>

        {{-- Scroll indicator --}}
        <div class="hidden lg:flex justify-center mt-16 reveal" style="transition-delay: 400ms">
            <a href="#hadits" class="flex flex-col items-center gap-2 text-white/50 hover:text-gold-light transition-colors duration-200">
                <span class="text-[10px] uppercase tracking-widest">Geser</span>
                <svg class="w-5 h-5 animate-bounce" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
                </svg>
            </a>
        </div>
    </div>
</section>
