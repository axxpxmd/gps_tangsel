{{-- ============ PROGRAM SECTION ============ --}}
<section class="relative py-14 lg:py-20 bg-[#F5F5F5] overflow-hidden" id="program">
    <div class="absolute inset-0 islamic-pattern-dark opacity-[0.015]"></div>
    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center max-w-2xl mx-auto mb-10 lg:mb-14 reveal">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="w-10 h-0.5 bg-gradient-to-r from-transparent to-primary"></div>
                <span class="text-xs font-semibold text-primary uppercase tracking-wider">Program Unggulan</span>
                <div class="w-10 h-0.5 bg-gradient-to-l from-transparent to-primary"></div>
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight mb-4">
                Program Kerja <span class="text-gradient-gold">GPS TANGSEL</span>
            </h2>
            <p class="text-gray-500 leading-relaxed">
                Program utama yang menjadi pilar gerakan kami dalam memakmurkan masjid dan melayani masyarakat.
            </p>
        </div>

        @php
            $displayPrograms = $programs->take(4);
        @endphp

        @if ($displayPrograms->isEmpty())
            <div class="text-center py-12 reveal">
                <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-gray-100 flex items-center justify-center">
                    <svg class="w-8 h-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zm0 9.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zm0 9.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
                    </svg>
                </div>
                <p class="text-sm text-gray-400">Belum ada program tersedia.</p>
            </div>
        @else
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6 lg:gap-7">
                @foreach ($displayPrograms as $program)
                    <article class="group flex flex-col bg-white rounded-2xl overflow-hidden border border-gray-100 hover:border-primary/30 hover:shadow-xl hover:shadow-gray-200/50 hover:-translate-y-1 transition-all duration-300 reveal">
                        <div class="relative aspect-[4/3] overflow-hidden bg-gray-100">
                            @if ($program->gambar_url)
                                <img src="{{ $program->gambar_url }}" alt="{{ $program->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-700" loading="lazy">
                            @else
                                <div class="w-full h-full flex items-center justify-center bg-gradient-to-br from-primary/10 to-primary/5">
                                    <svg class="w-12 h-12 text-primary/20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zm0 9.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zm0 9.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
                                    </svg>
                                </div>
                            @endif
                            <span class="absolute top-4 right-4 inline-flex items-center justify-center w-9 h-9 rounded-xl bg-white/90 backdrop-blur-sm text-xs font-bold text-gray-700 shadow-sm">
                                {{ str_pad($loop->iteration, 2, '0', STR_PAD_LEFT) }}
                            </span>
                        </div>
                        <div class="flex flex-col flex-1 p-6">
                            <h3 class="text-lg font-bold text-gray-900 mb-2 leading-snug group-hover:text-primary transition-colors duration-200 line-clamp-2">
                                {{ $program->title }}
                            </h3>
                            <p class="text-sm text-gray-500 leading-relaxed mb-5 flex-1 line-clamp-3">
                                {{ $program->description }}
                            </p>
                            {{-- <div class="flex items-center gap-1.5 text-xs text-gray-400">
                                <svg class="w-3.5 h-3.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                                </svg>
                                <span class="line-clamp-1">{{ \Illuminate\Support\Str::limit($program->penerima_manfaat, 50) }}</span>
                            </div> --}}
                        </div>
                    </article>
                @endforeach
            </div>
        @endif

        @if ($programs->count() > 4)
            <div class="mt-12 text-center reveal">
                <a href="{{ route('program') }}" wire:navigate class="inline-flex items-center gap-2 px-6 py-3 bg-white border border-gray-200 text-sm font-semibold text-gray-700 rounded-full hover:border-primary hover:text-primary hover:shadow-lg hover:shadow-primary/5 transition-all duration-300">
                    Lihat Selengkapnya
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                </a>
            </div>
        @endif
    </div>
</section>
