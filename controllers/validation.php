<?php

//Filter results
//handle filtered results
// validate 
// send back results
// Display results on screen. 


class Validation {
    
    public $errors = array();
    
    private static $expressions = array(
        'user_email' => "/[a-zA-Z0-9-.+]+@[a-zA-Z0-9-]+.[a-zA-Z]+/",
        'user_name' => "/[A-Za-z0-9]{2,30}/",
        'phone' => "/^\d{7,11}$/",
        'age' => "/^[0-9]{2}$/",
        'postal' => "/^[A-Za-z][1-9][A-Za-z][[:space:]]?[1-9][A-Za-z][1-9]$/",
        'user_password' => "/^[A-Za-z0-9]{8,20}$/"
    );
    
    public function validator($inputs) {
        foreach ($this::$expressions as $regName => $regex )
        {
            foreach ($inputs as $inputName => $inputValue) {
              //  echo $a . "->" . $b . "->" . $c . "->" . $d . "<br/>";
                if($inputName == $regName){
                   if($inputValue == null)
                    {
                       $this->errors[$inputName] = " is an empty";
                    }
                    else
                    {if (preg_match($regex, $inputValue))
                        {continue;}
                     else
                        {
                         $this->errors[$inputName] = " is an invalid input";
                        }
                   }      
               }
               else
               {continue;}
}}}}