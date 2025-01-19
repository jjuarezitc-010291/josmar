<?php
session_start();
    
if (!isset($_SESSION['esAdminLoggeado']) || $_SESSION['esAdminLoggeado'] !== true) {
    echo "No tienes permisos para ver esta sección :(";
    echo '<br><a href="../index.php">Volver al inicio</a>';
    die();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selección de Tablero de Administración</title>
    <link rel="stylesheet" href="css/menu-admin.css">
</head>
<body>

    <div id="header">
        <h1>Zona de Administración</h1>
        <p>Selecciona el tablero que deseas administrar</p>
    </div>

    <div class="contenedor">
        <div class="botones-container">
            <a href="TableroAdministradorProductos.php" class="acciones">Administrar Productos</a>
            <a href="TableroAdministradorClientes.php" class="acciones">Administrar Clientes</a>
        </div>

        <a href="procesar_logout.php" class="acciones">Salir</a>
    </div>

</body>
</html>
