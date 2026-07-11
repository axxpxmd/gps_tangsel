<?php

namespace App\Livewire;

use App\Models\Gallery;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Galeri — GPS TangSel')]
class Galeri extends Component
{
    public $selectedAlbum = '';

    public function render()
    {
        $albums = Gallery::where('is_active', true)->distinct()->pluck('album');
        $query = Gallery::with('images')->where('is_active', true);

        if ($this->selectedAlbum) {
            $query->where('album', $this->selectedAlbum);
        }

        $galleries = $query->latest()->get();

        return view('livewire.galeri', compact('galleries', 'albums'))
            ->layout('layouts.app');
    }

    public function filterAlbum($album): void
    {
        $this->selectedAlbum = $album === $this->selectedAlbum ? '' : $album;
    }
}
