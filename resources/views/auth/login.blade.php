<!-- resources/views/login.blade.php -->

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
</head>
<body>
    <h1>Iniciar Sesión</h1>

    @if ($errors->any())
        <div style="color: red;">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/login">
        @csrf <!-- 👈 Token CSRF obligatorio -->

        <div>
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" required>
        </div>

        <div>
            <label for="contrasenia">Contraseña:</label>
            <input type="password" name="contrasenia" id="contrasenia" >
        </div>

        <button type="submit">Ingresar</button>
    </form>
    <div style="margin-top:20px; color: orange; font-weight: bold;"></div>
        Este formulario de login es provisorio y debería ser borrado en producción.
    </div>
</body>
</html>
