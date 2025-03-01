<?php

require_once './Includes/db.php';

function validateUserData($data) {
    $errors = [];
    
    $name = trim($data["name"] ?? "");
    $surname = trim($data["surname"] ?? "");
    $email = trim($data["email"] ?? "");
    $password = $data["password"] ?? "";

    if (empty($name) || is_numeric($name) || preg_match("/[0-9]/", $name)) {
        $errors["name"] = "El nombre no es válido";
    }

    if (empty($surname) || is_numeric($surname) || preg_match("/[0-9]/", $surname)) {
        $errors["surname"] = "Los apellidos no son válidos";
    }

    if (empty($email) || !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors["email"] = "El correo no es válido";
    }

    if (empty($password)) {
        $errors["password"] = "La contraseña no puede estar vacía";
    }

    return $errors;
}

function register($db, $name, $surname, $email, $password) {
    $passwordSecure = password_hash($password, PASSWORD_BCRYPT, ['cost' => 4]);

    try {
        $stmt = $db->prepare("INSERT INTO usuarios (nombre, apellidos, email, password, fecha) VALUES (?, ?, ?, ?, CURDATE())");
        $stmt->bind_param("ssss", $name, $surname, $email, $passwordSecure);
        $stmt->execute();
        $stmt->close();
        return true;
    } catch (mysqli_sql_exception $e) {
        if ($e->getCode() == 1062) {
            $_SESSION['errors']['general'] = "El correo ya está registrado.";
        } else {
            $_SESSION['errors']['general'] = "Error al guardar el usuario.";
        }
        return false;
    }
}

// Código principal
if (isset($_POST['register'])) {
    $errors = validateUserData($_POST);

    if (empty($errors)) {
        if (register($db, $_POST["name"], $_POST["surname"], $_POST["email"], $_POST["password"])) {
            $_SESSION['complete'] = "El usuario se ha creado correctamente";
        }
    } else {
        $_SESSION['errors'] = $errors;
    }
}

header('Location: index.php');