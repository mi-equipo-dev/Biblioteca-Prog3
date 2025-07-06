<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use App\Models\Categoria;
use App\Models\Procedencia;
use App\Models\Destino;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $libros = Libro::with(['categoria', 'procedencia', 'destino'])->get();
        return view('libros.index', compact('libros'));// Muestra la lista de libros con sus relaciones
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categorias = Categoria::all();
        $procedencias = Procedencia::all();
        $destinos = Destino::all();
        return view('libros.create', compact('categorias', 'procedencias', 'destinos'));// Muestra el formulario para crear un nuevo libro
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Valida los datos del formulario
        $validated = $request->validate([
            'ISBN' => 'required|string|min:1|max:13|unique:libros,ISBN',
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'anio_publicacion' => 'required|integer|min:1900|max:' . date('Y'),
            'cantidad' => 'required|integer|min:1',
            'id_categoria' => 'required|exists:categorias,id',
            'id_procedencia' => 'required|exists:procedencias,id',
            'id_destino' => 'required|exists:destinos,id',
        ]);
        Libro::create($validated);// Crea un nuevo libro con los datos validados
        return redirect()->route('libros.index')->with('success', 'Libro creado exitosamente.');// Redirige a la lista de libros con un mensaje de éxito
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $libro = Libro::with(['categoria', 'procedencia', 'destino'])->findOrFail($id);
        return view('libros.show', compact('libro'));// Muestra los detalles de un libro específico con sus relaciones
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $libro = Libro::findOrFail($id);// Obtiene el libro por su ID
       //Obtiene las listas de categorías, procedencias y destinos para el formulario de edición
        $categorias = Categoria::all();
        $procedencias = Procedencia::all();
        $destinos = Destino::all();
        return view('libros.edit', compact('libro', 'categorias', 'procedencias', 'destinos'));// Muestra el formulario para editar un libro
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $libro = Libro::findOrFail($id);

        $validated = $request->validate([
            'ISBN' => 'required|string|min:1|max:13|unique:libros,ISBN,' . $libro->id,
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'editorial' => 'required|string|max:255',
            'anio_publicacion' => 'required|integer|min:1900|max:' . date('Y'),
            'cantidad' => 'required|integer|min:0',
            'id_categoria' => 'required|exists:categorias,id',
            'id_procedencia' => 'required|exists:procedencias,id',
            'id_destino' => 'required|exists:destinos,id',
        ]);

        $libro->update($validated);// Actualiza el libro con los datos validados
        return redirect()->route('libros.index')->with('success', 'Libro actualizado exitosamente.');// Redirige a la lista de libros con un mensaje de éxito
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();// Elimina el libro
        return redirect()->route('libros.index')->with('success', 'Libro eliminado exitosamente.');// Redirige a la lista de libros con un mensaje de éxito
    }
}
