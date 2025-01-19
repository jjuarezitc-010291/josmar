<?php

require_once 'GestionProductos.php';
require_once 'entidades/CarritoCompras.php';

session_start();





$nombreProducto = $_POST['nombreProducto'];
$idProducto = $_POST['idProducto'];
echo 'Nombre del producto:: ' . $nombreProducto . '<';


echo '<pre>';
print_r($_POST);
echo '</pre>';


$cantidad = $_POST['cantidad'];
echo 'cantidad: ' . $cantidad;

$carrito = $_SESSION['carritoCompras'];


$gestionProductos = new GestionProductos();
echo 'nombreproducto ' . $nombreProducto;
$productoPorAgregar = $gestionProductos->obtenerProducto($idProducto);


echo 'agregando ' . $cantidad . ' ' . $nombreProducto . ' al carrito <br>';
echo 'el producto obtenido es: ' . $productoPorAgregar->getNombre();

$carrito->agregarProducto($productoPorAgregar, $cantidad);
$_SESSION['carritoCompras'] = $carrito;

header('Location: ./MuestraCarrito.php');

?>