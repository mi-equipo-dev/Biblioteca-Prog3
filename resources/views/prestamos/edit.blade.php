@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
    <h2 class="text-2xl font-bold mb-6">Editar préstamo</h2>

    @include('prestamos.partials.form', [
        'action' => route('prestamos.update', $prestamo->id),
        'method' => 'PUT',
        'submitText' => 'Actualizar préstamo',
        'prestamo' => $prestamo,
        'usuarios' => $usuarios,
        'libros' => $libros,
    ])
</div>
@endsection
