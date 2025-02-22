<?php
class OrderRepository{

    public static function getOpenOrderByUserId($id){
        $db=Conectar::conexion();
        $p=null;
		$result= $db->query("SELECT * FROM orders WHERE state = 0 and userId = ".$id);
		if($datos=$result->fetch_assoc()){
            $p= new Order($datos);
        }
        else {
            $q="INSERT INTO orders VALUES( NULL , $id, NOW(), 0, 0)";
            $result= $db->query($q);

            $result= $db->query("SELECT * FROM orders WHERE state = 0 and userId = ".$id);
            if($datos=$result->fetch_assoc()){
                $p= new Order($datos);
            }
        }
        return $p;
    }
}

?>