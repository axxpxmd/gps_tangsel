{{-- ============ YOUTUBE VIDEOS SECTION ============ --}}
<section class="relative py-14 lg:py-20 bg-[#F5F5F5] overflow-hidden" id="youtube">
    <div class="absolute top-0 right-0 w-80 h-80 bg-primary/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
    <div class="absolute bottom-0 left-0 w-72 h-72 bg-gold/5 rounded-full blur-3xl translate-y-1/2 -translate-x-1/3"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center max-w-2xl mx-auto mb-10 lg:mb-14 reveal">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="w-10 h-0.5 bg-gradient-to-r from-transparent to-primary"></div>
                <span class="text-xs font-semibold text-primary uppercase tracking-wider">Video Kegiatan</span>
                <div class="w-10 h-0.5 bg-gradient-to-l from-transparent to-primary"></div>
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight mb-4">
                Tonton Kegiatan Kami
            </h2>
            <p class="text-gray-500 leading-relaxed">
                Saksikan dokumentasi kegiatan GPS TangSel melalui kanal YouTube kami.
            </p>
        </div>

        @if (blank($videos))
            {{-- Empty state --}}
            <div class="text-center py-16 reveal">
                <div class="w-16 h-16 mx-auto mb-5 rounded-2xl bg-gray-50 border border-gray-100 flex items-center justify-center">
                    <svg class="w-8 h-8 text-gray-300" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                </div>
                <p class="text-sm text-gray-400">Belum ada video tersedia.</p>
            </div>
        @else
            {{-- Slider Container --}}
            <div class="relative reveal" id="yt-slider-wrapper">
                {{-- Left Arrow --}}
                <button type="button" id="yt-prev" class="absolute -left-4 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full bg-white border border-gray-200 shadow-md flex items-center justify-center text-gray-500 hover:text-primary hover:border-primary transition-all duration-200 disabled:opacity-30 disabled:cursor-not-allowed hidden sm:flex" aria-label="Video sebelumnya">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </button>

                {{-- Right Arrow --}}
                <button type="button" id="yt-next" class="absolute -right-4 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full bg-white border border-gray-200 shadow-md flex items-center justify-center text-gray-500 hover:text-primary hover:border-primary transition-all duration-200 disabled:opacity-30 disabled:cursor-not-allowed hidden sm:flex" aria-label="Video berikutnya">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </button>

                {{-- Track --}}
                <div class="overflow-hidden">
                    <div class="flex transition-transform duration-500 ease-out" id="yt-track">
                        @foreach ($videos as $video)
                            <div class="w-full sm:w-1/2 lg:w-1/3 flex-shrink-0 px-2 sm:px-3 self-stretch">
                                <button type="button" data-video-id="{{ $video['videoId'] }}" class="group flex flex-col bg-white rounded-2xl border border-gray-100 overflow-hidden hover:border-gray-200 hover:shadow-xl hover:shadow-gray-200/50 hover:-translate-y-1 transition-all duration-300 h-full w-full text-left cursor-pointer yt-video-card">
                                    {{-- Thumbnail --}}
                                    <div class="relative aspect-video overflow-hidden bg-gray-100">
                                        @if (! empty($video['thumbnail']))
                                            <img src="{{ $video['thumbnail'] }}" alt="{{ $video['title'] }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-500" loading="lazy">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-gray-100">
                                                <svg class="w-12 h-12 text-gray-300" fill="currentColor" viewBox="0 0 24 24"><path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/></svg>
                                            </div>
                                        @endif
                                        {{-- Play button overlay --}}
                                        <div class="absolute inset-0 flex items-center justify-center">
                                            <div class="w-14 h-14 rounded-full bg-red-600/90 flex items-center justify-center group-hover:bg-red-600 group-hover:scale-110 transition-all duration-300">
                                                <svg class="w-6 h-6 text-white ml-0.5" fill="currentColor" viewBox="0 0 24 24"><path d="M8 5v14l11-7z"/></svg>
                                            </div>
                                        </div>
                                    </div>

                                    {{-- Info --}}
                                    <div class="flex flex-col flex-1 p-4 sm:p-5">
                                        <h3 class="text-sm font-semibold text-gray-900 mb-2 leading-snug line-clamp-2 group-hover:text-primary transition-colors duration-200">
                                            {{ $video['title'] }}
                                        </h3>
                                        <div class="mt-auto">
                                            @if (! empty($video['publishedAt']))
                                                <p class="text-[11px] text-gray-400 font-medium">
                                                    {{ \Carbon\Carbon::parse($video['publishedAt'])->translatedFormat('d M Y') }}
                                                </p>
                                            @endif
                                        </div>
                                    </div>
                                </button>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Mobile Dots --}}
                @if (count($videos) > 3)
                    <div class="flex sm:hidden items-center justify-center gap-2 mt-6" id="yt-dots">
                        @foreach ($videos as $idx => $v)
                            <button type="button" class="w-2 h-2 rounded-full bg-gray-300 transition-all duration-300 {{ $loop->first ? '!bg-primary !w-6' : '' }}" data-index="{{ $idx }}" aria-label="Video {{ $idx + 1 }}"></button>
                        @endforeach
                    </div>
                @endif
            </div>
        @endif
    </div>
