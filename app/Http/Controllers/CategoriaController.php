<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categorias = Categoria::all();// Obtiene todas las categorías de la tabla categorias
        // Retorna la vista con las categorías
       
        return view('categorias.index', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('categorias.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "categoria" => "required|min:1|max:100" // min 1 para no recibir string vacío
        ]);
        
        $categoria = Categoria::create($validated);
        return redirect()->route('categorias.index')->with('success', 'Categoría creada correctamente.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        return view("categorias.show", compact("categoria"));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $categoria = Categoria::findOrFail($id);// Busca la categoría solicitada por su ID
        // Retorna la vista de edición enviándole la categoría que se está editando
        return view("categorias.edit", compact("categoria"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $categoria = Categoria::findOrFail($id);
   
       $validated = $request->validate([
           "categoria" => "required|max:100"
       ]);
       // Actualizamos la categoría en la base de datos
       $categoria->update($validated);
       // Retornamos a la vista de todas las categorías y agregamos un success que puede informar sobre lo ocurrido
       return redirect()->route('categorias.index')->with('success', 'Categoría actualizada correctamente.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $categoria = Categoria::findOrFail($id);
        $categoria->delete();
        return redirect()->route('categorias.index')->with('success','Categoría eliminada correctamente.');
    }
}