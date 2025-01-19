<?php

class Producto {
    private int $id;
    private string $nombre;
    private float $precio;
    private string $rutaImagen;
    private bool $disponible;
    private bool $edicionLimitada;
    private int $stock;
    private float $porcentajeDescuento;
    private string $descripcionCorta;
    private string $descripcionLarga;
    private string $temporada;
    private string $categoria;

    public function __construct(
        int $id,
        string $nombre, 
        float $precio, 
        string $rutaImagen,
        bool $disponible,
        bool $edicionLimitada,
        int $stock, 
        float $porcentajeDescuento,
        string $descripcionCorta,
        string $descripcionLarga,
        string $temporada,
        string $categoria
    ) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->precio = $precio;
        $this->rutaImagen = $rutaImagen;
        $this->disponible = $disponible;
        $this->edicionLimitada = $edicionLimitada;
        $this->stock = $stock;
        $this->porcentajeDescuento = $porcentajeDescuento;
        $this->descripcionCorta = $descripcionCorta;
        $this->descripcionLarga = $descripcionLarga;
        $this->temporada = $temporada;
        $this->categoria = $categoria;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getNombre(): string {
        return $this->nombre;
    }

    public function getPrecio(): float {
        return $this->precio;
    }

    public function getRutaImagen(): string {
        return $this->rutaImagen;
    }

    public function isDisponible(): bool {
        return $this->disponible;
    }

    public function isEdicionLimitada(): bool {
        return $this->edicionLimitada;
    }

    public function getStock(): int {
        return $this->stock;
    }

    public function getPorcentajeDescuento(): float {
        return $this->porcentajeDescuento;
    }

    public function getDescripcionCorta(): string {
        return $this->descripcionCorta;
    }

    public function getDescripcionLarga(): string {
        return $this->descripcionLarga;
    }

    public function getTemporada(): string {
        return $this->temporada;
    }

    public function getCategoria(): string {
        return $this->categoria;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function setNombre(string $nombre): void {
        $this->nombre = $nombre;
    }

    public function setPrecio(float $precio): void {
        $this->precio = $precio;
    }

    public function setRutaImagen(string $rutaImagen): void {
        $carpetaImgs = __DIR__ . '/imgs';

        if (file_exists($carpetaImgs . '/' . basename($rutaImagen))) {
            $this->rutaImagen = 'imgs/' . basename($rutaImagen);
        } else {
            throw new Exception("La imagen proporcionada no existe en la carpeta imgs.");
        }
    }

    public function setDisponible(bool $disponible): void {
        $this->disponible = $disponible;
    }

    public function setEdicionLimitada(bool $edicionLimitada): void {
        $this->edicionLimitada = $edicionLimitada;
    }

    public function setStock(int $stock): void {
        $this->stock = $stock;
    }

    public function setPorcentajeDescuento(float $porcentajeDescuento): void {
        $this->porcentajeDescuento = $porcentajeDescuento;
    }

    public function setDescripcionCorta(string $descripcionCorta): void {
        $this->descripcionCorta = $descripcionCorta;
    }

    public function setDescripcionLarga(string $descripcionLarga): void {
        $this->descripcionLarga = $descripcionLarga;
    }

    public function setTemporada(string $temporada): void {
        $this->temporada = $temporada;
    }

    public function setCategoria(string $categoria): void {
        $this->categoria = $categoria;
    }

    public function toArray(): array {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'precio' => $this->precio,
            'rutaImagen' => $this->rutaImagen,
            'disponible' => $this->disponible ? 'Sí' : 'No',
            'edicionLimitada' => $this->edicionLimitada ? 'Sí' : 'No',
            'stock' => $this->stock,
            'porcentajeDescuento' => $this->porcentajeDescuento,
            'descripcionCorta' => $this->descripcionCorta,
            'descripcionLarga' => $this->descripcionLarga,
            'temporada' => $this->temporada,
            'categoria' => $this->categoria
        ];
    }
}
?>
