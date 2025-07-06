<div>
    <div class="max-w-3xl mx-auto p-6 bg-white shadow-md rounded-lg mt-10">
        <h2 class="text-2xl font-semibold mb-6">Crear Bibliotecario</h2>

        @if (session()->has('mensaje'))
            <div class="mb-4 p-4 bg-green-100 text-green-700 rounded">
                {{ session('mensaje') }}
            </div>
        @endif

        <form wire:submit.prevent="save">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div>
                    <label class="block text-sm font-medium">Nombre</label>
                    <input type="text" wire:model="nombre" class="w-full border border-gray-300 rounded p-2">
                    @error('nombre') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium">Apellido</label>
                    <input type="text" wire:model="apellido" class="w-full border border-gray-300 rounded p-2">
                    @error('apellido') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium">CUIL</label>
                    <input type="text" wire:model="CUIL" class="w-full border border-gray-300 rounded p-2">
                    @error('CUIL') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium">Domicilio</label>
                    <input type="text" wire:model="domicilio" class="w-full border border-gray-300 rounded p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Teléfono</label>
                    <input type="text" wire:model="telefono" class="w-full border border-gray-300 rounded p-2">
                </div>

                <div>
                    <label class="block text-sm font-medium">Email</label>
                    <input type="email" wire:model="email" class="w-full border border-gray-300 rounded p-2">
                    @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium">Contraseña</label>
                    <input type="password" wire:model="contrasenia" class="w-full border border-gray-300 rounded p-2">
                    @error('contrasenia') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>

                <div>
                    <label class="block text-sm font-medium">Rol</label>
                    <select wire:model="id_rol" class="w-full border-gray-300 rounded p-2">
                        <option value="">Seleccione un rol</option>
                        @foreach ($roles as $rol)
                            <option value="{{ $rol->id }}">{{ ucfirst($rol->rol) }}</option>
                        @endforeach
                    </select>
                    @error('id_rol') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
                </div>
            </div>

            <div class="mt-6">
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Crear Bibliotecario
                </button>
            </div>
        </form>
    </div>
</div>