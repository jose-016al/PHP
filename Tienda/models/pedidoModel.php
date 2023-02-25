<?php

class Pedido {

    private $id;
    private $productos;
    private $cantidadProductos;
    private $totalPrecio;

    
    public function __construct ($datos) {
        $this -> id = $datos['id'];
        $this -> productos = productosRepository::getProductoById($datos['productos']);
        $this -> cantidadProductos = $datos['cantidadProductos'];
        $this -> totalPrecio = $datos['totalPrecio'];
    }
    
    public function getId() {
        return $this -> id;
    }

    public function getProductos() {
        return $this -> productos;
    }

    public function getCantidadProductos() {
        return $this -> cantidadProductos;
    }

    public function getTotalPrecio() {
        return $this -> totalPrecio;
    }

}
?>