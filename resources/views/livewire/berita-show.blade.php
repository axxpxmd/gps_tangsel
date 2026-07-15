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

        .article-content img { display: block; border-radius: 1rem; margin: 2.5rem auto; width: 50%; border: 1px solid #e5e7eb; }
        
        /* Custom scroll progress bar */
        .progress-bar-container { position: fixed; top: 0; left: 0; width: 100%; height: 4px; background: rgba(0, 0, 0, 0.05); z-index: 9999; }
        .progress-bar-fill { height: 100%; width: 0%; background: linear-gradient(90deg, #2F5FA3, #4A7BC8); transition: width 0.1s ease-out; }
    </style>
    @endpush

    {{-- Scroll Progress Bar --}}
    <div class="progress-bar-container">
        <div id="scroll-progress" class="progress-bar-fill"></div>
    </div>

    {{-- Hero Section --}}
    <section class="relative bg-dawn-night overflow-hidden py-16 sm:py-20 lg:py-24">
        <div class="absolute inset-0 islamic-pattern opacity-[0.04]"></div>
        <div class="absolute -top-24 right-10 w-96 h-96 bg-primary/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 left-10 w-80 h-80 bg-gold/10 rounded-full blur-3xl"></div>
        
        <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            {{-- Back Button --}}
            <div class="mb-10 mt-8">
                <a href="{{ route('berita') }}" wire:navigate class="inline-flex items-center gap-2 text-sm text-slate-400 hover:text-white transition-colors duration-300 group">
                    <span class="w-8 h-8 rounded-lg bg-white/5 group-hover:bg-white/10 flex items-center justify-center transition-all duration-300">
                        <svg class="w-4 h-4 transform group-hover:-translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                    </span>
                    <span class="font-medium">Kembali ke Berita</span>
                </a>
            </div>

            {{-- Article Meta & Title --}}
            <div class="max-w-4xl">
                @if ($article->category)
                    <span class="inline-flex items-center px-3.5 py-1.5 rounded-xl bg-[#2F5FA3]/15 text-[#4A7BC8] text-xs font-semibold mb-6 border border-[#2F5FA3]/20 backdrop-blur-sm">
                        <svg class="w-3.5 h-3.5 mr-1.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.568 3H5.25A2.25 2.25 0 003 5.25v4.318c0 .597.237 1.17.659 1.591l9.581 9.581c.699.699 1.78.872 2.607.33a18.095 18.095 0 005.223-5.223c.542-.827.369-1.908-.33-2.607L11.16 3.66A2.25 2.25 0 009.568 3z"/>
                        </svg>
                        {{ $article->category->name }}
                    </span>
                @endif

                <h1 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white leading-tight mb-6 tracking-tight">
                    {{ $article->title }}
                </h1>

                <div class="flex flex-wrap items-center gap-y-3 gap-x-6 text-sm text-slate-400">
                    <span class="inline-flex items-center gap-2">
                        <div class="w-6 h-6 rounded-full bg-[#2F5FA3] flex items-center justify-center text-[10px] font-bold text-white uppercase">
                            {{ substr($article->author, 0, 1) }}
                        </div>
                        <span class="font-semibold text-slate-200">{{ $article->author }}</span>
                    </span>
                    <span class="w-1 h-1 rounded-full bg-slate-700"></span>
                    <span class="inline-flex items-center gap-2">
                        <svg class="w-4 h-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                        </svg>
                        {{ $article->formatted_date }}
                    </span>
                    <span class="w-1 h-1 rounded-full bg-slate-700"></span>
                    <span class="inline-flex items-center gap-2">
                        <svg class="w-4 h-4 text-slate-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        {{ $article->reading_time }} menit baca
                    </span>
                </div>
            </div>
        </div>
    </section>

    {{-- Main Container --}}
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-8">
        {{-- Main Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-3 gap-8">
            {{-- Left Column — Article Detail --}}
            <div class="lg:col-span-2 space-y-6">
                @php
                    $allImages = collect();
                    if ($article->image) {
                        $allImages->push($article->image_url);
                    }
                    foreach ($article->images as $img) {
                        if ($img->image) {
                            $allImages->push($img->image_url);
                        }
                    }
                    $allImages = $allImages->unique()->filter()->values();
                @endphp

                {{-- Featured Image Slider --}}
                @if ($allImages->count() > 0)
                    <div>
                        <div class="relative rounded-xl overflow-hidden bg-slate-200 border border-slate-200/50 group/img">
                            <img id="featured-img" 
                                 src="{{ $allImages->first() }}" 
                                 alt="{{ $article->title }}" 
                                 class="w-full h-auto max-h-[500px] object-cover cursor-zoom-in transition-all duration-500 hover:scale-[1.02]"
                                 onclick="openLightbox(currentIndex)">
                            
                            @if ($allImages->count() > 1)
                                {{-- Left Arrow --}}
                                <button onclick="prevFeaturedImage()" class="absolute left-4 top-1/2 -translate-y-1/2 z-10 w-9 h-9 flex items-center justify-center rounded-full bg-slate-950/60 hover:bg-slate-950/85 border border-white/10 text-white opacity-0 group-hover/img:opacity-100 transition-all duration-300 shadow-md">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7" />
                                    </svg>
                                </button>
                                {{-- Right Arrow --}}
                                <button onclick="nextFeaturedImage()" class="absolute right-4 top-1/2 -translate-y-1/2 z-10 w-9 h-9 flex items-center justify-center rounded-full bg-slate-950/60 hover:bg-slate-950/85 border border-white/10 text-white opacity-0 group-hover/img:opacity-100 transition-all duration-300 shadow-md">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7" />
                                    </svg>
                                </button>

                                <div class="absolute bottom-4 right-4">
                                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 bg-slate-950/80 backdrop-blur-md text-white text-xs font-semibold rounded-xl border border-white/10 shadow-lg">
                                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                        <span id="counter-text">1 / {{ $allImages->count() }}</span>
                                    </span>
                                </div>
                            @endif
                        </div>


                    </div>
                @endif

                {{-- Excerpt --}}
                @if ($article->excerpt)
                    <div class="mb-4">
                        <p class="text-[13px] text-gray-500 italic leading-relaxed">
                            {{ $article->excerpt }}
                        </p>
                    </div>
                @endif

                {{-- Article Body --}}
                <div class="article-content text-slate-800 text-base leading-[1.9] pb-6 border-b border-gray-200">
                    {!! $article->content !!}
                </div>

                {{-- Tags Section --}}
                @if ($article->tags->count() > 0)
                    <div class="flex flex-wrap gap-2 py-4">
                        @foreach ($article->tags as $tag)
                            <span class="inline-flex items-center px-3 py-1.5 rounded-xl bg-slate-50 border border-gray-200 text-xs font-semibold text-slate-600 hover:bg-[#2F5FA3] hover:text-white hover:border-[#2F5FA3] transition-all duration-300 cursor-default">
                                #{{ $tag->name }}
                            </span>
                        @endforeach
                    </div>
                @endif

                {{-- BAGIKAN ARTIKEL INI Section --}}
                <div class="py-6 border-t border-gray-200">
                    <h4 class="text-xs font-bold text-gray-400 uppercase tracking-widest mb-4">Bagikan Artikel Ini</h4>
                    <div class="grid grid-cols-2 sm:grid-cols-4 gap-3">
                        <a href="https://wa.me/?text={{ urlencode($article->title . ' - ' . url()->current()) }}" 
                           target="_blank" rel="noopener" 
                           class="inline-flex items-center justify-center gap-2 px-4 py-3 text-xs font-bold text-emerald-700 bg-emerald-50 hover:bg-emerald-100 border border-emerald-200 rounded-xl transition-all duration-200">
                            <svg class="w-4 h-4 text-emerald-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893a11.821 11.821 0 00-3.48-8.413z"/>
                            </svg>
                            WhatsApp
                        </a>
                        <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(url()->current()) }}" 
                           target="_blank" rel="noopener" 
                           class="inline-flex items-center justify-center gap-2 px-4 py-3 text-xs font-bold text-blue-700 bg-blue-50 hover:bg-blue-100 border border-blue-200 rounded-xl transition-all duration-200">
                            <svg class="w-4 h-4 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/>
                            </svg>
                            Facebook
                        </a>
                        <a href="https://twitter.com/intent/tweet?text={{ urlencode($article->title) }}&url={{ urlencode(url()->current()) }}" 
                           target="_blank" rel="noopener" 
                           class="inline-flex items-center justify-center gap-2 px-4 py-3 text-xs font-bold text-gray-900 bg-gray-50 hover:bg-gray-100 border border-gray-200 rounded-xl transition-all duration-200">
                            <svg class="w-4 h-4 text-gray-800" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.244 2.25h3.308l-7.227 8.26 8.502 11.24H16.17l-5.214-6.817L4.99 21.75H1.68l7.73-8.835L1.254 2.25H8.08l4.713 6.231zm-1.161 17.52h1.833L7.084 4.126H5.117z"/>
                            </svg>
                            X / Twitter
                        </a>
                        <button onclick="copyLink(this)" 
                                class="inline-flex items-center justify-center gap-2 px-4 py-3 text-xs font-bold text-slate-700 bg-slate-50 hover:bg-slate-100 border border-slate-200 rounded-xl transition-all duration-200">
                            <svg class="w-4 h-4 text-slate-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M8 5H6a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2v-1M8 5a2 2 0 002 2h2a2 2 0 002-2M8 5a2 2 0 012-2h2a2 2 0 012 2m0 0h2a2 2 0 012 2v3m-2 4h5m-2-2v5"/>
                            </svg>
                            Salin Link
                        </button>
                    </div>
                </div>


            </div>

            {{-- Right Column — Sidebar Widgets --}}
            <div class="lg:col-span-1 space-y-6">
                {{-- AGENDA SAFARI SUBUH --}}
                <div class="bg-white rounded-xl border border-gray-200 p-5">
                    <div class="flex justify-between items-start mb-4">
                        <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">SAFARI SUBUH TERDEKAT</div>
                        <span class="text-[10px] font-bold text-[#2F5FA3] uppercase tracking-widest flex items-center gap-1">
                            <span class="w-1.5 h-1.5 rounded-full bg-[#2F5FA3] {{ $nextActivity ? 'animate-pulse' : '' }}"></span>
                            {{ $nextActivity ? 'SEGERA' : 'INFO' }}
                        </span>
                    </div>
                    @if ($nextActivity)
                        <div>
                            <h4 class="text-sm font-bold text-gray-800 leading-snug">{{ $nextActivity->title }}</h4>
                            <p class="text-[11px] text-gray-500 mt-3.5 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-[#2F5FA3] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                                <span class="truncate">{{ $nextActivity->location }}</span>
                            </p>
                            <p class="text-[11px] text-gray-500 mt-1.5 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-[#2F5FA3] flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                <span>{{ $nextActivity->date->locale('id')->translatedFormat('l, d M Y') }} · {{ $nextActivity->date->format('H:i') }} WIB</span>
                            </p>
                        </div>
                    @else
                        <div class="text-center py-4">
                            <p class="text-xs text-gray-400 font-semibold">Safari Subuh berikutnya akan segera diumumkan.</p>
                        </div>
                    @endif
                </div>

                {{-- JADWAL SHOLAT TANGERANG --}}
                <div class="bg-white rounded-xl border border-gray-200 p-5">
                    @php
                        $now = now('Asia/Jakarta');
                        $nowMin = $now->hour * 60 + $now->minute;
                        $nextPrayerKey = 'subuh';
                        
                        foreach ($prayerSchedule['prayers'] as $prayer) {
                            $parts = explode(':', $prayer['time']);
                            $prayerMin = ((int)$parts[0]) * 60 + (int)$parts[1];
                            if ($nowMin < $prayerMin) {
                                $nextPrayerKey = $prayer['key'];
                                break;
                            }
                        }
                    @endphp
                    <div class="flex justify-between items-start mb-4">
                        <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">JADWAL SHOLAT {{ strtoupper($prayerSchedule['location']) }}</div>
                        <div class="text-[10px] font-bold text-gray-500 uppercase tracking-widest">{{ $now->translatedFormat('d M') }}</div>
                    </div>
                    <div class="grid grid-cols-5 gap-1.5 text-center">
                        @foreach ($prayerSchedule['prayers'] as $prayer)
                            @php
                                $isNext = $prayer['key'] === $nextPrayerKey;
                            @endphp
                            <div class="p-1.5 rounded-lg transition-colors duration-200 {{ $isNext ? 'bg-[#2F5FA3]/5 border border-[#2F5FA3]/20' : 'bg-slate-50 border border-gray-100' }}">
                                <div class="text-[8px] font-bold uppercase {{ $isNext ? 'text-[#2F5FA3]' : 'text-gray-400' }}">{{ $prayer['name'] }}</div>
                                <div class="text-xs font-extrabold mt-0.5 {{ $isNext ? 'text-[#2F5FA3]' : 'text-gray-800' }}">{{ $prayer['time'] }}</div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- BERITA TERBARU --}}
                @if ($latest->count() > 0)
                    <div class="bg-white rounded-xl border border-gray-200 p-5">
                        <h4 class="text-[10px] font-bold text-gray-400 uppercase tracking-widest mb-4">BERITA TERBARU</h4>
                        <div class="space-y-4">
                            @foreach ($latest as $item)
                                <a href="{{ route('berita.show', $item->slug) }}" wire:navigate class="group block pb-3 border-b border-gray-100 last:border-b-0 last:pb-0">
                                    <div class="text-[9px] font-bold text-[#2F5FA3] uppercase tracking-wider mb-1">
                                        {{ $item->category?->name }}
                                    </div>
                                    <h5 class="text-xs font-bold text-gray-800 leading-snug group-hover:text-[#2F5FA3] transition-colors duration-200">
                                        {{ $item->title }}
                                    </h5>
                                    <p class="text-[9px] text-gray-400 mt-1 uppercase">{{ $item->formatted_date }}</p>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endif

                {{-- Banner Donasi --}}
                <div class="rounded-xl overflow-hidden border border-gray-200 shadow-sm bg-white">
                    <img src="{{ asset('poster_donasi.webp') }}" alt="Poster Donasi" class="w-full h-auto object-cover">
                </div>
            </div>
        </div>

        {{-- BERITA TERKAIT — Full width at the bottom --}}
        @if ($related->count() > 0)
            <div class="mt-12 pt-8 border-t border-gray-200 space-y-6">
                <h4 class="text-sm font-bold text-gray-900 flex items-center gap-2">
                    <span class="w-2.5 h-4 bg-[#2F5FA3] inline-block"></span>
                    BERITA TERKAIT
                </h4>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    @foreach ($related as $item)
                        <a href="{{ route('berita.show', $item->slug) }}" wire:navigate class="group block bg-white rounded-xl border border-gray-200 overflow-hidden">
                            <div class="aspect-[16/10] bg-slate-100 relative overflow-hidden">
                                <img src="{{ $item->image_url ?: asset('image-placeholder.png') }}" alt="{{ $item->title }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300" loading="lazy">
                            </div>
                            <div class="p-4 space-y-2">
                                <div class="text-[9px] font-bold text-[#2F5FA3] uppercase tracking-wider">
                                    {{ $item->category?->name }}
                                </div>
                                <h5 class="text-sm font-bold text-gray-900 leading-snug group-hover:text-[#2F5FA3] transition-colors duration-200 line-clamp-2">
                                    {{ $item->title }}
                                </h5>
                                <p class="text-[10px] text-gray-400">{{ $item->formatted_date }}</p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif
    </div>

    {{-- Lightbox Modal --}}
    @if ($allImages->count() > 0)
        <div id="lightbox" class="fixed inset-0 z-[9999] hidden items-center justify-center bg-slate-950/95 backdrop-blur-md" onclick="if(event.target===this)closeLightbox()">
            <button onclick="closeLightbox()" class="absolute top-6 right-6 z-10 p-2.5 text-white/70 hover:text-white bg-white/10 hover:bg-white/20 rounded-full transition-all duration-200">
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                </svg>
            </button>

            @if ($allImages->count() > 1)
                <button onclick="prevImage()" class="absolute left-6 z-10 p-3.5 text-white/70 hover:text-white bg-white/10 hover:bg-white/20 rounded-full transition-all duration-200">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/>
                    </svg>
                </button>
                <button onclick="nextImage()" class="absolute right-6 z-10 p-3.5 text-white/70 hover:text-white bg-white/10 hover:bg-white/20 rounded-full transition-all duration-200">
                    <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/>
                    </svg>
                </button>
            @endif

            <div class="max-w-5xl max-h-[85vh] mx-4 relative group">
                <img id="lightbox-img" src="" alt="" class="max-w-full max-h-[80vh] object-contain rounded-xl border border-white/10">
            </div>

            <div class="absolute bottom-6 left-0 right-0">
                <div class="flex flex-col items-center gap-3">
                    <div id="lightbox-counter" class="text-white/90 text-sm font-semibold bg-white/10 backdrop-blur-md px-4.5 py-2 rounded-xl border border-white/5"></div>
                    @if ($allImages->count() > 1)
                        <div class="flex gap-1.5" id="lightbox-dots">
                            @foreach ($allImages as $index => $_)
                                <button onclick="goToImage({{ $index }})" class="lb-dot w-2.5 h-2.5 rounded-full transition-all duration-300 {{ $index === 0 ? 'bg-white w-6' : 'bg-white/30 hover:bg-white/50' }}"></button>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    @endif
</div>

<script>
    // Scroll progress bar logic
    window.addEventListener('scroll', function() {
        const scrollTop = window.scrollY;
        const docHeight = document.documentElement.scrollHeight - window.innerHeight;
        const progress = (scrollTop / docHeight) * 100;
        document.getElementById('scroll-progress').style.width = progress + '%';
    });
</script>

@if ($allImages->count() > 0)
    @push('scripts')
    <script>
        const galleryImages = @json($allImages);
        let currentIndex = 0;

        function prevFeaturedImage() {
            currentIndex = (currentIndex - 1 + galleryImages.length) % galleryImages.length;
            setFeaturedImage(currentIndex);
        }

        function nextFeaturedImage() {
            currentIndex = (currentIndex + 1) % galleryImages.length;
            setFeaturedImage(currentIndex);
        }

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
                    thumb.className = 'gallery-thumb flex-shrink-0 w-16 h-16 rounded-xl overflow-hidden border-2 border-[#2F5FA3] ring-4 ring-[#2F5FA3]/15 scale-[0.98] transition-all duration-300';
                } else {
                    thumb.className = 'gallery-thumb flex-shrink-0 w-16 h-16 rounded-xl overflow-hidden border-2 border-transparent opacity-60 hover:opacity-100 hover:scale-[0.98] transition-all duration-300';
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
                        dot.className = 'lb-dot w-6 h-2.5 rounded-full bg-white transition-all duration-300';
                    } else {
                        dot.className = 'lb-dot w-2.5 h-2.5 rounded-full bg-white/30 hover:bg-white/50 transition-all duration-300';
                    }
                });
            }
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

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function copyLink(btn) {
            navigator.clipboard.writeText(window.location.href).then(function() {
                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Tautan berhasil disalin!',
                    showConfirmButton: false,
                    timer: 2000,
                    timerProgressBar: true
                });

                const originalContent = btn.innerHTML;
                btn.innerHTML = '<svg class="w-4 h-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/></svg> Terdesalin!';
                btn.classList.add('bg-emerald-50', 'text-emerald-700', 'border-emerald-200');
                btn.classList.remove('bg-slate-50', 'text-slate-700', 'border-slate-200');

                setTimeout(function() {
                    btn.innerHTML = originalContent;
                    btn.classList.remove('bg-emerald-50', 'text-emerald-700', 'border-emerald-200');
                    btn.classList.add('bg-slate-50', 'text-slate-700', 'border-slate-200');
                }, 2000);
            });
        }
    </script>
@endpush
