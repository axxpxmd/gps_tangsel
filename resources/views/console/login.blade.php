<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="robots" content="noindex, nofollow">
    <title>Login — CMS GPS TANGSEL</title>

    <link rel="icon" href="{{ asset('logo-gps.png') }}" type="image/png">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/@tailwindcss/browser@4"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
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

        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-12px); }
        }

        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(8px); }
            to { opacity: 1; transform: translateY(0); }
        }

        @keyframes fadeInLeft {
            from { opacity: 0; transform: translateX(-16px); }
            to { opacity: 1; transform: translateX(0); }
        }

        @keyframes fadeInUp {
            from { opacity: 0; transform: translateY(24px); }
            to { opacity: 1; transform: translateY(0); }
        }

        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }

        .animate-fade-in-delay {
            opacity: 0;
            animation: fadeIn 0.5s ease-out 0.15s forwards;
        }

        .animate-fade-in-delay-2 {
            opacity: 0;
            animation: fadeIn 0.5s ease-out 0.3s forwards;
        }

        .animate-fade-in-up {
            opacity: 0;
            animation: fadeInUp 0.6s ease-out forwards;
        }

        .animate-fade-in-left {
            animation: fadeInLeft 0.6s ease-out forwards;
        }

        .animate-float {
            animation: float 4s ease-in-out infinite;
        }

        .islamic-pattern {
            background-image: url("data:image/svg+xml,%3Csvg width='60' height='60' viewBox='0 0 60 60' xmlns='http://www.w3.org/2000/svg'%3E%3Cg fill='none' fill-rule='evenodd'%3E%3Cg fill='%23ffffff' fill-opacity='0.06'%3E%3Cpath d='M36 34v-4h-2v4h-4v2h4v4h2v-4h4v-2h-4zm0-30V0h-2v4h-4v2h4v4h2V6h4V4h-4zM6 34v-4H4v4H0v2h4v4h2v-4h4v-2H6zM6 4V0H4v4H0v2h4v4h2V6h4V4H6z'/%3E%3C/g%3E%3C/g%3E%3C/svg%3E");
        }
    </style>
