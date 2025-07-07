@extends('layouts.app') {{-- o el layout que uses --}}

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold">Libros</h2>
        <a href="{{ route('libros.create') }}"
            class="inline-flex items-center px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            <span class="text-xl mr-1">+</span> Nuevo Libro
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Título</th>
                    <th class="px-4 py-2 text-left">Autor</th>
                    <th class="px-4 py-2 text-left">Cantidad</th>
                    <th class="px-4 py-2 text-left">Editorial</th>
                    <th class="px-4 py-2 text-left">Año</th>
                    <th class="px-4 py-2 text-left">Categoría</th>
                    <th class="px-4 py-2 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($libros as $libro)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $libro->titulo }}</td>
                    <td class="px-4 py-2">{{ $libro->autor }}</td>
                    <td class="px-4 py-2">{{ $libro->cantidad }}</td>
                    <td class="px-4 py-2">{{ $libro->editorial }}</td>
                    <td class="px-4 py-2">{{ $libro->anio_publicacion }}</td>
                    <td class="px-4 py-2">{{ $libro->categoria->categoria ?? 'Sin categoría' }}</td>
                    <td class="px-4 py-2 text-center">
                        <a href="{{ route('libros.edit', $libro->id) }}"
                            class="text-blue-600 hover:underline mr-3">Editar</a>
                        <button type="button" onclick="confirmarEliminacionLibro({{ $libro->id }}, '{{ $libro->titulo }}', '{{ $libro->autor }}')"
                            class="text-red-600 hover:underline">Borrar</button>

                        <form id="form-eliminar-libro-{{ $libro->id }}" action="{{ route('libros.destroy', $libro->id) }}" method="POST" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>

                        @push('scripts')
                        <script>
                            function confirmarEliminacionLibro(id, titulo, autor) {
                                Swal.fire({
                                    title: '¿Eliminar libro?',
                                    html: `<strong>Título:</strong> ${titulo}<br><strong>Autor:</strong> ${autor}`,
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#e3342f',
                                    cancelButtonColor: '#6c757d',
                                    confirmButtonText: 'Sí, borrar',
                                    cancelButtonText: 'Cancelar'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        document.getElementById(`form-eliminar-libro-${id}`).submit();
                                    }
                                });
                            }
                        </script>
                        @endpush

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="7" class="px-4 py-4 text-center text-gray-500">No hay libros cargados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection