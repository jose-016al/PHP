<?php

class ProductRepository{
    public static function getProducts(){
        $db=Conectar::conexion();
        $products=[];
		$result= $db->query("SELECT * FROM product");
		while($datos=$result->fetch_assoc()){
            $products[]= new Product($datos);
        }
        return $products;
    }

    public static function saveProduct($p){
        $db=Conectar::conexion();   
        
        $result= $db->query("INSERT INTO product VALUES (NULL, '".$p->getName()."', '".$p->getDesc()."', '".$p->getImage()."', ".$p->getPrice().", ".$p->getStock().", 1 )");
    }

    public static function getProductById($id){
        $db=Conectar::conexion();
        $product=null;
		$result= $db->query("SELECT * FROM product WHERE id = ".$id);
		if($datos=$result->fetch_assoc()){
            $product= new Product($datos);
        }
        return $product;
    }

    public static function updateProduct($p, $image){
        $db=Conectar::conexion();

        if(isset($image['name'])){
            move_uploaded_file($image['tmp_name'], 'views/images/'.$image['name']);
            $imageName=$image['name'];
        }
        $q="UPDATE product SET name='".$p->getName()."', description='".$p->getDesc()."', stock='".$p->getStock()."', ";
        if(isset($imageName))
            $q.="image='".$imageName."', ";
        $q.="price='".$p->getPrice()."', visible='".$p->getVisible()."' WHERE id=".$p->getId();
        $result= $db->query($q);

    }
}


?>