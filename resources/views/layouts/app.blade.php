<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Bibliotech</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <nav class="bg-blue-600 text-white p-4">
        <div class="max-w-6xl mx-auto">
            <span class="font-bold">Sistema Biblioteca</span>
        </div>
    </nav>

    <main class="py-6 px-4">
        @yield('content')
    </main>
    <footer class="bg-gray-800 text-white p-4 mt-6">
        <div class="max-w-6xl mx-auto text-center">
            &copy; {{ date('Y') }} Bibliotech. Todos los derechos reservados.
        </div>
    </footer>
</body>
</html>
