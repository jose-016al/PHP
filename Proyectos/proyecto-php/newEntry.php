<?php

require_once './Includes/db.php';

function validateEntryData($data) {
  $errors = [];
  
  $title = trim($data["title"] ?? "");
  $category = $data["category"] ?? null;
  $description = trim($data["description"] ?? "");

  if (empty($title) || is_numeric($title) || preg_match("/[0-9]/", $title)) {
      $errors["title"] = "El nombre no es válido";
  }

  if (empty($category) || $category == null) {
    $errors["category"] = "Debes seleccionar una categoria";
  }

  if (empty($description)) {
    $errors["description"] = "La descripcion no puede estar vacia";
  }

  return $errors;
}


if (isset($_POST['newEntry'])) {
  $errors = validateEntryData($_POST);

  if (empty($errors)) {
    try {
        $stmt = $db->prepare("INSERT INTO entradas (usuario_id, categoria_id, titulo, descripcion, fecha) VALUES (?,?,?,?, NOW())");
        $stmt->bind_param("iiss", $_SESSION['user']['id'], $_POST['category'], $_POST['title'], $_POST['description']);
        $stmt->execute();
        $stmt->close();
        header("Location: index.php");
        exit;
    } catch (mysqli_sql_exception $e) {
        $_SESSION['errors-entry']['general'] = "Error al crear la entrada.";
    }
  } else {
      $_SESSION['errors-entry'] = $errors;
  }
}

header('Location: newEntryView.php');