<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Models\BoardMember;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class BoardMemberController extends Controller
{
    public function index(): View
    {
        $members = BoardMember::latest()->get();

        return view('console.board-members.index', compact('members'));
    }

    public function create(): View
    {
        return view('console.board-members.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'group' => ['required', 'string', 'in:pembina,pengawas,pengurus_harian'],
            'phone' => ['nullable', 'string', 'max:20'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'is_active' => ['boolean'],
        ]);

        if ($request->hasFile('gambar')) {
            $validated['gambar'] = $request->file('gambar')->store('board-members', 'sftp');
        }

        BoardMember::create($validated);

        return redirect()->route('console.board-members.index')->with('success', 'Pengurus berhasil ditambahkan.');
    }

    public function show(BoardMember $board_member): View
    {
        return view('console.board-members.show', ['member' => $board_member]);
    }

    public function edit(BoardMember $board_member): View
    {
        return view('console.board-members.edit', ['member' => $board_member]);
    }

    public function update(Request $request, BoardMember $board_member): RedirectResponse
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'position' => ['required', 'string', 'max:255'],
            'group' => ['required', 'string', 'in:pembina,pengawas,pengurus_harian'],
            'phone' => ['nullable', 'string', 'max:20'],
            'gambar' => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'is_active' => ['boolean'],
        ]);

        $validated['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('gambar')) {
            if ($board_member->gambar) {
                Storage::disk('sftp')->delete($board_member->gambar);
            }
            $validated['gambar'] = $request->file('gambar')->store('board-members', 'sftp');
        }

        $board_member->update($validated);

        return redirect()->route('console.board-members.index')->with('success', 'Pengurus berhasil diperbarui.');
    }

    public function destroy(BoardMember $board_member): RedirectResponse
    {
        if ($board_member->gambar) {
            Storage::disk('sftp')->delete($board_member->gambar);
        }

        $board_member->delete();

        return redirect()->route('console.board-members.index')->with('success', 'Pengurus berhasil dihapus.');
    }
}
