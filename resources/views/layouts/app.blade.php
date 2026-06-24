<!DOCTYPE html>
<html lang="id" class="scroll-smooth">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    
    <title>@yield('title', ($settings['site_name'] ?? 'LPK Skolah Pangan') . ' - ' . ($settings['site_tagline'] ?? ''))</title>
    <meta name="description" content="{{ $settings['hero_subheadline'] ?? 'LPK Skolah Pangan adalah Lembaga Pelatihan Kerja pangan berstandar industri.' }}">
    
    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    
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
<body class="bg-slate-50 text-slate-900 overflow-x-hidden antialiased">

    <!-- Header Navigation -->
    <header class="fixed top-0 left-0 right-0 z-50 transition-all duration-300 bg-white/80 backdrop-blur-md border-b border-slate-100 shadow-sm" id="main-header">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20 transition-all duration-300" id="navbar-container">
                <div class="flex-shrink-0 flex items-center">
                    <a href="{{ route('home') }}" class="flex items-center space-x-3">
                        @if(!empty($settings['site_logo']))
                            <img class="h-10 w-auto" src="{{ Storage::disk('s3')->url($settings['site_logo']) }}" alt="{{ $settings['site_name'] ?? 'Logo' }}">
                        @else
                            <div class="flex items-center space-x-4">
                                <div class="bg-primary-green text-white p-2 rounded-lg">
                                    <i data-lucide="leaf" class="w-6 h-6"></i>
                                </div>
                                <span class="font-bold text-xl tracking-tight text-primary-dark">
                                    {{ $settings['site_name'] ?? 'Skolah Pangan' }}
                                </span>
                            </div>
                        @endif
                    </a>
                </div>
                
                <!-- Desktop Menu -->
                <nav class="hidden md:flex space-x-8">
                    @if(($settings['hero_show'] ?? '1') === '1')
                        <a href="#hero" class="text-slate-600 hover:text-primary-green font-medium transition duration-150">Beranda</a>
                    @endif
                    @if(($settings['why_us_show'] ?? '1') === '1')
                        <a href="#why-us" class="text-slate-600 hover:text-primary-green font-medium transition duration-150">Mengapa Kami</a>
                    @endif
                    @if(($settings['vision_show'] ?? '1') === '1')
                        <a href="#vision" class="text-slate-600 hover:text-primary-green font-medium transition duration-150">Visi & Misi</a>
                    @endif
                    @if(($settings['programs_show'] ?? '1') === '1')
                        <a href="#programs" class="text-slate-600 hover:text-primary-green font-medium transition duration-150">Program</a>
                    @endif
                    @if(($settings['brochures_show'] ?? '1') === '1')
                        <a href="#brochures" class="text-slate-600 hover:text-primary-green font-medium transition duration-150">Brosur</a>
                    @endif
                    @if(($settings['faq_show'] ?? '1') === '1')
                        <a href="#faq" class="text-slate-600 hover:text-primary-green font-medium transition duration-150">FAQ</a>
                    @endif
                    @if(($settings['contact_show'] ?? '1') === '1')
                        <a href="#contact" class="text-slate-600 hover:text-primary-green font-medium transition duration-150">Kontak</a>
                    @endif
                </nav>
                
                <!-- Desktop CTA Button -->
                <div class="hidden md:flex items-center">
                    <a href="#contact" class="inline-flex items-center justify-center px-5 py-2.5 border border-transparent text-sm font-semibold rounded-xl text-white bg-primary-green hover:bg-primary-green/90 shadow-md shadow-primary-green/20 hover:shadow-lg transition-all duration-150">
                        Hubungi Kami
                    </a>
                </div>

                <!-- Mobile Menu Button -->
                <div class="flex items-center md:hidden">
                    <button type="button" id="mobile-menu-button" class="inline-flex items-center justify-center p-2 rounded-xl text-slate-500 hover:text-primary-green hover:bg-slate-100 transition duration-150" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <i data-lucide="menu" id="menu-open-icon" class="block h-6 w-6"></i>
                        <i data-lucide="x" id="menu-close-icon" class="hidden h-6 w-6"></i>
                    </button>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="hidden md:hidden bg-white border-b border-slate-100 shadow-lg transition-all duration-300" id="mobile-menu">
            <div class="px-2 pt-2 pb-4 space-y-1 sm:px-3">
                @if(($settings['hero_show'] ?? '1') === '1')
                    <a href="#hero" class="mobile-nav-link block px-3 py-2.5 rounded-lg text-base font-medium text-slate-700 hover:text-primary-green hover:bg-slate-50">Beranda</a>
                @endif
                @if(($settings['why_us_show'] ?? '1') === '1')
                    <a href="#why-us" class="mobile-nav-link block px-3 py-2.5 rounded-lg text-base font-medium text-slate-700 hover:text-primary-green hover:bg-slate-50">Mengapa Kami</a>
                @endif
                @if(($settings['vision_show'] ?? '1') === '1')
                    <a href="#vision" class="mobile-nav-link block px-3 py-2.5 rounded-lg text-base font-medium text-slate-700 hover:text-primary-green hover:bg-slate-50">Visi & Misi</a>
                @endif
                @if(($settings['programs_show'] ?? '1') === '1')
                    <a href="#programs" class="mobile-nav-link block px-3 py-2.5 rounded-lg text-base font-medium text-slate-700 hover:text-primary-green hover:bg-slate-50">Program</a>
                @endif
                @if(($settings['brochures_show'] ?? '1') === '1')
                    <a href="#brochures" class="mobile-nav-link block px-3 py-2.5 rounded-lg text-base font-medium text-slate-700 hover:text-primary-green hover:bg-slate-50">Brosur</a>
                @endif
                @if(($settings['faq_show'] ?? '1') === '1')
                    <a href="#faq" class="mobile-nav-link block px-3 py-2.5 rounded-lg text-base font-medium text-slate-700 hover:text-primary-green hover:bg-slate-50">FAQ</a>
                @endif
                @if(($settings['contact_show'] ?? '1') === '1')
                    <a href="#contact" class="mobile-nav-link block px-3 py-2.5 rounded-lg text-base font-medium text-slate-700 hover:text-primary-green hover:bg-slate-50">Kontak</a>
                @endif
                <div class="pt-4 pb-2 border-t border-slate-100">
                    <a href="#contact" class="mobile-nav-link block text-center px-4 py-2.5 rounded-xl text-base font-semibold text-white bg-primary-green hover:bg-primary-green/90 shadow-md">
                        Hubungi Kami
                    </a>
                </div>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="pt-20">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="bg-primary-dark text-slate-200 border-t border-emerald-950">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
                <!-- Brand Info -->
                <div class="space-y-4 md:col-span-2">
                    <div class="flex items-center space-x-4 text-white">
                        <div class="bg-primary-green p-1.5 rounded">
                            <i data-lucide="leaf" class="w-5 h-5 text-white"></i>
                        </div>
                        <span class="font-bold text-lg tracking-tight">{{ $settings['site_name'] ?? 'LPK Skolah Pangan' }}</span>
                    </div>
                    <p class="text-sm text-slate-300 max-w-sm">
                        {{ $settings['site_tagline'] ?? 'Lembaga Pelatihan Kerja terpercaya untuk mencetak tenaga profesional di industri pangan.' }}
                    </p>
                    <div class="flex space-x-4">
                        @if(!empty($settings['facebook_url']))
                            <a href="{{ $settings['facebook_url'] }}" target="_blank" class="p-2 bg-emerald-950/60 rounded-lg hover:bg-primary-green hover:text-white transition duration-150">
                                <i data-lucide="facebook" class="w-5 h-5"></i>
                            </a>
                        @endif
                        @if(!empty($settings['instagram_url']))
                            <a href="{{ $settings['instagram_url'] }}" target="_blank" class="p-2 bg-emerald-950/60 rounded-lg hover:bg-primary-green hover:text-white transition duration-150">
                                <i data-lucide="instagram" class="w-5 h-5"></i>
                            </a>
                        @endif
                        @if(!empty($settings['youtube_url']))
                            <a href="{{ $settings['youtube_url'] }}" target="_blank" class="p-2 bg-emerald-950/60 rounded-lg hover:bg-primary-green hover:text-white transition duration-150">
                                <i data-lucide="youtube" class="w-5 h-5"></i>
                            </a>
                        @endif
                        @if(!empty($settings['twitter_url']))
                            <a href="{{ $settings['twitter_url'] }}" target="_blank" class="p-2 bg-emerald-950/60 rounded-lg hover:bg-primary-green hover:text-white transition duration-150">
                                <i data-lucide="twitter" class="w-5 h-5"></i>
                            </a>
                        @endif
                    </div>
                </div>
                
                <!-- Quick Links -->
                <div>
                    <h3 class="text-white font-semibold text-sm tracking-wider uppercase mb-4">Navigasi</h3>
                    <ul class="space-y-2.5 text-sm">
                        @if(($settings['hero_show'] ?? '1') === '1')
                            <li><a href="#hero" class="hover:text-primary-green transition">Beranda</a></li>
                        @endif
                        @if(($settings['why_us_show'] ?? '1') === '1')
                            <li><a href="#why-us" class="hover:text-primary-green transition">Mengapa Kami</a></li>
                        @endif
                        @if(($settings['vision_show'] ?? '1') === '1')
                            <li><a href="#vision" class="hover:text-primary-green transition">Visi & Misi</a></li>
                        @endif
                        @if(($settings['programs_show'] ?? '1') === '1')
                            <li><a href="#programs" class="hover:text-primary-green transition">Program Pelatihan</a></li>
                        @endif
                    </ul>
                </div>

                <!-- Info Kontak / Jam -->
                <div>
                    <h3 class="text-white font-semibold text-sm tracking-wider uppercase mb-4">Jam Operasional</h3>
                    <p class="text-sm text-slate-300 mb-2">
                        <i data-lucide="clock" class="w-4 h-4 inline-block mr-1 text-primary-green"></i>
                        {{ $settings['contact_hours'] ?? 'Senin - Jumat, 08:00 - 17:00 WIB' }}
                    </p>
                    <p class="text-sm text-slate-300">
                        <i data-lucide="mail" class="w-4 h-4 inline-block mr-1 text-primary-green"></i>
                        {{ $settings['contact_email'] ?? 'info@skolahpangan.com' }}
                    </p>
                </div>
            </div>
            
            <div class="mt-8 pt-8 border-t border-emerald-950/80 flex flex-col sm:flex-row items-center justify-between text-xs text-slate-400">
                <p>{{ $settings['copyright_text'] ?? '© 2026 LPK Skolah Pangan. All rights reserved.' }}</p>
                <div class="mt-4 sm:mt-0 space-x-6">
                    <a href="{{ route('admin.login') }}" class="hover:text-primary-green">CMS Admin</a>
                </div>
            </div>
        </div>
    </footer>

    <!-- Floating WhatsApp Button -->
    @if(($settings['wa_button_show'] ?? '1') === '1' && !empty($settings['wa_number']))
        @php
            $waUrl = 'https://wa.me/' . preg_replace('/[^0-9]/', '', $settings['wa_number']);
            if(!empty($settings['wa_greeting'])) {
                $waUrl .= '?text=' . urlencode($settings['wa_greeting']);
            }
        @endphp
        <a href="{{ $waUrl }}" target="_blank" class="fixed bottom-6 right-6 z-40 bg-emerald-500 hover:bg-emerald-600 text-white p-4 rounded-full shadow-lg shadow-emerald-500/30 hover:shadow-emerald-500/50 hover:scale-110 active:scale-95 transition-all duration-200 flex items-center justify-center" aria-label="Hubungi kami via WhatsApp">
            <svg class="w-7 h-7 fill-current" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                <path d="M.057 24l1.687-6.163c-1.041-1.804-1.588-3.849-1.587-5.946C.06 5.348 5.397.01 12.008.01c3.202.001 6.212 1.246 8.477 3.514 2.266 2.268 3.507 5.28 3.505 8.484-.004 6.657-5.34 11.997-11.953 11.997-2.005-.001-3.973-.502-5.73-1.45L0 24zm6.59-4.846c1.6.95 3.188 1.449 4.825 1.451 5.436 0 9.86-4.37 9.864-9.799.002-2.63-1.023-5.101-2.885-6.97C16.579 1.966 14.12 1.935 12.01 1.935c-5.44 0-9.866 4.372-9.87 9.802 0 1.698.48 3.35 1.39 4.8l-.375 1.366 1.488-.39 1.414.74zM16.634 14.34c-.25-.125-1.479-.73-1.707-.813-.228-.083-.393-.125-.558.125-.165.25-.64.813-.784.978-.145.165-.29.185-.54.06-.25-.125-1.054-.388-2.008-1.24-.742-.662-1.243-1.48-1.39-1.727-.145-.25-.015-.385.11-.51.113-.11.25-.29.375-.436.125-.145.166-.25.25-.417.083-.167.042-.313-.02-.438-.063-.125-.558-1.346-.764-1.844-.2-.487-.4-.42-.558-.428-.145-.007-.31-.008-.475-.008-.165 0-.435.062-.662.312-.228.25-.87.85-.87 2.07 0 1.22.888 2.39 1.013 2.56.125.165 1.748 2.668 4.234 3.74.59.255 1.052.408 1.41.52.593.19 1.134.162 1.56.098.476-.07 1.48-.605 1.687-1.19.208-.582.208-1.083.146-1.19-.063-.105-.228-.166-.478-.29z"/>
            </svg>
        </a>
    @endif

    <!-- Inline Script for mobile navigation & lucide icons initiation -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            // Initiate Lucide Icons
            if (window.lucide) {
                lucide.createIcons();
            }

            // Header shrink on scroll
            const header = document.getElementById('main-header');
            const navbarContainer = document.getElementById('navbar-container');
            window.addEventListener('scroll', function() {
                if (window.scrollY > 50) {
                    navbarContainer.classList.remove('h-20');
                    navbarContainer.classList.add('h-16');
                    header.classList.add('shadow-md');
                } else {
                    navbarContainer.classList.remove('h-16');
                    navbarContainer.classList.add('h-20');
                    header.classList.remove('shadow-md');
                }
            });

            // Mobile Menu Toggle
            const mobileMenuButton = document.getElementById('mobile-menu-button');
            const mobileMenu = document.getElementById('mobile-menu');
            const menuOpenIcon = document.getElementById('menu-open-icon');
            const menuCloseIcon = document.getElementById('menu-close-icon');

            mobileMenuButton.addEventListener('click', function () {
                const expanded = mobileMenuButton.getAttribute('aria-expanded') === 'true';
                mobileMenuButton.setAttribute('aria-expanded', !expanded);
                
                if (expanded) {
                    mobileMenu.classList.add('hidden');
                    menuOpenIcon.classList.remove('hidden');
                    menuCloseIcon.classList.add('hidden');
                } else {
                    mobileMenu.classList.remove('hidden');
                    menuOpenIcon.classList.add('hidden');
                    menuCloseIcon.classList.remove('hidden');
                }
            });

            // Close mobile menu when clicking nav links
            const mobileLinks = document.querySelectorAll('.mobile-nav-link');
            mobileLinks.forEach(link => {
                link.addEventListener('click', () => {
                    mobileMenu.classList.add('hidden');
                    menuOpenIcon.classList.remove('hidden');
                    menuCloseIcon.classList.add('hidden');
                    mobileMenuButton.setAttribute('aria-expanded', 'false');
                });
            });
        });
    </script>
    
    @yield('scripts')
</body>
</html>
