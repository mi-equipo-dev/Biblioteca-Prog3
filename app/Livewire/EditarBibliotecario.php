<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Usuario;
use App\Models\Rol;

class EditarBibliotecario extends Component
{
    public $usuario;
    public $nombre, $apellido, $CUIL, $domicilio, $telefono, $email, $id_rol;

    public function mount(Usuario $usuario)
    {
        $this->usuario = $usuario;

        // Inicializa propiedades
        $this->nombre = $usuario->nombre;
        $this->apellido = $usuario->apellido;
        $this->CUIL = $usuario->CUIL;
        $this->domicilio = $usuario->domicilio;
        $this->telefono = $usuario->telefono;
        $this->email = $usuario->email;
        $this->id_rol = $usuario->id_rol;
    }

    public function update()
    {
        $this->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'CUIL' => 'required',
            'email' => 'required|email|unique:usuarios,email,' . $this->usuario->id,
            'id_rol' => 'required',
        ]);

        $this->usuario->update([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'CUIL' => $this->CUIL,
            'domicilio' => $this->domicilio,
            'telefono' => $this->telefono,
            'email' => $this->email,
            'id_rol' => $this->id_rol,
        ]);

        session()->flash('mensaje', 'Usuario actualizado exitosamente');
        return redirect()->route('usuarios.index');
    }

    public function render()
    {
        return view('livewire.editar-bibliotecario', [
            'roles' => Rol::all(),
        ]);
    }
}
