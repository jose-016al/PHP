<?php

class Comentario {

    private $id;
    private $fecha;
    private $comentario;
    private $id_user;
    PRIVATE $id_articulo;

    public function __construct($datos) {
        $this -> id = $datos['id'];
        $this -> fecha = $datos['fecha'];
        $this -> comentario = $datos['comentario'];
        $this -> id_user = userRepository::buscarUser($datos['id_user']);
        $this -> id_articulo = $datos['id_articulo'];
    }

    public function getId() {
        return $this -> id;
    }

    public function getFecha() {
        return $this -> fecha;
    }

    public function getComentario() {
        return $this -> comentario;
    }

    public function getId_user() {
        return $this -> id_user;
    }

    public function getId_articulo() {
        return $this -> id_articulo;
    }

}

?>