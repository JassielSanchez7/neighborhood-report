<?php

namespace App\Livewire;

use Livewire\Component;

class RatingListing extends Component
{
    public function render()
    {
        $neighbor = auth('neighbor')->user();
        $ratings = $neighbor->ratings()->latest()->limit(10)->get();

        return view('livewire.rating-listing',[
            'ratings' => $ratings
        ])->layout('layouts.neighbor.dashboard');
    }
}
