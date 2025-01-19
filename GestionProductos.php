<?php
require_once __DIR__ . '/entidades/Producto.php';

class GestionProductos {
    private $rutaArchivoCSV;

    public function __construct() {
        $this->rutaArchivoCSV = __DIR__ . '/db/productos.csv';

        if(!file_exists($this->rutaArchivoCSV)) {
            if(!is_dir(__DIR__ . '/db')) {
                mkdir(__DIR__ . '/db', 0777, true);
            }

            $archivo = fopen($this->rutaArchivoCSV, 'w');
            fputcsv($archivo, ['ID', 'Nombre producto', 'Precio', 'Ruta imagen',
                'Disponible', 'Edicion Limitada', 'Stock', 'Porcentaje descuento',
                'Descripcion corta', 'Descripcion larga', 'Temporada','Categoria']);
            fclose($archivo);
        }
    }

    public function crearProducto(Producto $producto) {
        $producto->setId($this->obtenSiguienteId());
        $datosProducto = $producto->toArray();

        $archivo = fopen($this->rutaArchivoCSV, 'a');
        fputcsv($archivo, $datosProducto);
        fclose($archivo);

        
    }

    public function obtenSiguienteId(): int {
        if (!file_exists($this->rutaArchivoCSV) || filesize($this->rutaArchivoCSV) == 0) {
            return 1;
        }

        $archivo = fopen($this->rutaArchivoCSV, 'r');
        $ids = [];

        fgetcsv($archivo, 1000, ",", '"','\\');

        while (($row = fgetcsv($archivo, 1000, ",", '"','\\')) !== false) {
            $ids[] = (int) $row[0];
        }
        fclose($archivo);

        $maxId = empty($ids) ? 0 : max($ids);
        return $maxId + 1;
    }

    public function obtenerProductos(): array {
        if (!file_exists($this->rutaArchivoCSV)) {
            return [];
        }
    
        $productos = [];
        $archivo = fopen($this->rutaArchivoCSV, 'r');
        fgetcsv($archivo, 1000, ",", '"','\\');
    
        while (($datos = fgetcsv($archivo, 1000, ",", '"','\\')) !== false) {
            
            $producto = new Producto(
                (int)$datos[0],
                $datos[1],
                (float)$datos[2],
                $datos[3],
                $datos[4],
                $datos[5],
                (int)$datos[6],
                $datos[7],
                $datos[8],
                $datos[9],
                $datos[10],
                $datos[11]
            );
            $productos[] = $producto;
        }
        fclose($archivo);
    
        return $productos;
    }

    public function obtenerProducto(int $idProducto): ?Producto {
        if (!file_exists($this->rutaArchivoCSV)) {
            return null;
        }
    
        $archivo = fopen($this->rutaArchivoCSV, 'r');
    
        fgetcsv($archivo, 1000, ",", '"','\\');
    
        while (($datos = fgetcsv($archivo, 1000, ",", '"','\\')) !== false) {
            if ((int)$datos[0] === $idProducto) {
                fclose($archivo);
    
                return new Producto(
                    (int)$datos[0],
                    $datos[1],
                    (float)$datos[2],
                    $datos[3],
                    $datos[4],
                    $datos[5],
                    (int)$datos[6],
                    $datos[7],
                    $datos[8],
                    $datos[9],
                    $datos[10],
                    $datos[11]
                );
            }
        }
    
        fclose($archivo);
    
        return null;
    }

    public function eliminarProducto(int $id): bool {
        if (!file_exists($this->rutaArchivoCSV)) {
            return false;
        }
    
        $productos = [];
        $archivo = fopen($this->rutaArchivoCSV, 'r');
    
        $encabezados = fgetcsv($archivo, 1000, ",", '"','\\');
        $productos[] = $encabezados;
    
        $productoEliminado = false;
        while (($datos = fgetcsv($archivo, 1000, ",", '"','\\')) !== false) {
            if ((int)$datos[0] !== $id) {
                $productos[] = $datos;
            } else {
                $productoEliminado = true;
            }
        }
    
        fclose($archivo);
    
        if ($productoEliminado) {
            $archivo = fopen($this->rutaArchivoCSV, 'w');
            foreach ($productos as $producto) {
                fputcsv($archivo, $producto);
            }
            fclose($archivo);
            return true;
        }
    
        return false;
    }
    
    public function actualizarProducto(Producto $producto): bool {
        if (!file_exists($this->rutaArchivoCSV)) {
            return false;
        }
    
        $productos = [];
        $archivo = fopen($this->rutaArchivoCSV, 'r');
        
        $encabezados = fgetcsv($archivo, 1000, ",", '"','\\');
        $productos[] = $encabezados;
    
        $productoActualizado = false;
    
        while (($datos = fgetcsv($archivo, 1000, ",", '"','\\')) !== false) {
            if ((int)$datos[0] === $producto->getId()) {
                $productos[] = $producto->toArray();
                $productoActualizado = true;
            } else {
                $productos[] = $datos;
            }
        }
    
        fclose($archivo);
    
        if ($productoActualizado) {
            $archivo = fopen($this->rutaArchivoCSV, 'w');
            foreach ($productos as $producto) {
                fputcsv($archivo, $producto, ',', '"', '\\');
            }
            fclose($archivo);
            return true;
        }
        return false;
    }

    public function obtenerProductosPorCategoria(string $categoria): array {
        if (!file_exists($this->rutaArchivoCSV)) {
            return [];
        }

        $productosFiltrados = [];
        $archivo = fopen($this->rutaArchivoCSV, 'r');
        fgetcsv($archivo, 1000, ",", '"','\\');
    
        while (($datos = fgetcsv($archivo, 1000, ",", '"','\\')) !== false) {
            if (strtolower($datos[11]) === strtolower($categoria)) {
                $producto = new Producto(
                    (int)$datos[0],
                    $datos[1],
                    (float)$datos[2],
                    $datos[3],
                    $datos[4] === 'Sí',
                    $datos[5] === 'Sí',
                    (int)$datos[6],
                    (float)$datos[7],
                    $datos[8],
                    $datos[9],
                    $datos[10],
                    $datos[11]
                );
                $productosFiltrados[] = $producto;
            }
        }

        fclose($archivo);

        return $productosFiltrados;
    }
}
?>
