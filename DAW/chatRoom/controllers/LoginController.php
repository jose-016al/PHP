<?php
if (isset($_POST['logeo'])) {
    $password = md5($_POST['password']);
    if (empty($_POST['user']) && empty($password)) {
        $error = "Error, Has dejado algun campo vacio";
    } else if ($user = UserRepository::login($_POST['user'], $password)) {
        $_SESSION['user'] = $user;
        header("location:index.php");
    } else {
        $error = "Usuario o contraseña incorrectos ";
    }
    
}

if (isset($_POST['registro'])) {
    if (empty($_POST['user']) || empty($_POST['password']) || empty($_POST['password2'])) {
        $error = "Error, Has dejado algun campo vacio";
    } else if (userRepository::comprobarUsuarioDuplicado($_POST['user']) == 0) {
        if ($_POST['password'] == $_POST['password2']) {
            UserRepository::registro($_POST['user'], $_POST['password']);
            header("location:index.php?login=registro");
        } else {
            $error = "Las contraseñas no coinciden";
        }
    } else {
        $error = "El nombre de usuario ya esta registrado";
    }
}

if (isset($_GET['logout'])) {
    // unset($_SESSION['user']);
    session_destroy();
    userRepository::quitarConectado($_SESSION['user']->getId());
    header("location:index.php");
}

require_once("views/loginView.phtml");
die();

?>