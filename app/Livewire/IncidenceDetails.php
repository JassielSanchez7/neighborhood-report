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

    public function deleteIncidence($id){
        try {
            $incidence = auth('neighbor')
                ->user()
                ->incidences()
                ->with('images')
                ->findOrFail($id);

            // eliminar imágenes físicas (opcional)
            foreach ($incidence->images as $image) {
                \Storage::disk('public')->delete($image->image_path);
            }

            // elimina registros relacionados
            $incidence->images()->delete();

            // elimina incidencia
            $incidence->delete();

            notify()->error('Incidencia Eliminada Correctamente', 'Eliminada!');
            return $this->redirectRoute('neighbor.incidences');



        } catch (\Exception $e) {

            session()->flash('error_delete', 'Error al eliminar: '.$e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.incidence-details')
        ->layout('layouts.neighbor.dashboard');
    }
}
