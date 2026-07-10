<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function index(): View
    {
        $galleries = Gallery::withCount('images')->latest()->get();

        return view('console.galleries.index', compact('galleries'));
    }

    public function create(): View
    {
        return view('console.galleries.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'album' => ['required', 'string', 'max:255'],
            'date' => ['nullable', 'date'],
            'is_active' => ['boolean'],
            'gambar' => ['nullable', 'array'],
            'gambar.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $gallery = Gallery::create($validated);

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $gallery->images()->create([
                    'gambar' => $file->store('galleries', 'sftp'),
                ]);
            }
        }

        return redirect()->route('console.galleries.index')->with('success', 'Galeri berhasil ditambahkan.');
    }

    public function show(Gallery $gallery): View
    {
        $gallery->load('images');

        return view('console.galleries.show', compact('gallery'));
    }

    public function edit(Gallery $gallery): View
    {
        $gallery->load('images');

        return view('console.galleries.edit', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'album' => ['required', 'string', 'max:255'],
            'date' => ['nullable', 'date'],
            'is_active' => ['boolean'],
            'gambar' => ['nullable', 'array'],
            'gambar.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $gallery->update($validated);

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $gallery->images()->create([
                    'gambar' => $file->store('galleries', 'sftp'),
                ]);
            }
        }

        return redirect()->route('console.galleries.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery): RedirectResponse
    {
        foreach ($gallery->images as $image) {
            Storage::disk('sftp')->delete($image->gambar);
        }

        $gallery->delete();

        return redirect()->route('console.galleries.index')->with('success', 'Galeri berhasil dihapus.');
    }

    public function deleteImage(Gallery $gallery, $imageId): RedirectResponse
    {
        $image = $gallery->images()->findOrFail($imageId);

        Storage::disk('sftp')->delete($image->gambar);
        $image->delete();

        return back()->with('success', 'Gambar berhasil dihapus.');
    }
}
