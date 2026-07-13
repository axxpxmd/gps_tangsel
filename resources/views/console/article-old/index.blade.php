@extends('console.layout')

@section('title', 'Berita & Artikel (WP)')
@section('page_title', 'Berita & Artikel (WP)')

@section('content')
<div>
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
        <div>
            <h2 class="text-lg font-extrabold text-gray-900">Berita & Artikel WordPress</h2>
            <p class="text-xs text-gray-400 mt-0.5">{{ $articles->count() }} artikel dari WordPress @if($copiedCount > 0) &middot; {{ $copiedCount }} sudah disalin ke artikel @endif</p>
        </div>
        <div class="flex items-center gap-2">
            <form action="{{ route('console.article-old.copy') }}" method="POST" onsubmit="return confirm('Salin semua artikel dari WordPress ke tabel artikel? Artikel yang sudah ada akan dilewati.')">
                @csrf
                <button type="submit" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-gradient-to-r from-emerald-500 to-emerald-600 text-white text-sm font-semibold rounded-xl hover:shadow-lg hover:shadow-emerald-500/25 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 17.25v3.375c0 .621-.504 1.125-1.125 1.125h-9.75a1.125 1.125 0 01-1.125-1.125V7.875c0-.621.504-1.125 1.125-1.125H6.75a9.06 9.06 0 011.5.124m7.5 10.376h3.375c.621 0 1.125-.504 1.125-1.125V11.25c0-4.46-3.243-8.161-7.5-8.876a9.06 9.06 0 00-1.5-.124H9.375c-.621 0-1.125.504-1.125 1.125v3.5m7.5 10.375H9.375a1.125 1.125 0 01-1.125-1.125v-9.25m12 6.625v-1.875a3.375 3.375 0 00-3.375-3.375h-1.5a1.125 1.125 0 01-1.125-1.125v-1.5a3.375 3.375 0 00-3.375-3.375H9.75"/>
                    </svg>
                    Salin ke Artikel
                </button>
            </form>
            <form action="{{ route('console.article-old.fetch') }}" method="POST" onsubmit="return confirm('Tarik data terbaru dari WordPress?')">
                @csrf
                <button type="submit" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-gradient-to-r from-primary to-primary-dark text-white text-sm font-semibold rounded-xl hover:shadow-lg hover:shadow-primary/25 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 16.5v2.25A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75V16.5m-13.5-9L12 3m0 0l4.5 4.5M12 3v13.5"/>
                    </svg>
                    Tarik Data
                </button>
            </form>
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

    @if ($articles->isEmpty())
        <div class="bg-white rounded-2xl border border-gray-200 p-16 text-center">
            <div class="w-20 h-20 mx-auto mb-5 rounded-2xl bg-gradient-to-br from-primary/10 to-primary/5 flex items-center justify-center">
                <svg class="w-10 h-10 text-primary/30" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 01-2.25 2.25M16.5 7.5V18a2.25 2.25 0 002.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 002.25 2.25h13.5M6 7.5h3v3H6v-3z"/>
                </svg>
            </div>
            <h3 class="text-base font-bold text-gray-900 mb-1">Belum Ada Artikel</h3>
            <p class="text-sm text-gray-400">Klik tombol "Tarik Data" untuk mengambil artikel dari WordPress.</p>
        </div>
    @else
        <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden shadow-sm">
            <div class="overflow-x-auto">
                <table class="w-full min-w-[700px]">
                    <thead>
                        <tr class="border-b border-gray-100 bg-gray-50/80">
                            <th class="text-left px-5 py-3.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider w-12">#</th>
                            <th class="text-left px-5 py-3.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider">Judul</th>
                            <th class="text-center px-5 py-3.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider w-28 hidden sm:table-cell">Status</th>
                            <th class="text-left px-5 py-3.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider w-36 hidden lg:table-cell">Tanggal</th>
                            <th class="text-right px-5 py-3.5 text-[11px] font-bold text-gray-400 uppercase tracking-wider w-24">Aksi</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-50">
                        @foreach ($articles as $article)
                            <tr class="hover:bg-gray-50/50 transition-colors duration-150">
                                <td class="px-5 py-4">
                                    <span class="text-xs font-medium text-gray-400">{{ $loop->iteration }}</span>
                                </td>
                                <td class="px-5 py-4">
                                    <a href="{{ route('console.article-old.show', $article) }}" class="text-sm font-semibold text-gray-900 hover:text-primary transition-colors duration-200 line-clamp-2">{{ $article->title }}</a>
                                </td>
                                <td class="px-5 py-4 text-center hidden sm:table-cell">
                                    @if ($article->status === 'publish')
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-emerald-50 text-[11px] font-semibold text-emerald-600">
                                            <span class="w-1.5 h-1.5 rounded-full bg-emerald-500"></span>
                                            Published
                                        </span>
                                    @else
                                        <span class="inline-flex items-center gap-1.5 px-2.5 py-1 rounded-full bg-gray-100 text-[11px] font-semibold text-gray-400">
                                            <span class="w-1.5 h-1.5 rounded-full bg-gray-300"></span>
                                            {{ $article->status }}
                                        </span>
                                    @endif
                                </td>
                                <td class="px-5 py-4 hidden lg:table-cell">
                                    <span class="text-sm text-gray-500">{{ $article->wp_created_at?->translatedFormat('d M Y, H:i') ?? '—' }}</span>
                                </td>
                                <td class="px-5 py-4 text-right">
                                    <a href="{{ route('console.article-old.show', $article) }}" class="p-2 rounded-lg text-gray-400 hover:text-primary hover:bg-primary/10 transition-colors duration-200 inline-flex" title="Detail">
                                        <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        </svg>
                                    </a>
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
