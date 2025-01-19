<?php
require_once 'entidades/CarritoCompras.php';
require_once 'entidades/Producto.php';

session_start();

if(isset($_GET['id'])) {
    $idProducto = $_GET['id'];
    echo 'id is set: ' . $idProducto;

    $carritoCompras = $_SESSION['carritoCompras'];
    $carritoCompras->eliminaProducto($idProducto);

    header('Location: MuestraCarrito.php');
}

?>
