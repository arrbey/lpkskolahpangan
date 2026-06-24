<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    /**
     * Display settings page.
     */
    public function index()
    {
        $settingsRaw = Setting::all();
        $settings = [];
        foreach ($settingsRaw as $setting) {
            $settings[$setting->key] = $setting->value;
        }

        return view('admin.settings', compact('settings'));
    }

    /**
     * Update settings.
     */
    public function update(Request $request)
    {
        // Define settings list and validation rules
        $rules = [
            'site_name' => 'required|string|max:255',
            'site_tagline' => 'required|string|max:255',
            'copyright_text' => 'nullable|string|max:255',
            
            'facebook_url' => 'nullable|url|max:255',
            'instagram_url' => 'nullable|url|max:255',
            'youtube_url' => 'nullable|url|max:255',
            'twitter_url' => 'nullable|url|max:255',

            'hero_show' => 'nullable|boolean',
            'hero_headline' => 'required|string|max:500',
            'hero_subheadline' => 'required|string',
            'hero_cta_label' => 'required|string|max:255',
            'hero_cta_url' => 'required|string|max:255',
            'hero_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'hero_video_url' => 'nullable|string|max:500',
            'hero_video_thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

            'why_us_show' => 'nullable|boolean',
            'why_us_title' => 'required|string|max:255',
            'why_us_desc' => 'required|string',

            'vision_show' => 'nullable|boolean',
            'vision_text' => 'required|string',
            'mission_text' => 'required|string',

            'programs_show' => 'nullable|boolean',
            'programs_title' => 'required|string|max:255',

            'brochures_show' => 'nullable|boolean',
            'brochures_title' => 'required|string|max:255',

            'faq_show' => 'nullable|boolean',
            'faq_title' => 'required|string|max:255',

            'contact_show' => 'nullable|boolean',
            'contact_form_show' => 'nullable|boolean',
            'contact_email_recipient' => 'required|email|max:255',
            'contact_address' => 'required|string',
            'contact_phone' => 'required|string|max:50',
            'contact_email' => 'required|email|max:255',
            'contact_hours' => 'required|string|max:255',
            'contact_maps_url' => 'nullable|string',

            'wa_button_show' => 'nullable|boolean',
            'wa_number' => 'required|string|max:50',
            'wa_greeting' => 'nullable|string|max:500',

            'site_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ];

        $validated = $request->validate($rules);

        // Define groups for settings
        $groups = [
            'site_name' => 'general', 'site_tagline' => 'general', 'copyright_text' => 'general',
            'facebook_url' => 'social', 'instagram_url' => 'social', 'youtube_url' => 'social', 'twitter_url' => 'social',
            'hero_show' => 'hero', 'hero_headline' => 'hero', 'hero_subheadline' => 'hero', 'hero_cta_label' => 'hero', 'hero_cta_url' => 'hero', 'hero_video_url' => 'hero',
            'why_us_show' => 'why_us', 'why_us_title' => 'why_us', 'why_us_desc' => 'why_us',
            'vision_show' => 'vision', 'vision_text' => 'vision', 'mission_text' => 'vision',
            'programs_show' => 'programs', 'programs_title' => 'programs',
            'brochures_show' => 'brochures', 'brochures_title' => 'brochures',
            'faq_show' => 'faq', 'faq_title' => 'faq',
            'contact_show' => 'contact', 'contact_form_show' => 'contact', 'contact_email_recipient' => 'contact',
            'contact_address' => 'contact', 'contact_phone' => 'contact', 'contact_email' => 'contact', 'contact_hours' => 'contact', 'contact_maps_url' => 'contact',
            'wa_button_show' => 'whatsapp', 'wa_number' => 'whatsapp', 'wa_greeting' => 'whatsapp',
        ];

        // Save simple text/checkbox inputs
        foreach ($groups as $key => $group) {
            // Handle boolean checkbox values
            if (str_ends_with($key, '_show') || $key === 'contact_form_show' || $key === 'wa_button_show') {
                $val = $request->has($key) ? '1' : '0';
            } else {
                $val = $validated[$key] ?? '';
            }
            Setting::set($key, $val, $group);
        }

        // Handle Site Logo Upload
        if ($request->hasFile('site_logo')) {
            $oldLogo = Setting::get('site_logo');
            if ($oldLogo) {
                Storage::disk('s3')->delete($oldLogo);
            }
            $path = $request->file('site_logo')->store('logos', 's3');
            Setting::set('site_logo', $path, 'general');
        }

        // Handle Hero Image Upload
        if ($request->hasFile('hero_image')) {
            $oldHeroImg = Setting::get('hero_image');
            if ($oldHeroImg) {
                Storage::disk('s3')->delete($oldHeroImg);
            }
            $path = $request->file('hero_image')->store('hero', 's3');
            Setting::set('hero_image', $path, 'hero');
        }

        // Handle Hero Video Thumbnail Upload
        if ($request->hasFile('hero_video_thumbnail')) {
            $oldThumb = Setting::get('hero_video_thumbnail');
            if ($oldThumb) {
                Storage::disk('s3')->delete($oldThumb);
            }
            $path = $request->file('hero_video_thumbnail')->store('hero', 's3');
            Setting::set('hero_video_thumbnail', $path, 'hero');
        }

        return redirect()->route('admin.settings')->with('success', 'Pengaturan berhasil diperbarui.');
    }
}
