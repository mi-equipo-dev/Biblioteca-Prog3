@extends('layouts.app') {{-- o el layout que uses --}}

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold">Préstamos</h2>
        <a href="{{ route('prestamos.create') }}"
           class="inline-flex items-center px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            <span class="text-xl mr-1">+</span> Nuevo Préstamo
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Usuario</th>
                    <th class="px-4 py-2 text-left">Libro</th>
                    <th class="px-4 py-2 text-left">Fecha Préstamo</th>
                    <th class="px-4 py-2 text-left">Fecha Devolución</th>
                    <th class="px-4 py-2 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($prestamos as $prestamo)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">
                        {{ $prestamo->usuario->nombre }} {{ $prestamo->usuario->apellido }}
                    </td>
                    <td class="px-4 py-2">{{ $prestamo->libro->titulo }}</td>
                    <td class="px-4 py-2">{{ \Carbon\Carbon::parse($prestamo->fecha_prestamo)->format('d/m/Y') }}</td>
                    <td class="px-4 py-2">
                        {{ $prestamo->fecha_devolucion ? \Carbon\Carbon::parse($prestamo->fecha_devolucion)->format('d/m/Y') : 'Pendiente' }}
                    </td>
                    <td class="px-4 py-2 text-center">
                        <a href="{{ route('prestamos.edit', $prestamo->id) }}"
                           class="text-blue-600 hover:underline mr-3">Editar</a>
                        <form action="{{ route('prestamos.destroy', $prestamo->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('¿Borrar este préstamo?')"
                                    class="text-red-600 hover:underline">Borrar</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-4 text-center text-gray-500">No hay préstamos registrados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection

