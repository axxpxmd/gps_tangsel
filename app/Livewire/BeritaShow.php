<?php

namespace App\Livewire;

use App\Models\Activity;
use App\Models\Article;
use App\Services\PrayerTimesService;
use Illuminate\View\View;
use Livewire\Component;

class BeritaShow extends Component
{
    public Article $article;

    public string $commentContent = '';

    public function mount(string $slug): void
    {
        $this->article = Article::query()
            ->with(['images', 'category', 'tags'])
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function submitComment(): void
    {
        if (! session()->has('jemaah')) {
            $this->addError('commentContent', 'Silakan masuk dengan Google terlebih dahulu.');

            return;
        }

        $this->validate([
            'commentContent' => 'required|string|min:3|max:1000',
        ], [
            'commentContent.required' => 'Isi komentar tidak boleh kosong.',
            'commentContent.min' => 'Komentar minimal 3 karakter.',
            'commentContent.max' => 'Komentar maksimal 1000 karakter.',
        ]);

        $jemaah = session('jemaah');

        $this->article->comments()->create([
            'name' => $jemaah['name'],
            'email' => $jemaah['email'],
            'avatar' => $jemaah['avatar'],
            'google_id' => $jemaah['google_id'],
            'content' => $this->commentContent,
            'is_active' => true,
        ]);

        $this->commentContent = '';

        session()->flash('comment_success', 'Komentar Anda berhasil dikirim.');
    }

    public function render(PrayerTimesService $prayerTimes): View
    {
        $related = Article::query()
            ->published()
            ->where('id', '!=', $this->article->id)
            ->inRandomOrder()
            ->take(3)
            ->get();

        $latest = Article::query()
            ->published()
            ->where('id', '!=', $this->article->id)
            ->latest('published_at')
            ->take(5)
            ->get();

        $nextActivity = Activity::query()
            ->where('is_active', true)
            ->where('date', '>=', now('Asia/Jakarta'))
            ->orderBy('date', 'asc')
            ->first();

        $comments = $this->article->comments()
            ->where('is_active', true)
            ->get();

        return view('livewire.berita-show', [
            'related' => $related,
            'latest' => $latest,
            'prayerSchedule' => $prayerTimes->today(),
            'nextActivity' => $nextActivity,
            'comments' => $comments,
        ])->layout('layouts.app')
            ->title($this->article->title.' — GPS TangSel');
    }
}
