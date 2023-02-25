<?php

class userRepository {

    public static function login($user, $password) {
        $db = Conectar::conexion();
        $result = $db -> query("SELECT * FROM users WHERE user = '$user' AND password = '$password';");
        if ($datos = $result -> fetch_assoc()) {
            return new User($datos);
        }
    }

    public static function comprobarUsuarioDuplicado($user) {
        $db = Conectar::conexion();
        $result = $db -> query("SELECT user FROM users WHERE user = '$user';");
        return $result -> num_rows;
    }

    public static function registro($user, $password) {
        $db = Conectar::conexion();
        $result = $db -> query("INSERT INTO users(user, password, rol) VALUES ('$user', md5('$password'), 1)");
        return $result;
    }

    public static function getUsuarios() {
        $usuarios = [];
        $db = Conectar::conexion();
        $result = $db -> query("SELECT * FROM users WHERE rol = 1");
        while ($datos = $result -> fetch_assoc()) {
            $usuarios[] = new User($datos);
        }
        return $usuarios;
    }

    public static function getUsuariosAdmin() {
        $usuarios = [];
        $db = Conectar::conexion();
        $result = $db -> query("SELECT * FROM users WHERE rol = 0");
        while ($datos = $result -> fetch_assoc()) {
            $usuarios[] = new User($datos);
        }
        return $usuarios;
    }

    public static function getUserById($id_user) {
        $db = Conectar::conexion();
        $result = $db -> query("SELECT * FROM users WHERE id = '".$id_user."'");
        if ($datos = $result -> fetch_assoc()) {
            return new User($datos);
        }
    }

    public static function quitarAdmin($id_user) {
        $db = Conectar::conexion();
        $result = $db -> query("UPDATE users SET rol = 1 WHERE id = '".$id_user."'");
        return $result;
    }

    public static function addAdmin($id_user) {
        $db = Conectar::conexion();
        $result = $db -> query("UPDATE users SET rol = 0 WHERE id = '".$id_user."'");
        return $result;
    }

}

?>