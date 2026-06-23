<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Dashboard - {{ $settings['site_name'] ?? 'LPK Skolah Pangan' }}</title>
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Vite CSS/JS -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
    
    <!-- Lucide Icons CDN -->
    <script src="https://unpkg.com/lucide@latest"></script>

    <style>
        body {
            font-family: 'Inter', sans-serif;
        }
        h1, h2, h3, h4, h5, h6 {
            font-family: 'Plus Jakarta Sans', sans-serif;
        }
    </style>
</head>
<body class="bg-slate-100 text-slate-800 antialiased min-h-screen flex flex-col">

    <!-- Header / Navbar for mobile view toggles -->
    <header class="bg-white border-b border-slate-200 sticky top-0 z-30 px-6 py-4 flex items-center justify-between">
        <div class="flex items-center space-x-3">
            <div class="bg-primary-green text-white p-2 rounded-lg">
                <i data-lucide="layout-dashboard" class="w-5 h-5"></i>
            </div>
            <div>
                <h1 class="font-bold text-lg text-primary-dark">Admin Panel</h1>
                <p class="text-xs text-slate-500">LPK Skolah Pangan CMS</p>
            </div>
        </div>
        
        <div class="flex items-center space-x-4">
            <div class="hidden sm:block text-right">
                <p class="text-sm font-semibold">{{ Auth::user()->name }}</p>
                <p class="text-xs text-slate-500 capitalize">{{ Auth::user()->role }}</p>
            </div>
            
            <form action="{{ route('admin.logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="inline-flex items-center justify-center p-2.5 bg-rose-50 hover:bg-rose-100 text-rose-600 rounded-xl transition duration-150" title="Keluar">
                    <i data-lucide="log-out" class="w-5 h-5"></i>
                </button>
            </form>
        </div>
    </header>

    <div class="flex flex-1 flex-col md:flex-row">
        <!-- Sidebar Navigation -->
        <aside class="w-full md:w-64 bg-white border-r border-slate-200 p-6 flex flex-col space-y-2 md:sticky md:top-20 md:h-[calc(100vh-5rem)]">
            <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mb-2">Utama</p>
            <a href="{{ route('admin.dashboard') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition duration-150 {{ Request::is('admin') || Request::is('admin/dashboard') ? 'bg-primary-light text-primary-green font-semibold' : 'hover:bg-slate-50 text-slate-600' }}">
                <i data-lucide="home" class="w-5 h-5"></i>
                <span>Ringkasan</span>
            </a>
            <a href="{{ route('admin.messages.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition duration-150 {{ Request::is('admin/messages*') ? 'bg-primary-light text-primary-green font-semibold' : 'hover:bg-slate-50 text-slate-600' }}">
                <i data-lucide="inbox" class="w-5 h-5"></i>
                <span>Pesan Masuk</span>
            </a>
            
            <p class="text-xs font-semibold text-slate-400 uppercase tracking-wider mt-6 mb-2">Pengaturan Halaman</p>
            <a href="{{ route('admin.settings') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition duration-150 {{ Request::is('admin/settings*') ? 'bg-primary-light text-primary-green font-semibold' : 'hover:bg-slate-50 text-slate-600' }}">
                <i data-lucide="settings" class="w-5 h-5"></i>
                <span>Konfigurasi Global</span>
            </a>
            <a href="{{ route('admin.why-us.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition duration-150 {{ Request::is('admin/why-us*') ? 'bg-primary-light text-primary-green font-semibold' : 'hover:bg-slate-50 text-slate-600' }}">
                <i data-lucide="check-square" class="w-5 h-5"></i>
                <span>Keunggulan (Why Us)</span>
            </a>
            <a href="{{ route('admin.programs.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition duration-150 {{ Request::is('admin/programs*') ? 'bg-primary-light text-primary-green font-semibold' : 'hover:bg-slate-50 text-slate-600' }}">
                <i data-lucide="award" class="w-5 h-5"></i>
                <span>Program Pelatihan</span>
            </a>
            <a href="{{ route('admin.brochures.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition duration-150 {{ Request::is('admin/brochures*') ? 'bg-primary-light text-primary-green font-semibold' : 'hover:bg-slate-50 text-slate-600' }}">
                <i data-lucide="file-text" class="w-5 h-5"></i>
                <span>Brosur & Pelatihan</span>
            </a>
            <a href="{{ route('admin.faqs.index') }}" class="flex items-center space-x-3 px-4 py-3 rounded-xl transition duration-150 {{ Request::is('admin/faqs*') ? 'bg-primary-light text-primary-green font-semibold' : 'hover:bg-slate-50 text-slate-600' }}">
                <i data-lucide="help-circle" class="w-5 h-5"></i>
                <span>FAQ Accordion</span>
            </a>

            <div class="pt-8 mt-auto hidden md:block">
                <a href="{{ route('home') }}" target="_blank" class="flex items-center space-x-3 px-4 py-2 text-xs font-semibold text-primary-green hover:underline">
                    <i data-lucide="external-link" class="w-4 h-4"></i>
                    <span>Buka Halaman Publik</span>
                </a>
            </div>
        </aside>

        <!-- Main Content Area -->
        <main class="flex-1 p-6 md:p-8 max-w-7xl mx-auto w-full">
            <!-- Flash Notification -->
            @if(session('success'))
                <div class="mb-6 p-4 bg-emerald-50 border border-emerald-200 text-emerald-800 rounded-xl flex items-center space-x-3">
                    <i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-600"></i>
                    <span class="text-sm font-medium">{{ session('success') }}</span>
                </div>
            @endif

            @if($errors->any())
                <div class="mb-6 p-4 bg-rose-50 border border-rose-200 text-rose-800 rounded-xl">
                    <div class="flex items-center space-x-3 mb-2">
                        <i data-lucide="alert-circle" class="w-5 h-5 text-rose-600"></i>
                        <span class="text-sm font-semibold">Terdapat beberapa kesalahan:</span>
                    </div>
                    <ul class="list-disc list-inside text-sm space-y-1 text-rose-700">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            @yield('content')
        </main>
    </div>

    <!-- Init Lucide Icons -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            if (window.lucide) {
                lucide.createIcons();
            }
        });
    </script>
    
    @yield('scripts')
</body>
</html>
