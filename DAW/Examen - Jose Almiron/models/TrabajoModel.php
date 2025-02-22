<?php

class Trabajo {

    private $id;
    private $lugar;
    private $descripcion;
    private $fechaSalida;
    private $fechaRegreso;
    private $sueldo;
    private $user;
    PRIVATE $disponible;

    public function __construct ($datos){
        $this -> id = $datos['id'];
        $this -> lugar = $datos['lugar'];
        $this -> descripcion = $datos['descripcion'];
        $this -> fechaSalida = $datos['fechaSalida'];
        $this -> fechaRegreso = $datos['fechaRegreso'];
        $this -> sueldo = $datos['sueldo'];
        $this -> user = userRepository::getUserById($datos['user']);
        $this -> disponible = $datos['disponible'];
    }

    public function getId() {
        return $this -> id;
    }
    
    public function getLugar() {
        return $this -> lugar;
    }

    public function getDescripcion() {
        return $this -> descripcion;
    }

    public function getFechaSalida() {
        return $this -> fechaSalida;
    }

    public function getFechaRegreso() {
        return $this -> fechaRegreso;
    }

    public function getSueldo() {
        return $this -> sueldo;
    }

    public function getUser() {
        return $this -> user;
    }

    public function getDisponible() {
        return $this -> disponible;
    }

} 

?>