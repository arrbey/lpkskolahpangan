<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login Admin - LPK Skolah Pangan</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@600;700;800&display=swap" rel="stylesheet">
    
    <!-- Vite CSS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        h1, h2 {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-100 min-h-screen flex items-center justify-center p-4">

    <div class="max-w-md w-full bg-white rounded-2xl shadow-xl shadow-slate-200 border border-slate-200/60 overflow-hidden">
        <!-- Logo & Header -->
        <div class="p-8 pb-4 text-center bg-slate-50 border-b border-slate-100">
            <div class="inline-flex items-center justify-center bg-primary-green text-white p-3 rounded-2xl shadow-md shadow-primary-green/20 mb-3">
                <i data-lucide="leaf" class="w-8 h-8"></i>
            </div>
            <h1 class="text-2xl font-extrabold text-primary-dark">Skolah Pangan</h1>
            <p class="text-sm text-slate-500 mt-1">CMS Administration Login</p>
        </div>

        <!-- Form Body -->
        <div class="p-8">
            <!-- Errors Alert -->
            @if ($errors->any())
                <div class="mb-6 p-4 bg-rose-50 border border-rose-100 text-rose-800 rounded-xl text-sm flex items-start space-x-3">
                    <i data-lucide="alert-circle" class="w-5 h-5 text-rose-600 flex-shrink-0 mt-0.5"></i>
                    <div>
                        <span class="font-semibold block mb-0.5">Login Gagal</span>
                        <span class="text-slate-600">{{ $errors->first() }}</span>
                    </div>
                </div>
            @endif

            <form action="{{ route('admin.login.submit') }}" method="POST" class="space-y-6">
                @csrf
                <div>
                    <label for="email" class="block text-sm font-semibold text-slate-700 mb-2">Email Address</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 pointer-events-none">
                            <i data-lucide="mail" class="w-5 h-5"></i>
                        </span>
                        <input type="email" name="email" id="email" required value="{{ old('email') }}" class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-150" placeholder="admin@skolahpangan.com">
                    </div>
                </div>

                <div>
                    <label for="password" class="block text-sm font-semibold text-slate-700 mb-2">Password</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3.5 flex items-center text-slate-400 pointer-events-none">
                            <i data-lucide="lock" class="w-5 h-5"></i>
                        </span>
                        <input type="password" name="password" id="password" required class="block w-full pl-11 pr-4 py-3 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:outline-none focus:ring-2 focus:ring-primary-green focus:border-transparent transition duration-150" placeholder="••••••••">
                    </div>
                </div>

                <div>
                    <button type="submit" class="w-full inline-flex items-center justify-center px-4 py-3 border border-transparent text-sm font-bold rounded-xl text-white bg-primary-green hover:bg-primary-green/90 shadow-lg shadow-primary-green/20 hover:shadow-xl transition-all duration-150 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-primary-green">
                        Masuk Dashboard
                    </button>
                </div>
            </form>
        </div>
        
        <!-- Footer -->
        <div class="px-8 py-4 bg-slate-50 border-t border-slate-100 text-center text-xs text-slate-400">
            <a href="{{ route('home') }}" class="hover:text-primary-green font-medium inline-flex items-center space-x-1">
                <i data-lucide="arrow-left" class="w-3.5 h-3.5"></i>
                <span>Kembali ke Website</span>
            </a>
        </div>
    </div>

    <!-- Init Lucide Icons -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.lucide) {
                lucide.createIcons();
            }
        });
    </script>
</body>
</html>
