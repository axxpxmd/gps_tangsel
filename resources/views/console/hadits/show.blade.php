@extends('console.layout')

@section('title', 'Detail Hadits')
@section('page_title', 'Detail Hadits')

@section('content')
<div class="max-w-3xl mx-auto space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-amber-500 to-amber-600 flex items-center justify-center shadow-sm">
                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path d="M12 2l2.4 7.4H22l-6.2 4.5 2.4 7.4L12 16.8 5.8 21.3l2.4-7.4L2 9.4h7.6z"/></svg>
            </div>
            <div><h2 class="text-base font-extrabold text-gray-900">Detail Hadits</h2><p class="text-xs text-gray-400">{{ $hadits->source }}</p></div>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('console.hadits.index') }}" class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg>Daftar Hadits
            </a>
            <a href="{{ route('console.hadits.edit', $hadits) }}" class="inline-flex items-center gap-1.5 px-4 py-2 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-colors duration-200 shadow-sm">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/></svg>Edit
            </a>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 sm:p-8">
        <div class="mb-6 p-6 rounded-2xl bg-gradient-to-br from-primary to-primary-dark text-center">
            <p class="font-arabic text-2xl sm:text-3xl text-white leading-loose" dir="rtl">{{ $hadits->arabic_text }}</p>
        </div>
        <div class="p-5 rounded-2xl bg-gray-50 border border-gray-100 mb-4 text-center">
            <p class="text-base sm:text-lg text-gray-700 italic">"{{ $hadits->translation }}"</p>
        </div>
        <div class="flex items-center justify-between">
            <span class="text-xs font-semibold text-gray-500 uppercase tracking-wider">{{ $hadits->source }}</span>
            <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full text-[11px] font-semibold {{ $hadits->is_active ? 'bg-amber-50 text-amber-600' : 'bg-gray-100 text-gray-400' }}">
                <span class="w-1.5 h-1.5 rounded-full {{ $hadits->is_active ? 'bg-amber-500 animate-pulse' : 'bg-gray-300' }}"></span>
                {{ $hadits->is_active ? 'Ditampilkan di Front-End' : 'Nonaktif' }}
            </span>
        </div>
    </div>
</div>
@endsection
