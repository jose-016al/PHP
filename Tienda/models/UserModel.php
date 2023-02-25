<?php

class User {

    private $id;
    private $name;
    private $rol;
    private $carrito;

    public function __construct ($datos){
        $this -> id = $datos['id'];
        $this -> name = $datos['user'];
        $this -> rol = $datos['rol'];
    }

    public function getId() {
        return $this -> id;
    }
    
    public function getName() {
        return $this -> name;
    }

    public function getRol() {
        return $this -> rol;
    }

    // public function setOpenCarrito () {

    // }

        // Devuelve el id de carrito
    public function getCarrito() {
        return $this -> carrito;
    }

} 

?>