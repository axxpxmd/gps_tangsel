{{-- ============ PARTNER / KOLABORASI SECTION ============ --}}
<section class="relative py-14 lg:py-20 bg-gradient-to-b from-white to-[#F5F5F5] overflow-hidden" id="partner">
    <div class="absolute inset-0 islamic-pattern-dark opacity-[0.015]"></div>
    <div class="absolute top-0 left-0 w-96 h-96 bg-primary/5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-gold/5 rounded-full blur-3xl translate-x-1/3 translate-y-1/3"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center max-w-2xl mx-auto mb-10 lg:mb-14 reveal">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="w-10 h-0.5 bg-gradient-to-r from-transparent to-primary"></div>
                <span class="text-xs font-semibold text-primary uppercase tracking-wider">Mitra Kolaborasi</span>
                <div class="w-10 h-0.5 bg-gradient-to-l from-transparent to-primary"></div>
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight mb-5">
                Partner <span class="text-gradient-gold">GPS TangSel</span>
            </h2>
            <p class="text-gray-500 leading-relaxed text-base lg:text-lg">
                Institusi dan organisasi yang telah berkolaborasi bersama kami dalam dakwah dan pelayanan masyarakat.
            </p>
        </div>

        @if ($partners->isEmpty())
            <div class="text-center py-12 reveal">
                <div class="w-16 h-16 mx-auto mb-4 rounded-2xl bg-gray-100 flex items-center justify-center">
                    <svg class="w-8 h-8 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                    </svg>
                </div>
                <p class="text-sm text-gray-400">Belum ada partner tersedia.</p>
            </div>
        @else
            {{-- Slider Container --}}
            <div class="relative reveal" id="partner-slider-wrapper">
                {{-- Left Arrow --}}
                <button type="button" id="partner-prev" class="absolute -left-4 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full bg-white border border-gray-200 shadow-md flex items-center justify-center text-gray-500 hover:text-primary hover:border-primary transition-all duration-200 hidden sm:flex" aria-label="Partner sebelumnya">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                </button>

                {{-- Right Arrow --}}
                <button type="button" id="partner-next" class="absolute -right-4 top-1/2 -translate-y-1/2 z-10 w-10 h-10 rounded-full bg-white border border-gray-200 shadow-md flex items-center justify-center text-gray-500 hover:text-primary hover:border-primary transition-all duration-200 hidden sm:flex" aria-label="Partner berikutnya">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                </button>

                {{-- Track --}}
                <div class="overflow-hidden">
                    <div class="flex transition-transform mt-4 duration-500 ease-out" id="partner-track">
                        @foreach ($partners as $partner)
                            <div class="w-1/2 sm:w-1/3 lg:w-1/5 flex-shrink-0 px-3 self-stretch">
                                <div class="group flex flex-col items-center justify-center p-5 lg:p-6 bg-white rounded-2xl border border-gray-100 hover:border-primary/30 hover:shadow-xl hover:shadow-primary/5 hover:-translate-y-1 transition-all duration-300 h-full">
                                    <div class="w-20 h-20 lg:w-24 lg:h-24 rounded-xl overflow-hidden mb-4 group-hover:scale-110 transition-transform duration-300">
                                        @if ($partner->gambar_url)
                                            <img src="{{ $partner->gambar_url }}" alt="{{ $partner->name }}" class="w-full h-full object-contain p-2" loading="lazy">
                                        @else
                                            <div class="w-full h-full flex items-center justify-center bg-primary/5">
                                                <svg class="w-10 h-10 text-primary/20" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/>
                                                </svg>
                                            </div>
                                        @endif
                                    </div>
                                    <h3 class="text-sm lg:text-base font-bold text-gray-900 text-center group-hover:text-primary transition-colors duration-200">{{ $partner->name }}</h3>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>

                {{-- Dots --}}
                <div class="flex items-center justify-center gap-2 mt-8" id="partner-dots"></div>
            </div>
        @endif

        {{-- CTA --}}
        <div class="mt-14 lg:mt-20 text-center reveal">
            <p class="text-gray-500 mb-6">Tertarik berkolaborasi bersama kami?</p>
            <a href="#kolaborasi" class="inline-flex items-center gap-2 px-8 py-3.5 bg-gradient-to-r from-primary to-primary-dark text-white font-semibold rounded-full hover:shadow-lg hover:shadow-primary/30 hover:-translate-y-0.5 transition-all duration-300">
                <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244"/>
                </svg>
                Jadi Partner Kami
            </a>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        function initPartnerSlider() {
            var track = document.getElementById('partner-track');
            if (!track) return;

            var prevBtn = document.getElementById('partner-prev');
            var nextBtn = document.getElementById('partner-next');
            var dotsContainer = document.getElementById('partner-dots');
            var currentSlide = 0;
            var slidesPerView = 5;
            var totalSlides;
            var autoPlayTimer;

            function updateSlidesPerView() {
                var width = window.innerWidth;
                slidesPerView = width >= 1024 ? 5 : (width >= 640 ? 3 : 2);
            }

            function renderDots() {
                if (!dotsContainer) return;
                dotsContainer.innerHTML = '';
                for (var i = 0; i < totalSlides; i++) {
                    var dot = document.createElement('button');
                    dot.type = 'button';
                    dot.setAttribute('aria-label', 'Slide ' + (i + 1));
                    dot.dataset.index = i;
                    dot.className = 'h-2 rounded-full transition-all duration-300 ' + (i === currentSlide ? 'bg-primary w-8' : 'bg-gray-300 w-2 hover:bg-gray-400');
                    dot.addEventListener('click', function () {
                        currentSlide = parseInt(this.dataset.index, 10);
                        updateSlider();
                        stopAutoPlay();
                        startAutoPlay();
                    });
                    dotsContainer.appendChild(dot);
                }
            }

            function updateSlider() {
                updateSlidesPerView();
                var slideElements = track.querySelectorAll('.flex-shrink-0');
                totalSlides = Math.max(1, slideElements.length - slidesPerView + 1);

                if (currentSlide >= totalSlides) currentSlide = 0;

                var percentage = -(currentSlide * (100 / slidesPerView));
                track.style.transform = 'translateX(' + percentage + '%)';

                if (prevBtn) prevBtn.disabled = currentSlide === 0;
                if (nextBtn) nextBtn.disabled = currentSlide >= totalSlides - 1;

                renderDots();
            }

            function startAutoPlay() {
                stopAutoPlay();
                autoPlayTimer = setInterval(function () {
                    currentSlide++;
                    if (currentSlide >= totalSlides) currentSlide = 0;
                    updateSlider();
                }, 3500);
            }

            function stopAutoPlay() {
                if (autoPlayTimer) clearInterval(autoPlayTimer);
            }

            if (prevBtn) {
                prevBtn.addEventListener('click', function () {
                    if (currentSlide > 0) { currentSlide--; updateSlider(); }
                    stopAutoPlay();
                    startAutoPlay();
                });
            }

            if (nextBtn) {
                nextBtn.addEventListener('click', function () {
                    if (currentSlide < totalSlides - 1) { currentSlide++; updateSlider(); }
                    stopAutoPlay();
                    startAutoPlay();
                });
            }

            var wrapper = document.getElementById('partner-slider-wrapper');
            if (wrapper) {
                wrapper.addEventListener('mouseenter', stopAutoPlay);
                wrapper.addEventListener('mouseleave', startAutoPlay);

                var touchStartX = 0;
                var touchEndX = 0;
                wrapper.addEventListener('touchstart', function (e) { touchStartX = e.changedTouches[0].screenX; stopAutoPlay(); }, { passive: true });
                wrapper.addEventListener('touchend', function (e) {
                    touchEndX = e.changedTouches[0].screenX;
                    var diff = touchStartX - touchEndX;
                    if (Math.abs(diff) > 50) {
                        if (diff > 0 && currentSlide < totalSlides - 1) { currentSlide++; }
                        else if (diff < 0 && currentSlide > 0) { currentSlide--; }
                    }
                    updateSlider();
                    startAutoPlay();
                }, { passive: true });
            }

            var resizeTimer;
            window.addEventListener('resize', function () {
                clearTimeout(resizeTimer);
                resizeTimer = setTimeout(function () {
                    currentSlide = 0;
                    updateSlider();
                }, 150);
            });

            updateSlider();
            startAutoPlay();
        }

        document.addEventListener('DOMContentLoaded', initPartnerSlider);
        document.addEventListener('livewire:navigated', initPartnerSlider);
    </script>
@endpush
