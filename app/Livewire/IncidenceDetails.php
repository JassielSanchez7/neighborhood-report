<?php

namespace App\Livewire;

use App\Models\Incidence;
use Livewire\Component;

class IncidenceDetails extends Component
{

    public Incidence $incidence;

    public function mount($id)
    {
        $this->incidence = Incidence::where('id',$id)
            ->where('neighbor_id',auth('neighbor')->id())->firstOrFail();
    }

    public function render()
    {
        return view('livewire.incidence-details')
        ->layout('layouts.neighbor.dashboard');
    }
}
