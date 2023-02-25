<?php

class Carrito {

    private $id;
    private $user;
    private $fecha;
    private $total;
    private $estado;
    private $pedidos;

    public function __construct ($datos){
        $this -> id = $datos['id'];
        $this -> user = userRepository::getUserById($datos['user']);
        $this -> fecha = $datos['fecha'];
        $this -> total = $datos['total'];
        $this -> estado = $datos['estado'];
        $this -> pedidos = pedidoRepository::getPedidoById($datos['id']);
    }

    public function getId() {
        return $this -> id;
    }

    public function getUser() {
        return $this -> user;
    }
    
    public function getTotal() {
        return $this -> total;
    }
    
    public function getFecha() {
        return $this -> fecha;
    }
    
    public function getEstado() {
        return $this -> estado;
    }

    public function getPedidos() {
        return $this -> pedidos;
    }
    
}
?>