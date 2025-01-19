<?php
require_once 'entidades/CarritoCompras.php';

session_start();

$carritoCompras = $_SESSION['carritoCompras'];
$totalItemsEnCarrito = $carritoCompras->obtenerTotalItems();
$totalCostoCarrito = $carritoCompras->obtenerTotalCosto();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Carrito de Compras</title>
    <link rel="stylesheet" href="css/muestra-carrito.css">
</head>
<body>

    <header>
        <h1>Carrito de Compras</h1>
    </header>

    <div class="contenedor">
        <h2>Contenido de tu carrito</h2>

        <?php
        $productosEnCarrito = $carritoCompras->getProductos();
        if (empty($productosEnCarrito)) {
            echo '<p>El carrito está vacío.</p>';
        } else {
        ?>

        <table>
            <thead>
                <tr>
                    <th>Imágen</th>
                    <th>Nombre</th>
                    <th>Cantidad</th>
                    <th>Precio por unidad</th>
                    <th>Precio total</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    foreach ($productosEnCarrito as $item) {
                        $producto = $item['producto'];
                        $cantidad = $item['cantidad'];
                        echo '<tr>';
                        echo '<td><img src="imgs/' . $producto->getRutaImagen() . '" alt="' . $producto->getNombre() . '" width="50"></td>';
                        echo '<td>' . $producto->getNombre() . '</td>';
                        echo '<td class="form-cantidad">';
                        echo '<form action="ActualizarCantidadCarrito.php" method="POST">';
                        echo '<input type="number" name="cantidad" value="' . $cantidad . '" min="1" required>';
                        echo '<input type="hidden" name="idProducto" value="' . $producto->getId() . '">';
                        echo '<button type="submit" class="acciones">Actualizar</button>';
                        echo '</form>';
                        echo '</td>';
                        echo '<td>$' . $producto->getPrecio() . '</td>';
                        echo '<td>$' . $producto->getPrecio() * $cantidad . '</td>';
                        echo '<td><a href="EliminarProductoDeCarrito.php?id=' . $producto->getId() .'">Eliminar</a></td>';
                        echo '</tr>';
                    }
                ?>
            </tbody>
        </table>

        <div class="total-carrito">
            <h4>Hay: <?php echo $totalItemsEnCarrito; ?> artículos en tu carrito.</h4>
            <p>El costo total del carrito es: $<?php echo $totalCostoCarrito; ?></p>
        </div>
        <?php
        }
        ?>
        <a href="index.php" class="volver-cat">Volver al catálogo</a>
    </div>

</body>
</html>
