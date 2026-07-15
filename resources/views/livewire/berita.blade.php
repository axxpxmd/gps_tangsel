<div>
    {{-- Hero Section --}}
     <section class="relative min-h-[35vh] sm:min-h-[45vh] flex items-center justify-center overflow-hidden bg-dawn-night">
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
                <span class="text-gradient-gold">GPS TANGSEL</span>
            </h1>
            <p class="text-white/70 leading-relaxed text-base lg:text-lg max-w-2xl mx-auto">
                Ikuti perkembangan kegiatan, pengumuman, dan dokumentasi gerakan Pejuang Subuh Tangerang Selatan.
            </p>
        </div>
    </section>

    {{-- Filter & Search --}}
    <section id="berita-filter" class="relative py-10 lg:py-14 bg-gradient-to-b from-white to-gray-50 border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Section Header --}}
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4 mb-8">
                <div>
                    <div class="flex items-center gap-3 mb-2">
                        <span class="inline-flex items-center justify-center w-9 h-9 rounded-xl bg-primary/10 text-primary">
                            <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </span>
                        <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Telusuri Artikel</h2>
                    </div>
                    <p class="text-sm text-gray-500">Temukan kabar, pengumuman, dan dokumentasi kegiatan GPS TANGSEL dengan mudah.</p>
                </div>
                <div class="text-sm text-gray-500">
                    <span class="font-bold text-primary text-lg">{{ $articles->total() }}</span> artikel ditemukan
                </div>
            </div>

            {{-- Filter Card --}}
            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-5 sm:p-6 lg:p-7">
                {{-- Search Bar --}}
                <div class="mb-6" x-data="{ showClear: {{ $search ? 'true' : 'false' }} }">
                    <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-2">Kata Kunci</label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                            <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                            </svg>
                        </div>
                        <input
                            wire:model="search"
                            x-ref="searchInput"
                            type="text"
                            placeholder="Cari berdasarkan judul atau isi artikel..."
                            @input="showClear = $event.target.value.length > 0"
                            class="w-full pl-12 pr-12 py-3 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors"
                        >
                        <button
                            type="button"
                            x-show="showClear"
                            x-cloak
                            @click="$refs.searchInput.value = ''; showClear = false"
                            class="absolute inset-y-0 right-0 pr-4 flex items-center text-gray-400 hover:text-gray-700 transition-colors"
                            aria-label="Hapus teks pencarian"
                        >
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
                    </div>
                </div>

                {{-- Date Range --}}
                <div class="grid grid-cols-1 md:grid-cols-2 gap-4 mb-6">
                    <div>
                        <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-2">Dari Tanggal</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <input
                                wire:model="date_from"
                                type="date"
                                class="w-full pl-10 pr-3 py-2.5 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors"
                            >
                        </div>
                    </div>

                    <div>
                        <label class="block text-[11px] font-bold text-gray-500 uppercase tracking-wider mb-2">Sampai Tanggal</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-3.5 flex items-center pointer-events-none">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <input
                                wire:model="date_to"
                                type="date"
                                class="w-full pl-10 pr-3 py-2.5 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-colors"
                            >
                        </div>
                    </div>
                </div>

                {{-- Action Buttons --}}
                <div class="flex flex-col sm:flex-row gap-3 pt-2 border-t border-gray-100">
                    <button
                        wire:click="applyFilters"
                        class="flex-1 sm:flex-none sm:px-8 inline-flex items-center justify-center gap-2 px-5 py-3 text-sm font-bold text-white bg-primary hover:bg-primary-dark rounded-xl transition-colors shadow-md shadow-primary/20"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M3 4a1 1 0 011-1h16a1 1 0 011 1v2.586a1 1 0 01-.293.707l-6.414 6.414a1 1 0 00-.293.707V17l-4 4v-6.586a1 1 0 00-.293-.707L3.293 7.293A1 1 0 013 6.586V4z"/>
                        </svg>
                        Filter
                    </button>
                    <button
                        wire:click="resetFilters"
                        @disabled(!$search && !$date_from && !$date_to)
                        class="flex-1 sm:flex-none sm:px-6 inline-flex items-center justify-center gap-2 px-5 py-3 text-sm font-semibold text-gray-600 bg-gray-50 hover:bg-gray-100 border border-gray-200 rounded-xl transition-colors disabled:opacity-40 disabled:cursor-not-allowed disabled:hover:bg-gray-50"
                    >
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                        </svg>
                        Reset Filter
                    </button>
                </div>
            </div>
        </div>
    </section>

    {{-- Articles Grid --}}
    <section id="berita-artikel" class="relative py-16 lg:py-24 bg-[#F5F5F5] overflow-hidden">
        <div class="absolute inset-0 islamic-pattern-dark opacity-[0.02]"></div>

        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if ($articles->count() > 0)
                {{-- Section Heading --}}
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-3 mb-8">
                    <div class="flex items-center gap-3">
                        <div class="w-1.5 h-7 bg-gradient-to-b from-primary to-gold rounded-full"></div>
                        <h2 class="text-2xl font-bold text-gray-900 tracking-tight">Daftar Artikel</h2>
                    </div>
                    <div class="text-sm text-gray-500">
                        Menampilkan
                        <span class="font-semibold text-gray-900">{{ $articles->firstItem() }}</span>–<span class="font-semibold text-gray-900">{{ $articles->lastItem() }}</span>
                        dari <span class="font-semibold text-gray-900">{{ $articles->total() }}</span>
                    </div>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    @foreach ($articles as $article)
                        <a
                            href="{{ route('berita.show', $article->slug) }}"
                            wire:navigate
                            x-reveal
                            class="group relative flex flex-col bg-white rounded-2xl border border-gray-200 overflow-hidden hover:border-primary/30 hover:shadow-2xl hover:shadow-primary/10 hover:-translate-y-1 transition-all duration-300 reveal"
                            style="transition-delay: {{ $loop->index * 80 }}ms"
                        >
                            {{-- Thumbnail --}}
                            <div class="relative aspect-[16/10] overflow-hidden bg-gray-100">
                                <img
                                    src="{{ $article->image_url ?: asset('image-placeholder.png') }}"
                                    alt="{{ $article->title }}"
                                    class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500"
                                    loading="lazy"
                                >
                                {{-- Gradient overlay --}}
                                <div class="absolute inset-0 bg-gradient-to-t from-black/40 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                                {{-- Category Badge --}}
                                @if ($article->category)
                                    <span class="absolute top-4 left-4 inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-white/95 backdrop-blur-sm text-primary border border-primary/10 shadow-sm">
                                        <span class="w-1.5 h-1.5 rounded-full bg-primary"></span>
                                        {{ $article->category->name }}
                                    </span>
                                @endif
                            </div>

                            {{-- Body --}}
                            <div class="flex flex-col flex-1 p-6">
                                {{-- Meta --}}
                                <div class="flex items-center gap-3 text-[11px] text-gray-500 font-medium mb-3">
                                    <span class="inline-flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        {{ $article->formatted_date }}
                                    </span>
                                    <span class="text-gray-300">•</span>
                                    <span class="inline-flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                        {{ $article->reading_time }} menit baca
                                    </span>
                                </div>

                                {{-- Title --}}
                                <h3 class="text-lg font-bold text-gray-900 mb-3 leading-snug group-hover:text-primary transition-colors duration-200 line-clamp-2">
                                    {{ $article->title }}
                                </h3>

                                {{-- Excerpt --}}
                                <p class="text-sm text-gray-500 leading-relaxed mb-5 line-clamp-3">
                                    {{ $article->excerpt }}
                                </p>

                                {{-- Footer --}}
                                <div class="mt-auto flex items-center justify-between pt-4 border-t border-gray-100">
                                    <span class="text-xs text-gray-500 font-medium">Oleh {{ $article->author }}</span>
                                    <span class="inline-flex items-center gap-1 text-xs font-bold text-primary group-hover:gap-2 transition-all duration-200">
                                        Baca selengkapnya
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                        </svg>
                                    </span>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>

                {{-- Pagination --}}
                <div class="mt-14 pt-8 border-t border-gray-200/60">
                    {{ $articles->links('partials.pagination', ['scrollTo' => '#berita-artikel']) }}
                </div>
            @else
                {{-- Empty State --}}
                <div class="text-center py-20 max-w-md mx-auto">
                    <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gray-100 mb-5">
                        <svg class="w-10 h-10 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19 20H5a2 2 0 01-2-2V6a2 2 0 012-2h10a2 2 0 012 2v1m2 13a2 2 0 01-2-2V7m2 13a2 2 0 002-2V9a2 2 0 00-2-2h-2m-4-3H9M7 16h6M7 8h6v4H7V8z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-gray-700 mb-2">Artikel tidak ditemukan</h3>
                    <p class="text-sm text-gray-500 leading-relaxed">Coba ubah kata kunci pencarian atau rentang tanggal untuk menemukan artikel yang Anda cari.</p>
                    @if ($search || $date_from || $date_to)
                        <button wire:click="resetFilters" class="mt-6 inline-flex items-center gap-2 px-5 py-2.5 text-sm font-semibold text-white bg-primary hover:bg-primary-dark rounded-xl transition-colors shadow-md shadow-primary/20">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            Reset Semua Filter
                        </button>
                    @endif
                </div>
            @endif
        </div>
    </section>
</div>
