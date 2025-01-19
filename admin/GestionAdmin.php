<?php

class GestionAdmin {
    private $rutaArchivoCSV;

    public function __construct() {
        $this->rutaArchivoCSV =  '../db/administradores.csv';
        if(!file_exists($this->rutaArchivoCSV)) {
            if(!is_dir(  '../db')) {
                mkdir('../db', 0777, true);
            }

            $archivo = fopen($this->rutaArchivoCSV, 'w');
            fputcsv($archivo, ['Nombre usuario', 'Password']);
            fputcsv($archivo, ['admin', 'admin']);
            fclose($archivo);
        }
    }

    public function estaAutorizado(string $nombreUsuario, string $password): bool {
        if($nombreUsuario === 'admin' && $password === 'admin') {
            return true;
        }
        return false;
    }
}

?>