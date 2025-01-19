<?php
    require_once '../GestionProductos.php';

    session_start();
    
    if (!isset($_SESSION['esAdminLoggeado']) || $_SESSION['esAdminLoggeado'] !== true) {
        echo "No tienes permisos para ver esta sección :(";
        echo '<br><a href="../index.php">Volver al inicio</a>';
        die();
    }
    
    $gestionProductos = new GestionProductos();
    $productos = $gestionProductos->obtenerProductos();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tablero de Administración</title>
    <link rel="stylesheet" href="css/tablero-administrador-productos.css">
</head>
<body>

    <div id="header">
        <h1>Zona de administración de productos</h1>
        <p>Aquí se podrán añadir, eliminar y editar productos</p>
    </div>

    <div class="contenedor">
        <a href="AgregarNuevoProducto.php" class="acciones">Agregar nuevo producto</a>
        <a href="MenuAdmin.php" class="acciones">Volver al meú</a>
        <a href="procesar_logout.php" class="acciones">Salir</a>

        <table>
            <thead>
                <tr>
                    <th>Imágen</th>
                    <th>Nombre del producto</th>
                    <th>Categoría</th>
                    <th>Precio</th>
                    <th>Stock</th>
                    <th>Descripción corta</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php 
                    foreach($productos as $producto) {
                        echo '<tr>';
                        echo '<td><img src="../imgs/' . $producto->getRutaImagen() . '" alt="Imagen producto"></td>';
                        echo '<td>' . $producto->getNombre() . '</td>';
                        echo '<td>' . $producto->getCategoria() . '</td>';
                        echo '<td>' . $producto->getPrecio() . '</td>';
                        echo '<td>' . $producto->getStock() . '</td>';
                        echo '<td>' . $producto->getDescripcionCorta() . '</td>';
                        echo '<td class="enlaces-acciones">
                                <a href="EditaProducto.php?idProducto=' . $producto->getId() . '" class="editar">Editar</a>, 
                                <a href="EliminaProducto.php?idProducto=' . $producto->getId() . '">Eliminar</a>
                              </td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>
    </div>

</body>
</html>
