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

    public function mount(string $slug): void
    {
        $this->article = Article::query()
            ->with(['images', 'category', 'tags'])
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function render(PrayerTimesService $prayerTimes): View
    {
        $related = Article::query()
            ->published()
            ->where('category_id', $this->article->category_id)
            ->where('id', '!=', $this->article->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        $nextActivity = Activity::query()
            ->where('is_active', true)
            ->where('date', '>=', now('Asia/Jakarta'))
            ->orderBy('date', 'asc')
            ->first();

        return view('livewire.berita-show', [
            'related' => $related,
            'prayerSchedule' => $prayerTimes->today(),
            'nextActivity' => $nextActivity,
        ])->layout('layouts.app')
            ->title($this->article->title.' — GPS TangSel');
    }
}
