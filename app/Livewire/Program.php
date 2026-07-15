<?php

namespace App\Livewire;

use App\Models\Program as ProgramModel;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Program Unggulan — GPS TANGSEL')]
class Program extends Component
{
    public function render()
    {
        $programs = ProgramModel::where('is_active', true)->latest()->get();

        return view('livewire.program', compact('programs'))
            ->layout('layouts.app');
    }
}
