<?php

    //cargamos el modelo
require_once("models/Usermodel.php");
require_once("models/UserRepository.php");
require_once("models/NoticiaModel.php");
require_once("models/NoticiaRepository.php");
require_once("models/VotacionModel.php");
require_once("models/VotacionRepository.php");

session_start();

if (!isset($_SESSION['user'])) {
    $datos['id'] = 0;
    $datos['user'] = "";
    $datos['id_rol'] = 1;
    $_SESSION['user'] = new User($datos);
}

    // Login y registro
if (isset($_GET['login'])) {
    require_once('controllers/loginController.php');
    die();
}

    // Un array con todas las noticias
$noticias = NoticiaRepository::getNoticias();

    // Controlador para añadir noticias nuevas
if (isset($_GET['noticias'])) {
    require_once("controllers/noticiaController.php");
    die();
}

    // Busqueda del id de la noticia para ocultarla
if (isset($_GET['idNoticia'])) {
    NoticiaRepository::ocultarNoticia($_GET['idNoticia']);
    header("location:index.php");
}

    // Controlador para las votaciones
if (isset($_GET['idNoticiaVotar'])) {
        // getVotoUsuario devuelve 0 si el usuario no ha votado
    if (VotacionRepository::getVotoUsuario($_SESSION['user']->getId(),$_GET['idNoticiaVotar']) == 0) {
        if (isset($_GET['like']) == 1) {    
            VotacionRepository::votarLike($_SESSION['user']->getId(),$_GET['idNoticiaVotar']);
            header("location:index.php");
        } else {
            VotacionRepository::votarDisLike($_SESSION['user']->getId(),$_GET['idNoticiaVotar']);
            header("location:index.php");
        }
    } else {
        if (isset($_GET['like']) != 1 && VotacionRepository::comprobarVoto($_SESSION['user']->getId(), $_GET['idNoticiaVotar']) == 1) {
            VotacionRepository::modificarLike($_SESSION['user']->getId(), $_GET['idNoticiaVotar']);
            header("location:index.php");
        } else if (isset($_GET['dislike']) == 0 && VotacionRepository::comprobarVoto($_SESSION['user']->getId(), $_GET['idNoticiaVotar']) == 0) {
            VotacionRepository::modificarDislike($_SESSION['user']->getId(), $_GET['idNoticiaVotar']);
            header("location:index.php");
        } else {
            $error = 'Ya has votado';
        }
    }
}


    // cargar la vista
require_once("views/mainView.phtml");
?>