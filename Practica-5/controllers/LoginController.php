<?php
if (isset($_POST['logeo'])) {
    if ($_POST['user'] && $_POST['password']) {
        $db = Conectar::conexion();
        $q = 'SELECT * FROM users WHERE user="'.$_POST['user'].'";';
        $result = $db -> query($q);
        if ($datos = $result -> fetch_assoc()) {
            if ($datos['password'] == $_POST['password']) {
                $_SESSION['user'] = new User($datos);
                require_once("views/mainView.phtml");
                die();
            } else $error = 'contraseña incorrecta';
        } else $error = 'usuario incorrecto';
    }
} else if (isset($_POST['registro'])) {
    $db = Conectar::conexion();
    $q = 'SELECT * FROM users WHERE user="'.$_POST['user'].'";';
    $result = $db -> query($q);
    if (isset($_POST['user']) && isset($_POST['password'])) {
        if ($datos = $result -> fetch_assoc()) {
            if ($datos['user'] == $_POST['user']) {
                echo 'El usuario ya existe';
            }
        } else if ($_POST['user'] == null || $_POST['password'] == null) {
            echo 'Has dejado campos en blanco';
        } else {
            $q = "INSERT INTO users(user, password) VALUES('".$_POST['user']."','".$_POST['password']."')";
            $result = $db -> query($q);
            echo "Se ha crado un registro con id ". $db -> insert_id;
            require_once("views/mainView.phtml");
            die();
             // else $error="No se ha podido crear el usuario " . $_POST['user'];  
        }
    }
} else if (isset($_GET['logout'])) {
    unset($_SESSION['user']);
    header("location:index.php");
}

require_once("views/loginView.phtml");
die();

?>