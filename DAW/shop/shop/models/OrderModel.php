<?php

class Order{
    private $id;
    private $user;
    private $date;
    private $total;
    private $state;
    private $orderLines;

    public function __construct($datos){
        $this->id = $datos['id'];
        $this->user = UserRepository::getUserById($datos['userId']);
        $this->date = $datos['date'];
        $this->total = $datos['total'];
        $this->state = $datos['state'];
        $this->orderLines = OrderLineRepository::getOrderLineByOrderId($datos['id']);
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of user
     */ 
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */ 
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of date
     */ 
    public function getDate()
    {
        return $this->date;
    }

    /**
     * Set the value of date
     *
     * @return  self
     */ 
    public function setDate($date)
    {
        $this->date = $date;

        return $this;
    }

    /**
     * Get the value of total
     */ 
    public function getTotal()
    {
        return $this->total;
    }

    /**
     * Set the value of total
     *
     * @return  self
     */ 
    public function setTotal($total)
    {
        $this->total = $total;

        return $this;
    }

    /**
     * Get the value of state
     */ 
    public function getState()
    {
        return $this->state;
    }

    /**
     * Set the value of state
     *
     * @return  self
     */ 
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Get the value of orderLines
     */ 
    public function getOrderLines()
    {
        return $this->orderLines;
    }

    /**
     * Set the value of orderLines
     *
     * @return  self
     */ 
    public function setOrderLines($orderLines)
    {
        $this->orderLines = $orderLines;

        return $this;
    }
}

?>