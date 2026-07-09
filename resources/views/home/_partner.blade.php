{{-- ============ PARTNER / KOLABORASI SECTION ============ --}}
<section class="relative py-20 lg:py-28 bg-gradient-to-b from-white to-[#F5F5F5] overflow-hidden" id="partner">
    <div class="absolute inset-0 islamic-pattern-dark opacity-[0.015]"></div>
    <div class="absolute top-0 left-0 w-96 h-96 bg-primary/5 rounded-full blur-3xl -translate-x-1/2 -translate-y-1/2"></div>
    <div class="absolute bottom-0 right-0 w-80 h-80 bg-gold/5 rounded-full blur-3xl translate-x-1/3 translate-y-1/3"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="text-center max-w-2xl mx-auto mb-14 lg:mb-20 reveal">
            <div class="flex items-center justify-center gap-3 mb-4">
                <div class="w-10 h-0.5 bg-gradient-to-r from-transparent to-primary"></div>
                <span class="text-xs font-semibold text-primary uppercase tracking-wider">Mitra Kolaborasi</span>
                <div class="w-10 h-0.5 bg-gradient-to-l from-transparent to-primary"></div>
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-gray-900 tracking-tight mb-5">
                Partner <span class="text-gradient-gold">GPS TANGSEL</span>
            </h2>
            <p class="text-gray-500 leading-relaxed text-base lg:text-lg">
                Institusi dan organisasi yang telah berkolaborasi bersama kami dalam dakwah dan pelayanan masyarakat.
            </p>
        </div>

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
                <div class="flex transition-transform duration-500 mt-4 ease-out" id="partner-track">
                    @php
                        $partners = [
                            ['name' => 'Dinkes TangSel', 'desc' => 'Dinas Kesehatan'],
                            ['name' => 'Masjid Se-TangSel', 'desc' => 'Mitra Masjid'],
                            ['name' => 'Puskesmas', 'desc' => 'Tenaga Medis'],
                            ['name' => 'Relawan GPS', 'desc' => 'Komunitas'],
                            ['name' => 'Pemkot TangSel', 'desc' => 'Pemerintah'],
                            ['name' => 'Donatur', 'desc' => 'Hamba Allah'],
                            ['name' => 'Ustadz & Dai', 'desc' => 'Penceramah'],
                            ['name' => 'Praktisi Thibbun', 'desc' => 'Pengobatan Nabi'],
                        ];
                    @endphp
                    @foreach ($partners as $partner)
                        <div class="w-1/2 sm:w-1/3 lg:w-1/5 flex-shrink-0 px-3 self-stretch">
                            <div class="group flex flex-col items-center justify-center p-5 lg:p-6 bg-white rounded-2xl border border-gray-100 hover:border-primary/30 hover:shadow-xl hover:shadow-primary/5 hover:-translate-y-1 transition-all duration-300 h-full">
                                <div class="w-20 h-20 lg:w-24 lg:h-24 rounded-xl overflow-hidden mb-4 group-hover:scale-110 transition-transform duration-300">
                                    <img src="{{ asset('logo-partner.png') }}" alt="{{ $partner['name'] }}" class="w-full h-full object-contain" loading="lazy">
                                </div>
                                <h3 class="text-sm lg:text-base font-bold text-gray-900 text-center group-hover:text-primary transition-colors duration-200">{{ $partner['name'] }}</h3>
                                <p class="text-xs text-gray-500 mt-1">{{ $partner['desc'] }}</p>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>

            {{-- Dots (generated dynamically by JS) --}}
            <div class="flex items-center justify-center gap-2 mt-6" id="partner-dots"></div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        function initPartnerSlider() {
            const track = document.getElementById('partner-track');
            if (!track) return;

            const prevBtn = document.getElementById('partner-prev');
            const nextBtn = document.getElementById('partner-next');
            const dotsContainer = document.getElementById('partner-dots');
            let currentSlide = 0;
            let slidesPerView = 5;
            let totalSlides;
            let autoPlayTimer;

            function updateSlidesPerView() {
                const width = window.innerWidth;
                slidesPerView = width >= 1024 ? 5 : (width >= 640 ? 3 : 2);
            }

            function renderDots() {
                if (!dotsContainer) return;
                dotsContainer.innerHTML = '';
                for (let i = 0; i < totalSlides; i++) {
                    const dot = document.createElement('button');
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
                const slideElements = track.querySelectorAll('.flex-shrink-0');
                totalSlides = Math.max(1, slideElements.length - slidesPerView + 1);

                if (currentSlide >= totalSlides) currentSlide = 0;

                const percentage = -(currentSlide * (100 / slidesPerView));
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

            const wrapper = document.getElementById('partner-slider-wrapper');
            if (wrapper) {
                wrapper.addEventListener('mouseenter', stopAutoPlay);
                wrapper.addEventListener('mouseleave', startAutoPlay);

                let touchStartX = 0;
                let touchEndX = 0;
                wrapper.addEventListener('touchstart', function (e) { touchStartX = e.changedTouches[0].screenX; stopAutoPlay(); }, { passive: true });
                wrapper.addEventListener('touchend', function (e) {
                    touchEndX = e.changedTouches[0].screenX;
                    const diff = touchStartX - touchEndX;
                    if (Math.abs(diff) > 50) {
                        if (diff > 0 && currentSlide < totalSlides - 1) { currentSlide++; }
                        else if (diff < 0 && currentSlide > 0) { currentSlide--; }
                    }
                    updateSlider();
                    startAutoPlay();
                }, { passive: true });
            }

            let resizeTimer;
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
