@extends('console.layout')

@section('title', 'Tambah Hadits')
@section('page_title', 'Tambah Hadits')

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
                <h2 class="text-base font-extrabold text-gray-900">Tambah Hadits Baru</h2>
                <p class="text-xs text-gray-400">Tambahkan hadits pilihan GPS TANGSEL</p>
            </div>
        </div>
        <a href="{{ route('console.hadits.index') }}" class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-colors duration-200">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
            </svg>
            Kembali
        </a>
    </div>

    <form action="{{ route('console.hadits.store') }}" method="POST" onsubmit="this.querySelectorAll('button[type=submit]').forEach(b => { b.disabled = true; b.classList.add('opacity-60', 'cursor-not-allowed'); b.querySelector('.btn-text').textContent = 'Menyimpan...'; })">
        @csrf

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-5 mb-6">
            {{-- Left — Main Content --}}
            <div class="xl:col-span-2 space-y-5">
                <div class="bg-white rounded-2xl border border-gray-200 p-5 sm:p-6 space-y-6">
                    <div class="flex items-center gap-2.5 mb-2 border-b border-gray-100 pb-3">
                        <div class="w-8 h-8 rounded-lg bg-primary-light flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-rounded text-primary text-[18px]">edit_note</span>
                        </div>
                        <span class="text-sm font-bold text-gray-800">Isi Hadits</span>
                    </div>

                    {{-- Teks Arab --}}
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <label for="arabic_text" class="text-xs font-bold text-gray-700">Teks Arab <span class="text-red-500">*</span></label>
                        </div>
                        <textarea id="arabic_text" name="arabic_text" rows="3" required dir="rtl"
                            class="w-full px-4 py-3 rounded-xl border @error('arabic_text') border-red-300 bg-red-50 @else border-gray-200 @enderror text-lg text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none font-arabic leading-loose"
                            placeholder="Masukkan teks Arab hadits...">{{ old('arabic_text') }}</textarea>
                        @error('arabic_text')
                            <p class="text-xs text-red-500 mt-1.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Terjemahan --}}
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <label for="translation" class="text-xs font-bold text-gray-700">Terjemahan <span class="text-red-500">*</span></label>
                        </div>
                        <textarea id="translation" name="translation" rows="3" required
                            class="w-full px-4 py-3 rounded-xl border @error('translation') border-red-300 bg-red-50 @else border-gray-200 @enderror text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all resize-none"
                            placeholder="Terjemahan / arti hadits dalam bahasa Indonesia...">{{ old('translation') }}</textarea>
                        @error('translation')
                            <p class="text-xs text-red-500 mt-1.5 flex items-center gap-1">
                                <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/></svg>
                                {{ $message }}
                            </p>
                        @enderror
                    </div>

                    {{-- Sumber --}}
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <label for="source" class="text-xs font-bold text-gray-700">Sumber <span class="text-red-500">*</span></label>
                        </div>
                        <input type="text" id="source" name="source" value="{{ old('source') }}" required
                            class="w-full px-4 py-3 rounded-xl border @error('source') border-red-300 bg-red-50 @else border-gray-200 @enderror text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                            placeholder="HR. Muslim">
                        @error('source')
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
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', false) ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-2 peer-focus:ring-primary/20 rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-emerald-500"></div>
                        <span class="ml-3.5 text-sm font-medium text-gray-700">Tampilkan di halaman depan</span>
                    </label>
                    <p class="text-[11px] text-gray-400 mt-2">Hanya 1 hadits yang bisa aktif. Mengaktifkan ini akan menonaktifkan yang lain.</p>
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
                            <span class="btn-text">Simpan Hadits</span>
                        </button>
                        <a href="{{ route('console.hadits.index') }}"
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
