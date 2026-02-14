<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class Profile extends Component
{
    public $full_name;

    public $email;

    public $dni;

    //Campos de contraseña
    public $current_password;

    public $new_password;

    public $new_password_confirmation;

    public function updateProfile()
    {
        $this->validate([
            'full_name' => 'required|string|max:100',
            'email' => 'required|email|unique:neighbors,email,' . auth('neighbor')->id(),
        ]);

        auth('neighbor')->user()->update([
            'full_name' => $this->full_name,
            'email' => $this->email,
        ]);
        
        session()->flash('profile_success','Perfil actualizado con exito');

    }

    public function updatePassword()
    {
        $this->validate([
            'current_password' => 'required',
            'new_password' => 'required|min:8|confirmed',
        ]);

        if(!Hash::check($this->current_password,auth('neighbor')->user()->password)){
            session()->flash('password_error','La contraseña actual es incorrecta');
            return;
        }

        auth('neighbor')->user()->update([
            'password' => Hash::make($this->new_password),
        ]);

        $this->reset(['current_password','new_password','new_password_confirmation']);
        session()->flash('password_success','Contraseña actualizada con exito');

    }

    public function mount(){
        $neighbor = auth('neighbor')->user();
        $this->full_name = $neighbor->full_name;
        $this->email = $neighbor->email;
        $this->dni = $neighbor->dni;
    }

    public function render()
    {
        return view('livewire.profile')->layout('layouts.neighbor.dashboard');
    }
}
