@extends('console.layout')

@section('title', 'Detail Artikel')
@section('page_title', 'Detail Artikel')

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
                <h2 class="text-base font-extrabold text-gray-900">Detail Artikel</h2>
                <p class="text-xs text-gray-400 line-clamp-1">{{ $article->title }}</p>
            </div>
        </div>
        <div class="flex items-center gap-2 w-full sm:w-auto">
            <a href="{{ route('console.articles.index') }}" class="flex-1 sm:flex-none inline-flex items-center justify-center gap-1.5 px-4 py-2 text-sm font-medium text-gray-500 hover:text-gray-900 hover:bg-gray-100 rounded-xl transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
                </svg>
                Kembali
            </a>
            <a href="{{ route('console.articles.edit', $article) }}" class="flex-1 sm:flex-none inline-flex items-center justify-center gap-1.5 px-4 py-2 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-colors duration-200">
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
                    <span class="text-sm font-bold text-gray-800">Gambar Artikel</span>
                </div>
                <div class="p-4 sm:p-5 flex justify-center">
                    @if ($article->image_url)
                        <img src="{{ $article->image_url }}" alt="{{ $article->title }}" class="w-full sm:max-w-[75%] md:max-w-[60%] lg:max-w-[50%] h-auto rounded-xl object-contain bg-gray-50">
                    @else
                        <div class="w-full h-48 flex items-center justify-center bg-gray-50 rounded-xl">
                            <div class="text-center">
                                <svg class="w-12 h-12 text-gray-300 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/>
                                </svg>
                                <p class="text-xs text-gray-400">Tidak ada gambar</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            {{-- Konten --}}
            <div class="bg-white rounded-2xl border border-gray-200 p-5 sm:p-6">
                <div class="flex items-center gap-2.5 mb-4 border-b border-gray-100 pb-3">
                    <div class="w-8 h-8 rounded-lg bg-primary-light flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-rounded text-primary text-[18px]">edit_note</span>
                    </div>
                    <span class="text-sm font-bold text-gray-800">Konten Artikel</span>
                </div>

                @if ($article->excerpt)
                    <div class="bg-amber-50/50 border-l-4 border-gold rounded-r-xl p-4 mb-5">
                        <p class="text-sm text-gray-600 leading-relaxed italic">{{ $article->excerpt }}</p>
                    </div>
                @endif

                <div class="prose prose-sm max-w-none prose-img:rounded-lg prose-a:text-primary prose-table:border prose-table:border-gray-200 prose-th:bg-gray-100 prose-th:px-3 prose-th:py-2 prose-td:px-3 prose-td:py-2">
                    {!! $article->content !!}
                </div>
            </div>
        </div>

        {{-- Right — Sidebar --}}
        <div class="space-y-5">
            {{-- Info Artikel --}}
            <div class="bg-white rounded-2xl border border-gray-200 p-5 sm:p-6">
                <div class="flex items-center gap-2.5 mb-4 border-b border-gray-100 pb-3">
                    <div class="w-8 h-8 rounded-lg bg-gray-100 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-gray-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/>
                        </svg>
                    </div>
                    <span class="text-sm font-bold text-gray-800">Informasi Artikel</span>
                </div>

                <div class="space-y-4">
                    {{-- Penulis --}}
                    <div>
                        <p class="text-[11px] text-gray-400 font-medium mb-1.5">Penulis</p>
                        <p class="text-sm text-gray-700 flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.375 3.375 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                            </svg>
                            {{ $article->author }}
                        </p>
                    </div>

                    {{-- Kategori --}}
                    @if ($article->category)
                        <div>
                            <p class="text-[11px] text-gray-400 font-medium mb-1.5">Kategori</p>
                            <span class="inline-flex items-center px-2.5 py-1 rounded-lg bg-primary-light text-xs font-medium text-primary">{{ $article->category->name }}</span>
                        </div>
                    @endif

                    {{-- Tanggal Publikasi --}}
                    @if ($article->published_at)
                        <div>
                            <p class="text-[11px] text-gray-400 font-medium mb-1.5">Tanggal Publikasi</p>
                            <p class="text-sm text-gray-700 flex items-center gap-2">
                                <svg class="w-4 h-4 text-primary flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                                </svg>
                                {{ $article->published_at->translatedFormat('d M Y, H:i') }}
                            </p>
                        </div>
                    @endif

                    {{-- Waktu Baca --}}
                    <div>
                        <p class="text-[11px] text-gray-400 font-medium mb-1.5">Waktu Baca</p>
                        <p class="text-sm text-gray-700 flex items-center gap-2">
                            <svg class="w-4 h-4 text-primary flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            {{ $article->reading_time }} menit
                        </p>
                    </div>
                </div>
            </div>

            {{-- Status --}}
            <div class="bg-white rounded-2xl border border-gray-200 p-5 sm:p-6">
                <div class="flex items-center gap-2.5 mb-4 border-b border-gray-100 pb-3">
                    <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-rounded text-emerald-500 text-[18px]">visibility</span>
                    </div>
                    <span class="text-sm font-bold text-gray-800">Status</span>
                </div>
                <div>
                    @if ($article->status === 'publish')
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-emerald-50 text-sm font-semibold text-emerald-600">
                            <span class="w-2 h-2 rounded-full bg-emerald-500"></span>
                            Published
                        </span>
                    @else
                        <span class="inline-flex items-center gap-1.5 px-3 py-1.5 rounded-full bg-amber-50 text-sm font-semibold text-amber-600">
                            <span class="w-2 h-2 rounded-full bg-amber-400"></span>
                            Draft
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
                            {{ $article->created_at->translatedFormat('d M Y, H:i') }}
                        </p>
                    </div>
                    <div>
                        <p class="text-[11px] text-gray-400 font-medium mb-1">Diperbarui</p>
                        <p class="text-xs text-gray-600 flex items-center gap-1.5">
                            <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0A4.987 4.987 0 012.985 15m11.998-7.7c.375-.483.807-.955 1.293-1.39M5.1 7.5c-.176-.36-.322-.73-.438-1.107M5.1 7.5l5.4 5.4M5.1 7.5A11.998 11.998 0 004.285 12c0 1.55.294 3.032.83 4.4"/>
                            </svg>
                            {{ $article->updated_at->translatedFormat('d M Y, H:i') }}
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
                    <a href="{{ route('console.articles.edit', $article) }}"
                        class="w-full flex items-center justify-center gap-2 px-4 py-2.5 bg-primary text-white hover:bg-primary-dark rounded-xl text-sm font-semibold transition-all duration-200">
                        <span class="material-symbols-rounded text-[18px]">edit</span>
                        Edit Artikel
                    </a>
                    <form action="{{ route('console.articles.destroy', $article) }}" method="POST" onsubmit="return confirm('Hapus artikel &quot;{{ $article->title }}&quot;?')">
                        @csrf
                        @method('DELETE')
                        <button type="submit"
                            class="w-full flex items-center justify-center gap-2 px-4 py-2.5 border border-red-200 text-red-500 hover:bg-red-50 rounded-xl text-sm font-semibold transition-all duration-200">
                            <span class="material-symbols-rounded text-[18px]">delete</span>
                            Hapus Artikel
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
