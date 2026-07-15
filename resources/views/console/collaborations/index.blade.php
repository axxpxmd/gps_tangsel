@extends('console.layout')

@section('title', 'Data Kolaborasi')
@section('page_title', 'Data Kolaborasi')

@section('content')
<div>
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-lg font-extrabold text-gray-900">Data Kolaborasi</h2>
            <p class="text-xs text-gray-400 mt-0.5">Data pengajuan kolaborasi dari pengguna</p>
        </div>
    </div>

    @if (session('success'))
        <div class="flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl px-4 py-3 mb-6 text-sm font-medium">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            {{ session('success') }}
        </div>
    @endif

    {{-- Stats --}}
    <div class="grid grid-cols-2 lg:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-2xl border border-gray-200 p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center">
                    <svg class="w-5 h-5 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-extrabold text-gray-900">{{ $totalCollaborations }}</p>
                    <p class="text-[11px] text-gray-400 font-medium">Total</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl border border-gray-200 p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-amber-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-extrabold text-gray-900">{{ $baruCount }}</p>
                    <p class="text-[11px] text-gray-400 font-medium">Baru</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl border border-gray-200 p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-blue-50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-extrabold text-gray-900">{{ $dibacaCount }}</p>
                    <p class="text-[11px] text-gray-400 font-medium">Dibaca</p>
                </div>
            </div>
        </div>
        <div class="bg-white rounded-2xl border border-gray-200 p-5">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center">
                    <svg class="w-5 h-5 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div>
                    <p class="text-2xl font-extrabold text-gray-900">{{ $ditindaklanjutiCount }}</p>
                    <p class="text-[11px] text-gray-400 font-medium">Ditindaklanjuti</p>
                </div>
            </div>
        </div>
    </div>

    {{-- Filter Bar --}}
    <div class="bg-white rounded-2xl border border-gray-200 p-4 mb-6">
        <form method="GET" class="flex flex-col xl:flex-row xl:items-end gap-4">
            <div class="flex-1 min-w-[200px]">
                <label class="flex items-center gap-1.5 text-xs font-semibold text-gray-700 mb-2">
                    <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    Cari Data
                </label>
                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari nama, email, atau whatsapp..."
                    class="w-full px-3.5 py-2 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
            </div>

            <div class="w-full sm:w-[180px]">
                <label class="flex items-center gap-1.5 text-xs font-semibold text-gray-700 mb-2">
                    <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Status
                </label>
                <div class="relative">
                    <select name="status"
                        class="w-full px-3.5 py-2 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all bg-white appearance-none pr-8">
                        <option value="">Semua Status</option>
                        <option value="baru" {{ request('status') === 'baru' ? 'selected' : '' }}>Baru</option>
                        <option value="dibaca" {{ request('status') === 'dibaca' ? 'selected' : '' }}>Sudah Dibaca</option>
                        <option value="ditindaklanjuti" {{ request('status') === 'ditindaklanjuti' ? 'selected' : '' }}>Sudah Ditindaklanjuti</option>
                    </select>
                    <div class="pointer-events-none absolute inset-y-0 right-0 flex items-center pr-2.5 text-gray-400">
                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 8.25l-7.5 7.5-7.5-7.5"/>
                        </svg>
                    </div>
                </div>
            </div>

            <div class="w-full sm:w-auto">
                <label class="flex items-center gap-1.5 text-xs font-semibold text-gray-700 mb-2">
                    <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                    </svg>
                    Tanggal
                </label>
                <div class="flex items-center gap-2">
                    <div class="relative w-full sm:w-[160px]">
                        <input type="date" name="date_from" value="{{ request('date_from') }}"
                            class="w-full px-3 py-2 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    </div>
                    <span class="text-xs text-gray-400 font-medium">-</span>
                    <div class="relative w-full sm:w-[160px]">
                        <input type="date" name="date_to" value="{{ request('date_to') }}"
                            class="w-full px-3 py-2 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                    </div>
                </div>
            </div>

            <div class="flex items-center gap-2 self-stretch xl:self-end mt-4 xl:mt-0">
                <button type="submit" class="flex-1 xl:flex-none inline-flex items-center justify-center gap-1.5 px-5 py-2 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-colors duration-200">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                    </svg>
                    Filter
                </button>
                <a href="{{ route('console.collaborations.index') }}" class="inline-flex items-center justify-center w-[38px] h-[38px] text-gray-500 hover:text-gray-700 bg-gray-50 hover:bg-gray-100 border border-gray-200 rounded-xl transition-colors duration-200" title="Reset">
                    <span class="material-symbols-rounded text-[18px]">restart_alt</span>
                </a>
            </div>
        </form>
    </div>

    {{-- Table --}}
    @if ($collaborations->isEmpty())
        <div class="bg-white rounded-2xl border border-gray-200 p-16 text-center">
            <div class="w-20 h-20 mx-auto mb-5 rounded-2xl bg-gradient-to-br from-primary/10 to-primary/5 flex items-center justify-center">
                <svg class="w-10 h-10 text-primary/30" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                </svg>
            </div>
            <h3 class="text-base font-bold text-gray-900 mb-1">
                {{ request()->anyFilled(['search', 'status', 'date_from', 'date_to']) ? 'Data Tidak Ditemukan' : 'Belum Ada Data Kolaborasi' }}
            </h3>
            <p class="text-sm text-gray-400">
                {{ request()->anyFilled(['search', 'status', 'date_from', 'date_to']) ? 'Coba ubah filter atau reset pencarian.' : 'Data kolaborasi dari pengguna akan muncul di sini.' }}
            </p>
        </div>
    @else
        {{-- Desktop Table --}}
        <div class="hidden lg:block bg-white rounded-2xl border border-gray-200 overflow-hidden">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[900px]">
                    <thead>
                        <tr class="border-b border-gray-100 bg-gray-50/80">
                            <th class="text-left px-5 py-3.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider w-12">#</th>
                            <th class="text-left px-5 py-3.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider">Nama</th>
                            <th class="text-left px-5 py-3.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider">Email</th>
                            <th class="text-left px-5 py-3.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider">WhatsApp</th>
                            <th class="text-center px-5 py-3.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider w-36">Status</th>
                            <th class="text-left px-5 py-3.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider">Tanggal</th>
                            <th class="text-right px-5 py-3.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider w-28">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach ($collaborations as $collaboration)
                            <tr class="hover:bg-gray-50/50 transition-colors duration-150">
                                <td class="px-5 py-4">
                                    <span class="text-xs font-medium text-gray-400">{{ $collaborations->firstItem() + $loop->index }}</span>
                                </td>
                                <td class="px-5 py-4">
                                    <a href="{{ route('console.collaborations.show', $collaboration) }}" class="text-sm font-semibold text-gray-900 hover:text-primary transition-colors duration-200 {{ $collaboration->isBaru() ? 'font-bold' : '' }}">{{ $collaboration->nama }}</a>
                                </td>
                                <td class="px-5 py-4">
                                    <p class="text-xs text-gray-600">{{ $collaboration->email }}</p>
                                </td>
                                <td class="px-5 py-4">
                                    <p class="text-xs text-gray-600">{{ $collaboration->whatsapp }}</p>
                                </td>
                                <td class="px-5 py-4 text-center">
                                    @if ($collaboration->isBaru())
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-amber-50 text-[11px] font-semibold text-amber-600">
                                            <span class="w-1.5 h-1.5 rounded-full bg-amber-500"></span>
                                            Baru
                                        </span>
                                    @elseif ($collaboration->isDibaca())
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-blue-50 text-[11px] font-semibold text-blue-600">
                                            <span class="w-1.5 h-1.5 rounded-full bg-blue-500"></span>
                                            Dibaca
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 text-[11px] font-semibold text-emerald-600">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            Ditindaklanjuti
                                        </span>
                                    @endif
                                </td>
                                <td class="px-5 py-4">
                                    <p class="text-xs text-gray-600 font-medium">{{ $collaboration->created_at->translatedFormat('d M Y') }}</p>
                                    <p class="text-[11px] text-gray-400">{{ $collaboration->created_at->format('H:i') }} WIB</p>
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <div class="flex items-center justify-end gap-1">
                                        <a href="{{ route('console.collaborations.show', $collaboration) }}" class="p-2 rounded-lg text-gray-400 hover:text-primary hover:bg-primary/10 transition-colors duration-200" title="Lihat">
                                            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                                <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                            </svg>
                                        </a>
                                        <form action="{{ route('console.collaborations.destroy', $collaboration) }}" method="POST" onsubmit="return confirm('Hapus data kolaborasi dari &quot;{{ $collaboration->nama }}&quot;?')" class="inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="p-2 rounded-lg text-gray-400 hover:text-red-500 hover:bg-red-50 transition-colors duration-200" title="Hapus">
                                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                                    <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                                </svg>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Mobile/Tablet Card List --}}
        <div class="lg:hidden space-y-3">
            @foreach ($collaborations as $collaboration)
                <div class="bg-white rounded-2xl border border-gray-200 p-4">
                    <div class="flex items-start justify-between gap-2 mb-2">
                        <a href="{{ route('console.collaborations.show', $collaboration) }}" class="text-sm font-bold text-gray-900 hover:text-primary transition-colors duration-200 {{ $collaboration->isBaru() ? 'font-extrabold' : '' }}">{{ $collaboration->nama }}</a>
                        @if ($collaboration->isBaru())
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-amber-50 text-[10px] font-semibold text-amber-600 flex-shrink-0">
                                <span class="w-1 h-1 rounded-full bg-amber-500"></span>
                                Baru
                            </span>
                        @elseif ($collaboration->isDibaca())
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-blue-50 text-[10px] font-semibold text-blue-600 flex-shrink-0">
                                <span class="w-1 h-1 rounded-full bg-blue-500"></span>
                                Dibaca
                            </span>
                        @else
                            <span class="inline-flex items-center gap-1 px-2 py-0.5 rounded-full bg-emerald-50 text-[10px] font-semibold text-emerald-600 flex-shrink-0">
                                <span class="w-1 h-1 rounded-full bg-emerald-500"></span>
                                Ditindaklanjuti
                            </span>
                        @endif
                    </div>
                    <p class="text-xs text-gray-500 mb-1">{{ $collaboration->email }}</p>
                    <p class="text-xs text-gray-500 mb-3">{{ $collaboration->whatsapp }}</p>
                    <div class="flex items-center justify-between">
                        <span class="text-[11px] text-gray-400">{{ $collaboration->created_at->translatedFormat('d M Y') }}</span>
                        <div class="flex items-center gap-0.5">
                            <a href="{{ route('console.collaborations.show', $collaboration) }}" class="p-1.5 rounded-lg text-gray-400 hover:text-primary hover:bg-primary/10 transition-colors duration-200" title="Lihat">
                                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </a>
                            <form action="{{ route('console.collaborations.destroy', $collaboration) }}" method="POST" onsubmit="return confirm('Hapus data kolaborasi dari &quot;{{ $collaboration->nama }}&quot;?')" class="inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="p-1.5 rounded-lg text-gray-400 hover:text-red-500 hover:bg-red-50 transition-colors duration-200" title="Hapus">
                                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/>
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        {{-- Pagination --}}
        <div class="mt-6">
            {{ $collaborations->links() }}
        </div>
    @endif
</div>
@endsection
