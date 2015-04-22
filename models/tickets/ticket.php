<?php

class Ticket {
    
    private $tick_id;
    private $tick_img;
    private $tick_type;
    private $tick_price;
    
    public function __construct($tick_type, $tick_price) {
        $this->tick_type = $tick_type;
        $this->tick_price = $tick_price;
    }
    
    public function getId(){
        return $this->tick_id;
    }
    
    public function setId($value){
        $this->tick_id = $value;
    }
    
     public function getImg(){
        return $this->tick_img;
    }
    
    public function setImg($value){
        $this->tick_img = $value;
    }
 
    public function getType(){
        return $this->tick_type;
    }
    
    public function setType($value){
        $this->tick_type = $value;
    }
    
    public function getPrice(){
        return $this->tick_price;
    }
    
    public function setPrice($value){
        $this->tick_price = $value;
    }
}

