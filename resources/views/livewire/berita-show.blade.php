<div>
    @push('styles')
    <style>
        .article-content h2 { font-size: 1.5rem; font-weight: 800; color: #111827; margin-top: 2rem; margin-bottom: 0.75rem; }
        .article-content h3 { font-size: 1.25rem; font-weight: 700; color: #1f2937; margin-top: 1.5rem; margin-bottom: 0.5rem; }
        .article-content a { color: #2F5FA3; text-decoration: none; }
        .article-content a:hover { text-decoration: underline; }
        .article-content strong { color: #1f2937; font-weight: 700; }
        .article-content blockquote { border-left: 4px solid #D4A437; padding: 1rem 1.5rem; margin: 1.5rem 0; background: #F5E6B8/10; border-radius: 0 0.5rem 0.5rem 0; font-style: italic; color: #4b5563; }
        .article-content ul, .article-content ol { padding-left: 1.5rem; margin: 1rem 0; }
        .article-content ul { list-style-type: disc; }
        .article-content ol { list-style-type: decimal; }
        .article-content li { margin-bottom: 0.5rem; }
        .article-content img { border-radius: 0.75rem; margin: 1.5rem 0; width: 100%; }
    </style>
    @endpush

    {{-- Hero --}}
    <section class="relative min-h-[55vh] flex items-end overflow-hidden bg-dawn-night">
        <div class="absolute inset-0">
            @if ($article->image)
                <img src="{{ $article->image }}" alt="{{ $article->title }}" class="w-full h-full object-cover opacity-30">
            @endif
            <div class="absolute inset-0 bg-gradient-to-t from-dawn-night via-dawn-night/80 to-dawn-night/40"></div>
        </div>
        <div class="absolute inset-0 islamic-pattern opacity-[0.03]"></div>

        <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pb-12 pt-32 w-full">
            <a href="{{ route('berita') }}" wire:navigate class="inline-flex items-center gap-2 text-sm text-white/60 hover:text-gold-light transition-colors duration-200 mb-6">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                </svg>
                Kembali ke Berita
            </a>

            <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-white/10 backdrop-blur-sm text-gold-light border border-white/10 mb-5">
                {{ $article->category }}
            </span>

            <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight leading-tight mb-6">
                {{ $article->title }}
            </h1>

            <div class="flex flex-wrap items-center gap-x-5 gap-y-2 text-sm text-white/60">
                <span class="inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                    {{ $article->author }}
                </span>
                <span class="w-1 h-1 rounded-full bg-white/30"></span>
                <span class="inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    {{ $article->formatted_date }}
                </span>
                <span class="w-1 h-1 rounded-full bg-white/30"></span>
                <span class="inline-flex items-center gap-2">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                    {{ $article->read_time }} mnt baca
                </span>
            </div>
        </div>
    </section>

    {{-- Content --}}
    <section class="relative py-16 lg:py-24 bg-white overflow-hidden">
        <div class="absolute top-0 right-0 w-80 h-80 bg-primary/3 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
        <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="reveal">
                <div class="article-content text-gray-600 text-base lg:text-lg leading-relaxed space-y-6">
                    {!! $article->content !!}
                </div>
            </div>

            {{-- Share --}}
            <div class="mt-12 pt-8 border-t border-gray-200 reveal">
                <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4">
                    <div>
                        <h4 class="text-sm font-bold text-gray-900 mb-1">Bagikan artikel ini</h4>
                        <p class="text-xs text-gray-400">Sebarkan kebaikan kepada sesama</p>
                    </div>
                    <div class="flex items-center gap-2">
                        <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . url()->current()) }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-4 py-2.5 text-xs font-semibold text-white bg-green-600 rounded-lg hover:bg-green-700 transition-colors duration-200">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                            WhatsApp
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}&url={{ urlencode(url()->current()) }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-4 py-2.5 text-xs font-semibold text-white bg-sky-500 rounded-lg hover:bg-sky-600 transition-colors duration-200">
                            <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                            Twitter
                        </a>
                        <button onclick="navigator.clipboard.writeText(window.location.href).then(()=>this.textContent='Tersalin!')" class="inline-flex items-center gap-2 px-4 py-2.5 text-xs font-semibold text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                            Salin Link
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Related Articles --}}
    @if ($related->count() > 0)
        <section class="relative py-16 lg:py-24 bg-[#F5F5F5] overflow-hidden">
            <div class="absolute inset-0 islamic-pattern-dark opacity-[0.02]"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="text-center max-w-2xl mx-auto mb-12 reveal">
                    <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight mb-3">
                        Artikel Terkait
                    </h2>
                    <p class="text-gray-500 text-sm">Baca artikel lainnya dalam kategori {{ $article->category }}</p>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    @foreach ($related as $item)
                        <a href="{{ route('berita.show', $item->slug) }}" wire:navigate class="group relative flex flex-col bg-white rounded-2xl border border-gray-200 overflow-hidden hover:border-transparent hover:shadow-2xl hover:shadow-primary/10 hover:-translate-y-1 transition-all duration-300 reveal" style="transition-delay: {{ $loop->index * 80 }}ms">
                            <div class="relative aspect-[16/10] overflow-hidden bg-gray-100">
                                <img src="{{ $item->image }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                                <span class="absolute top-4 left-4 inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-white/90 backdrop-blur-sm text-primary border border-primary/10 shadow-sm">
                                    {{ $item->category }}
                                </span>
                            </div>
                            <div class="flex flex-col flex-1 p-6">
                                <div class="flex flex-wrap items-center gap-x-3 gap-y-1 text-[11px] text-gray-400 font-medium mb-3">
                                    <span class="inline-flex items-center gap-1.5">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                        {{ $item->formatted_date }}
                                    </span>
                                    <span class="w-1 h-1 rounded-full bg-gray-300"></span>
                                    <span>{{ $item->read_time }} mnt baca</span>
                                </div>
                                <h3 class="text-lg font-bold text-gray-900 mb-3 leading-snug group-hover:text-primary transition-colors duration-200">
                                    {{ $item->title }}
                                </h3>
                                <p class="text-sm text-gray-500 leading-relaxed line-clamp-2">
                                    {{ $item->excerpt }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</div>
