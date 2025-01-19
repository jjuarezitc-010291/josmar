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
    <title>Agregar Nuevo Producto</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/agregar-nuevo-producto.css">
</head>

<body>

    <div class="contenedor-registro">
        <h1>Agregar Nuevo Producto</h1>

        <form action="ProcesaAgregarNuevoProducto.php" method="POST" enctype="multipart/form-data">
            
            <div class="fila-formulario">
                <div class="grupo-formulario">
                    <label for="nombre">Nombre del Producto:</label>
                    <input type="text" name="nombre" id="nombre" placeholder="Nombre del producto" required maxlength="30">
                </div>

                <div class="grupo-formulario">
                    <label for="precio">Precio:</label>
                    <input type="number" name="precio" id="precio" step="0.5" placeholder="Precio del producto" required>
                </div>
            </div>

            <div class="fila-formulario">
                <div class="grupo-formulario">
                    <label for="rutaImagen">Imagen:</label>
                    <input type="file" name="rutaImagen" id="rutaImagen" accept="image/*" required>
                </div>

                <div class="grupo-formulario">
                    <label for="disponible">Disponible:</label>
                    <select name="disponible" id="disponible" required>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>
            </div>

            <div class="fila-formulario">
                <div class="grupo-formulario">
                    <label for="edicionLimitada">Edición Limitada:</label>
                    <select name="edicionLimitada" id="edicionLimitada" required>
                        <option value="1">Sí</option>
                        <option value="0">No</option>
                    </select>
                </div>

                <div class="grupo-formulario">
                    <label for="stock">Stock:</label>
                    <input type="number" name="stock" id="stock" value="1" placeholder="Cantidad en stock" required>
                </div>
            </div>

            <div class="fila-formulario">
                <div class="grupo-formulario">
                    <label for="porcentajeDescuento">Porcentaje de Descuento:</label>
                    <input type="number" name="porcentajeDescuento" id="porcentajeDescuento" step="0.01" value="0" placeholder="Descuento en porcentaje" required>
                </div>

                <div class="grupo-formulario">
                    <label for="descripcionCorta">Descripción Corta:</label>
                    <input type="text" name="descripcionCorta" id="descripcionCorta" placeholder="Breve descripción del producto" required>
                </div>
            </div>

            <div class="fila-formulario">
                <div class="grupo-formulario">
                    <label for="descripcionLarga">Descripción Larga:</label>
                    <textarea name="descripcionLarga" id="descripcionLarga" placeholder="Descripción detallada del producto" required></textarea>
                </div>

                <div class="grupo-formulario">
                    <label for="temporada">Temporada:</label>
                    <select name="temporada" id="temporada" required>
                        <option value="Primavera">Primavera</option>
                        <option value="Verano">Verano</option>
                        <option value="Otoño">Otoño</option>
                        <option value="Invierno">Invierno</option>
                    </select>
                </div>
            </div>

            <div class="fila-formulario">
                <div class="grupo-formulario">
                    <label for="categoria">Categoría:</label>
                    <select name="categoria" id="categoria" required>
                        <option value="flores">Flores</option>
                        <option value="comestibles">Comestibles</option>
                        <option value="accesorios">Accesorios</option>
                        <option value="decoracion">Decoración</option>
                    </select>
                </div>
            </div>

            <button type="submit">Agregar Producto</button>
        </form>
    </div>

</body>

</html>
