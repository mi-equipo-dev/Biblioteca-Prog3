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
    public $ultimosUsuariosCreados = [];

    public function save()
    {
        $this->validate([
            'id_rol' => 'required',
        ]);
        if ($this->id_rol == 3) { //Si es usuario
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

        $usuario = Usuario::create([
            'nombre' => $this->nombre,
            'apellido' => $this->apellido,
            'CUIL' => $this->CUIL,
            'domicilio' => $this->domicilio,
            'telefono' => $this->telefono,
            'email' => $this->email,
            'contrasenia' => Hash::make($this->contrasenia),
            'id_rol' => $this->id_rol,
        ]);

        $rol_texto = Rol::find($this->id_rol)->rol ?? '';
        session()->flash('mensaje', "$rol_texto creado exitosamente");
        $this->reset([
            'nombre',
            'apellido',
            'CUIL',
            'domicilio',
            'telefono',
            'email',
            'contrasenia',
            'id_rol',
            'ocultarContrasenia'
        ]); // limpia los campos
        $this->ultimosUsuariosCreados[] = Usuario::with('rol')->find($usuario->id); // Agrega el usuario recién creado a la lista de últimos usuarios creados
    }
    public function verificarVisibilidadContrasenia()
    {
        if ($this->id_rol == 3) { // Si es usuario
            $this->ocultarContrasenia = true; // No es obligatorio para usuarios
        } else {
            $this->ocultarContrasenia = false; // Para otros roles, mostrar el campo de contraseña
        }
    }
    public function onRolSeleccionado($value = 0)
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
            $rolesDisponibles = Rol::where('rol', 'Usuario')->get();
            $this->id_rol = $rolesDisponibles->first()->id ?? null; // Asigna el primer rol disponible si existe
        }
        $this->verificarVisibilidadContrasenia();
        return view('livewire.crear-bibliotecario', [
            'roles' => $rolesDisponibles,
            'ocultarContrasenia' => $this->ocultarContrasenia,
            'ultimosUsuariosCreados' => $this->ultimosUsuariosCreados,
        ]);
    }
}
