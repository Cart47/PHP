<?php

class Registration {
    
    private $newUser, $newEmail, $newPassword, $success;


    public function __construct($info)
    {
            $USERinfo = $info;
            $this->registerUser($USERinfo);
        
    }
    
    private function registerUser($info)
    {
            $db = Database::getDB();
            
            //Transforming the collected inputs into actual values and no $_POST(s)
            $USERname = Login::CleanInputs($info['user_name']);
            $USERemail = Login::CleanInputs($info['user_email']);         
            
            //encrypts password for added security using a VERY basic encryption
            $USERpassword = Login::CleanInputs($info['user_password']); 
            
            $encrPASS = password_hash($USERpassword, PASSWORD_BCRYPT);
            
            $query = "INSERT INTO  `CITFuser`.`login` (`user_id`,`user_name` ,`user_pass_crypt` ,`user_email`)
                  VALUES (NULL ,  '$USERname', '$encrPASS', '$USERemail')";
            
            $db->exec($query);
            $this->success = 'You have successfully registered';
            
        }
    }
   