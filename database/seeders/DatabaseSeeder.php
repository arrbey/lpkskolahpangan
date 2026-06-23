<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Setting;
use App\Models\WhyUsItem;
use App\Models\Program;
use App\Models\Brochure;
use App\Models\Faq;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Create Default Admin User
        User::create([
            'name' => 'Super Admin Skolah Pangan',
            'email' => 'admin@skolahpangan.com',
            'password' => Hash::make('Password123!'),
            'role' => 'super_admin',
        ]);

        // 2. Global settings
        $settings = [
            // General
            ['key' => 'site_name', 'value' => 'LPK Skolah Pangan', 'group' => 'general'],
            ['key' => 'site_tagline', 'value' => 'Solusi Pelatihan Industri Pangan Terbaik', 'group' => 'general'],
            ['key' => 'site_logo', 'value' => null, 'group' => 'general'],
            ['key' => 'copyright_text', 'value' => '© 2026 LPK Skolah Pangan. All rights reserved.', 'group' => 'general'],

            // Social Media
            ['key' => 'facebook_url', 'value' => 'https://facebook.com', 'group' => 'social'],
            ['key' => 'instagram_url', 'value' => 'https://instagram.com', 'group' => 'social'],
            ['key' => 'youtube_url', 'value' => 'https://youtube.com', 'group' => 'social'],
            ['key' => 'twitter_url', 'value' => 'https://twitter.com', 'group' => 'social'],

            // Hero Section
            ['key' => 'hero_show', 'value' => '1', 'group' => 'hero'],
            ['key' => 'hero_headline', 'value' => 'Cetak Karir Cemerlang di Industri Pangan Bersama LPK Skolah Pangan', 'group' => 'hero'],
            ['key' => 'hero_subheadline', 'value' => 'Dapatkan pelatihan bersertifikasi kompetensi resmi dengan kurikulum standar industri nasional dan instruktur praktisi berpengalaman.', 'group' => 'hero'],
            ['key' => 'hero_cta_label', 'value' => 'Pelajari Program Kami', 'group' => 'hero'],
            ['key' => 'hero_cta_url', 'value' => '#programs', 'group' => 'hero'],
            ['key' => 'hero_image', 'value' => null, 'group' => 'hero'],

            // Why Us Section
            ['key' => 'why_us_show', 'value' => '1', 'group' => 'why_us'],
            ['key' => 'why_us_title', 'value' => 'Mengapa Memilih Skolah Pangan?', 'group' => 'why_us'],
            ['key' => 'why_us_desc', 'value' => 'Kami berkomitmen memberikan pengalaman belajar terbaik dengan fasilitas memadai dan jejaring kerja yang luas.', 'group' => 'why_us'],

            // Vision Mission Section
            ['key' => 'vision_show', 'value' => '1', 'group' => 'vision'],
            ['key' => 'vision_text', 'value' => 'Menjadi Lembaga Pelatihan Kerja terdepan yang menghasilkan tenaga kerja industri pangan yang profesional, kompeten, berdaya saing global, dan berintegritas tinggi.', 'group' => 'vision'],
            ['key' => 'mission_text', 'value' => "1. Menyelenggarakan pelatihan berbasis kompetensi sesuai standar industri nasional dan internasional.\n2. Menyediakan sarana dan prasarana pelatihan yang representatif dan modern.\n3. Membangun kemitraan strategis dengan dunia usaha dan industri (DUDI) untuk penyaluran lulusan.\n4. Membina karakter lulusan agar memiliki etika kerja yang tinggi.", 'group' => 'vision'],

            // Program Section
            ['key' => 'programs_show', 'value' => '1', 'group' => 'programs'],
            ['key' => 'programs_title', 'value' => 'Program Pelatihan Unggulan', 'group' => 'programs'],

            // Brochure Section
            ['key' => 'brochures_show', 'value' => '1', 'group' => 'brochures'],
            ['key' => 'brochures_title', 'value' => 'Informasi Brosur & Pelatihan Terbaru', 'group' => 'brochures'],

            // FAQ Section
            ['key' => 'faq_show', 'value' => '1', 'group' => 'faq'],
            ['key' => 'faq_title', 'value' => 'Pertanyaan Umum (FAQ)', 'group' => 'faq'],

            // Contact Section
            ['key' => 'contact_show', 'value' => '1', 'group' => 'contact'],
            ['key' => 'contact_form_show', 'value' => '1', 'group' => 'contact'],
            ['key' => 'contact_email_recipient', 'value' => 'info@skolahpangan.com', 'group' => 'contact'],
            ['key' => 'contact_address', 'value' => 'Jl. Raya Industri Pangan No. 45, Jakarta Selatan, DKI Jakarta', 'group' => 'contact'],
            ['key' => 'contact_phone', 'value' => '6281234567890', 'group' => 'contact'],
            ['key' => 'contact_email', 'value' => 'info@skolahpangan.com', 'group' => 'contact'],
            ['key' => 'contact_hours', 'value' => 'Senin - Jumat, 08.00 - 17.00 WIB', 'group' => 'contact'],
            ['key' => 'contact_maps_url', 'value' => 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.299534958189!2d106.816666!3d-6.222222!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zNsKwMTMnMTkuOSJTIDEwNsKwNDknMDAuMCJF!5e0!3m2!1sen!2sid!4v1655000000000!5m2!1sen!2sid', 'group' => 'contact'],

            // WhatsApp Floating Button
            ['key' => 'wa_button_show', 'value' => '1', 'group' => 'whatsapp'],
            ['key' => 'wa_number', 'value' => '6281234567890', 'group' => 'whatsapp'],
            ['key' => 'wa_greeting', 'value' => 'Halo LPK Skolah Pangan, saya ingin bertanya mengenai program pelatihan yang tersedia.', 'group' => 'whatsapp'],

            // Hero Video
            ['key' => 'hero_video_url', 'value' => 'https://www.youtube.com/embed/dQw4w9WgXcQ', 'group' => 'hero'],
            ['key' => 'hero_video_thumbnail', 'value' => null, 'group' => 'hero'],
        ];

        foreach ($settings as $setting) {
            Setting::create($setting);
        }

        // 3. Seed WhyUs Items
        $whyUsItems = [
            [
                'icon' => 'academic-cap',
                'title' => 'Kurikulum Industri',
                'description' => 'Kurikulum yang disusun bersama praktisi industri pangan untuk memastikan relevansi keahlian.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'icon' => 'users',
                'title' => 'Instruktur Praktisi',
                'description' => 'Belajar langsung dari instruktur berpengalaman yang aktif bekerja di industri makanan & minuman.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'icon' => 'shield-check',
                'title' => 'Sertifikasi Resmi',
                'description' => 'Lulusan mendapatkan sertifikat kompetensi LPK dan berkesempatan mengikuti sertifikasi BNSP.',
                'order' => 3,
                'is_active' => true,
            ],
            [
                'icon' => 'briefcase',
                'title' => 'Penyaluran Kerja',
                'description' => 'Kemitraan luas dengan berbagai perusahaan pangan nasional untuk membantu penyaluran kerja lulusan.',
                'order' => 4,
                'is_active' => true,
            ],
        ];

        foreach ($whyUsItems as $item) {
            WhyUsItem::create($item);
        }

        // 4. Seed Programs
        $programs = [
            [
                'title' => 'Quality Control Pangan (QC)',
                'description' => 'Mempelajari teknik pengawasan mutu produk pangan, sanitasi, HACCP, GMP, dan pengujian laboratorium dasar.',
                'duration' => '3 Bulan (Teori + Magang)',
                'image' => null,
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Hazard Analysis Critical Control Point (HACCP)',
                'description' => 'Pelatihan intensif pemahaman dan penyusunan dokumen HACCP sistem keamanan pangan bersertifikat.',
                'duration' => '40 Jam Pelatihan',
                'image' => null,
                'order' => 2,
                'is_active' => true,
            ],
            [
                'title' => 'Food Safety & Hygiene',
                'description' => 'Pelatihan dasar higienitas pengolahan pangan bagi penjamah makanan (food handler) di industri kuliner dan manufaktur.',
                'duration' => '2 Hari (16 Jam)',
                'image' => null,
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($programs as $program) {
            Program::create($program);
        }

        // 5. Seed Brochures
        $brochures = [
            [
                'title' => 'Brosur Pelatihan QC Pangan Angkatan V',
                'description' => 'Pendaftaran pelatihan intensif Quality Control angkatan kelima telah dibuka. Kuota terbatas 20 peserta!',
                'image' => null,
                'cta_label' => 'Daftar via Google Form',
                'cta_url' => 'https://forms.gle',
                'cta_target' => '_blank',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'title' => 'Jadwal Sertifikasi HACCP 2026',
                'description' => 'Unduh jadwal lengkap pelaksanaan pelatihan dan sertifikasi kompetensi HACCP untuk tahun 2026.',
                'image' => null,
                'cta_label' => 'Unduh Jadwal (PDF)',
                'cta_url' => '#',
                'cta_target' => '_blank',
                'order' => 2,
                'is_active' => true,
            ],
        ];

        foreach ($brochures as $brochure) {
            Brochure::create($brochure);
        }

        // 6. Seed FAQs
        $faqs = [
            [
                'question' => 'Bagaimana cara mendaftar pelatihan di LPK Skolah Pangan?',
                'answer' => 'Anda dapat mengeklik tombol pendaftaran pada brosur pelatihan atau langsung menghubungi admin kami via tombol WhatsApp yang tersedia di pojok kanan bawah.',
                'order' => 1,
                'is_active' => true,
            ],
            [
                'question' => 'Apakah ada jaminan langsung kerja setelah lulus?',
                'answer' => 'Kami memiliki kemitraan dengan berbagai industri pangan dan membantu menyalurkan lulusan terbaik melalui program rekrutmen mitra. Namun, keputusan akhir tetap berada di pihak perusahaan perekrut.',
                'order' => 2,
                'is_active' => true,
            ],
            [
                'question' => 'Apakah pelatihannya mendapatkan sertifikat resmi?',
                'answer' => 'Ya, seluruh lulusan akan mendapatkan sertifikat pelatihan resmi dari LPK Skolah Pangan, dan untuk program tertentu dapat difasilitasi mengikuti ujian sertifikasi BNSP.',
                'order' => 3,
                'is_active' => true,
            ],
        ];

        foreach ($faqs as $faq) {
            Faq::create($faq);
        }
    }
}
