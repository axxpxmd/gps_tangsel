<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Login — CMS GPS TangSel</title>

    <link rel="icon" href="{{ asset('logo-gps.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <style type="text/tailwindcss">
        @theme {
            --color-primary: #2F5FA3;
            --color-primary-dark: #244B82;
            --color-primary-light: #E8EEF7;
            --color-gold: #D4A437;
            --color-gold-light: #F5E6B8;
            --color-dawn-night: #0A1633;
            --color-dawn-deep: #1E2A5E;
            --font-sans: 'Plus Jakarta Sans', 'Inter', ui-sans-serif, system-ui, sans-serif;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Inter', ui-sans-serif, system-ui, sans-serif;
        }
    </style>
</head>
<body class="antialiased min-h-screen flex bg-gray-50">
    {{-- Left Panel — Branding --}}
    <div class="hidden lg:flex lg:w-1/2 bg-gradient-to-br from-dawn-night via-primary-dark to-dawn-deep relative overflow-hidden items-center justify-center">
        <div class="absolute inset-0 islamic-pattern opacity-[0.03]"></div>
        <div class="absolute -top-40 -right-40 w-96 h-96 bg-primary/20 rounded-full blur-3xl"></div>
        <div class="absolute -bottom-40 -left-40 w-96 h-96 bg-gold/10 rounded-full blur-3xl"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[600px] h-[600px] bg-gold/5 rounded-full blur-3xl"></div>

        <div class="relative text-center px-8 max-w-md">
            <img src="{{ asset('logo-gps.png') }}" alt="GPS TangSel" class="w-24 h-24 mx-auto rounded-2xl shadow-2xl shadow-black/30 mb-8 ring-4 ring-white/10">
            <h1 class="text-3xl font-extrabold text-white tracking-tight mb-3">GPS Tangerang Selatan</h1>
            <p class="text-white/50 text-sm mb-8 leading-relaxed">Gerakan Pejuang Subuh — Content Management System</p>

            <div class="flex justify-center gap-3 opacity-50">
                <div class="w-2 h-2 rounded-full bg-gold animate-pulse"></div>
                <div class="w-2 h-2 rounded-full bg-gold animate-pulse" style="animation-delay: 0.2s"></div>
                <div class="w-2 h-2 rounded-full bg-gold animate-pulse" style="animation-delay: 0.4s"></div>
            </div>
        </div>
    </div>

    {{-- Right Panel — Login Form --}}
    <div class="flex-1 flex items-center justify-center px-4 sm:px-8 py-12">
        <div class="w-full max-w-md">
            {{-- Mobile Logo --}}
            <div class="lg:hidden text-center mb-8">
                <img src="{{ asset('logo-gps.png') }}" alt="GPS TangSel" class="w-16 h-16 mx-auto rounded-xl mb-3">
                <h1 class="text-xl font-extrabold text-gray-900">GPS TangSel</h1>
                <p class="text-xs text-gray-400 mt-0.5">Content Management System</p>
            </div>

            <div class="mb-6">
                <h2 class="text-2xl font-extrabold text-gray-900">Selamat Datang</h2>
                <p class="text-sm text-gray-500 mt-1">Masuk untuk mengelola konten website.</p>
            </div>

            @if ($errors->any())
                <div class="flex items-start gap-3 bg-red-50 border border-red-200 rounded-2xl p-4 mb-6">
                    <div class="w-9 h-9 rounded-xl bg-red-100 flex items-center justify-center flex-shrink-0">
                        <svg class="w-5 h-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-semibold text-red-700">Login Gagal</p>
                        <p class="text-xs text-red-500 mt-0.5">{{ $errors->first() }}</p>
                    </div>
                </div>
            @endif

            <form action="{{ route('console.login') }}" method="POST">
                @csrf

                <div class="space-y-4">
                    <div>
                        <label for="username" class="block text-sm font-semibold text-gray-700 mb-1.5">Username</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                </svg>
                            </div>
                            <input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus
                                class="w-full pl-11 pr-4 py-3 rounded-2xl border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all bg-gray-50 focus:bg-white"
                                placeholder="admin">
                        </div>
                    </div>

                    <div>
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-1.5">Password</label>
                        <div class="relative">
                            <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                <svg class="w-5 h-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                                </svg>
                            </div>
                            <input type="password" id="password" name="password" required
                                class="w-full pl-11 pr-4 py-3 rounded-2xl border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all bg-gray-50 focus:bg-white"
                                placeholder="Masukkan password">
                        </div>
                    </div>
                </div>

                <div class="flex items-center justify-between mt-5 mb-6">
                    <label class="flex items-center gap-2.5 cursor-pointer">
                        <input type="checkbox" name="remember"
                            class="w-4 h-4 rounded-md border-gray-300 text-primary focus:ring-primary/30 transition-all">
                        <span class="text-sm text-gray-600">Ingat saya</span>
                    </label>
                </div>

                <button type="submit"
                    class="w-full py-3 bg-gradient-to-r from-primary to-primary-dark text-white text-sm font-bold rounded-2xl hover:-translate-y-0.5 transition-all duration-200 flex items-center justify-center gap-2">
                    <svg class="w-5 h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/>
                    </svg>
                    Masuk
                </button>
            </form>

            <p class="text-center text-xs text-gray-400 mt-8">&copy; {{ date('Y') }} GPS Tangerang Selatan. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
