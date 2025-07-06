@extends('layouts.app')

@section('content')
<div class="flex justify-center items-center min-h-screen bg-gray-100">
    <div class="w-full max-w-md bg-white p-8 rounded-lg shadow-md">
        <h2 class="text-2xl font-semibold text-center mb-6">Iniciar Sesión</h2>

        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc list-inside text-sm">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mb-4">
                <label for="email" class="block text-sm font-medium text-gray-700">Email</label>
                <input type="email" name="email" id="email" value="{{ old('email') }}"
                       class="w-full mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
                       required>
            </div>

            <div class="mb-6">
    <label for="contrasenia" class="block text-sm font-medium text-gray-700">Contraseña</label>
    <input type="password" name="contrasenia" id="contrasenia"
           class="w-full mt-1 p-2 border border-gray-300 rounded focus:outline-none focus:ring-2 focus:ring-blue-500"
           required>
</div>



            <div>
                <button type="submit"
                        class="w-full bg-blue-600 text-white p-2 rounded hover:bg-blue-700 transition duration-200">
                    Iniciar Sesión
                </button>
            </div>
        </form>
    </div>
</div>
@endsection
