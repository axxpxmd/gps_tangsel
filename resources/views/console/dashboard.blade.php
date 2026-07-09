@extends('console.layout')

@section('title', 'Dashboard')
@section('page_title', 'Dashboard')

@section('content')
<div class="max-w-4xl">
    <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-8 sm:p-10">
        <div class="flex items-center gap-4 mb-6">
            <div class="w-14 h-14 rounded-2xl bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center">
                <svg class="w-7 h-7 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M9.813 15.904L9 18.75l-.813-2.846a4.5 4.5 0 00-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 003.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 003.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 00-3.09 3.09zM18.259 8.715L18 9.75l-.259-1.035a3.375 3.375 0 00-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 002.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 002.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 00-2.456 2.456zM16.894 20.567L16.5 21.75l-.394-1.183a2.25 2.25 0 00-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 001.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 001.423 1.423l1.183.394-1.183.394a2.25 2.25 0 00-1.423 1.423z"/>
                </svg>
            </div>
            <div>
                <h2 class="text-xl font-extrabold text-gray-900">Selamat Datang, {{ auth()->user()->name }}!</h2>
                <p class="text-sm text-gray-500 mt-0.5">Content Management System GPS Tangerang Selatan</p>
            </div>
        </div>

        <div class="border-t border-gray-100 pt-6">
            <p class="text-sm text-gray-500">
                Dari halaman ini Anda dapat mengelola seluruh konten website GPS TangSel. Fitur-fitur CMS akan segera ditambahkan.
            </p>
        </div>
    </div>
</div>
@endsection
