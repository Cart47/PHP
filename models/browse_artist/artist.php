<?php

class Artist {
    private $browse_art_id;
    private $art_fname;
    private $art_lname;
    private $genre;
    private $description;
    private $display;
    private $band_name;
    private $picture;
    private $members;
    
    
    public function __construct($browse_art_id, $art_fname, $art_lname, $genre, $description, $display, $band_name, $picture, $members){
        $this->browse_art_id = $browse_art_id;
        $this->art_fname = $art_fname;
        $this->art_lname = $art_lname;
        $this->genre = $genre;
        $this->description = $description;
        $this->display = $display;
        $this->band_name = $band_name;
        $this->picture = $picture; 
        $this->members = $members; 
    }
    
    public function getID(){
      return $this->browse_art_id;   
    }
    
    public function setID($value){
        $this->browse_art_id = $value;
    }
    
    public function GetFName(){
        return $this->art_fname;
    }
    
    public function GetLName() {
        return $this->art_lname;
    }
    
    public function SetFName($value){
        $this->art_fname = $value;
    }
    
    public function SetLName($value){
        $this->art_lname = $value;
    }
    
    public function GetGenre(){
        return $this->genre;
    }
    
    public function GetDescription(){
        return $this->description;
    }
    
    public function GetBandName(){
        return $this->band_name;
    }
    
    public function GetPicture(){
        return $this->picture;
    }
    
    public function GetMembers(){
        return $this->members;
    }
    
    

}

