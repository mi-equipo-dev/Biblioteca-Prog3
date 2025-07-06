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
        <div class="max-w-6xl mx-auto">
            <span class="font-bold">Sistema Biblioteca</span>
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
