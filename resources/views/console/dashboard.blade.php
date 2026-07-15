@extends('console.layout')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<div class="space-y-6">
    {{-- Welcome Banner --}}
    <div class="relative rounded-2xl bg-gradient-to-br from-primary to-dawn-deep p-6 sm:p-8 overflow-hidden">
        <div class="absolute top-0 right-0 w-64 h-64 bg-white/5 rounded-full -translate-y-1/2 translate-x-1/4"></div>
        <div class="absolute bottom-0 left-0 w-48 h-48 bg-gold/10 rounded-full translate-y-1/2 -translate-x-1/4"></div>
        <div class="absolute top-10 right-16 w-20 h-20 bg-white/5 rounded-full"></div>

        <div class="relative flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
            <div>
                <div class="flex items-center gap-3 mb-3">
                    <div class="w-10 h-10 rounded-xl bg-gold/20 flex items-center justify-center">
                        <svg class="w-5 h-5 text-gold-light" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z"/>
                        </svg>
                    </div>
                    <span class="text-xs font-semibold text-gold-light/80 uppercase tracking-wider">Selamat Datang</span>
                </div>
                <h2 class="text-xl sm:text-2xl font-extrabold text-white mb-1">{{ auth()->user()->name }}</h2>
                <p class="text-white/60 text-sm">Content Management System GPS Tangerang Selatan</p>
            </div>
            <div class="flex items-center gap-3">
                <a href="{{ route('home') }}" target="_blank" class="inline-flex items-center gap-2 px-4 py-2.5 rounded-xl bg-white/15 hover:bg-white/20 text-white text-sm font-medium transition-all duration-200 backdrop-blur-sm">
                    <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25"/>
                    </svg>
                    Lihat Website
                </a>
            </div>
        </div>
    </div>

    {{-- Main Stats Grid --}}
    <div class="grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-6 gap-4">
        <a href="{{ route('console.programs.index') }}" class="group bg-white rounded-2xl border border-gray-100 p-4 hover:border-primary/20 hover:shadow-md transition-all duration-300">
            <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center mb-3 group-hover:bg-primary group-hover:scale-110 transition-all duration-300">
                <svg class="w-5 h-5 text-primary group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zm0 9.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zm0 9.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
                </svg>
            </div>
            <p class="text-2xl font-extrabold text-gray-900">{{ $totalPrograms }}</p>
            <p class="text-[11px] text-gray-400 font-medium mt-0.5">Program</p>
            <p class="text-[10px] text-emerald-500 font-semibold mt-1">{{ $activePrograms }} aktif</p>
        </a>

        <a href="{{ route('console.articles.index') }}" class="group bg-white rounded-2xl border border-gray-100 p-4 hover:border-gold/30 hover:shadow-md transition-all duration-300">
            <div class="w-10 h-10 rounded-xl bg-gold/10 flex items-center justify-center mb-3 group-hover:bg-gold group-hover:scale-110 transition-all duration-300">
                <svg class="w-5 h-5 text-gold group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                </svg>
            </div>
            <p class="text-2xl font-extrabold text-gray-900">{{ $totalArticles }}</p>
            <p class="text-[11px] text-gray-400 font-medium mt-0.5">Artikel</p>
            <p class="text-[10px] text-emerald-500 font-semibold mt-1">{{ $publishedArticles }} terbit</p>
        </a>

        <a href="{{ route('console.activities.index') }}" class="group bg-white rounded-2xl border border-gray-100 p-4 hover:border-emerald-200 hover:shadow-md transition-all duration-300">
            <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center mb-3 group-hover:bg-emerald-500 group-hover:scale-110 transition-all duration-300">
                <svg class="w-5 h-5 text-emerald-600 group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                </svg>
            </div>
            <p class="text-2xl font-extrabold text-gray-900">{{ $totalActivities }}</p>
            <p class="text-[11px] text-gray-400 font-medium mt-0.5">Agenda</p>
            <p class="text-[10px] text-blue-500 font-semibold mt-1">{{ $upcomingActivities }} mendatang</p>
        </a>

        <a href="{{ route('console.galleries.index') }}" class="group bg-white rounded-2xl border border-gray-100 p-4 hover:border-amber-200 hover:shadow-md transition-all duration-300">
            <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center mb-3 group-hover:bg-amber-500 group-hover:scale-110 transition-all duration-300">
                <svg class="w-5 h-5 text-amber-600 group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/>
                </svg>
            </div>
            <p class="text-2xl font-extrabold text-gray-900">{{ $totalGalleries }}</p>
            <p class="text-[11px] text-gray-400 font-medium mt-0.5">Galeri</p>
            <p class="text-[10px] text-gray-500 font-semibold mt-1">{{ $totalGalleryImages }} foto</p>
        </a>

        <a href="{{ route('console.board-members.index') }}" class="group bg-white rounded-2xl border border-gray-100 p-4 hover:border-purple-200 hover:shadow-md transition-all duration-300">
            <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center mb-3 group-hover:bg-purple-500 group-hover:scale-110 transition-all duration-300">
                <svg class="w-5 h-5 text-purple-600 group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                </svg>
            </div>
            <p class="text-2xl font-extrabold text-gray-900">{{ $totalBoardMembers }}</p>
            <p class="text-[11px] text-gray-400 font-medium mt-0.5">Pengurus</p>
            <p class="text-[10px] text-emerald-500 font-semibold mt-1">{{ $activeBoardMembers }} aktif</p>
        </a>

        <a href="{{ route('console.collaborations.index') }}" class="group bg-white rounded-2xl border border-gray-100 p-4 hover:border-rose-200 hover:shadow-md transition-all duration-300">
            <div class="w-10 h-10 rounded-xl bg-rose-50 flex items-center justify-center mb-3 group-hover:bg-rose-500 group-hover:scale-110 transition-all duration-300">
                <svg class="w-5 h-5 text-rose-600 group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                </svg>
            </div>
            <p class="text-2xl font-extrabold text-gray-900">{{ $totalCollaborations }}</p>
            <p class="text-[11px] text-gray-400 font-medium mt-0.5">Kolaborasi</p>
            @if ($newCollaborations > 0)
                <p class="text-[10px] text-amber-500 font-semibold mt-1">{{ $newCollaborations }} baru</p>
            @else
                <p class="text-[10px] text-emerald-500 font-semibold mt-1">{{ $followedUpCollaborations }} ditindaklanjuti</p>
            @endif
        </a>
    </div>

    {{-- Content Sections --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        {{-- Recent Articles --}}
        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
            <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-lg bg-gold/10 flex items-center justify-center">
                        <span class="material-symbols-rounded text-gold text-[18px]">article</span>
                    </div>
                    <span class="text-sm font-bold text-gray-800">Artikel Terbaru</span>
                </div>
                <a href="{{ route('console.articles.index') }}" class="text-xs font-semibold text-primary hover:text-primary-dark transition-colors">Lihat Semua</a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse ($recentArticles as $article)
                    <a href="{{ route('console.articles.show', $article) }}" class="flex items-start gap-3 px-5 py-3.5 hover:bg-gray-50/50 transition-colors">
                        <div class="w-10 h-10 rounded-lg bg-gray-100 flex items-center justify-center overflow-hidden flex-shrink-0">
                            @if ($article->imageUrl)
                                <img src="{{ $article->imageUrl }}" alt="{{ $article->title }}" class="w-full h-full object-cover">
                            @else
                                <svg class="w-5 h-5 text-gray-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/>
                                </svg>
                            @endif
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-gray-900 line-clamp-1">{{ $article->title }}</p>
                            <div class="flex items-center gap-2 mt-1">
                                @if ($article->category)
                                    <span class="text-[10px] font-medium text-primary bg-primary-light px-1.5 py-0.5 rounded">{{ $article->category->name }}</span>
                                @endif
                                <span class="text-[11px] text-gray-400">{{ $article->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        @if ($article->status === 'publish')
                            <span class="w-2 h-2 rounded-full bg-emerald-500 flex-shrink-0 mt-1.5"></span>
                        @else
                            <span class="w-2 h-2 rounded-full bg-amber-400 flex-shrink-0 mt-1.5"></span>
                        @endif
                    </a>
                @empty
                    <div class="px-5 py-8 text-center">
                        <svg class="w-10 h-10 text-gray-200 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m2.25 0H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z"/>
                        </svg>
                        <p class="text-xs text-gray-400">Belum ada artikel</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Upcoming Activities --}}
        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
            <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center">
                        <span class="material-symbols-rounded text-emerald-500 text-[18px]">event</span>
                    </div>
                    <span class="text-sm font-bold text-gray-800">Agenda Mendatang</span>
                </div>
                <a href="{{ route('console.activities.index') }}" class="text-xs font-semibold text-primary hover:text-primary-dark transition-colors">Lihat Semua</a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse ($upcomingActivitiesList as $activity)
                    <a href="{{ route('console.activities.show', $activity) }}" class="flex items-start gap-3 px-5 py-3.5 hover:bg-gray-50/50 transition-colors">
                        <div class="w-10 h-10 rounded-lg bg-emerald-50 flex flex-col items-center justify-center flex-shrink-0">
                            <span class="text-[10px] font-bold text-emerald-600 leading-none">{{ $activity->date->format('d') }}</span>
                            <span class="text-[9px] font-medium text-emerald-400 uppercase leading-none">{{ $activity->date->format('M') }}</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-gray-900 line-clamp-1">{{ $activity->title }}</p>
                            <div class="flex items-center gap-1.5 mt-1">
                                <svg class="w-3 h-3 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 10.5a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M19.5 10.5c0 7.142-7.5 11.25-7.5 11.25S4.5 17.642 4.5 10.5a7.5 7.5 0 1115 0z"/>
                                </svg>
                                <span class="text-[11px] text-gray-400 line-clamp-1">{{ $activity->location }}</span>
                            </div>
                        </div>
                        <span class="text-[11px] font-medium text-gray-400 flex-shrink-0">{{ $activity->date->format('H:i') }}</span>
                    </a>
                @empty
                    <div class="px-5 py-8 text-center">
                        <svg class="w-10 h-10 text-gray-200 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                        </svg>
                        <p class="text-xs text-gray-400">Tidak ada agenda mendatang</p>
                    </div>
                @endforelse
            </div>
        </div>

        {{-- Recent Collaborations --}}
        <div class="bg-white rounded-2xl border border-gray-100 overflow-hidden">
            <div class="flex items-center justify-between px-5 py-4 border-b border-gray-100">
                <div class="flex items-center gap-2.5">
                    <div class="w-8 h-8 rounded-lg bg-rose-50 flex items-center justify-center">
                        <span class="material-symbols-rounded text-rose-500 text-[18px]">group</span>
                    </div>
                    <span class="text-sm font-bold text-gray-800">Kolaborasi Terbaru</span>
                </div>
                <a href="{{ route('console.collaborations.index') }}" class="text-xs font-semibold text-primary hover:text-primary-dark transition-colors">Lihat Semua</a>
            </div>
            <div class="divide-y divide-gray-50">
                @forelse ($recentCollaborations as $collaboration)
                    <a href="{{ route('console.collaborations.show', $collaboration) }}" class="flex items-start gap-3 px-5 py-3.5 hover:bg-gray-50/50 transition-colors">
                        <div class="w-9 h-9 rounded-full bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center flex-shrink-0">
                            <span class="text-xs font-bold text-white">{{ Str::substr($collaboration->nama, 0, 1) }}</span>
                        </div>
                        <div class="flex-1 min-w-0">
                            <p class="text-sm font-semibold text-gray-900 line-clamp-1">{{ $collaboration->nama }}</p>
                            <p class="text-[11px] text-gray-400 line-clamp-1 mt-0.5">{{ $collaboration->email }}</p>
                        </div>
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
                    </a>
                @empty
                    <div class="px-5 py-8 text-center">
                        <svg class="w-10 h-10 text-gray-200 mx-auto mb-2" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                        </svg>
                        <p class="text-xs text-gray-400">Belum ada kolaborasi</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>

    {{-- Quick Actions & Info --}}
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-5">
        {{-- Quick Actions --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-6">
            <h3 class="text-base font-bold text-gray-900 mb-5">Aksi Cepat</h3>
            <div class="grid grid-cols-2 sm:grid-cols-3 gap-3">
                <a href="{{ route('console.articles.create') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-gray-50 border border-gray-100 hover:border-primary/20 hover:bg-primary-light transition-all duration-200">
                    <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center">
                        <span class="material-symbols-rounded text-primary text-[20px]">add_circle</span>
                    </div>
                    <span class="text-xs font-semibold text-gray-700">Artikel Baru</span>
                </a>
                <a href="{{ route('console.activities.create') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-gray-50 border border-gray-100 hover:border-emerald-200 hover:bg-emerald-50 transition-all duration-200">
                    <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center">
                        <span class="material-symbols-rounded text-emerald-500 text-[20px]">event</span>
                    </div>
                    <span class="text-xs font-semibold text-gray-700">Agenda Baru</span>
                </a>
                <a href="{{ route('console.galleries.create') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-gray-50 border border-gray-100 hover:border-amber-200 hover:bg-amber-50 transition-all duration-200">
                    <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center">
                        <span class="material-symbols-rounded text-amber-500 text-[20px]">add_photo_alternate</span>
                    </div>
                    <span class="text-xs font-semibold text-gray-700">Galeri Baru</span>
                </a>
                <a href="{{ route('console.programs.create') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-gray-50 border border-gray-100 hover:border-gold/30 hover:bg-gold-light/20 transition-all duration-200">
                    <div class="w-10 h-10 rounded-xl bg-gold/10 flex items-center justify-center">
                        <span class="material-symbols-rounded text-gold text-[20px]">widgets</span>
                    </div>
                    <span class="text-xs font-semibold text-gray-700">Program Baru</span>
                </a>
                <a href="{{ route('console.collaborations.index') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-gray-50 border border-gray-100 hover:border-rose-200 hover:bg-rose-50 transition-all duration-200">
                    <div class="w-10 h-10 rounded-xl bg-rose-50 flex items-center justify-center">
                        <span class="material-symbols-rounded text-rose-500 text-[20px]">group</span>
                    </div>
                    <span class="text-xs font-semibold text-gray-700">Kolaborasi</span>
                </a>
                <a href="{{ route('console.profile.index') }}" class="flex flex-col items-center gap-2 p-4 rounded-xl bg-gray-50 border border-gray-100 hover:border-purple-200 hover:bg-purple-50 transition-all duration-200">
                    <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center">
                        <span class="material-symbols-rounded text-purple-500 text-[20px]">person</span>
                    </div>
                    <span class="text-xs font-semibold text-gray-700">Profil Saya</span>
                </a>
            </div>
        </div>

        {{-- System Info --}}
        <div class="bg-white rounded-2xl border border-gray-100 p-6">
            <h3 class="text-base font-bold text-gray-900 mb-5">Informasi Sistem</h3>
            <div class="space-y-4">
                <div class="flex items-center justify-between p-3 rounded-xl bg-gray-50">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center">
                            <span class="material-symbols-rounded text-primary text-[18px]">widgets</span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400">Total Program</p>
                            <p class="text-sm font-bold text-gray-900">{{ $totalPrograms }}</p>
                        </div>
                    </div>
                    <span class="text-[11px] font-medium text-emerald-500">{{ $activePrograms }} aktif</span>
                </div>
                <div class="flex items-center justify-between p-3 rounded-xl bg-gray-50">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-gold/10 flex items-center justify-center">
                            <span class="material-symbols-rounded text-gold text-[18px]">article</span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400">Total Artikel</p>
                            <p class="text-sm font-bold text-gray-900">{{ $totalArticles }}</p>
                        </div>
                    </div>
                    <span class="text-[11px] font-medium text-emerald-500">{{ $publishedArticles }} terbit</span>
                </div>
                <div class="flex items-center justify-between p-3 rounded-xl bg-gray-50">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center">
                            <span class="material-symbols-rounded text-emerald-500 text-[18px]">event</span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400">Total Agenda</p>
                            <p class="text-sm font-bold text-gray-900">{{ $totalActivities }}</p>
                        </div>
                    </div>
                    <span class="text-[11px] font-medium text-blue-500">{{ $upcomingActivities }} mendatang</span>
                </div>
                <div class="flex items-center justify-between p-3 rounded-xl bg-gray-50">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-amber-50 flex items-center justify-center">
                            <span class="material-symbols-rounded text-amber-500 text-[18px]">photo_library</span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400">Total Galeri</p>
                            <p class="text-sm font-bold text-gray-900">{{ $totalGalleries }}</p>
                        </div>
                    </div>
                    <span class="text-[11px] font-medium text-gray-500">{{ $totalGalleryImages }} foto</span>
                </div>
                <div class="flex items-center justify-between p-3 rounded-xl bg-gray-50">
                    <div class="flex items-center gap-3">
                        <div class="w-8 h-8 rounded-lg bg-rose-50 flex items-center justify-center">
                            <span class="material-symbols-rounded text-rose-500 text-[18px]">group</span>
                        </div>
                        <div>
                            <p class="text-xs text-gray-400">Total Kolaborasi</p>
                            <p class="text-sm font-bold text-gray-900">{{ $totalCollaborations }}</p>
                        </div>
                    </div>
                    @if ($newCollaborations > 0)
                        <span class="text-[11px] font-medium text-amber-500">{{ $newCollaborations }} baru</span>
                    @else
                        <span class="text-[11px] font-medium text-emerald-500">{{ $followedUpCollaborations }} ditindaklanjuti</span>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
