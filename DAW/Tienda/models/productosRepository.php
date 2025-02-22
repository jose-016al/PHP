<?php
class productosRepository {

    public static function getProductos() {
        $productos = [];
        $db = Conectar::conexion();
        $result = $db -> query("SELECT * FROM productos");
        while ($datos = $result -> fetch_assoc()) {
            $productos[] = new Productos($datos);
        }
        return $productos;
    }
    
    public static function addProducto($p) {
        $db = Conectar::conexion();
        $result = $db -> query("INSERT INTO productos(nombre, descripcion, imagen, precio, cantidad) VALUES ('$p->getNombre()', '$p->getDescripcion()', '$p->getImagen()', '$p->getPrecio', '$p->getCantidad()', 1)");
    }

    public static function getProductoById($id_producto) {
        $productos = [];
        $db = Conectar::conexion();
        $result = $db -> query("SELECT * FROM productos WHERE id = $id_producto");
        while ($datos = $result -> fetch_assoc()) {
            $productos[] = new Productos($datos);
        }
        return $productos;
    }


    // public static function ocultarProducto($id) {
    //     $db = Conectar::conexion();
    //     $q = "UPDATE productos SET mostrar = 0 WHERE id = $id";
    //     $result = $db -> query($q);
    // }

}
?>