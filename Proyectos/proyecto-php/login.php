<?php

require_once './Includes/db.php';

function validateUserData($data) {
    $errors = [];

    $email = trim($data["email"] ?? "");
    $password = $data["password"] ?? "";

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "El correo no es válido";
    }

    if (empty($password)) {
        $errors["password"] = "La contraseña no puede estar vacía";
    }

    return $errors;
}

function login($db, $email, $password) {
    $email = mysqli_real_escape_string($db, $email);

    $sql = "SELECT * FROM usuarios WHERE email = '$email'";
    $login = mysqli_query($db, $sql);

    if ($login && mysqli_num_rows($login) == 1) {
        $user = mysqli_fetch_assoc($login);
        if (password_verify($password, $user['password'])) {
            $_SESSION['user'] = $user;
            return true;
        } else {
            $_SESSION['errors-login']['general'] = "Login incorrecto";    
        }
    } else {
        $_SESSION['errors-login']['general'] = "Error al iniciar sesión. Usuario no encontrado.";
    }

    return false;
}

if (isset($_POST['login'])) {
    $errors = validateUserData($_POST);

    if (empty($errors)) {
        login($db, $_POST["email"], $_POST["password"]);
    } else {
        $_SESSION['errors-login'] = $errors;
    }
}

header('Location: index.php');