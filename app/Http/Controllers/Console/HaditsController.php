<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Models\Hadits;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class HaditsController extends Controller
{
    public function index(): View
    {
        $hadits = Hadits::latest()->get();

        return view('console.hadits.index', compact('hadits'));
    }

    public function create(): View
    {
        return view('console.hadits.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'arabic_text' => ['required', 'string'],
            'translation' => ['required', 'string'],
            'source' => ['required', 'string', 'max:255'],
            'is_active' => ['boolean'],
        ]);

        if ($request->boolean('is_active')) {
            Hadits::where('is_active', true)->update(['is_active' => false]);
        }

        Hadits::create($validated);

        return redirect()->route('console.hadits.index')->with('success', 'Hadits berhasil ditambahkan.');
    }

    public function show(Hadits $hadits): View
    {
        return view('console.hadits.show', compact('hadits'));
    }

    public function edit(Hadits $hadits): View
    {
        return view('console.hadits.edit', compact('hadits'));
    }

    public function update(Request $request, Hadits $hadits): RedirectResponse
    {
        $validated = $request->validate([
            'arabic_text' => ['required', 'string'],
            'translation' => ['required', 'string'],
            'source' => ['required', 'string', 'max:255'],
            'is_active' => ['boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        // Hanya 1 yang boleh aktif
        if ($validated['is_active']) {
            Hadits::where('id', '!=', $hadits->id)->update(['is_active' => false]);
        }

        $hadits->update($validated);

        return redirect()->route('console.hadits.index')->with('success', 'Hadits berhasil diperbarui.');
    }

    public function destroy(Hadits $hadits): RedirectResponse
    {
        $hadits->delete();

        return redirect()->route('console.hadits.index')->with('success', 'Hadits berhasil dihapus.');
    }
}
