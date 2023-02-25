<?php 

class Articulo {

    private $id;
    private $title;
    private $contenido;
    private $fecha;
    private $imagen;
    private $id_user;
    private $comentarios;

    public function __construct($datos) {
        $this -> id = $datos['id'];
        $this -> title = $datos['title'];
        $this -> contenido = $datos['contenido'];
        $this -> fecha = $datos['fecha'];
        $this -> imagen = $datos['imagen'];
        $this -> id_user = userRepository::buscarUser($datos['id_user']);
        $this -> comentarios = comentarioRepository::getComentarios($datos['id']);
    }

    public function getId() {
        return $this->id;
    }
    
    public function getTitle() {
        return $this->title;
    }

    public function getContenido() {
        return $this->contenido;
    }

    public function getFecha() {
        return $this->fecha;
    }

    public function getImagen() {
        return $this->imagen;
    }

    public function getId_user() {
        return $this->id_user;
    }

    public function getComentarios() {
        return $this->comentarios;
    }

}
?>