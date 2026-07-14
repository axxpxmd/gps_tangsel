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
    </style>
    @endpush

    {{-- Hero Section --}}
    <section class="relative bg-gradient-to-br from-gray-900 via-gray-800 to-gray-900 overflow-hidden">
        <div class="absolute inset-0 bg-[url('data:image/svg+xml,%3Csvg%20width%3D%2260%22%20height%3D%2260%22%20viewBox%3D%220%200%2060%2060%22%20xmlns%3D%22http%3A%2F%2Fwww.w3.org%2F2000%2Fsvg%22%3E%3Cg%20fill%3D%22none%22%20fill-rule%3D%22evenodd%22%3E%3Cg%20fill%3D%22%23ffffff%22%20fill-opacity%3D%220.03%22%3E%3Cpath%20d%3D%22M36%2034v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6%2034v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6%204V0H4v4H0v2h4v4h2V6h4V4H6z%22%2F%3E%3C%2Fg%3E%3C%2Fg%3E%3C%2Fsvg%3E')] opacity-50"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12 sm:py-16 lg:py-20">
            {{-- Back Button --}}
            <div class="mb-6">
                <a href="{{ route('berita') }}" wire:navigate class="inline-flex items-center gap-2 text-sm text-white/70 hover:text-white transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Berita
                </a>
            </div>

            {{-- Article Meta --}}
            <div class="max-w-4xl">
                @if ($article->category)
                    <span class="inline-flex items-center px-3 py-1 rounded-full bg-primary/20 text-primary text-xs font-semibold mb-4">
                        {{ $article->category->name }}
                    </span>
                @endif

                <h1 class="text-2xl sm:text-3xl lg:text-4xl font-extrabold text-white leading-tight mb-4">
                    {{ $article->title }}
                </h1>

                <div class="flex flex-wrap items-center gap-3 text-sm text-white/60">
                    <span class="inline-flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                        {{ $article->author }}
                    </span>
                    <span class="w-1 h-1 rounded-full bg-white/30"></span>
                    <span class="inline-flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        {{ $article->formatted_date }}
                    </span>
                    <span class="w-1 h-1 rounded-full bg-white/30"></span>
                    <span class="inline-flex items-center gap-1.5">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $article->reading_time }} menit baca
                    </span>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Content --}}
    <section class="py-10 lg:py-14 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
                {{-- Left — Article Content --}}
                <div class="lg:col-span-2">
                    {{-- Featured Image --}}
                    @if ($article->images->count() > 0)
                        <div class="mb-8">
                            <div class="relative rounded-xl overflow-hidden bg-gray-100">
                                <img id="featured-img" 
                                     src="{{ $article->images->first()->image_url }}" 
                                     alt="{{ $article->title }}" 
                                     class="w-full h-auto max-h-[500px] object-cover cursor-zoom-in"
                                     onclick="openLightbox(0)">
                                
                                @if ($article->images->count() > 1)
                                    <div class="absolute bottom-3 right-3">
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 bg-black/60 backdrop-blur-sm text-white text-xs font-medium rounded-full">
                                            <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                            </svg>
                                            <span id="counter-text">1 / {{ $article->images->count() }}</span>
                                        </span>
                                    </div>
                                @endif
                            </div>

                            {{-- Thumbnails --}}
                            @if ($article->images->count() > 1)
                                <div class="mt-3 flex gap-2 overflow-x-auto pb-1 scrollbar-hide">
                                    @foreach ($article->images as $index => $img)
                                        <button onclick="setFeaturedImage({{ $index }})"
                                                class="gallery-thumb flex-shrink-0 w-14 h-14 rounded-lg overflow-hidden border-2 transition-all duration-200 {{ $index === 0 ? 'border-primary ring-2 ring-primary/20' : 'border-gray-200 hover:border-gray-300 opacity-60 hover:opacity-100' }}"
                                                data-index="{{ $index }}">
                                            <img src="{{ $img->image_url }}" alt="Foto {{ $index + 1 }}" class="w-full h-full object-cover">
                                        </button>
                                    @endforeach
                                </div>
                            @endif
                        </div>
                    @endif

                    {{-- Excerpt --}}
                    @if ($article->excerpt)
                        <div class="mb-6">
                            <p class="text-base text-gray-600 leading-relaxed italic border-l-4 border-primary pl-4">
                                {{ $article->excerpt }}
                            </p>
                        </div>
                    @endif

                    {{-- Article Body --}}
                    <div class="article-content text-gray-700 text-base leading-[1.8]">
                        {!! $article->content !!}
                    </div>

                    {{-- Share Section --}}
                    <div class="mt-8 pt-6 border-t border-gray-200">
                        <h4 class="text-sm font-bold text-gray-900 mb-3">Bagikan Artikel</h4>
                        <div class="flex flex-wrap gap-2">
                            <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . url()->current()) }}" 
                               target="_blank" rel="noopener" 
                               class="inline-flex items-center gap-2 px-3 py-2 text-xs font-medium text-white bg-green-600 rounded-lg hover:bg-green-700 transition-colors duration-200">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                                </svg>
                                WhatsApp
                            </a>
                            <a href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}&url={{ urlencode(url()->current()) }}" 
                               target="_blank" rel="noopener" 
                               class="inline-flex items-center gap-2 px-3 py-2 text-xs font-medium text-white bg-sky-500 rounded-lg hover:bg-sky-600 transition-colors duration-200">
                                <svg class="w-3.5 h-3.5" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                                </svg>
                                Twitter
                            </a>
                            <button onclick="copyLink(this)" 
                                    class="inline-flex items-center gap-2 px-3 py-2 text-xs font-medium text-gray-700 bg-gray-100 rounded-lg hover:bg-gray-200 transition-colors duration-200">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/>
                                </svg>
                                Salin Link
                            </button>
                        </div>
                    </div>
                </div>

                {{-- Right — Sidebar --}}
                <div class="lg:col-span-1">
                    <div class="sticky top-24 space-y-6">
                        {{-- Author Card --}}
                        <div class="bg-gray-50 rounded-xl p-4">
                            <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Penulis</h4>
                            <div class="flex items-center gap-3">
                                <div class="w-9 h-9 rounded-full bg-primary/10 flex items-center justify-center">
                                    <span class="text-sm font-bold text-primary">{{ substr($article->author, 0, 1) }}</span>
                                </div>
                                <div>
                                    <p class="text-sm font-semibold text-gray-900">{{ $article->author }}</p>
                                    <p class="text-xs text-gray-400">{{ $article->formatted_date }}</p>
                                </div>
                            </div>
                        </div>

                        {{-- Other News --}}
                        @if ($related->count() > 0)
                            <div class="bg-gray-50 rounded-xl p-4">
                                <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-4">Berita Lainnya</h4>
                                <div class="space-y-4">
                                    @foreach ($related as $item)
                                        <a href="{{ route('berita.show', $item->slug) }}" wire:navigate class="group flex gap-3">
                                            <div class="w-20 h-16 rounded-lg overflow-hidden bg-gray-200 flex-shrink-0">
                                                <img src="{{ $item->image_url ?: asset('image-placeholder.png') }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-xs text-gray-400 mb-1">{{ $item->formatted_date }}</p>
                                                <h5 class="text-sm font-semibold text-gray-900 line-clamp-2 group-hover:text-primary transition-colors duration-200">
                                                    {{ $item->title }}
                                                </h5>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                                <a href="{{ route('berita') }}" wire:navigate class="inline-flex items-center gap-1.5 text-xs font-semibold text-primary mt-4 hover:gap-2.5 transition-all duration-200">
                                    Lihat semua berita
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M17 8l4 4m0 0l-4 4m4-4H3"/>
                                    </svg>
                                </a>
                            </div>
                        @endif

                        {{-- Share --}}
                        <div class="bg-gray-50 rounded-xl p-4">
                            <h4 class="text-xs font-bold text-gray-400 uppercase tracking-wider mb-3">Bagikan</h4>
                            <div class="flex gap-2">
                                <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . url()->current()) }}" target="_blank" rel="noopener" class="w-9 h-9 flex items-center justify-center rounded-lg bg-green-600 text-white hover:bg-green-700 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/></svg>
                                </a>
                                <a href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}&url={{ urlencode(url()->current()) }}" target="_blank" rel="noopener" class="w-9 h-9 flex items-center justify-center rounded-lg bg-sky-500 text-white hover:bg-sky-600 transition-colors">
                                    <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/></svg>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- Lightbox Modal --}}
    @if ($article->images->count() > 0)
        <div id="lightbox" class="fixed inset-0 z-[9999] hidden items-center justify-center bg-black/95 backdrop-blur-sm" onclick="if(event.target===this)closeLightbox()">
            <button onclick="closeLightbox()" class="absolute top-4 right-4 z-10 p-2 text-white/70 hover:text-white bg-white/10 hover:bg-white/20 rounded-full transition-all duration-200">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            @if ($article->images->count() > 1)
                <button onclick="prevImage()" class="absolute left-4 z-10 p-3 text-white/70 hover:text-white bg-white/10 hover:bg-white/20 rounded-full transition-all duration-200">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <button onclick="nextImage()" class="absolute right-4 z-10 p-3 text-white/70 hover:text-white bg-white/10 hover:bg-white/20 rounded-full transition-all duration-200">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            @endif

            <div class="max-w-5xl max-h-[85vh] mx-4">
                <img id="lightbox-img" src="" alt="" class="max-w-full max-h-[80vh] object-contain rounded-lg">
            </div>

            <div class="absolute bottom-4 left-0 right-0">
                <div class="flex flex-col items-center gap-3">
                    <div id="lightbox-counter" class="text-white/80 text-sm font-medium bg-white/10 backdrop-blur-sm px-4 py-2 rounded-full"></div>
                    @if ($article->images->count() > 1)
                        <div class="flex gap-1.5" id="lightbox-dots">
                            @foreach ($article->images as $index => $_)
                                <button onclick="goToImage({{ $index }})" class="lb-dot w-2 h-2 rounded-full transition-all duration-200 {{ $index === 0 ? 'bg-white w-6' : 'bg-white/30 hover:bg-white/50' }}"></button>
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
            }, 200);

            document.querySelectorAll('.gallery-thumb').forEach(function(thumb) {
                const i = parseInt(thumb.getAttribute('data-index'));
                if (i === index) {
                    thumb.classList.add('border-primary', 'ring-2', 'ring-primary/20');
                    thumb.classList.remove('border-gray-200', 'opacity-60');
                } else {
                    thumb.classList.remove('border-primary', 'ring-2', 'ring-primary/20');
                    thumb.classList.add('border-gray-200', 'opacity-60');
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
                        dot.classList.add('bg-white', 'w-6');
                        dot.classList.remove('bg-white/30');
                    } else {
                        dot.classList.remove('bg-white', 'w-6');
                        dot.classList.add('bg-white/30');
                    }
                });
            }
        }

        function copyLink(btn) {
            navigator.clipboard.writeText(window.location.href).then(function() {
                btn.innerHTML = '<svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg>Tersalin!';
                btn.classList.add('bg-green-100', 'text-green-700');
                btn.classList.remove('bg-gray-100', 'text-gray-700');
                setTimeout(function() {
                    btn.innerHTML = '<svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 16H6a2 2 0 01-2-2V6a2 2 0 012-2h8a2 2 0 012 2v2m-6 12h8a2 2 0 002-2v-8a2 2 0 00-2-2h-8a2 2 0 00-2 2v8a2 2 0 002 2z"/></svg>Salin Link';
                    btn.classList.remove('bg-green-100', 'text-green-700');
                    btn.classList.add('bg-gray-100', 'text-gray-700');
                }, 2000);
            });
        }

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
