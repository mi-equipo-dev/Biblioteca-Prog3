@extends('layouts.app') {{-- o el layout que uses --}}

@section('content')
<div class="max-w-6xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
    <div class="flex items-center justify-between mb-4">
        <h2 class="text-2xl font-bold">Usuarios</h2>
        <a href="{{ route('usuarios.create') }}"
            class="inline-flex items-center px-3 py-2 bg-blue-600 text-white rounded hover:bg-blue-700 transition">
            <span class="text-xl mr-1">+</span> Nuevo Usuario
        </a>
    </div>

    <div class="overflow-x-auto">
        <table class="min-w-full table-auto border border-gray-200">
            <thead class="bg-gray-100">
                <tr>
                    <th class="px-4 py-2 text-left">Nombre</th>
                    <th class="px-4 py-2 text-left">Apellido</th>
                    <th class="px-4 py-2 text-left">CUIL</th>
                    <th class="px-4 py-2 text-left">Email</th>
                    <th class="px-4 py-2 text-center">Acciones</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($usuarios as $usuario)
                <tr class="border-b hover:bg-gray-50">
                    <td class="px-4 py-2">{{ $usuario->nombre }}</td>
                    <td class="px-4 py-2">{{ $usuario->apellido }}</td>
                    <td class="px-4 py-2">{{ $usuario->CUIL }}</td>
                    <td class="px-4 py-2">{{ $usuario->email }}</td>
                    <td class="px-4 py-2 text-center">
                        <a href="{{ route('usuarios.edit', $usuario->id) }}"
                            class="text-blue-600 hover:underline mr-3">Editar</a>
                        <button type="button" onclick="confirmarEliminacionUsuario({{ $usuario->id }}, '{{ $usuario->nombre }} {{ $usuario->apellido }}', '{{ $usuario->email }}')"
                            class="text-red-600 hover:underline">Borrar</button>

                        <form id="form-eliminar-usuario-{{ $usuario->id }}" action="{{ route('usuarios.destroy', $usuario->id) }}" method="POST" class="hidden">
                            @csrf
                            @method('DELETE')
                        </form>

                        @push('scripts')
                        <script>
                            function confirmarEliminacionUsuario(id, nombreCompleto, email) {
                                Swal.fire({
                                    title: '¿Eliminar usuario?',
                                    html: `<strong>Nombre:</strong> ${nombreCompleto}<br><strong>Email:</strong> ${email}`,
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#e3342f',
                                    cancelButtonColor: '#6c757d',
                                    confirmButtonText: 'Sí, borrar',
                                    cancelButtonText: 'Cancelar'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        document.getElementById(`form-eliminar-usuario-${id}`).submit();
                                    }
                                });
                            }
                        </script>
                        @endpush

                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="5" class="px-4 py-4 text-center text-gray-500">No hay usuarios cargados.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection