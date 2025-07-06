<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class CrearBibliotecario extends Component
{
    public $nombre, $apellido, $CUIL, $domicilio, $telefono, $email, $contrasenia, $id_rol;

    public function save()
    {
        $this->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'CUIL' => 'required',
            'email' => 'required|email|unique:usuarios,email',
            'contrasenia' => 'required|min:6',
            'id_rol' => 'required',
        ]);

        Usuario::create([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'CUIL' => $this->CUIL,
            'domicilio' => $this->domicilio,
            'telefono' => $this->telefono,
            'email' => $this->email,
            'contrasenia' => Hash::make($this->contrasenia),
            'id_rol' => $this->id_rol,
        ]);

        session()->flash('mensaje', 'Bibliotecario creado exitosamente');
        $this->reset(); // limpia los campos
    }

    public function render()
    {
        return view('livewire.crear-bibliotecario', [
            'roles' => Rol::all()
        ]);
    }
}

