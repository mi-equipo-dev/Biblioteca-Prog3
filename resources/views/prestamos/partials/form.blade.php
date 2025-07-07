<form method="POST" action="{{ $action }}">
    @csrf
    @if ($method === 'PUT')
        @method('PUT')
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block font-medium">Usuario</label>
            <select name="id_usuario" class="w-full border border-gray-300 rounded p-2">
                <option value="">Seleccione un usuario</option>
                @foreach ($usuarios as $usuario)
                    <option value="{{ $usuario->id }}"
                        {{ old('id_usuario', $prestamo->id_usuario ?? '') == $usuario->id ? 'selected' : '' }}>
                        {{ $usuario->nombre }} {{ $usuario->apellido }} ({{ $usuario->CUIL }})
                    </option>
                @endforeach
            </select>
            @error('id_usuario') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div>
            <label class="block font-medium">Libro</label>
            <select name="id_libro" class="w-full border border-gray-300 rounded p-2">
                <option value="">Seleccione un libro</option>
                @foreach ($libros as $libro)
                    <option value="{{ $libro->id }}"
                        {{ old('id_libro', $prestamo->id_libro ?? '') == $libro->id ? 'selected' : '' }}>
                        {{ $libro->titulo }} ({{ $libro->cantidad }} disponibles)
                    </option>
                @endforeach
            </select>
            @error('id_libro') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div>
            <label class="block font-medium">Fecha de Préstamo</label>
            <input type="date" name="fecha_prestamo"
                   value="{{ old('fecha_prestamo', isset($prestamo) ? $prestamo->fecha_prestamo->format('Y-m-d') : now()->format('Y-m-d')) }}"
                   class="w-full border border-gray-300 rounded p-2">
            @error('fecha_prestamo') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div>
            <label class="block font-medium">Fecha de Devolución (opcional)</label>
            <input type="date" name="fecha_devolucion"
                   value="{{ old('fecha_devolucion', isset($prestamo->fecha_devolucion) ? $prestamo->fecha_devolucion->format('Y-m-d') : '') }}"
                   class="w-full border border-gray-300 rounded p-2">
            @error('fecha_devolucion') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>
    </div>

        <div class="mt-6 flex justify-between">
        <a href="{{ route('prestamos.index') }}"
            class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
            Cancelar
        </a>

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
            {{ $submitText }}
        </button>
    </div>
</form>
