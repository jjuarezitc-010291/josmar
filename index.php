<?php
require_once 'GestionProductos.php';
require_once __DIR__ . '/entidades/Producto.php';
require_once __DIR__ . '/entidades/CarritoCompras.php';
require_once __DIR__ . '/entidades/Cliente.php';

session_start();

$esClienteLoggeado = isset($_SESSION['cliente']) ?? false;

if ($esClienteLoggeado) {
    $cliente = $_SESSION['cliente'];
    $nombreCliente = $cliente->getNombre();
    $carrito = $_SESSION['carritoCompras'] ?? new CarritoCompras();
    $totalItemsEnCarrito = $carrito->obtenerTotalItems();
}


$gestionProductos = new GestionProductos();
$categoria = isset($_GET['categoria']) && !empty($_GET['categoria']) ? $_GET['categoria'] : 'flores';
$productos = $gestionProductos->obtenerProductosPorCategoria($categoria);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">
    <title>Florería Josmar</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+VN:wght@100..400&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playwrite+IN:wght@100..400&family=Playwrite+VN:wght@100..400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <div id="cabecera">
        <div id="logo">Florería JosMar</div>
        <div id="enlacesCabecera">
            <?php if (!$esClienteLoggeado): ?>
                <span><a href="clientes/RegistroCliente.php">Regístrate</a></span>
                <span><a href="clientes/InicioSesionCliente.php">Inicia Sesión</a></span>
                <span><a href="admin/InicioSesionAdmin.php">Administración</a></span>
            <?php else: ?>
                <span>Hola, <?= htmlspecialchars($nombreCliente) ?>!</span>
                <span><a href="MuestraCarrito.php">Carrito de compras (<?= $totalItemsEnCarrito ?>)</a></span>
                <span><a href="CierreSesion.php">Cierra sesión</a></span>
            <?php endif; ?>
        </div>
    </div>

    <img id="bannerPrincipal" src="imgs/visual/banner.png" />

    <div id="contenido">
        <div id="linksCategorias">
            <span><a href="index.php">Florería</a></span>
            <span><a href="index.php?categoria=comestibles">Comestibles</a></span>
            <span><a href="index.php?categoria=accesorios">Accesorios</a></span>
            <span><a href="index.php?categoria=decoracion">Decoración</a></span>
        </div>

        <div class="contenedorTarjetasProductos">
            <?php
            foreach ($productos as $producto):
            ?>
                <div class="tarjetaProducto">
                    <h1 class="tituloProducto"><?= htmlspecialchars($producto->getNombre()) ?></h1>
                    <div class="contenedorImagen">
                        <img src="imgs/<?php echo $producto->getRutaImagen(); ?>" />
                    </div>
                    <div class="contenedorPrecio">
                        <p>$<?= number_format($producto->getPrecio(), 2, ',', '.') ?></p>
                    </div>

                    <?php if ($esClienteLoggeado): ?>
                        <form action="AgregaACarrito.php" method="POST">
                            <input type="number" id="cantidad" name="cantidad" value="1" min="1" max="99" required>
                            <input type="hidden" name="nombreProducto" value="<?= htmlspecialchars($producto->getNombre()) ?>">
                            <input type="hidden" name="idProducto" value="<?= $producto->getId() ?>">
                            <button type="submit">Agregar a carrito</button>
                        </form>
                    <?php endif; ?>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</body>

</html>
