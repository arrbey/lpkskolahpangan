# PROJECT REQUIREMENTS DOCUMENT
## Company Profile Website — LPK Skolah Pangan

**Versi 1.0.0 | Juni 2026**

| **Nama Proyek** | Skolah Pangan — Company Profile Website |
|---|---|
| **Tipe Aplikasi** | Landing Page + CMS Admin Panel |
| **Versi Dokumen** | 1.0.0 |
| **Tanggal** | Juni 2026 |
| **Status** | Draft — Menunggu Review |
| **Tech Stack** | Laravel 12, MySQL, Blade, Custom Admin Dashboard |
| **Hosting** | Shared Hosting |

---

## 1. Overview

Dokumen ini merupakan Product Requirements Document (PRD) untuk pengembangan website company profile LPK Skolah Pangan — sebuah Lembaga Pelatihan Kerja (LPK) di bidang industri pangan. Website ini bersifat single-page landing page yang menampilkan identitas, program, dan informasi kontak lembaga kepada calon peserta, mitra, serta masyarakat umum.

**Masalah utama yang ingin diselesaikan:**

- Informasi program pelatihan sulit diakses oleh calon peserta.
- Perubahan konten (brosur, jadwal, info kontak) harus dilakukan secara manual oleh developer.

Solusi yang diusulkan adalah sebuah landing page modern bertemakan hijau dengan sistem CMS berbasis admin panel, sehingga seluruh konten dapat dikelola mandiri oleh operator tanpa perlu menyentuh kode.

---

## 2. Requirements

Berikut adalah persyaratan tingkat tinggi untuk sistem:

- **Aksesibilitas:** Website dapat diakses melalui browser modern di desktop maupun perangkat mobile (responsive).
- **Pengguna Publik:** Pengunjung dapat melihat seluruh konten landing page tanpa perlu login.
- **Pengguna Admin:** Terdapat satu atau lebih admin yang dapat login ke dashboard untuk mengelola seluruh konten.
- **CMS Penuh:** Setiap bagian (section) halaman utama dapat diubah melalui admin panel tanpa coding.
- **Navigasi CTA Kustom:** Link CTA pada brosur/pelatihan dapat dikonfigurasi menuju URL manapun (halaman lain, WhatsApp, Google Form, dsb.).
- **Floating WhatsApp Button:** Tombol WhatsApp selalu terlihat dan nomornya dapat diubah di admin.
- **Tema Warna Hijau:** Palet warna utama website menggunakan green sebagai brand color utama.
- **Shared Hosting Compatible:** Aplikasi harus dapat berjalan di lingkungan shared hosting standar (PHP 8.2+, MySQL).

---

## 3. Core Features

Website terdiri dari dua bagian utama: halaman publik (landing page) dan panel admin (CMS). Berikut rincian fitur per bagian.

### 3.1 Landing Page — Halaman Publik

Landing page terdiri dari 8 section yang disusun secara vertikal dalam satu halaman (single-page). Navigasi antar section menggunakan smooth scroll.

#### Section 1 — Hero

Bagian pertama yang dilihat pengunjung saat membuka website. Menampilkan:

- Headline utama (tagline lembaga).
- Sub-headline pendukung.
- Tombol CTA utama (misalnya: 'Daftar Sekarang' atau 'Lihat Program').
- Gambar/ilustrasi hero yang dapat diganti via admin.
- Background dapat berupa gambar atau warna solid bertema hijau.

#### Section 2 — Kenapa Harus Skolah Pangan?

Menampilkan keunggulan kompetitif LPK Skolah Pangan dalam format kartu (card grid). Setiap kartu berisi:

- Ikon (dipilih dari set ikon yang tersedia).
- Judul keunggulan.
- Deskripsi singkat.

Jumlah kartu dapat ditambah atau dikurangi dari admin.

#### Section 3 — Visi & Misi

Menampilkan pernyataan visi dan misi lembaga dalam layout dua kolom atau blok terpisah:

- Teks Visi (satu paragraf).
- Teks Misi (bisa berupa poin-poin atau paragraf).

#### Section 4 — Program Skolah Pangan

Menampilkan daftar program pelatihan yang tersedia. Setiap program ditampilkan dalam bentuk kartu yang berisi:

- Nama program.
- Deskripsi singkat program.
- Durasi pelatihan.
- Gambar/thumbnail program.

#### Section 5 — Brosur & Pelatihan (dengan CTA Kustom)

Menampilkan daftar brosur atau pelatihan yang sedang/akan berjalan. Setiap item berisi:

