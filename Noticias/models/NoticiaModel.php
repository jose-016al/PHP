<?php 

class Noticia {

    private $id;
    private $title;
    private $url;
    private $mostrar;
    private $id_user;
    PRIVATE $getLikes;
    private $getDislikes;

    public function __construct($datos) {
        $this -> id = $datos['id'];
        $this -> title = $datos['title'];
        $this -> url = $datos['url'];
        $this -> mostrar = $datos['mostrar'];
        $this -> id_user = userRepository::buscarUser($datos['id_user']);
        $this -> getLikes = VotacionRepository::getLikes($datos['id']);
        $this -> getDislikes = VotacionRepository::getDislikes($datos['id']);
    }

    public function getId() {
        return $this -> id;
    }
    
    public function getTitle() {
        return $this -> title;
    }

    public function getUrl() {
        return $this -> url;
    }

    public function getMostrar() {
        return $this -> mostrar;
    }
    
    public function getId_user() {
        return $this -> id_user;
    }

    public function getLikes() {
        return $this -> getLikes;
    }

    public function getDislikes() {
        return $this -> getDislikes;
    }

}
?>