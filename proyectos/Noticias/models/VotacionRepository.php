<?php
class VotacionRepository {

        // Devuelve el numero de likes de una noticia
    public static function getLikes($id) {
        $db = Conectar::conexion();
        $result = $db -> query("SELECT COUNT(voto) AS likes FROM votaciones WHERE voto = 1 AND noticia = $id");
        return $result->fetch_object()->likes;
    }

        // Devuelve el numero de dislikes de una noticia
    public static function getDislikes($id) {
        $db = Conectar::conexion();
        $result = $db -> query("SELECT COUNT(voto) AS dislikes FROM votaciones WHERE voto = 0 AND noticia = $id");
        return $result->fetch_object()->dislikes;
    }

        // Añade un voto positivo
    public static function votarLike($id_user, $id_noticia) {
        $db = Conectar::conexion();
        $q = "INSERT INTO votaciones(voto, user, noticia) VALUES (1, $id_user, $id_noticia);";
        $result = $db -> query($q);
    }

        // Añade un voto negativo
    public static function votarDisLike($id_user, $id_noticia) {
        $db = Conectar::conexion();
        $q = "INSERT INTO votaciones(voto, user, noticia) VALUES (0, $id_user, $id_noticia);";
        $result = $db -> query($q);
    }

        // Devuelve el voto del usuario
    public static function getVotoUsuario($id_user, $id_noticia) {
        $db = Conectar::conexion();
        $result = $db -> query("SELECT user, noticia FROM votaciones WHERE user = $id_user AND noticia = $id_noticia");
        return $result->num_rows;
    }

        // Comprueba si el usuario ha votado
    public static function comprobarVoto($id_user, $id_noticia) {
        $db = Conectar::conexion();
        $result = $db -> query("SELECT voto FROM votaciones WHERE user = $id_user AND noticia = $id_noticia");
        return $result -> fetch_object() -> voto;
    }

        // Modifica un voto like por un dislike
    public static function modificarLike($id_user, $id_noticia) {
        $db = Conectar::conexion();
        $q = "UPDATE votaciones SET voto = 0 WHERE user = $id_user AND noticia = $id_noticia";
        $result = $db -> query($q);
    }

        // Modifica un voto dislike por un like
    public static function modificarDislike($id_user, $id_noticia) {
        $db = Conectar::conexion();
        $q = "UPDATE votaciones SET voto = 1 WHERE user = $id_user AND noticia = $id_noticia";
        $result = $db -> query($q);
    }

}
?>