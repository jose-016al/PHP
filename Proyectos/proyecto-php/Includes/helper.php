<?php

function errorsView($errors, $value) {
  $alert = '';
  if (isset($errors[$value]) && !empty($value)) {
    $alert = "<div class='alert alert-error'>".$errors[$value]."</div>";
  }
  return $alert;
}

function cleanErrorsLogin() {
  if (isset($_SESSION['errors-login'])) {
    unset($_SESSION['errors-login']);
  }
}

function cleanErrorsRegister() {
  if (isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
  }

  if (isset($_SESSION['complete'])) {
    unset($_SESSION['complete']);
  }
}

function cleanErrorsCategory() {
  if (isset($_SESSION['errors-category'])) {
    unset($_SESSION['errors-category']);
  }
}

function cleanErrorsEntry() {
  if (isset($_SESSION['errors-entry'])) {
    unset($_SESSION['errors-entry']);
  }
}

function findAllCategory($db) {
  $sql = "SELECT * FROM categorias ORDER BY id ASC";
  return mysqli_query($db, $sql);
}

function findAllEntrysRecents($db) {
  $sql = "SELECT e.*, c.nombre AS 'categoria' FROM entradas e ".
    "INNER JOIN categorias c ON e.categoria_id = c.id ". 
    "ORDER BY e.id DESC LIMIT 4";
  return mysqli_query($db, $sql);
}