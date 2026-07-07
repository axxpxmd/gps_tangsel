<div>
    {{-- Hero Section --}}
    <section class="relative min-h-[50vh] flex items-center justify-center overflow-hidden bg-dawn-night">
        <div class="absolute inset-0 islamic-pattern opacity-[0.04]"></div>
        <div class="absolute -top-24 right-10 w-96 h-96 bg-primary/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 left-10 w-80 h-80 bg-gold/10 rounded-full blur-3xl"></div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-20">
            <div class="flex items-center justify-center gap-3 mb-6">
                <div class="w-10 h-0.5 bg-gradient-to-r from-primary to-gold"></div>
                <span class="text-xs font-semibold text-gold-light uppercase tracking-wider">Berita & Artikel</span>
                <div class="w-10 h-0.5 bg-gradient-to-r from-gold to-primary"></div>
            </div>
            <h1 class="text-4xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight mb-6">
                Kabar Terbaru<br>
                <span class="text-gradient-gold">GPS TangSel</span>
            </h1>
            <p class="text-white/70 leading-relaxed text-base lg:text-lg max-w-2xl mx-auto">
                Ikuti perkembangan kegiatan, pengumuman, dan dokumentasi gerakan Pejuang Subuh Tangerang Selatan.
            </p>
        </div>
    </section>

    {{-- Filter & Search --}}
    <section class="relative py-8 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-col sm:flex-row gap-4 items-center justify-between">
                {{-- Search --}}
                <div class="relative w-full sm:w-80">
                    <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    <input
                        wire:model.live.debounce.300ms="search"
                        type="text"
                        placeholder="Cari artikel..."
                        class="w-full pl-10 pr-4 py-2.5 text-sm border border-gray-200 rounded-lg focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors"
                    >
                </div>

                {{-- Category Filter --}}
                <div class="flex flex-wrap gap-2 justify-center">
                    <button
                        wire:click="$set('category', '')"
                        class="px-4 py-2 text-xs font-semibold rounded-full transition-all duration-200 {{ $category === '' ? 'bg-primary text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}"
                    >
                        Semua
                    </button>
                    @foreach ($categories as $cat)
                        <button
                            wire:click="$set('category', '{{ $cat }}')"
                            class="px-4 py-2 text-xs font-semibold rounded-full transition-all duration-200 {{ $category === $cat ? 'bg-primary text-white shadow-md' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}"
                        >
                            {{ $cat }}
                        </button>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    {{-- Articles Grid --}}
    <section class="relative py-16 lg:py-24 bg-[#F5F5F5] overflow-hidden">
        <div class="absolute inset-0 islamic-pattern-dark opacity-[0.02]"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if ($articles->count() > 0)
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    @foreach ($articles as $article)
                        <a href="{{ route('berita.show', $article->slug) }}" wire:navigate class="group relative flex flex-col bg-white rounded-2xl border border-gray-200 overflow-hidden hover:border-transparent hover:shadow-2xl hover:shadow-primary/10 hover:-translate-y-1 transition-all duration-300 reveal" style="transition-delay: {{ $loop->index * 80 }}ms">
                            {{-- Thumbnail --}}
                            <div class="relative aspect-[16/10] overflow-hidden bg-gray-100">
                                <img src="{{ $article->image }}" alt="{{ $article->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                                <span class="absolute top-4 left-4 inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-white/90 backdrop-blur-sm text-primary border border-primary/10 shadow-sm">
                                    {{ $article->category }}
                                </span>
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

                {{-- Pagination --}}
                <div class="mt-12">
                    {{ $articles->links() }}
                </div>
            @else
                <div class="text-center py-20">
                    <svg class="w-16 h-16 text-gray-300 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                    </svg>
                    <h3 class="text-lg font-semibold text-gray-600 mb-2">Artikel tidak ditemukan</h3>
                    <p class="text-sm text-gray-400">Coba ubah kata kunci atau filter kategori.</p>
                </div>
            @endif
        </div>
    </section>
</div>
