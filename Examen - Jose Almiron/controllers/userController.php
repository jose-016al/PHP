<?php

$usuarios = userRepository::getUsuarios();
$usuariosAdmin = userRepository::getUsuariosAdmin();

if (isset($_POST['quitarAdmin'])) {
    userRepository::quitarAdmin($_GET['id_user']);
    header("location:index.php?admin");
}

if (isset($_POST['addAdmin'])) {
    userRepository::addAdmin($_GET['id_user']);
    header("location:index.php?admin");
}

require_once("views/adminView.phtml");
die();

?>