<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Category;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Berita & Artikel — GPS TangSel')]
class Berita extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

    #[Url]
    public string $category = '';

    #[Url]
    public string $date_from = '';

    #[Url]
    public string $date_to = '';

    public function applyFilters(): void
    {
        $this->resetPage();
    }

    public function resetFilters(): void
    {
        $this->reset('search', 'category', 'date_from', 'date_to');
        $this->resetPage();
    }

    public function render()
    {
        $articles = Article::query()
            ->with('category')
            ->published()
            ->when($this->search, fn ($q) => $q->where('title', 'like', "%{$this->search}%")->orWhere('excerpt', 'like', "%{$this->search}%"))
            ->when($this->category, fn ($q) => $q->whereHas('category', fn ($q) => $q->where('slug', $this->category)))
            ->when($this->date_from, fn ($q) => $q->whereDate('published_at', '>=', $this->date_from))
            ->when($this->date_to, fn ($q) => $q->whereDate('published_at', '<=', $this->date_to))
            ->latest('published_at')
            ->paginate(9);

        $categories = Category::all();

        return view('livewire.berita', [
            'articles' => $articles,
            'categories' => $categories,
        ])->layout('layouts.app');
    }
}
