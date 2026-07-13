@extends('console.layout')

@section('title', 'Detail Artikel WP')
@section('page_title', 'Detail Artikel WP')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex items-center justify-between gap-3">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center shadow-sm">
                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/>
                </svg>
            </div>
            <div>
                <h2 class="text-base font-extrabold text-gray-900">Detail Artikel WordPress</h2>
                <p class="text-xs text-gray-400 line-clamp-1">{{ $articleOld->title }}</p>
            </div>
        </div>
        <a href="{{ route('console.article-old.index') }}" class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-colors duration-200">
            <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
            </svg>
            Daftar Artikel
        </a>
    </div>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        <div class="p-6 sm:p-8">
            {{-- Title & Status --}}
            <div class="flex flex-col sm:flex-row sm:items-start sm:justify-between gap-3 mb-6">
                <h2 class="text-xl font-extrabold text-gray-900">{{ $articleOld->title }}</h2>
                <div class="flex-shrink-0">
                    @if ($articleOld->status === 'publish')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-emerald-500 text-[11px] font-bold text-white shadow-sm">
                            <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                            Published
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-gray-500 text-[11px] font-bold text-white shadow-sm">
                            {{ $articleOld->status }}
                        </span>
                    @endif
                </div>
            </div>

            {{-- Meta Info --}}
            <div class="flex flex-wrap items-center gap-3 mb-6 pb-6 border-b border-gray-100">
                @if ($articleOld->wp_created_at)
                    <span class="inline-flex items-center gap-1.5 text-sm text-gray-500">
                        <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                        </svg>
                        {{ $articleOld->wp_created_at->translatedFormat('d M Y, H:i') }}
                    </span>
                @endif
                <span class="inline-flex items-center gap-1.5 text-sm text-gray-500">
                    <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 011.242 7.244l-4.5 4.5a4.5 4.5 0 01-6.364-6.364l1.757-1.757m13.35-.622l1.757-1.757a4.5 4.5 0 00-6.364-6.364l-4.5 4.5a4.5 4.5 0 001.242 7.244"/>
                    </svg>
                    {{ $articleOld->slug }}
                </span>
            </div>

            {{-- Excerpt --}}
            @if ($articleOld->excerpt)
                <div class="mb-6">
                    <h3 class="flex items-center gap-2 text-sm font-bold text-gray-700 mb-2">
                        <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                        </svg>
                        Kutipan
                    </h3>
                    <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                        <div class="text-sm text-gray-600 leading-relaxed prose-a:text-primary">{!! strip_tags($articleOld->excerpt, '<p><a><strong><em><br>') !!}</div>
                    </div>
                </div>
            @endif

            {{-- Content --}}
            <div class="mb-6">
                <h3 class="flex items-center gap-2 text-sm font-bold text-gray-700 mb-2">
                    <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"/>
                    </svg>
                    Konten Lengkap
                </h3>
                <div class="bg-gray-50 rounded-xl p-5 border border-gray-100">
                    <div class="prose prose-sm max-w-none prose-img:rounded-lg prose-a:text-primary prose-table:border prose-table:border-gray-200 prose-th:bg-gray-100 prose-th:px-3 prose-th:py-2 prose-td:px-3 prose-td:py-2">
                        {!! $articleOld->content !!}
                    </div>
                </div>
            </div>

            {{-- Timestamp --}}
            <div class="pt-4 border-t border-gray-100 flex flex-wrap items-center gap-4 text-xs text-gray-400">
                @if ($articleOld->wp_modified_at)
                    <span class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0A4.987 4.987 0 012.985 15m11.998-7.7c.375-.483.807-.955 1.293-1.39M5.1 7.5c-.176-.36-.322-.73-.438-1.107M5.1 7.5l5.4 5.4M5.1 7.5A11.998 11.998 0 004.285 12c0 1.55.294 3.032.83 4.4"/>
                        </svg>
                        Dimodifikasi: {{ $articleOld->wp_modified_at->translatedFormat('d M Y, H:i') }}
                    </span>
                @endif
                <span class="flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Disimpan: {{ $articleOld->created_at->translatedFormat('d M Y, H:i') }}
                </span>
            </div>
        </div>
    </div>
</div>
@endsection
