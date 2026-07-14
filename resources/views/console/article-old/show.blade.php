@extends('console.layout')

@section('title', 'Detail Artikel WP')
@section('page_title', 'Detail Artikel WP')

@section('content')
<div>
    {{-- Header --}}
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3 mb-6">
        <div class="flex items-center gap-3">
            <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center flex-shrink-0">
                <svg class="w-5 h-5 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/>
                </svg>
            </div>
            <div class="min-w-0">
                <h2 class="text-base font-extrabold text-gray-900">Detail Artikel WordPress</h2>
                <p class="text-xs text-gray-400 line-clamp-1">{{ $articleOld->title }}</p>
            </div>
        </div>
        <a href="{{ route('console.article-old.index') }}" class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-colors duration-200">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
            </svg>
            Kembali
        </a>
    </div>

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-5">
        {{-- Left — Main Content --}}
        <div class="xl:col-span-2 space-y-5">
            {{-- Konten --}}
            <div class="bg-white rounded-2xl border border-gray-200 p-5 sm:p-6">
                <div class="flex items-center gap-2.5 mb-4 border-b border-gray-100 pb-3">
                    <div class="w-8 h-8 rounded-lg bg-primary-light flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-rounded text-primary text-[18px]">edit_note</span>
                    </div>
                    <span class="text-sm font-bold text-gray-800">Konten Artikel</span>
                </div>

                @if ($articleOld->excerpt)
                    <div class="bg-amber-50/50 border-l-4 border-gold rounded-r-xl p-4 mb-5">
                        <div class="text-sm text-gray-600 leading-relaxed italic">{!! strip_tags($articleOld->excerpt, '<p><a><strong><em><br>') !!}</div>
                    </div>
                @endif

                <div class="prose prose-sm max-w-none prose-img:rounded-lg prose-a:text-primary prose-table:border prose-table:border-gray-200 prose-th:bg-gray-100 prose-th:px-3 prose-th:py-2 prose-td:px-3 prose-td:py-2">
                    {!! $articleOld->content !!}
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
                    @if ($articleOld->status === 'publish')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-emerald-50 text-sm font-semibold text-emerald-600">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Published
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-gray-100 text-sm font-semibold text-gray-500">
                            <span class="w-2 h-2 rounded-full bg-gray-400"></span>
                            {{ $articleOld->status }}
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
                    @if ($articleOld->wp_created_at)
                        <div>
                            <p class="text-[11px] text-gray-400 font-medium mb-1">Tanggal WP</p>
                            <p class="text-xs text-gray-600 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                {{ $articleOld->wp_created_at->translatedFormat('d M Y, H:i') }}
                            </p>
                        </div>
                    @endif
                    @if ($articleOld->wp_modified_at)
                        <div>
                            <p class="text-[11px] text-gray-400 font-medium mb-1">Dimodifikasi</p>
                            <p class="text-xs text-gray-600 flex items-center gap-1.5">
                                <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0A4.987 4.987 0 012.985 15m11.998-7.7c.375-.483.807-.955 1.293-1.39M5.1 7.5c-.176-.36-.322-.73-.438-1.107M5.1 7.5l5.4 5.4M5.1 7.5A11.998 11.998 0 004.285 12c0 1.55.294 3.032.83 4.4"/>
                                </svg>
                                {{ $articleOld->wp_modified_at->translatedFormat('d M Y, H:i') }}
                            </p>
                        </div>
                    @endif
                    <div>
                        <p class="text-[11px] text-gray-400 font-medium mb-1">Disimpan Lokal</p>
                        <p class="text-xs text-gray-600 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $articleOld->created_at->translatedFormat('d M Y, H:i') }}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
