@extends('console.layout')

@section('title', 'Tambah Program')
@section('page_title', 'Tambah Program')

@section('content')
<div>
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
            </div>
            <div>
                <h2 class="text-base font-extrabold text-gray-900">Tambah Program Baru</h2>
                <p class="text-xs text-gray-400">Tambahkan program unggulan baru GPS TangSel</p>
            </div>
        </div>
        <a href="{{ route('console.programs.index') }}" class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-colors duration-200">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
            </svg>
            Kembali
        </a>
    </div>

    <form action="{{ route('console.programs.store') }}" method="POST" enctype="multipart/form-data" x-data="{ previewUrl: '' }">
        @csrf

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-5 mb-6">
            {{-- Left — Main Content --}}
            <div class="xl:col-span-2 space-y-5">
                <div class="bg-white rounded-2xl border border-gray-200 p-5 sm:p-6 space-y-6">
                    <div class="flex items-center gap-2.5 mb-2 border-b border-gray-100 pb-3">
                        <div class="w-8 h-8 rounded-lg bg-primary-light flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-rounded text-primary text-[18px]">edit_note</span>
                        </div>
                        <span class="text-sm font-bold text-gray-800">Detail Program</span>
                    </div>

                    {{-- Nama Program --}}
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <label for="title" class="text-xs font-bold text-gray-700">Nama Program <span class="text-red-500">*</span></label>
                        </div>
                        <input type="text" id="title" name="title" value="{{ old('title') }}" required autofocus
                            class="w-full px-4 py-3 rounded-xl border @error('title') border-red-300 bg-red-50 @else border-gray-200 @enderror text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                            placeholder="Contoh: S4 (Semangat Safari Sholat Subuh)">
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
                            <label for="description" class="text-xs font-bold text-gray-700">Deskripsi Program <span class="text-red-500">*</span></label>
                        </div>
                        <textarea id="description" name="description" rows="5" required
                            class="w-full px-4 py-3 rounded-xl border @error('description') border-red-300 bg-red-50 @else border-gray-200 @enderror text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none"
                            placeholder="Jelaskan tujuan dan detail kegiatan program...">{{ old('description') }}</textarea>
                        @error('description')
                            <p class="text-xs text-red-500 mt-1.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Penerima Manfaat --}}
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <label for="penerima_manfaat" class="text-xs font-bold text-gray-700">Penerima Manfaat <span class="text-red-500">*</span></label>
                        </div>
                        <textarea id="penerima_manfaat" name="penerima_manfaat" rows="4" required
                            class="w-full px-4 py-3 rounded-xl border @error('penerima_manfaat') border-red-300 bg-red-50 @else border-gray-200 @enderror text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none"
                            placeholder="Tuliskan siapa saja yang menerima manfaat dari program ini...">{{ old('penerima_manfaat') }}</textarea>
                        @error('penerima_manfaat')
                            <p class="text-xs text-red-500 mt-1.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>
                </div>
            </div>

            {{-- Right — Sidebar --}}
            <div class="space-y-5">
                {{-- Thumbnail --}}
                <div class="bg-white rounded-2xl border border-gray-200 p-5 sm:p-6">
                    <div class="flex items-center gap-2.5 mb-4 border-b border-gray-100 pb-3">
                        <div class="w-8 h-8 rounded-lg bg-amber-50 flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-rounded text-amber-500 text-[18px]">image</span>
                        </div>
                        <span class="text-sm font-bold text-gray-800">Thumbnail</span>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center gap-3 w-full border border-gray-200 rounded-xl p-2 bg-white hover:border-gray-300 transition-colors">
                            <label for="gambar" class="cursor-pointer px-4 py-2 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-lg text-xs font-bold transition-colors">
                                Choose File
                            </label>
                            <span class="text-xs text-gray-500 truncate" x-text="previewUrl ? '1 file selected' : 'No file chosen'">No file chosen</span>
                            <input type="file" id="gambar" name="gambar" accept="image/jpeg,image/png,image/webp"
                                @change="
                                    if ($el.files && $el.files[0]) {
                                        previewUrl = URL.createObjectURL($el.files[0]);
                                    } else {
                                        previewUrl = '';
                                    }
                                "
                                class="hidden">
                        </div>

                        <div class="border-2 border-dashed border-gray-200 rounded-xl p-4 flex flex-col items-center justify-center min-h-[140px] bg-gray-50/50 overflow-hidden">
                            <template x-if="!previewUrl">
                                <div class="text-center">
                                    <div class="w-8 h-8 mx-auto mb-2 bg-gray-100 rounded-xl flex items-center justify-center text-gray-400">
                                        <span class="material-symbols-rounded text-[18px]">add_photo_alternate</span>
                                    </div>
                                    <p class="text-[11px] font-semibold text-gray-700">Belum ada thumbnail</p>
                                </div>
                            </template>
                            <template x-if="previewUrl">
                                <div class="relative w-full aspect-[4/3] rounded-lg overflow-hidden">
                                    <img :src="previewUrl" alt="Preview" class="w-full h-full object-cover">
                                    <button type="button" @click="
                                        document.getElementById('gambar').value = '';
                                        previewUrl = '';
                                    "
                                        class="absolute top-1.5 right-1.5 p-1 rounded-lg bg-red-500 text-white hover:bg-red-600 transition-colors">
                                        <svg class="w-3 h-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                                        </svg>
                                    </button>
                                </div>
                            </template>
                        </div>
                        @error('gambar')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>
                </div>

                {{-- Status & Publikasi --}}
                <div class="bg-white rounded-2xl border border-gray-200 p-5 sm:p-6">
                    <div class="flex items-center gap-2.5 mb-4 border-b border-gray-100 pb-3">
                        <div class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                            <svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/>
                            </svg>
                        </div>
                        <div>
                            <span class="text-sm font-bold text-gray-800">Status</span>
                            <p class="text-[11px] text-gray-400">Atur tampilan program</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <label class="relative inline-flex items-center cursor-pointer">
                            <input type="hidden" name="is_active" value="0">
                            <input type="checkbox" name="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}
                                class="sr-only peer">
                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                            <span class="ml-3 text-xs font-semibold text-gray-700 peer-checked:text-gray-900">Tampilkan di Halaman Depan</span>
                        </label>
                    </div>
                </div>

                {{-- Action Buttons --}}
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
                            Simpan Program
                        </button>
                        <a href="{{ route('console.programs.index') }}"
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