</section>

{{-- YouTube Video Modal --}}
<div id="yt-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 sm:p-6">
    <div class="absolute inset-0 bg-black/80 backdrop-blur-sm" id="yt-modal-overlay"></div>
    <button type="button" id="yt-modal-close" class="absolute top-4 right-4 sm:top-6 sm:right-6 z-10 w-10 h-10 rounded-full bg-white/10 hover:bg-white/20 flex items-center justify-center text-white transition-colors">
        <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
    </button>
    <div class="relative w-full max-w-4xl aspect-video rounded-xl overflow-hidden shadow-2xl" id="yt-modal-player">
        <iframe src="" allow="autoplay; encrypted-media" allowfullscreen class="w-full h-full" id="yt-iframe"></iframe>
    </div>
</div>

@push('scripts')
    <script>
        function initYoutubeSlider() {
            const track = document.getElementById('yt-track');
            if (!track) return;

            const prevBtn = document.getElementById('yt-prev');
            const nextBtn = document.getElementById('yt-next');
            const dotsContainer = document.getElementById('yt-dots');
            const dots = dotsContainer ? dotsContainer.querySelectorAll('button') : [];
            let currentSlide = 0;
            let slidesPerView = 3;
            let totalSlides;

            function updateSlidesPerView() {
                const width = window.innerWidth;
                slidesPerView = width >= 1024 ? 3 : (width >= 640 ? 2 : 1);
            }

            function updateSlider() {
                updateSlidesPerView();
                const slideElements = track.querySelectorAll('.flex-shrink-0');
                totalSlides = Math.max(0, Math.ceil(slideElements.length - slidesPerView + 1));
                if (totalSlides === 0) totalSlides = 0;

                const percentage = -(currentSlide * (100 / slidesPerView));
                track.style.transform = 'translateX(' + percentage + '%)';

                if (prevBtn) prevBtn.disabled = currentSlide === 0;
                if (nextBtn) nextBtn.disabled = currentSlide >= totalSlides - 1;

                dots.forEach(function (dot, i) {
                    dot.classList.toggle('!bg-primary', i === currentSlide);
                    dot.classList.toggle('!w-6', i === currentSlide);
                    dot.classList.toggle('bg-gray-300', i !== currentSlide);
                    dot.classList.toggle('w-2', i !== currentSlide);
                });
            }

            if (prevBtn) {
                prevBtn.addEventListener('click', function () {
                    if (currentSlide > 0) { currentSlide--; updateSlider(); }
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', function () {
                    if (currentSlide < totalSlides - 1) { currentSlide++; updateSlider(); }
                });
            }

            dots.forEach(function (dot) {
                dot.addEventListener('click', function () {
                    currentSlide = parseInt(dot.dataset.index, 10);
                    updateSlider();
                });
            });

            let resizeTimer;
            window.addEventListener('resize', function () {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function () {
                    currentSlide = 0;
                    updateSlider();
                }, 150);
            });

            // Swipe support for mobile
            let touchStartX = 0;
            let touchEndX = 0;
            const wrapper = document.getElementById('yt-slider-wrapper');
            if (wrapper) {
                wrapper.addEventListener('touchstart', function (e) { touchStartX = e.changedTouches[0].screenX; }, { passive: true });
                wrapper.addEventListener('touchend', function (e) {
                    touchEndX = e.changedTouches[0].screenX;
                    const diff = touchStartX - touchEndX;
                    if (Math.abs(diff) > 50) {
                        if (diff > 0 && currentSlide < totalSlides - 1) { currentSlide++; }
                        else if (diff < 0 && currentSlide > 0) { currentSlide--; }
                    }
                    updateSlider();
                }, { passive: true });
            }

            updateSlider();

            {{-- Video Modal --}}
            const ytModal = document.getElementById('yt-modal');
            const ytIframe = document.getElementById('yt-iframe');
            const ytModalOverlay = document.getElementById('yt-modal-overlay');
            const ytModalClose = document.getElementById('yt-modal-close');

            function openYtModal(videoId) {
                ytIframe.src = 'https://www.youtube.com/embed/' + videoId + '?autoplay=1&rel=0';
                ytModal.classList.remove('hidden');
                ytModal.classList.add('flex');
                document.body.style.overflow = 'hidden';
            }

            function closeYtModal() {
                ytIframe.src = '';
                ytModal.classList.add('hidden');
                ytModal.classList.remove('flex');
                document.body.style.overflow = '';
            }

            document.querySelectorAll('.yt-video-card').forEach(function (card) {
                card.addEventListener('click', function () {
                    openYtModal(card.dataset.videoId);
                });
            });

            if (ytModalOverlay) { ytModalOverlay.addEventListener('click', closeYtModal); }
            if (ytModalClose) { ytModalClose.addEventListener('click', closeYtModal); }
            document.addEventListener('keydown', function (e) { if (e.key === 'Escape') closeYtModal(); });
        }

        document.addEventListener('DOMContentLoaded', initYoutubeSlider);
        document.addEventListener('livewire:navigated', initYoutubeSlider);
    </script>
@endpush
