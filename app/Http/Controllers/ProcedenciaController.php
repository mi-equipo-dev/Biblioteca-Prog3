<?php

namespace App\Http\Controllers;

use App\Models\Procedencia; // Importamos la clase Procedencia
use Illuminate\Http\Request;

class ProcedenciaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $procedencias = Procedencia::all(); // Obtiene todas las procedencias de la tabla procedencias
        // Retorna la vista con las procedencias
        return view('procedencias.index', compact('procedencias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('procedencias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "procedencia" => "required|min:1|max:100" // min 1 para no recibir string vacío
        ]);

        $procedencia = Procedencia::create($validated);
        return redirect()->route('procedencias.index')->with('success', 'Procedencia creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $procedencia = Procedencia::findOrFail($id);
        return view('procedencias.show', compact('procedencia'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $procedencia = Procedencia::findOrFail($id); // Busca la procedencia solicitada por su ID
        // Retorna la vista de edición enviándole la procedencia que se está editando
        return view('procedencias.edit', compact('procedencia'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $procedencia = Procedencia::findOrFail($id);
        $validated = $request->validate([
            "procedencia" => "required|min:1|max:100" // min 1 para no recibir string vacío
        ]);

        $procedencia->update($validated);
        return redirect()->route('procedencias.index')->with('success', 'Procedencia actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $procedencia = Procedencia::findOrFail($id);
        $procedencia->delete();
        return redirect()->route('procedencias.index')->with('success','Procedencia eliminada correctamente.');
    }
}
