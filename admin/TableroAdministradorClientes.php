<?php
    require_once '../clientes/GestionClientes.php';

    session_start();
    
    if (!isset($_SESSION['esAdminLoggeado']) || $_SESSION['esAdminLoggeado'] !== true) {
        echo "No tienes permisos para ver esta sección :(";
        echo '<br><a href="../index.php">Volver al inicio</a>';
        die();
    }
    
    $gestionClientes = new GestionClientes();
    $clientes = $gestionClientes->obtenerClientes();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablero de Administración</title>
    <link rel="stylesheet" href="css/tablero-administrador-clientes.css">
</head>
<body>

    <div id="header">
        <h1>Zona de administración de clientes</h1>
    </div>

    <div class="contenedor">
        <a href="MenuAdmin.php" class="acciones">Volver al meú</a>
        <a href="procesar_logout.php" class="acciones">Salir</a>

        <table>
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Dirección</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($clientes as $cliente) {
                        echo '<tr>';
                        echo '<td>' . $cliente->getNombre() . '</td>';
                        echo '<td>' . $cliente->getEmail() . '</td>';
                        echo '<td>' . $cliente->getDireccion() . '</td>';
                        echo '<td class="enlaces-acciones">
                                <a href="EliminaCliente.php?idCliente=' . $cliente->getId() . '">Eliminar</a>
                              </td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
