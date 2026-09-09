<?php

namespace App\Livewire;

use App\Models\Incidence;
use App\Models\TypeIncidence;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Livewire\WithFileUploads;

class RegisterIncidence extends Component
{

    use WithFileUploads;


    public $description;

    public $typeIncidence;

    public $location;

    public $reference;

    public $incidenceDate;

    public $incidenceTime;

    public $evidence;

    public $latitude;
    
    public $longitude;
    
    public function registerIncidence()
    {
        
        $this->validate([
            'description' => 'required|string|max:100',
            'typeIncidence' => 'required',
            'location' => 'required|string|max:100',
            'latitude' => 'required',
            'longitude' => 'required',
            'reference' => 'nullable|string|max:100',
            'evidence' => 'required|image|max:2048',
            'incidenceDate' => 'required',
        ]);

        $occurredAt = $this->incidenceDate;

        if ($this->incidenceTime) {
            $occurredAt .= ' ' . $this->incidenceTime;
        } else {
            $occurredAt .= ' 00:00:00';
        }



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
                'longitude' => $this->longitude,
                'latitude' => $this->latitude,
                'occurred_at' => $occurredAt,
            ]);

           
            


            if($this->evidence){
                $path = $this->evidence->store('incidences');
                
                $incidence->images()->create([
                    'image_path' => $path,
                ]);
            }
            DB::commit();                      
                
            $this->reset();


            notify()->success('Listo', 'incidencia registrada!');
            return $this->redirectRoute('neighbor.incidences');

        } catch (\Exception $e) {
            //throw $th;
            DB::rollBack();
            session()->flash('incidence_error','Errror en Registrar Incidencia: ' . $e->getMessage());
        }
        

        

    }

    public function render()
    {
        $typeIncidences = TypeIncidence::select('id','name')->get();

        return view('livewire.register-incidence',[
            'typeIncidences' => $typeIncidences
        ])->layout('layouts.neighbor.dashboard');
    }

    public function removeImage()
        {
            // unset($this->evidences[$index]);
            // $this->evidences = array_values($this->evidences);
            $this->reset('evidence');
        }
}
