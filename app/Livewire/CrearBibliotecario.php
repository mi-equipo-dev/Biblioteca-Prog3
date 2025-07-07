<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Support\Facades\Hash;

class CrearBibliotecario extends Component
{
    public $nombre, $apellido, $CUIL, $domicilio, $telefono, $email, $contrasenia, $id_rol;
    public $ocultarContrasenia = false; // Para ocultar el campo de contraseña si es usuario

    public function save()
    {
        $this->validate([
            'id_rol' => 'required',
        ]);
        if($this->id_rol == 3) { //Si es usuario
            $this->contrasenia = "usuario"; // No es obligatorio para usuarios
        }
        $this->validate([
            'nombre' => 'required',
            'apellido' => 'required',
            'CUIL' => 'required',
            'email' => 'required|email|unique:usuarios,email',
            'contrasenia' => 'required|min:5',
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
    public function verificarVisibilidadContrasenia()
    {
        if ($this->id_rol == 3) { // Si es usuario
            $this->ocultarContrasenia = true; // No es obligatorio para usuarios
        } else {
            $this->ocultarContrasenia = false; // Para otros roles, mostrar el campo de contraseña
        }
    }
    public function onRolSeleccionado($value=0)
    {
        $this->verificarVisibilidadContrasenia();
    }

    public function render()
    {
        //Si el usuario autenticado es administrador, se le permite crear bibliotecarios
        $rolesDisponibles = [];
        if (auth()->user()->es_administrador) {
            $rolesDisponibles = Rol::all();
        } else {
            $rolesDisponibles = Rol::where('rol','Usuario')->get();
            $this->id_rol = $rolesDisponibles->first()->id ?? null; // Asigna el primer rol disponible si existe
        }
        $this->verificarVisibilidadContrasenia();
        return view('livewire.crear-bibliotecario', [
            'roles' => $rolesDisponibles,
            'ocultarContrasenia' => $this->ocultarContrasenia,
        ]);
    }
}

