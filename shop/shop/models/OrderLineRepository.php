<?php
class OrderLineRepository{
    public static function getOrderLineByOrderId($id){
        $db=Conectar::conexion();
        $products=[];
		$result= $db->query("SELECT * FROM orderlines where idOrder=".$id);
		while($datos=$result->fetch_assoc()){
            $products[]= new OrderLine($datos);
        }
        return $products;
    }
    public static function addOrderLine($idP){
        $db=Conectar::conexion();
        $product = ProductRepository::getProductById($idP);
        $result= $db->query("INSERT INTO orderlines VALUES (NULL, ".$_SESSION['user']->getOrder()->getId().", ".$idP.", 1, ".$product->getPrice().")");
        return $db->insert_id;
    }
}

?>