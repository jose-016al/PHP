<?php

//cargamos el modelo
require_once('models/UserModel.php');
require_once('models/PeliModel.php');
require_once('models/PeliRepository.php');

session_start();

if(!isset($_SESSION['user'])){
    $datos['id']=0;
    $datos['name']="";
    $_SESSION['user'] = new User($datos);
}

if (isset($_POST['añadir'])) {
    $peliculas = PeliRepository::añadir($_POST['añadir']);
} else {
    $peliculas = PeliRepository::getPelis();
}

if (isset($_POST['busca'])) { 
    $peliculas=PeliRepository::busca($_POST['busca']);
} else {
    $peliculas = PeliRepository::getPelis();
}   
//cargamos las pelis
if ($_GET['añadir']) {
    require_once('controllers/registroController.php');
    die();
}

if(isset($_GET['login'])) {
    require_once('controllers/loginController.php');
    die();
}

// cargar la vista
require_once("views/mainView.phtml");
?>