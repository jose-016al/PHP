<?php

class PeliRepository{

    public static function getPelis() {
        $peliculas = [];

        $db = Conectar::conexion();
        $result = $db -> query("SELECT * FROM films");
        
        while ($datos = $result -> fetch_assoc()) {
            $peliculas[] = new Peli($datos);
        }
        return $peliculas;
    }

    public static function busca($db){
        $peliculas = [];
        
        $db=Conectar::conexion();
        $result = $db->query("SELECT * FROM films WHERE title='".$db."'");
        
        while($datos = $result -> fetch_assoc()) {
            $peliculas[] = new Peli($datos);
        }
        return $peliculas;
    }

    public function añadir($title){
        $peliculas = [];
        
        $db=Conectar::conexion();
        $result = $db->query("INSERT INTO films (`id`, `title`) VALUES (NULL, '".$title."');");
        
        while($datos = $result -> fetch_assoc()) {
            $peliculas[] = new Peli($datos);
        }
        return $peliculas;
    }

}

?>