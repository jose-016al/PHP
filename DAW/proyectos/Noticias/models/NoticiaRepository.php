<?php
class NoticiaRepository {

        // Devuelve un array con todas las noticias
    public static function getNoticias() {
        $noticias = [];
        $db = Conectar::conexion();
        $result = $db -> query("SELECT * FROM noticias WHERE mostrar = 1 ORDER BY id DESC");
        while ($datos = $result -> fetch_assoc()) {
            $noticias[] = new Noticia($datos);
        }
        return $noticias;
    }

        // Añade una noticia a la base de datos
    public static function addNoticia($title, $url) {
        $db = Conectar::conexion();
        $id_user = $_SESSION['user'] -> getId();
        $result = $db -> query("INSERT INTO noticias(title, url, mostrar, id_user, getLikes, getDislikes) VALUES ('$title', '$url', '$id_user', 1, 0, 0)");
        return $result;
    }

        // Oculta la noticia segun su id
    public static function ocultarNoticia($id) {
        $db = Conectar::conexion();
        $q = "UPDATE noticias SET mostrar = 0 WHERE id = $id";
        $result = $db -> query($q);
    }

}
?>