- Gambar brosur (bisa diupload atau URL gambar).
- Judul pelatihan/brosur.
- Keterangan singkat.
- Tombol CTA dengan label dan URL yang dapat dikonfigurasi (contoh: link ke WhatsApp, Google Form, halaman detail, atau file PDF).

Fitur navigasi CTA ini memungkinkan admin mengarahkan pengunjung ke tujuan berbeda untuk setiap brosur.

#### Section 6 — FAQ (Questions & Answers)

Menampilkan daftar pertanyaan yang sering diajukan dalam format accordion (click untuk expand/collapse). Admin dapat menambah, mengedit, atau menghapus pasangan pertanyaan-jawaban.

#### Section 7 — Kontak

Berisi informasi kontak lembaga:

- Alamat lengkap.
- Nomor telepon/WhatsApp.
- Email.
- Jam operasional.
- Embed peta (Google Maps iframe).
- Form kontak sederhana (Nama, Email, Pesan) — opsional: dikirim via email notifikasi.

#### Section 8 — Floating WhatsApp Button

Tombol bulat dengan ikon WhatsApp yang mengambang (fixed position) di pojok kanan bawah setiap halaman. Klik akan membuka chat WhatsApp ke nomor yang dikonfigurasi admin. Tombol dapat di-toggle aktif/nonaktif dari admin.

---

### 3.2 Admin Panel — CMS Dashboard

Admin panel adalah sistem manajemen konten berbasis web yang memungkinkan pengelola mengubah seluruh isi landing page tanpa perlu coding. Akses admin melalui URL khusus (misal: `/admin`).

#### Autentikasi Admin

- Login dengan email dan password.
- Proteksi session dengan timeout otomatis.
- Support multi-user admin (opsional untuk v1).

#### Manajemen Konten per Section

Setiap section pada landing page memiliki halaman pengelolaan tersendiri di admin panel. Admin dapat:

- Edit teks (judul, deskripsi, tagline, visi, misi, dsb.).
- Upload atau ganti gambar/foto.
- Tambah, edit, hapus item (kartu keunggulan, program, brosur, FAQ).
- Toggle show/hide untuk setiap section.

#### Pengaturan Global

- Nama lembaga dan tagline (digunakan di SEO dan header).
- Logo website.
- Nomor WhatsApp untuk floating button.
- Warna tema (preset hijau, dapat dipilih shade yang diinginkan).
- Footer: teks hak cipta, link sosial media.

#### Manajemen Brosur & CTA

- Upload gambar brosur.
- Input label tombol CTA (bebas, contoh: 'Daftar Sekarang', 'Download Brosur', 'Chat WA').
- Input URL tujuan CTA (bebas: `https://`, `https://wa.me/`, `/program/nama`, dsb.).
- Toggle aktif/nonaktif per brosur.
- Pengaturan urutan tampilan (drag-and-drop order atau input nomor urut).

---

## 4. User Flow

### 4.1 Alur Pengunjung Publik

1. Pengunjung membuka website melalui browser.
2. Sistem menampilkan landing page lengkap dari Hero hingga Footer.
3. Pengunjung scroll atau klik navigasi untuk berpindah section.
4. Pengunjung tertarik dengan brosur pelatihan dan mengklik tombol CTA.
5. Sistem mengarahkan ke URL tujuan yang telah dikonfigurasi admin (WA, form, dsb.).
6. Pengunjung dapat menghubungi lembaga via form kontak atau floating WA button.

### 4.2 Alur Admin Mengelola Konten

1. Admin membuka URL `/admin` dan login dengan email & password.
2. Admin memilih section yang ingin diubah dari sidebar menu.
3. Admin mengisi atau mengubah field konten yang tersedia.
4. Admin klik tombol **Simpan**.
5. Sistem menyimpan perubahan ke database dan langsung menampilkan di halaman publik.

---

## 5. Architecture

Berikut adalah gambaran arsitektur sistem secara keseluruhan:

**Alur Request Publik:**
```
Browser Pengunjung → Web Server (Apache/Nginx) → Laravel 12 (Routing + Controller) → MySQL (Ambil Data Konten) → Blade View (Render HTML) → Response ke Browser
```

**Alur Request Admin (Edit Konten):**
```
Admin Browser → /admin (Auth Middleware) → AdminController → Validasi Request → Update ke MySQL → Redirect dengan Flash Message → Admin melihat perubahan
```

### 5.1 Komponen Utama

