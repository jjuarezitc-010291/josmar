<?php

require_once 'Producto.php';

class CarritoCompras {
    private $productos;

    public function __construct() {
        $this->productos = [];
    }

    public function agregarProducto(Producto $producto, int $cantidad) {
        $this->productos[] = [
            'producto' => $producto,
            'cantidad' => $cantidad
        ];
    }

    public function getProductos() {
        return $this->productos;
    }

    public function eliminaProducto(int $idProducto) {
        foreach($this->productos as $indice => $item) {
            $productoEnCarrito = $item['producto'];
            if($productoEnCarrito->getId() === $idProducto) {
                unset($this->productos[$indice]);
                $this->productos = array_values($this->productos);
                return;
            }
        }
    }

    public function obtenerTotalItems() {
        $totalItems = 0;
        foreach ($this->productos as $item) {
            $totalItems += $item['cantidad'];
        }
        return $totalItems;
    }

    public function obtenerTotalCosto() {
        $totalCosto = 0;
        foreach ($this->productos as $item) {
            $totalCosto += $item['producto']->getPrecio() * $item['cantidad'];
        }
        return $totalCosto;
    }

    public function actualizarCantidadProducto(int $idProducto, int $nuevaCantidad) {
        if ($nuevaCantidad <= 0) {
            $this->eliminaProducto($idProducto);
            return;
        }

        foreach ($this->productos as &$item) {
            if ($item['producto']->getId() === $idProducto) {
                $item['cantidad'] = $nuevaCantidad;
                return;
            }
        }
    }
}

?>
