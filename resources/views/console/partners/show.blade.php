@extends('console.layout')

@section('title', 'Detail Partner')
@section('page_title', 'Detail Partner')

@section('content')
<div>
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                </svg>
            </div>
            <div class="min-w-0">
                <h2 class="text-base font-extrabold text-gray-900">Detail Partner</h2>
                <p class="text-xs text-gray-400 line-clamp-1">{{ $partner->name }}</p>
            </div>
        </div>
        <div class="flex items-center gap-2 w-full sm:w-auto">
            <a href="{{ route('console.partners.index') }}" class="flex-1 sm:flex-none inline-flex items-center justify-center gap-1.5 px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
                </svg>
                Kembali
            </a>
            <a href="{{ route('console.partners.edit', $partner) }}" class="flex-1 sm:flex-none inline-flex items-center justify-center gap-1.5 px-4 py-2 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-colors duration-200">
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
            {{-- Logo & Info --}}
            <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
                <div class="flex items-center gap-2.5 px-5 py-4 border-b border-gray-100">
                    <div class="w-8 h-8 rounded-lg bg-amber-50 flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-rounded text-amber-500 text-[18px]">handshake</span>
                    </div>
                    <span class="text-sm font-bold text-gray-800">Profil Partner</span>
                </div>
                <div class="p-5 sm:p-6">
                    <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6">
                        {{-- Logo --}}
                        <div class="w-28 h-28 rounded-2xl bg-gray-50 border border-gray-200 flex items-center justify-center overflow-hidden flex-shrink-0">
                            @if ($partner->gambar_url)
                                <img src="{{ $partner->gambar_url }}" alt="{{ $partner->name }}" class="w-full h-full object-contain p-3">
                            @else
                                <svg class="w-12 h-12 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 21h16.5M4.5 3h15M5.25 3v18m13.5-18v18M9 6.75h1.5m-1.5 3h1.5m-1.5 3h1.5m3-6H15m-1.5 3H15m-1.5 3H15M9 21v-3.375c0-.621.504-1.125 1.125-1.125h3.75c.621 0 1.125.504 1.125 1.125V21"/>
                                </svg>
                            @endif
                        </div>

                        {{-- Info --}}
                        <div class="text-center sm:text-left flex-1">
                            <h3 class="text-xl font-extrabold text-gray-900 mb-2">{{ $partner->name }}</h3>
                            @if ($partner->is_active)
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
                    <span class="text-sm font-bold text-gray-800">Status</span>
                </div>
                <div>
                    @if ($partner->is_active)
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-emerald-50 text-sm font-semibold text-emerald-600">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Ditampilkan di Halaman Depan
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-gray-100 text-sm font-semibold text-gray-500">
                            <span class="w-2 h-2 rounded-full bg-gray-400"></span>
                            Tidak Ditampilkan
                        </span>
                    @endif
                </div>
            </div>

            {{-- Info Waktu --}}
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
                            {{ $partner->created_at->translatedFormat('d M Y, H:i') }}
                        </p>
                    </div>
                    <div>
                        <p class="text-[11px] text-gray-400 font-medium mb-1">Diperbarui</p>
                        <p class="text-xs text-gray-600 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0A4.987 4.987 0 012.985 15m11.998-7.7c.375-.483.807-.955 1.293-1.39M5.1 7.5c-.176-.36-.322-.73-.438-1.107M5.1 7.5l5.4 5.4M5.1 7.5A11.998 11.998 0 004.285 12c0 1.55.294 3.032.83 4.4"/>
                            </svg>
                            {{ $partner->updated_at->translatedFormat('d M Y, H:i') }}
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
                    <a href="{{ route('console.partners.edit', $partner) }}"
                        class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-primary text-white hover:bg-primary-dark rounded-xl text-sm font-semibold transition-all duration-200">
                        <span class="material-symbols-rounded text-[18px]">edit</span>
                        Edit Partner
                    </a>
                    <form action="{{ route('console.partners.destroy', $partner) }}" method="POST" onsubmit="return confirm('Hapus partner &quot;{{ $partner->name }}&quot;?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full flex items-center justify-center gap-2 px-4 py-2.5 border border-red-200 text-red-500 hover:bg-red-50 rounded-xl text-sm font-semibold transition-all duration-200">
                            <span class="material-symbols-rounded text-[18px]">delete</span>
                            Hapus Partner
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
