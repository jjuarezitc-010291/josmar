<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión de cliente</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/inicio-sesion-cliente.css">
</head>

<body>

    <div class="contenedor-login">
        <h1>Inicia sesión</h1>
        <p>¿Ya eres cliente? Inicia sesión con tu email y contraseña.</p>

        <form action="ProcesaLoginCliente.php" method="post">
            <div class="grupo-formulario">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
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
