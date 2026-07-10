@extends('console.layout')

@section('title', 'Edit Galeri')
@section('page_title', 'Edit Galeri')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-amber-500 to-amber-600 flex items-center justify-center shadow-sm">
                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/></svg>
            </div>
            <div><h2 class="text-base font-extrabold text-gray-900">Edit Galeri</h2><p class="text-xs text-gray-400">{{ $gallery->title }}</p></div>
        </div>
        <a href="{{ route('console.galleries.show', $gallery) }}" class="inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 hover:text-gray-900 transition-colors duration-200"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg>Kembali ke Detail</a>
    </div>

    <form action="{{ route('console.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('console.galleries._form')

        {{-- Existing Images --}}
        @if ($gallery->images->isNotEmpty())
            <div class="mt-6">
                <h4 class="text-sm font-bold text-gray-700 mb-3">Gambar Tersimpan</h4>
                <div class="grid grid-cols-3 sm:grid-cols-4 gap-3">
                    @foreach ($gallery->images as $image)
                        <div class="relative group rounded-xl overflow-hidden bg-gray-100 aspect-square">
                            <img src="{{ $image->gambar_url }}" alt="" class="w-full h-full object-cover">
                            <button type="button" onclick="if(confirm('Hapus gambar ini?')){event.preventDefault();document.getElementById('delete-image-{{ $image->id }}').submit()}" class="absolute top-2 right-2 w-7 h-7 rounded-lg bg-red-500 text-white flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity duration-200">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2.5"><path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/></svg>
                            </button>
                        </div>
                        <form id="delete-image-{{ $image->id }}" action="{{ route('console.galleries.delete-image', [$gallery, $image]) }}" method="POST" class="hidden">@csrf @method('DELETE')</form>
                    @endforeach
                </div>
            </div>
        @endif

        <div class="flex items-center gap-3 mt-6">
            <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-colors duration-200 shadow-sm shadow-primary/20"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>Simpan Perubahan</button>
        </div>
    </form>
</div>
@endsection
