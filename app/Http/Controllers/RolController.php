<?php

namespace App\Http\Controllers;

use App\Models\Rol;//importamos la clase del namespace
use Illuminate\Http\Request;

class RolController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $roles = Rol::all(); // Obtiene todos los roles de la tabla roles
        return view('roles.index', compact('roles')); // Retorna la vista con los roles
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('roles.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Validamos que los campos que necesitamos estén presentes y sean cortos
        $validated = $request->validate([
            "rol"=>"required|max:100"
        ]);

        $rol = Rol::create($validated);
        return redirect()->route('roles.index')->with('success', 'Rol creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //permite buscar un rol en específico por la ID
        $rol = Rol::findOrFail($id);
        return view("roles.show",compact("rol"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
