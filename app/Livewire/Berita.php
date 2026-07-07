<?php

namespace App\Livewire;

use App\Models\Article;
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

    public array $categories = [
        'Safari Subuh',
        'Sosial',
        'Kesehatan',
        'Pengumuman',
        'Dakwah',
        'Agenda Kegiatan',
    ];

    public function updatingSearch(): void
    {
        $this->resetPage();
    }

    public function updatingCategory(): void
    {
        $this->resetPage();
    }

    public function render()
    {
        $articles = Article::query()
            ->published()
            ->when($this->search, fn ($q) => $q->where('title', 'like', "%{$this->search}%")->orWhere('excerpt', 'like', "%{$this->search}%"))
            ->when($this->category, fn ($q) => $q->where('category', $this->category))
            ->latest('published_at')
            ->paginate(9);

        return view('livewire.berita', [
            'articles' => $articles,
        ])->layout('layouts.app');
    }
}
