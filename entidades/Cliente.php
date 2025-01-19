<?php

class Cliente {
    private int $id;
    private string $nombre;
    private string $apellidoPaterno;
    private string $apellidoMaterno;
    private string $direccion;
    private string $ciudad;
    private string $estado;
    private string $cp;
    private string $email;
    private string $telefono;
    private string $password;

    public function __construct(
        int $id,
        string $nombre,
        string $apellidoPaterno,
        string $apellidoMaterno,
        string $direccion,
        string $ciudad,
        string $estado,
        string $cp,
        string $email,
        string $telefono,
        string $password
    ) {
        $this->id = $id;
        $this->nombre = ucfirst($nombre);
        $this->apellidoPaterno = ucfirst($apellidoPaterno);
        $this->apellidoMaterno = ucfirst($apellidoMaterno);
        $this->direccion = $direccion;
        $this->ciudad = $ciudad;
        $this->estado = $estado;
        $this->cp = $cp;
        $this->email = $email;
        $this->telefono = $telefono;
        $this->password = $password;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getApellidoPaterno(): string {
        return $this->apellidoPaterno;
    }

    public function getApellidoMaterno(): string {
        return $this->apellidoMaterno;
    }

    public function getDireccion(): string {
        return $this->direccion;
    }

    public function getCiudad(): string {
        return $this->ciudad;
    }

    public function getEstado(): string {
        return $this->estado;
    }

    public function getCp(): string {
        return $this->cp;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getTelefono(): string {
        return $this->telefono;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = ucfirst($nombre);
    }

    public function setApellidoPaterno(string $apellidoPaterno): void {
        $this->apellidoPaterno = ucfirst($apellidoPaterno);
    }

    public function setApellidoMaterno(string $apellidoMaterno): void {
        $this->apellidoMaterno = ucfirst($apellidoMaterno);
    }

    public function setDireccion(string $direccion): void {
        $this->direccion = $direccion;
    }

    public function setCiudad(string $ciudad): void {
        $this->ciudad = $ciudad;
    }

    public function setEstado(string $estado): void {
        $this->estado = $estado;
    }

    public function setCp(string $cp): void {
        $this->cp = $cp;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setTelefono(string $telefono): void {
        $this->telefono = $telefono;
    }

    public function setPassword(string $password): void {
        $this->password = $password;
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'apellidoPaterno' => $this->apellidoPaterno,
            'apellidoMaterno' => $this->apellidoMaterno,
            'direccion' => $this->direccion,
            'ciudad' => $this->ciudad,
            'estado' => $this->estado,
            'cp' => $this->cp,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'password' => $this->password
        ];
    }
}

?>
