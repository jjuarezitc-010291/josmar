<?php
require_once '../GestionProductos.php';
require_once '../entidades/Producto.php';

session_start();
    
if (!isset($_SESSION['esAdminLoggeado']) || $_SESSION['esAdminLoggeado'] !== true) {
    echo "No tienes permisos para ver esta sección :(";
    echo '<br><a href="../index.php">Volver al inicio</a>';
    die();
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $precio = $_POST['precio'];
    $disponible = $_POST['disponible'] === '1';
    $edicionLimitada = $_POST['edicionLimitada'] === '1';
    $stock = $_POST['stock'];
    $porcentajeDescuento = $_POST['porcentajeDescuento'];
    $descripcionCorta = $_POST['descripcionCorta'];
    $descripcionLarga = $_POST['descripcionLarga'];
    $temporada = $_POST['temporada'];
    $categoria = $_POST['categoria'];

    if (isset($_FILES['rutaImagen'])) {
        $targetDir =   '../imgs/';
        $targetFile = $targetDir . basename($_FILES['rutaImagen']['name']);
        $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

        $validImageTypes = ['jpg', 'png', 'jpeg', 'gif'];
        if (in_array($imageFileType, $validImageTypes)) {
            if (move_uploaded_file($_FILES['rutaImagen']['tmp_name'], $targetFile)) {
                $producto = new Producto(
                    0,
                    $nombre,
                    $precio,
                    basename($_FILES['rutaImagen']['name']),
                    $disponible,
                    $edicionLimitada,
                    $stock,
                    $porcentajeDescuento,
                    $descripcionCorta,
                    $descripcionLarga,
                    $temporada,
                    $categoria
                );

                $gestionProductos = new GestionProductos();
                $gestionProductos->crearProducto($producto);

                header("Location: TableroAdministradorProductos.php");
                exit();
            } else {
                echo "Error al subir la imagen.";
            }
        } else {
            echo "Solo se permiten imágenes JPG, PNG, JPEG, GIF.";
        }
    } else {
        echo "No se ha cargado ninguna imagen.";
    }
}
?>
