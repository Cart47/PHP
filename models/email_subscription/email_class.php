<?php

class EmailClass {
    
    private $email_id, $name, $email, $approved;
    
    public function __construct($name, $email, $approved) {
        $this->name = $name;
        $this->email = $email;
        $this->active = $approved;
    }
    
    public function getEmailID() {
        return $this->email_id;
    }

    public function setEmailID($value) {
        $this->email_id = $value;
    }
    
    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
    }
    
    public function getEmail() {
        return $this->email;
    }

    public function setEmail($value) {
        $this->email = $value;
    }
    
    public function getApproval() {
        return $this->approved;
    }

    public function setApproval($value) {
        $this->approved = $value;
    }
}
