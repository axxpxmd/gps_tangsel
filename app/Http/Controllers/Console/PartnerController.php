<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use App\Services\ImageConversionService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class PartnerController extends Controller
{
    public function __construct(protected ImageConversionService $imageService) {}

    public function index(): View
    {
        $partners = Partner::latest()->get();

        return view('console.partners.index', compact('partners'));
    }

    public function create(): View
    {
        return view('console.partners.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gambar' => ['required', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'is_active' => ['boolean'],
        ]);

        $validated['gambar'] = $this->imageService->uploadAndConvertToWebp($request->file('gambar'), 'partners');

        Partner::create($validated);

        return redirect()->route('console.partners.index')->with('success', 'Partner berhasil ditambahkan.');
    }

    public function show(Partner $partner): View
    {
        return view('console.partners.show', compact('partner'));
    }

    public function edit(Partner $partner): View
    {
        return view('console.partners.edit', compact('partner'));
    }

    public function update(Request $request, Partner $partner): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'is_active' => ['boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('gambar')) {
            $this->imageService->deleteFile($partner->gambar);
            $validated['gambar'] = $this->imageService->uploadAndConvertToWebp($request->file('gambar'), 'partners');
        }

        $partner->update($validated);

        return redirect()->route('console.partners.index')->with('success', 'Partner berhasil diperbarui.');
    }

    public function destroy(Partner $partner): RedirectResponse
    {
        $this->imageService->deleteFile($partner->gambar);

        $partner->delete();

        return redirect()->route('console.partners.index')->with('success', 'Partner berhasil dihapus.');
    }
}
