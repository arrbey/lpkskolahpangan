<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProgramController extends Controller
{
    public function index()
    {
        $programs = Program::orderBy('order', 'asc')->get();
        return view('admin.programs.index', compact('programs'));
    }

    public function create()
    {
        return view('admin.programs.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'duration' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'required|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('programs', 's3');
            $validated['image'] = $path;
        }

        Program::create($validated);

        return redirect()->route('admin.programs.index')->with('success', 'Program pelatihan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $program = Program::findOrFail($id);
        return view('admin.programs.edit', compact('program'));
    }

    public function update(Request $request, $id)
    {
        $program = Program::findOrFail($id);

        $validated = $request->validate([
            'title' => 'required|string|max:200',
            'description' => 'required|string',
            'duration' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'order' => 'required|integer',
            'is_active' => 'nullable|boolean',
        ]);

        $validated['is_active'] = $request->has('is_active');

        if ($request->hasFile('image')) {
            if ($program->image) {
                Storage::disk('s3')->delete($program->image);
            }
            $path = $request->file('image')->store('programs', 's3');
            $validated['image'] = $path;
        }

        $program->update($validated);

        return redirect()->route('admin.programs.index')->with('success', 'Program pelatihan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $program = Program::findOrFail($id);
        if ($program->image) {
            Storage::disk('s3')->delete($program->image);
        }
        $program->delete();

        return redirect()->route('admin.programs.index')->with('success', 'Program pelatihan berhasil dihapus.');
    }
}
