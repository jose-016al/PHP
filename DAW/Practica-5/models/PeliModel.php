<?php

class Peli {
    private $id;
    private $title;
    private $year;

    public function __construct($datos) {
        $this -> id= $datos['id'];
        $this -> title = $datos ['title'];
        $this -> year = $datos ['year'];
    }

    public function getId() {
        return $this -> id;
    }
    public function getTitulo() {
        return $this -> title;
    }
    public function getAño() {
        return $this -> year;
    }
}

?>