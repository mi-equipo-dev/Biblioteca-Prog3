<form method="POST" action="{{ $action }}">
    @csrf
    @if($method === 'PUT')
    @method('PUT')
    @endif

    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
        <div>
            <label class="block font-medium">ISBN</label>
            <input type="text" name="ISBN" value="{{ old('ISBN', $libro->ISBN ?? '') }}"
                class="w-full border border-gray-300 rounded p-2">
            @error('ISBN') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div>
            <label class="block font-medium">Título</label>
            <input type="text" name="titulo" value="{{ old('titulo', $libro->titulo ?? '') }}"
                class="w-full border border-gray-300 rounded p-2">
            @error('titulo') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div>
            <label class="block font-medium">Autor</label>
            <input type="text" name="autor" value="{{ old('autor', $libro->autor ?? '') }}"
                class="w-full border border-gray-300 rounded p-2">
            @error('autor') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div>
            <label class="block font-medium">Editorial</label>
            <input type="text" name="editorial" value="{{ old('editorial', $libro->editorial ?? '') }}"
                class="w-full border border-gray-300 rounded p-2">
            @error('editorial') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div>
            <label class="block font-medium">Año de publicación</label>
            <input type="number" name="anio_publicacion" min="1900" max="{{ date('Y') }}"
                value="{{ old('anio_publicacion', $libro->anio_publicacion ?? '') }}"
                class="w-full border border-gray-300 rounded p-2">
            @error('anio_publicacion') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div>
            <label class="block font-medium">Cantidad</label>
            <input type="number" name="cantidad" min="0"
                value="{{ old('cantidad', $libro->cantidad ?? '') }}"
                class="w-full border border-gray-300 rounded p-2">
            @error('cantidad') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div>
            <label class="block font-medium">Categoría</label>
            <select name="id_categoria" class="w-full border border-gray-300 rounded p-2">
                <option value="">Seleccione una categoría</option>
                @foreach ($categorias as $cat)
                <option value="{{ $cat->id }}" {{ old('id_categoria', $libro->id_categoria ?? '') == $cat->id ? 'selected' : '' }}>
                    {{ $cat->categoria }}
                </option>
                @endforeach
            </select>
            @error('id_categoria') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>

        <div>
            <label class="block font-medium">Procedencia</label>
            <select name="id_procedencia" class="w-full border border-gray-300 rounded p-2">
                <option value="">Seleccione una procedencia</option>
                @foreach ($procedencias as $proc)
                <option value="{{ $proc->id }}" {{ old('id_procedencia', $libro->id_procedencia ?? '') == $proc->id ? 'selected' : '' }}>
                    {{ $proc->procedencia }}
                </option>
                @endforeach
            </select>
            @error('id_procedencia') <small class="text-red-500">{{ $message }}</small> @enderror
        </div>
    </div>

    <div class="mt-6 flex justify-between">
        <a href="{{ route('libros.index') }}"
            class="bg-gray-300 text-gray-800 px-4 py-2 rounded hover:bg-gray-400">
            Cancelar
        </a>

        <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded hover:bg-blue-700 transition">
            {{ $submitText }}
        </button>
    </div>
</form>