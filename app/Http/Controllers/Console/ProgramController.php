<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProgramController extends Controller
{
    public function index(): View
    {
        $programs = Program::latest()->get();

        return view('console.programs.index', compact('programs'));
    }

    public function create(): View
    {
        return view('console.programs.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'penerima_manfaat' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'is_active' => ['boolean'],
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('programs', 'sftp');
        }

        Program::create($validated);

        return redirect()->route('console.programs.index')->with('success', 'Program berhasil ditambahkan.');
    }

    public function show(Program $program): View
    {
        return view('console.programs.show', compact('program'));
    }

    public function edit(Program $program): View
    {
        return view('console.programs.edit', compact('program'));
    }

    public function update(Request $request, Program $program): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['required', 'string'],
            'penerima_manfaat' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'is_active' => ['boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('thumbnail')) {
            if ($program->gambar) {
                Storage::disk('sftp')->delete($program->gambar);
            }
            $validated['thumbnail'] = $request->file('thumbnail')->store('programs', 'sftp');
        }

        $program->update($validated);

        return redirect()->route('console.programs.index')->with('success', 'Program berhasil diperbarui.');
    }

    public function destroy(Program $program): RedirectResponse
    {
        if ($program->gambar) {
            Storage::disk('sftp')->delete($program->gambar);
        }

        $program->delete();

        return redirect()->route('console.programs.index')->with('success', 'Program berhasil dihapus.');
    }
}
