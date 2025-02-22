<?php

if (isset($_POST['addNoticia'])) {
    NoticiaRepository::addNoticia($_POST['title'],$_POST['url']);
    header("location:index.php");
} 

require_once("views/addNoticiasView.phtml");
die();

?>