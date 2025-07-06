@extends('layouts.app')

@section('content')
<div class="max-w-5xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
    <h2 class="text-3xl font-bold text-center mb-8">Presentación del Equipo</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Santi -->
        <div class="bg-blue-100 p-4 rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-2">Santi</h3>
            <p class="text-sm text-gray-700">Desarrollador backend apasionado por la eficiencia y el buen café. Siempre buscando optimizar cada línea de código.</p>
        </div>

        <!-- Fabri -->
        <div class="bg-green-100 p-4 rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-2">Fabri</h3>
            <p class="text-sm text-gray-700">Diseñador UI/UX con ojo para el detalle. Le encanta hacer que las interfaces sean tan bellas como funcionales.</p>
        </div>

        <!-- Mayra -->
        <div class="bg-pink-100 p-4 rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-2">Mayra</h3>
            <p class="text-sm text-gray-700">Gestora de proyectos y puente entre el equipo y el usuario final. Organizada, resolutiva y siempre con una sonrisa.</p>
        </div>

        <!-- Olga -->
        <div class="bg-yellow-100 p-4 rounded-lg shadow">
            <h3 class="text-xl font-semibold mb-2">Olga</h3>
            <p class="text-sm text-gray-700">Tester meticulosa y protectora de la calidad. Si hay un bug, Olga lo encuentra (y lo anota tres veces).</p>
        </div>
    </div>
</div>
@endsection
