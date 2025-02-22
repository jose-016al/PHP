<?php

    //cargamos el modelo
require_once("models/UserModel.php");
require_once("models/UserRepository.php");
require_once("models/tiempoModel.php");
require_once("models/TiempoRepository.php");

session_start();

    // Login y registro
if (!isset($_SESSION['user'])) {
    $datos['id'] = 0;
    $datos['name'] = "";
    $datos['apellidos'] = "";
    $datos['DNI'] = "";
    $datos['email'] = "";
    $datos['telefono'] = "";
    $datos['rol'] = 1;
    $_SESSION['user'] = new User($datos);
}
if (isset($_GET['login'])) {
    require_once('controllers/loginController.php');
    die();
}

if (isset($_GET['admin'])) {
    require_once("controllers/userController.php");
}

if (isset($_GET['jornada'])) {
    require_once("controllers/JornadaController.php");
}

if (TiempoRepository::comprobarJornada($_SESSION['user']->getId()) == 1) {
    $finalizar = 1;
} else {
    $finalizar = 0;
}

$incidencias = TiempoRepository::comprobarIncidencias($_SESSION['user']->getId());

if (isset($_POST['justificar'])) {
    TiempoRepository::justificanteIndencia($_SESSION['user']->getId(),$_POST['justificante']);
    TiempoRepository::finalizarJornada($_SESSION['user']->getId());
    header("location:index.php");
}

if (isset($_GET['finalizar'])) {
    TiempoRepository::finalizarJornada($_SESSION['user']->getId());
    header("location:index.php");
}

$jornadas = TiempoRepository::getJornadas();

if (isset($_POST['obtenerFechas'])) {
    $jornadasFecha = TiempoRepository::obtenerBusquedaFechas($_POST['mes'], $_POST['year']);
    
}

    // cargar la vista
require_once("views/mainView.phtml");
?>