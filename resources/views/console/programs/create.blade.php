@extends('console.layout')

@section('title', 'Tambah Program')
@section('page_title', 'Tambah Program')

@section('content')
<div class="max-w-3xl mx-auto">
    <form action="{{ route('console.programs.store') }}" method="POST">
        @csrf
        @include('console.programs._form')

        <div class="flex items-center justify-between mt-8">
            <a href="{{ route('console.programs.index') }}" class="inline-flex items-center gap-2 px-4 py-2.5 text-sm font-semibold text-gray-600 hover:text-gray-900 transition-colors duration-200">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18"/>
                </svg>
                Kembali
            </a>
            <button type="submit" class="inline-flex items-center gap-2 px-6 py-2.5 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-colors duration-200 shadow-sm">
                <svg class="w-4 h-4" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.5v15m7.5-7.5h-15"/>
                </svg>
                Simpan Program
            </button>
        </div>
    </form>
</div>
@endsection
