<?php

if (isset($_POST['añadir'])) {

    //comprobar todas las variables
    $imagen = basename($_FILES['imagen']['name']);
    $uploadfile = "views/images/" . $image;

    move_uploaded_file($_FILES['imagen']['tmp_name'], $uploadfile);
    //comprobamos que recibimos. borrar despues
    var_dump($_FILES['imagen']);

    ArticuloRepository::addArticulo($_POST['title'],$_POST['contenido'],$imagen);
    header("location:index.php");

    
} 

require_once("views/registroView.phtml");
die();

?>