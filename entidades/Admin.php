<?php
class Admin {
    private string $nombreUsuario;
    private string $password;

    public function __construct(string $nombreUsuario, string $password) {
        $this->nombreUsuario = $nombreUsuario;
        $this->password = $password;
    }

    public function getNombreUsuario(): string {
        return $this->nombreUsuario;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setNombreUsuario(string $nombreUsuario) {
        $this->nombreUsuario = $nombreUsuario;
    }

    public function setPassword(string $password) {
        $this->password = $password;
    }
}

?>
