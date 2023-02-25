<?php

class TiempoRepository {

    public static function comprobarJornada($id_user) {
        $db = Conectar::conexion();
        $result = $db -> query("SELECT * FROM tiempo WHERE user = $id_user AND fin IS NULL;");
        return $result->num_rows;
    }

    public static function comprobarIncidencias($id_user) {
        $db = Conectar::conexion();
        $result = $db -> query("SELECT SUM(incidencias) AS incidencias FROM tiempo WHERE user = $id_user AND fin IS NULL;");
        return $result->fetch_object()->incidencias;
    }

    public static function empezarJornada($id_user) {
        $db = Conectar::conexion();
        $result = $db -> query("INSERT INTO tiempo(inicio, user) VALUES (NOW(), $id_user)");
    }

    public static function incidencias($id_user) {
        $db = Conectar::conexion();
        $result = $db -> query("UPDATE tiempo SET incidencias = (incidencias+1) WHERE user = $id_user AND fin IS NULL");
        return $result;
    }

    public static function justificanteIndencia($id_user, $justificante) {
        $db = Conectar::conexion();
        $result = $db -> query("UPDATE tiempo SET justificante = '$justificante' WHERE user = $id_user AND fin IS NULL");
        return $result;
    }

    public static function finalizarJornada($id_user) {
        $db = Conectar::conexion();
        $result = $db -> query("UPDATE tiempo SET fin = NOW() WHERE user = $id_user AND fin IS NULL");
        return $result;
    }

    public static function getJornadas() {
        $jornadas = [];
        $db = Conectar::conexion();
        $result = $db -> query("SELECT id, DATE_FORMAT(inicio, '%d/%m/%Y %H:%i') AS inicio, DATE_FORMAT(inicio, '%d/%m/%Y %H:%i') AS fin, user, incidencias,  justificante FROM tiempo WHERE fin IS NOT NULL ORDER BY inicio");
        while ($datos = $result -> fetch_assoc()) {
            $jornadas[] = new Tiempo($datos);
        }
        return $jornadas;
    }

    public static function obtenerBusquedaFechas($mes, $year) {
        $jornadas = [];
        $db = Conectar::conexion();
        $result = $db -> query("SELECT * FROM tiempo WHERE MONTH(inicio) = $mes AND YEAR(inicio) = $year;");
        while ($datos = $result -> fetch_assoc()) {
            $jornadas[] = new Tiempo($datos);
        }
        return $jornadas;
    }

}

?>