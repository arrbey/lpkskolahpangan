@extends('layouts.app')

@section('content')

    <!-- Section 1: Hero & Why Us Section (Integrated for unified background) -->
    @if(($settings['hero_show'] ?? '1') === '1')
    <section id="hero" class="relative min-h-[90vh] flex items-center justify-center bg-cover bg-center pt-28 pb-16 md:pt-36 md:pb-20 text-center" style="background-image: url('{{ !empty($settings['hero_image']) ? asset('storage/' . $settings['hero_image']) : 'https://images.unsplash.com/photo-1530595467537-0b5996c41f2d?q=80&w=1600' }}');">
        <!-- Dark Green Overlay -->
        <div class="absolute inset-0 bg-gradient-to-b from-slate-950/75 via-primary-dark/80 to-primary-dark/95"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10 w-full flex flex-col items-center">
            <!-- Hero Content -->
            <div class="space-y-6 md:space-y-8 max-w-5xl mb-16 md:mb-20">
                
                <h1 class="text-4xl sm:text-5xl md:text-6xl lg:text-7xl font-extrabold tracking-tight text-white leading-tight max-w-4xl mx-auto font-heading">
                    {{ $settings['hero_headline'] ?? 'Cetak Karir Cemerlang di Industri Pangan' }}
                </h1>
                
                <p class="text-base sm:text-lg md:text-xl text-slate-100 max-w-2xl mx-auto leading-relaxed">
                    {{ $settings['hero_subheadline'] ?? 'Dapatkan pelatihan bersertifikasi kompetensi resmi dengan kurikulum standar industri nasional dan instruktur praktisi berpengalaman.' }}
                </p>
                
                <div class="flex flex-col sm:flex-row items-center justify-center gap-4 pt-2">
                    <a href="{{ $settings['hero_cta_url'] ?? '#programs' }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-3.5 border border-transparent text-base font-bold rounded-full text-slate-950 bg-[#C2DB1A] hover:bg-[#d4ed29] hover:scale-105 active:scale-95 transition-all duration-150 shadow-lg shadow-lime-600/10">
                        <span>{{ $settings['hero_cta_label'] ?? 'Pelajari Program Kami' }}</span>
                        <span class="ml-3 bg-white text-slate-950 p-1 rounded-full flex items-center justify-center shadow-sm">
                            <i data-lucide="arrow-right" class="w-4 h-4"></i>
                        </span>
                    </a>
                </div>
            </div>

            <!-- Why Us Overlapping Grid (Inside Hero Section) -->
            @if(($settings['why_us_show'] ?? '1') === '1')
            <div class="w-full text-left -mb-20 md:-mb-28 lg:-mb-32">
                <!-- Cards Layout -->
                <div class="grid grid-cols-1 lg:grid-cols-4 gap-6 lg:gap-0 items-end">
                    @php
                        $whiteItems = $whyUsItems->take(3);
                        $videoItem = $whyUsItems->skip(3)->first() ?? $whyUsItems->last();
                    @endphp

                    <!-- Unified White Bar for first 3 items -->
                    <div class="lg:col-span-3 bg-white rounded-3xl lg:rounded-l-3xl lg:rounded-r-none border border-slate-200/60 lg:border-r-0 shadow-lg flex flex-col md:flex-row divide-y md:divide-y-0 md:divide-x divide-slate-100 overflow-hidden items-stretch why-us-white-container">
                        @foreach($whiteItems as $item)
                            <div class="p-6 flex-1 flex flex-col justify-center space-y-3.5">
                                <div class="flex items-center space-x-3">
                                    <div class="text-primary-green flex-shrink-0">
                                        <i data-lucide="{{ $item->icon }}" class="w-6 h-6"></i>
                                    </div>
                                    <h3 class="font-extrabold text-slate-800 text-sm sm:text-base leading-snug">{{ $item->title }}</h3>
                                </div>
                                <p class="text-xs text-slate-500 leading-relaxed">{{ $item->description }}</p>
                            </div>
                        @endforeach
                    </div>

                    <!-- Green Video Card for 4th item -->
                    @if($videoItem)
                        <div class="lg:col-span-1 bg-primary-green text-white rounded-3xl lg:rounded-r-3xl lg:rounded-tl-3xl lg:rounded-bl-none border border-emerald-600 shadow-xl overflow-hidden flex flex-col transition-all duration-300 group relative z-10 lg:-ml-px why-us-green-container">
                            <!-- Video Thumbnail -->
                            <div class="relative h-40 w-full overflow-hidden bg-slate-800">
                                <img src="{{ !empty($settings['hero_video_thumbnail']) ? asset('storage/' . $settings['hero_video_thumbnail']) : 'https://images.unsplash.com/photo-1576086213369-97a306d36557?q=80&w=600' }}" alt="Video Profil" class="w-full h-full object-cover group-hover:scale-105 transition duration-300 opacity-90">
                                <div class="absolute inset-0 bg-black/15"></div>
                                <!-- Circular Play Button -->
                                <button type="button" id="open-video-btn" class="absolute inset-0 m-auto w-12 h-12 bg-white hover:bg-[#C2DB1A] text-slate-900 rounded-full shadow-lg flex items-center justify-center hover:scale-110 transition duration-150 focus:outline-none" aria-label="Putar Video Profil">
                                    <i data-lucide="play" class="w-4 h-4 fill-current text-primary-green ml-0.5"></i>
                                </button>
                            </div>
                            
                            <!-- Card Content -->
                            <div class="p-6 flex-1 flex flex-col justify-center space-y-3.5">
                                <div class="flex items-center space-x-3">
                                    <div class="text-accent flex-shrink-0">
                                        <i data-lucide="{{ $videoItem->icon }}" class="w-6 h-6"></i>
                                    </div>
                                    <h3 class="font-extrabold text-sm sm:text-base leading-snug text-white">{{ $videoItem->title }}</h3>
                                </div>
                                <p class="text-xs text-emerald-100/90 leading-relaxed">{{ $videoItem->description }}</p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
            @endif

            <!-- Custom Styles for Perfect Card Alignment -->
            <style>
                @media (min-width: 1024px) {
                    .why-us-white-container {
                        border-top-right-radius: 0px !important;
                        border-bottom-right-radius: 0px !important;
                    }
                    .why-us-green-container {
                        border-bottom-left-radius: 0px !important;
                        border-top-left-radius: 24px !important; /* Matches standard rounded-3xl */
                    }
                }
            </style>
        </div>
    </section>
    @endif

    <!-- Section 3: Visi & Misi -->
    @if(($settings['vision_show'] ?? '1') === '1')
    <section id="vision" class="pt-28 md:pt-36 pb-20 bg-slate-50/60 border-y border-slate-100 relative overflow-hidden">
        <div class="absolute top-0 right-0 w-96 h-96 bg-primary-light/40 rounded-full blur-3xl opacity-50 -mr-20 -mt-20"></div>
        <div class="absolute bottom-0 left-0 w-96 h-96 bg-primary-light/30 rounded-full blur-3xl opacity-50 -ml-20 -mb-20"></div>
        
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 relative z-10">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-stretch">
                <!-- Visi Column -->
                <div class="lg:col-span-5 bg-white p-8 md:p-12 rounded-3xl border border-slate-200/50 shadow-sm flex flex-col justify-between space-y-6">
                    <div class="space-y-4">
                        <div class="inline-flex p-3 bg-primary-light text-primary-green rounded-2xl">
                            <i data-lucide="eye" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-2xl font-bold text-primary-dark font-heading">Visi Kami</h3>
                        <p class="text-slate-600 text-base md:text-lg leading-relaxed italic">
                            "{{ $settings['vision_text'] ?? 'Menjadi Lembaga Pelatihan Kerja terdepan yang menghasilkan tenaga kerja industri pangan yang profesional dan kompeten.' }}"
                        </p>
                    </div>
                </div>

                <!-- Misi Column -->
                <div class="lg:col-span-7 bg-primary-dark text-white p-8 md:p-12 rounded-3xl border border-emerald-950 shadow-lg flex flex-col justify-center space-y-6 relative overflow-hidden">
                    <div class="absolute inset-0 opacity-5 bg-[radial-gradient(#fff_1px,transparent_1px)] [background-size:20px_20px]"></div>
                    <div class="relative z-10 space-y-6">
                        <div class="inline-flex p-3 bg-white/10 text-accent rounded-2xl">
                            <i data-lucide="compass" class="w-6 h-6"></i>
                        </div>
                        <h3 class="text-2xl font-bold font-heading">Misi Kami</h3>
                        
                        <div class="space-y-4">
                            @php
                                $missions = explode("\n", $settings['mission_text'] ?? '');
                            @endphp
                            @foreach($missions as $mission)
                                @if(trim($mission) !== '')
                                    <div class="flex items-start space-x-3 text-sm sm:text-base">
                                        <i data-lucide="check-circle-2" class="w-5 h-5 text-accent flex-shrink-0 mt-0.5"></i>
                                        <span class="text-slate-200">{{ preg_replace('/^\d+\.\s*/', '', $mission) }}</span>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    @endif

    <!-- Section 4: Program Pelatihan -->
    @if(($settings['programs_show'] ?? '1') === '1')
    <section id="programs" class="py-20 bg-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-primary-green block mb-3">Program Pelatihan</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-primary-dark">
                    {{ $settings['programs_title'] ?? 'Program Pelatihan Unggulan' }}
                </h2>
                <p class="text-slate-500">
                    Pelajari kelas keahlian pangan terpopuler yang paling dicari oleh perusahaan mitra industri kami.
                </p>
            </div>

            <!-- Programs Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                @foreach($programs as $program)
                <div class="bg-white rounded-3xl border border-slate-200/60 shadow-sm overflow-hidden flex flex-col justify-between group hover:shadow-lg transition-all duration-300">
                    <div>
                        <!-- Image Container -->
                        <div class="relative h-56 overflow-hidden bg-slate-100">
                            @if($program->image)
                                <img src="{{ asset('storage/' . $program->image) }}" alt="{{ $program->title }}" class="w-full h-full object-cover group-hover:scale-105 transition duration-300">
                            @else
                                <div class="w-full h-full bg-gradient-to-br from-primary-green/80 to-primary-dark flex items-center justify-center p-8 text-white relative">
                                    <i data-lucide="award" class="w-12 h-12 text-white/30 mb-2"></i>
                                    <span class="absolute bottom-4 left-4 text-xs font-semibold uppercase tracking-wider bg-white/20 backdrop-blur-md px-2.5 py-1 rounded-md">Pangan Kompeten</span>
                                </div>
                            @endif
                            <div class="absolute top-4 left-4 bg-white/95 backdrop-blur-sm text-primary-dark text-xs font-bold px-3 py-1.5 rounded-xl shadow-sm border border-slate-100 flex items-center">
                                <i data-lucide="clock" class="w-3.5 h-3.5 mr-1.5 text-primary-green"></i>
                                {{ $program->duration }}
                            </div>
                        </div>
                        
                        <!-- Content -->
                        <div class="p-6 space-y-3">
                            <h3 class="font-extrabold text-slate-800 text-lg sm:text-xl group-hover:text-primary-green transition">{{ $program->title }}</h3>
                            <p class="text-sm text-slate-500 leading-relaxed">
                                {{ $program->description }}
                            </p>
                        </div>
                    </div>

                    <div class="p-6 pt-0">
                        <a href="#contact" class="w-full inline-flex items-center justify-center px-5 py-2.5 bg-slate-50 hover:bg-primary-light text-slate-700 hover:text-primary-green font-semibold text-sm rounded-xl transition duration-150 border border-slate-100">
                            <span>Tanya Detail Kelas</span>
                            <i data-lucide="chevron-right" class="w-4 h-4 ml-1"></i>
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Section 5: Brosur & Pelatihan (CTA Kustom) -->
    @if(($settings['brochures_show'] ?? '1') === '1')
    <section id="brochures" class="py-20 bg-slate-50/60 border-y border-slate-100 relative">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-primary-green block mb-3">Informasi & Brosur</span>
                <h2 class="text-3xl sm:text-4xl font-extrabold text-primary-dark">
                    {{ $settings['brochures_title'] ?? 'Informasi Brosur & Pelatihan Terbaru' }}
                </h2>
                <p class="text-slate-500">
                    Lihat jadwal kelas berjalan atau download pamflet brosur resmi kami melalui tombol tautan langsung.
                </p>
            </div>

            <!-- Brochures List -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-8 max-w-4xl mx-auto">
                @foreach($brochures as $brochure)
                <div class="bg-white rounded-3xl border border-slate-200/60 shadow-sm p-6 flex flex-col md:flex-row gap-6 items-center hover:shadow-md transition">
                    <!-- Photo Container -->
                    <div class="w-full md:w-36 h-40 bg-slate-100 rounded-2xl flex-shrink-0 overflow-hidden border border-slate-100 relative">
                        @if($brochure->image)
                            <img src="{{ asset('storage/' . $brochure->image) }}" alt="{{ $brochure->title }}" class="w-full h-full object-cover">
                        @else
                            <div class="w-full h-full bg-gradient-to-br from-emerald-100 to-primary-light flex items-center justify-center text-primary-green">
                                <i data-lucide="file-text" class="w-10 h-10"></i>
                            </div>
                        @endif
                    </div>

                    <!-- Details -->
                    <div class="flex-1 flex flex-col justify-between h-full space-y-4">
                        <div class="space-y-1.5 text-center md:text-left">
                            <h3 class="font-extrabold text-slate-800 text-lg leading-snug">{{ $brochure->title }}</h3>
                            <p class="text-xs sm:text-sm text-slate-500">
                                {{ $brochure->description }}
                            </p>
                        </div>
                        <div class="pt-1">
                            <a href="{{ $brochure->cta_url }}" target="{{ $brochure->cta_target }}" class="w-full md:w-auto inline-flex items-center justify-center px-5 py-2.5 text-sm font-bold text-white bg-primary-green hover:bg-primary-green/90 shadow-md shadow-primary-green/10 rounded-xl transition duration-150">
                                <span>{{ $brochure->cta_label }}</span>
                                <i data-lucide="arrow-up-right" class="w-4 h-4 ml-1.5"></i>
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Section 6: FAQ Accordion -->
    @if(($settings['faq_show'] ?? '1') === '1')
    <section id="faq" class="py-20 bg-white">
        <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
            <!-- Section Header -->
            <div class="text-center max-w-3xl mx-auto mb-16">
                <span class="text-xs font-bold uppercase tracking-widest text-primary-green block mb-3">FAQ</span>
                <h2 class="text-3xl font-extrabold text-primary-dark">
                    {{ $settings['faq_title'] ?? 'Pertanyaan Umum (FAQ)' }}
                </h2>
                <p class="text-slate-500">
                    Masih ragu atau butuh informasi cepat? Temukan jawaban atas pertanyaan umum di bawah ini.
                </p>
            </div>

            <!-- Accordion List -->
            <div class="space-y-4">
                @foreach($faqs as $index => $faq)
                <div class="bg-slate-50/50 rounded-2xl border border-slate-200/50 overflow-hidden shadow-sm transition duration-200 faq-item">
                    <button class="w-full text-left px-6 py-5 flex items-center justify-between font-bold text-slate-800 hover:text-primary-green transition focus:outline-none faq-btn" data-target="faq-ans-{{ $index }}">
                        <span>{{ $faq->question }}</span>
                        <i data-lucide="chevron-down" class="w-5 h-5 text-slate-400 transition-transform duration-300 faq-icon"></i>
                    </button>
                    <div id="faq-ans-{{ $index }}" class="max-h-0 overflow-hidden transition-all duration-300 ease-in-out faq-content">
                        <div class="px-6 pb-6 text-sm text-slate-500 leading-relaxed whitespace-pre-line border-t border-slate-100/50 pt-4">
                            {{ $faq->answer }}
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    @endif

    <!-- Section 7: Kontak & Peta -->
    @if(($settings['contact_show'] ?? '1') === '1')
    <section id="contact" class="py-20 bg-slate-50/60 border-t border-slate-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-stretch">
                
                <!-- Contact Details Column -->
                <div class="lg:col-span-5 space-y-8 flex flex-col justify-between">
                    <div class="space-y-6">
                        <div>
                            <span class="text-xs font-bold uppercase tracking-widest text-primary-green block mb-3">Hubungi Kami</span>
                            <h2 class="text-3xl font-extrabold text-primary-dark font-heading">Informasi Kontak</h2>
                        </div>
                        <p class="text-slate-500 leading-relaxed">
                            Kami selalu terbuka untuk berdiskusi tentang program kemitraan industri, pendaftaran kelas pelatihan, dan pendaftaran sertifikasi.
                        </p>
                        
                        <div class="space-y-4">
                            <!-- Address -->
                            <div class="flex items-start space-x-4">
                                <div class="bg-white p-3 rounded-xl text-primary-green border border-slate-100 shadow-sm flex-shrink-0">
                                    <i data-lucide="map-pin" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-700 text-sm">Alamat Kantor</h4>
                                    <p class="text-sm text-slate-500 leading-relaxed mt-0.5">{{ $settings['contact_address'] ?? 'Jl. Raya Industri Pangan No. 45, Jakarta' }}</p>
                                </div>
                            </div>
                            
                            <!-- Telepon -->
                            <div class="flex items-start space-x-4">
                                <div class="bg-white p-3 rounded-xl text-primary-green border border-slate-100 shadow-sm flex-shrink-0">
                                    <i data-lucide="phone" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-700 text-sm">Nomor Kontak</h4>
                                    <p class="text-sm text-slate-500 leading-relaxed mt-0.5">+{{ $settings['contact_phone'] ?? '6281234567890' }}</p>
                                </div>
                            </div>

                            <!-- Email -->
                            <div class="flex items-start space-x-4">
                                <div class="bg-white p-3 rounded-xl text-primary-green border border-slate-100 shadow-sm flex-shrink-0">
                                    <i data-lucide="mail" class="w-5 h-5"></i>
                                </div>
                                <div>
                                    <h4 class="font-bold text-slate-700 text-sm">Email Resmi</h4>
                                    <p class="text-sm text-slate-500 leading-relaxed mt-0.5">{{ $settings['contact_email'] ?? 'info@skolahpangan.com' }}</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Embed Google Maps -->
                    @if(!empty($settings['contact_maps_url']))
                        <div class="h-60 rounded-3xl border border-slate-200/60 overflow-hidden shadow-sm bg-slate-100 relative">
                            <iframe src="{{ $settings['contact_maps_url'] }}" class="w-full h-full border-0" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    @endif
                </div>

                <!-- Contact Form Column -->
                @if(($settings['contact_form_show'] ?? '1') === '1')
                <div class="lg:col-span-7 bg-white p-8 sm:p-10 rounded-3xl border border-slate-200/50 shadow-sm flex flex-col justify-between">
                    <div class="space-y-6 w-full">
                        <h3 class="text-xl font-bold text-slate-800 font-heading">Kirim Pesan Langsung</h3>
                        
                        <div id="contact-alert" class="hidden p-4 rounded-xl text-sm font-semibold flex items-center space-x-2">
                            <!-- Dynamic success/error alerts from JS -->
                        </div>

                        <form id="contact-form" class="space-y-5">
                            @csrf
                            <div class="grid grid-cols-1 sm:grid-cols-2 gap-5">
                                <div>
                                    <label for="form_name" class="block text-sm font-semibold text-slate-700 mb-1.5">Nama Lengkap</label>
                                    <input type="text" name="name" id="form_name" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition" placeholder="Masukkan nama Anda">
                                </div>

                                <div>
                                    <label for="form_email" class="block text-sm font-semibold text-slate-700 mb-1.5">Alamat Email</label>
                                    <input type="email" name="email" id="form_email" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition" placeholder="nama@email.com">
                                </div>
                            </div>

                            <div>
                                <label for="form_message" class="block text-sm font-semibold text-slate-700 mb-1.5">Isi Pesan Anda</label>
                                <textarea name="message" id="form_message" rows="5" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition" placeholder="Tuliskan pesan atau pertanyaan Anda di sini..."></textarea>
                            </div>

                            <div>
                                <button type="submit" id="form-submit-btn" class="w-full inline-flex items-center justify-center px-6 py-3 border border-transparent text-sm font-bold rounded-xl text-white bg-primary-green hover:bg-primary-green/90 shadow-md shadow-primary-green/20 hover:shadow-lg transition-all duration-150">
                                    <i data-lucide="send" class="w-4 h-4 mr-2"></i>
                                    <span>Kirim Pesan</span>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
                @endif

            </div>
        </div>
    </section>
    @endif

    <!-- Video Lightbox Modal -->
    <div id="video-modal" class="fixed inset-0 z-50 flex items-center justify-center bg-black/85 opacity-0 pointer-events-none transition-opacity duration-300">
        <div class="absolute inset-0 cursor-pointer" id="close-modal-bg"></div>
        <div class="relative w-full max-w-4xl mx-4 bg-slate-950 rounded-3xl overflow-hidden shadow-2xl scale-95 transition-transform duration-300 border border-slate-800" id="modal-container">
            <!-- Close Button -->
            <button type="button" id="close-modal-btn" class="absolute top-4 right-4 z-10 p-2 bg-slate-900/80 hover:bg-rose-600 text-white rounded-xl transition focus:outline-none">
                <i data-lucide="x" class="w-5 h-5"></i>
            </button>
            
            <!-- Video Iframe wrapper -->
            <div class="relative pb-[56.25%] h-0">
                <iframe id="modal-iframe" src="" class="absolute top-0 left-0 w-full h-full border-0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', function () {
        // FAQ Accordion Click Handler
        const faqButtons = document.querySelectorAll('.faq-btn');
        faqButtons.forEach(btn => {
            btn.addEventListener('click', function () {
                const targetId = this.getAttribute('data-target');
                const content = document.getElementById(targetId);
                const icon = this.querySelector('.faq-icon');
                
                // Close other opened accordions
                document.querySelectorAll('.faq-content').forEach(el => {
                    if (el.id !== targetId) {
                        el.style.maxHeight = null;
                        el.closest('.faq-item').classList.remove('border-primary-green/30', 'bg-emerald-50/5');
                        const otherIcon = el.previousElementSibling.querySelector('.faq-icon');
                        if (otherIcon) otherIcon.style.transform = 'rotate(0deg)';
                    }
                });

                // Toggle this accordion
                if (content.style.maxHeight) {
                    content.style.maxHeight = null;
                    icon.style.transform = 'rotate(0deg)';
                    this.closest('.faq-item').classList.remove('border-primary-green/30', 'bg-emerald-50/5');
                } else {
                    content.style.maxHeight = content.scrollHeight + "px";
                    icon.style.transform = 'rotate(180deg)';
                    this.closest('.faq-item').classList.add('border-primary-green/30', 'bg-emerald-50/5');
                }
            });
        });

        // Contact Form AJAX Handler
        const contactForm = document.getElementById('contact-form');
        const alertBox = document.getElementById('contact-alert');
        const submitBtn = document.getElementById('form-submit-btn');

        if (contactForm) {
            contactForm.addEventListener('submit', function (e) {
                e.preventDefault();
                
                // Disable button and show loader text
                submitBtn.disabled = true;
                const origBtnText = submitBtn.innerHTML;
                submitBtn.innerHTML = '<span>Mengirim pesan...</span>';

                // Construct Form Data
                const formData = new FormData(contactForm);

                // Send request using Fetch API
                fetch('{{ route("contact.submit") }}', {
                    method: 'POST',
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest'
                    },
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    alertBox.classList.remove('hidden', 'bg-rose-50', 'text-rose-800', 'border-rose-100', 'bg-emerald-50', 'text-emerald-800', 'border-emerald-100');
                    
                    if (data.success) {
                        // Success alert
                        alertBox.classList.add('bg-emerald-50', 'text-emerald-800', 'border', 'border-emerald-200');
                        alertBox.innerHTML = `<i data-lucide="check-circle-2" class="w-5 h-5 text-emerald-600 flex-shrink-0"></i><span>${data.message}</span>`;
                        contactForm.reset();
                    } else {
                        // Failure alert
                        alertBox.classList.add('bg-rose-50', 'text-rose-800', 'border', 'border-rose-200');
                        alertBox.innerHTML = `<i data-lucide="alert-circle" class="w-5 h-5 text-rose-600 flex-shrink-0"></i><span>${data.message}</span>`;
                    }
                    alertBox.classList.remove('hidden');
                    if (window.lucide) lucide.createIcons();
                })
                .catch(error => {
                    alertBox.classList.remove('hidden', 'bg-rose-50', 'text-rose-800', 'border-rose-100', 'bg-emerald-50', 'text-emerald-800', 'border-emerald-100');
                    alertBox.classList.add('bg-rose-50', 'text-rose-800', 'border', 'border-rose-200');
                    alertBox.innerHTML = '<i data-lucide="alert-circle" class="w-5 h-5 text-rose-600 flex-shrink-0"></i><span>Terjadi gangguan koneksi internet. Silakan coba kembali.</span>';
                    alertBox.classList.remove('hidden');
                    if (window.lucide) lucide.createIcons();
                })
                .finally(() => {
                    submitBtn.disabled = false;
                    submitBtn.innerHTML = origBtnText;
                });
            });
        }

        // Video Modal Script
        const videoModal = document.getElementById('video-modal');
        const modalContainer = document.getElementById('modal-container');
        const openVideoBtn = document.getElementById('open-video-btn');
        const closeModalBtn = document.getElementById('close-modal-btn');
        const closeModalBg = document.getElementById('close-modal-bg');
        const modalIframe = document.getElementById('modal-iframe');
        const videoUrl = @json($settings['hero_video_url'] ?? 'https://www.youtube.com/embed/dQw4w9WgXcQ');

        function getYouTubeEmbedUrl(url) {
            try {
                const parsedUrl = new URL(url);
                let videoId = '';

                if (parsedUrl.hostname.includes('youtu.be')) {
                    videoId = parsedUrl.pathname.split('/').filter(Boolean)[0] || '';
                } else if (parsedUrl.pathname.includes('/embed/')) {
                    videoId = parsedUrl.pathname.split('/embed/')[1]?.split('/')[0] || '';
                } else if (parsedUrl.pathname.includes('/shorts/')) {
                    videoId = parsedUrl.pathname.split('/shorts/')[1]?.split('/')[0] || '';
                } else {
                    videoId = parsedUrl.searchParams.get('v') || '';
                }

                if (!videoId) return url;

                const embedUrl = new URL(`https://www.youtube.com/embed/${videoId}`);
                embedUrl.searchParams.set('autoplay', '1');
                embedUrl.searchParams.set('rel', '0');
                return embedUrl.toString();
            } catch (error) {
                return url;
            }
        }

        function openModal() {
            modalIframe.src = getYouTubeEmbedUrl(videoUrl);
            videoModal.classList.remove('pointer-events-none');
            videoModal.classList.remove('opacity-0');
            videoModal.classList.add('opacity-100');
            modalContainer.classList.remove('scale-95');
            modalContainer.classList.add('scale-100');
            document.body.classList.add('overflow-hidden');
        }

        function closeModal() {
            modalIframe.src = ""; // stops video play
            videoModal.classList.add('pointer-events-none');
            videoModal.classList.remove('opacity-100');
            videoModal.classList.add('opacity-0');
            modalContainer.classList.remove('scale-100');
            modalContainer.classList.add('scale-95');
            document.body.classList.remove('overflow-hidden');
        }

        if (openVideoBtn) {
            openVideoBtn.addEventListener('click', openModal);
        }
        if (closeModalBtn) {
            closeModalBtn.addEventListener('click', closeModal);
        }
        if (closeModalBg) {
            closeModalBg.addEventListener('click', closeModal);
        }

        // Close on ESC
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape') {
                closeModal();
            }
        });
    });
</script>
@endsection
