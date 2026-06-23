<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Models\Brochure;
use App\Models\Faq;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * Dashboard Home.
     */
    public function index()
    {
        $programsCount = Program::count();
        $brochuresCount = Brochure::count();
        $faqsCount = Faq::count();
        $unreadMessagesCount = ContactMessage::where('is_read', false)->count();

        $latestMessages = ContactMessage::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact(
            'programsCount',
            'brochuresCount',
            'faqsCount',
            'unreadMessagesCount',
            'latestMessages'
        ));
    }

    /**
     * View all contact messages.
     */
    public function messages()
    {
        $messages = ContactMessage::orderBy('created_at', 'desc')->paginate(15);
        return view('admin.messages.index', compact('messages'));
    }

    /**
     * Mark message as read/unread.
     */
    public function toggleMessageRead(Request $request, $id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->is_read = !$message->is_read;
        $message->save();

        return back()->with('success', 'Status pesan berhasil diperbarui.');
    }

    /**
     * Delete a contact message.
     */
    public function deleteMessage($id)
    {
        $message = ContactMessage::findOrFail($id);
        $message->delete();

        return back()->with('success', 'Pesan berhasil dihapus.');
    }
}
