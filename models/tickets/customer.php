<?php

class Customer {
    
    private $cust_id;
    private $cust_fname;
    private $cust_lname;
    private $cust_phone;
    private $cust_email;
    
    public function __construct($cust_name, $cust_name, $cust_phone, $cust_email){

        $this->cust_fname = $cust_fname;
        $this->cust_lname = $cust_lname;
        $this->cust_phone = $cust_phone;
        $this->cust_email = $cust_email;
    }
    
    public function getId(){
        return $this->cust_id;
    }
    
    public function setId($cust_id){
        $this->cust_id = $cust_id;
    }
    
    public function getFname(){
        return $this->cust_fname;
    }
    
    public function setFname($cust_fname){
        $this->cust_fname = $cust_fname;
    }
    
    public function getLname(){
        return $this->cust_lname;
    }
    
    public function setLname($cust_lname){
        $this->cust_lname = $cust_lname;
    }
    
    public function getPhone(){
        return $this->cust_phone;
    }
    
    public function setPhone($cust_phone){
        $this->cust_phone = $cust_phone;
    }
    
    public function getEmail(){
        return $this->cust_email;
    }
    
    public function setEmail($cust_email){
        $this->cust_email = $cust_email;
    }
    
}

