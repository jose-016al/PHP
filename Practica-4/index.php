<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Practica 4</title>
        <link rel="stylesheet" href="style.css">
        <?php
        $_GET["seccion"];
        $menu = [
            "./?seccion=login" => "Login",
            "./?seccion=signIn" => "Sign in"
        ];
        ?>
    </head>
    <body>
        <header>
            <h1>Practica 4</h1>
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
                switch ($_GET['seccion']) {
                    case 'signIn':
                        echo '<div id="formulario"><h2>Sign in</h2><form method="POST" action="./?seccion=signIn">
                            <label>Nombre: </label>
                            <input type="text" name="name">
                            <label>Contraseña: </label>
                            <input type="text" name="password">
                            <input type="submit" value="Registrarse">
                        </form></div>';
                        // ---------SIGN IN---------
                        $new_name = $_POST['name'];
                        $new_password = $_POST['password'];

                        require_once("db.php");
                        $bd = Conectar::conexion();

                        $q = "SELECT * FROM users WHERE name = ' . $new_name. '";
                        $results = $bd -> query($q);
                        $datos = $results -> fetch_assoc();

                        if (isset($new_name) && isset($new_password)) {
                            if ($new_name == $datos['name']) {
                                echo '<h2>El usuario ya existe</h2>';
                            } else if ($new_name == null || $new_password == null) {
                                echo '<h2>Has dejado algun campo vacio</h2>';
                            } else {
                                echo '<h2>Se ha creado el usuario correctamente</h2>';
                                $q = "INSERT INTO users(name, password) VALUES('".$new_name."','".$new_password."')";
                                $results = $bd -> query($q);
                            }
                        } 
                        break;
                    default:
                        echo '<div id="formulario"><h2>Login</h2><form method="POST" action="./?seccion=login">
                            <label>Nombre: </label>
                            <input type="text" name="name">
                            <label>Contraseña: </label>
                            <input type="text" name="password">
                            <input type="submit" value="Iniciar sesion">
                        </form></div>';
                        // ---------LOGIN---------
                        $name = $_POST['name'];
                        $password = $_POST['password'];

                        require_once("db.php");
                        $bd = Conectar::conexion();

                        $q = "SELECT * FROM users WHERE name ='".$name."' AND password ='".$password."'";
                        $results = $bd -> query($q);
                        $datos = $results -> fetch_assoc();

                        if (isset($name) && isset($password)) {
                            if ($name == null || $password == null) {
                                echo '<h2>Has dejado algun campo vacio</h2>';
                            } else if ($name == $datos['name'] && $password == $datos['password']) {
                                echo '<h2>Login correcto</h2>';
                            } else {
                                echo '<h2>Usuario o contraseña incorrectas</h2>';
                            }
                        }  
                        break;
                }
            ?>
        </section>
    </body>
</html>