</head>
<body class="antialiased min-h-screen flex flex-col lg:flex-row bg-[#F5F5F5]">

    {{-- Top accent bar (mobile/tablet only, to compensate for missing left panel) --}}
    <div class="lg:hidden w-full h-2 bg-gradient-to-r from-primary via-primary-dark to-dawn-deep flex-shrink-0"></div>

    {{-- Left Panel — Branding (desktop only) --}}
    <div class="hidden lg:flex lg:w-[46%] xl:w-1/2 bg-gradient-to-br from-dawn-night via-primary-dark to-dawn-deep relative overflow-hidden items-center justify-center">
        <div class="absolute inset-0 islamic-pattern"></div>

        <div class="absolute -top-52 -right-52 w-[500px] h-[500px] bg-gradient-to-br from-primary/30 to-primary/10 rounded-full blur-[80px]"></div>
        <div class="absolute -bottom-52 -left-52 w-[500px] h-[500px] bg-gradient-to-tr from-gold/15 to-gold/5 rounded-full blur-[80px]"></div>
        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-[700px] h-[700px] bg-gradient-to-br from-gold/8 via-primary/10 to-transparent rounded-full blur-[100px]"></div>

        <div class="absolute top-[18%] right-[25%] w-14 lg:w-20 h-14 lg:h-20 border border-white/[0.06] rounded-3xl rotate-12 animate-float"></div>
        <div class="absolute bottom-[22%] left-[20%] w-10 lg:w-14 h-10 lg:h-14 border border-white/[0.05] rounded-2xl -rotate-6 animate-float" style="animation-delay: 1.5s"></div>
        <div class="absolute top-[45%] left-[10%] w-6 lg:w-8 h-6 lg:h-8 bg-white/[0.04] rounded-xl rotate-45 animate-float" style="animation-delay: 3s"></div>

        <div class="relative text-center px-6 lg:px-8 xl:px-10 max-w-lg animate-fade-in-left">
            <div class="inline-flex items-center justify-center w-20 h-20 lg:w-24 lg:h-24 xl:w-28 xl:h-28 rounded-2xl lg:rounded-3xl bg-white/10 backdrop-blur-sm ring-4 ring-white/[0.08] shadow-2xl shadow-black/30 mb-6 lg:mb-8 xl:mb-10 relative">
                <img src="{{ asset('logo-gps.png') }}" alt="GPS TANGSEL" class="w-14 h-14 lg:w-16 lg:h-16 xl:w-20 xl:h-20 rounded-xl lg:rounded-2xl relative z-10">
                <div class="absolute inset-0 rounded-2xl lg:rounded-3xl bg-gradient-to-br from-gold/20 to-transparent"></div>
            </div>

            <h1 class="text-2xl lg:text-3xl xl:text-5xl font-extrabold text-white tracking-tight mb-3 lg:mb-4 leading-tight">
                GPS Tangerang<br>Selatan
            </h1>
            <div class="w-12 lg:w-16 h-1 bg-gold/60 rounded-full mx-auto mb-4 lg:mb-6"></div>
            <p class="text-white/40 text-sm lg:text-base mb-6 lg:mb-10 leading-relaxed max-w-sm mx-auto">Gerakan Pejuang Subuh — Content Management System</p>

            <div class="flex justify-center gap-3">
                <div class="w-2 h-2 rounded-full bg-gold/70"></div>
                <div class="w-2 h-2 rounded-full bg-gold/50"></div>
                <div class="w-2 h-2 rounded-full bg-gold/30"></div>
            </div>
        </div>
    </div>

    {{-- Right Panel — Login Form --}}
    <div class="flex-1 flex items-center justify-center px-4 sm:px-6 md:px-12 lg:px-8 xl:px-12 py-6 sm:py-8 md:py-12 bg-[#F5F5F5]">
        <div class="w-full max-w-sm sm:max-w-md lg:max-w-[420px]">

            {{-- Mobile/Tablet Logo --}}
            <div class="lg:hidden text-center mb-6 sm:mb-8 md:mb-10">
                <div class="inline-flex items-center justify-center w-14 h-14 sm:w-16 sm:h-16 rounded-2xl bg-gradient-to-br from-primary/10 to-primary-light mb-3 sm:mb-4">
                    <img src="{{ asset('logo-gps.png') }}" alt="GPS TANGSEL" class="w-9 h-9 sm:w-10 sm:h-10 rounded-xl">
                </div>
                <h1 class="text-lg sm:text-xl font-extrabold text-gray-900">GPS TANGSEL</h1>
                <p class="text-xs text-gray-400 mt-1">Content Management System</p>
            </div>

            {{-- Heading --}}
            <div class="mb-6 sm:mb-8 text-center animate-fade-in">
                <h2 class="text-2xl sm:text-3xl font-extrabold text-dawn-night tracking-tight">Selamat Datang Kembali</h2>
                <p class="text-xs sm:text-sm text-gray-500 mt-1.5 sm:mt-2">Silakan masuk untuk mengelola portal GPS TANGSEL.</p>
                <div class="w-8 h-1 bg-gradient-to-r from-primary to-gold rounded-full mx-auto mt-3"></div>
            </div>

            {{-- Error Alert --}}
            @if ($errors->any())
                <div class="flex items-start gap-2.5 sm:gap-3 bg-red-50 border border-red-200 rounded-2xl p-3 sm:p-4 mb-5 sm:mb-6 animate-fade-in">
                    <div class="w-8 h-8 sm:w-10 sm:h-10 rounded-xl bg-red-100 flex items-center justify-center flex-shrink-0">
                        <svg class="w-4 h-4 sm:w-5 sm:h-5 text-red-500" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-xs sm:text-sm font-semibold text-red-700">Login Gagal</p>
                        <p class="text-[11px] sm:text-xs text-red-500 mt-0.5">{{ $errors->first() }}</p>
                    </div>
                </div>
            @endif

            {{-- Card --}}
            <div class="bg-white/90 backdrop-blur-xl rounded-2xl sm:rounded-3xl shadow-xl shadow-slate-200/50 border border-white/60 p-4 sm:p-6 md:p-8 animate-fade-in-up"
                x-data="{
                    showPassword: false,
                    loading: false,
                    captchaQuestion: '{{ $captchaQuestion }}',
                    async refreshCaptcha() {
                        const res = await fetch('{{ route('console.login.captcha') }}');
                        const data = await res.json();
                        this.captchaQuestion = data.question;
                        document.getElementById('captcha').value = '';
                    }
                }">
                <form action="{{ route('console.login') }}" method="POST" @submit="loading = true">
                    @csrf

                    <div class="space-y-4 sm:space-y-5">
                        {{-- Username --}}
                        <div>
                            <label for="username" class="block text-xs sm:text-sm font-semibold text-gray-700 mb-1.5 sm:mb-2">Username</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-400 group-focus-within:text-primary transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"/>
                                    </svg>
                                </div>
                                <input type="text" id="username" name="username" value="{{ old('username') }}" required autofocus
                                    class="w-full pl-9 sm:pl-12 pr-3 sm:pr-4 py-3 sm:py-3.5 rounded-xl sm:rounded-2xl border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all bg-gray-50 focus:bg-white hover:border-gray-300"
                                    placeholder="Masukkan username">
                            </div>
                        </div>

                        {{-- Password --}}
                        <div>
                            <label for="password" class="block text-xs sm:text-sm font-semibold text-gray-700 mb-1.5 sm:mb-2">Password</label>
                            <div class="relative group">
                                <div class="absolute inset-y-0 left-0 pl-3 sm:pl-4 flex items-center pointer-events-none">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5 text-gray-400 group-focus-within:text-primary transition-colors" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.5 10.5V6.75a4.5 4.5 0 10-9 0v3.75m-.75 11.25h10.5a2.25 2.25 0 002.25-2.25v-6.75a2.25 2.25 0 00-2.25-2.25H6.75a2.25 2.25 0 00-2.25 2.25v6.75a2.25 2.25 0 002.25 2.25z"/>
                                    </svg>
                                </div>
                                <input :type="showPassword ? 'text' : 'password'" id="password" name="password" required
                                    class="w-full pl-9 sm:pl-12 pr-10 sm:pr-12 py-3 sm:py-3.5 rounded-xl sm:rounded-2xl border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all bg-gray-50 focus:bg-white hover:border-gray-300"
                                    placeholder="Masukkan password">
                                <button type="button" @click="showPassword = !showPassword"
                                    class="absolute inset-y-0 right-0 pr-3 sm:pr-4 flex items-center text-gray-400 hover:text-gray-600 transition-colors">
                                    <svg x-show="!showPassword" class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M2.036 12.322a1.012 1.012 0 010-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    </svg>
                                    <svg x-show="showPassword" class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="1.5">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.98 8.223A10.477 10.477 0 001.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.45 10.45 0 0112 4.5c4.756 0 8.773 3.162 10.065 7.498a10.523 10.523 0 01-4.293 5.774M6.228 6.228L3 3m3.228 3.228l3.65 3.65m7.894 7.894L21 21m-3.228-3.228l-3.65-3.65m0 0a3 3 0 10-4.243-4.243m4.242 4.242L9.88 9.88"/>
                                    </svg>
                                </button>
                            </div>
                        </div>
                    </div>

                    {{-- Captcha --}}
                    <div class="mt-4 sm:mt-5">
                        <label for="captcha" class="block text-xs sm:text-sm font-semibold text-gray-700 mb-1.5 sm:mb-2">Verifikasi Captcha</label>
                        <div class="flex items-center gap-2.5 sm:gap-3">
                            <div class="flex items-center gap-2">
                                <div class="px-3 sm:px-4 py-2.5 sm:py-3 rounded-xl sm:rounded-2xl bg-primary-light border border-primary/20 text-sm sm:text-base font-bold text-primary tracking-wider select-none whitespace-nowrap" x-text="captchaQuestion">{{ $captchaQuestion }}</div>
                                <button type="button" @click="refreshCaptcha()" class="p-2 rounded-lg text-gray-400 hover:text-primary hover:bg-primary-light transition-all" title="Refresh captcha">
                                    <svg class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182"/>
                                    </svg>
                                </button>
                            </div>
                            <input type="number" id="captcha" name="captcha" required
                                class="w-24 sm:w-28 px-3 sm:px-4 py-2.5 sm:py-3 rounded-xl sm:rounded-2xl border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-4 focus:ring-primary/10 focus:border-primary transition-all bg-gray-50 focus:bg-white hover:border-gray-300 text-center"
                                placeholder="Jawab">
                        </div>
                        @error('captcha')
                            <p class="text-[11px] sm:text-xs text-red-500 mt-1">{{ $message }}</p>
                        @enderror
                    </div>

                    {{-- Submit Button --}}
                    <div class="mt-6">
                        <button type="submit"
                            class="w-full py-3.5 bg-gradient-to-r from-primary to-primary-dark text-white text-xs sm:text-sm font-bold rounded-xl sm:rounded-2xl hover:shadow-lg hover:shadow-primary/25 hover:-translate-y-0.5 active:translate-y-0 transition-all duration-200 flex items-center justify-center gap-2 sm:gap-2.5 tracking-wide disabled:opacity-60 disabled:cursor-not-allowed disabled:hover:translate-y-0"
                            :disabled="loading">
                            <svg x-show="!loading" class="w-4 h-4 sm:w-5 sm:h-5" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M15.75 9V5.25A2.25 2.25 0 0013.5 3h-6a2.25 2.25 0 00-2.25 2.25v13.5A2.25 2.25 0 007.5 21h6a2.25 2.25 0 002.25-2.25V15M12 9l-3 3m0 0l3 3m-3-3h12.75"/>
                            </svg>
                            <svg x-show="loading" class="w-4 h-4 sm:w-5 sm:h-5 animate-spin" fill="none" viewBox="0 0 24 24">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                            </svg>
                            <span x-text="loading ? 'Memproses...' : 'Masuk'"></span>
                        </button>
                    </div>
                </form>
            </div>

            {{-- Footer --}}
            <p class="text-center text-[10px] sm:text-xs text-gray-400 mt-6 sm:mt-8">&copy; {{ date('Y') }} GPS Tangerang Selatan. All rights reserved.</p>
        </div>
    </div>

</body>
</html>
