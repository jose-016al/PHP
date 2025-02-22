<?php

class User {

    private $id;
    private $name;
    private $rol;
    private $conectado;
    private $ultimaConexion;

    public function __construct ($datos){
        $this -> id = $datos['id'];
        $this -> name = $datos['user'];
        $this -> rol = $datos['rol'];
        $this -> conectado = $datos['conectado'];
        $this -> ultimaConexion = $datos['ultimaConexion'];
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

    public function getConectado() {
        return $this -> conectado;
    }

    public function getTime() {
        return $this -> ultimaConexion;
    }


} 

?>