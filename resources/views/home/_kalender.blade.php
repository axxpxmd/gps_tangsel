{{-- ============ KALENDER KEGIATAN SECTION ============ --}}
<section class="relative py-16 lg:py-20 bg-gradient-to-br from-dawn-night via-primary-dark to-dawn-deep overflow-hidden" id="kalender">
    <div class="absolute inset-0 islamic-pattern opacity-[0.05]"></div>
    <div class="absolute top-0 right-0 w-[500px] h-[500px] bg-gold/5 rounded-full blur-3xl -translate-y-1/2 translate-x-1/4"></div>
    <div class="absolute bottom-0 left-0 w-[400px] h-[400px] bg-primary/10 rounded-full blur-3xl translate-y-1/2 -translate-x-1/4"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="max-w-3xl mx-auto text-center mb-10 lg:mb-14 reveal">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/15 mb-5">
                <span class="w-2 h-2 rounded-full bg-gold animate-pulse"></span>
                <span class="text-xs font-semibold text-gold-light uppercase tracking-wider">Agenda Kegiatan</span>
            </div>
            <h2 class="text-3xl sm:text-4xl font-extrabold text-white tracking-tight mb-5">
                Kalender Kegiatan<br>
                <span class="text-gradient-gold">GPS TANGSEL</span>
            </h2>
            <p class="text-white/60 leading-relaxed max-w-2xl mx-auto">
                Pantau jadwal kegiatan GPS TangSel. Klik tanggal berwarna untuk melihat detail lengkap.
            </p>
        </div>

        {{-- Calendar + Detail Grid --}}
        <div class="grid grid-cols-1 lg:grid-cols-5 gap-5 lg:gap-6 items-start">
            {{-- Calendar Card --}}
            <div class="lg:col-span-2 reveal">
                <div class="bg-white rounded-3xl shadow-xl shadow-black/10 overflow-hidden">
                    {{-- Month Header --}}
                    <div class="bg-gradient-to-r from-primary to-primary-dark px-4 py-3 flex items-center justify-between">
                        <button type="button" id="cal-prev" class="w-9 h-9 rounded-xl bg-white/15 hover:bg-white/25 flex items-center justify-center text-white transition-all duration-200 disabled:opacity-30 disabled:cursor-not-allowed" aria-label="Bulan sebelumnya">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <div class="text-center">
                            <h3 class="text-base font-extrabold text-white" id="cal-month-label">Juli 2026</h3>
                            <p class="text-[10px] text-white/50 font-medium mt-0.5" id="cal-event-count">0 kegiatan</p>
                        </div>
                        <button type="button" id="cal-next" class="w-9 h-9 rounded-xl bg-white/15 hover:bg-white/25 flex items-center justify-center text-white transition-all duration-200 disabled:opacity-30 disabled:cursor-not-allowed" aria-label="Bulan berikutnya">
                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>

                    {{-- Weekday Headers --}}
                    <div class="grid grid-cols-7 gap-px bg-gray-100">
                        @foreach (['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'] as $wd)
                            <div class="bg-white text-center text-[10px] font-bold text-gray-400 uppercase tracking-wider py-2">{{ $wd }}</div>
                        @endforeach
                    </div>

                    {{-- Day Grid --}}
                    <div class="grid grid-cols-7 gap-px bg-gray-100" id="cal-grid"></div>

                </div>
            </div>

            {{-- Detail Panel --}}
            <div class="lg:col-span-3 reveal" style="transition-delay: 100ms">
                <div class="bg-white rounded-3xl shadow-xl shadow-black/10 overflow-hidden min-h-[22rem]">
                    {{-- Poster --}}
                    <div class="relative aspect-[16/9] overflow-hidden bg-gray-100 cursor-pointer group/img" id="cal-image-wrapper">
                        <img src="{{ asset('poster.webp') }}" alt="GPS TangSel" class="w-full h-full object-cover group-hover/img:scale-105 transition-transform duration-500" id="cal-detail-image">
                        <div class="absolute inset-0 bg-black/0 group-hover/img:bg-black/20 transition-colors duration-300 flex items-center justify-center">
                            <span class="opacity-0 group-hover/img:opacity-100 transition-opacity duration-300 bg-white/90 backdrop-blur-sm rounded-xl px-4 py-2 text-sm font-semibold text-gray-700 flex items-center gap-2">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/></svg>
                                Perbesar Gambar
                            </span>
                        </div>
                    </div>

                    {{-- Content --}}
                    <div class="p-4 sm:p-5" id="cal-detail">
                        <div class="text-center py-10">
                            <div class="w-12 h-12 mx-auto mb-3 rounded-2xl bg-gray-100 flex items-center justify-center">
                                <svg class="w-6 h-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <p class="text-sm text-gray-400 font-medium">Pilih tanggal bertanda pada kalender<br>untuk melihat detail kegiatan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- Image Modal --}}
