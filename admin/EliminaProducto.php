<?php
    require_once '../GestionProductos.php';

    session_start();
    
    if (!isset($_SESSION['esAdminLoggeado']) || $_SESSION['esAdminLoggeado'] !== true) {
        echo "No tienes permisos para ver esta sección :(";
        echo '<br><a href="../index.php">Volver al inicio</a>';
        die();
    }

    $gestionProductos = new GestionProductos();
    echo 'eliminando producto ' . $_GET['idProducto'];
    $idProducto = $_GET['idProducto'];
    $gestionProductos->eliminarProducto($idProducto);

    header('Location: TableroAdministradorProductos.php');
?>
