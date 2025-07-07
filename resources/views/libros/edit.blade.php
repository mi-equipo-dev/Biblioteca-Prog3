@extends('layouts.app')

@section('content')
<div class="max-w-4xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
    <h2 class="text-2xl font-bold mb-6">Editar libro</h2>

    @include('libros.partials.form', [
        'action' => route('libros.update', $libro->id),
        'method' => 'PUT',
        'submitText' => 'Actualizar libro',
        'libro' => $libro,
        'categorias' => $categorias,
        'procedencias' => $procedencias,
    ])
</div>
@endsection