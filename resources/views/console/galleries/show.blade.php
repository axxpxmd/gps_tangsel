@extends('console.layout')

@section('title', 'Detail Galeri')
@section('page_title', 'Detail Galeri')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center shadow-sm">
                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
            </div>
            <div>
                <h2 class="text-base font-extrabold text-gray-900">Detail Galeri</h2>
                <p class="text-xs text-gray-400">{{ $gallery->title }}</p>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('console.galleries.index') }}" class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg>
                Daftar Galeri
            </a>
            <a href="{{ route('console.galleries.edit', $gallery) }}" class="inline-flex items-center gap-1.5 px-4 py-2 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-colors duration-200 shadow-sm">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/></svg>
                Edit
            </a>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 sm:p-8">
        <h3 class="text-xl font-extrabold text-gray-900 mb-3">{{ $gallery->title }}</h3>
        @if ($gallery->description)<p class="text-sm text-gray-500 mb-4">{{ $gallery->description }}</p>@endif

        <div class="flex flex-wrap gap-3 mb-6">
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-primary/10 text-primary text-xs font-semibold">{{ $gallery->album }}</span>
            @if ($gallery->date)<span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-gray-100 text-gray-600 text-xs font-semibold">{{ $gallery->date->translatedFormat('d M Y') }}</span>@endif
            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full text-xs font-semibold {{ $gallery->is_active ? 'bg-emerald-50 text-emerald-600' : 'bg-gray-100 text-gray-400' }}">{{ $gallery->is_active ? 'Aktif' : 'Nonaktif' }}</span>
        </div>

        <h4 class="text-sm font-bold text-gray-700 mb-3">Gambar ({{ $gallery->images->count() }})</h4>
        @if ($gallery->images->isEmpty())
            <p class="text-sm text-gray-400">Tidak ada gambar.</p>
        @else
            <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-4 gap-4">
                @foreach ($gallery->images as $image)
                    <div class="relative group rounded-xl overflow-hidden bg-gray-100 aspect-square">
                        <img src="{{ $image->gambar_url }}" alt="Gambar {{ $loop->iteration }}" class="w-full h-full object-cover group-hover:scale-105 transition-transform duration-300">
                    </div>
                @endforeach
            </div>
        @endif
    </div>
</div>
@endsection
