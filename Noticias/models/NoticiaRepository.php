<?php
class NoticiaRepository {

    public static function getNoticias() {
        $noticias = [];
        $db = Conectar::conexion();
        $result = $db -> query("SELECT * FROM noticias WHERE mostrar = 1 ORDER BY id DESC");
        while ($datos = $result -> fetch_assoc()) {
            $noticias[] = new Noticia($datos);
        }
        return $noticias;
    }

    public static function addNoticia($title, $url) {
        $db = Conectar::conexion();
        $id_user = $_SESSION['user'] -> getId();
        $result = $db -> query("INSERT INTO noticias(title, url, mostrar, voto_like, voto_dislike, id_user) VALUES ('$title', '$url', 1, 0, 0 '$id_user')");
        return $result;
    }

    public static function ocultarNoticia($id) {
        $db = Conectar::conexion();
        $q = "UPDATE noticias SET mostrar = 0 WHERE id = $id";
        $result = $db -> query($q);
    }

}
?>