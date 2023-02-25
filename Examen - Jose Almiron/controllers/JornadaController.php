<?php

if (TiempoRepository::comprobarJornada($_SESSION['user']->getId()) == 0) {
    TiempoRepository::empezarJornada($_SESSION['user']->getId());
} else {
    TiempoRepository::incidencias($_SESSION['user']->getId());
}

?>