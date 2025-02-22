<?php 

class Votacion {

    private $id;
    private $voto;
    private $user;
    private $noticia;

    public function __construct($datos) {
        $this -> id = $datos['id'];
        $this -> voto = $datos['voto'];
        $this -> user = userRepository::getUserById($datos['user']);
        $this -> noticia = $datos['id_noticia'];
    }

    public function getId() {
        return $this -> id;
    }
    
    public function getVoto() {
        return $this -> voto;
    }
    
    public function getUser() {
        return $this -> user;
    }

    public function getNoticia() {
        return $this -> noticia;
    }

}
?>