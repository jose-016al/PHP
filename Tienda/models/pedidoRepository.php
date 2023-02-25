<?php

class pedidoRepository {

    public static function getPedidoById($id_carrito) {
        $db = Conectar::conexion();
        $productos = [];
		$result= $db -> query("SELECT * FROM pedidos where id = $id_carrito");
		while($datos=$result->fetch_assoc()){
            $productos[]= new Pedido($datos);
        }
        return $productos;
    }

    public static function addPedido($id_producto){
        $db = Conectar::conexion();
        $producto = productosRepository::getProductoById($id_producto);
        $result = $db -> query("INSERT INTO pedidos VALUES (NULL, ".$_SESSION['user']->getCarrito()->getId().", ".$id_producto.", 1, ".$producto->getPrecio().")");
        return $db->insert_id;
    }

}

?>