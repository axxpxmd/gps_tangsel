@extends('console.layout')

@section('title', 'Agenda Kegiatan')
@section('page_title', 'Agenda Kegiatan')

@section('content')
<div>
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-lg font-extrabold text-gray-900">Daftar Kegiatan</h2>
            <p class="text-xs text-gray-400 mt-0.5">{{ $activities->count() }} kegiatan tersimpan</p>
        </div>
        <a href="{{ route('console.activities.create') }}" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-colors duration-200 shadow-sm shadow-primary/20">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
            Tambah Kegiatan
        </a>
    </div>

    @if (session('success'))
        <div class="flex items-center gap-3 bg-emerald-50 border border-emerald-200 text-emerald-700 rounded-xl px-4 py-3 mb-6 text-sm font-medium">
            <svg class="w-5 h-5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/></svg>
            {{ session('success') }}
        </div>
    @endif

    @if ($activities->isEmpty())
        <div class="bg-white rounded-2xl border border-gray-200 p-16 text-center">
            <div class="w-20 h-20 mx-auto mb-5 rounded-2xl bg-gradient-to-br from-primary/10 to-primary/5 flex items-center justify-center">
                <svg class="w-10 h-10 text-primary/30" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/></svg>
            </div>
            <h3 class="text-base font-bold text-gray-900 mb-1">Belum Ada Kegiatan</h3>
            <p class="text-sm text-gray-400">Klik "Tambah Kegiatan" untuk menambahkan agenda pertama.</p>
        </div>
    @else
        <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[800px]">
                    <thead>
                        <tr class="border-b border-gray-100 bg-gray-50/80">
                            <th class="text-left px-5 py-3.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider w-20">Gambar</th>
                            <th class="text-left px-5 py-3.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider">Kegiatan</th>
                            <th class="text-left px-5 py-3.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider">Tanggal & Waktu</th>
                            <th class="text-left px-5 py-3.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider hidden md:table-cell">Lokasi</th>
                            <th class="text-center px-5 py-3.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider w-24">Status</th>
                            <th class="text-right px-5 py-3.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider w-28">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach ($activities as $activity)
                            <tr class="hover:bg-gray-50/50 transition-colors duration-150">
                                <td class="px-5 py-4">
                                    <div class="w-12 h-12 rounded-lg bg-gray-100 flex items-center justify-center overflow-hidden">
                                        @if ($activity->gambar_url)
                                            <img src="{{ $activity->gambar_url }}" alt="{{ $activity->title }}" class="w-full h-full object-cover">
                                        @else
                                            <svg class="w-5 h-5 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5"><path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/></svg>
                                        @endif
                                    </div>
                                </td>
                                <td class="px-5 py-4">
                                    <a href="{{ route('console.activities.show', $activity) }}" class="text-sm font-semibold text-gray-900 hover:text-primary transition-colors duration-200">{{ $activity->title }}</a>
                                </td>
                                <td class="px-5 py-4">
                                    <p class="text-xs text-gray-600 font-medium">{{ $activity->date->translatedFormat('d M Y') }}</p>
                                    <p class="text-[11px] text-gray-400">{{ $activity->date->format('H:i') }} WIB</p>
                                </td>
                                <td class="px-5 py-4 hidden md:table-cell">
                                    <p class="text-xs text-gray-500 max-w-[200px] truncate">{{ $activity->location }}</p>
                                </td>
                                <td class="px-5 py-4 text-center">
                                    @if ($activity->is_active)
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 text-[11px] font-semibold text-emerald-600"><span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>Aktif</span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-gray-100 text-[11px] font-semibold text-gray-400"><span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span>Nonaktif</span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <div class="flex items-center justify-end gap-1">
                                        <a href="{{ route('console.activities.edit', $activity) }}" class="p-2 rounded-lg text-gray-400 hover:text-primary hover:bg-primary/10 transition-colors duration-200" title="Edit"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/></svg></a>
                                        <form action="{{ route('console.activities.destroy', $activity) }}" method="POST" onsubmit="return confirm('Hapus kegiatan &quot;{{ $activity->title }}&quot;?')" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="p-2 rounded-lg text-gray-400 hover:text-red-500 hover:bg-red-50 transition-colors duration-200" title="Hapus"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0"/></svg></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif
</div>
@endsection
