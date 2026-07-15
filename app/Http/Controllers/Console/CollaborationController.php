<?php

namespace App\Http\Controllers\Console;

use App\Http\Controllers\Controller;
use App\Models\Collaboration;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CollaborationController extends Controller
{
    public function index(Request $request): View
    {
        $query = Collaboration::query();

        if ($request->filled('search')) {
            $query->where(function ($q) use ($request) {
                $q->where('nama', 'like', '%'.$request->search.'%')
                    ->orWhere('email', 'like', '%'.$request->search.'%')
                    ->orWhere('whatsapp', 'like', '%'.$request->search.'%');
            });
        }

        if ($request->filled('status')) {
            $query->where('status', $request->status);
        }

        if ($request->filled('date_from')) {
            $query->whereDate('created_at', '>=', $request->date_from);
        }

        if ($request->filled('date_to')) {
            $query->whereDate('created_at', '<=', $request->date_to);
        }

        $collaborations = $query->orderBy('created_at', 'desc')
            ->paginate(10)
            ->withQueryString();

        $totalCollaborations = Collaboration::count();
        $baruCount = Collaboration::where('status', Collaboration::STATUS_BARU)->count();
        $dibacaCount = Collaboration::where('status', Collaboration::STATUS_DIBACA)->count();
        $ditindaklanjutiCount = Collaboration::where('status', Collaboration::STATUS_DITINDAKLANJUTI)->count();

        return view('console.collaborations.index', compact('collaborations', 'totalCollaborations', 'baruCount', 'dibacaCount', 'ditindaklanjutiCount'));
    }

    public function show(Collaboration $collaboration): View
    {
        if ($collaboration->isBaru()) {
            $collaboration->update(['status' => Collaboration::STATUS_DIBACA]);
        }

        return view('console.collaborations.show', compact('collaboration'));
    }

    public function updateStatus(Request $request, Collaboration $collaboration): RedirectResponse
    {
        $validated = $request->validate([
            'status' => ['required', 'string', 'in:baru,dibaca,ditindaklanjuti'],
        ]);

        $collaboration->update($validated);

        return redirect()->route('console.collaborations.show', $collaboration)->with('success', 'Status kolaborasi berhasil diperbarui.');
    }

    public function destroy(Collaboration $collaboration): RedirectResponse
    {
        $collaboration->delete();

        return redirect()->route('console.collaborations.index')->with('success', 'Data kolaborasi berhasil dihapus.');
    }
}
