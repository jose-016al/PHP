<?php

class carritoRepository {

    public static function getOpenOrderByUserId($id) {
        $db = Conectar::conexion();
        $p = null;
		$result = $db -> query("SELECT * FROM carrito WHERE estado = 0 AND user = $id");
		if ($datos = $result -> fetch_assoc()) {
            $p = new Carrito($datos);
        } else {
            $q = "INSERT INTO carrito VALUES(NULL , $id, NOW(), 0, 0)";
            $result = $db -> query($q);

            $result = $db -> query("SELECT * FROM carrito WHERE estado = 0 and user = $id");
            if ($datos = $result -> fetch_assoc()) {
                $p = new Carrito($datos);
            }
        }
        return $p;
    }

}

?>