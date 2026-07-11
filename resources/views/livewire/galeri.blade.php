<div>
    {{-- Hero Section --}}
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
                <span class="text-gradient-gold">GPS TangSel</span>
            </h1>
            <p class="text-white/70 leading-relaxed text-sm sm:text-base lg:text-lg max-w-xl mx-auto px-2">
                Dokumentasi perjalanan dakwah dan kegiatan sosial GPS Tangerang Selatan.
            </p>
        </div>
    </section>

    {{-- Filter Albums --}}
    <section class="relative py-8 bg-white border-b border-gray-100 overflow-hidden">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex flex-wrap items-center justify-center gap-2 sm:gap-3">
                <button wire:click="filterAlbum('')" class="px-4 py-2 rounded-full text-xs sm:text-sm font-semibold transition-all duration-200 {{ !$selectedAlbum ? 'bg-primary text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                    Semua
                </button>
                @foreach ($albums as $album)
                    <button wire:click="filterAlbum('{{ $album }}')" class="px-4 py-2 rounded-full text-xs sm:text-sm font-semibold transition-all duration-200 {{ $selectedAlbum === $album ? 'bg-primary text-white shadow-sm' : 'bg-gray-100 text-gray-600 hover:bg-gray-200' }}">
                        {{ $album }}
                    </button>
                @endforeach
            </div>
        </div>
    </section>

    {{-- Gallery Grid --}}
    <section class="relative py-14 lg:py-20 bg-[#F5F5F5]">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            @if ($galleries->isEmpty())
                <div class="text-center py-16">
                    <div class="w-20 h-20 mx-auto mb-5 rounded-2xl bg-white flex items-center justify-center">
                        <svg class="w-10 h-10 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                    </div>
                    <p class="text-sm text-gray-400">Belum ada galeri tersedia.</p>
                </div>
            @else
                <div class="space-y-10 lg:space-y-14">
                    @foreach ($galleries as $gallery)
                        <div class="reveal">
                            {{-- Gallery Header --}}
                            <div class="mb-5">
                                <div class="flex items-center gap-3">
                                    <h3 class="text-lg sm:text-xl font-extrabold text-gray-900">{{ $gallery->title }}</h3>
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full bg-primary/10 text-[10px] font-semibold text-primary uppercase tracking-wider">{{ $gallery->album }}</span>
                                </div>
                                @if ($gallery->description)
                                    <p class="text-sm text-gray-500 mt-1">{{ $gallery->description }}</p>
                                @endif
                                @if ($gallery->date)
                                    <p class="text-xs text-gray-400 mt-1">{{ $gallery->date->translatedFormat('d M Y') }}</p>
                                @endif
                            </div>

                            {{-- Gallery Images --}}
                            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 xl:grid-cols-5 gap-3 lg:gap-4">
                                @foreach ($gallery->images as $image)
                                    <div class="group relative aspect-[4/3] rounded-xl overflow-hidden bg-gray-100 cursor-pointer shadow-sm hover:shadow-lg transition-all duration-300 hover:-translate-y-0.5" onclick="document.getElementById('lightbox-img').src='{{ $image->gambar_url }}';document.getElementById('gallery-lightbox').classList.remove('hidden');document.getElementById('gallery-lightbox').classList.add('flex');document.body.style.overflow='hidden'">
                                        <img src="{{ $image->gambar_url }}" alt="{{ $gallery->title }}" class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500" loading="lazy">
                                        <div class="absolute inset-0 bg-black/0 group-hover:bg-black/20 transition-colors duration-300 flex items-center justify-center">
                                            <div class="w-10 h-10 rounded-full bg-white/90 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-300">
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
    <div id="gallery-lightbox" class="fixed inset-0 z-50 hidden items-center justify-center p-4 sm:p-8 bg-black/90 backdrop-blur-sm" onclick="this.classList.add('hidden');this.classList.remove('flex');document.body.style.overflow=''">
        <button type="button" class="absolute top-4 right-4 sm:top-6 sm:right-6 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors z-10" onclick="document.getElementById('gallery-lightbox').classList.add('hidden');document.getElementById('gallery-lightbox').classList.remove('flex');document.body.style.overflow=''">
            <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <div class="relative max-w-5xl w-full max-h-[90vh] flex items-center justify-center" onclick="event.stopPropagation()">
            <img src="" alt="Galeri GPS TangSel" class="w-full h-auto max-h-[90vh] object-contain rounded-2xl shadow-2xl" id="lightbox-img">
        </div>
    </div>
</div>
