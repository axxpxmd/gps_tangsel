@extends('console.layout')

@section('title', 'Detail Program')
@section('page_title', 'Detail Program')

@section('content')
<div>
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zm0 9.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zm0 9.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
                </svg>
            </div>
            <div class="min-w-0">
                <h2 class="text-base font-extrabold text-gray-900">Detail Program</h2>
                <p class="text-xs text-gray-400 line-clamp-1">{{ $program->title }}</p>
            </div>
        </div>
        <div class="flex items-center gap-2 w-full sm:w-auto">
            <a href="{{ route('console.programs.index') }}" class="flex-1 sm:flex-none inline-flex items-center justify-center gap-1.5 px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
                </svg>
                Kembali
            </a>
            <a href="{{ route('console.programs.edit', $program) }}" class="flex-1 sm:flex-none inline-flex items-center justify-center gap-1.5 px-4 py-2 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                </svg>
                Edit
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-5">
        {{-- Left — Main Content --}}
        <div class="xl:col-span-2 space-y-5">
            {{-- Gambar --}}
            <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
                <div class="flex items-center gap-2.5 px-5 py-4 border-b border-gray-100">
                    <div class="w-8 h-8 rounded-lg bg-amber-50 flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-rounded text-amber-500 text-[18px]">image</span>
                    </div>
                    <span class="text-sm font-bold text-gray-800">Thumbnail</span>
                </div>
                <div class="p-4 sm:p-5 flex justify-center">
                    @if ($program->gambar_url)
                        <img src="{{ $program->gambar_url }}" alt="{{ $program->title }}" class="w-full sm:max-w-[75%] md:max-w-[60%] lg:max-w-[50%] h-auto rounded-xl object-contain bg-gray-50">
                    @else
                        <div class="w-full h-48 flex items-center justify-center bg-gray-50 rounded-xl">
                            <div class="text-center">
                                <svg class="w-12 h-12 text-gray-300 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/>
                                </svg>
                                <p class="text-xs text-gray-400">Tidak ada gambar</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Deskripsi --}}
            <div class="bg-white rounded-2xl border border-gray-200 p-5 sm:p-6">
                <div class="flex items-center gap-2.5 mb-4 border-b border-gray-100 pb-3">
                    <div class="w-8 h-8 rounded-lg bg-primary-light flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-rounded text-primary text-[18px]">edit_note</span>
                    </div>
                    <span class="text-sm font-bold text-gray-800">Deskripsi Program</span>
                </div>
                <p class="text-sm text-gray-600 leading-relaxed whitespace-pre-line">{{ $program->description }}</p>
            </div>

            {{-- Penerima Manfaat --}}
            <div class="bg-white rounded-2xl border border-gray-200 p-5 sm:p-6">
                <div class="flex items-center gap-2.5 mb-4 border-b border-gray-100 pb-3">
                    <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-rounded text-emerald-500 text-[18px]">groups</span>
                    </div>
                    <span class="text-sm font-bold text-gray-800">Penerima Manfaat</span>
                </div>
                <p class="text-sm text-gray-600 leading-relaxed whitespace-pre-line">{{ $program->penerima_manfaat }}</p>
            </div>
        </div>

        {{-- Right — Sidebar --}}
        <div class="space-y-5">
            {{-- Status --}}
            <div class="bg-white rounded-2xl border border-gray-200 p-5 sm:p-6">
                <div class="flex items-center gap-2.5 mb-4 border-b border-gray-100 pb-3">
                    <div class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/>
                        </svg>
                    </div>
                    <span class="text-sm font-bold text-gray-800">Status</span>
                </div>
                <div>
                    @if ($program->is_active)
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-emerald-50 text-sm font-semibold text-emerald-600">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Aktif
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-gray-100 text-sm font-semibold text-gray-500">
                            <span class="w-2 h-2 rounded-full bg-gray-400"></span>
                            Nonaktif
                        </span>
                    @endif
                </div>
            </div>

            {{-- Info --}}
            <div class="bg-white rounded-2xl border border-gray-200 p-5 sm:p-6">
                <div class="flex items-center gap-2.5 mb-4 border-b border-gray-100 pb-3">
                    <div class="w-8 h-8 rounded-lg bg-blue-50 flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-rounded text-blue-500 text-[18px]">info</span>
                    </div>
                    <span class="text-sm font-bold text-gray-800">Informasi</span>
                </div>
                <div class="space-y-3">
                    <div>
                        <p class="text-[11px] text-gray-400 font-medium mb-1">Dibuat</p>
                        <p class="text-xs text-gray-600 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $program->created_at->translatedFormat('d M Y, H:i') }}
                        </p>
                    </div>
                    <div>
                        <p class="text-[11px] text-gray-400 font-medium mb-1">Diperbarui</p>
                        <p class="text-xs text-gray-600 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0A4.987 4.987 0 012.985 15m11.998-7.7c.375-.483.807-.955 1.293-1.39M5.1 7.5c-.176-.36-.322-.73-.438-1.107M5.1 7.5l5.4 5.4M5.1 7.5A11.998 11.998 0 004.285 12c0 1.55.294 3.032.83 4.4"/>
                            </svg>
                            {{ $program->updated_at->translatedFormat('d M Y, H:i') }}
                        </p>
                    </div>
                </div>
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
                    <a href="{{ route('console.programs.edit', $program) }}"
                        class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-primary text-white hover:bg-primary-dark rounded-xl text-sm font-semibold transition-all duration-200">
                        <span class="material-symbols-rounded text-[18px]">edit</span>
                        Edit Program
                    </a>
                    <form action="{{ route('console.programs.destroy', $program) }}" method="POST" onsubmit="return confirm('Hapus program &quot;{{ $program->title }}&quot;?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full flex items-center justify-center gap-2 px-4 py-2.5 border border-red-200 text-red-500 hover:bg-red-50 rounded-xl text-sm font-semibold transition-all duration-200">
                            <span class="material-symbols-rounded text-[18px]">delete</span>
                            Hapus Program
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
