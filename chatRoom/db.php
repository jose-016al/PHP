<?php
class Conectar{
    public static function conexion(){
        $conexion=new mysqli("localhost", "root", "", "chatRoom");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}
?>