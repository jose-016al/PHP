<?php
class ArticuloRepository {

    public static function getArticulos() {
        $db = Conectar::conexion();
        $result = $db -> query("SELECT COUNT(*) AS total FROM articulos WHERE mostrar = 1");
        return $result->fetch_object()->total;
    }

    public static function getArticulosPaginacion($pagina, $numArticulos) {
        $articulos = [];
        $db = Conectar::conexion();
        $pagina = ($numArticulos * $pagina) - 2;
        $result = $db -> query("SELECT id, title, contenido, DATE_FORMAT(fecha, '%H:%i %d/%m/%Y') AS fecha, mostrar, imagen, id_user FROM articulos WHERE mostrar = 1 ORDER BY id DESC LIMIT $pagina, $numArticulos");
        while ($datos = $result -> fetch_assoc()) {
            $articulos[] = new Articulo($datos);
        }
        return $articulos;
    }

    public static function addArticulo($title, $contenido, $imagen) {
        $db = Conectar::conexion();
        $id_user = $_SESSION['user'] -> getId();
        $q = 'INSERT INTO articulos (title, fecha, contenido, mostrar, imagen, id_user) VALUES("'.$title.'" ,NOW(), "'.$contenido.'", 1, "'.$imagen.'", "'.$id_user.'")';
        $result = $db -> query($q);
    }

    public static function ocultarArticulo($id) {
        $db = Conectar::conexion();
        $q = "UPDATE articulos SET mostrar = 0 WHERE id = $id";
        $result = $db -> query($q);
    }

    public static function getBusqueda($buscar) {
        $db = Conectar::conexion();
        $result = $db -> query("SELECT COUNT(*) AS total FROM articulos WHERE title LIKE '%$buscar%' OR contenido LIKE '%$buscar%';");
        return $result->fetch_object()->total;
    }

    public static function buscarPaginacion($buscar, $paginaBusqueda, $numArticulosBusqeuda) {
        $articulos = [];
        $db = Conectar::conexion();
        $paginaBusqueda = ($numArticulosBusqeuda * $paginaBusqueda) - 2;
        $result = $db -> query("SELECT * FROM articulos WHERE title LIKE '%$buscar%' OR contenido LIKE '%$buscar%' LIMIT $paginaBusqueda, $numArticulosBusqeuda;");
        while ($datos = $result -> fetch_assoc()) {
            $articulos[] = new Articulo($datos);
        }
        return $articulos;
    }

}
?>