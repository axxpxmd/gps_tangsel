<?php

namespace App\Livewire;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Pengurus — GPS TangSel')]
class Pengurus extends Component
{
    public function render()
    {
        return view('livewire.pengurus')
            ->layout('layouts.app');
    }
}
