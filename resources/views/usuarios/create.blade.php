@extends('layouts.app') {{-- Asegurate de tener layouts.app o usa directamente HTML base --}}

@section('content')
<div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
    <h2 class="text-2xl font-semibold mb-6">Crear Bibliotecario</h2>

    @if ($errors->any())
        <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('usuarios.store') }}" method="POST">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <div>
                <label class="block text-sm font-medium">Nombre</label>
                <input type="text" name="nombre" class="w-full border border-gray-300 rounded p-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Apellido</label>
                <input type="text" name="apellido" class="w-full border border-gray-300 rounded p-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium">CUIL</label>
                <input type="text" name="CUIL" class="w-full border border-gray-300 rounded p-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Domicilio</label>
                <input type="text" name="domicilio" class="w-full border border-gray-300 rounded p-2">
            </div>

            <div>
                <label class="block text-sm font-medium">Teléfono</label>
                <input type="text" name="telefono" class="w-full border border-gray-300 rounded p-2">
            </div>

            <div>
                <label class="block text-sm font-medium">Email</label>
                <input type="email" name="email" class="w-full border border-gray-300 rounded p-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Contraseña</label>
                <input type="password" name="contrasenia" class="w-full border border-gray-300 rounded p-2" required>
            </div>

            <div>
                <label class="block text-sm font-medium">Rol</label>
                <select name="id_rol" class="w-full border-gray-300 rounded p-2" required>
                    @foreach ($roles as $rol)
                        <option value="{{ $rol->id }}" {{ $rol->rol == 'bibliotecario' ? 'selected' : '' }}>
                            {{ ucfirst($rol->rol) }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                Crear Bibliotecario
            </button>
        </div>
    </form>
</div>
@endsection
