<?php

class Tiempo {

    private $id;
    private $inicio;
    private $fin;
    PRIVATE $incidencias;
    PRIVATE $justificante;
    private $user;

    public function __construct ($datos){
        $this -> id = $datos['id'];
        $this -> inicio = $datos['inicio'];
        $this -> fin = $datos['fin'];
        $this -> incidencias = $datos['incidencias'];
        $this -> justificante = $datos['justificante'];
        $this -> user = userRepository::getUserById($datos['user']);
    }

    public function getId() {
        return $this -> id;
    }
    
    public function getInicio() {
        return $this -> inicio;
    }

    
    public function getFin() {
        return $this -> fin;
    }
    
    public function getIncidencias() {
        return $this -> incidencias;
    }
    
    public function getJustificante() {
        return $this -> justificante;
    }

    public function getUser() {
        return $this -> user;
    }

} 

?>