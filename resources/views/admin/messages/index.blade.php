@extends('layouts.admin')

@section('content')
<div class="space-y-6">
    <!-- Header -->
    <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4">
        <div>
            <h2 class="text-2xl font-bold text-slate-800 font-heading">Pesan Masuk</h2>
            <p class="text-sm text-slate-500">Melihat dan mengelola pesan masuk dari form kontak publik.</p>
        </div>
    </div>

    <!-- Message Table / List -->
    <div class="bg-white rounded-2xl border border-slate-200/60 shadow-sm overflow-hidden">
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 text-xs font-semibold text-slate-500 uppercase border-b border-slate-100">
                        <th class="px-6 py-4">Nama</th>
                        <th class="px-6 py-4">Email</th>
                        <th class="px-6 py-4">Isi Pesan</th>
                        <th class="px-6 py-4">Tanggal Masuk</th>
                        <th class="px-6 py-4">Status</th>
                        <th class="px-6 py-4 text-right">Aksi</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-100 text-sm">
                    @forelse($messages as $message)
                        <tr class="hover:bg-slate-50/80 transition duration-150 {{ !$message->is_read ? 'font-semibold bg-emerald-50/10' : '' }}">
                            <td class="px-6 py-4 text-slate-800">{{ $message->name }}</td>
                            <td class="px-6 py-4 text-slate-500">{{ $message->email }}</td>
                            <td class="px-6 py-4 text-slate-600 max-w-sm whitespace-pre-line">{{ $message->message }}</td>
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
                                    <!-- Read/Unread Toggle -->
                                    <form action="{{ route('admin.messages.toggle-read', $message->id) }}" method="POST" class="inline">
                                        @csrf
                                        <button type="submit" class="p-2 hover:bg-slate-100 text-slate-600 hover:text-slate-800 rounded-xl transition" title="{{ $message->is_read ? 'Tandai Belum Dibaca' : 'Tandai Sudah Dibaca' }}">
                                            <i data-lucide="{{ $message->is_read ? 'eye-off' : 'eye' }}" class="w-4 h-4"></i>
                                        </button>
                                    </form>

                                    <!-- Delete Form -->
                                    <form action="{{ route('admin.messages.delete', $message->id) }}" method="POST" class="inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pesan ini?')">
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
                                    <i data-lucide="inbox" class="w-10 h-10 text-slate-300"></i>
                                    <span class="font-medium">Belum ada pesan masuk.</span>
                                </div>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        <!-- Pagination Links -->
        @if($messages->hasPages())
            <div class="px-6 py-4 border-t border-slate-100 bg-slate-50">
                {{ $messages->links() }}
            </div>
        @endif
    </div>
</div>
@endsection
