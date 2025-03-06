<?php
require '../vendor/autoload.php';

$conexion = new mysqli("localhost", "user", "user", "blog");
$conexion->query("SET NAMES 'utf8'");

$consulta = $conexion->query("SELECT COUNT(id) AS total FROM entradas");

$pagination = new Zebra_Pagination();
$num_per_page = 2;

$pagination->records($consulta->fetch_object()->total);
$pagination->records_per_page($num_per_page);

$page = $pagination->get_page();
$offset = (($page - 1) * $num_per_page);
$entradas = $conexion->query("SELECT * FROM entradas LIMIT $offset, $num_per_page");

echo '<link rel="stylesheet" href="../vendor/stefangabos/zebra_pagination/public/css/zebra_pagination.css" type="text/css">';

while($entrada = $entradas->fetch_object()) {
  echo "<h1>{$entrada->titulo}</h1>";
}

$pagination->render();