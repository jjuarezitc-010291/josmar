<?php
require_once '../entidades/CarritoCompras.php';
require_once '../entidades/Cliente.php';

class GestionClientes {

    private $rutaArchivoCSV;

    public function __construct() {
        $this->rutaArchivoCSV =  '../db/clientes.csv';
        if(!file_exists($this->rutaArchivoCSV)) {
            if(!is_dir(  '../db')) {
                mkdir('../db', 0777, true);
            }

            $archivo = fopen($this->rutaArchivoCSV, 'w');
            fputcsv($archivo, ['Nombre', 'Password', 'Direccion']);
            fclose($archivo);
        }
    }

    public function creaCliente(Cliente $cliente) {
        $cliente->setId($this->obtenSiguienteId());
        $datosCliente = $cliente->toArray();
        $archivo = fopen($this->rutaArchivoCSV, 'a');
        fputcsv($archivo, $datosCliente);
        fclose($archivo);
    }

    public function obtenSiguienteId(): int {
        if (!file_exists($this->rutaArchivoCSV) || filesize($this->rutaArchivoCSV) == 0) {
            return 1;
        }

        $archivo = fopen($this->rutaArchivoCSV, 'r');
        $ids = [];

        while (($row = fgetcsv($archivo, 1000, ",", '"','\\')) !== false) {
            $ids[] = (int) $row[0];
        }
        fclose($archivo);

        $maxId = max($ids);

        return $maxId + 1;
    }

    public function loggea($email, $password) {
        if (!file_exists($this->rutaArchivoCSV)) {
            return false;
        }

        $archivo = fopen($this->rutaArchivoCSV, 'r');
        while (($row = fgetcsv($archivo, 1000, ",", '"','\\')) !== false) {
            if ($row[8] == $email && $row[10] == $password) {
                $cliente = new Cliente(
                    (int) $row[0], 
                    $row[1], 
                    $row[2], 
                    $row[3], 
                    $row[4], 
                    $row[5], 
                    $row[6], 
                    $row[7], 
                    $row[8], 
                    $row[9], 
                    $row[10]
                );
                session_start();
                $_SESSION['cliente'] = $cliente;

                $_SESSION['carritoCompras'] = new CarritoCompras();

                fclose($archivo);
                return true;
            }
        }

        fclose($archivo);
        return false;
    }

    public function obtenerClientes(): array {
        if (!file_exists($this->rutaArchivoCSV)) {
            return [];
        }

        $clientes = [];
        $archivo = fopen($this->rutaArchivoCSV, 'r');
        fgetcsv($archivo, 1000, ",", '"','\\');

        while (($row = fgetcsv($archivo, 1000, ",", '"','\\')) !== false) {
            $cliente = new Cliente(
                (int) $row[0],
                $row[1],
                $row[2],
                $row[3],
                $row[4],
                $row[5],
                $row[6],
                $row[7],
                $row[8],
                $row[9],
                $row[10]
            );
            $clientes[] = $cliente;
        }
        fclose($archivo);

        return $clientes;
    }

    public function eliminarCliente(int $id): bool {
        if (!file_exists($this->rutaArchivoCSV)) {
            return false;
        }

        $clientes = [];
        $archivo = fopen($this->rutaArchivoCSV, 'r');
        $encabezados = fgetcsv($archivo, 1000, ",", '"','\\');
        $clientes[] = $encabezados;

        $clienteEliminado = false;
        while (($row = fgetcsv($archivo, 1000, ",", '"','\\')) !== false) {
            if ((int)$row[0] !== $id) {
                $clientes[] = $row;
            } else {
                $clienteEliminado = true;
            }
        }

        fclose($archivo);

        if ($clienteEliminado) {
            $archivo = fopen($this->rutaArchivoCSV, 'w');
            foreach ($clientes as $cliente) {
                fputcsv($archivo, $cliente);
            }
            fclose($archivo);
            return true;
        }

        return false;
    }
}
?>
