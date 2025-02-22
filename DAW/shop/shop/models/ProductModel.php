<?php

class Product{
    private $id;
    private $name;
    private $desc;
    private $image;
    private $price;
    private $stock;
    private $visible;

    public function __construct($datos){
        if(isset($datos['id']))
            $this->id=$datos['id'];
        else $this->id="";
        $this->name=$datos['name'];
        $this->desc=$datos['description'];
        if(isset($datos['image']))
            $this->image=$datos['image'];
        $this->price=$datos['price'];
        $this->stock=$datos['stock'];
        if(isset($datos['visible']))
            $this->visible=$datos['visible'];
        else 
            $this->visible = 0;
    }


    /**
     * Get the value of visible
     */ 
    public function getVisible()
    {
        return $this->visible;
    }

    /**
     * Set the value of visible
     *
     * @return  self
     */ 
    public function setVisible($visible)
    {
        $this->visible = $visible;

        return $this;
    }

    /**
     * Get the value of stock
     */ 
    public function getStock()
    {
        return $this->stock;
    }

    /**
     * Set the value of stock
     *
     * @return  self
     */ 
    public function setStock($stock)
    {
        $this->stock = $stock;

        return $this;
    }

    /**
     * Get the value of price
     */ 
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * Get the value of image
     */ 
    public function getImage()
    {
        return $this->image;
    }

    /**
     * Get the value of desc
     */ 
    public function getDesc()
    {
        return $this->desc;
    }

    /**
     * Get the value of name
     */ 
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    public function __toString(){
        return $this->name;
    }
}

?>