<?php

if (isset($_POST['comentar'])) {
    comentarioRepository::addComentario($_POST['comentario'],$_GET['id_articulo']);
    header("location:index.php");
}

?>