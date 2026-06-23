@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-800 font-heading">Mengapa Memilih Kami (Why Us)</h2>
            <p class="text-sm text-slate-500">Kelola kartu-kartu keunggulan yang ditampilkan pada halaman utama.</p>
        </div>
        <div>
            <a href="{{ route('admin.why-us.create') }}" class="inline-flex items-center justify-center px-4 py-2.5 bg-primary-green hover:bg-primary-green/90 text-white font-semibold text-sm rounded-xl shadow-md shadow-primary-green/10 transition">
                <i data-lucide="plus" class="w-4 h-4 mr-2"></i>
                <span>Tambah Keunggulan</span>
            </a>
        </div>
    </div>

    <!-- Table List -->
    <div class="bg-white rounded-2xl border border-slate-200/60 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-xs font-semibold text-slate-500 uppercase border-b border-slate-100">
                        <th class="px-6 py-4 w-20">Ikon</th>
                        <th class="px-6 py-4">Judul Keunggulan</th>
                        <th class="px-6 py-4">Deskripsi</th>
                        <th class="px-6 py-4 w-24">Urutan</th>
                        <th class="px-6 py-4 w-28">Status</th>
                        <th class="px-6 py-4 text-right w-32">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($items as $item)
                        <tr class="hover:bg-slate-50/50 transition">
                            <td class="px-6 py-4">
                                <div class="p-2 bg-primary-light text-primary-green rounded-lg inline-block">
                                    <i data-lucide="{{ $item->icon }}" class="w-5 h-5"></i>
                                </div>
                            </td>
                            <td class="px-6 py-4 font-semibold text-slate-800">{{ $item->title }}</td>
                            <td class="px-6 py-4 text-slate-500 max-w-sm">{{ $item->description }}</td>
                            <td class="px-6 py-4 text-slate-600 font-medium">{{ $item->order }}</td>
                            <td class="px-6 py-4">
                                @if($item->is_active)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-emerald-50 text-emerald-700 border border-emerald-100">
                                        Aktif
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-50 text-slate-400 border border-slate-100">
                                        Draft
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <a href="{{ route('admin.why-us.edit', $item->id) }}" class="p-2 hover:bg-slate-100 text-slate-500 hover:text-slate-800 rounded-xl transition" title="Edit">
                                        <i data-lucide="edit-3" class="w-4 h-4"></i>
                                    </a>
                                    
                                    <form action="{{ route('admin.why-us.destroy', $item->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-2 hover:bg-rose-50 text-slate-400 hover:text-rose-600 rounded-xl transition" title="Hapus">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-12 text-center text-slate-400">
                                <div class="flex flex-col items-center justify-center space-y-2">
                                    <i data-lucide="help-circle" class="w-10 h-10 text-slate-300"></i>
                                    <span class="font-medium">Belum ada data keunggulan.</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
