<div>
    {{-- Hero --}}
    <section class="relative min-h-[35vh] sm:min-h-[45vh] flex items-center justify-center overflow-hidden bg-dawn-night">
        <div class="absolute inset-0 islamic-pattern opacity-[0.04]"></div>
        <div class="absolute -top-24 right-10 w-96 h-96 bg-primary/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 left-10 w-80 h-80 bg-gold/10 rounded-full blur-3xl"></div>
        <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-12 sm:py-16">
            <div class="flex items-center justify-center gap-2 sm:gap-3 mb-4 sm:mb-6">
                <div class="w-8 sm:w-10 h-0.5 bg-gradient-to-r from-primary to-gold"></div>
                <span class="text-[10px] sm:text-xs font-semibold text-gold-light uppercase tracking-wider">Galeri</span>
                <div class="w-8 sm:w-10 h-0.5 bg-gradient-to-r from-gold to-primary"></div>
            </div>
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight mb-4 sm:mb-6">
                Galeri Kegiatan<br>
                <span class="text-gradient-gold">GPS TANGSEL</span>
            </h1>
            <p class="text-white/70 leading-relaxed text-sm sm:text-base lg:text-lg max-w-xl mx-auto px-2">
                Dokumentasi perjalanan dakwah dan kegiatan sosial GPS Tangerang Selatan.
            </p>
        </div>
    </section>

    {{-- Filters --}}
    <section class="relative py-5 sm:py-6 bg-white border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 sm:grid-cols-3 gap-3 sm:gap-4">
                {{-- Album Filter --}}
                <div class="relative">
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1.5">Album</label>
                    <select wire:model.live="selectedAlbum"
                        class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all bg-white appearance-none cursor-pointer"
                        style="background-image: url(&quot;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='16' height='16' viewBox='0 0 24 24' fill='none' stroke='%239ca3af' stroke-width='2'%3E%3Cpath d='M6 9l6 6 6-6'/%3E%3C/svg%3E&quot;); background-repeat: no-repeat; background-position: right 12px center; padding-right: 40px;">
                        <option value="">Semua Album</option>
                        @foreach ($albums as $album)
                            <option value="{{ $album }}">{{ $album }}</option>
                        @endforeach
                    </select>
                </div>

                {{-- Start Date --}}
                <div class="relative">
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1.5">Dari Tanggal</label>
                    <div class="relative">
                        <input type="date" wire:model.live="startDate"
                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all cursor-pointer">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                </div>

                {{-- End Date --}}
                <div class="relative">
                    <label class="block text-[10px] font-bold text-gray-400 uppercase tracking-wider mb-1.5">Sampai Tanggal</label>
                    <div class="relative">
                        <input type="date" wire:model.live="endDate"
                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all cursor-pointer">
                        <svg class="absolute left-3 top-1/2 -translate-y-1/2 w-4 h-4 text-gray-400 pointer-events-none" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    </div>
                </div>
            </div>

            @if ($activeFilters)
                <div class="flex items-center gap-2 mt-3">
                    <span class="text-[11px] text-gray-400">Filter aktif</span>
                    <button wire:click="resetFilters" class="text-[11px] font-semibold text-red-500 hover:text-red-600 transition-colors duration-200 flex items-center gap-1">
                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                        Reset
                    </button>
                </div>
            @endif
        </div>
    </section>

    {{-- Gallery Content --}}
    <section class="relative py-14 lg:py-20 bg-[#F5F5F5]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if ($galleries->isEmpty())
                <div class="text-center py-16">
                    <div class="w-20 h-20 mx-auto mb-5 rounded-2xl bg-white flex items-center justify-center shadow-sm">
                        <svg class="w-10 h-10 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                    </div>
                    <p class="text-sm text-gray-400 font-medium">Tidak ada galeri ditemukan.</p>
                    @if ($activeFilters)
                        <button wire:click="resetFilters" class="mt-4 text-xs text-primary hover:underline font-semibold">Reset filter</button>
                    @endif
                </div>
            @else
                <div class="space-y-12 lg:space-y-16">
                    @foreach ($galleries as $gallery)
                        <div class="reveal">
                            {{-- Header --}}
                            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-2 mb-5">
                                <div>
                                    <div class="flex items-center gap-3 mb-1">
                                        <h3 class="text-lg sm:text-xl font-extrabold text-gray-900">{{ $gallery->title }}</h3>
                                        <span class="hidden sm:inline-flex items-center px-2.5 py-0.5 rounded-full bg-primary/10 text-[10px] font-semibold text-primary uppercase tracking-wider">{{ $gallery->album }}</span>
                                    </div>
                                    @if ($gallery->description)
                                        <p class="text-sm text-gray-500">{{ $gallery->description }}</p>
                                    @endif
                                </div>
                                <div class="flex items-center gap-3 text-xs text-gray-400">
                                    <span class="inline-flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg> {{ $gallery->images->count() }} foto</span>
                                    @if ($gallery->date)
                                        <span class="inline-flex items-center gap-1"><svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg> {{ $gallery->date->translatedFormat('d M Y') }}</span>
                                    @endif
                                </div>
                            </div>

                            {{-- Images Grid --}}
                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-2 sm:gap-3 lg:gap-4">
                                @foreach ($gallery->images as $index => $image)
                                    @php
                                        $spanClasses = 'aspect-[4/3]';
                                        if (count($gallery->images) === 1) $spanClasses = 'sm:col-span-3 lg:col-span-4 aspect-[16/9] sm:aspect-[21/9]';
                                        elseif (count($gallery->images) === 2) $spanClasses = 'sm:col-span-1 lg:col-span-2 aspect-[4/3]';
                                        elseif (count($gallery->images) === 3 && $index === 0) $spanClasses = 'sm:col-span-2 lg:col-span-2 aspect-[4/3]';
                                    @endphp
                                    <div class="group relative {{ $spanClasses }} rounded-xl overflow-hidden bg-gray-100 cursor-pointer shadow-sm hover:shadow-xl hover:-translate-y-1 transition-all duration-300" onclick="document.getElementById('lightbox-img').src='{{ $image->gambar_url }}';document.getElementById('gallery-lightbox').classList.remove('hidden');document.getElementById('gallery-lightbox').classList.add('flex');document.body.style.overflow='hidden'">
                                        <img src="{{ $image->gambar_url }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-700" loading="lazy">
                                        <div class="absolute inset-0 bg-gradient-to-t from-black/60 via-transparent to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                                            <div class="w-12 h-12 rounded-full bg-white/90 flex items-center justify-center shadow-lg">
                                                <svg class="w-5 h-5 text-gray-700" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607zM10.5 7.5v6m3-3h-6"/></svg>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endforeach
                </div>
            @endif
        </div>
    </section>

    {{-- Lightbox --}}
    <div id="gallery-lightbox" class="fixed inset-0 z-50 hidden items-center justify-center p-4 sm:p-8 bg-black/95 backdrop-blur-sm" onclick="this.classList.add('hidden');this.classList.remove('flex');document.body.style.overflow=''">
        <button type="button" class="absolute top-4 right-4 sm:top-6 sm:right-6 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors z-10" onclick="document.getElementById('gallery-lightbox').classList.add('hidden');document.getElementById('gallery-lightbox').classList.remove('flex');document.body.style.overflow=''">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <div class="relative max-w-5xl w-full max-h-[90vh] flex items-center justify-center" onclick="event.stopPropagation()">
            <img src="" alt="Galeri GPS TANGSEL" class="w-full h-auto max-h-[90vh] object-contain rounded-2xl shadow-2xl" id="lightbox-img">
        </div>
    </div>
</div>