| **Komponen** | **Deskripsi** |
|---|---|
| Frontend (Blade) | Template engine bawaan Laravel untuk render HTML server-side. Tidak menggunakan framework JS terpisah (React/Vue) untuk kompatibilitas shared hosting. |
| Backend (Laravel 12) | Framework PHP untuk routing, controller, middleware, validasi, dan ORM (Eloquent). |
| Database (MySQL) | Menyimpan seluruh data konten CMS, user admin, dan pengaturan global. |
| File Storage | Gambar dan file yang diupload disimpan di folder storage Laravel (public disk). Symlink ke `public/storage`. |
| Custom Admin Dashboard | Blade-based admin panel tanpa dependency framework admin pihak ketiga (seperti Filament). Dibangun dari scratch menggunakan komponen Blade + Tailwind CSS. |
| Shared Hosting | Deploy menggunakan cPanel/FileManager. Tidak membutuhkan Docker atau VPS. |

---

## 6. Database Schema

Berikut adalah tabel-tabel utama yang digunakan dalam sistem CMS:

### 6.1 Tabel: `settings`

Menyimpan konfigurasi global website (key-value store).

| **Kolom** | **Tipe** | **Keterangan** | **Contoh Nilai** |
|---|---|---|---|
| id | INT PK | Primary key | - |
| key | VARCHAR(100) | Nama kunci unik | `site_name`, `wa_number` |
| value | TEXT | Nilai konfigurasi | `Skolah Pangan`, `628123456` |
| group | VARCHAR(50) | Pengelompokan setting | `general`, `hero`, `contact` |
| created_at | TIMESTAMP | Waktu dibuat | - |
| updated_at | TIMESTAMP | Waktu diperbarui | - |

### 6.2 Tabel: `why_us_items`

Menyimpan item kartu pada section 'Kenapa Harus Skolah Pangan'.

| **Field** | **Tipe** | **Keterangan** |
|---|---|---|
| id | INT PK | Primary key auto increment |
| icon | VARCHAR(100) | Nama kelas ikon (dari heroicons/lucide) |
| title | VARCHAR(200) | Judul keunggulan |
| description | TEXT | Deskripsi singkat |
| order | INT | Urutan tampil (ascending) |
| is_active | BOOLEAN | Toggle tampil/sembunyikan |
| created_at / updated_at | TIMESTAMP | Timestamp otomatis Laravel |

### 6.3 Tabel: `programs`

Menyimpan data program pelatihan yang ditawarkan.

| **Field** | **Tipe** | **Keterangan** |
|---|---|---|
| id | INT PK | Primary key |
| title | VARCHAR(200) | Nama program pelatihan |
| description | TEXT | Deskripsi program |
| duration | VARCHAR(100) | Durasi (contoh: 3 Bulan, 40 Jam) |
| image | VARCHAR(255) | Path file gambar thumbnail |
| order | INT | Urutan tampil |
| is_active | BOOLEAN | Toggle tampil/sembunyikan |
| created_at / updated_at | TIMESTAMP | Timestamp otomatis |

### 6.4 Tabel: `brochures`

Menyimpan data brosur/pelatihan dengan CTA kustom.

| **Field** | **Tipe** | **Keterangan** |
|---|---|---|
| id | INT PK | Primary key |
| title | VARCHAR(200) | Judul brosur/pelatihan |
| description | TEXT | Keterangan singkat |
| image | VARCHAR(255) | Path file gambar brosur |
| cta_label | VARCHAR(100) | Label tombol CTA (bebas) |
| cta_url | VARCHAR(500) | URL tujuan CTA (WA, form, dsb.) |
| cta_target | VARCHAR(20) | `_self` atau `_blank` |
| order | INT | Urutan tampil |
| is_active | BOOLEAN | Toggle tampil/sembunyikan |
| created_at / updated_at | TIMESTAMP | Timestamp otomatis |

### 6.5 Tabel: `faqs`

Menyimpan pasangan pertanyaan dan jawaban untuk section FAQ.

| **Field** | **Tipe** | **Keterangan** |
|---|---|---|
| id | INT PK | Primary key |
| question | TEXT | Pertanyaan |
| answer | TEXT | Jawaban |
| order | INT | Urutan tampil |
| is_active | BOOLEAN | Toggle tampil/sembunyikan |
| created_at / updated_at | TIMESTAMP | Timestamp otomatis |

### 6.6 Tabel: `users` (Admin)

Menyimpan data pengguna admin panel.

