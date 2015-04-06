<?php

class Artist {
    private $browse_art_id;
    private $art_fname;
    private $art_lname;
    private $genre;
    private $description;
    private $display;
    
    
    public function __construct($browse_art_id, $art_fname, $art_lname, $genre, $description, $display){
        $this->browse_art_id = $browse_art_id;
        $this->art_fname = $art_fname;
        $this->art_lname = $art_lname;
        $this->genre = $genre;
        $this->description = $description;
        $this->display = $display;
         
    }
    
    public function getID() {
        $this->browse_art_id;
    }
    
    public function setID($value){
        $this->browse_art_id = $value;
    }
    
    public function GetFName(){
        return $this->art_fname;
    }
    
    public function GetLName () {
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
    

}

