<?php
    require_once '../entidades/Producto.php';
    require_once '../GestionProductos.php';
    
    session_start();
    
    if (!isset($_SESSION['esAdminLoggeado']) || $_SESSION['esAdminLoggeado'] !== true) {
        echo "No tienes permisos para ver esta sección :(";
        echo '<br><a href="../index.php">Volver al inicio</a>';
        die();
    }

    $idProducto = $_GET['idProducto'];

    $gestionProductos = new GestionProductos();
    $producto = $gestionProductos->obtenerProducto($idProducto);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Producto</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/edita-producto.css">
</head>
<body>

    <div class="contenedor-registro">
        <a href="TableroAdministradorProductos.php" class="regresar">Regresar al panel</a>
        <h1>Editar Producto</h1>

        <form action="ActualizarProducto.php" method="POST">
            <input type="hidden" name="idProducto" value="<?php echo $producto->getId(); ?>">

            <div class="fila-formulario">
                <div class="grupo-formulario">
                    <label for="nombre">Nombre del Producto:</label>
                    <input type="text" name="nombre" id="nombre" value="<?php echo $producto->getNombre(); ?>" required>
                </div>

                <div class="grupo-formulario">
                    <label for="precio">Precio:</label>
                    <input type="number" name="precio" id="precio" value="<?php echo $producto->getPrecio(); ?>" step="0.01" required>
                </div>
            </div>

            <div class="fila-formulario">
                <div class="grupo-formulario">
                    <label for="rutaImagen">Ruta de la Imagen:</label>
                    <input type="text" name="rutaImagen" id="rutaImagen" value="<?php echo $producto->getRutaImagen(); ?>" required>
                </div>

                <div class="grupo-formulario">
                    <label for="disponible">Disponible:</label>
                    <select name="disponible" id="disponible" required>
                        <option value="1" <?php echo $producto->isDisponible() ? 'selected' : ''; ?>>Sí</option>
                        <option value="0" <?php echo !$producto->isDisponible() ? 'selected' : ''; ?>>No</option>
                    </select>
                </div>
            </div>

            <div class="fila-formulario">
                <div class="grupo-formulario">
                    <label for="edicionLimitada">Edición Limitada:</label>
                    <select name="edicionLimitada" id="edicionLimitada" required>
                        <option value="1" <?php echo $producto->isEdicionLimitada() ? 'selected' : ''; ?>>Sí</option>
                        <option value="0" <?php echo !$producto->isEdicionLimitada() ? 'selected' : ''; ?>>No</option>
                    </select>
                </div>

                <div class="grupo-formulario">
                    <label for="stock">Stock:</label>
                    <input type="number" name="stock" id="stock" value="<?php echo $producto->getStock(); ?>" required>
                </div>
            </div>

            <div class="fila-formulario">
                <div class="grupo-formulario">
                    <label for="porcentajeDescuento">Porcentaje Descuento:</label>
                    <input type="number" name="porcentajeDescuento" id="porcentajeDescuento" value="<?php echo $producto->getPorcentajeDescuento(); ?>" step="0.01" required>
                </div>

                <div class="grupo-formulario">
                    <label for="descripcionCorta">Descripción Corta:</label>
                    <input type="text" name="descripcionCorta" id="descripcionCorta" value="<?php echo $producto->getDescripcionCorta(); ?>" required>
                </div>
            </div>

            <div class="fila-formulario">
                <div class="grupo-formulario">
                    <label for="descripcionLarga">Descripción Larga:</label>
                    <textarea name="descripcionLarga" id="descripcionLarga" required><?php echo $producto->getDescripcionLarga(); ?></textarea>
                </div>

                <div class="grupo-formulario">
                    <label for="temporada">Temporada:</label>
                    <select name="temporada" id="temporada" required>
                        <option value="Primavera" <?php echo $producto->getTemporada() == 'Primavera' ? 'selected' : ''; ?>>Primavera</option>
                        <option value="Verano" <?php echo $producto->getTemporada() == 'Verano' ? 'selected' : ''; ?>>Verano</option>
                        <option value="Otoño" <?php echo $producto->getTemporada() == 'Otoño' ? 'selected' : ''; ?>>Otoño</option>
                        <option value="Invierno" <?php echo $producto->getTemporada() == 'Invierno' ? 'selected' : ''; ?>>Invierno</option>
                    </select>
                </div>
            </div>

            <div class="grupo-formulario">
                <label for="categoria">Categoría:</label>
                <select name="categoria" id="categoria" required>
                    <option value="flores" <?php echo $producto->getCategoria() == 'flores' ? 'selected' : ''; ?>>Flores</option>
                    <option value="comestibles" <?php echo $producto->getCategoria() == 'comestibles' ? 'selected' : ''; ?>>Comestibles</option>
                    <option value="peluches" <?php echo $producto->getCategoria() == 'accesorios' ? 'selected' : ''; ?>>Accesorios</option>
                    <option value="comestibles" <?php echo $producto->getCategoria() == 'decoracion' ? 'selected' : ''; ?>>Decoracion</option>
                </select>
            </div>

            <button type="submit">Actualizar Producto</button>
        </form>
    </div>

</body>
</html>
