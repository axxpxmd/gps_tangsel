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
            --color-gold: #D4A437;
            --color-gold-light: #F5E6B8;
            --color-dawn-night: #0A1633;
            --font-sans: 'Plus Jakarta Sans', 'Inter', ui-sans-serif, system-ui, sans-serif;
        }

        body {
            font-family: 'Plus Jakarta Sans', 'Inter', ui-sans-serif, system-ui, sans-serif;
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">
    <div class="min-h-screen flex items-center justify-center px-4">
        <div class="w-full max-w-md">
            <div class="text-center mb-8">
                <img src="{{ asset('logo-gps.png') }}" alt="GPS TangSel" class="w-16 h-16 mx-auto rounded-xl mb-4">
                <h1 class="text-2xl font-extrabold text-gray-900">GPS TangSel</h1>
                <p class="text-sm text-gray-500 mt-1">Content Management System</p>
            </div>

            <div class="bg-white rounded-2xl border border-gray-200 shadow-sm p-6 sm:p-8">
                @if ($errors->any())
                    <div class="bg-red-50 border border-red-200 rounded-xl p-4 mb-6">
                        <div class="flex items-center gap-2">
                            <svg class="w-5 h-5 text-red-500 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v3.75m9-.75a9 9 0 11-18 0 9 9 0 0118 0zm-9 3.75h.008v.008H12v-.008z"/>
                            </svg>
                            <p class="text-sm text-red-700">{{ $errors->first() }}</p>
                        </div>
                    </div>
                @endif

                <form action="{{ route('console.login') }}" method="POST">
                    @csrf

                    <div class="mb-4">
                        <label for="email" class="block text-sm font-semibold text-gray-700 mb-1.5">Email</label>
                        <input type="email" id="email" name="email" value="{{ old('email') }}" required autofocus class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all" placeholder="admin@gpstangsel.id">
                    </div>

                    <div class="mb-6">
                        <label for="password" class="block text-sm font-semibold text-gray-700 mb-1.5">Password</label>
                        <input type="password" id="password" name="password" required class="w-full px-4 py-2.5 rounded-xl border border-gray-200 text-sm text-gray-900 placeholder-gray-400 focus:outline-none focus:ring-2 focus:ring-primary/30 focus:border-primary transition-all" placeholder="Masukkan password">
                    </div>

                    <div class="flex items-center justify-between mb-6">
                        <label class="flex items-center gap-2 cursor-pointer">
                            <input type="checkbox" name="remember" class="w-4 h-4 rounded border-gray-300 text-primary focus:ring-primary">
                            <span class="text-sm text-gray-600">Ingat saya</span>
                        </label>
                    </div>

                    <button type="submit" class="w-full py-2.5 bg-primary text-white text-sm font-semibold rounded-xl hover:bg-primary-dark transition-colors duration-200">
                        Masuk
                    </button>
                </form>
            </div>

            <p class="text-center text-xs text-gray-400 mt-6">&copy; {{ date('Y') }} GPS Tangerang Selatan</p>
        </div>
    </div>
</body>
</html>
