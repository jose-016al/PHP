<?php
class Conectar{
    public static function conexion(){
        $conexion=new mysqli("localhost","jose","211099","blog");
        $conexion->query("SET NAMES 'utf8'");
        return $conexion;
    }
}
?>