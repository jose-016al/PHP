<?php

//cargamos el modelo
require_once("models/UserModel.php");
require_once("models/ProductModel.php");
require_once("models/UserRepository.php");
require_once("models/ProductRepository.php");
require_once("models/OrderModel.php");
require_once("models/OrderLineModel.php");
require_once("models/OrderRepository.php");
require_once("models/OrderLineRepository.php");

session_start();


if(!isset($_SESSION['user'])){
    $datos['id']=0;
    $datos['name']="";
    $datos['rol']=0;
    $_SESSION['user'] = new User($datos);
}
if(isset($_GET['login'])) {
    require_once('controllers/LoginController.php');
    die();
}

if(isset($_GET['product'])) {
    require_once('controllers/ProductController.php');
    die();
}

if(isset($_GET['order'])) {
    require_once('controllers/OrderController.php');
}

$products = ProductRepository::getProducts();

// cargar la vista
require_once("views/mainView.phtml");
?>