<?php

if (isset($_GET['new'])) {
    require_once("views/addProductosView.phtml");    
}

if (isset($_POST['addProducto'])) {
    if (isset($_POST['nombre']) && isset($_POST['descripcion']) && isset($_POST['imagen']) && isset($_POST['precio']) && isset($_POST['cantidad'])) {
            //subir la imagen
        $imageName = $_FILES['imagen']['name'];
        move_uploaded_file($_FILES['imagen']['tmp_name'], 'views/images/'.$imageName);
        //insert en la bbdd
        $_POST['imagen'] = $imageName;
        $p = new Productos($_POST);
        
        productosRepository::addProducto($p);
        $info = "Producto añadido correctamente";
    }
    require_once("views/addProductosView.phtml");
} 

?>