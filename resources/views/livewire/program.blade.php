<div>
    {{-- Hero Section --}}
    <section class="relative min-h-[35vh] sm:min-h-[45vh] flex items-center justify-center overflow-hidden bg-dawn-night">
        <div class="absolute inset-0 islamic-pattern opacity-[0.04]"></div>
        <div class="absolute -top-24 right-10 w-96 h-96 bg-primary/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 left-10 w-80 h-80 bg-gold/10 rounded-full blur-3xl"></div>

        <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-12 sm:py-16">
            <div class="flex items-center justify-center gap-3 mb-6">
                <div class="w-10 h-0.5 bg-gradient-to-r from-primary to-gold"></div>
                <span class="text-xs font-semibold text-gold-light uppercase tracking-wider">Program Unggulan</span>
                <div class="w-10 h-0.5 bg-gradient-to-r from-gold to-primary"></div>
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight mb-6">
                Program Unggulan<br>
                <span class="text-gradient-gold">GPS TangSel</span>
            </h1>
            <p class="text-white/70 leading-relaxed text-base lg:text-lg">
                Lima program utama yang menjadi pilar gerakan kami dalam memakmurkan masjid dan melayani masyarakat Tangerang Selatan.
            </p>
        </div>
    </section>

    {{-- All Programs Grid --}}
    <section class="relative py-14 lg:py-20 bg-[#F5F5F5] overflow-hidden">
        <div class="absolute inset-0 islamic-pattern-dark opacity-[0.015]"></div>
        <div class="absolute top-0 right-0 w-80 h-80 bg-primary/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
        <div class="absolute bottom-0 left-0 w-72 h-72 bg-gold/5 rounded-full blur-3xl translate-y-1/2 -translate-x-1/3"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if ($programs->isEmpty())
                <div class="text-center py-16 reveal">
                    <div class="w-20 h-20 mx-auto mb-5 rounded-2xl bg-white/10 flex items-center justify-center">
                        <svg class="w-10 h-10 text-white/30" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zm0 9.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zm0 9.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
                        </svg>
                    </div>
                    <p class="text-sm text-gray-500">Belum ada program tersedia.</p>
                </div>
            @else
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    @foreach ($programs as $program)
                        <article class="group flex flex-col bg-white rounded-2xl overflow-hidden border border-gray-100 hover:border-primary/30 hover:shadow-xl hover:shadow-gray-200/50 hover:-translate-y-1 transition-all duration-300 reveal">
                            <div class="relative aspect-[16/10] overflow-hidden bg-gray-100">
                                @if ($program->gambar_url)
                                    <img src="{{ $program->gambar_url }}" alt="{{ $program->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                                @else
                                    <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary/10 to-primary/5">
                                        <svg class="w-12 h-12 text-primary/20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zm0 9.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zm0 9.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
                                        </svg>
                                    </div>
                                @endif
                                <div class="absolute top-4 left-4 inline-flex items-center justify-center w-9 h-9 rounded-xl bg-white/90 backdrop-blur-sm text-xs font-bold text-gray-700 shadow-sm">
                                    {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                                </div>
                            </div>
                            <div class="flex flex-col flex-1 p-6">
                                <h3 class="text-lg font-bold text-gray-900 mb-2 leading-snug group-hover:text-primary transition-colors duration-200 line-clamp-2">
                                    {{ $program->title }}
                                </h3>
                                <p class="text-sm text-gray-500 leading-relaxed mb-5 flex-1 line-clamp-3">
                                    {{ $program->description }}
                                </p>
                                <div class="rounded-xl bg-gray-50 border border-gray-100 p-4">
                                    <div class="flex items-center gap-2 mb-1.5">
                                        <svg class="w-3.5 h-3.5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                                        </svg>
                                        <span class="text-[11px] font-bold text-primary uppercase tracking-wider">Penerima Manfaat</span>
                                    </div>
                                    <p class="text-xs text-gray-500 leading-relaxed">{{ $program->penerima_manfaat }}</p>
                                </div>
                            </div>
                        </article>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- CTA --}}
    <section class="relative py-14 lg:py-20 bg-[#F5F5F5] overflow-hidden">
        <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center reveal">
            <div class="rounded-3xl bg-gradient-to-br from-primary to-dawn-deep p-10 lg:p-14">
                <h2 class="text-3xl sm:text-4xl font-extrabold text-white mb-4">
                    Ingin Terlibat?
                </h2>
                <p class="text-white/70 mb-8 max-w-lg mx-auto">
                    Lihat agenda kegiatan kami dan ikut berpartisipasi dalam program GPS Tangsel.
                </p>
                <a href="{{ url('/#kalender') }}" class="inline-flex items-center gap-2 px-8 py-3.5 bg-gold text-dawn-night font-bold rounded-full hover:bg-gold-light hover:shadow-lg hover:shadow-gold/30 transition-all duration-300">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                    </svg>
                    Lihat Agenda Kegiatan
                </a>
            </div>
        </div>
    </section>
</div>
