<?php

if(isset($_GET['new'])){
    require_once("views/newProductView.phtml");
}


if(isset($_POST['add'])){
    //verificar que hemos recibido todo
    if(isset($_POST['name']) && isset($_POST['description']) && isset($_POST['price']) && isset($_POST['stock']) && isset($_FILES['image']) ){
        //subir la imagen
        $imageName=$_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'], 'views/images/'.$imageName);
        //insert en la bbdd
        $_POST['image']=$imageName;
        $p=new Product($_POST);

        ProductRepository::saveProduct($p);
        $info = "Producto añadido correctamente";
    }
    require_once("views/newProductView.phtml");
}

if(isset($_GET['edit'])){
    $product=ProductRepository::getProductById($_GET['edit']);
    require_once("views/newProductView.phtml");

}

if(isset($_POST['update'])){
    $p=new Product($_POST);
    ProductRepository::updateProduct($p, $_FILES['image']);
    header('location: index.php?product&edit='.$p->getId());
}

?>