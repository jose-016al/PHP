<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Practica 3</title>
        <link rel="stylesheet" href="style.css">
        <?php
        $_GET["seccion"];
        $menu = [
            "./?seccion=inicio" => "Inicio",
            "./?seccion=galeria" => "Galeria",
            "./?seccion=contacto" => "Contacto",
            "./?seccion=blog" => "Blog"
        ];
        $galeria = [
            "./img/foto1.jpg",
            "./img/foto2.jpg",
            "./img/foto3.jpg",
            "./img/foto4.jpg",
            "./img/foto5.jpg",
            "./img/foto6.jpg",
            "./img/foto7.jpg",
            "./img/foto8.jpg",
            "./img/foto9.jpg"
        ];
        ?>
    </head>
    <body>
        <header>
            <h1>Practica 3</h1>
            <nav>
                <?php
                echo '<ul>';
                    foreach ($menu as $indice => $valor) {
                        echo '<li class=enlaces><a href=' . $indice . '>' . $valor .  '</a></li>';
                    }
                echo '</ul>';
                ?>
            </nav>
        </header>
        <section>
            <?php
            if (isset($_GET["seccion"])) {
                switch ($_GET["seccion"]) {
                    case "inicio":
                        echo "<p>Esta es mi pagina web</p>";
                        echo '<img src=" ' . "./img/foto1.jpg" . ' " width ="50%">';
                        break;
                    case "galeria":
                        echo '<table>';
                        foreach ($galeria as $indice => $imagen) {
                            if ($indice % 3 == 0) {
                                echo '<tr>';
                            }
                            echo '<td>
                            <a href='. $imagen .'>
                            <img src=" ' . $imagen . ' " width ="100%" height="250px"></a>
                            </td>';
                        }
                        echo '</tr></table>';
                        break;
                    case "contacto":
                        echo '
                        <form action="">
                            <label>Nombre</label>
                            <input type="text">
                            <label>Apellidos</label>
                            <input type="text">
                            <label>Telefono</label>
                            <input type="text">
                            <label>Email</label>
                            <input type="email">
                        </form>
                        ';
                        break;
                    case "blog":
                        require_once("db.php");
                        $bd = Conectar::conexion();

                        $q = "SELECT * FROM blog";
                        $results = $bd -> query($q);

                        echo '<div id="blog">';
                        while ($datos = $results -> fetch_assoc()) {
                            echo '<div id="articulo"><h2>'. $datos['titulo'] .'</h2> <br>';
                            echo '<p>'.$datos['contenido'] . '</p><br>';
                            echo '<img src=" ' . $datos['imagen'] . ' " width ="50%">';            
                            echo '<div id="fecha"><p> Autor: '.$datos['autor'] . '</p>';
                            echo '<p> Fecha: '.$datos['fecha'] . '</p></div>';
                        }
                        echo '</div>';
                        break;
                }
            } else {
                echo "<p>Esta es mi pagina web</p>";
                echo '<img src=" ' . "./img/foto1.jpg" . ' " width ="50%">';
            }
            ?>
        </section>
    </body>
</html>