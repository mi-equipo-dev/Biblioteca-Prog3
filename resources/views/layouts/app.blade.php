<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Biblioteca</title>
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
</body>
</html>
