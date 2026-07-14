@extends('console.layout')

@section('title', 'Edit Partner')
@section('page_title', 'Edit Partner')

@section('content')
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
                <h2 class="text-base font-extrabold text-gray-900">Edit Partner</h2>
                <p class="text-xs text-gray-400 line-clamp-1">{{ $partner->name }}</p>
            </div>
        </div>
        <a href="{{ route('console.partners.show', $partner) }}" class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-colors duration-200">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
            </svg>
            Kembali
        </a>
    </div>

    <form action="{{ route('console.partners.update', $partner) }}" method="POST" enctype="multipart/form-data" onsubmit="this.querySelectorAll('button[type=submit]').forEach(b => { b.disabled = true; b.classList.add('opacity-60', 'cursor-not-allowed'); b.querySelector('.btn-text').textContent = 'Menyimpan...'; })">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 xl:grid-cols-3 gap-5 mb-6">
            {{-- Left — Main Content --}}
            <div class="xl:col-span-2 space-y-5">
                <div class="bg-white rounded-2xl border border-gray-200 p-5 sm:p-6 space-y-6">
                    <div class="flex items-center gap-2.5 mb-2 border-b border-gray-100 pb-3">
                        <div class="w-8 h-8 rounded-lg bg-primary-light flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-rounded text-primary text-[18px]">handshake</span>
                        </div>
                        <span class="text-sm font-bold text-gray-800">Informasi Partner</span>
                    </div>

                    {{-- Nama --}}
                    <div>
                        <div class="flex items-center gap-2 mb-2">
                            <label for="name" class="text-xs font-bold text-gray-700">Nama Partner <span class="text-red-500">*</span></label>
                        </div>
                        <input type="text" id="name" name="name" value="{{ old('name', $partner->name) }}" required autofocus
                            class="w-full px-4 py-3 rounded-xl border @error('name') border-red-300 bg-red-50 @else border-gray-200 @enderror text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all"
                            placeholder="Contoh: Dinkes Tangerang Selatan">
                        <p class="text-[11px] text-gray-400 mt-1">Nama institusi atau organisasi partner.</p>
                        @error('name')
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
                {{-- Logo --}}
                <div class="bg-white rounded-2xl border border-gray-200 p-5 sm:p-6">
                    <div class="flex items-center gap-2.5 mb-4 border-b border-gray-100 pb-3">
                        <div class="w-8 h-8 rounded-lg bg-amber-50 flex items-center justify-center flex-shrink-0">
                            <span class="material-symbols-rounded text-amber-500 text-[18px]">image</span>
                        </div>
                        <span class="text-sm font-bold text-gray-800">Logo</span>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center gap-3 w-full border border-gray-200 rounded-xl p-2 bg-white hover:border-gray-300 transition-colors">
                            <label for="gambar" class="cursor-pointer px-4 py-2 bg-blue-50 text-blue-600 hover:bg-blue-100 rounded-lg text-xs font-bold transition-colors">
                                Choose File
                            </label>
                            <span class="text-xs text-gray-500 truncate" id="file-name">No file chosen</span>
                            <input type="file" id="gambar" name="gambar" accept="image/jpeg,image/png,image/webp"
                                @change="document.getElementById('file-name').textContent = $el.files[0] ? $el.files[0].name : 'No file chosen'"
                                class="hidden">
                        </div>

                        <div class="border-2 border-dashed border-gray-200 rounded-xl p-4 flex items-center justify-center min-h-[140px] bg-gray-50/50 overflow-hidden" id="gambar-preview">
                            @if ($partner->gambar_url)
                                <img src="{{ $partner->gambar_url }}" alt="Preview" class="max-w-[50%] h-auto object-contain rounded-xl mx-auto" id="preview-img">
                            @else
                                <div class="text-center" id="preview-placeholder">
                                    <div class="w-8 h-8 mx-auto mb-2 bg-gray-100 rounded-xl flex items-center justify-center text-gray-400">
                                        <span class="material-symbols-rounded text-[18px]">add_photo_alternate</span>
                                    </div>
                                    <p class="text-[11px] font-semibold text-gray-700">Belum ada logo</p>
                                </div>
                            @endif
                        </div>
                        <p class="text-[11px] text-gray-400">Format JPG, PNG, atau WebP. Maksimal 2MB.</p>
                        @if ($partner->gambar)
                            <div class="flex items-center gap-1.5">
                                <svg class="w-3 h-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
                                <span class="text-[11px] text-gray-400">File tersimpan: {{ $partner->gambar }}</span>
                            </div>
                        @endif
                        @error('gambar')
                            <p class="text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
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
                        <input type="checkbox" name="is_active" value="1" {{ old('is_active', $partner->is_active) ? 'checked' : '' }} class="sr-only peer">
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
                        <a href="{{ route('console.partners.show', $partner) }}"
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

@push('scripts')
<script>
    document.getElementById('gambar').addEventListener('change', function () {
        var file = this.files[0];
        if (!file) return;
        var preview = document.getElementById('gambar-preview');
        var placeholder = document.getElementById('preview-placeholder');
        var existingImg = document.getElementById('preview-img');
        if (placeholder) placeholder.remove();
        if (existingImg) existingImg.remove();
        var img = document.createElement('img');
        img.src = URL.createObjectURL(file);
        img.alt = 'Preview';
        img.className = 'max-w-[50%] h-auto object-contain rounded-xl mx-auto';
        img.id = 'preview-img';
        preview.appendChild(img);
    });
</script>
@endpush
