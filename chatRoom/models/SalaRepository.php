<?php

class SalaRepository {

        // Devuelve un array con las salas
    public static function getSalas() {
        $salas = [];
        $db = Conectar::conexion();
        $result = $db -> query("SELECT * FROM salas");
        while ($datos = $result -> fetch_assoc()) {
            $salas[] = new Sala($datos);
        }
        return $salas;
    }

        // creacion de una nueva sala
    public static function addSala($name, $descripcion, $id_sala) {
        $db=Conectar::conexion();
        $result = $db -> query("INSERT INTO salas(name, descripcion, mensaje) VALUES ($name, $descripcion, $id_sala);");
        return $result; 
    }

}

?>