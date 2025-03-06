<?php
require '../vendor/autoload.php';

// Array de frutas
$frutas = array("manzanas", "naranjas", "sandias");

// Log de FirePHP
\FB::log($frutas);  // Corregido el nombre de la variable

// Mensaje adicional en la consola
echo "Hola mundo";

// Log adicional en FirePHP
\FB::log("Muestrame en consola");
