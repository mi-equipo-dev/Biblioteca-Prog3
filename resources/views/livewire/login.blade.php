<div class="min-h-screen flex items-center justify-center bg-cover bg-center"
     style="background-image: url('/images/biblioteca.png');">

    <div class="max-w-md w-full mt-0 p-6 bg-white shadow-md rounded">
        <h2 class="text-2xl font-semibold mb-6 text-center">Iniciar Sesión</h2>

        @if (session()->has('error'))
            <div class="bg-red-100 text-red-700 p-2 rounded mb-4">
                {{ session('error') }}
            </div>
        @endif

        <form wire:submit.prevent="login">
            <div class="mb-4">
                <label class="block text-sm font-medium">Email</label>
                <input type="email" wire:model.lazy="email" class="w-full border border-gray-300 rounded p-2">
                @error('email') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div class="mb-4">
                <label class="block text-sm font-medium">Contraseña</label>
                <input type="password" wire:model.lazy="contrasenia" class="w-full border border-gray-300 rounded p-2">
                @error('contrasenia') <span class="text-red-600 text-sm">{{ $message }}</span> @enderror
            </div>

            <div>
                <button type="submit" class="w-full bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
                    Ingresar
                </button>
            </div>
        </form>
    </div>

</div>
