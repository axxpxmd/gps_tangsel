<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use App\Services\ImageConversionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class GalleryController extends Controller
{
    public function __construct(protected ImageConversionService $imageService) {}

    public function index(Request $request): View
    {
        $query = Gallery::withCount('images');

        if ($request->filled('search')) {
            $query->where('title', 'like', '%'.$request->search.'%');
        }

        if ($request->filled('album')) {
            $query->where('album', $request->album);
        }

        if ($request->status === 'active') {
            $query->where('is_active', true);
        } elseif ($request->status === 'inactive') {
            $query->where('is_active', false);
        }

        $galleries = $query->latest()->get();
        $albums = Gallery::distinct()->pluck('album')->filter()->sort()->values();

        return view('console.galleries.index', compact('galleries', 'albums'));
    }

    public function create(): View
    {
        $albums = Gallery::distinct()->pluck('album')->filter()->sort()->values();

        return view('console.galleries.create', compact('albums'));
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'album' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'is_active' => ['boolean'],
            'gambar' => ['required', 'array'],
            'gambar.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $gallery = Gallery::create($validated);

        foreach ($request->file('gambar') as $file) {
            $gallery->images()->create([
                'gambar' => $this->imageService->uploadAndConvertToWebp($file, 'galleries'),
            ]);
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
        $albums = Gallery::distinct()->pluck('album')->filter()->sort()->values();

        return view('console.galleries.edit', compact('gallery', 'albums'));
    }

    public function update(Request $request, Gallery $gallery): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string'],
            'album' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'is_active' => ['boolean'],
            'gambar' => ['nullable', 'array'],
            'gambar.*' => ['image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $gallery->update($validated);

        if ($request->hasFile('gambar')) {
            foreach ($request->file('gambar') as $file) {
                $gallery->images()->create([
                    'gambar' => $this->imageService->uploadAndConvertToWebp($file, 'galleries'),
                ]);
            }
        }

        return redirect()->route('console.galleries.index')->with('success', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery): RedirectResponse
    {
        foreach ($gallery->images as $image) {
            $this->imageService->deleteFile($image->gambar);
        }

        $gallery->delete();

        return redirect()->route('console.galleries.index')->with('success', 'Galeri berhasil dihapus.');
    }

    public function deleteImage(Gallery $gallery, $imageId): RedirectResponse
    {
        $image = $gallery->images()->findOrFail($imageId);

        $this->imageService->deleteFile($image->gambar);
        $image->delete();

        return back()->with('success', 'Gambar berhasil dihapus.');
    }
}
