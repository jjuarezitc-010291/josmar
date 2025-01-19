<?php
    require_once 'entidades/CarritoCompras.php';

    session_start();

    $carritoCompras = $_SESSION['carritoCompras'];

    $idProducto = $_POST['idProducto'];
    $cantidad = $_POST['cantidad'];

    $carritoCompras->actualizarCantidadProducto($idProducto, $cantidad);

    header('Location: MuestraCarrito.php');
?>
