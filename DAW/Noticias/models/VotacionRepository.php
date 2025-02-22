<?php
class VotacionRepository {

    public static function getLikes($id) {
        $db = Conectar::conexion();
        $result = $db -> query("SELECT COUNT(voto) AS likes FROM votaciones WHERE voto = 1 AND id_noticia = $id");
        return $result->fetch_object()->likes;
    }

    public static function getDislikes($id) {
        $db = Conectar::conexion();
        $result = $db -> query("SELECT COUNT(voto) AS dislikes FROM votaciones WHERE voto = 0 AND id_noticia = $id");
        return $result->fetch_object()->dislikes;
    }

    public static function votarLike($id_user, $id_noticia) {
        $db = Conectar::conexion();
        $q = "INSERT INTO votaciones(voto, id_user, id_noticia) VALUES (1, $id_user, $id_noticia);";
        $result = $db -> query($q);
    }

    public static function votarDisLike($id_user, $id_noticia) {
        $db = Conectar::conexion();
        $q = "INSERT INTO votaciones(voto, id_user, id_noticia) VALUES (0, $id_user, $id_noticia);";
        $result = $db -> query($q);
    }

    public static function getVotoUsuario($id_user, $id_noticia) {
        $db = Conectar::conexion();
        $result = $db -> query("SELECT id_user, id_noticia FROM votaciones WHERE id_user = $id_user AND id_noticia = $id_noticia");
        return $result->num_rows;
    }

    public static function comprobarVoto($id_user, $id_noticia) {
        $db = Conectar::conexion();
        $result = $db -> query("SELECT voto FROM votaciones WHERE id_user = $id_user AND id_noticia = $id_noticia");
        return $result->fetch_object()->voto;
    }

    public static function modificarLike($id_user, $id_noticia) {
        $db = Conectar::conexion();
        $q = "UPDATE votaciones SET voto = 0 WHERE id_user = $id_user AND id_noticia = $id_noticia";
        $result = $db -> query($q);
    }

    public static function modificarDislike($id_user, $id_noticia) {
        $db = Conectar::conexion();
        $q = "UPDATE votaciones SET voto = 1 WHERE id_user = $id_user AND id_noticia = $id_noticia";
        $result = $db -> query($q);
    }

}
?>