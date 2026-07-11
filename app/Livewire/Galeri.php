<?php

namespace App\Livewire;

use App\Models\Gallery;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Galeri — GPS TangSel')]
class Galeri extends Component
{
    public $selectedAlbum = '';

    public $startDate = '';

    public $endDate = '';

    public function render()
    {
        $albums = Gallery::where('is_active', true)->distinct()->pluck('album');

        $query = Gallery::with('images')->where('is_active', true);

        if ($this->selectedAlbum) {
            $query->where('album', $this->selectedAlbum);
        }

        if ($this->startDate) {
            $query->whereDate('date', '>=', $this->startDate);
        }

        if ($this->endDate) {
            $query->whereDate('date', '<=', $this->endDate);
        }

        $galleries = $query->orderBy('date', 'desc')->get();

        $activeFilters = false;
        if ($this->selectedAlbum || $this->startDate || $this->endDate) {
            $activeFilters = true;
        }

        return view('livewire.galeri', compact('galleries', 'albums', 'activeFilters'))
            ->layout('layouts.app');
    }

    public function filterAlbum($album): void
    {
        $this->selectedAlbum = $album === $this->selectedAlbum ? '' : $album;
    }

    public function resetFilters(): void
    {
        $this->selectedAlbum = '';
        $this->startDate = '';
        $this->endDate = '';
    }
}
