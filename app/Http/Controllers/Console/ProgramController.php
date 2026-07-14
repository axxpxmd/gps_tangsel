<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Models\Program;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class ProgramController extends Controller
{
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
            $validated['gambar'] = $this->uploadAndConvertToWebp($request->file('gambar'), 'programs');
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
            if ($program->gambar) {
                Storage::disk('sftp')->delete($program->gambar);
            }
            $validated['gambar'] = $this->uploadAndConvertToWebp($request->file('gambar'), 'programs');
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

    /**
     * Upload gambar dan konversi ke WebP jika bukan WebP.
     */
    protected function uploadAndConvertToWebp(UploadedFile $file, string $directory): string
    {
        $extension = strtolower($file->getClientOriginalExtension());

        if ($extension === 'webp') {
            return $file->store($directory, 'sftp');
        }

        $imageContent = file_get_contents($file->getRealPath());
        $image = imagecreatefromstring($imageContent);

        if ($image === false) {
            return $file->store($directory, 'sftp');
        }

        $filename = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME).'.webp';
        $path = $directory.'/'.$filename;

        ob_start();
        imagewebp($image, null, 85);
        $webpData = ob_get_clean();

        imagedestroy($image);

        Storage::disk('sftp')->put($path, $webpData);

        return $path;
    }
}
