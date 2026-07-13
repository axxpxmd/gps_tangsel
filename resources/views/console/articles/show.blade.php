@extends('console.layout')

@section('title', 'Detail Artikel')
@section('page_title', 'Detail Artikel')

@section('content')
<div class="max-w-4xl mx-auto space-y-6">
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-3">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center shadow-sm">
                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/>
                </svg>
            </div>
            <div>
                <h2 class="text-base font-extrabold text-gray-900">Detail Artikel</h2>
                <p class="text-xs text-gray-400 line-clamp-1">{{ $article->title }}</p>
            </div>
        </div>
        <div class="flex items-center gap-2">
            <a href="{{ route('console.articles.index') }}" class="inline-flex items-center gap-1.5 px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
                </svg>
                Daftar Artikel
            </a>
            <a href="{{ route('console.articles.edit', $article) }}" class="inline-flex items-center gap-1.5 px-4 py-2 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-colors duration-200 shadow-sm">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.862 4.487l1.687-1.688a1.875 1.875 0 112.652 2.652L10.582 16.07a4.5 4.5 0 01-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 011.13-1.897l8.932-8.931zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0115.75 21H5.25A2.25 2.25 0 013 18.75V8.25A2.25 2.25 0 015.25 6H10"/>
                </svg>
                Edit
            </a>
        </div>
    </div>

    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm overflow-hidden">
        @if ($article->image)
            <div class="relative aspect-[21/9] bg-gray-100">
                <img src="{{ $article->image }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-{{ $article->published_at && $article->published_at <= now() ? 'emerald' : 'amber' }}-500 text-[11px] font-bold text-white shadow-sm">
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        {{ $article->published_at && $article->published_at <= now() ? 'Published' : 'Draft' }}
                    </span>
                    @if ($article->category)
                        <span class="inline-flex items-center px-3 py-1.5 rounded-full bg-white/90 backdrop-blur-sm text-[11px] font-bold text-primary">
                            {{ $article->category->name }}
                        </span>
                    @endif
                </div>
            </div>
        @else
            <div class="relative aspect-[21/9] bg-gradient-to-br from-gray-100 to-gray-200 flex items-center justify-center">
                <svg class="w-16 h-16 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/>
                </svg>
                <div class="absolute top-4 left-4 flex flex-wrap gap-2">
                    <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-{{ $article->published_at && $article->published_at <= now() ? 'emerald' : 'amber' }}-500 text-[11px] font-bold text-white shadow-sm">
                        <span class="w-1.5 h-1.5 rounded-full bg-white"></span>
                        {{ $article->published_at && $article->published_at <= now() ? 'Published' : 'Draft' }}
                    </span>
                    @if ($article->category)
                        <span class="inline-flex items-center px-3 py-1.5 rounded-full bg-white/90 backdrop-blur-sm text-[11px] font-bold text-primary">
                            {{ $article->category->name }}
                        </span>
                    @endif
                </div>
            </div>
        @endif

        <div class="p-6 sm:p-8">
            <h2 class="text-2xl font-extrabold text-gray-900 mb-4">{{ $article->title }}</h2>

            <div class="flex flex-wrap items-center gap-x-4 gap-y-2 mb-6 text-sm text-gray-500">
                <span class="inline-flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                    </svg>
                    {{ $article->author }}
                </span>
                @if ($article->published_at)
                    <span class="inline-flex items-center gap-1.5">
                        <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                        </svg>
                        {{ $article->published_at->translatedFormat('d M Y, H:i') }}
                    </span>
                @endif
                <span class="inline-flex items-center gap-1.5">
                    <svg class="w-4 h-4 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    {{ $article->read_time }} mnt baca
                </span>
            </div>

            @if ($article->excerpt)
                <div class="bg-amber-50/50 border-l-4 border-gold rounded-r-xl p-5 mb-8">
                    <p class="text-sm text-gray-600 leading-relaxed italic">{{ $article->excerpt }}</p>
                </div>
            @endif

            <div class="prose prose-sm max-w-none prose-img:rounded-lg prose-a:text-primary prose-table:border prose-table:border-gray-200 prose-th:bg-gray-100 prose-th:px-3 prose-th:py-2 prose-td:px-3 prose-td:py-2">
                {!! $article->content !!}
            </div>

            <div class="pt-6 mt-8 border-t border-gray-100 flex flex-wrap items-center gap-4 text-xs text-gray-400">
                <span class="flex items-center gap-1.5">
                    <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Dibuat: {{ $article->created_at->translatedFormat('d M Y, H:i') }}
                </span>
                @if ($article->updated_at != $article->created_at)
                    <span class="flex items-center gap-1.5">
                        <svg class="w-3.5 h-3.5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0A4.987 4.987 0 012.985 15m11.998-7.7c.375-.483.807-.955 1.293-1.39M5.1 7.5c-.176-.36-.322-.73-.438-1.107M5.1 7.5l5.4 5.4M5.1 7.5A11.998 11.998 0 004.285 12c0 1.55.294 3.032.83 4.4"/>
                        </svg>
                        Diperbarui: {{ $article->updated_at->translatedFormat('d M Y, H:i') }}
                    </span>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
