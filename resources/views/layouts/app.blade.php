<!DOCTYPE html>
<html lang="es">
<head>
    @livewireStyles
    <meta charset="UTF-8">
    <title>Bibliotech</title>
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- efecto flip --}}
    <style>
        .flip-card {
            perspective: 1000px;
        }

        .flip-inner {
            transition: transform 0.6s;
            transform-style: preserve-3d;
        }

        .flip-card:hover .flip-inner {
            transform: rotateY(180deg);
        }

        .flip-front,
        .flip-back {
            backface-visibility: hidden;
            position: absolute;
            width: 100%;
            height: 100%;
        }

        .flip-back {
            transform: rotateY(180deg);
        }
    </style>
</head>
<body class="bg-gray-100 min-h-screen flex flex-col">
    <nav class="bg-blue-600 text-white p-4">
    <div class="max-w-6xl mx-auto flex justify-between items-center">
        <div class="flex items-center gap-2">
            <span class="font-bold">BIBLIOTECH</span>
            <span class="font-bold">🐱‍🐉</span>
        </div>
        <div>
            @auth
            <form action="{{ route('logout') }}" method="POST" class="inline">
                @csrf
                <button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded">
                    Cerrar sesión
                </button>
            </form>
            @endauth

            @guest
            <a href="{{ route('login') }}" class="bg-green-500 hover:bg-green-600 text-white px-4 py-2 rounded">
                Iniciar sesión
            </a>
            @endguest
        </div>
    </div>
</nav>


    <main class="flex-grow py-6 px-4">
        @yield('content')
    </main>

    <footer class="bg-gray-800 text-white p-4">
        <div class="max-w-6xl mx-auto text-center">
            &copy; {{ date('Y') }} Bibliotech. Todos los derechos reservados.
        </div>
    </footer>
    @livewireScripts
</body>
</html>
