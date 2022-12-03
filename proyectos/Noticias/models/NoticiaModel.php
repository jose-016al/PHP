<?php 

class Noticia {

    private $id;
    private $title;
    private $url;
    private $mostrar;
    private $user;
    private $getLikes;
    private $getDislikes;

    public function __construct($datos) {
        $this -> id = $datos['id'];
        $this -> title = $datos['title'];
        $this -> url = $datos['url'];
        $this -> mostrar = $datos['mostrar'];
        $this -> user = userRepository::getUserById($datos['user']);
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
    
    public function getUser() {
        return $this -> user;
    }

    public function getLikes() {
        return $this -> getLikes;
    }

    public function getDislikes() {
        return $this -> getDislikes;
    }

}
?>