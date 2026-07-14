@extends('console.layout')

@section('title', 'Edit Galeri')
@section('page_title', 'Edit Galeri')

@section('content')
@php
    $initialPreviews = [];
    foreach ($gallery->images as $img) {
        $initialPreviews[] = $img->gambar_url;
    }
@endphp
<div>
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                </svg>
            </div>
            <div>
                <h2 class="text-base font-extrabold text-gray-900">Edit Galeri</h2>
                <p class="text-xs text-gray-400 line-clamp-1">{{ $gallery->title }}</p>
            </div>
        </div>
        <a href="{{ route('console.galleries.show', $gallery) }}" class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-colors duration-200">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
            </svg>
            Kembali
        </a>
    </div>

    <form action="{{ route('console.galleries.update', $gallery) }}" method="POST" enctype="multipart/form-data" x-data="{ previewUrls: {{ json_encode($initialPreviews) }} }" onsubmit="this.querySelectorAll('button[type=submit]').forEach(b => { b.disabled = true; b.classList.add('opacity-60', 'cursor-not-allowed'); b.querySelector('.btn-text').textContent = 'Menyimpan...'; })">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-5 mb-6">
            {{-- Left — Main Content --}}
            <div class="xl:col-span-2 space-y-5">
                <div class="bg-white rounded-2xl border border-gray-200 p-5 sm:p-6 space-y-6">
                    <div class="flex items-center gap-2.5 mb-2 border-b border-gray-100 pb-3">
                        <div class="w-8 h-8 rounded-lg bg-primary-light flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-rounded text-primary text-[18px]">edit_note</span>
                        </div>
                        <span class="text-sm font-bold text-gray-800">Informasi Galeri</span>
                    </div>

                    {{-- Judul --}}
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <label for="title" class="text-xs font-bold text-gray-700">Judul Galeri <span class="text-red-500">*</span></label>
                        </div>
                        <input type="text" id="title" name="title" value="{{ old('title', $gallery->title) }}" required autofocus
                            class="w-full px-4 py-3 rounded-xl border @error('title') border-red-300 bg-red-50 @else border-gray-200 @enderror text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                            placeholder="Contoh: Safari Subuh Masjid Al-Hidayah">
                        @error('title')
                            <p class="text-xs text-red-500 mt-1.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Deskripsi --}}
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <label for="description" class="text-xs font-bold text-gray-700">Deskripsi</label>
                        </div>
                        <textarea id="description" name="description" rows="3"
                            class="w-full px-4 py-3 rounded-xl border @error('description') border-red-300 bg-red-50 @else border-gray-200 @enderror text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none"
                            placeholder="Deskripsi singkat album galeri...">{{ old('description', $gallery->description) }}</textarea>
                        @error('description')
                            <p class="text-xs text-red-500 mt-1.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>

                {{-- Upload Gambar --}}
                <div class="bg-white rounded-2xl border border-gray-200 p-5 sm:p-6">
                    <div class="flex items-center gap-2.5 mb-4 border-b border-gray-100 pb-3">
                        <div class="w-8 h-8 rounded-lg bg-amber-50 flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-rounded text-amber-500 text-[18px]">image</span>
                        </div>
                        <span class="text-sm font-bold text-gray-800">Gambar Galeri</span>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-xs font-bold text-gray-700 mb-2">Upload Gambar Baru</label>
                            
                            <div class="flex items-center gap-3 w-full border border-gray-200 rounded-xl p-2 bg-white hover:border-gray-300 transition-colors">
                                <label for="gambar" class="cursor-pointer px-4 py-2 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-lg text-xs font-bold transition-colors">
                                    Choose Files
                                </label>
                                <span class="text-xs text-gray-500 truncate" x-text="previewUrls.length ? previewUrls.length + ' file(s) selected' : 'No file chosen'">No file chosen</span>
                                <input type="file" id="gambar" name="gambar[]" accept="image/jpeg,image/png,image/webp" multiple
                                    @change="
                                        previewUrls = {{ json_encode($initialPreviews) }};
                                        if ($el.files) {
                                            Array.from($el.files).forEach(file => {
                                                previewUrls.push(URL.createObjectURL(file));
                                            });
                                        }
                                    "
                                    class="hidden">
                            </div>
                            <p class="text-[11px] text-gray-400 mt-2 flex items-center gap-1">
                                <span class="material-symbols-rounded text-gray-400 text-[14px]">info</span>
                                Bisa pilih banyak gambar sekaligus. Format: JPG, JPEG, PNG (max 2MB per file). Gambar akan dikonversi ke WebP.
                            </p>
                            @error('gambar')
                                <p class="text-xs text-red-500 mt-1.5 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                                    {{ $message }}
                                </p>
                            @enderror
                            @error('gambar.*')
                                <p class="text-xs text-red-500 mt-1.5 flex items-center gap-1">
                                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        {{-- Existing Images --}}
                        @if ($gallery->images->isNotEmpty())
                            <div>
                                <label class="block text-xs font-bold text-gray-700 mb-2">Gambar Tersimpan</label>
                                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                                    @foreach ($gallery->images as $image)
                                        <div class="relative group rounded-lg overflow-hidden bg-gray-100 aspect-square border border-gray-200">
                                            <img src="{{ $image->gambar_url }}" alt="" class="w-full h-full object-cover">
                                            <button type="button" onclick="if(confirm('Hapus gambar ini?')){document.getElementById('delete-image-{{ $image->id }}').submit()}" class="absolute top-1.5 right-1.5 p-1 rounded-lg bg-red-500 text-white opacity-0 group-hover:opacity-100 hover:bg-red-600 transition-all duration-200">
                                                <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                                </svg>
                                            </button>
                                        </div>
                                        <form id="delete-image-{{ $image->id }}" action="{{ route('console.galleries.delete-image', [$gallery, $image]) }}" method="POST" class="hidden">@csrf @method('DELETE')</form>
                                    @endforeach
                                </div>
                            </div>
                        @endif

                        {{-- Preview Area for New Uploads --}}
                        <div class="border-2 border-dashed border-gray-200 rounded-xl p-6 flex flex-col items-center justify-center min-h-[160px] bg-gray-50/50">
                            <template x-if="previewUrls.length === 0">
                                <div class="text-center">
                                    <div class="w-10 h-10 mx-auto mb-2 bg-gray-100 rounded-xl flex items-center justify-center text-gray-400">
                                        <span class="material-symbols-rounded text-[20px]">add_photo_alternate</span>
                                    </div>
                                    <p class="text-xs font-semibold text-gray-700">Belum ada gambar yang diupload</p>
                                    <p class="text-[11px] text-gray-400 mt-0.5">Pilih file untuk memulai upload</p>
                                </div>
                            </template>
                            <template x-if="previewUrls.length > 0">
                                <div class="grid grid-cols-2 sm:grid-cols-3 gap-3 w-full">
                                    <template x-for="(url, index) in previewUrls" :key="index">
                                        <div class="relative aspect-square rounded-lg overflow-hidden bg-gray-100 border border-gray-200">
                                            <img :src="url" alt="Preview" class="w-full h-full object-cover">
                                        </div>
                                    </template>
                                </div>
                            </template>
                        </div>
                    </div>
                </div>
            </div>

            {{-- Right — Metadata Sidebar --}}
            <div class="space-y-5">
                {{-- Info Album --}}
                <div class="bg-white rounded-2xl border border-gray-200 p-5 sm:p-6">
                    <div class="flex items-center gap-2.5 mb-4 border-b border-gray-100 pb-3">
                        <div class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm font-bold text-gray-800">Info Album</span>
                            <p class="text-[11px] text-gray-400">Lengkapi data galeri</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        {{-- Album --}}
                        <div>
                            <label for="album" class="flex items-center gap-2 text-xs font-semibold text-gray-600 mb-1.5">
                                <svg class="w-3.5 h-3.5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/>
                                </svg>
                                Album <span class="text-red-400">*</span>
                            </label>
                            <input type="text" id="album" name="album" list="album-list" value="{{ old('album', $gallery->album) }}" required
                                class="w-full px-4 py-2.5 rounded-xl border @error('album') border-red-300 bg-red-50 @else border-gray-200 @enderror text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                                placeholder="Ketik atau pilih album">
                            <datalist id="album-list">
                                @foreach ($albums as $album)
                                    <option value="{{ $album }}">
                                @endforeach
                            </datalist>
                            <p class="text-[11px] text-gray-400 mt-1">Pilih dari daftar atau ketik nama album baru</p>
                            @error('album')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>

                        {{-- Tanggal --}}
                        <div>
                            <label for="date" class="flex items-center gap-2 text-xs font-semibold text-gray-600 mb-1.5">
                                <svg class="w-3.5 h-3.5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                                </svg>
                                Tanggal <span class="text-red-400">*</span>
                            </label>
                            <input type="date" id="date" name="date" value="{{ old('date', $gallery->date?->format('Y-m-d')) }}" required
                                class="w-full px-4 py-2.5 rounded-xl border @error('date') border-red-300 bg-red-50 @else border-gray-200 @enderror text-sm text-gray-900 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                            @error('date')
                                <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                </div>

                {{-- Status --}}
                <div class="bg-white rounded-2xl border border-gray-200 p-5 sm:p-6">
                    <div class="flex items-center gap-2.5 mb-4 border-b border-gray-100 pb-3">
                        <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-rounded text-emerald-500 text-[18px]">visibility</span>
                        </div>
                        <span class="text-sm font-bold text-gray-800">Status Tampilan</span>
                    </div>
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="hidden" name="is_active" value="0">
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $gallery->is_active) ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                        <span class="ml-3.5 text-sm font-medium text-gray-700">Tampilkan di halaman depan</span>
                    </label>
                </div>

                {{-- Aksi --}}
                <div class="bg-white rounded-2xl border border-gray-200 p-5 sm:p-6">
                    <div class="flex items-center gap-2.5 mb-4 border-b border-gray-100 pb-3">
                        <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-rounded text-blue-500 text-[18px]">verified_user</span>
                        </div>
                        <span class="text-sm font-bold text-gray-800">Aksi</span>
                    </div>
                    <div class="space-y-3">
                        <button type="submit"
                            class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-primary text-white hover:bg-primary-dark rounded-xl text-sm font-semibold transition-all duration-200 cursor-pointer">
                            <span class="material-symbols-rounded text-[18px]">save</span>
                            <span class="btn-text">Simpan Perubahan</span>
                        </button>
                        <a href="{{ route('console.galleries.show', $gallery) }}"
                            class="w-full flex items-center justify-center gap-2 px-4 py-2.5 border border-gray-200 rounded-xl text-gray-500 hover:text-gray-700 hover:bg-gray-50 text-sm font-semibold transition-all duration-200">
                            Batal
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>
@endsection
