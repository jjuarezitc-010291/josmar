<?php
require_once '../entidades/Producto.php';
require_once '../GestionProductos.php';

session_start();
    
if (!isset($_SESSION['esAdminLoggeado']) || $_SESSION['esAdminLoggeado'] !== true) {
    echo "No tienes permisos para ver esta sección :(";
    echo '<br><a href="../index.php">Volver al inicio</a>';
    die();
}

$idProducto = $_POST['idProducto'];
$nombre = $_POST['nombre'];
$precio = (float) $_POST['precio'];
$rutaImagen = $_POST['rutaImagen'];
$disponible = $_POST['disponible'] === 'Sí';
$edicionLimitada = $_POST['edicionLimitada'] === 'Sí';
$stock = (int) $_POST['stock'];
$porcentajeDescuento = (float) $_POST['porcentajeDescuento'];
$descripcionCorta = $_POST['descripcionCorta'];
$descripcionLarga = $_POST['descripcionLarga'];
$temporada = $_POST['temporada'];
$categoria = $_POST['categoria'];

$producto = new Producto(
    $idProducto, $nombre, $precio, $rutaImagen, 
    $disponible, $edicionLimitada, $stock, 
    $porcentajeDescuento, $descripcionCorta, 
    $descripcionLarga, $temporada, $categoria
);

$gestionProductos = new GestionProductos();

$actualizado = $gestionProductos->actualizarProducto($producto);

if ($actualizado) {
    echo 'El producto fue actualizado correctamente. <br>Serás redirigido en 3 segundos...';
    header('Refresh: 3; url=TableroAdministradorProductos.php');
} else {
    echo 'No se pudo actualizar el producto. Verifique los datos y vuelva a intentarlo.';
}
?>
