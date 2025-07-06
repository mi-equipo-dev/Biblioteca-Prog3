<?php

namespace App\Http\Controllers;

use App\Models\Rol;
use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $usuarios = Usuario::with(['rol'])->get();
        return view('usuarios.index', compact('usuarios'));
        // Realiza una consulta a la base de datos para obtener todos los usuarios y los relaciona con sus roles y préstamos correspondientes.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $roles = Rol::all(); // Obtener todos los roles disponibles
        return view('usuarios.create', compact('roles'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        /*
        protected $fillable = ['nombre', 'apellido', 'CUIL', 'domicilio', 'telefono', 'email', 'contrasenia', 'id_rol']; */
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'CUIL' => 'required|string|max:20|unique:usuarios,CUIL',
            'domicilio' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'email' => 'required|email|unique:usuarios,email',
            'contrasenia' => 'required|string|min:1',
            'id_rol' => 'required|exists:roles,id',
        ]);

        $usuario = Usuario::create($validated);
        $usuario -> contrasenia = Hash::make($validated['contrasenia']);
        $usuario->save();
        return redirect()->route('usuarios.index')->with('success', 'Usuario creado exitosamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $usuario = Usuario::with(['rol', 'prestamos'])->findOrFail($id);
        return view('usuarios.show', compact('usuario'));
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $usuario = Usuario::with(['rol'])->findOrFail($id);
        $roles = Rol::all(); // Obtener todos los roles disponibles
        return view('usuarios.edit', compact('usuario', 'roles'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $usuario = Usuario::findOrFail($id);
        $validated = $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'CUIL' => 'required|string|max:20|unique:usuarios,CUIL,' . $usuario->id,
            'domicilio' => 'nullable|string|max:255',
            'telefono' => 'nullable|string|max:20',
            'email' => 'required|email|unique:usuarios,email,' . $usuario->id,
            'contrasenia' => 'nullable|string|min:1', // Permitir contraseña nula para no actualizarla si no se proporciona
            'id_rol' => 'required|exists:roles,id',
        ]);
        $usuario->update($validated);
        if (isset($validated['contrasenia'])) {
            $usuario->contrasenia = Hash::make($validated['contrasenia']);
            $usuario->save();
        }

        return redirect()->route('usuarios.index')->with('success', 'Usuario actualizado exitosamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();
        return redirect()->route('usuarios.index')->with('success', 'Usuario eliminado exitosamente.');
    }
}
