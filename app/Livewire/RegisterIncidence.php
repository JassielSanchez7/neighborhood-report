<?php

namespace App\Livewire;

use App\Models\Incidence;
use App\Models\TypeIncidence;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterIncidence extends Component
{

    use WithFileUploads;

    public $description;

    public $typeIncidence;

    public $location;

    public $reference;

    public $evidence;


    public function registerIncidence()
    {
        
        $this->validate([
            'description' => 'required|string|max:100',
            'typeIncidence' => 'required',
            'location' => 'required|string|max:100',
            'reference' => 'nullable|string|max:100',
            'evidence' => 'required|image|max:2048'
        ]);



        try {
            DB::beginTransaction();            
            // $incidence = Incidence::create([
            //     'description' => $this->description,
            //     'typeIncidence' => $this->typeIncidence,
            //     'location' => $this->location . ', ' . $this->reference,            
            // ]);

            $incidence = auth('neighbor')->user()->incidences()->create([
                'description' => $this->description,
                'type_incidence_id' => $this->typeIncidence,
                'location' => $this->location . ', ' . $this->reference,
            ]);

            if($this->evidence){
                $path = $this->evidence->store('incidences');
                
                $incidence->images()->create([
                    'image_path' => $path,
                ]);
            }
            DB::commit();

        } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            session()->flash('incidence_error','Errror en Registrar Incidencia: ' . $e->getMessage());
        }
        

        $this->reset();
        session()->flash('incidence_success','Incidencia Registrada con exito');

    }

    public function render()
    {
        $typeIncidences = TypeIncidence::select('id','name')->get();

        return view('livewire.register-incidence',[
            'typeIncidences' => $typeIncidences
        ])->layout('layouts.neighbor.dashboard');
    }
}
