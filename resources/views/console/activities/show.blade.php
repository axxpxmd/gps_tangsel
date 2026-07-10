@extends('console.layout')

@section('title', 'Detail Kegiatan')
@section('page_title', 'Detail Kegiatan')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center shadow-sm">
                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <div>
                <h2 class="text-base font-extrabold text-gray-900">Detail Kegiatan</h2>
                <p class="text-xs text-gray-400">{{ $activity->title }}</p>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('console.activities.index') }}" class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg>
                Daftar Kegiatan
            </a>
            <a href="{{ route('console.activities.edit', $activity) }}" class="inline-flex items-center gap-1.5 px-4 py-2 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-colors duration-200 shadow-sm">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/></svg>
                Edit
            </a>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        @if ($activity->gambar_url)
            <div class="relative aspect-[21/9] bg-gray-100">
                <img src="{{ $activity->gambar_url }}" alt="{{ $activity->title }}" class="w-full h-full object-cover">
            </div>
        @endif

        <div class="p-6 sm:p-8">
            <h3 class="text-xl font-extrabold text-gray-900 mb-4">{{ $activity->title }}</h3>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4 mb-6">
                <div class="flex items-start gap-3 p-4 rounded-xl bg-gray-50">
                    <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
                    <div>
                        <p class="text-xs text-gray-400 font-medium">Tanggal & Waktu</p>
                        <p class="text-sm font-bold text-gray-900">{{ $activity->date->translatedFormat('d M Y, H:i') }} WIB</p>
                    </div>
                </div>
                <div class="flex items-start gap-3 p-4 rounded-xl bg-gray-50">
                    <svg class="w-5 h-5 text-primary mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/><path stroke-linecap="round" stroke-linejoin="round" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/></svg>
                    <div>
                        <p class="text-xs text-gray-400 font-medium">Lokasi</p>
                        <p class="text-sm font-bold text-gray-900">{{ $activity->location }}</p>
                        @if ($activity->latitude && $activity->longitude)
                            <a href="https://www.google.com/maps?q={{ $activity->latitude }},{{ $activity->longitude }}" target="_blank" class="inline-flex items-center gap-1 text-xs text-primary hover:underline mt-1">
                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/></svg>
                                Buka di Google Maps
                            </a>
                        @endif
                    </div>
                </div>
            </div>

            <h4 class="text-sm font-bold text-gray-700 mb-2">Deskripsi</h4>
            <div class="p-5 rounded-xl bg-gray-50 border border-gray-100 mb-4">
                <p class="text-sm text-gray-600 leading-relaxed">{{ $activity->description }}</p>
            </div>

            <div class="pt-4 border-t border-gray-100 flex flex-wrap items-center gap-2">
                @if ($activity->is_active)
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 text-[11px] font-semibold text-emerald-600"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Aktif</span>
                @else
                    <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-gray-100 text-[11px] font-semibold text-gray-400"><span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span>Nonaktif</span>
                @endif
                <span class="text-[11px] text-gray-400">Dibuat {{ $activity->created_at->translatedFormat('d M Y') }}</span>
            </div>
        </div>
    </div>
</div>
@endsection
