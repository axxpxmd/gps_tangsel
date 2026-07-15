<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Visi & Misi — GPS TANGSEL')]
class VisiMisi extends Component
{
    public function render()
    {
        return view('livewire.visi-misi')
            ->layout('layouts.app');
    }
}
