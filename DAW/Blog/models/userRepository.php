<?php

class userRepository {

    public static function getUsuarios() {
        $usuarios = [];
        $db = Conectar::conexion();
        $result = $db -> query("SELECT * FROM users WHERE id_rol = 1");
        while ($datos = $result -> fetch_assoc()) {
            $usuarios[] = new User($datos);
        }
        return $usuarios;
    }

    public static function getUsuariosAdmin() {
        $usuarios = [];
        $db = Conectar::conexion();
        $result = $db -> query("SELECT * FROM users WHERE id_rol = 0");
        while ($datos = $result -> fetch_assoc()) {
            $usuarios[] = new User($datos);
        }
        return $usuarios;
    }

    public static function buscarUser($id_user) {
        $db = Conectar::conexion();
        $result = $db -> query("SELECT * FROM users WHERE id = '".$id_user."'");
        if ($datos = $result -> fetch_assoc()) {
            $usuario = new User($datos);
        }
        return $usuario;
    }

    public static function quitarAdmin($id_user) {
        $db = Conectar::conexion();
        $result = $db -> query("UPDATE users SET id_rol = 1 WHERE id = '".$id_user."'");
        return $result;
    }

    public static function addAdmin($id_user) {
        $db = Conectar::conexion();
        $result = $db -> query("UPDATE users SET id_rol = 0 WHERE id = '".$id_user."'");
        return $result;
    }

}

?>