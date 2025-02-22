<?php
if (isset($_POST['logeo'])) {
    $password = md5($_POST['password']);
    if (empty($_POST['dni']) && empty($password)) {
        $error = "Error, Has dejado algun campo vacio";
    } else if ($user = UserRepository::login($_POST['dni'], $password)) {
        $_SESSION['user'] = $user;
        header("location:index.php");
    } else {
        $error = "Usuario o contraseña incorrectos ";
    }
    
}

if (isset($_POST['registro'])) {
     if (userRepository::comprobarUsuarioDuplicado($_POST['dni']) == 0) {
        if ($_POST['password'] == $_POST['password2']) {
            UserRepository::registro($_POST['name'], $_POST['apellidos'], $_POST['dni'], $_POST['email'], $_POST['telefono'], $_POST['password']);
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
    header("location:index.php");
}

require_once("views/loginView.phtml");
die();

?>