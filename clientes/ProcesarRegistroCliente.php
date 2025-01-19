<?php
require_once 'GestionClientes.php';
require_once '../entidades/Cliente.php';
require_once '../entidades/CarritoCompras.php';

session_start();

$gestionClientes = new GestionClientes();

$nombre = $_POST['nombre'];
$apellidoPaterno = $_POST['apellidoPaterno'];
$apellidoMaterno = $_POST['apellidoMaterno'];
$direccion = $_POST['direccion'];
$ciudad = $_POST['ciudad'];
$estado = $_POST['estado'];
$cp = $_POST['cp'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$password = $_POST['password'];

$nuevoCliente = new Cliente(
    0,
    $nombre,
    $apellidoPaterno,
    $apellidoMaterno,
    $direccion,
    $ciudad,
    $estado,
    $cp,
    $email,
    $telefono,
    $password
);

$gestionClientes->creaCliente($nuevoCliente);
$_SESSION['esClienteLoggeado'] = true;
$_SESSION['nombreCliente'] = $nuevoCliente->getNombre();
$_SESSION['cliente'] = $nuevoCliente;
$_SESSION['carritoCompras'] = new CarritoCompras();

header('Location: ../index.php');
?>
