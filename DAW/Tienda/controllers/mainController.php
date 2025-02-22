<?php

    //cargamos el modelo
require_once("models/Usermodel.php");
require_once("models/UserRepository.php");
require_once("models/productosModel.php");
require_once("models/productosRepository.php");
require_once("models/carritoModel.php");
require_once("models/carritoRepository.php");
require_once("models/pedidoModel.php");
require_once("models/pedidoRepository.php");

session_start();

    // Login y registro
if (!isset($_SESSION['user'])) {
    $datos['id'] = 0;
    $datos['user'] = "";
    $datos['rol'] = 1;
    $_SESSION['user'] = new User($datos);
}
if (isset($_GET['login'])) {
    require_once('controllers/loginController.php');
    die();
}

    // añadimos productos
if (isset($_GET['productos'])) {
    require_once('controllers/productosController.php');
    die();
}
$productos = productosRepository::getProductos();

    // el carrito de productos
if (isset($_GET['carrito'])) {
    require_once("views/carritoView.phtml");
    die();
}

    // cargar la vista
require_once("views/mainView.phtml");
?>