<?php

namespace App\Http\Controllers;

use App\Models\Destino;//importamos la clase del namespace
use Illuminate\Http\Request;

class DestinoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $destinos = Destino::all(); // Obtiene todos los destinos de la tabla destinos
        // Retorna la vista con los destinos
        return view('destinos.index', compact('destinos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('destinos.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
           "destino" => "required|string|min:1|max:100"// min 1 para no recibir string vacío
        ]);

        $destino = Destino::create($validated);
        return redirect()->route('destinos.index')->with('success', 'Destino creado correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $destino = Destino::findOrFail($id);
        return view('destinos.show', compact('destino'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $destino = Destino::findOrFail($id);
        return view('destinos.edit', compact('destino'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $destino = Destino::findOrFail($id);
        $validated = $request->validate([
            "destino" => "required|max:100"
        ]);
        // Actualizamos el destino en la base de datos
        $destino->update($validated);
        // Retornamos a la vista de todos los elementos y agregamos un success que puede informar sobre lo ocurrido
        return redirect()->route('destinos.index')->with('success', 'Destino actualizado correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $destino = Destino::findOrFail($id);
        $destino->delete();
        return redirect()->route('destinos.index')->with('success','Destino eliminado correctamente.');
    }
}
