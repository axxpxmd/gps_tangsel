<div>
    @push('styles')
    <style>
        .article-content h2 { font-size: 1.5rem; font-weight: 800; color: #111827; margin-top: 2.5rem; margin-bottom: 1rem; }
        .article-content h3 { font-size: 1.25rem; font-weight: 700; color: #1f2937; margin-top: 2rem; margin-bottom: 0.75rem; }
        .article-content p { margin-bottom: 1.25rem; }
        .article-content a { color: #2F5FA3; text-decoration: none; border-bottom: 1px solid #2F5FA333; }
        .article-content a:hover { border-bottom-color: #2F5FA3; }
        .article-content strong { color: #1f2937; font-weight: 700; }
        .article-content blockquote { border-left: 4px solid #D4A437; padding: 1.25rem 1.5rem; margin: 2rem 0; background: linear-gradient(135deg, #F5E6B820, #2F5FA308); border-radius: 0 0.75rem 0.75rem 0; font-style: italic; color: #4b5563; }
        .article-content ul, .article-content ol { padding-left: 1.5rem; margin: 1.25rem 0; }
        .article-content ul { list-style-type: disc; }
        .article-content ol { list-style-type: decimal; }
        .article-content li { margin-bottom: 0.5rem; }
        .article-content img { border-radius: 0.75rem; margin: 2rem 0; width: 100%; }
        .gallery-thumb.active-thumb { ring: 2px solid #2F5FA3; }
    </style>
    @endpush

    {{-- Full-Bleed Featured Image --}}
    @if ($article->images->count() > 0)
        <section class="relative w-full h-[70vh] sm:h-[80vh] lg:h-[85vh] overflow-hidden bg-dawn-night">
            <img id="featured-img" src="{{ $article->images->first()->image_url }}" alt="{{ $article->title }}" class="absolute inset-0 w-full h-full object-cover transition-opacity duration-700">
            <div class="absolute inset-0 bg-gradient-to-t from-dawn-night via-dawn-night/30 to-transparent"></div>
            <div class="absolute inset-0 bg-gradient-to-r from-dawn-night/60 via-transparent to-transparent"></div>
            <div class="absolute inset-0 islamic-pattern opacity-[0.02]"></div>

            {{-- Back button --}}
            <div class="absolute top-24 left-0 right-0 z-10">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                    <a href="{{ route('berita') }}" wire:navigate class="inline-flex items-center gap-2 px-4 py-2 text-sm text-white/80 hover:text-white bg-white/10 backdrop-blur-md rounded-full border border-white/10 hover:bg-white/20 transition-all duration-300">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali
                    </a>
                </div>
            </div>

            {{-- Title overlay on image --}}
            <div class="absolute bottom-0 left-0 right-0 z-10">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pb-10">
                    <div class="max-w-3xl">
                        <span class="inline-flex items-center gap-1.5 px-3.5 py-1.5 rounded-full text-[10px] font-bold uppercase tracking-wider bg-gold/90 text-dawn-night backdrop-blur-sm mb-5 shadow-lg">
                            {{ $article->category?->name ?? '' }}
                        </span>

                        <h1 class="text-3xl sm:text-4xl lg:text-5xl xl:text-6xl font-extrabold text-white tracking-tight leading-[1.15] mb-6 drop-shadow-lg">
                            {{ $article->title }}
                        </h1>

                        <div class="flex flex-wrap items-center gap-x-5 gap-y-3 text-sm text-white/70">
                            <span class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm px-3 py-1.5 rounded-full">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/></svg>
                                {{ $article->author }}
                            </span>
                            <span class="inline-flex items-center gap-2 bg-white/10 backdrop-blur-sm px-3 py-1.5 rounded-full">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                {{ $article->formatted_date }}
                            </span>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Image counter badge --}}
            @if ($article->images->count() > 1)
                <div class="absolute top-24 right-0 z-10">
                    <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                        <div id="featured-counter" class="inline-flex items-center gap-2 px-4 py-2 text-xs font-semibold text-white bg-black/40 backdrop-blur-md rounded-full border border-white/10">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                            <span id="counter-text">1 / {{ $article->images->count() }}</span>
                        </div>
                    </div>
                </div>
            @endif
        </section>

        {{-- Thumbnail Strip --}}
        @if ($article->images->count() > 1)
            <section class="relative -mt-1 bg-dawn-night pb-6 z-20">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex gap-3 overflow-x-auto pb-2 scrollbar-hide" id="thumb-strip">
                        @foreach ($article->images as $index => $img)
                            <button
                                onclick="setFeaturedImage({{ $index }})"
                                class="gallery-thumb flex-shrink-0 w-20 h-14 sm:w-28 sm:h-18 rounded-lg overflow-hidden border-2 transition-all duration-300 {{ $index === 0 ? 'border-gold shadow-lg shadow-gold/20 scale-105' : 'border-white/10 opacity-50 hover:opacity-80' }}"
                                data-index="{{ $index }}"
                            >
                                <img src="{{ $img->image_url }}" alt="Foto {{ $index + 1 }}" class="w-full h-full object-cover">
                            </button>
                        @endforeach
                    </div>
                    <p class="text-center text-white/40 text-xs mt-2">Klik gambar untuk memperbesar</p>
                </div>
            </section>
        @else
            <section class="relative -mt-1 bg-dawn-night pb-4 z-20">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                    <p class="text-center text-white/40 text-xs">Klik gambar untuk memperbesar</p>
                </div>
            </section>
        @endif
    @else
        {{-- Fallback hero without images --}}
        <section class="relative min-h-[50vh] flex items-end overflow-hidden bg-dawn-night">
            <div class="absolute inset-0 islamic-pattern opacity-[0.04]"></div>
            <div class="absolute -top-24 right-10 w-96 h-96 bg-primary/20 rounded-full blur-3xl"></div>
            <div class="absolute -bottom-24 left-10 w-80 h-80 bg-gold/10 rounded-full blur-3xl"></div>

            <div class="relative max-w-4xl mx-auto px-4 sm:px-6 lg:px-8 pb-12 pt-32 w-full">
                <a href="{{ route('berita') }}" wire:navigate class="inline-flex items-center gap-2 text-sm text-white/60 hover:text-gold-light transition-colors duration-200 mb-6">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Berita
                </a>
                <span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider bg-white/10 backdrop-blur-sm text-gold-light border border-white/10 mb-5">
                    {{ $article->category?->name ?? '' }}
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
                </div>
            </div>
        </section>
    @endif

    {{-- Content --}}
    <section class="relative py-16 lg:py-24 bg-white overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary/3 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
        <div class="absolute bottom-0 left-0 w-72 h-72 bg-gold/3 rounded-full blur-3xl translate-y-1/2 -translate-x-1/3"></div>
        <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Excerpt highlight --}}
            <div class="reveal mb-10">
                <div class="relative pl-6 border-l-4 border-gold">
                    <p class="text-lg lg:text-xl text-gray-700 leading-relaxed font-medium italic">
                        {{ $article->excerpt }}
                    </p>
                </div>
            </div>

            <div class="reveal">
                <div class="article-content text-gray-600 text-base lg:text-lg leading-[1.85] space-y-0">
                    {!! $article->content !!}
                </div>
            </div>

            {{-- Tags & Share --}}
            <div class="mt-14 pt-8 border-t border-gray-200 reveal">
                <div class="flex flex-col gap-6">
                    {{-- Share --}}
                    <div class="flex flex-col sm:flex-row items-start sm:items-center justify-between gap-4 bg-gray-50 rounded-2xl p-5">
                        <div class="flex items-center gap-3">
                            <div class="w-10 h-10 rounded-full bg-primary/10 flex items-center justify-center flex-shrink-0">
                                <svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8.684 13.342C8.886 12.938 9 12.482 9 12c0-.482-.114-.938-.316-1.342m0 2.684a3 3 0 110-2.684m0 2.684l6.632 3.316m-6.632-6l6.632-3.316m0 0a3 3 0 105.367-2.684 3 3 0 00-5.367 2.684zm0 9.316a3 3 0 105.368 2.684 3 3 0 00-5.368-2.684z"/>
                                </svg>
                            </div>
                            <div>
                                <h4 class="text-sm font-bold text-gray-900">Bagikan artikel ini</h4>
                                <p class="text-xs text-gray-400">Sebarkan kebaikan kepada sesama</p>
                            </div>
                        </div>
                        <div class="flex items-center gap-2">
                            <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . url()->current()) }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-4 py-2.5 text-xs font-semibold text-white bg-green-600 rounded-lg hover:bg-green-700 hover:-translate-y-0.5 transition-all duration-200 shadow-sm">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                WhatsApp
                            </a>
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}&url={{ urlencode(url()->current()) }}" target="_blank" rel="noopener" class="inline-flex items-center gap-2 px-4 py-2.5 text-xs font-semibold text-white bg-sky-500 rounded-lg hover:bg-sky-600 hover:-translate-y-0.5 transition-all duration-200 shadow-sm">
                                <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                Twitter
                            </a>
                            <button onclick="navigator.clipboard.writeText(window.location.href).then(()=>{this.innerHTML='<svg class=\'w-4 h-4\' fill=\'none\' viewBox=\'0 0 24 24\' stroke=\'currentColor\' stroke-width=\'2\'><path stroke-linecap=\'round\' stroke-linejoin=\'round\' d=\'M5 13l4 4L19 7\'/></svg>Tersalin!';this.classList.add('bg-green-100','text-green-700');this.classList.remove('bg-gray-100','text-gray-700')})" class="inline-flex items-center gap-2 px-4 py-2.5 text-xs font-semibold text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 hover:-translate-y-0.5 transition-all duration-200 shadow-sm">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>
                                Salin Link
                            </button>
                        </div>
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
                <div class="flex items-center justify-between mb-12 reveal">
                    <div>
                        <div class="flex items-center gap-3 mb-2">
                            <div class="w-8 h-0.5 bg-gradient-to-r from-primary to-gold"></div>
                            <span class="text-xs font-semibold text-primary uppercase tracking-wider">Selanjutnya</span>
                        </div>
                        <h2 class="text-2xl sm:text-3xl font-extrabold text-gray-900 tracking-tight">
                            Artikel Terkait
                        </h2>
                    </div>
                    <a href="{{ route('berita') }}" wire:navigate class="hidden sm:inline-flex items-center gap-2 text-sm font-semibold text-primary hover:gap-3 transition-all duration-200">
                        Lihat semua
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/></svg>
                    </a>
                </div>

                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 lg:gap-8">
                    @foreach ($related as $item)
                        <a href="{{ route('berita.show', $item->slug) }}" wire:navigate class="group relative flex flex-col bg-white rounded-2xl border border-gray-200 overflow-hidden hover:border-transparent hover:shadow-2xl hover:shadow-primary/10 hover:-translate-y-1 transition-all duration-300 reveal" style="transition-delay: {{ $loop->index * 80 }}ms">
                            <div class="relative aspect-[16/10] overflow-hidden bg-gray-100">
                                <img src="{{ $item->image_url ?: asset('image-placeholder.png') }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
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

    {{-- Lightbox Modal --}}
    @if ($article->images->count() > 0)
        <div id="lightbox" class="fixed inset-0 z-[9999] hidden items-center justify-center bg-black/95" onclick="if(event.target===this)closeLightbox()">
            <button onclick="closeLightbox()" class="absolute top-6 right-6 z-10 p-3 text-white/70 hover:text-white bg-white/10 hover:bg-white/20 rounded-full transition-all duration-200 backdrop-blur-sm">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            @if ($article->images->count() > 1)
                <button onclick="prevImage()" class="absolute left-4 sm:left-8 z-10 p-3 sm:p-4 text-white/70 hover:text-white bg-white/10 hover:bg-white/20 rounded-full transition-all duration-200 backdrop-blur-sm">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <button onclick="nextImage()" class="absolute right-4 sm:right-8 z-10 p-3 sm:p-4 text-white/70 hover:text-white bg-white/10 hover:bg-white/20 rounded-full transition-all duration-200 backdrop-blur-sm">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            @endif

            <div class="max-w-6xl max-h-[90vh] mx-4">
                <img id="lightbox-img" src="" alt="" class="max-w-full max-h-[85vh] object-contain rounded-xl shadow-2xl">
            </div>

            <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/60 to-transparent py-6">
                <div class="flex flex-col items-center gap-3">
                    <div id="lightbox-counter" class="text-white/80 text-sm font-medium bg-white/10 backdrop-blur-sm px-5 py-2 rounded-full"></div>
                    @if ($article->images->count() > 1)
                        <div class="flex gap-2" id="lightbox-dots">
                            @foreach ($article->images as $index => $_)
                                <button onclick="goToImage({{ $index }})" class="lb-dot w-2 h-2 rounded-full transition-all duration-300 {{ $index === 0 ? 'bg-gold w-6' : 'bg-white/30 hover:bg-white/50' }}"></button>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>

