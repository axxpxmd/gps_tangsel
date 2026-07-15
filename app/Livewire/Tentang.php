<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Tentang Kami — GPS TANGSEL')]
class Tentang extends Component
{
    public function render()
    {
        return view('livewire.tentang')
            ->layout('layouts.app');
    }
}
