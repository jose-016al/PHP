<?php

//cargamos el modelo
require_once('models/UserModel.php');
require_once('models/articuloModel.php');
require_once('models/ArticuloRepository.php');
require_once('models/comentarioModel.php');
require_once('models/comentarioRepository.php');
require_once('models/userRepository.php');

session_start();

if(!isset($_SESSION['user'])) {
    $datos['id'] = 0;
    $datos['name'] = "";
    $datos['id_rol'] = 1;
    $_SESSION['user'] = new User($datos);
}

    // paginacion de articulos
$totalArticulos = ArticuloRepository::getArticulos();
$numArticulos = 2;
$totalPaginas = ceil($totalArticulos / $numArticulos);

if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
} else {
    $pagina = 1;
}

$articulos = ArticuloRepository::getArticulosPaginacion($pagina, $numArticulos);


if (isset($_GET['admin'])) {
   require_once("controllers/userController.php");
}

if (isset($_GET['comentario'])) {
    require_once('controllers/ComentarioController.php');
}

if (isset($_GET['añadir'])) {
    require_once('controllers/ArticuloController.php');
}

if (isset($_GET['articulo'])) {
    ArticuloRepository::ocultarArticulo($_GET['articulo']);
    header("location:index.php");
}

if (isset($_GET['comentario'])) {
    comentarioRepository::ocultarComentario($_GET['comentario']);
    header("location:index.php");
}

if (isset($_GET['buscador'])) {

    if (isset($_POST['busqueda'])) {
        $_GET['buscador'] = $_POST['buscar'];
    }
        
            // paginacion de articulos
    $totalArticulosBusqueda = ArticuloRepository::getBusqueda( $_GET['buscador'] );
    $numArticulosBusqeuda = 2;
    $totalPaginasBusqueda = ceil($totalArticulosBusqueda / $numArticulosBusqeuda);

    if (isset($_GET['paginaBusqueda'])) {
        $paginaBusqueda = $_GET['paginaBusqueda'];
    } else {
        $paginaBusqueda = 1;
    }

    $busqueda = ArticuloRepository::buscarPaginacion( $_GET['buscador'] , $paginaBusqueda, $numArticulosBusqeuda);   
    

    require_once("views/buscarView.phtml");
    die();
}



if(isset($_GET['login'])) {
    require_once('controllers/loginController.php');
    die();
}

// cargar la vista
require_once("views/mainView.phtml");
?>