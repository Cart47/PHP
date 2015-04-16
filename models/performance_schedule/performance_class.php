<?php

class PerformanceClass {
    
    private $performance_id, $stage_id, $browse_art_id, $day, $start_time, $end_time, $description, $art_name, $stage_name;
    
    public function __construct($stage_id, $browse_art_id, $day, $start_time, $end_time, $description){
        $this->stage_id = $stage_id;
        $this->browse_art_id = $browse_art_id;
        $this->day = $day;
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->description = $description;
        
    }
    
     public function getPerformanceID() {
        return $this->performance_id;
    }

    public function setPerformanceID($value) {
        $this->performance_id = $value;
    }
    
     public function getStageID() {
        return $this->stage_id;
    }

    public function setStageID($value) {
        $this->stage_id = $value;
    }
    
     public function getArtistID() {
        return $this->browse_art_id;
    }

    public function setArtistID($value) {
        $this->browse_art_id = $value;
    }
    
    public function getDay() {
        return $this->day;
    }

    public function setDay($value) {
        $this->day = $value;
    }
    
    public function getStartTime() {
        return $this->start_time;
    }
    
    public function setStartTime($value) {
        $this->start_time = $value;
    }

    public function setEndTime($value) {
        $this->end_time = $value;
    }
    
    public function getEndTime() {
        return $this->end_time;
    }
    
    public function getDescription() {
        return $this->description;
    }

    public function setDescription($value) {
        $this->description = $value;
    }
    
    public function getArtistName() {
        return $this->art_name;
    }

    public function setArtistName($value) {
        $this->art_name = $value;
    }
    
    public function getStageName() {
        return $this->stage_name;
    }

    public function setStageName($value) {
        $this->stage_name = $value;
    }
   
}

