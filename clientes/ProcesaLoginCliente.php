<?php
    require '../entidades/Cliente.php';
    require '../clientes/GestionClientes.php';

    session_start();

    $email = $_POST['email'];
    $password = $_POST['password'];

    $gestionClientes = new GestionClientes();
    $inicioSesionExitoso = $gestionClientes->loggea($email, $password);

    if($inicioSesionExitoso) {
        header('Location: ../index.php');
    } else {
        header('Location: InicioSesionCliente.php');
    }
?>
