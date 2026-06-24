@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div>
        <h2 class="text-2xl font-bold text-slate-800 font-heading">Konfigurasi Global</h2>
        <p class="text-sm text-slate-500">Ubah pengaturan umum, logo, kontak, sosial media, serta konten teks utama per bagian halaman.</p>
    </div>

    <!-- Main Settings Form -->
    <form action="{{ route('admin.settings.update') }}" method="POST" enctype="multipart/form-data" class="space-y-8">
        @csrf

        <!-- 1. Pengaturan Umum (General) -->
        <div class="bg-white rounded-2xl border border-slate-200/60 shadow-sm p-6 space-y-6">
            <h3 class="font-bold text-slate-800 text-lg border-b border-slate-100 pb-3 flex items-center space-x-2">
                <i data-lucide="settings-2" class="w-5 h-5 text-primary-green"></i>
                <span>Pengaturan Umum & Identitas</span>
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="site_name" class="block text-sm font-semibold text-slate-700 mb-2">Nama Lembaga / Brand</label>
                    <input type="text" name="site_name" id="site_name" value="{{ old('site_name', $settings['site_name'] ?? '') }}" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">
                </div>

                <div>
                    <label for="site_tagline" class="block text-sm font-semibold text-slate-700 mb-2">Tagline Utama (SEO)</label>
                    <input type="text" name="site_tagline" id="site_tagline" value="{{ old('site_tagline', $settings['site_tagline'] ?? '') }}" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">
                </div>

                <div>
                    <label for="site_logo" class="block text-sm font-semibold text-slate-700 mb-2">Full Logo Website</label>
                    <input type="file" name="site_logo" id="site_logo" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-slate-50 file:text-primary-green hover:file:bg-primary-light transition">
                    <p class="text-xs text-slate-400 mt-1">Upload logo lengkap/wordmark. Format: JPG, PNG, SVG, WebP (maks. 4MB). Kosongkan jika tidak ingin mengganti.</p>
                    @if(!empty($settings['site_logo']))
                        <div class="mt-3 p-3 border border-slate-100 bg-slate-50 rounded-xl inline-block">
                            <img src="{{ Storage::disk('s3')->url($settings['site_logo']) }}" alt="Logo" class="h-16 w-auto max-w-[260px] object-contain">
                        </div>
                    @endif
                </div>

                <div>
                    <label for="copyright_text" class="block text-sm font-semibold text-slate-700 mb-2">Teks Hak Cipta (Footer)</label>
                    <input type="text" name="copyright_text" id="copyright_text" value="{{ old('copyright_text', $settings['copyright_text'] ?? '') }}" class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">
                </div>
            </div>
        </div>

        <!-- 2. Sosial Media -->
        <div class="bg-white rounded-2xl border border-slate-200/60 shadow-sm p-6 space-y-6">
            <h3 class="font-bold text-slate-800 text-lg border-b border-slate-100 pb-3 flex items-center space-x-2">
                <i data-lucide="share-2" class="w-5 h-5 text-primary-green"></i>
                <span>Tautan Sosial Media</span>
            </h3>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="facebook_url" class="block text-sm font-semibold text-slate-700 mb-2">Facebook URL</label>
                    <input type="url" name="facebook_url" id="facebook_url" value="{{ old('facebook_url', $settings['facebook_url'] ?? '') }}" class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition" placeholder="https://facebook.com/lpk">
                </div>

                <div>
                    <label for="instagram_url" class="block text-sm font-semibold text-slate-700 mb-2">Instagram URL</label>
                    <input type="url" name="instagram_url" id="instagram_url" value="{{ old('instagram_url', $settings['instagram_url'] ?? '') }}" class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition" placeholder="https://instagram.com/lpk">
                </div>

                <div>
                    <label for="youtube_url" class="block text-sm font-semibold text-slate-700 mb-2">YouTube URL</label>
                    <input type="url" name="youtube_url" id="youtube_url" value="{{ old('youtube_url', $settings['youtube_url'] ?? '') }}" class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition" placeholder="https://youtube.com/lpk">
                </div>

                <div>
                    <label for="twitter_url" class="block text-sm font-semibold text-slate-700 mb-2">Twitter / X URL</label>
                    <input type="url" name="twitter_url" id="twitter_url" value="{{ old('twitter_url', $settings['twitter_url'] ?? '') }}" class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition" placeholder="https://twitter.com/lpk">
                </div>
            </div>
        </div>

        <!-- 3. Section 1: Hero Section -->
        <div class="bg-white rounded-2xl border border-slate-200/60 shadow-sm p-6 space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="font-bold text-slate-800 text-lg flex items-center space-x-2">
                    <i data-lucide="image" class="w-5 h-5 text-primary-green"></i>
                    <span>Section 1 — Hero</span>
                </h3>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="hero_show" value="1" {{ ($settings['hero_show'] ?? '1') === '1' ? 'checked' : '' }} class="sr-only peer">
                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-green"></div>
                    <span class="ml-3 text-sm font-medium text-slate-600">Tampilkan Section</span>
                </label>
            </div>
            
            <div class="space-y-6">
                <div>
                    <label for="hero_headline" class="block text-sm font-semibold text-slate-700 mb-2">Headline Utama</label>
                    <input type="text" name="hero_headline" id="hero_headline" value="{{ old('hero_headline', $settings['hero_headline'] ?? '') }}" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">
                </div>

                <div>
                    <label for="hero_subheadline" class="block text-sm font-semibold text-slate-700 mb-2">Sub-headline Pendukung</label>
                    <textarea name="hero_subheadline" id="hero_subheadline" rows="3" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">{{ old('hero_subheadline', $settings['hero_subheadline'] ?? '') }}</textarea>
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                    <div>
                        <label for="hero_cta_label" class="block text-sm font-semibold text-slate-700 mb-2">Label Tombol CTA</label>
                        <input type="text" name="hero_cta_label" id="hero_cta_label" value="{{ old('hero_cta_label', $settings['hero_cta_label'] ?? '') }}" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">
                    </div>

                    <div>
                        <label for="hero_cta_url" class="block text-sm font-semibold text-slate-700 mb-2">Tautan (URL) CTA</label>
                        <input type="text" name="hero_cta_url" id="hero_cta_url" value="{{ old('hero_cta_url', $settings['hero_cta_url'] ?? '') }}" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition" placeholder="#programs atau https://link">
                    </div>
                </div>

                <div>
                    <label for="hero_image" class="block text-sm font-semibold text-slate-700 mb-2">Gambar Utama Hero</label>
                    <input type="file" name="hero_image" id="hero_image" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-slate-50 file:text-primary-green hover:file:bg-primary-light transition">
                    <p class="text-xs text-slate-400 mt-1">Format: JPG, PNG, WebP (maks. 2MB). Kosongkan jika tidak ingin mengganti.</p>
                    @if(!empty($settings['hero_image']))
                        <div class="mt-3 p-2 border border-slate-100 bg-slate-50 rounded-xl inline-block">
                            <img src="{{ Storage::disk('s3')->url($settings['hero_image']) }}" alt="Hero Image" class="h-28 w-auto rounded-lg">
                        </div>
                    @endif
                </div>

                <div class="grid grid-cols-1 md:grid-cols-2 gap-6 pt-4 border-t border-slate-100">
                    <div>
                        <label for="hero_video_url" class="block text-sm font-semibold text-slate-700 mb-2">Tautan Video Profil YouTube</label>
                        <input type="text" name="hero_video_url" id="hero_video_url" value="{{ old('hero_video_url', $settings['hero_video_url'] ?? '') }}" class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition" placeholder="https://www.youtube.com/watch?v=...">
                        <p class="text-xs text-slate-400 mt-1">Bisa pakai format watch, youtu.be, shorts, atau embed.</p>
                    </div>

                    <div>
                        <label for="hero_video_thumbnail" class="block text-sm font-semibold text-slate-700 mb-2">Gambar Sampul Video (Thumbnail)</label>
                        <input type="file" name="hero_video_thumbnail" id="hero_video_thumbnail" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-slate-50 file:text-primary-green hover:file:bg-primary-light transition">
                        <p class="text-xs text-slate-400 mt-1">Format: JPG, PNG, WebP (maks. 2MB). Kosongkan jika tidak ingin mengganti.</p>
                        @if(!empty($settings['hero_video_thumbnail']))
                            <div class="mt-3 p-2 border border-slate-100 bg-slate-50 rounded-xl inline-block">
                                <img src="{{ Storage::disk('s3')->url($settings['hero_video_thumbnail']) }}" alt="Video Thumbnail" class="h-20 w-auto rounded-lg">
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <!-- 4. Section 2: Why Us Section -->
        <div class="bg-white rounded-2xl border border-slate-200/60 shadow-sm p-6 space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="font-bold text-slate-800 text-lg flex items-center space-x-2">
                    <i data-lucide="check-square" class="w-5 h-5 text-primary-green"></i>
                    <span>Section 2 — Kenapa Harus Skolah Pangan?</span>
                </h3>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="why_us_show" value="1" {{ ($settings['why_us_show'] ?? '1') === '1' ? 'checked' : '' }} class="sr-only peer">
                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-green"></div>
                    <span class="ml-3 text-sm font-medium text-slate-600">Tampilkan Section</span>
                </label>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="why_us_title" class="block text-sm font-semibold text-slate-700 mb-2">Judul Section</label>
                    <input type="text" name="why_us_title" id="why_us_title" value="{{ old('why_us_title', $settings['why_us_title'] ?? '') }}" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">
                </div>

                <div>
                    <label for="why_us_desc" class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Singkat Section</label>
                    <textarea name="why_us_desc" id="why_us_desc" rows="2" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">{{ old('why_us_desc', $settings['why_us_desc'] ?? '') }}</textarea>
                </div>
            </div>
            <p class="text-xs text-amber-600 mt-2 bg-amber-50 p-3 rounded-xl flex items-center space-x-2">
                <i data-lucide="info" class="w-4 h-4"></i>
                <span>Untuk menambah/mengedit kartu keunggulan individual, silakan buka menu <strong>Keunggulan (Why Us)</strong> di sidebar.</span>
            </p>
        </div>

        <!-- 5. Section 3: Visi & Misi Section -->
        <div class="bg-white rounded-2xl border border-slate-200/60 shadow-sm p-6 space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="font-bold text-slate-800 text-lg flex items-center space-x-2">
                    <i data-lucide="compass" class="w-5 h-5 text-primary-green"></i>
                    <span>Section 3 — Visi & Misi</span>
                </h3>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="vision_show" value="1" {{ ($settings['vision_show'] ?? '1') === '1' ? 'checked' : '' }} class="sr-only peer">
                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-green"></div>
                    <span class="ml-3 text-sm font-medium text-slate-600">Tampilkan Section</span>
                </label>
            </div>
            
            <div class="space-y-6">
                <div>
                    <label for="vision_text" class="block text-sm font-semibold text-slate-700 mb-2">Pernyataan Visi</label>
                    <textarea name="vision_text" id="vision_text" rows="3" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">{{ old('vision_text', $settings['vision_text'] ?? '') }}</textarea>
                </div>

                <div>
                    <label for="mission_text" class="block text-sm font-semibold text-slate-700 mb-2">Pernyataan Misi (Tulis per baris / poin)</label>
                    <textarea name="mission_text" id="mission_text" rows="5" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition" placeholder="1. Misi kesatu&#10;2. Misi kedua">{{ old('mission_text', $settings['mission_text'] ?? '') }}</textarea>
                </div>
            </div>
        </div>

        <!-- 6. Section 4: Program Pelatihan -->
        <div class="bg-white rounded-2xl border border-slate-200/60 shadow-sm p-6 space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="font-bold text-slate-800 text-lg flex items-center space-x-2">
                    <i data-lucide="award" class="w-5 h-5 text-primary-green"></i>
                    <span>Section 4 — Program Pelatihan</span>
                </h3>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="programs_show" value="1" {{ ($settings['programs_show'] ?? '1') === '1' ? 'checked' : '' }} class="sr-only peer">
                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-green"></div>
                    <span class="ml-3 text-sm font-medium text-slate-600">Tampilkan Section</span>
                </label>
            </div>
            
            <div>
                <label for="programs_title" class="block text-sm font-semibold text-slate-700 mb-2">Judul Section</label>
                <input type="text" name="programs_title" id="programs_title" value="{{ old('programs_title', $settings['programs_title'] ?? '') }}" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">
            </div>
            <p class="text-xs text-amber-600 mt-2 bg-amber-50 p-3 rounded-xl flex items-center space-x-2">
                <i data-lucide="info" class="w-4 h-4"></i>
                <span>Untuk melakukan tambah/edit program pelatihan secara detail, silakan buka menu <strong>Program Pelatihan</strong> di sidebar.</span>
            </p>
        </div>

        <!-- 7. Section 5: Brosur & Pelatihan -->
        <div class="bg-white rounded-2xl border border-slate-200/60 shadow-sm p-6 space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="font-bold text-slate-800 text-lg flex items-center space-x-2">
                    <i data-lucide="file-text" class="w-5 h-5 text-primary-green"></i>
                    <span>Section 5 — Brosur & Pelatihan (CTA Kustom)</span>
                </h3>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="brochures_show" value="1" {{ ($settings['brochures_show'] ?? '1') === '1' ? 'checked' : '' }} class="sr-only peer">
                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-green"></div>
                    <span class="ml-3 text-sm font-medium text-slate-600">Tampilkan Section</span>
                </label>
            </div>
            
            <div>
                <label for="brochures_title" class="block text-sm font-semibold text-slate-700 mb-2">Judul Section</label>
                <input type="text" name="brochures_title" id="brochures_title" value="{{ old('brochures_title', $settings['brochures_title'] ?? '') }}" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">
            </div>
            <p class="text-xs text-amber-600 mt-2 bg-amber-50 p-3 rounded-xl flex items-center space-x-2">
                <i data-lucide="info" class="w-4 h-4"></i>
                <span>Untuk melakukan manajemen file brosur, label, dan link CTA kustom, silakan buka menu <strong>Brosur & Pelatihan</strong> di sidebar.</span>
            </p>
        </div>

        <!-- 8. Section 6: FAQ Accordion -->
        <div class="bg-white rounded-2xl border border-slate-200/60 shadow-sm p-6 space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="font-bold text-slate-800 text-lg flex items-center space-x-2">
                    <i data-lucide="help-circle" class="w-5 h-5 text-primary-green"></i>
                    <span>Section 6 — FAQ Accordion</span>
                </h3>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="faq_show" value="1" {{ ($settings['faq_show'] ?? '1') === '1' ? 'checked' : '' }} class="sr-only peer">
                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-green"></div>
                    <span class="ml-3 text-sm font-medium text-slate-600">Tampilkan Section</span>
                </label>
            </div>
            
            <div>
                <label for="faq_title" class="block text-sm font-semibold text-slate-700 mb-2">Judul Section</label>
                <input type="text" name="faq_title" id="faq_title" value="{{ old('faq_title', $settings['faq_title'] ?? '') }}" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">
            </div>
            <p class="text-xs text-amber-600 mt-2 bg-amber-50 p-3 rounded-xl flex items-center space-x-2">
                <i data-lucide="info" class="w-4 h-4"></i>
                <span>Untuk mengelola pasangan Pertanyaan & Jawaban, silakan buka menu <strong>FAQ Accordion</strong> di sidebar.</span>
            </p>
        </div>

        <!-- 9. Section 7: Kontak & Peta -->
        <div class="bg-white rounded-2xl border border-slate-200/60 shadow-sm p-6 space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="font-bold text-slate-800 text-lg flex items-center space-x-2">
                    <i data-lucide="map-pin" class="w-5 h-5 text-primary-green"></i>
                    <span>Section 7 — Kontak & Peta</span>
                </h3>
                <div class="flex space-x-6">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="contact_show" value="1" {{ ($settings['contact_show'] ?? '1') === '1' ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-green"></div>
                        <span class="ml-2 text-xs font-semibold text-slate-500">Tampilkan Section</span>
                    </label>
                    
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="contact_form_show" value="1" {{ ($settings['contact_form_show'] ?? '1') === '1' ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-green"></div>
                        <span class="ml-2 text-xs font-semibold text-slate-500">Tampilkan Form Kontak</span>
                    </label>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="contact_phone" class="block text-sm font-semibold text-slate-700 mb-2">Nomor Telepon (Teks Tampilan)</label>
                    <input type="text" name="contact_phone" id="contact_phone" value="{{ old('contact_phone', $settings['contact_phone'] ?? '') }}" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">
                </div>

                <div>
                    <label for="contact_email" class="block text-sm font-semibold text-slate-700 mb-2">Email Lembaga</label>
                    <input type="email" name="contact_email" id="contact_email" value="{{ old('contact_email', $settings['contact_email'] ?? '') }}" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">
                </div>

                <div>
                    <label for="contact_hours" class="block text-sm font-semibold text-slate-700 mb-2">Jam Operasional</label>
                    <input type="text" name="contact_hours" id="contact_hours" value="{{ old('contact_hours', $settings['contact_hours'] ?? '') }}" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition" placeholder="Senin-Jumat, 08.00-17.00 WIB">
                </div>

                <div>
                    <label for="contact_email_recipient" class="block text-sm font-semibold text-slate-700 mb-2">Email Penerima Pesan (untuk keperluan log admin)</label>
                    <input type="email" name="contact_email_recipient" id="contact_email_recipient" value="{{ old('contact_email_recipient', $settings['contact_email_recipient'] ?? '') }}" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">
                </div>

                <div class="md:col-span-2">
                    <label for="contact_address" class="block text-sm font-semibold text-slate-700 mb-2">Alamat Lengkap</label>
                    <textarea name="contact_address" id="contact_address" rows="2" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">{{ old('contact_address', $settings['contact_address'] ?? '') }}</textarea>
                </div>

                <div class="md:col-span-2">
                    <label for="contact_maps_url" class="block text-sm font-semibold text-slate-700 mb-2">Google Maps Embed URL (Iframe Src Link)</label>
                    <input type="text" name="contact_maps_url" id="contact_maps_url" value="{{ old('contact_maps_url', $settings['contact_maps_url'] ?? '') }}" class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition" placeholder="https://www.google.com/maps/embed?...">
                    <p class="text-xs text-slate-400 mt-1">Tempelkan link URL dari atribut `src` pada kode embed iframe Google Maps yang Anda dapat dari opsi share peta.</p>
                </div>
            </div>
        </div>

        <!-- 10. WhatsApp Floating Button -->
        <div class="bg-white rounded-2xl border border-slate-200/60 shadow-sm p-6 space-y-6">
            <div class="flex items-center justify-between border-b border-slate-100 pb-3">
                <h3 class="font-bold text-slate-800 text-lg flex items-center space-x-2">
                    <!-- Custom WA icon or standard phone -->
                    <i data-lucide="phone-call" class="w-5 h-5 text-primary-green"></i>
                    <span>Tombol WhatsApp Melayang</span>
                </h3>
                <label class="relative inline-flex items-center cursor-pointer">
                    <input type="checkbox" name="wa_button_show" value="1" {{ ($settings['wa_button_show'] ?? '1') === '1' ? 'checked' : '' }} class="sr-only peer">
                    <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-green"></div>
                    <span class="ml-3 text-sm font-medium text-slate-600">Aktifkan Tombol</span>
                </label>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label for="wa_number" class="block text-sm font-semibold text-slate-700 mb-2">Nomor WhatsApp (Gunakan Kode Negara tanpa + atau spasi)</label>
                    <input type="text" name="wa_number" id="wa_number" value="{{ old('wa_number', $settings['wa_number'] ?? '') }}" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition" placeholder="Contoh: 628123456789">
                </div>

                <div>
                    <label for="wa_greeting" class="block text-sm font-semibold text-slate-700 mb-2">Pesan Pembuka WhatsApp (Greeting Message)</label>
                    <input type="text" name="wa_greeting" id="wa_greeting" value="{{ old('wa_greeting', $settings['wa_greeting'] ?? '') }}" class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition" placeholder="Halo LPK Skolah Pangan...">
                </div>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-end">
            <button type="submit" class="inline-flex items-center justify-center px-6 py-3 border border-transparent text-sm font-bold rounded-xl text-white bg-primary-green hover:bg-primary-green/90 shadow-md shadow-primary-green/20 hover:shadow-lg transition-all duration-150">
                <i data-lucide="save" class="w-4 h-4 mr-2"></i>
                <span>Simpan Pengaturan</span>
            </button>
        </div>
    </form>
</div>
@endsection
