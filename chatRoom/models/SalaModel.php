<?php

class Sala {

    private $id;
    private $name;
    private $descripcion;
    private $mensaje;

    public function __construct ($datos){
        $this -> id = $datos['id'];
        $this -> name = $datos['name'];
        $this -> descripcion = $datos['descripcion'];
        $this -> mensaje = MensajesRepository::getMensajesSalas($datos['id']);
    }

    public function getId() {
        return $this -> id;
    }
    
    public function getName() {
        return $this -> name;
    }

    public function getDescripcion() {
        return $this -> descripcion;
    }

    public function getMensaje() {
        return $this -> mensaje;
    }

} 

?>