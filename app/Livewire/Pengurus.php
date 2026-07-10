<?php

namespace App\Livewire;

use App\Models\BoardMember;
use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Pengurus — GPS TangSel')]
class Pengurus extends Component
{
    public function render()
    {
        $pembina = BoardMember::where('is_active', true)->where('group', 'pembina')->get();
        $pengawas = BoardMember::where('is_active', true)->where('group', 'pengawas')->get();
        $pengurusHarian = BoardMember::where('is_active', true)->where('group', 'pengurus_harian')->get();

        return view('livewire.pengurus', compact('pembina', 'pengawas', 'pengurusHarian'))
            ->layout('layouts.app');
    }
}
