<!--
    Practica 1, con las variables get mostramos distintas imagenes, segun 
    el numero que introduzca el usuario
-->
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Practica 1</title>
        <?php
    /* isset(),dicha función comprueba si una variable está definida o no en el script de PHP
    $_GET es una variable súper global de PHP que se utiliza para recopilar datos de 
    formulario después de enviar un formulario HTML con método="obtener".  */
        $_GET["v"];
        if (isset($_GET["v"]) && $_GET["v"] == 1) {
            $imagen = "img/foto1.jpg";
        } else if (isset($_GET["v"]) && $_GET["v"] == 2) {
            $imagen = "img/foto2.jpg";
        } else if (isset($_GET["v"]) && $_GET["v"] == 3) {
            $imagen = "img/foto3.webp";
        }
        ?>
    </head>
    <body>
        <h1 style="text-align:center;">Practica 1</h1>
        <?php 
        if (isset($imagen)) {
            echo '<img src=" ' . $imagen . ' " width ="100%">';
        }
        ?>
    </body>
</html>