<div id="cal-image-modal" class="fixed inset-0 z-50 hidden items-center justify-center p-4 sm:p-8 bg-black/80 backdrop-blur-sm" onclick="this.classList.add('hidden');this.classList.remove('flex');document.body.style.overflow=''">
    <div class="relative max-w-5xl w-full max-h-[90vh]" onclick="event.stopPropagation()">
        <button type="button" class="absolute -top-10 right-0 text-white/80 hover:text-white transition-colors z-10" onclick="document.getElementById('cal-image-modal').classList.add('hidden');document.getElementById('cal-image-modal').classList.remove('flex');document.body.style.overflow=''">
            <svg class="w-8 h-8" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
        </button>
        <img src="" alt="Gambar Kegiatan" class="w-full h-auto max-h-[90vh] object-contain rounded-2xl shadow-2xl" id="cal-modal-image">
    </div>
</div>

@push('scripts')
    <script>
        function initCalendar() {
            const calGrid = document.getElementById('cal-grid');
            if (!calGrid) return;
            const calEvents = @json($calendarEvents);
            const calMonthNames = ['Januari','Februari','Maret','April','Mei','Juni','Juli','Agustus','September','Oktober','November','Desember'];
            const calMonthKeys = Object.keys(calEvents).sort();
            let calCurrentIdx = 0;
            let calSelectedDay = null;
            const calMonthLabel = document.getElementById('cal-month-label');
            const calEventCount = document.getElementById('cal-event-count');
            const calDetail = document.getElementById('cal-detail');
            const calPrevBtn = document.getElementById('cal-prev');
            const calNextBtn = document.getElementById('cal-next');
            const calDetailImage = document.getElementById('cal-detail-image');

            const calDotColors = {
                gold: 'bg-gold',
                emerald: 'bg-emerald-500',
                primary: 'bg-blue-500',
                amber: 'bg-amber-500',
            };
            const calBadgeBg = {
                gold: 'bg-gold/10 text-gold border-gold/30',
                emerald: 'bg-emerald-50 text-emerald-600 border-emerald-200',
                primary: 'bg-blue-50 text-blue-600 border-blue-200',
                amber: 'bg-amber-50 text-amber-600 border-amber-200',
            };

            function calTodayKey() {
                const t = new Date();
                return t.getFullYear() + '-' + String(t.getMonth() + 1).padStart(2, '0');
            }
            function calTodayDay() { return new Date().getDate(); }
            function calDateStr(y, m, d) {
                return d + ' ' + calMonthNames[m - 1] + ' ' + y;
            }

            function renderCalendar() {
                const monthKey = calMonthKeys[calCurrentIdx];
                const [year, month] = monthKey.split('-').map(v => parseInt(v, 10));
                const monthEvents = calEvents[monthKey] || [];
                const firstWeekday = new Date(year, month - 1, 1).getDay();
                const daysInMonth = new Date(year, month, 0).getDate();
                const todayKey = calTodayKey();
                const isThisMonth = monthKey === todayKey;
                const todayDay = calTodayDay();

                calMonthLabel.textContent = calMonthNames[month - 1] + ' ' + year;
                calEventCount.textContent = monthEvents.length + ' kegiatan';
                calPrevBtn.disabled = calCurrentIdx === 0;
                calNextBtn.disabled = calCurrentIdx >= calMonthKeys.length - 1;

                let html = '';
                for (let i = 0; i < firstWeekday; i++) {
                    html += '<div class="bg-white aspect-square"></div>';
                }

                for (let d = 1; d <= daysInMonth; d++) {
                    const dayEvents = monthEvents.filter(e => e.day === d);
                    const hasEvent = dayEvents.length > 0;
                    const isToday = isThisMonth && d === todayDay;
                    const isSelected = calSelectedDay === d;
                    const past = isThisMonth && d < todayDay;

                    let classes = 'bg-white aspect-square flex flex-col items-center justify-center text-sm font-semibold transition-all duration-200 relative ';
                    let opacity = past ? 'opacity-50' : '';

                    if (isToday) {
                        classes += '!bg-primary text-white shadow-inner ';
                    } else if (hasEvent) {
                        classes += 'cursor-pointer !bg-rose-100 text-rose-700 hover:!bg-rose-200 font-semibold ';
                        if (isSelected) {
                            classes += '!bg-rose-200 ring-2 ring-rose-300 ';
                        }
                    } else {
                        classes += 'cursor-pointer hover:!bg-gray-100 ';
                        if (isSelected) {
                            classes += '!bg-gray-200 text-gray-600 ';
                        }
                    }

                    html += '<button type="button" class="' + classes.trim() + ' ' + opacity + '" data-day="' + d + '">';

                    if (isToday && hasEvent) {
                        html += '<span class="w-8 h-8 rounded-full bg-white/20 flex items-center justify-center">' + d + '</span>';
                    } else {
                        html += '<span>' + d + '</span>';
                    }

                    html += '</button>';
                }
                calGrid.innerHTML = html;

                calGrid.querySelectorAll('button[data-day]').forEach(btn => {
                    btn.addEventListener('click', function () {
                        calSelectedDay = parseInt(btn.dataset.day, 10);
                        renderCalendar();
                        renderDetail();
                    });
                });

                if (calSelectedDay !== null) renderDetail();
                else renderEmptyDetail();
            }

            function renderEmptyDetail() {
                calDetail.innerHTML = '<div class="text-center py-10"><div class="w-12 h-12 mx-auto mb-3 rounded-2xl bg-gray-100 flex items-center justify-center"><svg class="w-6 h-6 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></div><p class="text-sm text-gray-400 font-medium">Pilih tanggal bertanda pada kalender<br>untuk melihat detail kegiatan.</p></div>';
                if (calDetailImage) calDetailImage.parentElement.classList.add('hidden');
            }

            function renderDetail() {
                const monthKey = calMonthKeys[calCurrentIdx];
                const monthEvents = calEvents[monthKey] || [];
                const [year, month] = monthKey.split('-').map(v => parseInt(v, 10));

                let day = calSelectedDay;
                let events = day !== null ? monthEvents.filter(e => e.day === day) : [];

                if (day === null || events.length === 0) {
                    renderEmptyDetail();
                    return;
                }

                if (calDetailImage && events[0] && events[0].image) {
                    calDetailImage.parentElement.classList.remove('hidden');
                    calDetailImage.src = events[0].image;
                }

                let html = '';
                events.forEach((e, idx) => {
                    html += '<div class="' + (idx > 0 ? 'pt-4 mt-4 border-t border-gray-100' : '') + '">';

                    html += '<div class="flex flex-wrap items-center gap-2 mb-3">';
                    html += '<span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-primary/10 text-primary text-[10px] font-bold uppercase tracking-wider border border-primary/20">';
                    html += '<span class="w-1.5 h-1.5 rounded-full bg-primary"></span>';
                    html += 'Kegiatan';
                    html += '</span>';
                    if (events.length > 1) {
                        html += '<span class="text-[10px] text-gray-400 font-medium">' + (idx + 1) + '/' + events.length + '</span>';
                    }
                    html += '</div>';

                    html += '<h4 class="text-lg font-extrabold text-gray-900 mb-3">' + e.title + '</h4>';

                    html += '<div class="grid grid-cols-1 sm:grid-cols-2 gap-2 mb-4">';
                    html += '<div class="flex items-center gap-2.5 p-2.5 rounded-xl bg-gray-50">';
                    html += '<div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center flex-shrink-0 shadow-sm"><svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></div>';
                    html += '<div>';
                    html += '<p class="text-[10px] text-gray-400 uppercase font-semibold">Tanggal</p>';
                    html += '<p class="text-xs font-bold text-gray-800">' + calDateStr(year, month, e.day) + '</p>';
                    html += '<p class="text-xs text-gray-500 mt-0.5">' + e.time + '</p>';
                    html += '</div></div>';

                    html += '<div class="flex items-center gap-2.5 p-2.5 rounded-xl bg-gray-50">';
                    html += '<div class="w-8 h-8 rounded-lg bg-white flex items-center justify-center flex-shrink-0 shadow-sm"><svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div>';
                    html += '<div>';
                    html += '<p class="text-[10px] text-gray-400 uppercase font-semibold">Lokasi</p>';
                    html += '<p class="text-xs font-bold text-gray-800">' + e.location + '</p>';
                    if (e.latitude && e.longitude) {
                        html += '<a href="https://www.google.com/maps?q=' + e.latitude + ',' + e.longitude + '" target="_blank" class="inline-flex items-center gap-1 text-[11px] text-primary hover:underline mt-1 font-medium">';
                        html += '<svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>';
                        html += 'Buka di Google Maps';
                        html += '</a>';
                    }
                    html += '</div></div>';
                    html += '</div>';

                    html += '<div class="p-4 rounded-2xl bg-gray-50 border border-gray-100">';
                    html += '<p class="text-sm text-gray-600 leading-relaxed">' + e.description + '</p>';
                    html += '</div>';

                    html += '</div>';
                });

                calDetail.innerHTML = html;
            }

            if (calGrid) {
                calPrevBtn.addEventListener('click', function () {
                    if (calCurrentIdx > 0) { calCurrentIdx--; calSelectedDay = null; renderCalendar(); }
                });
                calNextBtn.addEventListener('click', function () {
                    if (calCurrentIdx < calMonthKeys.length - 1) { calCurrentIdx++; calSelectedDay = null; renderCalendar(); }
                });

                // Auto-select today if it has events
                const todayMonth = calTodayKey();
                if (calMonthKeys[calCurrentIdx] === todayMonth) {
                    const todayEvents = (calEvents[todayMonth] || []).filter(e => e.day === calTodayDay());
                    if (todayEvents.length > 0) {
                        calSelectedDay = calTodayDay();
                    }
                }

                renderCalendar();
            }

            {{-- Image modal --}}
            const calImageWrapper = document.getElementById('cal-image-wrapper');
            const calImageModal = document.getElementById('cal-image-modal');
            const calModalImage = document.getElementById('cal-modal-image');

            if (calImageWrapper) {
                calImageWrapper.addEventListener('click', function () {
                    if (calDetailImage && calModalImage) {
                        calModalImage.src = calDetailImage.src;
                        calImageModal.classList.remove('hidden');
                        calImageModal.classList.add('flex');
                        document.body.style.overflow = 'hidden';
                    }
                });
            }
        }

        document.addEventListener('DOMContentLoaded', initCalendar);
        document.addEventListener('livewire:navigated', initCalendar);
    </script>
@endpush
