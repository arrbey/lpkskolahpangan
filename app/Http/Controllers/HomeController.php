<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\WhyUsItem;
use App\Models\Program;
use App\Models\Brochure;
use App\Models\Faq;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display the public landing page.
     */
    public function index()
    {
        // Fetch all settings and format as key => value array
        $settingsRaw = Setting::all();
        $settings = [];
        foreach ($settingsRaw as $setting) {
            $settings[$setting->key] = $setting->value;
        }

        // Fetch section items sorted by order
        $whyUsItems = WhyUsItem::where('is_active', true)->orderBy('order', 'asc')->get();
        $programs = Program::where('is_active', true)->orderBy('order', 'asc')->get();
        $brochures = Brochure::where('is_active', true)->orderBy('order', 'asc')->get();
        $faqs = Faq::where('is_active', true)->orderBy('order', 'asc')->get();

        return view('landing', compact('settings', 'whyUsItems', 'programs', 'brochures', 'faqs'));
    }

    /**
     * Handle public contact form submission via AJAX.
     */
    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string',
        ]);

        try {
            ContactMessage::create($validated);
            return response()->json([
                'success' => true,
                'message' => 'Pesan Anda telah berhasil dikirim. Terima kasih!',
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan saat mengirim pesan. Silakan coba beberapa saat lagi.',
            ], 500);
        }
    }
}
