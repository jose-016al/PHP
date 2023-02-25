<?php

class comentarioRepository {

    public static function getComentarios($id_articulo) {
        $comentarios = [];
        $db = Conectar::conexion();
        $result = $db -> query("SELECT id, comentario, DATE_FORMAT(fecha, '%H:%i %d/%m/%Y') AS fecha, mostrar, id_user, id_articulo FROM comentarios WHERE mostrar = 1 AND id_articulo = '$id_articulo' ORDER BY id DESC");
        while ($datos = $result -> fetch_assoc()) {
            $comentarios[] = new Comentario($datos);
        }
        return $comentarios;
    }

    public static function addComentario($comentario, $id_articulo) {
        $db = Conectar::conexion();
        $id_user = $_SESSION['user'] -> getId();
        $q = 'INSERT INTO comentarios (comentario, fecha, mostrar, id_user, id_articulo) VALUES("'.$comentario.'" ,NOW(), 1, "'.$id_user.'", "'.$id_articulo.'")';
        $result = $db -> query($q);
    }

    public static function ocultarComentario($id) {
        $db = Conectar::conexion();
        $q = "UPDATE comentarios SET mostrar = 0 WHERE id = $id";
        $result = $db -> query($q);
    }

}

?>