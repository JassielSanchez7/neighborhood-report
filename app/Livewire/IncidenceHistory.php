<?php

namespace App\Livewire;

use Livewire\Component;

class IncidenceHistory extends Component
{
    public function render()
    {
        $neighbor = auth('neighbor')->user();

        $incidences = $neighbor->incidences()->latest()->limit(10)->get();

        return view('livewire.incidence-history',[
            'incidences' => $incidences
        ])->layout('layouts.neighbor.dashboard');
    }
}
