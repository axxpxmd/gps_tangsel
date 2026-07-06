@extends('layouts.app')

@section('title', 'Beranda')
@section('meta_description', 'Gerakan Pejuang Subuh (GPS) Tangerang Selatan — Mengajak masyarakat, terutama anak muda, untuk istiqomah shalat subuh berjamaah di masjid.')

@section('content')

    {{-- ============ HERO SECTION ============ --}}
    <section class="relative overflow-hidden pt-36 pb-40 lg:pt-52 lg:pb-48" id="hero">
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
                                            <span class="text-base font-extrabold text-white tabular-nums" id="countdown-text">00:00:00</span>
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

    {{-- ============ HADITH RIBBON ============ --}}
    <section class="relative overflow-hidden bg-gradient-to-r from-primary via-primary-dark to-dawn-deep py-12 lg:py-16" id="hadits">
        <div class="absolute inset-0 islamic-pattern opacity-[0.08]"></div>
        <div class="absolute -top-16 left-1/4 w-64 h-64 bg-gold/10 rounded-full blur-3xl"></div>
        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal">
            <div class="inline-flex items-center gap-2 px-3 py-1 rounded-full bg-white/10 border border-white/15 mb-5">
                <svg class="w-3.5 h-3.5 text-gold-light" fill="currentColor" viewBox="0 0 24 24"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 16.8 5.8 21.3l2.4-7.4L2 9.4h7.6z"/></svg>
                <span class="text-[10px] font-semibold text-gold-light uppercase tracking-widest">Hadits Pilihan</span>
            </div>
            <p class="font-arabic text-2xl sm:text-3xl lg:text-4xl text-white leading-loose mb-4" dir="rtl">
                مَنْ صَلَّى الصُّبْحَ فَهُوَ فِي ذِمَّةِ اللَّهِ
            </p>
            <p class="text-base sm:text-lg text-white/85 italic leading-relaxed mb-2">
                “Barangsiapa shalat subuh, maka ia berada dalam jaminan Allah.”
            </p>
            <p class="text-xs text-gold-light/80 font-semibold uppercase tracking-wider">— HR. Muslim</p>
        </div>
    </section>

    {{-- ============ TENTANG SECTION ============ --}}
    <section class="relative py-20 lg:py-28 bg-white overflow-hidden" id="tentang">
        <div class="absolute top-0 right-0 w-1/3 h-full islamic-pattern-dark opacity-[0.03]"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Section Header --}}
            <div class="max-w-2xl mb-12 lg:mb-16 reveal">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-0.5 bg-gradient-to-r from-primary to-gold"></div>
                    <span class="text-xs font-semibold text-primary uppercase tracking-wider">Tentang Kami</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight mb-4">
                    Memakmurkan Masjid,<br>
                    <span class="text-gradient-primary">Menguatkan Ukhuwah</span>
                </h2>
                <p class="text-gray-500 leading-relaxed">
                    Lahir dari kepedulian terhadap kondisi masjid yang sering kali sepi jemaah pada waktu shalat subuh, GPS TangSel menjadi wadah komunikasi antara Umara, Ulama, dan Ummat.
                </p>
            </div>

            {{-- Content Grid --}}
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">
                {{-- Main Card --}}
                <div class="lg:col-span-2 bg-white rounded-2xl border border-gray-200 p-8 lg:p-10 shadow-sm hover:shadow-xl transition-shadow duration-300 reveal gradient-border">
                    <h3 class="text-xl font-bold text-gray-900 mb-4">Latar Belakang</h3>
                    <p class="text-gray-500 leading-relaxed mb-6">
                        Gerakan Pejuang Subuh Tangerang Selatan lahir dari keprihatinan terhadap kondisi masjid yang sepi jemaah pada waktu subuh. Sebagai gerakan yang dinamis, GPS TangSel aktif bergerak setiap pekan (hari Sabtu) dari masjid ke masjid di <strong class="text-gray-700">7 kecamatan</strong> dan <strong class="text-gray-700">54 kelurahan</strong> se-Tangerang Selatan.
                    </p>
                    <p class="text-gray-500 leading-relaxed mb-8">
                        Selain berfokus pada ibadah spiritual, GPS TangSel juga memiliki berbagai program sosial kemasyarakatan seperti pelayanan kesehatan gratis, distribusi bahan pangan, dan pengobatan Thibbun Nabawi.
                    </p>

                    {{-- Vision & Mission --}}
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                        <div class="p-6 rounded-xl border border-gray-100 bg-gradient-to-br from-gray-50 to-white">
                            <div class="w-10 h-10 bg-primary-light rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                                </svg>
                            </div>
                            <h4 class="text-sm font-bold text-gray-900 uppercase tracking-wide mb-3">Visi</h4>
                            <p class="text-sm text-gray-500 leading-relaxed">
                                Menjadi pusat informasi dan dokumentasi dakwah GPS TangSel yang kredibel, inspiratif, dan mudah diakses oleh seluruh elemen masyarakat.
                            </p>
                        </div>
                        <div class="p-6 rounded-xl border border-gray-100 bg-gradient-to-br from-gray-50 to-white">
                            <div class="w-10 h-10 bg-gold-light rounded-lg flex items-center justify-center mb-4">
                                <svg class="w-5 h-5 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-6 9l2 2 4-4" />
                                </svg>
                            </div>
                            <h4 class="text-sm font-bold text-gray-900 uppercase tracking-wide mb-3">Misi</h4>
                            <p class="text-sm text-gray-500 leading-relaxed">
                                Mempublikasikan jadwal Safari Subuh, menyebarkan artikel dakwah, dan menjadi sarana interaksi bagi jemaah, relawan, serta DKM.
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Side Info --}}
                <div class="flex flex-col gap-6">
                    {{-- Legal Status --}}
                    <div class="bg-white rounded-2xl border border-gray-200 p-6 flex-1 shadow-sm hover:shadow-lg transition-shadow duration-300 reveal gradient-border" style="transition-delay: 100ms">
                        <div class="w-11 h-11 bg-gradient-to-br from-primary to-primary-dark rounded-xl flex items-center justify-center mb-4 shadow-md shadow-primary/20">
                            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z" />
                            </svg>
                        </div>
                        <h4 class="text-sm font-bold text-gray-900 uppercase tracking-wide mb-2">Legalitas</h4>
                        <p class="text-sm text-gray-500 leading-relaxed mb-3">Yayasan terdaftar resmi di Kemenkumham RI.</p>
                        <p class="text-xs font-mono text-primary bg-primary-light px-3 py-1.5 rounded-md inline-block">AHU-0017966.AH.01.04</p>
                    </div>

                    {{-- Leadership Quick List --}}
                    <div class="bg-white rounded-2xl border border-gray-200 p-6 flex-1 shadow-sm hover:shadow-lg transition-shadow duration-300 reveal gradient-border" style="transition-delay: 180ms">
                        <div class="w-11 h-11 bg-gradient-to-br from-gold to-amber-600 rounded-xl flex items-center justify-center mb-4 shadow-md shadow-gold/20">
                            <svg class="w-6 h-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                            </svg>
                        </div>
                        <h4 class="text-sm font-bold text-gray-900 uppercase tracking-wide mb-3">Pengurus Inti</h4>
                        <ul class="space-y-3">
                            <li class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-gradient-to-br from-primary-light to-primary-light/50 flex items-center justify-center flex-shrink-0 ring-2 ring-white">
                                    <span class="text-xs font-bold text-primary">MS</span>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Mohammad Sartono</p>
                                    <p class="text-xs text-gray-400">Ketua</p>
                                </div>
                            </li>
                            <li class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-gradient-to-br from-primary-light to-primary-light/50 flex items-center justify-center flex-shrink-0 ring-2 ring-white">
                                    <span class="text-xs font-bold text-primary">FZ</span>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">Fathul Ghofur Zein</p>
                                    <p class="text-xs text-gray-400">Sekretaris</p>
                                </div>
                            </li>
                            <li class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-gradient-to-br from-primary-light to-primary-light/50 flex items-center justify-center flex-shrink-0 ring-2 ring-white">
                                    <span class="text-xs font-bold text-primary">RR</span>
                                </div>
                                <div>
                                    <p class="text-sm font-medium text-gray-900">DR. Rachmatullah Ruslie</p>
                                    <p class="text-xs text-gray-400">Bendahara</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ PROGRAM SECTION ============ --}}
    <section class="relative py-20 lg:py-28 bg-gray-50 overflow-hidden" id="program">
        <div class="absolute inset-0 islamic-pattern-dark opacity-[0.02]"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Section Header --}}
            <div class="text-center max-w-2xl mx-auto mb-12 lg:mb-16 reveal">
                <div class="flex items-center justify-center gap-3 mb-4">
                    <div class="w-10 h-0.5 bg-gradient-to-r from-transparent to-primary"></div>
                    <span class="text-xs font-semibold text-primary uppercase tracking-wider">Program Unggulan</span>
                    <div class="w-10 h-0.5 bg-gradient-to-l from-transparent to-primary"></div>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight mb-4">
                    Program Kerja GPS TangSel
                </h2>
                <p class="text-gray-500 leading-relaxed">
                    Empat program utama yang menjadi pilar gerakan kami dalam memakmurkan masjid dan melayani masyarakat.
                </p>
            </div>

            {{-- Program Grid --}}
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
                {{-- S4 --}}
                <div class="group relative bg-white rounded-2xl border border-gray-200 p-7 hover:border-transparent hover:shadow-2xl hover:shadow-primary/10 hover:-translate-y-1 transition-all duration-300 reveal gradient-border" id="program-s4">
                    <div class="absolute top-5 right-5 text-5xl font-extrabold text-gray-100 group-hover:text-primary-light/60 transition-colors duration-300 select-none">01</div>
                    <div class="w-14 h-14 bg-primary-light rounded-2xl flex items-center justify-center mb-5 group-hover:bg-gradient-to-br group-hover:from-primary group-hover:to-primary-dark group-hover:scale-110 transition-all duration-300 shadow-sm">
                        <svg class="w-7 h-7 text-primary group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 3v1m0 16v1m8.66-13.07l-.71.71M4.05 19.95l-.71.71M21 12h-1M4 12H3m16.95 7.95l-.71-.71M4.76 4.76l-.71-.71M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Safari Sholat Subuh</h3>
                    <p class="text-xs font-semibold text-primary uppercase tracking-wide mb-3">S4 — Semangat Safari Sholat Subuh</p>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Jadwal safari pekanan setiap Sabtu yang bergerak dari masjid ke masjid di 7 kecamatan se-Tangerang Selatan.
                    </p>
                </div>

                {{-- Puskesmas Cerdas Ceria --}}
                <div class="group relative bg-white rounded-2xl border border-gray-200 p-7 hover:border-transparent hover:shadow-2xl hover:shadow-primary/10 hover:-translate-y-1 transition-all duration-300 reveal gradient-border" id="program-puskesmas" style="transition-delay: 80ms">
                    <div class="absolute top-5 right-5 text-5xl font-extrabold text-gray-100 group-hover:text-primary-light/60 transition-colors duration-300 select-none">02</div>
                    <div class="w-14 h-14 bg-primary-light rounded-2xl flex items-center justify-center mb-5 group-hover:bg-gradient-to-br group-hover:from-primary group-hover:to-primary-dark group-hover:scale-110 transition-all duration-300 shadow-sm">
                        <svg class="w-7 h-7 text-primary group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Puskesmas Cerdas Ceria</h3>
                    <p class="text-xs font-semibold text-primary uppercase tracking-wide mb-3">Cek Kesehatan Gratis</p>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Pelayanan cek kesehatan gratis bekerja sama dengan Dinas Kesehatan (Dinkes) Tangerang Selatan untuk masyarakat.
                    </p>
                </div>

                {{-- Pasar Bahagia --}}
                <div class="group relative bg-white rounded-2xl border border-gray-200 p-7 hover:border-transparent hover:shadow-2xl hover:shadow-primary/10 hover:-translate-y-1 transition-all duration-300 reveal gradient-border" id="program-pasar" style="transition-delay: 160ms">
                    <div class="absolute top-5 right-5 text-5xl font-extrabold text-gray-100 group-hover:text-primary-light/60 transition-colors duration-300 select-none">03</div>
                    <div class="w-14 h-14 bg-primary-light rounded-2xl flex items-center justify-center mb-5 group-hover:bg-gradient-to-br group-hover:from-primary group-hover:to-primary-dark group-hover:scale-110 transition-all duration-300 shadow-sm">
                        <svg class="w-7 h-7 text-primary group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Pasar Bahagia</h3>
                    <p class="text-xs font-semibold text-primary uppercase tracking-wide mb-3">Beli Gratis, Bayar dengan Doa</p>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Kegiatan berbagi sayuran gratis untuk masyarakat. Pembayaran cukup dengan doa — karena kebahagiaan itu berbagi.
                    </p>
                </div>

                {{-- Thibbun Nabawi --}}
                <div class="group relative bg-white rounded-2xl border border-gray-200 p-7 hover:border-transparent hover:shadow-2xl hover:shadow-primary/10 hover:-translate-y-1 transition-all duration-300 reveal gradient-border" id="program-thibbun" style="transition-delay: 240ms">
                    <div class="absolute top-5 right-5 text-5xl font-extrabold text-gray-100 group-hover:text-primary-light/60 transition-colors duration-300 select-none">04</div>
                    <div class="w-14 h-14 bg-primary-light rounded-2xl flex items-center justify-center mb-5 group-hover:bg-gradient-to-br group-hover:from-primary group-hover:to-primary-dark group-hover:scale-110 transition-all duration-300 shadow-sm">
                        <svg class="w-7 h-7 text-primary group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                        </svg>
                    </div>
                    <h3 class="text-lg font-bold text-gray-900 mb-1">Thibbun Nabawi</h3>
                    <p class="text-xs font-semibold text-primary uppercase tracking-wide mb-3">Pengobatan Ala Nabi</p>
                    <p class="text-sm text-gray-500 leading-relaxed">
                        Layanan pengobatan ala Nabi oleh praktisi profesional bersertifikat dalam bentuk bakti sosial, infaq seikhlasnya.
                    </p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ STATISTIK / IMPACT SECTION ============ --}}
    <section class="relative overflow-hidden py-20 lg:py-24" id="statistik">
        <div class="absolute inset-0 bg-gradient-to-br from-dawn-night via-dawn-deep to-primary-dark"></div>
        <div class="absolute inset-0 islamic-pattern opacity-[0.06]"></div>
        <div class="absolute -top-20 left-1/3 w-80 h-80 bg-gold/15 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-10 w-72 h-72 bg-primary/30 rounded-full blur-3xl"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center mb-12 reveal">
                <div class="flex items-center justify-center gap-3 mb-4">
                    <div class="w-10 h-0.5 bg-gradient-to-r from-transparent to-gold"></div>
                    <span class="text-xs font-semibold text-gold-light uppercase tracking-wider">Dampak Gerakan</span>
                    <div class="w-10 h-0.5 bg-gradient-to-l from-transparent to-gold"></div>
                </div>
                <h2 class="text-3xl sm:text-4xl font-bold text-white tracking-tight mb-3">
                    Bergerak Nyata di Lapangan
                </h2>
                <p class="text-white/60 text-sm max-w-lg mx-auto">
                    Memakmurkan masjid dan melayani masyarakat Tangerang Selatan, dari subuh ke subuh.
                </p>
            </div>

            <div class="grid grid-cols-2 lg:grid-cols-4 gap-5">
                <div class="text-center p-7 rounded-2xl glass reveal">
                    <p class="text-4xl sm:text-5xl font-extrabold text-gradient-gold mb-1" data-count="7">0</p>
                    <p class="text-sm text-white/60 font-medium">Kecamatan</p>
                </div>
                <div class="text-center p-7 rounded-2xl glass reveal" style="transition-delay: 80ms">
                    <p class="text-4xl sm:text-5xl font-extrabold text-gradient-gold mb-1" data-count="54">0</p>
                    <p class="text-sm text-white/60 font-medium">Kelurahan</p>
                </div>
                <div class="text-center p-7 rounded-2xl glass reveal" style="transition-delay: 160ms">
                    <p class="text-4xl sm:text-5xl font-extrabold text-gradient-gold mb-1" data-count="4">0</p>
                    <p class="text-sm text-white/60 font-medium">Program Aktif</p>
                </div>
                <div class="text-center p-7 rounded-2xl glass reveal" style="transition-delay: 240ms">
                    <div class="flex items-center justify-center mb-1">
                        <svg class="w-10 h-10 sm:w-12 sm:h-12 text-gold-light" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                        </svg>
                    </div>
                    <p class="text-sm text-white/60 font-medium">Setiap Sabtu</p>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ KALENDER KEGIATAN SECTION ============ --}}
    <section class="relative py-20 lg:py-28 bg-white overflow-hidden" id="kalender">
        <div class="absolute top-10 left-0 w-72 h-72 bg-primary-light/50 rounded-full blur-3xl"></div>
        <div class="absolute bottom-10 right-0 w-80 h-80 bg-gold/10 rounded-full blur-3xl"></div>
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Section Header --}}
            <div class="max-w-2xl mb-12 lg:mb-16 reveal">
                <div class="flex items-center gap-3 mb-4">
                    <div class="w-10 h-0.5 bg-gradient-to-r from-primary to-gold"></div>
                    <span class="text-xs font-semibold text-primary uppercase tracking-wider">Agenda Kegiatan</span>
                </div>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight mb-4">
                    Kalender Kegiatan<br>
                    <span class="text-gradient-primary">GPS TangSel</span>
                </h2>
                <p class="text-gray-500 leading-relaxed">
                    Pantau kegiatan GPS TangSel sepanjang bulan. Klik tanggal yang ditandai untuk melihat detail kegiatan — mulai dari Safari Subuh pekanan hingga program sosial kemasyarakatan.
                </p>
            </div>

            {{-- Calendar + Detail --}}
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 lg:gap-8">
                {{-- Calendar Grid --}}
                <div class="reveal">
                    <div class="relative bg-white rounded-3xl border border-gray-200 p-5 lg:p-6 shadow-sm h-full">
                        {{-- Month navigation --}}
                        <div class="flex items-center justify-between mb-4">
                            <button type="button" id="cal-prev" class="w-8 h-8 rounded-lg border border-gray-200 flex items-center justify-center text-gray-500 hover:bg-gray-50 hover:text-primary hover:border-primary/30 transition-all duration-200 disabled:opacity-30 disabled:cursor-not-allowed" aria-label="Bulan sebelumnya">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                            </button>
                            <div class="text-center">
                                <h3 class="text-base font-bold text-gray-900" id="cal-month-label">Juli 2026</h3>
                                <p class="text-[10px] text-gray-400 mt-0.5" id="cal-event-count">0 kegiatan</p>
                            </div>
                            <button type="button" id="cal-next" class="w-8 h-8 rounded-lg border border-gray-200 flex items-center justify-center text-gray-500 hover:bg-gray-50 hover:text-primary hover:border-primary/30 transition-all duration-200 disabled:opacity-30 disabled:cursor-not-allowed" aria-label="Bulan berikutnya">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                            </button>
                        </div>

                        {{-- Weekday headers --}}
                        <div class="grid grid-cols-7 gap-0.5 mb-1.5">
                            @foreach (['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'] as $wd)
                                <div class="text-center text-[9px] font-bold text-gray-400 uppercase tracking-wide py-0.5">{{ $wd }}</div>
                            @endforeach
                        </div>

                        {{-- Day cells (rendered by JS) --}}
                        <div class="grid grid-cols-7 gap-0.5" id="cal-grid"></div>

                        {{-- Legend --}}
                        <div class="flex flex-wrap items-center gap-x-3 gap-y-1.5 mt-5 pt-4 border-t border-gray-100">
                            <div class="flex items-center gap-1">
                                <span class="w-2 h-2 rounded-full bg-gradient-to-br from-gold to-amber-500"></span>
                                <span class="text-[10px] text-gray-500 font-medium">Safari Subuh</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                                <span class="text-[10px] text-gray-500 font-medium">Pasar Bahagia</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="w-2 h-2 rounded-full bg-primary"></span>
                                <span class="text-[10px] text-gray-500 font-medium">Puskesmas</span>
                            </div>
                            <div class="flex items-center gap-1">
                                <span class="w-2 h-2 rounded-full bg-amber-500"></span>
                                <span class="text-[10px] text-gray-500 font-medium">Thibbun Nabawi</span>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Event Detail Panel --}}
                <div class="reveal" style="transition-delay: 100ms">
                    <div class="relative bg-gradient-to-br from-dawn-night via-dawn-deep to-primary-dark rounded-3xl p-5 lg:p-6 shadow-xl shadow-primary/10 overflow-hidden h-full">
                        <div class="absolute inset-0 islamic-pattern opacity-[0.06]"></div>
                        <div class="absolute -top-16 -right-16 w-48 h-48 bg-gold/15 rounded-full blur-3xl"></div>

                        <div class="relative flex flex-col h-full">
                            <div class="flex items-center justify-between mb-4">
                                <p class="text-[11px] font-semibold text-gold-light uppercase tracking-widest">Detail Kegiatan</p>
                                <svg class="w-4 h-4 text-gold-light/60" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>

                            <div id="cal-detail" class="flex-1">
                                {{-- Populated by JS --}}
                            </div>

                            <p class="text-center text-[10px] text-white/30 mt-4 pt-4 border-t border-white/10">
                                Klik tanggal berwarna pada kalender untuk melihat detail
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- ============ CTA SECTION ============ --}}
    <section class="relative overflow-hidden py-20 lg:py-24" id="kontak">
        <div class="absolute inset-0 bg-gradient-to-br from-dawn-deep via-dawn-glow to-primary-dark"></div>
        <div class="absolute inset-0 islamic-pattern opacity-[0.07]"></div>
        <div class="absolute -bottom-20 left-1/2 -translate-x-1/2 w-[40rem] h-40 bg-gold/25 rounded-full blur-3xl"></div>

        {{-- Mosque silhouette --}}
        <svg class="absolute inset-x-0 bottom-0 w-full h-16 text-dawn-night/80" viewBox="0 0 1200 80" preserveAspectRatio="none" fill="currentColor" aria-hidden="true">
            <rect x="0" y="60" width="1200" height="20" />
            <rect x="200" y="35" width="60" height="45" />
            <path d="M230 12 q-18 14 0 26 q18 -12 0 -26" />
            <rect x="560" y="25" width="80" height="55" />
            <path d="M600 5 q-28 18 0 32 q28 -14 0 -32" />
            <rect x="920" y="35" width="60" height="45" />
            <path d="M950 12 q-18 14 0 26 q18 -12 0 -26" />
        </svg>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-3xl mx-auto text-center reveal">
                <div class="flex items-center justify-center gap-3 mb-4">
                    <div class="w-10 h-0.5 bg-gradient-to-r from-transparent to-gold"></div>
                    <span class="text-xs font-semibold text-gold-light uppercase tracking-wider">Bergabung Bersama Kami</span>
                    <div class="w-10 h-0.5 bg-gradient-to-l from-transparent to-gold"></div>
                </div>
                <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight mb-4">
                    Mari Berjuang Bersama<br>
                    <span class="text-gradient-gold">di Shalat Subuh</span>
                </h2>
                <p class="text-white/70 leading-relaxed mb-9 max-w-xl mx-auto">
                    Bergabunglah dalam gerakan untuk memakmurkan masjid di waktu subuh. Ajukan masjid Anda untuk dikunjungi Safari Subuh atau ikut berpartisipasi sebagai relawan.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center gap-3">
                    <a href="https://wa.me/" target="_blank" rel="noopener noreferrer" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white bg-emerald-500 rounded-lg border border-emerald-400/50 hover:bg-emerald-600 hover:-translate-y-0.5 transition-all duration-200" id="cta-whatsapp">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                        </svg>
                        Hubungi via WhatsApp
                    </a>
                    <a href="#program" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-dawn-night bg-gradient-to-r from-gold-light to-gold rounded-lg border border-gold/50 hover:-translate-y-0.5 transition-all duration-200" id="cta-ajukan">
                        Ajukan Masjid untuk S4
                    </a>
                </div>
            </div>
        </div>
    </section>

