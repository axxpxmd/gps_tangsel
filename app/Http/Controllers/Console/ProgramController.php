<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProgramController extends Controller
{
    public function index(): View
    {
        $programs = Program::orderBy('sort_order')->get();

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
            'thumbnail' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['boolean'],
        ]);

        Program::create($validated);

        return redirect()->route('console.programs.index')->with('success', 'Program berhasil ditambahkan.');
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
            'thumbnail' => ['nullable', 'string', 'max:255'],
            'sort_order' => ['nullable', 'integer', 'min:0'],
            'is_active' => ['boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        $program->update($validated);

        return redirect()->route('console.programs.index')->with('success', 'Program berhasil diperbarui.');
    }

    public function destroy(Program $program): RedirectResponse
    {
        $program->delete();

        return redirect()->route('console.programs.index')->with('success', 'Program berhasil dihapus.');
    }
}
