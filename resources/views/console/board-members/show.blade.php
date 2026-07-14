@extends('console.layout')

@section('title', 'Detail Pengurus')
@section('page_title', 'Detail Pengurus')

@section('content')
<div>
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                </svg>
            </div>
            <div class="min-w-0">
                <h2 class="text-base font-extrabold text-gray-900">Detail Pengurus</h2>
                <p class="text-xs text-gray-400 line-clamp-1">{{ $member->name }}</p>
            </div>
        </div>
        <div class="flex items-center gap-2 w-full sm:w-auto">
            <a href="{{ route('console.board-members.index') }}" class="flex-1 sm:flex-none inline-flex items-center justify-center gap-1.5 px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
                </svg>
                Kembali
            </a>
            <a href="{{ route('console.board-members.edit', $member) }}" class="flex-1 sm:flex-none inline-flex items-center justify-center gap-1.5 px-4 py-2 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-colors duration-200">
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
            {{-- Foto & Info Utama --}}
            <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
                <div class="flex items-center gap-2.5 px-5 py-4 border-b border-gray-100">
                    <div class="w-8 h-8 rounded-lg bg-amber-50 flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-rounded text-amber-500 text-[18px]">person</span>
                    </div>
                    <span class="text-sm font-bold text-gray-800">Profil Pengurus</span>
                </div>
                <div class="p-5 sm:p-6">
                    <div class="flex flex-col sm:flex-row items-center sm:items-start gap-6">
                        {{-- Foto --}}
                        <div class="w-28 h-28 rounded-full bg-gray-50 border-2 border-gray-200 flex items-center justify-center overflow-hidden flex-shrink-0">
                            @if ($member->gambar_url)
                                <img src="{{ $member->gambar_url }}" alt="{{ $member->name }}" class="w-full h-full object-cover">
                            @else
                                <svg class="w-12 h-12 text-gray-300" fill="currentColor" viewBox="0 0 24 24"><path d="M12 12c2.7 0 4.8-2.1 4.8-4.8S14.7 2.4 12 2.4 7.2 4.5 7.2 7.2 9.3 12 12 12zm0 2.4c-3.2 0-9.6 1.6-9.6 4.8v2.4h19.2v-2.4c0-3.2-6.4-4.8-9.6-4.8z"/></svg>
                            @endif
                        </div>

                        {{-- Info --}}
                        <div class="text-center sm:text-left flex-1">
                            <h3 class="text-xl font-extrabold text-gray-900 mb-1">{{ $member->name }}</h3>
                            <p class="text-sm text-primary font-semibold mb-2">{{ $member->position }}</p>
                            @php
                                $groupLabels = ['pembina' => 'Dewan Pembina', 'pengawas' => 'Dewan Pengawas', 'pengurus_harian' => 'Dewan Pengurus Harian'];
                                $groupColors = ['pembina' => 'bg-primary/10 text-primary', 'pengawas' => 'bg-gold/10 text-gold', 'pengurus_harian' => 'bg-emerald-50 text-emerald-600'];
                            @endphp
                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg text-xs font-semibold {{ $groupColors[$member->group] ?? 'bg-gray-100 text-gray-500' }}">{{ $groupLabels[$member->group] ?? $member->group }}</span>

                            @if ($member->phone)
                                <div class="mt-4">
                                    <a href="https://wa.me/{{ preg_replace('/[^0-9]/', '', $member->phone) }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2 rounded-xl bg-emerald-50 text-emerald-700 text-sm font-bold hover:bg-emerald-100 transition-colors duration-200">
                                        <svg class="w-4 h-4" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347"/></svg>
                                        {{ $member->phone }}
                                    </a>
                                </div>
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
                <div class="space-y-3">
                    <div>
                        <p class="text-[11px] text-gray-400 font-medium mb-1">Status Tampilan</p>
                        @if ($member->is_active)
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
                    <div>
                        <p class="text-[11px] text-gray-400 font-medium mb-1">Halaman Kontak</p>
                        @if ($member->is_contact)
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-blue-50 text-sm font-semibold text-blue-600">
                                <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                Ditampilkan
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-gray-100 text-sm font-semibold text-gray-500">
                                <span class="w-2 h-2 rounded-full bg-gray-400"></span>
                                Tidak Ditampilkan
                            </span>
                        @endif
                    </div>
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
                            {{ $member->created_at->translatedFormat('d M Y, H:i') }}
                        </p>
                    </div>
                    <div>
                        <p class="text-[11px] text-gray-400 font-medium mb-1">Diperbarui</p>
                        <p class="text-xs text-gray-600 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0A4.987 4.987 0 012.985 15m11.998-7.7c.375-.483.807-.955 1.293-1.39M5.1 7.5c-.176-.36-.322-.73-.438-1.107M5.1 7.5l5.4 5.4M5.1 7.5A11.998 11.998 0 004.285 12c0 1.55.294 3.032.83 4.4"/>
                            </svg>
                            {{ $member->updated_at->translatedFormat('d M Y, H:i') }}
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
                    <a href="{{ route('console.board-members.edit', $member) }}"
                        class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-primary text-white hover:bg-primary-dark rounded-xl text-sm font-semibold transition-all duration-200">
                        <span class="material-symbols-rounded text-[18px]">edit</span>
                        Edit Pengurus
                    </a>
                    <form action="{{ route('console.board-members.destroy', $member) }}" method="POST" onsubmit="return confirm('Hapus pengurus &quot;{{ $member->name }}&quot;?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full flex items-center justify-center gap-2 px-4 py-2.5 border border-red-200 text-red-500 hover:bg-red-50 rounded-xl text-sm font-semibold transition-all duration-200">
                            <span class="material-symbols-rounded text-[18px]">delete</span>
                            Hapus Pengurus
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
