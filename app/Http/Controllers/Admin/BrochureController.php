<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brochure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class BrochureController extends Controller
{
    public function index()
    {
        $brochures = Brochure::orderBy('order', 'asc')->get();
        return view('admin.brochures.index', compact('brochures'));
    }

    public function create()
    {
        return view('admin.brochures.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cta_label' => 'required|string|max:100',
            'cta_url' => 'required|string|max:500',
            'cta_target' => 'required|string|in:_self,_blank',
            'order' => 'required|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('brochures', 's3');
            $validated['image'] = $path;
        }

        Brochure::create($validated);

        return redirect()->route('admin.brochures.index')->with('success', 'Brosur & pelatihan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $brochure = Brochure::findOrFail($id);
        return view('admin.brochures.edit', compact('brochure'));
    }

    public function update(Request $request, $id)
    {
        $brochure = Brochure::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'cta_label' => 'required|string|max:100',
            'cta_url' => 'required|string|max:500',
            'cta_target' => 'required|string|in:_self,_blank',
            'order' => 'required|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($brochure->image) {
                Storage::disk('s3')->delete($brochure->image);
            }
            $path = $request->file('image')->store('brochures', 's3');
            $validated['image'] = $path;
        }

        $brochure->update($validated);

        return redirect()->route('admin.brochures.index')->with('success', 'Brosur & pelatihan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $brochure = Brochure::findOrFail($id);
        if ($brochure->image) {
            Storage::disk('s3')->delete($brochure->image);
        }
        $brochure->delete();

        return redirect()->route('admin.brochures.index')->with('success', 'Brosur & pelatihan berhasil dihapus.');
    }
}
