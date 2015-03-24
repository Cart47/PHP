<?php

class Validation {

    private $objFields;

    public function __construct(){
        //creates new object from the Fields class
        $this->objFields = new Fields();
    }

    public function getFields(){
        return $this->objFields; //objFields is an array of field objects
    }
    
    
    // ----- REQUIRED VALIDATION ----- //
    
    //Field name and value are required parameters, if $required = false is not passed in the parameter than it defaults to true
    public function required($name, $value, $required = true){
        
        //Gets the Field object that corresponds with the name parameter
        $field = $this->objFields->getField($name);
        
        //If not $required is false and there is no value passed, clear the error message and exit method 
        if(!$required && empty($value)){
            $field->clearErrorMsg();
            return;
        }
        
        //If field is required and has an empty value, show error
        if($required && empty($value)){
            $field->setErrorMsg("*Required");
        }else{
            $field->clearErrorMsg();
        }  
    }   
}