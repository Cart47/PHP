<?php

class User {
    private $logID, $adminID, $artistID, $volunteerID, $indID, $username, $role, $indFName, $indLName, $indEmail, $adPosition;
    
    
    public function __construct($logID, $adminID, $artistID, $volunteerID, $indID, $username, $role, $indFName, $indLName, $indEmail, $adPosition){
        $this->logID = $logID;
        $this->adminID = $adminID;
        $this->artistID = $artistID;
        $this->volunteerID = $volunteerID;
        $this->indID = $indID;
        $this->username = $username;
        $this->role = $role;
        $this->indFName = $indFName;
        $this->indLName = $indLName;
        $this->indEmail = $indEmail;
        $this->adPosition = $adPosition; 
    }
    
    public function getLogID() {
        return $this->logID;
    }
    
    
    public function getAdminID(){
        return $this->adminID;
    }
    
    public function getArtistID () {
        return $this->artistID;
    }
    
    public function getVolunteerID(){
        return $this->volunteerID;
    }
    
    public function getindID(){
        return $this->indID;
    }
    
    public function getUsername(){
        return $this->username;
    }
    
    public function getRole() {
        return $this->role;
    }
    
    public function getIndFName(){
        return $this->indFName;
    }
    
    public function getIndLName(){
        return $this->indLName;
    }
    
     public function getIndEmail(){
        return $this->indEmail;
    }
    
    public function getAdminPosition(){
        return $this->adPosition;
    }
    

}
