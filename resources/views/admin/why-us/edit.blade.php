@extends('layouts.admin')

@section('content')
<div class="space-y-6 max-w-2xl">
    <!-- Header -->
    <div>
        <h2 class="text-2xl font-bold text-slate-800 font-heading">Edit Keunggulan</h2>
        <p class="text-sm text-slate-500">Ubah informasi kartu keunggulan.</p>
    </div>

    <!-- Form -->
    <div class="bg-white rounded-2xl border border-slate-200/60 shadow-sm p-6">
        <form action="{{ route('admin.why-us.update', $item->id) }}" method="POST" class="space-y-6">
            @csrf
            @method('PUT')

            <div>
                <label for="title" class="block text-sm font-semibold text-slate-700 mb-2">Judul Keunggulan</label>
                <input type="text" name="title" id="title" required value="{{ old('title', $item->title) }}" class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">
            </div>

            <div>
                <label for="icon" class="block text-sm font-semibold text-slate-700 mb-2">Ikon (Nama Ikon Lucide)</label>
                <input type="text" name="icon" id="icon" required value="{{ old('icon', $item->icon) }}" class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">
                <p class="text-xs text-slate-400 mt-1">Gunakan nama ikon dari pustaka Lucide (misal: `award`, `shield-check`, `users`, `briefcase`).</p>
            </div>

            <div>
                <label for="description" class="block text-sm font-semibold text-slate-700 mb-2">Deskripsi Singkat</label>
                <textarea name="description" id="description" rows="3" required class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">{{ old('description', $item->description) }}</textarea>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 gap-6">
                <div>
                    <label for="order" class="block text-sm font-semibold text-slate-700 mb-2">Urutan Tampil</label>
                    <input type="number" name="order" id="order" required value="{{ old('order', $item->order) }}" class="block w-full px-4 py-2.5 bg-slate-50 border border-slate-200 rounded-xl text-sm focus:ring-2 focus:ring-primary-green focus:border-transparent focus:outline-none transition">
                </div>

                <div class="flex items-end pb-3">
                    <label class="relative inline-flex items-center cursor-pointer">
                        <input type="checkbox" name="is_active" value="1" {{ $item->is_active ? 'checked' : '' }} class="sr-only peer">
                        <div class="w-11 h-6 bg-slate-200 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-slate-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-primary-green"></div>
                        <span class="ml-3 text-sm font-medium text-slate-600">Aktifkan</span>
                    </label>
                </div>
            </div>

            <div class="flex items-center justify-end space-x-3 pt-4 border-t border-slate-100">
                <a href="{{ route('admin.why-us.index') }}" class="px-5 py-2.5 bg-slate-100 hover:bg-slate-200 text-slate-600 font-semibold text-sm rounded-xl transition">
                    Batal
                </a>
                <button type="submit" class="inline-flex items-center justify-center px-5 py-2.5 bg-primary-green hover:bg-primary-green/90 text-white font-semibold text-sm rounded-xl shadow-md shadow-primary-green/10 transition">
                    <i data-lucide="save" class="w-4 h-4 mr-2"></i>
                    <span>Perbarui Keunggulan</span>
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