| **Field** | **Tipe** | **Keterangan** |
|---|---|---|
| id | INT PK | Primary key |
| name | VARCHAR(200) | Nama lengkap admin |
| email | VARCHAR(200) | Email login (unik) |
| password | VARCHAR(255) | Hash password (bcrypt) |
| role | VARCHAR(50) | Role: `super_admin`, `editor` |
| created_at / updated_at | TIMESTAMP | Timestamp otomatis |

---

## 7. Panduan CMS — Field per Section

Tabel berikut merangkum semua field yang dapat diedit admin untuk setiap section di landing page.

### 7.1 Hero Section

| **Field** | **Tipe Input** | **Keterangan** |
|---|---|---|
| Headline | Text Input | Judul utama hero, tampil besar di atas |
| Sub-headline | Textarea | Teks pendukung di bawah headline |
| CTA Label | Text Input | Label tombol utama (contoh: Daftar Sekarang) |
| CTA URL | Text Input | Link tujuan tombol CTA |
| Background Image | File Upload | Gambar latar hero (JPG/PNG, maks 2MB) |
| Show Section | Toggle | Tampilkan/sembunyikan section ini |

### 7.2 Kenapa Harus Skolah Pangan

| **Field** | **Tipe Input** | **Keterangan** |
|---|---|---|
| Section Title | Text Input | Judul section (contoh: Mengapa Kami?) |
| Section Description | Textarea | Deskripsi pendek di bawah judul section |
| Item: Icon | Select / Text Input | Nama ikon dari library (contoh: star, check) |
| Item: Title | Text Input | Judul kartu keunggulan |
| Item: Description | Textarea | Deskripsi singkat keunggulan |
| Item: Order | Number Input | Urutan tampil kartu |
| Item: Is Active | Toggle | Tampilkan/sembunyikan kartu ini |

### 7.3 Visi & Misi

| **Field** | **Tipe Input** | **Keterangan** |
|---|---|---|
| Visi | Textarea / Rich Text | Pernyataan visi lembaga |
| Misi | Textarea / Rich Text | Poin-poin misi (bisa multiple baris) |
| Show Section | Toggle | Tampilkan/sembunyikan section ini |

### 7.4 Program Pelatihan

| **Field** | **Tipe Input** | **Keterangan** |
|---|---|---|
| Section Title | Text Input | Judul section (contoh: Program Kami) |
| Program: Title | Text Input | Nama program |
| Program: Description | Textarea | Deskripsi program |
| Program: Duration | Text Input | Durasi (contoh: 40 Jam Pelatihan) |
| Program: Image | File Upload | Gambar thumbnail program |
| Program: Order | Number Input | Urutan tampil |
| Program: Is Active | Toggle | Tampilkan/sembunyikan program ini |

### 7.5 Brosur & Pelatihan (CTA Kustom)

| **Field** | **Tipe Input** | **Keterangan** |
|---|---|---|
| Section Title | Text Input | Judul section brosur |
| Brosur: Title | Text Input | Judul brosur/pelatihan |
| Brosur: Description | Textarea | Keterangan singkat |
| Brosur: Image | File Upload | Gambar brosur (JPG/PNG/PDF preview) |
| Brosur: CTA Label | Text Input | Teks tombol (contoh: Daftar, Download) |
| Brosur: CTA URL | Text Input | URL tujuan (WA link, Google Form, PDF, dsb.) |
| Brosur: CTA Target | Select | `_self` (tab sama) atau `_blank` (tab baru) |
| Brosur: Is Active | Toggle | Tampilkan/sembunyikan brosur ini |

### 7.6 FAQ

| **Field** | **Tipe Input** | **Keterangan** |
|---|---|---|
| Section Title | Text Input | Judul section FAQ |
| FAQ: Question | Textarea | Teks pertanyaan |
| FAQ: Answer | Textarea / Rich Text | Teks jawaban |
| FAQ: Order | Number Input | Urutan tampil |
| FAQ: Is Active | Toggle | Tampilkan/sembunyikan item FAQ |

### 7.7 Kontak

| **Field** | **Tipe Input** | **Keterangan** |
|---|---|---|
| Alamat | Textarea | Alamat lengkap lembaga |
| Nomor Telepon | Text Input | No. telepon/WA (format internasional) |
| Email | Text Input | Alamat email lembaga |
| Jam Operasional | Text Input | Contoh: Senin-Jumat, 08.00-17.00 WIB |
| Google Maps Embed URL | Text Input | URL iframe Google Maps |
| Show Contact Form | Toggle | Tampilkan/sembunyikan form kontak |
| Form Email Recipient | Text Input | Email penerima notifikasi form kontak |

