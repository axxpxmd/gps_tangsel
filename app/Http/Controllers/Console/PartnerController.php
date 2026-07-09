<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Models\Partner;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class PartnerController extends Controller
{
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
            'description' => ['nullable', 'string', 'max:255'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'is_active' => ['boolean'],
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('partners', 'sftp');
        }

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
            'description' => ['nullable', 'string', 'max:255'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'is_active' => ['boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('gambar')) {
            if ($partner->gambar) {
                Storage::disk('sftp')->delete($partner->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('partners', 'sftp');
        }

        $partner->update($validated);

        return redirect()->route('console.partners.index')->with('success', 'Partner berhasil diperbarui.');
    }

    public function destroy(Partner $partner): RedirectResponse
    {
        if ($partner->gambar) {
            Storage::disk('sftp')->delete($partner->gambar);
        }

        $partner->delete();

        return redirect()->route('console.partners.index')->with('success', 'Partner berhasil dihapus.');
    }
}
