<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use App\Models\Libro;
use App\Models\Usuario;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestamos = Prestamo::with(['libro', 'usuario'])->get();
        return view('prestamos.index', compact('prestamos'));
        // Realiza una consulta a la base de datos para obtener todos los préstamos y los relaciona con los libro y usuarios correspondietes.
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $usuarios = Usuario::all();
        $libros = Libro::all();
        return view('prestamos.create', compact('usuarios', 'libros'));
        // Muestra un formulario para crear un nuevo préstamo, obteniendo todos los usuarios y libros disponibles.
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'nullable|date|after:fecha_prestamo',
            'id_libro' => 'required|exists:libros,id',
            'id_usuario' => 'required|exists:usuarios,id',
        ]);

        Prestamo::create($request->all());
        return redirect()->route('prestamos.index')->with('success', 'Préstamo creado exitosamente.');
        // Valida los datos del formulario y crea un nuevo préstamo en la base de datos.
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $prestamo = Prestamo::with(['libro', 'usuario'])->findOrFail($id);
        return view('prestamos.show', compact('prestamo'));
        // Muestra los detalles de un préstamo específico.
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $usuarios = Usuario::all();
        $libros = Libro::all();
        $prestamo = Prestamo::with(['libro', 'usuario'])
            ->findOrFail($id);
        return view('prestamos.edit', compact('prestamo','usuarios', 'libros'));
        // Muestra un formulario para editar un préstamo específico, obteniendo los datos del usuario y libro relacionados.
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'nullable|date|after:fecha_prestamo', // Asegura que la fecha de devolución sea posterior a la fecha de préstamo.
            'id_libro' => 'required|exists:libros,id',
            'id_usuario' => 'required|exists:usuarios,id',
        ]);
        $prestamo = Prestamo::findOrFail($id);
        // Encuentra el préstamo por ID o falla si no existe.
        // Esto asegura que el préstamo a actualizar exista antes de intentar actualizarlo.
        // Si no se encuentra, se lanzará una excepción que puede ser manejada por el framework.
        $prestamo->update($request->all());
        return redirect()->route('prestamos.index')->with('success', 'Préstamo actualizado exitosamente.');
        // Valida los datos del formulario y actualiza un préstamo existente en la base de datos.
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->delete(); // Eliminación física del préstamo de la base de datos.
        return redirect()->route('prestamos.index')->with('success', 'Préstamo eliminado exitosamente.');
        // Elimina un préstamo específico de la base de datos.
    }

    public function buscarPorCuil(Request $request)
    {
        $request->validate([
            'cuil' => 'required', // Validación del CUIL
        ]);
        $cuil = $request->input('cuil');

        $usuario = Usuario::where('CUIL', $cuil)->first();

        if (!$usuario) {
            return redirect()->back()->with('error', 'No se encontró un usuario con ese CUIL.');
        }

        $prestamos = Prestamo::with(['libro', 'usuario'])->where('id_usuario', operator: $usuario->id)->get();

        return view('prestamos.resultado', compact('usuario', 'prestamos'));
    }
}
