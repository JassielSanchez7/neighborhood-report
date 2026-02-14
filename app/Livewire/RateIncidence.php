<?php

namespace App\Livewire;

use App\Models\Incidence;
use Livewire\Component;

class RateIncidence extends Component
{
    public Incidence $incidence;

    public $comment;

    public $rating;
    public $acgRating;

    public function setRating($val)
    {
        if($this->rating == $val) {
            $this->rating = 0;
        }else{
            $this->rating = $val;
        }
    }

    public function registerIncidence()
    {
        $this->validate([
            'comment' => 'required|string|max:255',
            'rating' => 'required'
        ]);

        $this->incidence->rating()->create([
            'neighbor_id' => auth()->user()->id,
            'rating' => $this->rating,
            'comment' => $this->comment,
        ]);

        session()->flash('rating_success','Calificacion Registrada con exito');


    }

    public function mount($id)
    {
        $this->incidence = Incidence::where('id',$id)
            ->where('neighbor_id',auth('neighbor')->id())->firstOrFail();
    }
    
    public function render()
    {
        return view('livewire.rate-incidence')
        ->layout('layouts.neighbor.dashboard');
    }
}
