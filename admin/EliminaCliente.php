<?php
    require_once '../clientes/GestionClientes.php';

    session_start();
    
    if (!isset($_SESSION['esAdminLoggeado']) || $_SESSION['esAdminLoggeado'] !== true) {
        echo "No tienes permisos para ver esta sección :(";
        echo '<br><a href="../index.php">Volver al inicio</a>';
        die();
    }

    $gestionClientes = new GestionClientes();
    echo 'eliminando producto ' . $_GET['idCliente'];
    $idCliente = $_GET['idCliente'];
    $gestionClientes->eliminarCliente($idCliente);

    header('Location: TableroAdministradorClientes.php');
?>
