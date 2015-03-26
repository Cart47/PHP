<?php

//The Field class creates a template of an input field, giving it a name and saving a space for potential error message
class Field {
    private $name; //name of input field
    private $msg = '';
    private $hasError = false;

    public function __construct($name){
        $this->name = $name;
    }

    public function getName(){
        return $this->name;
    }
   
    public function getMsg(){
        return $this->msg;
    }

    //Will act like a boolean flag
    public function hasError(){
        return $this->hasError;
    }

    //function that passes error message as parameter
    public function setErrorMsg($msg){
        $this->msg = $msg;
        $this->hasError = true;
    }

    public function clearErrorMsg(){
        $this->msg = '';
        $this->hasError = false;
    }

    //Function that displays the error msg if hasError is true
    public function showErrors(){
        $msg = htmlspecialchars($this->msg);
        if($this->hasError()){ //checking for truthiness
            return '<span style="color: red">' . $msg . '</span>';
        }
    }
}

//The Fields class creates an array of the Field objects
class Fields {
    
    private $fieldsArray = array();
    
    public function addField($name){
        
        //creates new object from Field class above
        $objField = new Field($name); 
        
        //populates the fieldsArray with the names of the fields and assigns it back to objField
        // 'name' => object of iself aka $name
        $this->fieldsArray[$objField->getName()] = $objField;
    }
    
    //Accepts a field name and returns the appropriate Field object from array
    public function getField($name){
        return $this->fieldsArray[$name];
    }
    
    //Foreach loop checks each field object for error
    public function hasErrors(){
        foreach ($this->fieldsArray as $field){
            if($field->hasError()){
                return true; //If field has error, hasError returns true.
            }
        }
    }
}