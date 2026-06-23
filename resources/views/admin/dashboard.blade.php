@extends('layouts.admin')

@section('content')
<div class="space-y-8">
    <!-- Header Title -->
    <div>
        <h2 class="text-2xl font-bold text-slate-800">Selamat Datang, {{ Auth::user()->name }}!</h2>
        <p class="text-sm text-slate-500">Berikut ringkasan statistik dan pesan masuk terbaru website LPK Skolah Pangan.</p>
    </div>

    <!-- Stats Grid -->
    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Stat Card 1 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200/60 shadow-sm flex items-center space-x-4">
            <div class="p-3 bg-emerald-50 text-emerald-600 rounded-xl">
                <i data-lucide="award" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-400">Program Pelatihan</p>
                <p class="text-2xl font-bold text-slate-800">{{ $programsCount }}</p>
            </div>
        </div>

        <!-- Stat Card 2 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200/60 shadow-sm flex items-center space-x-4">
            <div class="p-3 bg-blue-50 text-blue-600 rounded-xl">
                <i data-lucide="file-text" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-400">Brosur & Pelatihan</p>
                <p class="text-2xl font-bold text-slate-800">{{ $brochuresCount }}</p>
            </div>
        </div>

        <!-- Stat Card 3 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200/60 shadow-sm flex items-center space-x-4">
            <div class="p-3 bg-amber-50 text-amber-600 rounded-xl">
                <i data-lucide="help-circle" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-400">FAQ Accordion</p>
                <p class="text-2xl font-bold text-slate-800">{{ $faqsCount }}</p>
            </div>
        </div>

        <!-- Stat Card 4 -->
        <div class="bg-white p-6 rounded-2xl border border-slate-200/60 shadow-sm flex items-center space-x-4">
            <div class="p-3 bg-rose-50 text-rose-600 rounded-xl">
                <i data-lucide="inbox" class="w-6 h-6"></i>
            </div>
            <div>
                <p class="text-sm font-medium text-slate-400">Pesan Belum Dibaca</p>
                <p class="text-2xl font-bold text-slate-800">{{ $unreadMessagesCount }}</p>
            </div>
        </div>
    </div>

    <!-- Latest Messages Section -->
    <div class="bg-white rounded-2xl border border-slate-200/60 shadow-sm overflow-hidden">
        <div class="px-6 py-5 border-b border-slate-100 flex items-center justify-between">
            <h3 class="font-bold text-slate-800 text-lg">Pesan Masuk Terbaru</h3>
            <a href="{{ route('admin.messages.index') }}" class="text-sm font-semibold text-primary-green hover:underline flex items-center space-x-1">
                <span>Lihat Semua</span>
                <i data-lucide="arrow-right" class="w-4 h-4"></i>
            </a>
        </div>
        
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-xs font-semibold text-slate-500 uppercase border-b border-slate-100">
                        <th class="px-6 py-4">Nama</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Pesan</th>
                        <th class="px-6 py-4">Tanggal</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($latestMessages as $message)
                        <tr class="hover:bg-slate-50/80 transition duration-150 {{ !$message->is_read ? 'font-semibold bg-emerald-50/10' : '' }}">
                            <td class="px-6 py-4 text-slate-800">{{ $message->name }}</td>
                            <td class="px-6 py-4 text-slate-500">{{ $message->email }}</td>
                            <td class="px-6 py-4 text-slate-600 max-w-xs truncate">{{ $message->message }}</td>
                            <td class="px-6 py-4 text-slate-400 text-xs">{{ $message->created_at->format('d M Y, H:i') }} WIB</td>
                            <td class="px-6 py-4">
                                @if(!$message->is_read)
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-rose-50 text-rose-700 border border-rose-100">
                                        Belum Dibaca
                                    </span>
                                @else
                                    <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium bg-slate-50 text-slate-500 border border-slate-100">
                                        Sudah Dibaca
                                    </span>
                                @endif
                            </td>
                            <td class="px-6 py-4 text-right">
                                <div class="flex items-center justify-end space-x-2">
                                    <!-- Read/Unread Form -->
                                    <form action="{{ route('admin.messages.toggle-read', $message->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="p-1.5 hover:bg-slate-100 text-slate-500 hover:text-slate-800 rounded-lg transition" title="{{ $message->is_read ? 'Tandai Belum Dibaca' : 'Tandai Sudah Dibaca' }}">
                                            <i data-lucide="{{ $message->is_read ? 'eye-off' : 'eye' }}" class="w-4 h-4"></i>
                                        </button>
                                    </form>

                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.messages.delete', $message->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="p-1.5 hover:bg-rose-50 text-slate-400 hover:text-rose-600 rounded-lg transition" title="Hapus">
                                            <i data-lucide="trash-2" class="w-4 h-4"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="px-6 py-10 text-center text-slate-400">
                                <div class="flex flex-col items-center justify-center space-y-2">
                                    <i data-lucide="inbox" class="w-8 h-8 text-slate-300"></i>
                                    <span>Belum ada pesan masuk.</span>
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