@endsection

@push('scripts')
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            {{-- Read prayer times from server-rendered DOM (data-prayer + data-time) --}}
            const prayers = Array.from(document.querySelectorAll('.prayer-slot')).map(function (slot) {
                return {
                    key: slot.dataset.prayer,
                    name: slot.querySelector('.prayer-name') ? slot.querySelector('.prayer-name').textContent : slot.dataset.prayer,
                    time: slot.dataset.time,
                };
            });

            function timeToMinutes(t) {
                const parts = t.split(':');
                return parseInt(parts[0], 10) * 60 + parseInt(parts[1], 10);
            }

            function getNextPrayer() {
                const now = new Date();
                const nowMin = now.getHours() * 60 + now.getMinutes() + (now.getSeconds() > 0 ? 1 : 0);
                for (let i = 0; i < prayers.length; i++) {
                    if (nowMin < timeToMinutes(prayers[i].time)) {
                        return { prayer: prayers[i], index: i, tomorrow: false };
                    }
                }
                {{-- After Isya, next is Subuh tomorrow --}}
                return { prayer: prayers[0], index: 0, tomorrow: true };
            }

            const RING_CIRCUMFERENCE = 2 * Math.PI * 34;
            const ring = document.getElementById('countdown-ring');
            const countdownText = document.getElementById('countdown-text');
            const nextPrayerName = document.getElementById('next-prayer-name');
            const nextPrayerTime = document.getElementById('next-prayer-time');

            function updateCountdown() {
                const now = new Date();
                const next = getNextPrayer();
                const parts = next.prayer.time.split(':');
                const h = parseInt(parts[0], 10);
                const m = parseInt(parts[1], 10);
                const target = new Date(now);
                target.setHours(h, m, 0, 0);
                if (next.tomorrow) {
                    target.setDate(target.getDate() + 1);
                }

                const diff = Math.max(0, target - now);
                const totalMs = next.tomorrow
                    ? (24 * 60 * 60 * 1000)
                    : ((h * 60 + m) * 60 * 1000);
                const progress = totalMs > 0 ? (1 - (diff / totalMs)) : 0;

                const hours = Math.floor(diff / 3600000);
                const minutes = Math.floor((diff % 3600000) / 60000);
                const seconds = Math.floor((diff % 60000) / 1000);
                const pad = function (n) { return n < 10 ? '0' + n : '' + n; };

                if (countdownText) {
                    countdownText.textContent = pad(hours) + ':' + pad(minutes) + ':' + pad(seconds);
                }
                if (ring) {
                    ring.style.strokeDashoffset = RING_CIRCUMFERENCE * (1 - progress);
                }
                if (nextPrayerName) {
                    nextPrayerName.textContent = next.prayer.name;
                }
                if (nextPrayerTime) {
                    nextPrayerTime.textContent = next.prayer.time + ' WIB' + (next.tomorrow ? ' (besok)' : '');
                }

                {{-- Highlight the upcoming prayer slot --}}
                document.querySelectorAll('.prayer-slot').forEach(function (slot) {
                    if (slot.dataset.prayer === next.prayer.key) {
                        slot.classList.add('bg-gradient-to-br', 'from-gold/30', 'to-amber-500/20', 'border-gold/50');
                        slot.classList.remove('bg-white/5', 'border-white/10');
                        const svg = slot.querySelector('svg');
                        if (svg) {
                            svg.classList.remove('text-gold-light/70');
                            svg.classList.add('text-gold-light');
                        }
                        const timeEl = slot.querySelector('.prayer-time');
                        if (timeEl) {
                            timeEl.classList.add('text-gold-light');
                            timeEl.classList.remove('text-white');
                        }
                    }
                });
            }

            updateCountdown();
            setInterval(updateCountdown, 1000);

            {{-- ============ ACTIVITY CALENDAR ============ --}}
            const calEvents = @json($calendarEvents);
            const calMonthNames = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
            const calMonthKeys = Object.keys(calEvents).sort();
            let calCurrentIdx = 0;
            let calSelectedDay = null;

            const calGrid = document.getElementById('cal-grid');
            const calMonthLabel = document.getElementById('cal-month-label');
            const calEventCount = document.getElementById('cal-event-count');
            const calDetail = document.getElementById('cal-detail');
            const calPrevBtn = document.getElementById('cal-prev');
            const calNextBtn = document.getElementById('cal-next');

            const calColorClasses = {
                gold: 'bg-gradient-to-br from-gold to-amber-500',
                emerald: 'bg-emerald-500',
                primary: 'bg-primary',
                amber: 'bg-amber-500',
            };
            const calBadgeClasses = {
                gold: 'bg-amber-500/20 text-gold-light border-amber-400/30',
                emerald: 'bg-emerald-500/20 text-emerald-300 border-emerald-400/30',
                primary: 'bg-primary/40 text-primary-light border-primary/40',
                amber: 'bg-amber-500/20 text-amber-300 border-amber-400/30',
            };
            const calDotClasses = {
                gold: 'bg-gradient-to-br from-gold to-amber-500',
                emerald: 'bg-emerald-400',
                primary: 'bg-primary-light',
                amber: 'bg-amber-400',
            };
            const calIconSvg = {
                mosque: '<path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M5 21V8l7-5 7 5v13M9 21v-6h6v6M9 11h.01M15 11h.01"/>',
                cart: '<path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/>',
                heart: '<path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>',
                flask: '<path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>',
            };

            function calTodayKey() {
                const t = new Date();
                return t.getFullYear() + '-' + String(t.getMonth() + 1).padStart(2, '0');
            }
            function calTodayDay() {
                return new Date().getDate();
            }
            function calDateStr(y, m, d) {
                return y + '-' + String(m).padStart(2, '0') + '-' + String(d).padStart(2, '0');
            }

            function renderCalendar() {
                const monthKey = calMonthKeys[calCurrentIdx];
                const [year, month] = monthKey.split('-').map(function (v) { return parseInt(v, 10); });
                const monthEvents = calEvents[monthKey] || [];
                const firstWeekday = new Date(year, month - 1, 1).getDay();
                const daysInMonth = new Date(year, month, 0).getDate();
                const todayKey = calTodayKey();
                const isThisMonth = monthKey === todayKey;
                const todayDay = calTodayDay();

                calMonthLabel.textContent = calMonthNames[month - 1] + ' ' + year;
                calEventCount.textContent = monthEvents.length + ' kegiatan';

                calPrevBtn.disabled = calCurrentIdx === 0;
                calNextBtn.disabled = calCurrentIdx >= calMonthKeys.length - 1;

                let html = '';
                for (let i = 0; i < firstWeekday; i++) {
                    html += '<div class="aspect-square"></div>';
                }
                for (let d = 1; d <= daysInMonth; d++) {
                    const dayEvents = monthEvents.filter(function (e) { return e.day === d; });
                    const hasEvent = dayEvents.length > 0;
                    const isToday = isThisMonth && d === todayDay;
                    const isSelected = calSelectedDay === d;
                    const past = isThisMonth && d < todayDay;

                    let classes = 'aspect-square flex flex-col items-center justify-center rounded-lg text-xs transition-all duration-150 relative ';
                    if (hasEvent) {
                        classes += 'cursor-pointer hover:scale-105 hover:shadow-md ';
                        if (isSelected) {
                            classes += 'bg-gradient-to-br from-primary to-primary-dark text-white shadow-md ';
                        } else if (isToday) {
                            classes += 'bg-primary-light text-primary font-bold ring-2 ring-primary/30 ';
                        } else {
                            classes += 'bg-gray-50 text-gray-700 hover:bg-primary-light/50 font-semibold ';
                        }
                    } else {
                        classes += 'text-gray-300 ';
                        if (isToday) {
                            classes += 'ring-1 ring-gray-200 font-semibold text-gray-500 ';
                        }
                    }
                    if (past && hasEvent && !isSelected) {
                        classes += 'opacity-50 ';
                    }

                    let dots = '';
                    if (hasEvent) {
                        dots = '<div class="absolute bottom-1 flex gap-px">';
                        dayEvents.forEach(function (e) {
                            dots += '<span class="w-1 h-1 rounded-full ' + (calDotClasses[e.color] || 'bg-gold') + '"></span>';
                        });
                        dots += '</div>';
                    }

                    html += '<button type="button" class="' + classes.trim() + '" data-day="' + d + '"' + (hasEvent ? '' : ' disabled') + '>';
                    html += '<span>' + d + '</span>';
                    html += dots;
                    html += '</button>';
                }
                calGrid.innerHTML = html;

                calGrid.querySelectorAll('button[data-day]').forEach(function (btn) {
                    if (btn.disabled) { return; }
                    btn.addEventListener('click', function () {
                        calSelectedDay = parseInt(btn.dataset.day, 10);
                        renderCalendar();
                        renderDetail();
                    });
                });

                if (calSelectedDay !== null) { renderDetail(); }
            }

            function renderDetail() {
                const monthKey = calMonthKeys[calCurrentIdx];
                const monthEvents = calEvents[monthKey] || [];
                const [year, month] = monthKey.split('-').map(function (v) { return parseInt(v, 10); });

                let day = calSelectedDay;
                let events = day !== null ? monthEvents.filter(function (e) { return e.day === day; }) : [];

                {{-- Auto-select next upcoming event if nothing chosen --}}
                if (day === null || events.length === 0) {
                    const today = new Date();
                    let found = null;
                    for (let i = calCurrentIdx; i < calMonthKeys.length; i++) {
                        const mk = calMonthKeys[i];
                        const [y, mo] = mk.split('-').map(function (v) { return parseInt(v, 10); });
                        const upcoming = (calEvents[mk] || []).filter(function (e) {
                            const ed = new Date(y, mo - 1, e.day);
                            return ed >= new Date(today.getFullYear(), today.getMonth(), today.getDate());
                        }).sort(function (a, b) { return a.day - b.day; });
                        if (upcoming.length > 0) {
                            found = { monthIdx: i, day: upcoming[0].day, events: [upcoming[0]] };
                            break;
                        }
                    }
                    if (found) {
                        calCurrentIdx = found.monthIdx;
                        calSelectedDay = found.day;
                        events = found.events;
                        renderCalendar();
                        return;
                    }
                    calDetail.innerHTML = '<div class="text-center py-8"><p class="text-sm text-white/50">Belum ada kegiatan terjadwalkan.</p></div>';
                    return;
                }

                let html = '';
                events.forEach(function (e) {
                    html += '<div class="mb-4 last:mb-0">';
                    html += '<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider border ' + (calBadgeClasses[e.color] || calBadgeClasses.gold) + ' mb-3">';
                    html += '<span class="w-1.5 h-1.5 rounded-full ' + (calDotClasses[e.color] || 'bg-gold') + '"></span>';
                    html += e.program;
                    html += '</span>';
                    html += '<h4 class="text-lg font-bold text-white mb-2">' + e.title + '</h4>';
                    html += '<div class="flex items-center gap-2 text-sm text-gold-light/90 mb-1.5">';
                    html += '<svg class="w-4 h-4 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>';
                    html += '<span>' + e.weekday + ', ' + calDateStr(year, month, e.day) + ' · ' + e.time + '</span>';
                    html += '</div>';
                    html += '<div class="flex items-start gap-2 text-sm text-white/70 mb-3">';
                    html += '<svg class="w-4 h-4 flex-shrink-0 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>';
                    html += '<span>' + e.location + '</span>';
                    html += '</div>';
                    html += '<div class="flex items-start gap-2">';
                    html += '<svg class="w-4 h-4 flex-shrink-0 mt-0.5 text-gold-light/70" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">' + (calIconSvg[e.icon] || '') + '</svg>';
                    html += '<p class="text-[13px] text-white/60 leading-relaxed">' + e.description + '</p>';
                    html += '</div>';
                    html += '</div>';
                });

                if (events.length > 1) {
                    html = '<div class="space-y-5 divide-y divide-white/10">' + html + '</div>';
                }

                calDetail.innerHTML = html;
            }

            if (calGrid) {
                calPrevBtn.addEventListener('click', function () {
                    if (calCurrentIdx > 0) {
                        calCurrentIdx--;
                        calSelectedDay = null;
                        renderCalendar();
                        renderDetail();
                    }
                });
                calNextBtn.addEventListener('click', function () {
                    if (calCurrentIdx < calMonthKeys.length - 1) {
                        calCurrentIdx++;
                        calSelectedDay = null;
                        renderCalendar();
                        renderDetail();
                    }
                });
                renderCalendar();
                renderDetail();
            }
        });
    </script>
@endpush
