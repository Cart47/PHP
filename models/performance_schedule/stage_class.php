<?php

class StageClass {
    
    private $stage_id, $name, $performers=[];
    
    public function __construct($name){
        $this->name = $name;
    }
    
    public function getStageID() {
        return $this->stage_id;
    }

    public function setStageID($value) {
        $this->stage_id = $value;
    }
    
    public function getName() {
        return $this->name;
    }

    public function setName($value) {
        $this->name = $value;
    }
    
    public function getPerformers() {
        return $this->performers;
    }

    public function setPerformers($value) {
        $this->performers = $value;
    }
   
}
