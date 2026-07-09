@extends('console.layout')

@section('title', 'Edit Program')
@section('page_title', 'Edit Program')

@section('content')
<div class="max-w-3xl mx-auto">
    <form action="{{ route('console.programs.update', $program) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
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
                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0A4.987 4.987 0 012.985 15m11.998-7.7c.375-.483.807-.955 1.293-1.39M5.1 7.5c-.176-.36-.322-.73-.438-1.107M5.1 7.5l5.4 5.4M5.1 7.5A11.998 11.998 0 004.285 12c0 1.55.294 3.032.83 4.4"/>
                </svg>
                Perbarui Program
            </button>
        </div>
    </form>
</div>
@endsection
