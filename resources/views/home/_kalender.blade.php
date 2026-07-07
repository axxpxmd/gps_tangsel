{{-- ============ KALENDER KEGIATAN SECTION ============ --}}
<section class="relative py-20 lg:py-28 bg-gradient-to-r from-primary via-primary-dark to-dawn-deep overflow-hidden" id="kalender">
    {{-- Decorative background blobs --}}
    <div class="absolute top-10 left-0 w-96 h-96 bg-primary/5 rounded-full blur-3xl"></div>
    <div class="absolute bottom-10 right-0 w-[28rem] h-[28rem] bg-gold/5 rounded-full blur-3xl"></div>

    <div class="relative max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        {{-- Section Header --}}
        <div class="max-w-3xl mx-auto text-center mb-14 lg:mb-20 reveal">
            <div class="inline-flex items-center gap-2 px-4 py-2 rounded-full bg-white/10 border border-white/15 mb-5">
                <span class="w-2 h-2 rounded-full bg-gold-light animate-pulse"></span>
                <span class="text-xs font-semibold text-gold-light uppercase tracking-wider">Agenda Kegiatan</span>
            </div>
            <h2 class="text-3xl sm:text-4xl lg:text-5xl font-extrabold text-white tracking-tight mb-5">
                Kalender Kegiatan<br>
                <span class="text-gradient-gold">GPS TangSel</span>
            </h2>
            <p class="text-white/70 leading-relaxed max-w-2xl mx-auto">
                Pantau jadwal GPS TangSel sepanjang bulan. Klik tanggal bertanda untuk melihat detail lengkap kegiatan — dari Safari Subuh pekanan hingga program sosial kemasyarakatan.
            </p>
        </div>

        {{-- Calendar + Detail --}}
        <div class="grid grid-cols-1 xl:grid-cols-12 gap-6 lg:gap-8 items-start">
            {{-- Event Detail Panel (wider) --}}
            <div class="xl:col-span-7 reveal order-2 xl:order-1">
                <div class="relative bg-white rounded-3xl border border-gray-100 overflow-hidden h-full min-h-[30rem]">
                    {{-- Poster image (no overlay) --}}
                    <div class="relative aspect-[16/9] sm:aspect-[2/1] overflow-hidden bg-gray-50">
                        <img src="{{ asset('poster.webp') }}" alt="GPS TangSel" class="w-full h-full object-contain" id="cal-detail-image">
                    </div>

                    {{-- Detail content --}}
                    <div class="relative px-6 sm:px-8 py-6 sm:py-7">
                        <div class="flex items-center justify-between mb-5">
                            <p class="text-xs font-semibold text-gray-400 uppercase tracking-widest">Detail Kegiatan</p>
                            <div class="w-9 h-9 rounded-xl bg-gray-50 border border-gray-100 flex items-center justify-center">
                                <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                                </svg>
                            </div>
                        </div>

                        <div id="cal-detail" class="min-h-[12rem]">
                            {{-- Populated by JS --}}
                        </div>

                        <p class="text-center text-xs text-gray-400 mt-5 pt-5 border-t border-gray-100" id="cal-detail-hint">
                            Klik tanggal berwarna pada kalender untuk melihat detail
                        </p>
                    </div>
                </div>
            </div>

            {{-- Calendar Grid (compact) --}}
            <div class="xl:col-span-5 reveal order-1 xl:order-2" style="transition-delay: 100ms">
                <div class="relative bg-gray-50 rounded-3xl border border-gray-100 p-5 lg:p-6 h-full overflow-hidden">
                    {{-- Month navigation --}}
                    <div class="flex items-center justify-between mb-5">
                        <button type="button" id="cal-prev" class="group w-9 h-9 rounded-lg bg-white border border-gray-100 flex items-center justify-center text-gray-500 hover:bg-primary hover:text-white hover:border-primary transition-all duration-200 disabled:opacity-30 disabled:cursor-not-allowed" aria-label="Bulan sebelumnya">
                            <svg class="w-4 h-4 group-hover:-translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19l-7-7 7-7"/></svg>
                        </button>
                        <div class="text-center">
                            <h3 class="text-base font-bold text-gray-900" id="cal-month-label">Juli 2026</h3>
                            <p class="text-[11px] text-gray-400 mt-0.5 flex items-center justify-center gap-1">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                                <span id="cal-event-count">0 kegiatan</span>
                            </p>
                        </div>
                        <button type="button" id="cal-next" class="group w-9 h-9 rounded-lg bg-white border border-gray-100 flex items-center justify-center text-gray-500 hover:bg-primary hover:text-white hover:border-primary transition-all duration-200 disabled:opacity-30 disabled:cursor-not-allowed" aria-label="Bulan berikutnya">
                            <svg class="w-4 h-4 group-hover:translate-x-0.5 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 5l7 7-7 7"/></svg>
                        </button>
                    </div>

                    {{-- Weekday headers --}}
                    <div class="grid grid-cols-7 gap-1 mb-2">
                        @foreach (['Min', 'Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab'] as $wd)
                            <div class="text-center text-[10px] font-bold text-gray-400 uppercase tracking-wider py-2">{{ $wd }}</div>
                        @endforeach
                    </div>

                    {{-- Day cells (rendered by JS) --}}
                    <div class="grid grid-cols-7 gap-1" id="cal-grid"></div>
                </div>
            </div>
        </div>
    </div>
