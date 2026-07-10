<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ActivityController extends Controller
{
    public function index(): View
    {
        $activities = Activity::orderBy('date', 'desc')->get();

        return view('console.activities.index', compact('activities'));
    }

    public function create(): View
    {
        return view('console.activities.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'location' => ['required', 'string', 'max:255'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
            'description' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'is_active' => ['boolean'],
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('activities', 'sftp');
        }

        Activity::create($validated);

        return redirect()->route('console.activities.index')->with('success', 'Kegiatan berhasil ditambahkan.');
    }

    public function show(Activity $activity): View
    {
        return view('console.activities.show', compact('activity'));
    }

    public function edit(Activity $activity): View
    {
        return view('console.activities.edit', compact('activity'));
    }

    public function update(Request $request, Activity $activity): RedirectResponse
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'date' => ['required', 'date'],
            'location' => ['required', 'string', 'max:255'],
            'latitude' => ['nullable', 'numeric', 'between:-90,90'],
            'longitude' => ['nullable', 'numeric', 'between:-180,180'],
            'description' => ['required', 'string'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'is_active' => ['boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('gambar')) {
            if ($activity->gambar) {
                Storage::disk('sftp')->delete($activity->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('activities', 'sftp');
        }

        $activity->update($validated);

        return redirect()->route('console.activities.index')->with('success', 'Kegiatan berhasil diperbarui.');
    }

    public function destroy(Activity $activity): RedirectResponse
    {
        if ($activity->gambar) {
            Storage::disk('sftp')->delete($activity->gambar);
        }

        $activity->delete();

        return redirect()->route('console.activities.index')->with('success', 'Kegiatan berhasil dihapus.');
    }
}
