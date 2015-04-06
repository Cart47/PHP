<?php

class User {
    private $logID, $adminID, $artistID, $volunteerID, $indID, $username, $roleID, $indFName, $indLName, $indEmail, $adPosition, $adDescription, $artBandName, $artFName, $artLName, $artGenre, $artDescription, $role, $volPosition, $volDescription;
    
    
    public function __construct($logID, $adminID, $artistID, $volunteerID, $indID, $username, $roleID, $indFName, $indLName, $indEmail, $adPosition, $adDescription, $artBandName, $artFName, $artLName, $artGenre, $artDescription, $role, $volPosition, $volDescription){
        $this->logID = $logID;
        $this->adminID = $adminID;
        $this->artistID = $artistID;
        $this->volunteerID = $volunteerID;
        $this->indID = $indID;
        $this->username = $username;
        $this->roleID = $roleID;
        $this->indFName = $indFName;
        $this->indLName = $indLName;
        $this->indEmail = $indEmail;
        $this->adPosition = $adPosition; 
        $this->adDescription = $adDescription;
        $this->artBandName = $artBandName;
        $this->artFName = $artFName;
        $this->artLName = $artLName;
        $this->artGenre = $artGenre;
        $this->artDescription = $artDescription;
        $this->role = $role;
        $this->volPosition = $volPosition;
        $this->volDescription = $volDescription;
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
    
    public function getRoleID() {
        return $this->roleID;
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
    
      public function getAdminDescription(){
        return $this->adDescription;
    }
    
    public function getArtBandName() {
        return $this->artBandName;
    }
    
    public function getArtFName() {
        return $this->artFName;
    }
    
    public function getArtLName() {
        return $this->artLName;
    }
    
    public function getArtGenre() {
        return $this->artGenre;
    }
    
    public function getArtDescription() {
        return $this->artDescription;
    }
    
    public function getRole(){
        return $this->role;
    }
    
    public function getVolPosition(){
        return $this->volPosition;
    }
    
     public function getVolDescription(){
        return $this->volDescription;
    }
    
}
