@extends('console.layout')

@section('title', 'Profil Saya')
@section('page_title', 'Profil Saya')

@section('content')
<div>
    {{-- Header --}}
    <div class="flex items-center gap-3 mb-6">
        <div class="w-10 h-10 rounded-xl bg-gradient-to-br from-primary to-primary-dark flex items-center justify-center flex-shrink-0">
            <span class="material-symbols-rounded text-white text-[20px]">person</span>
        </div>
        <div>
            <h2 class="text-lg font-extrabold text-gray-900">Profil Saya</h2>
            <p class="text-xs text-gray-400 mt-0.5">Kelola informasi akun dan keamanan</p>
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

    <div class="grid grid-cols-1 xl:grid-cols-3 gap-5">
        {{-- Left — User Info Card --}}
        <div class="xl:col-span-1">
            <div class="bg-white rounded-2xl border border-gray-200 p-6 text-center">
                <div class="w-20 h-20 mx-auto rounded-full bg-gradient-to-br from-gold to-amber-600 flex items-center justify-center text-2xl font-bold text-white shadow-lg mb-4">
                    {{ auth()->user()->initials() }}
                </div>
                <h3 class="text-base font-extrabold text-gray-900 mb-0.5">{{ auth()->user()->name }}</h3>
                <p class="text-xs text-gray-400 mb-4">{{ '@'.auth()->user()->username }}</p>
                <div class="border-t border-gray-100 pt-4">
                    <div class="flex items-center justify-center gap-2 text-xs text-gray-500">
                        <svg class="w-3.5 h-3.5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21.75 6.75v10.5a2.25 2.25 0 01-2.25 2.25h-15a2.25 2.25 0 01-2.25-2.25V6.75m19.5 0A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25m19.5 0v.243a2.25 2.25 0 01-1.07 1.916l-7.5 4.615a2.25 2.25 0 01-2.36 0L3.32 8.91a2.25 2.25 0 01-1.07-1.916V6.75"/>
                        </svg>
                        {{ auth()->user()->email }}
                    </div>
                </div>
                <div class="mt-4 pt-4 border-t border-gray-100">
                    <p class="text-[11px] text-gray-400">Bergabung sejak</p>
                    <p class="text-xs text-gray-600 font-medium mt-1">{{ auth()->user()->created_at->translatedFormat('d F Y') }}</p>
                </div>
            </div>
        </div>

        {{-- Right — Forms --}}
        <div class="xl:col-span-2 space-y-5">
            {{-- Update Profile --}}
            <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
                <div class="flex items-center gap-2.5 px-6 py-4 border-b border-gray-100">
                    <div class="w-8 h-8 rounded-lg bg-primary-light flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-rounded text-primary text-[18px]">edit</span>
                    </div>
                    <span class="text-sm font-bold text-gray-800">Informasi Profil</span>
                </div>
                <form action="{{ route('console.profile.update') }}" method="POST" class="p-6">
                    @csrf
                    @method('PATCH')
                    <div class="space-y-4">
                        <div>
                            <label for="name" class="block text-xs font-semibold text-gray-700 mb-1.5">Nama Lengkap</label>
                            <input type="text" id="name" name="name" value="{{ old('name', auth()->user()->name) }}"
                                class="w-full px-3.5 py-2.5 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all @error('name') border-red-300 @enderror">
                            @error('name')
                                <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="username" class="block text-xs font-semibold text-gray-700 mb-1.5">Username</label>
                            <input type="text" id="username" name="username" value="{{ old('username', auth()->user()->username) }}"
                                class="w-full px-3.5 py-2.5 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all @error('username') border-red-300 @enderror">
                            @error('username')
                                <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="email" class="block text-xs font-semibold text-gray-700 mb-1.5">Email</label>
                            <input type="email" id="email" name="email" value="{{ old('email', auth()->user()->email) }}"
                                class="w-full px-3.5 py-2.5 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all @error('email') border-red-300 @enderror">
                            @error('email')
                                <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <button type="submit" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-colors duration-200">
                            <span class="material-symbols-rounded text-[18px]">save</span>
                            Simpan Perubahan
                        </button>
                    </div>
                </form>
            </div>

            {{-- Change Password --}}
            <div class="bg-white rounded-2xl border border-gray-200 overflow-hidden">
                <div class="flex items-center gap-2.5 px-6 py-4 border-b border-gray-100">
                    <div class="w-8 h-8 rounded-lg bg-amber-50 flex items-center justify-center flex-shrink-0">
                        <span class="material-symbols-rounded text-amber-500 text-[18px]">lock</span>
                    </div>
                    <span class="text-sm font-bold text-gray-800">Ubah Password</span>
                </div>
                <form action="{{ route('console.profile.password') }}" method="POST" class="p-6">
                    @csrf
                    @method('PATCH')
                    <div class="space-y-4">
                        <div>
                            <label for="current_password" class="block text-xs font-semibold text-gray-700 mb-1.5">Password Saat Ini</label>
                            <input type="password" id="current_password" name="current_password"
                                class="w-full px-3.5 py-2.5 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all @error('current_password') border-red-300 @enderror">
                            @error('current_password')
                                <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password" class="block text-xs font-semibold text-gray-700 mb-1.5">Password Baru</label>
                            <input type="password" id="password" name="password"
                                class="w-full px-3.5 py-2.5 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all @error('password') border-red-300 @enderror">
                            @error('password')
                                <p class="text-xs text-red-500 mt-1.5">{{ $message }}</p>
                            @enderror
                        </div>
                        <div>
                            <label for="password_confirmation" class="block text-xs font-semibold text-gray-700 mb-1.5">Konfirmasi Password Baru</label>
                            <input type="password" id="password_confirmation" name="password_confirmation"
                                class="w-full px-3.5 py-2.5 text-sm border border-gray-200 rounded-xl focus:outline-none focus:ring-2 focus:ring-primary/20 focus:border-primary transition-all">
                        </div>
                    </div>
                    <div class="mt-6 flex justify-end">
                        <button type="submit" class="inline-flex items-center justify-center gap-2 px-5 py-2.5 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-colors duration-200">
                            <span class="material-symbols-rounded text-[18px]">lock_reset</span>
                            Ubah Password
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
