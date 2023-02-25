<?php

class UserRepository{

    public static function login($u,$p){
        $db=Conectar::conexion();
		$result= $db->query("SELECT * FROM users WHERE name = '".$u."' and pass = '".md5($p)."'");
		if($datos=$result->fetch_assoc())
            return new User($datos);
    }

    public static function register($u,$p){
        $db=Conectar::conexion();
       // echo "INSERT INTO users VALUES ( '', '".$u."', '".$p."', 1)";
		$result= $db->query("INSERT INTO users VALUES ('' , '".$u."', '".md5($p)."', 0)");
        require_once('views/loginView.phtml');
    }

    public static function getUserById($id){
        $db=Conectar::conexion();
		$result= $db->query("SELECT * FROM users WHERE id = '".$id."'");
		if($datos=$result->fetch_assoc())
            return new User($datos);
    }
}
?>