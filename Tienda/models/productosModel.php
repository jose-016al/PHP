<?php 

class Productos {

    private $id;
    private $nombre;
    private $descripcion;
    private $imagen;
    PRIVATE $precio;
    private $cantidad;
    private $mostrar;

    public function __construct($datos) {
        $this -> id = $datos['id'];
        $this -> nombre = $datos['nombre'];
        $this -> descripcion = $datos['descripcion'];
        $this -> imagen = $datos['imagen'];
        $this -> precio = $datos['precio'];
        $this -> cantidad = $datos['cantidad'];
        $this -> mostrar = $datos['mostrar'];
    }

    public function getId() {
        return $this -> id;
    }
    
    public function getNombre() {
        return $this -> nombre;
    }

    public function getDescripcion() {
        return $this -> descripcion;
    }

    public function getImagen() {
        return $this -> imagen;
    }
    
    public function getPrecio() {
        return $this -> precio;
    }

    public function getCantidad() {
        return $this -> cantidad;
    }

    public function getMostrar() {
        return $this -> mostrar;
    }

}
?>