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
            ->published()
            ->where('slug', $slug)
            ->firstOrFail();
    }

    public function render(): View
    {
        $related = Article::query()
            ->published()
            ->where('category', $this->article->category)
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
