<?php

class User{
    private $id;
    private $name;
    private $rol;
    private $order;

    public function __construct ($datos){
        $this->id = $datos['id'];
        $this->name = $datos['name'];
        $this->rol = $datos['rol'];
        
    }

    public function getId(){
        return $this->id;
    }
    
    public function getName(){
        return $this->name;
    }
    public function getRol(){
        return $this->rol;
    }
    public function setOpenOrder(){
        $this->order=OrderRepository::getOpenOrderByUserId($this->id);
    }

    /**
     * Get the value of order
     */ 
    public function getOrder()
    {
        return $this->order;
    }
} 

?>