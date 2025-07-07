@extends('layouts.app')

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
    <h2 class="text-3xl font-bold text-center mb-8">PRESENTACIÓN DE EQUIPO-DEV</h2>

    <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- SANTI -->
        <div class="flip-card">
            <div class="flip-inner relative min-h-[280px]">
                <div class="flip-front absolute inset-0 bg-blue-100 p-6 rounded-lg shadow flex flex-col items-center text-center">
                    <img src="/images/santiago.png" alt="Santi" class="w-20 h-20 rounded-full mb-2 object-cover aspect-square">
                    <h3 class="text-xl font-semibold">Santi</h3>
                    <p class="text-sm text-gray-700">Omil Santiago Hernán</p>
                    <h3 class="text-xl font-semibold mt-6">FRONTEND</h3>

                </div>
                <div class="flip-back absolute inset-0 bg-blue-200 p-6 rounded-lg shadow flex flex-col items-center text-center">
                    <h3 class="text-xl font-semibold">Omil Santiago Hernán</h3>
                    <p class="text-sm text-gray-700 mt-2">Desarrollador backend apasionado por la eficiencia y el buen café.</p>
                </div>
            </div>
        </div>

        <!-- FABRI -->
        <div class="flip-card">
            <div class="flip-inner relative min-h-[280px]">
                <div class="flip-front absolute inset-0 bg-green-100 p-6 rounded-lg shadow flex flex-col items-center text-center">
                    <img src="/images/fabri.png" alt="Fabri" class="w-20 h-20 rounded-full mb-2 object-cover aspect-square">
                    <h3 class="text-xl font-semibold">Fabri</h3>
                    <p class="text-sm text-gray-700">Nuñez Fabricio Lautaro</p>
                    <h3 class="text-xl font-semibold mt-6">FRONTEND</h3>
                </div>
                <div class="flip-back absolute inset-0 bg-green-200 p-6 rounded-lg shadow flex flex-col items-center text-center">
                    <h3 class="text-xl font-semibold">Nuñez Fabricio Lautaro</h3>
                    <p class="text-sm text-gray-700 mt-2">Desarrollador backend apasionado por la eficiencia y el buen café.</p>
                </div>
            </div>
        </div>

        <!-- MAYRA -->
        <div class="flip-card">
            <div class="flip-inner relative min-h-[280px]">
                <div class="flip-front absolute inset-0 bg-pink-100 p-6 rounded-lg shadow flex flex-col items-center text-center">
                    <img src="/images/mayra.png" alt="Mayra" class="w-20 h-20 rounded-full mb-2 object-cover aspect-square">
                    <h3 class="text-xl font-semibold">Mayra</h3>
                    <p class="text-sm text-gray-700">Mendoza Mayra Nahir</p>
                    <h3 class="text-xl font-semibold mt-6">BACKEND</h3>
                </div>
                <div class="flip-back absolute inset-0 bg-pink-200 p-6 rounded-lg shadow flex flex-col items-center text-center">
                    <h3 class="text-xl font-semibold">Mendoza Mayra Nahir</h3>
                    <p class="text-sm text-gray-700 mt-2">Gestora de proyectos y puente entre el equipo y el usuario final.</p>
                </div>
            </div>
        </div>

        <!-- OLGA -->
        <div class="flip-card">
            <div class="flip-inner relative min-h-[280px]">
                <div class="flip-front absolute inset-0 bg-yellow-100 p-6 rounded-lg shadow flex flex-col items-center text-center">
                    <img src="/images/olga.png" alt="Olga" class="w-20 h-20 rounded-full mb-2 object-cover aspect-square">
                    <h3 class="text-xl font-semibold">Olga</h3>
                    <p class="text-sm text-gray-700">Gonzalez Olga Mercedes</p>
                    <h3 class="text-xl font-semibold mt-6">BACKEND</h3>
                </div>
                <div class="flip-back absolute inset-0 bg-yellow-200 p-6 rounded-lg shadow flex flex-col items-center text-center">
                    <h3 class="text-xl font-semibold">Gonzalez Olga Mercedes</h3>
                    <p class="text-sm text-gray-700 mt-2">Tester meticulosa. Si hay un bug, lo encuentra y lo documenta tres veces.</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
