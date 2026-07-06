@extends('layouts.app')

@section('title', 'Beranda')
@section('meta_description', 'Gerakan Pejuang Subuh (GPS) Tangerang Selatan — Mengajak masyarakat, terutama anak muda, untuk istiqomah shalat subuh berjamaah di masjid.')

@section('content')
    @include('home._hero')
    @include('home._hadits')
    @include('home._program')
    @include('home._statistik')
    @include('home._pengurus')
    @include('home._kalender')
    @include('home._cta')
@endsection

@push('scripts')
    <script>
        function initPrayerCountdown() {
            {{-- Read prayer times from server-rendered DOM (data-prayer + data-time) --}}
            const prayers = Array.from(document.querySelectorAll('.prayer-slot')).map(function (slot) {
                return {
                    key: slot.dataset.prayer,
                    name: slot.querySelector('.prayer-name') ? slot.querySelector('.prayer-name').textContent : slot.dataset.prayer,
                    time: slot.dataset.time,
                };
            });

            if (prayers.length === 0) return;

            function timeToMinutes(t) {
                const parts = t.split(':');
                return parseInt(parts[0], 10) * 60 + parseInt(parts[1], 10);
            }

            function getNextPrayer() {
                const now = new Date();
                const nowMin = now.getHours() * 60 + now.getMinutes() + (now.getSeconds() > 0 ? 1 : 0);
                for (let i = 0; i < prayers.length; i++) {
                    if (nowMin < timeToMinutes(prayers[i].time)) {
                        return { prayer: prayers[i], index: i, tomorrow: false };
                    }
                }
                {{-- After Isya, next is Subuh tomorrow --}}
                return { prayer: prayers[0], index: 0, tomorrow: true };
            }

            const RING_CIRCUMFERENCE = 2 * Math.PI * 34;
            const ring = document.getElementById('countdown-ring');
            const countdownText = document.getElementById('countdown-text');
            const nextPrayerName = document.getElementById('next-prayer-name');
            const nextPrayerTime = document.getElementById('next-prayer-time');

            function updateCountdown() {
                const now = new Date();
                const next = getNextPrayer();
                const parts = next.prayer.time.split(':');
                const h = parseInt(parts[0], 10);
                const m = parseInt(parts[1], 10);
                const target = new Date(now);
                target.setHours(h, m, 0, 0);
                if (next.tomorrow) {
                    target.setDate(target.getDate() + 1);
                }

                const diff = Math.max(0, target - now);
                const totalMs = next.tomorrow
                    ? (24 * 60 * 60 * 1000)
                    : ((h * 60 + m) * 60 * 1000);
                const progress = totalMs > 0 ? (1 - (diff / totalMs)) : 0;

                const hours = Math.floor(diff / 3600000);
                const minutes = Math.floor((diff % 3600000) / 60000);
                const seconds = Math.floor((diff % 60000) / 1000);
                const pad = function (n) { return n < 10 ? '0' + n : '' + n; };

                if (countdownText) {
                    countdownText.textContent = pad(hours) + ':' + pad(minutes) + ':' + pad(seconds);
                }
                if (ring) {
                    ring.style.strokeDashoffset = RING_CIRCUMFERENCE * (1 - progress);
                }
                if (nextPrayerName) {
                    nextPrayerName.textContent = next.prayer.name;
                }
                if (nextPrayerTime) {
                    nextPrayerTime.textContent = next.prayer.time + ' WIB' + (next.tomorrow ? ' (besok)' : '');
                }

                {{-- Highlight the upcoming prayer slot --}}
                document.querySelectorAll('.prayer-slot').forEach(function (slot) {
                    if (slot.dataset.prayer === next.prayer.key) {
                        slot.classList.add('bg-gradient-to-br', 'from-gold/30', 'to-amber-500/20', 'border-gold/50');
                        slot.classList.remove('bg-white/5', 'border-white/10');
                        const svg = slot.querySelector('svg');
                        if (svg) {
                            svg.classList.remove('text-gold-light/70');
                            svg.classList.add('text-gold-light');
                        }
                        const timeEl = slot.querySelector('.prayer-time');
                        if (timeEl) {
                            timeEl.classList.add('text-gold-light');
                            timeEl.classList.remove('text-white');
                        }
                    }
                });
            }

            updateCountdown();
            if (window.prayerInterval) clearInterval(window.prayerInterval);
            window.prayerInterval = setInterval(updateCountdown, 1000);
        }

        document.addEventListener('DOMContentLoaded', initPrayerCountdown);
        document.addEventListener('livewire:navigated', initPrayerCountdown);
    </script>
@endpush
