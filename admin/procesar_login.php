<?php
    require_once 'GestionAdmin.php';

    session_start();

    $gestionAdmin = new GestionAdmin();

    $nombreUsuarioAdmin = $_POST['usuario'];
    $password = $_POST['password'];

    $estaAutorizado 
        = $gestionAdmin->estaAutorizado($nombreUsuarioAdmin, $password);

    if($estaAutorizado) {
        echo 'redireccionando a la zona de administradores';
        $_SESSION['esAdminLoggeado'] = true;
        header('Location: MenuAdmin.php');
    } else {
        echo 'credenciales incorrectas... redireccion de nuevo al login';
        header('Location: InicioSesionAdmin.php');
    }
?>
