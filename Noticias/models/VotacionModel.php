<?php 

class Votacion {

    private $id;
    private $voto;
    private $id_user;
    private $id_noticia;

    public function __construct($datos) {
        $this -> id = $datos['id'];
        $this -> voto = $datos['voto'];
        $this -> id_user = userRepository::buscarUser($datos['id_user']);
        $this -> id_noticia = $datos['id_noticia'];
    }

    public function getId() {
        return $this -> id;
    }
    
    public function getVoto() {
        return $this -> voto;
    }
    
    public function getId_user() {
        return $this -> id_user;
    }

    public function getId_noticia() {
        return $this -> id_noticia;
    }

}
?>