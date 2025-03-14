<!DOCTYPE html>
<html lang="es">

<?php 
session_start();
require_once 'autoload.php';
require_once './config/db.php';
require_once './helpers/utils.php';
require_once './config/parameters.php'; 

function show_error() {
  $error = new errorController();
  $error->index();
}
?>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Tienda de Camisetas</title>
  <link rel="stylesheet" href="<?=base_url?>assets/css/styles.css">
</head>

<body>
  <div id="container">
    <?php require_once './views/layout/header.php'; ?>

    <div id="content">
      <?php

      require_once './views/layout/aside.php';

      if (isset($_GET['controller'])) {
        $name_controller = $_GET['controller'] . 'Controller';
      } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
        $name_controller = controller_default;
      } else {
        show_error();
        exit();
      }

      if (class_exists($name_controller)) {
        $controller = new $name_controller();

        if (isset($_GET['action']) && method_exists($controller, $_GET['action'])) {
          $action = $_GET['action'];
          $controller->$action();
        } elseif (!isset($_GET['controller']) && !isset($_GET['action'])) {
          $action_default = action_default;
          $controller->$action_default();
        } else {
          show_error();
        }
      } else {
        show_error();
      }
      ?>
    </div>

    <?php require_once './views/layout/footer.php'; ?>
  </div>
</body>

</html>