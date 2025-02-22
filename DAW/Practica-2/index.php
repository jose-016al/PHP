<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Practica 2</title>
        <?php
        $_GET["v"];
        $seccion1 = [
            "img/seccion-1/foto1.jpg",
            "img/seccion-1/foto2.jpg",
            "img/seccion-1/foto3.jpg"
        ];
        $seccion2 = [
            "img/seccion-2/foto1.jpg",
            "img/seccion-2/foto2.jpg",
            "img/seccion-2/foto3.jpg"
        ];
        $seccion3 = [
            "img/seccion-3/foto1.jpg",
            "img/seccion-3/foto2.jpg",
            "img/seccion-3/foto3.jpg"
        ];
        ?>
    </head>
    <body>
        <h1 style="text-align:center;">Practica 2</h1>
        <div id="contenedor">
            <?php 
            if (isset($_GET["v"])) {
                if ($_GET["v"] == "seccion1") {
                    foreach ($seccion1 as $imagen) {
                        echo '<img src=" ' . $imagen . ' " width="33%" height="250px">';
                    }
                } else if ($_GET["v"] == "seccion2") {
                    foreach ($seccion2 as $imagen) {
                        echo '<img src=" ' . $imagen . ' " width="33%" height="250px">';
                    }
                } else if ($_GET["v"] == "seccion3") {
                    foreach ($seccion3 as $imagen) {
                        echo '<img src=" ' . $imagen . ' " width="33%" height="250px">';
                    }
                }
            } 
            ?>
        </div>
    </body>
</html>