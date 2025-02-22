<?php

function errorsView($errors, $value) {
  $alert = '';
  if (isset($errors[$value]) && !empty($value)) {
    $alert = "<div class='alert alert-error'>".$errors[$value]."</div>";
  }
  return $alert;
}

function cleanErrors() {
  if (isset($_SESSION['errors'])) {
    unset($_SESSION['errors']);
  }

  if (isset($_SESSION['complete'])) {
    unset($_SESSION['complete']);
  }
}