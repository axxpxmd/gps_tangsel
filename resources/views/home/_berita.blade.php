{{-- ============ BERITA & ARTIKEL SECTION ============ --}}
<section class="relative py-14 lg:py-20 bg-[#F5F5F5] overflow-hidden" id="berita">
    <div class="absolute inset-0 islamic-pattern-dark opacity-[0.02]"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center max-w-2xl mx-auto mb-12 lg:mb-16 reveal">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="w-10 h-0.5 bg-gradient-to-r from-transparent to-primary"></div>
                <span class="text-xs font-semibold text-primary uppercase tracking-wider">Berita & Artikel</span>
                <div class="w-10 h-0.5 bg-gradient-to-l from-transparent to-primary"></div>
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight mb-4">
                Kabar Terbaru <span class="text-gradient-gold">GPS TANGSEL</span>
            </h2>
            <p class="text-gray-500 leading-relaxed">
                Ikuti perkembangan kegiatan, pengumuman, dan dokumentasi gerakan Pejuang Subuh Tangerang Selatan.
            </p>
        </div>

        {{-- Articles Grid --}}
        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
            @foreach ($articles as $article)
                <a href="{{ route('berita.show', $article->slug) }}" wire:navigate class="group relative flex flex-col bg-white rounded-2xl border border-gray-200 overflow-hidden hover:border-transparent hover:shadow-2xl hover:shadow-primary/10 hover:-translate-y-1 transition-all duration-300 reveal" style="transition-delay: {{ $loop->index * 80 }}ms">
                    {{-- Thumbnail --}}
                    <div class="relative aspect-[16/10] overflow-hidden bg-gray-100">
                        <img src="{{ $article->image ?: asset('image-placeholder.png') }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                    </div>

                    {{-- Body --}}
                    <div class="flex flex-col flex-1 p-6">
                        <div class="flex flex-wrap items-center gap-x-3 gap-y-1 text-[11px] text-gray-400 font-medium mb-3">
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                {{ $article->formatted_date }}
                            </span>
                            <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                            <span class="inline-flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                {{ $article->read_time }} mnt baca
                            </span>
                        </div>

                        <h3 class="text-lg font-bold text-gray-900 mb-3 leading-snug group-hover:text-primary transition-colors duration-200">
                            {{ $article->title }}
                        </h3>

                        <p class="text-sm text-gray-500 leading-relaxed mb-5 line-clamp-3">
                            {{ $article->excerpt }}
                        </p>

                        <div class="mt-auto flex items-center justify-between pt-4 border-t border-gray-100">
                            <span class="text-xs text-gray-400 font-medium">Oleh {{ $article->author }}</span>
                            <span class="inline-flex items-center gap-1 text-xs font-semibold text-primary group-hover:gap-2 transition-all duration-200">
                                Baca selengkapnya
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                            </span>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>

        {{-- View all --}}
        <div class="text-center mt-12 reveal">
            <a href="{{ route('berita') }}" wire:navigate class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-primary bg-white rounded-lg border border-primary/20 hover:bg-primary hover:text-white hover:border-primary transition-all duration-200">
                Lihat Semua Artikel
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
            </a>
        </div>
    </div>
</section>
