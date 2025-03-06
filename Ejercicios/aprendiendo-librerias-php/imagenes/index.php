<?php
require '../vendor/autoload.php';

$foto_original = '85c.jpg';
$guardar = 'foto-modificada.jpg';

if (!file_exists($foto_original)) {
    echo "Error: El archivo $foto_original no se encuentra.";
}

$thumb = new PHPThumb\GD($foto_original);

$thumb->resize(50, 50);
$thumb->show();
$thumb->save($guardar);
