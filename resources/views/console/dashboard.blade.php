@extends('console.layout')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<div class="max-w-6xl mx-auto space-y-6">
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

    {{-- Stats Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4 lg:gap-5">
        <div class="group bg-white rounded-2xl border border-gray-100 p-5 hover:border-primary/20 hover:shadow-md transition-all duration-300">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-xl bg-primary/10 flex items-center justify-center group-hover:bg-primary group-hover:scale-110 transition-all duration-300">
                    <svg class="w-5 h-5 text-primary group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6A2.25 2.25 0 016 3.75h2.25A2.25 2.25 0 0110.5 6v2.25a2.25 2.25 0 01-2.25 2.25H6a2.25 2.25 0 01-2.25-2.25V6zm0 9.75A2.25 2.25 0 016 13.5h2.25a2.25 2.25 0 012.25 2.25V18a2.25 2.25 0 01-2.25 2.25H6A2.25 2.25 0 013.75 18v-2.25zM13.5 6a2.25 2.25 0 012.25-2.25H18A2.25 2.25 0 0120.25 6v2.25A2.25 2.25 0 0118 10.5h-2.25a2.25 2.25 0 01-2.25-2.25V6zm0 9.75a2.25 2.25 0 012.25-2.25H18a2.25 2.25 0 012.25 2.25V18A2.25 2.25 0 0118 20.25h-2.25A2.25 2.25 0 0113.5 18v-2.25z"/>
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-extrabold text-gray-900">5</p>
            <p class="text-xs text-gray-400 mt-0.5">Program Unggulan</p>
        </div>

        <div class="group bg-white rounded-2xl border border-gray-100 p-5 hover:border-gold/30 hover:shadow-md transition-all duration-300">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-xl bg-gold/10 flex items-center justify-center group-hover:bg-gold group-hover:scale-110 transition-all duration-300">
                    <svg class="w-5 h-5 text-gold group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-extrabold text-gray-900">0</p>
            <p class="text-xs text-gray-400 mt-0.5">Artikel Berita</p>
        </div>

        <div class="group bg-white rounded-2xl border border-gray-100 p-5 hover:border-primary/20 hover:shadow-md transition-all duration-300">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-xl bg-emerald-50 flex items-center justify-center group-hover:bg-emerald-500 group-hover:scale-110 transition-all duration-300">
                    <svg class="w-5 h-5 text-emerald-600 group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-extrabold text-gray-900">0</p>
            <p class="text-xs text-gray-400 mt-0.5">Agenda Kegiatan</p>
        </div>

        <div class="group bg-white rounded-2xl border border-gray-100 p-5 hover:border-amber-200 hover:shadow-md transition-all duration-300">
            <div class="flex items-center justify-between mb-3">
                <div class="w-10 h-10 rounded-xl bg-amber-50 flex items-center justify-center group-hover:bg-amber-500 group-hover:scale-110 transition-all duration-300">
                    <svg class="w-5 h-5 text-amber-600 group-hover:text-white transition-colors duration-300" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M18 18.72a9.094 9.094 0 003.741-.479 3 3 0 00-4.682-2.72m.94 3.198l.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0112 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 016 18.719m12 0a5.971 5.971 0 00-.941-3.197m0 0A5.995 5.995 0 0012 12.75a5.995 5.995 0 00-5.058 2.772m0 0a3 3 0 00-4.681 2.72 8.986 8.986 0 003.74.477m.94-3.197a5.971 5.971 0 00-.94 3.197M15 6.75a3 3 0 11-6 0 3 3 0 016 0zm6 3a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0zm-13.5 0a2.25 2.25 0 11-4.5 0 2.25 2.25 0 014.5 0z"/>
                    </svg>
                </div>
            </div>
            <p class="text-2xl font-extrabold text-gray-900">7</p>
            <p class="text-xs text-gray-400 mt-0.5">Pengurus</p>
        </div>
    </div>

    {{-- Quick Actions & Info --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-5">
        <div class="lg:col-span-2 bg-white rounded-2xl border border-gray-100 p-6 sm:p-8">
            <h3 class="text-base font-bold text-gray-900 mb-5">Fitur CMS</h3>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                <div class="flex items-start gap-4 p-4 rounded-xl bg-gray-50 border border-gray-100">
                    <div class="w-9 h-9 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6.042A8.967 8.967 0 006 3.75c-1.052 0-2.062.18-3 .512v14.25A8.987 8.987 0 016 18c2.305 0 4.408.867 6 2.292m0-14.25a8.966 8.966 0 016-2.292c1.052 0 2.062.18 3 .512v14.25A8.987 8.987 0 0018 18a8.967 8.967 0 00-6 2.292m0-14.25v14.25"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900">Kelola Berita</h4>
                        <p class="text-xs text-gray-400 mt-0.5">Tambah, edit, dan hapus artikel berita</p>
                        <span class="inline-flex items-center mt-2 px-2 py-0.5 rounded-full bg-gray-200 text-[10px] font-medium text-gray-500">Segera</span>
                    </div>
                </div>
                <div class="flex items-start gap-4 p-4 rounded-xl bg-gray-50 border border-gray-100">
                    <div class="w-9 h-9 rounded-lg bg-gold/10 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 3v2.25M17.25 3v2.25M3 18.75V7.5a2.25 2.25 0 012.25-2.25h13.5A2.25 2.25 0 0121 7.5v11.25m-18 0A2.25 2.25 0 005.25 21h13.5A2.25 2.25 0 0021 18.75m-18 0v-7.5A2.25 2.25 0 015.25 9h13.5A2.25 2.25 0 0121 11.25v7.5"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900">Kelola Agenda</h4>
                        <p class="text-xs text-gray-400 mt-0.5">Atur jadwal kegiatan GPS TangSel</p>
                        <span class="inline-flex items-center mt-2 px-2 py-0.5 rounded-full bg-gray-200 text-[10px] font-medium text-gray-500">Segera</span>
                    </div>
                </div>
                <div class="flex items-start gap-4 p-4 rounded-xl bg-gray-50 border border-gray-100">
                    <div class="w-9 h-9 rounded-lg bg-emerald-50 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M2.25 15.75l5.159-5.159a2.25 2.25 0 013.182 0l5.159 5.159m-1.5-1.5l1.409-1.409a2.25 2.25 0 013.182 0l2.909 2.909M3.75 21h16.5A2.25 2.25 0 0022.5 18.75V5.25A2.25 2.25 0 0020.25 3H3.75A2.25 2.25 0 001.5 5.25v13.5A2.25 2.25 0 003.75 21z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900">Kelola Galeri</h4>
                        <p class="text-xs text-gray-400 mt-0.5">Upload foto & video kegiatan</p>
                        <span class="inline-flex items-center mt-2 px-2 py-0.5 rounded-full bg-gray-200 text-[10px] font-medium text-gray-500">Segera</span>
                    </div>
                </div>
                <div class="flex items-start gap-4 p-4 rounded-xl bg-gray-50 border border-gray-100">
                    <div class="w-9 h-9 rounded-lg bg-amber-50 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-amber-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h4 class="text-sm font-semibold text-gray-900">Kelola Pengurus</h4>
                        <p class="text-xs text-gray-400 mt-0.5">Atur data pengurus & struktur</p>
                        <span class="inline-flex items-center mt-2 px-2 py-0.5 rounded-full bg-gray-200 text-[10px] font-medium text-gray-500">Segera</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="bg-white rounded-2xl border border-gray-100 p-6 sm:p-8">
            <h3 class="text-base font-bold text-gray-900 mb-5">Informasi</h3>
            <div class="space-y-4">
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-lg bg-primary/10 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-primary" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M11.25 11.25l.041-.02a.75.75 0 011.063.852l-.708 2.836a.75.75 0 001.063.853l.041-.021M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9-3.75h.008v.008H12V8.25z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400">Versi Aplikasi</p>
                        <p class="text-sm font-semibold text-gray-900">GPS TangSel v1.0</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-lg bg-gold/10 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-gold" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 6v6h4.5m4.5 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400">Login Terakhir</p>
                        <p class="text-sm font-semibold text-gray-900">{{ now()->translatedFormat('d M Y, H:i') }}</p>
                    </div>
                </div>
                <div class="flex items-start gap-3">
                    <div class="w-8 h-8 rounded-lg bg-emerald-50 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 text-emerald-600" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.8">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs text-gray-400">Status</p>
                        <p class="text-sm font-semibold text-emerald-600">Online</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
