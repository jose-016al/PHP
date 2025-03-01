<?php

require_once './Includes/db.php';

function validateCategoryData($data) {
  $errors = [];
  
  $name = trim($data["name"] ?? "");

  if (empty($name) || is_numeric($name) || preg_match("/[0-9]/", $name)) {
      $errors["name"] = "El nombre no es válido";
  }

  return $errors;
}


if (isset($_POST['newCategory'])) {
  $errors = validateCategoryData($_POST);

  if (empty($errors)) {
    try {
        $stmt = $db->prepare("INSERT INTO categorias (nombre) VALUES (?)");
        $stmt->bind_param("s", $_POST['name']);
        $stmt->execute();
        $stmt->close();
        header("Location: index.php");
    } catch (mysqli_sql_exception $e) {
        $_SESSION['errors-category']['general'] = "Error al crear la categoria.";
    }
  } else {
      $_SESSION['errors-category'] = $errors;
  }
}

header('Location: newCategoryView.php');