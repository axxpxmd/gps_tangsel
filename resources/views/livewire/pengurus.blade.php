<div>
    {{-- Hero Section --}}
    <section class="relative min-h-[45vh] sm:min-h-[45vh] flex items-center justify-center overflow-hidden bg-dawn-night">
        <div class="absolute inset-0 islamic-pattern opacity-[0.04]"></div>
        <div class="absolute -top-24 right-10 w-96 h-96 bg-primary/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-24 left-10 w-80 h-80 bg-gold/10 rounded-full blur-3xl"></div>

        <div class="relative max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 text-center py-12 sm:py-16">
            <div class="flex items-center justify-center gap-2 sm:gap-3 mb-4 sm:mb-6">
                <div class="w-8 sm:w-10 h-0.5 bg-gradient-to-r from-primary to-gold"></div>
                <span class="text-[10px] sm:text-xs font-semibold text-gold-light uppercase tracking-wider">Pengurus</span>
                <div class="w-8 sm:w-10 h-0.5 bg-gradient-to-r from-gold to-primary"></div>
            </div>
            <h1 class="text-3xl sm:text-5xl lg:text-6xl font-extrabold text-white tracking-tight mb-4 sm:mb-6">
                Pengurus<br>
                <span class="text-gradient-gold">GPS TangSel</span>
            </h1>
            <p class="text-white/70 leading-relaxed text-sm sm:text-base lg:text-lg max-w-xl mx-auto px-2">
                Para pemangku amanah yang menggerakkan dakwah GPS Tangsel di Tangerang Selatan.
            </p>
        </div>
    </section>

    {{-- Dewan Pembina --}}
    @if ($pembina->isNotEmpty())
        <section class="relative py-14 lg:py-20 bg-white overflow-hidden">
            <div class="absolute top-0 right-0 w-80 h-80 bg-primary/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-2xl mx-auto mb-10 lg:mb-14 text-center reveal">
                    <div class="flex items-center justify-center gap-2 sm:gap-3 mb-4">
                        <div class="w-8 sm:w-10 h-0.5 bg-gradient-to-r from-transparent to-primary"></div>
                        <span class="text-[10px] sm:text-xs font-semibold text-primary uppercase tracking-wider">Pembina</span>
                        <div class="w-8 sm:w-10 h-0.5 bg-gradient-to-l from-transparent to-primary"></div>
                    </div>
                    <h2 class="text-2xl sm:text-4xl font-extrabold text-gray-900 tracking-tight mb-4">
                        Dewan <span class="text-gradient-primary">Pembina</span>
                    </h2>
                </div>
                <div class="flex flex-wrap justify-center gap-6 sm:gap-8 lg:gap-16">
                    @foreach ($pembina as $index => $member)
                        <div class="reveal flex flex-col items-center text-center w-40 sm:w-52 md:w-60">
                            <div class="relative w-28 h-28 sm:w-32 md:w-36 sm:h-32 md:h-36 rounded-full mb-4 sm:mb-5 {{ $index % 2 === 0 ? 'bg-primary/10 border-primary/20 group-hover:border-primary group-hover:shadow-primary/10' : 'bg-gold/10 border-gold/20 group-hover:border-gold group-hover:shadow-gold/10' }} border-2 flex items-center justify-center overflow-hidden group hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                                @if ($member->gambar_url)
                                    <img src="{{ $member->gambar_url }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-12 h-12 sm:w-14 md:w-16 sm:h-14 md:h-16 {{ $index % 2 === 0 ? 'text-primary/25 group-hover:text-primary/40' : 'text-gold/25 group-hover:text-gold/40' }} transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                                    </svg>
                                @endif
                            </div>
                            <h3 class="text-sm sm:text-base font-bold text-gray-900 leading-snug">{{ $member->name }}</h3>
                            <span class="inline-flex items-center mt-1.5 sm:mt-2 px-2.5 sm:px-3 py-0.5 sm:py-1 rounded-full {{ $index % 2 === 0 ? 'bg-primary/10 text-primary' : 'bg-gold/10 text-gold' }} text-[10px] sm:text-[11px] font-semibold uppercase tracking-wider">{{ $member->position }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Dewan Pengawas --}}
    @if ($pengawas->isNotEmpty())
        <section class="relative py-14 lg:py-20 bg-[#F5F5F5] overflow-hidden">
            <div class="absolute bottom-0 left-0 w-72 h-72 bg-gold/5 rounded-full blur-3xl translate-y-1/2 -translate-x-1/3"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-2xl mx-auto mb-10 lg:mb-14 text-center reveal">
                    <div class="flex items-center justify-center gap-2 sm:gap-3 mb-4">
                        <div class="w-8 sm:w-10 h-0.5 bg-gradient-to-r from-transparent to-primary"></div>
                        <span class="text-[10px] sm:text-xs font-semibold text-primary uppercase tracking-wider">Pengawas</span>
                        <div class="w-8 sm:w-10 h-0.5 bg-gradient-to-l from-transparent to-primary"></div>
                    </div>
                    <h2 class="text-2xl sm:text-4xl font-extrabold text-gray-900 tracking-tight mb-4">
                        Dewan <span class="text-gradient-primary">Pengawas</span>
                    </h2>
                </div>
                <div class="flex flex-wrap justify-center gap-6 sm:gap-8 lg:gap-16">
                    @foreach ($pengawas as $index => $member)
                        <div class="reveal flex flex-col items-center text-center w-40 sm:w-52 md:w-60">
                            <div class="relative w-28 h-28 sm:w-32 md:w-36 sm:h-32 md:h-36 rounded-full mb-4 sm:mb-5 {{ $index % 2 === 0 ? 'bg-primary/10 border-primary/20 group-hover:border-primary group-hover:shadow-primary/10' : 'bg-gold/10 border-gold/20 group-hover:border-gold group-hover:shadow-gold/10' }} border-2 flex items-center justify-center overflow-hidden group hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                                @if ($member->gambar_url)
                                    <img src="{{ $member->gambar_url }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-12 h-12 sm:w-14 md:w-16 sm:h-14 md:h-16 {{ $index % 2 === 0 ? 'text-primary/25 group-hover:text-primary/40' : 'text-gold/25 group-hover:text-gold/40' }} transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                                    </svg>
                                @endif
                            </div>
                            <h3 class="text-sm sm:text-base font-bold text-gray-900 leading-snug">{{ $member->name }}</h3>
                            <span class="inline-flex items-center mt-1.5 sm:mt-2 px-2.5 sm:px-3 py-0.5 sm:py-1 rounded-full {{ $index % 2 === 0 ? 'bg-primary/10 text-primary' : 'bg-gold/10 text-gold' }} text-[10px] sm:text-[11px] font-semibold uppercase tracking-wider">{{ $member->position }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    {{-- Dewan Pengurus Harian --}}
    @if ($pengurusHarian->isNotEmpty())
        <section class="relative py-14 lg:py-20 bg-white overflow-hidden" id="pengurus">
            <div class="absolute top-0 right-0 w-80 h-80 bg-gold/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/3"></div>
            <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-2xl mx-auto mb-10 lg:mb-14 text-center reveal">
                    <div class="flex items-center justify-center gap-2 sm:gap-3 mb-4">
                        <div class="w-8 sm:w-10 h-0.5 bg-gradient-to-r from-transparent to-primary"></div>
                        <span class="text-[10px] sm:text-xs font-semibold text-primary uppercase tracking-wider">Pengurus Harian</span>
                        <div class="w-8 sm:w-10 h-0.5 bg-gradient-to-l from-transparent to-primary"></div>
                    </div>
                    <h2 class="text-2xl sm:text-4xl font-extrabold text-gray-900 tracking-tight mb-4">
                        Dewan <span class="text-gradient-primary">Pengurus Harian</span>
                    </h2>
                </div>
                <div class="flex flex-wrap justify-center gap-6 sm:gap-8 lg:gap-12">
                    @foreach ($pengurusHarian as $index => $member)
                        <div class="reveal flex flex-col items-center text-center w-40 sm:w-48 md:w-56">
                            <div class="relative w-28 h-28 sm:w-32 md:w-36 sm:h-32 md:h-36 rounded-full mb-4 sm:mb-5 {{ $index % 2 === 0 ? 'bg-primary/10 border-primary/20 group-hover:border-primary group-hover:shadow-primary/10' : 'bg-gold/10 border-gold/20 group-hover:border-gold group-hover:shadow-gold/10' }} border-2 flex items-center justify-center overflow-hidden group hover:shadow-lg hover:-translate-y-1 transition-all duration-300">
                                @if ($member->gambar_url)
                                    <img src="{{ $member->gambar_url }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                                @else
                                    <svg class="w-12 h-12 sm:w-14 md:w-16 sm:h-14 md:h-16 {{ $index % 2 === 0 ? 'text-primary/25 group-hover:text-primary/40' : 'text-gold/25 group-hover:text-gold/40' }} transition-colors duration-300" fill="currentColor" viewBox="0 0 24 24">
                                        <path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/>
                                    </svg>
                                @endif
                            </div>
                            <h3 class="text-sm sm:text-base font-bold text-gray-900">{{ $member->name }}</h3>
                            <span class="inline-flex items-center mt-1.5 sm:mt-2 px-2.5 sm:px-3 py-0.5 sm:py-1 rounded-full {{ $index % 2 === 0 ? 'bg-primary/10 text-primary' : 'bg-gold/10 text-gold' }} text-[10px] sm:text-[11px] font-semibold uppercase tracking-wider">{{ $member->position }}</span>
                        </div>
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</div>