</section>

@push('scripts')
    <script>
        function initCalendar() {
            {{-- ============ ACTIVITY CALENDAR ============ --}}
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
            const calDetailHint = document.getElementById('cal-detail-hint');
            const defaultDetailImage = '{{ asset('poster.webp') }}';

            const calDotClasses = {
                gold: 'bg-gradient-to-br from-gold to-amber-500',
                emerald: 'bg-emerald-500',
                primary: 'bg-primary',
                amber: 'bg-amber-500',
            };
            const calBadgeClasses = {
                gold: 'bg-amber-50 text-amber-700 border-amber-200',
                emerald: 'bg-emerald-50 text-emerald-700 border-emerald-200',
                primary: 'bg-blue-50 text-primary border-blue-200',
                amber: 'bg-amber-50 text-amber-700 border-amber-200',
            };
            const calIconSvg = {
                mosque: '<path stroke-linecap="round" stroke-linejoin="round" d="M3 21h18M5 21V8l7-5 7 5v13M9 21v-6h6v6M9 11h.01M15 11h.01"/>',
                cart: '<path stroke-linecap="round" stroke-linejoin="round" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 100 4 2 2 0 000-4z"/>',
                heart: '<path stroke-linecap="round" stroke-linejoin="round" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z"/>',
                flask: '<path stroke-linecap="round" stroke-linejoin="round" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z"/>',
            };

            function calTodayKey() {
                const t = new Date();
                return t.getFullYear() + '-' + String(t.getMonth() + 1).padStart(2, '0');
            }
            function calTodayDay() {
                return new Date().getDate();
            }
            function calDateStr(y, m, d) {
                return y + '-' + String(m).padStart(2, '0') + '-' + String(d).padStart(2, '0');
            }

            function renderCalendar() {
                const monthKey = calMonthKeys[calCurrentIdx];
                const [year, month] = monthKey.split('-').map(function (v) { return parseInt(v, 10); });
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
                    html += '<div class="aspect-square"></div>';
                }
                for (let d = 1; d <= daysInMonth; d++) {
                    const dayEvents = monthEvents.filter(function (e) { return e.day === d; });
                    const hasEvent = dayEvents.length > 0;
                    const isToday = isThisMonth && d === todayDay;
                    const isSelected = calSelectedDay === d;
                    const past = isThisMonth && d < todayDay;

                    let classes = 'aspect-square flex flex-col items-center justify-center rounded-lg text-sm transition-all duration-200 relative ';
                    if (isToday) {
                        classes += 'bg-primary text-white font-bold ';
                    } else if (hasEvent) {
                        classes += 'cursor-pointer hover:scale-105 ';
                        if (isSelected) {
                            classes += 'bg-red-500 text-white ring-2 ring-red-300 ';
                        } else {
                            classes += 'bg-red-50 text-red-600 hover:bg-red-500 hover:text-white font-medium ';
                        }
                    } else {
                        classes += 'text-gray-300 ';
                    }
                    if (past && hasEvent && !isSelected && !isToday) {
                        classes += 'opacity-50 ';
                    }

                    html += '<button type="button" class="' + classes.trim() + '" data-day="' + d + '"' + (hasEvent ? '' : ' disabled') + '>';
                    html += '<span class="z-10">' + d + '</span>';
                    html += '</button>';
                }
                calGrid.innerHTML = html;

                calGrid.querySelectorAll('button[data-day]').forEach(function (btn) {
                    if (btn.disabled) { return; }
                    btn.addEventListener('click', function () {
                        calSelectedDay = parseInt(btn.dataset.day, 10);
                        renderCalendar();
                        renderDetail();
                    });
                });

                if (calSelectedDay !== null) { renderDetail(); }
            }

            function renderDetail() {
                const monthKey = calMonthKeys[calCurrentIdx];
                const monthEvents = calEvents[monthKey] || [];
                const [year, month] = monthKey.split('-').map(function (v) { return parseInt(v, 10); });

                let day = calSelectedDay;
                let events = day !== null ? monthEvents.filter(function (e) { return e.day === day; }) : [];

                {{-- Auto-select next upcoming event if nothing chosen --}}
                if (day === null || events.length === 0) {
                    const today = new Date();
                    let found = null;
                    for (let i = calCurrentIdx; i < calMonthKeys.length; i++) {
                        const mk = calMonthKeys[i];
                        const [y, mo] = mk.split('-').map(function (v) { return parseInt(v, 10); });
                        const upcoming = (calEvents[mk] || []).filter(function (e) {
                            const ed = new Date(y, mo - 1, e.day);
                            return ed >= new Date(today.getFullYear(), today.getMonth(), today.getDate());
                        }).sort(function (a, b) { return a.day - b.day; });
                        if (upcoming.length > 0) {
                            found = { monthIdx: i, day: upcoming[0].day, events: [upcoming[0]] };
                            break;
                        }
                    }
                    if (found) {
                        calCurrentIdx = found.monthIdx;
                        calSelectedDay = found.day;
                        events = found.events;
                        renderCalendar();
                        return;
                    }
                    if (calDetailImage) {
                        calDetailImage.src = defaultDetailImage;
                    }
                    calDetail.innerHTML = '<div class="text-center py-12"><div class="w-14 h-14 mx-auto mb-4 rounded-2xl bg-gray-50 flex items-center justify-center"><svg class="w-7 h-7 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></div><p class="text-sm text-gray-400">Belum ada kegiatan terjadwalkan.</p></div>';
                    if (calDetailHint) { calDetailHint.classList.remove('hidden'); }
                    return;
                }

                if (calDetailHint) { calDetailHint.classList.add('hidden'); }

                {{-- Use the first event image for the header --}}
                if (calDetailImage && events[0] && events[0].image) {
                    calDetailImage.src = events[0].image;
                }

                let html = '';
                events.forEach(function (e, idx) {
                    html += '<div class="' + (idx > 0 ? 'pt-5 mt-5 border-t border-gray-100 ' : '') + '">';
                    html += '<div class="flex flex-wrap items-center gap-2 mb-3">';
                    html += '<span class="inline-flex items-center gap-1.5 px-3 py-1 rounded-full text-[10px] font-bold uppercase tracking-wider border ' + (calBadgeClasses[e.color] || calBadgeClasses.gold) + '">';
                    html += '<span class="w-1.5 h-1.5 rounded-full ' + (calDotClasses[e.color] || 'bg-gold') + '"></span>';
                    html += e.program;
                    html += '</span>';
                    if (events.length > 1) {
                        html += '<span class="text-[10px] text-gray-400 font-medium">Kegiatan ' + (idx + 1) + ' dari ' + events.length + '</span>';
                    }
                    html += '</div>';
                    html += '<h4 class="text-xl font-bold text-gray-900 mb-4 leading-snug">' + e.title + '</h4>';
                    html += '<div class="space-y-3 mb-4">';
                    html += '<div class="flex items-center gap-3 text-sm text-gray-600">';
                    html += '<div class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg></div>';
                    html += '<span>' + e.weekday + ', ' + calDateStr(year, month, e.day) + ' · ' + e.time + '</span>';
                    html += '</div>';
                    html += '<div class="flex items-start gap-3 text-sm text-gray-600">';
                    html += '<div class="w-8 h-8 rounded-lg bg-gray-50 flex items-center justify-center flex-shrink-0"><svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg></div>';
                    html += '<span class="mt-1">' + e.location + '</span>';
                    html += '</div>';
                    html += '</div>';
                    html += '<div class="flex items-start gap-3 p-4 rounded-xl bg-gray-50 border border-gray-100">';
                    html += '<svg class="w-5 h-5 flex-shrink-0 mt-0.5 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">' + (calIconSvg[e.icon] || '') + '</svg>';
                    html += '<p class="text-[13px] text-gray-600 leading-relaxed">' + e.description + '</p>';
                    html += '</div>';
                    html += '</div>';
                });

                calDetail.innerHTML = html;
            }

            if (calGrid) {
                calPrevBtn.addEventListener('click', function () {
                    if (calCurrentIdx > 0) {
                        calCurrentIdx--;
                        calSelectedDay = null;
                        renderCalendar();
                        renderDetail();
                    }
                });
                calNextBtn.addEventListener('click', function () {
                    if (calCurrentIdx < calMonthKeys.length - 1) {
                        calCurrentIdx++;
                        calSelectedDay = null;
                        renderCalendar();
                        renderDetail();
                    }
                });
                renderCalendar();
                renderDetail();
            }
        }

        document.addEventListener('DOMContentLoaded', initCalendar);
        document.addEventListener('livewire:navigated', initCalendar);
    </script>
@endpush