### 7.8 Floating WhatsApp Button

| **Field** | **Tipe Input** | **Keterangan** |
|---|---|---|
| WA Number | Text Input | Nomor WA (contoh: 6281234567890) |
| WA Greeting Message | Text Input | Pesan awal saat buka chat WA |
| Show WA Button | Toggle | Tampilkan/sembunyikan floating button |

---

## 8. Design & Technical Constraints

### 8.1 Teknologi

| **Komponen** | **Teknologi** | **Keterangan** |
|---|---|---|
| Framework Backend | Laravel 12 | Versi terbaru dengan PHP 8.2+ |
| Database | MySQL 8.x | Dikelola via phpMyAdmin di shared hosting |
| Template Engine | Laravel Blade | Server-side rendering, tanpa SPA |
| CSS Framework | Tailwind CSS | Utility-first CSS, dikompilasi via Vite |
| Admin Panel | Custom Blade + Tailwind | Tidak menggunakan paket admin pihak ketiga |
| File Storage | Laravel Local Disk | Folder `storage/public`, symlink ke `public/storage` |
| Deployment | Shared Hosting (cPanel) | Upload via FileManager atau FTP/Git |
| Email Notifikasi | Laravel Mail (SMTP) | Untuk form kontak (opsional) |

### 8.2 Panduan Tema Warna

Website menggunakan palet warna berbasis hijau (green) sebagai brand color utama LPK Skolah Pangan.

| **Nama** | **Nilai** | **Keterangan** |
|---|---|---|
| Primary Green | `#16A34A` (green-600) | Warna utama tombol, heading, aksen |
| Primary Dark | `#14532D` (green-900) | Warna teks heading gelap |
| Primary Light | `#DCFCE7` (green-50) | Background section, hover state |
| Accent | `#4ADE80` (green-400) | Divider, badge, highlight |
| Text Primary | `#111827` (gray-900) | Teks konten utama |
| Text Secondary | `#6B7280` (gray-500) | Teks keterangan/deskripsi |
| Background | `#FFFFFF` | Background halaman utama |

### 8.3 Typography

- **Font Utama (Sans):** Inter, ui-sans-serif, system-ui — untuk konten body dan UI.
- **Font Heading:** Plus Jakarta Sans — untuk heading section dan hero.
- **Font Mono:** JetBrains Mono — untuk kode atau data teknis jika ada.

### 8.4 Kompatibilitas Shared Hosting

- Tidak menggunakan fitur yang membutuhkan root akses atau proses daemon (queue worker, websocket) secara default.
- File `.env` dikonfigurasi manual di server.
- Storage symlink dibuat saat deployment (`php artisan storage:link`).
- Optimasi: `config:cache`, `route:cache`, `view:cache` dijalankan setelah deploy.

---

## 9. Scope & Hal yang Dikecualikan (v1.0)

Hal-hal berikut berada di luar scope versi pertama dan dapat dipertimbangkan untuk versi selanjutnya:

- **Sistem pembayaran atau pendaftaran online terintegrasi** — v1 hanya mengarahkan ke WA/form eksternal.
- **Multilingual (versi Bahasa Inggris)** — v1 hanya Bahasa Indonesia.
- **Blog atau artikel** — konten statis, bukan dinamis blog engine.
- **Push notification** — tidak diperlukan untuk landing page.
- **Analytics dashboard internal** — gunakan Google Analytics/external tool.
- **Progressive Web App (PWA)** — tidak dalam scope v1.
- **REST API publik** — tidak diperlukan karena server-side rendering.

---

## 10. Panduan Deployment (Shared Hosting)

1. Upload source code ke folder non-public (misal: `/home/user/skolahpangan/`).
2. Set document root cPanel ke `/home/user/skolahpangan/public`.
3. Buat database MySQL baru dan import file `.sql` migrasi.
4. Copy `.env.example` ke `.env`, isi `DB_*`, `APP_URL`, dan konfigurasi mail.
5. Jalankan: `php artisan key:generate`
6. Jalankan: `php artisan migrate --seed` (untuk data awal/dummy).
7. Jalankan: `php artisan storage:link`
8. Jalankan: `php artisan config:cache && php artisan route:cache`
9. Login ke `/admin` dengan credentials default dari seeder, lalu ubah password segera.

---

> *PRD ini merupakan dokumen hidup — dapat diperbarui seiring perkembangan proyek.*

**LPK Skolah Pangan | Company Profile Website | v1.0.0 | 2026**
