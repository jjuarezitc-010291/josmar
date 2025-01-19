<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sección de Administración</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/inicio-sesion-admin.css">
</head>

<body>

    <div class="contenedor-login">
        <h1>Administración</h1>
        <p>Inicia sesión para acceder al panel de administración</p>

        <form action="procesar_login.php" method="post">
            <div class="grupo-formulario">
                <label for="usuario">Usuario:</label>
                <input type="text" id="usuario" name="usuario" required>
            </div>

            <div class="grupo-formulario">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>

            <button type="submit" class="boton-login">Iniciar Sesión</button>
        </form>
    </div>

</body>

</html>
