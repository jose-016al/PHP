<?php

class User {

    private $id;
    private $name;
    private $apellidos;
    private $dni;
    private $email;
    private $telefono;
    private $rol;

    public function __construct ($datos){
        $this -> id = $datos['id'];
        $this -> name = $datos['name'];
        $this -> apellidos = $datos['apellidos'];
        $this -> dni = $datos['DNI'];
        $this -> email = $datos['email'];
        $this -> telefono = $datos['telefono'];
        $this -> rol = $datos['rol'];
    }

    public function getId() {
        return $this -> id;
    }
    
    public function getName() {
        return $this -> name;
    }

    public function getApellidos() {
        return $this -> apellidos;
    }

    public function getDni() {
        return $this -> dni;
    }

    public function getEmail() {
        return $this -> email;
    }

    public function getTelefono() {
        return $this -> telefono;
    }

    public function getRol() {
        return $this -> rol;
    }


} 

?>