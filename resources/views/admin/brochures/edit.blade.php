@extends('layouts.admin')

@section('content')
<div class="space-y-6 max-w-2xl">
    <!-- Header -->
    <div>
        <h2 class="text-2xl font-bold text-slate-800 font-heading">Edit Brosur & Pelatihan</h2>
        <p class="text-sm text-slate-500">Ubah informasi brosur/pelatihan berjalan dan tombol aksi link kustom.</p>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-2xl border border-slate-200/60 shadow-sm p-6">
        <form action="{{ route('admin.brochures.update', $brochure->id) }}" method="POST" enctype="multipart/form-data" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-semibold text-slate-700 mb-2">Judul Brosur / Pelatihan</label>
                <input type="text" name="title" id="title" required value="{{ old('title', $brochure->title) }}" class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">
            </div>

            <div>
                <label for="description" class="block text-sm font-semibold text-slate-700 mb-2">Keterangan Singkat</label>
                <textarea name="description" id="description" rows="3" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">{{ old('description', $brochure->description) }}</textarea>
            </div>

            <div>
                <label for="image" class="block text-sm font-semibold text-slate-700 mb-2">File Gambar Brosur (Pamflet / Flyer)</label>
                <input type="file" name="image" id="image" class="block w-full text-sm text-slate-500 file:mr-4 file:py-2.5 file:px-4 file:rounded-xl file:border-0 file:text-sm file:font-semibold file:bg-slate-50 file:text-primary-green hover:file:bg-primary-light transition">
                <p class="text-xs text-slate-400 mt-1">Format: JPG, PNG, WebP (maks. 2MB). Kosongkan jika tidak ingin mengganti.</p>
                @if($brochure->image)
                    <div class="mt-3 p-2 border border-slate-100 bg-slate-50 rounded-xl inline-block">
                        <img src="{{ asset('storage/' . $brochure->image) }}" alt="Brosur image" class="h-24 w-auto rounded-lg">
                    </div>
                @endif
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6 p-4 bg-slate-50 rounded-2xl border border-slate-100">
                <div class="md:col-span-2">
                    <h4 class="font-bold text-xs text-slate-400 uppercase tracking-wider">Konfigurasi Tombol CTA (Call To Action)</h4>
                </div>
                
                <div>
                    <label for="cta_label" class="block text-sm font-semibold text-slate-700 mb-2">Label Tombol</label>
                    <input type="text" name="cta_label" id="cta_label" required value="{{ old('cta_label', $brochure->cta_label) }}" class="block w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">
                </div>

                <div>
                    <label for="cta_target" class="block text-sm font-semibold text-slate-700 mb-2">Target Link</label>
                    <select name="cta_target" id="cta_target" required class="block w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">
                        <option value="_blank" {{ old('cta_target', $brochure->cta_target) == '_blank' ? 'selected' : '' }}>Tab Baru (_blank)</option>
                        <option value="_self" {{ old('cta_target', $brochure->cta_target) == '_self' ? 'selected' : '' }}>Tab Sama (_self)</option>
                    </select>
                </div>

                <div class="md:col-span-2">
                    <label for="cta_url" class="block text-sm font-semibold text-slate-700 mb-2">Tautan URL CTA</label>
                    <input type="text" name="cta_url" id="cta_url" required value="{{ old('cta_url', $brochure->cta_url) }}" class="block w-full px-4 py-2.5 bg-white border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">
                </div>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="order" class="block text-sm font-semibold text-slate-700 mb-2">Urutan Tampil</label>
                    <input type="number" name="order" id="order" required value="{{ old('order', $brochure->order) }}" class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">
                </div>

                <div class="flex items-end pb-3">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ $brochure->is_active ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-green"></div>
                        <span class="ml-3 text-sm font-medium text-slate-600">Aktifkan</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center justify-end space-x-3 pt-4 border-t border-slate-100">
                <a href="{{ route('admin.brochures.index') }}" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold text-sm rounded-xl transition">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 bg-primary-green hover:bg-primary-green/90 text-white font-semibold text-sm rounded-xl shadow-md shadow-primary-green/10 transition">
                    <i data-lucide="save" class="w-4 h-4 mr-2"></i>
                    <span>Perbarui Brosur</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