@if ($article->images->count() > 0)
    @push('scripts')
    <script>
        const galleryImages = @json($article->images->pluck('image_url')->values());
        let currentIndex = 0;

        function setFeaturedImage(index) {
            currentIndex = index;
            const img = document.getElementById('featured-img');
            img.style.opacity = '0';
            setTimeout(function() {
                img.src = galleryImages[index];
                img.style.opacity = '1';
            }, 300);

            document.querySelectorAll('.gallery-thumb').forEach(function(thumb) {
                const i = parseInt(thumb.getAttribute('data-index'));
                if (i === index) {
                    thumb.classList.add('border-gold', 'shadow-lg', 'scale-105');
                    thumb.classList.remove('border-white/10', 'opacity-50');
                    thumb.style.boxShadow = '0 4px 14px rgba(212,164,55,0.2)';
                } else {
                    thumb.classList.remove('border-gold', 'shadow-lg', 'scale-105');
                    thumb.classList.add('border-white/10', 'opacity-50');
                    thumb.style.boxShadow = 'none';
                }
            });

            const counter = document.getElementById('counter-text');
            if (counter) counter.textContent = (index + 1) + ' / ' + galleryImages.length;
        }

        function openLightbox(index) {
            currentIndex = index;
            updateLightboxImage();
            document.getElementById('lightbox').classList.remove('hidden');
            document.getElementById('lightbox').classList.add('flex');
            document.body.style.overflow = 'hidden';
        }

        function closeLightbox() {
            document.getElementById('lightbox').classList.add('hidden');
            document.getElementById('lightbox').classList.remove('flex');
            document.body.style.overflow = '';
        }

        function prevImage() {
            currentIndex = (currentIndex - 1 + galleryImages.length) % galleryImages.length;
            updateLightboxImage();
            setFeaturedImage(currentIndex);
        }

        function nextImage() {
            currentIndex = (currentIndex + 1) % galleryImages.length;
            updateLightboxImage();
            setFeaturedImage(currentIndex);
        }

        function goToImage(index) {
            currentIndex = index;
            updateLightboxImage();
            setFeaturedImage(currentIndex);
        }

        function updateLightboxImage() {
            document.getElementById('lightbox-img').src = galleryImages[currentIndex];
            if (galleryImages.length > 1) {
                document.getElementById('lightbox-counter').textContent = (currentIndex + 1) + ' / ' + galleryImages.length;
                document.querySelectorAll('.lb-dot').forEach(function(dot, i) {
                    if (i === currentIndex) {
                        dot.classList.add('bg-gold');
                        dot.classList.remove('bg-white/30');
                        dot.style.width = '1.5rem';
                    } else {
                        dot.classList.remove('bg-gold');
                        dot.classList.add('bg-white/30');
                        dot.style.width = '0.5rem';
                    }
                });
            }
        }

        document.getElementById('featured-img').addEventListener('click', function() {
            openLightbox(currentIndex);
        });
        document.getElementById('featured-img').classList.add('cursor-zoom-in');

        document.addEventListener('keydown', function(e) {
            const lb = document.getElementById('lightbox');
            if (!lb || lb.classList.contains('hidden')) return;
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowLeft') prevImage();
            if (e.key === 'ArrowRight') nextImage();
        });
    </script>
    @endpush
@endif
