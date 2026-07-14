<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Models\Program;
use App\Services\ImageConversionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProgramController extends Controller
{
    public function __construct(protected ImageConversionService $imageService) {}

    public function index(Request $request): View
    {
        $programs = Program::query()
            ->when($request->filled('search'), fn ($q) => $q->where('title', 'like', '%'.$request->search.'%')->orWhere('description', 'like', '%'.$request->search.'%'))
            ->when($request->filled('status'), function ($q) use ($request) {
                if ($request->status === 'active') {
                    $q->where('is_active', true);
                } elseif ($request->status === 'inactive') {
                    $q->where('is_active', false);
                }
            })
            ->latest()
            ->get();

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
            $validated['gambar'] = $this->imageService->uploadAndConvertToWebp($request->file('gambar'), 'programs');
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

        if ($request->hasFile('gambar')) {
            $this->imageService->deleteFile($program->gambar);
            $validated['gambar'] = $this->imageService->uploadAndConvertToWebp($request->file('gambar'), 'programs');
        }

        $program->update($validated);

        return redirect()->route('console.programs.index')->with('success', 'Program berhasil diperbarui.');
    }

    public function destroy(Program $program): RedirectResponse
    {
        $this->imageService->deleteFile($program->gambar);

        $program->delete();

        return redirect()->route('console.programs.index')->with('success', 'Program berhasil dihapus.');
    }
}
