<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WhyUsItem;
use Illuminate\Http\Request;

class WhyUsItemController extends Controller
{
    public function index()
    {
        $items = WhyUsItem::orderBy('order', 'asc')->get();
        return view('admin.why-us.index', compact('items'));
    }

    public function create()
    {
        return view('admin.why-us.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'icon' => 'required|string|max:100',
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'order' => 'required|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        WhyUsItem::create($validated);

        return redirect()->route('admin.why-us.index')->with('success', 'Keunggulan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $item = WhyUsItem::findOrFail($id);
        return view('admin.why-us.edit', compact('item'));
    }

    public function update(Request $request, $id)
    {
        $item = WhyUsItem::findOrFail($id);

        $validated = $request->validate([
            'icon' => 'required|string|max:100',
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'order' => 'required|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        $item->update($validated);

        return redirect()->route('admin.why-us.index')->with('success', 'Keunggulan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $item = WhyUsItem::findOrFail($id);
        $item->delete();

        return redirect()->route('admin.why-us.index')->with('success', 'Keunggulan berhasil dihapus.');
    }
}
