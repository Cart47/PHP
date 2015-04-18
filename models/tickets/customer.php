<?php

class Customer {
    
    private $id;
    private $f_name;
    private $l_name;
    private $phone;
    private $email;
    
    public function __construct($f_name, $l_name, $phone, $email){

        $this->f_name = $f_name;
        $this->l_name = $l_name;
        $this->phone = $phone;
        $this->email = $email;
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setId($id){
        $this->id = $id;
    }
    
    public function getFname(){
        return $this->f_name;
    }
    
    public function setFname($f_name){
        $this->f_name = $f_name;
    }
    
    public function getLname(){
        return $this->l_name;
    }
    
    public function setLname($l_name){
        $this->l_name = $l_name;
    }
    
    public function getPhone(){
        return $this->phone;
    }
    
    public function setPhone($phone){
        $this->phone = $phone;
    }
    
    public function getEmail(){
        return $this->email;
    }
    
    public function setEmail($email){
        $this->email = $email;
    }
    
}

