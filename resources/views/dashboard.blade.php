@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
    <h2 class="text-3xl font-bold text-center mb-8">Panel de Gestión</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
        <!-- Gestión de Usuarios -->
        <a href="{{ route('usuarios.index') }}" class="block bg-blue-100 hover:bg-blue-200 transition-all duration-300 rounded-lg shadow-md p-6 text-center">
            <h3 class="text-xl font-bold text-blue-800 mb-2">Gestión de Usuarios</h3>
            <p class="text-gray-700">Alta, edición y eliminación de usuarios del sistema.</p>
        </a>

        <!-- Gestión de Libros -->
        <a href="{{ route('libros.index') }}" class="block bg-green-100 hover:bg-green-200 transition-all duration-300 rounded-lg shadow-md p-6 text-center">
            <h3 class="text-xl font-bold text-green-800 mb-2">Gestión de Libros</h3>
            <p class="text-gray-700">Administrá el catálogo de libros disponibles.</p>
        </a>

        <!-- Gestión de Préstamos -->
        <a href="{{ route('prestamos.index') }}" class="block bg-yellow-100 hover:bg-yellow-200 transition-all duration-300 rounded-lg shadow-md p-6 text-center">
            <h3 class="text-xl font-bold text-yellow-800 mb-2">Gestión de Préstamos</h3>
            <p class="text-gray-700">Consultá y gestioná los préstamos de libros.</p>
        </a>
    </div>
</div>
@endsection
