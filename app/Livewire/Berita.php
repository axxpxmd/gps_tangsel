<?php

namespace App\Livewire;

use App\Models\Article;
use Livewire\Attributes\Title;
use Livewire\Attributes\Url;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Berita & Artikel — GPS TANGSEL')]
class Berita extends Component
{
    use WithPagination;

    #[Url]
    public string $search = '';

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
        $this->reset('search', 'date_from', 'date_to');
        $this->resetPage();
    }

    public function render()
    {
        $articles = Article::query()
            ->with('category')
            ->published()
            ->when($this->search, fn ($q) => $q->where('title', 'like', "%{$this->search}%")->orWhere('excerpt', 'like', "%{$this->search}%"))
            ->when($this->date_from, fn ($q) => $q->whereDate('published_at', '>=', $this->date_from))
            ->when($this->date_to, fn ($q) => $q->whereDate('published_at', '<=', $this->date_to))
            ->latest('published_at')
            ->paginate(9);

        return view('livewire.berita', [
            'articles' => $articles,
        ])->layout('layouts.app');
    }
}
