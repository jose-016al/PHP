<?php

class User {
    private $id;
    private $name;
    private $id_rol;

    public function __construct ($datos){
        $this->id = $datos['id'];
        $this->name = $datos['user'];
        $this->id_rol = $datos['id_rol'];
    }

    public function getId() {
        return $this->id;
    }
    
    public function getName() {
        return $this->name;
    }

    public function getId_rol() {
        return $this->id_rol;
    }

} 

?>