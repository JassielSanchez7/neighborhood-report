<?php

namespace App\Livewire;

use App\Models\Incidence;
use Livewire\Component;

class NeighborDashboard extends Component
{
    public function render()
    {
        $neighbor = auth('neighbor')->user();

        $recentIncidences = $neighbor->incidences()->latest()->limit(5)->get();

        $stats = [
            'total_incidences' => $neighbor->incidences()->count(),
            'incidences_pending' => $neighbor->incidences()->where('status','pendiente')->count(),
            'incidences_closed' => $neighbor->incidences()->where('status','cerrada')->count(),
        ];


        return view('livewire.neighbor-dashboard',[
            'stats' => $stats,
            'recentIncidences' => $recentIncidences
        ])
        ->layout('layouts.neighbor.dashboard');
    }
}
