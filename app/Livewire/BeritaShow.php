<?php

namespace App\Livewire;

use App\Models\Article;
use Illuminate\View\View;
use Livewire\Component;

class BeritaShow extends Component
{
    public Article $article;

    public function mount(string $slug): void
    {
        $this->article = Article::query()
            ->with(['images', 'categories', 'tags'])
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function render(): View
    {
        $categoryIds = $this->article->categories->pluck('id');

        $related = Article::query()
            ->published()
            ->whereHas('categories', fn ($q) => $q->whereIn('categories.id', $categoryIds))
            ->where('id', '!=', $this->article->id)
            ->latest('published_at')
            ->take(3)
            ->get();

        return view('livewire.berita-show', [
            'related' => $related,
        ])->layout('layouts.app')
            ->title($this->article->title.' — GPS TangSel');
    }
}
