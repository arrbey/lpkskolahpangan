@extends('layouts.admin')

@section('content')
<div class="space-y-6 max-w-2xl">
    <!-- Header -->
    <div>
        <h2 class="text-2xl font-bold text-slate-800 font-heading">Tambah Brosur & Pelatihan</h2>
        <p class="text-sm text-slate-500">Tambahkan informasi brosur/pelatihan baru beserta tombol link aksi kustom.</p>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-2xl border border-slate-200/60 shadow-sm p-6">
        <form action="{{ route('admin.brochures.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf

            <div>
                <label for="title" class="block text-sm font-semibold text-slate-700 mb-2">Judul Brosur / Pelatihan</label>
                <input type="text" name="title" id="title" required value="{{ old('title') }}" class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition" placeholder="Contoh: Brosur Pelatihan QC Pangan Angkatan V">
            </div>

            <div>
                <label for="description" class="block text-sm font-semibold text-slate-700 mb-2">Keterangan Singkat</label>
                <textarea name="description" id="description" rows="3" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition" placeholder="Jelaskan secara ringkas jadwal, kuota, atau tujuan pelatihan ini...">{{ old('description') }}</textarea>
            </div>

            <div>
                <label for="image" class="block text-sm font-semibold text-slate-700 mb-2">File Gambar Brosur (Pamflet / Flyer)</label>
                <input type="file" name="image" id="image" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-slate-50 file:text-primary-green hover:file:bg-primary-light transition">
                <p class="text-xs text-slate-400 mt-1">Format: JPG, PNG, WebP (maks. 2MB).</p>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-4 bg-slate-50 rounded-2xl border border-slate-100">
                <div class="md:col-span-2">
                    <h4 class="font-bold text-xs text-slate-400 uppercase tracking-wider">Konfigurasi Tombol CTA (Call To Action)</h4>
                </div>
                
                <div>
                    <label for="cta_label" class="block text-sm font-semibold text-slate-700 mb-2">Label Tombol</label>
                    <input type="text" name="cta_label" id="cta_label" required value="{{ old('cta_label', 'Daftar Sekarang') }}" class="block w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition" placeholder="Contoh: Chat WA, Download PDF, Daftar">
                </div>

                <div>
                    <label for="cta_target" class="block text-sm font-semibold text-slate-700 mb-2">Target Link</label>
                    <select name="cta_target" id="cta_target" required class="block w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">
                        <option value="_blank" {{ old('cta_target') == '_blank' ? 'selected' : '' }}>Tab Baru (_blank)</option>
                        <option value="_self" {{ old('cta_target') == '_self' ? 'selected' : '' }}>Tab Sama (_self)</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label for="cta_url" class="block text-sm font-semibold text-slate-700 mb-2">Tautan URL CTA (Ke mana tombol mengarah?)</label>
                    <input type="text" name="cta_url" id="cta_url" required value="{{ old('cta_url') }}" class="block w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition" placeholder="Contoh: https://wa.me/..., https://forms.gle/..., atau link file PDF">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="order" class="block text-sm font-semibold text-slate-700 mb-2">Urutan Tampil</label>
                    <input type="number" name="order" id="order" required value="{{ old('order', 1) }}" class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">
                </div>

                <div class="flex items-end pb-3">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" checked class="sr-only peer">
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-green"></div>
                        <span class="ml-3 text-sm font-medium text-slate-600">Aktifkan Langsung</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center justify-end space-x-3 pt-4 border-t border-slate-100">
                <a href="{{ route('admin.brochures.index') }}" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold text-sm rounded-xl transition">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 bg-primary-green hover:bg-primary-green/90 text-white font-semibold text-sm rounded-xl shadow-md shadow-primary-green/10 transition">
                    <i data-lucide="save" class="w-4 h-4 mr-2"></i>
                    <span>Simpan Brosur</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
