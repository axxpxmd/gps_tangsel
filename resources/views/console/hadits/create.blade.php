@extends('console.layout')

@section('title', 'Tambah Hadits')
@section('page_title', 'Tambah Hadits')

@section('content')
<div class="max-w-3xl mx-auto">
    <div class="flex items-center justify-between mb-6">
        <div class="flex items-center gap-3">
            <div class="w-9 h-9 rounded-xl bg-gradient-to-br from-emerald-500 to-emerald-600 flex items-center justify-center shadow-sm">
                <svg class="w-4 h-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>
            </div>
            <div><h2 class="text-base font-extrabold text-gray-900">Tambah Hadits</h2><p class="text-xs text-gray-400">Tambahkan hadits pilihan baru</p></div>
        </div>
        <a href="{{ route('console.hadits.index') }}" class="inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 hover:text-gray-900 transition-colors duration-200"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/></svg>Kembali</a>
    </div>

    <form action="{{ route('console.hadits.store') }}" method="POST">
        @csrf
        @include('console.hadits._form')
        <div class="flex items-center gap-3 mt-6">
            <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-colors duration-200 shadow-sm shadow-primary/20"><svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/></svg>Simpan Hadits</button>
            <a href="{{ route('console.hadits.index') }}" class="px-4 py-2.5 text-sm font-semibold text-gray-500 hover:text-gray-900 transition-colors duration-200">Batal</a>
        </div>
    </form>
</div>
@endsection
