<?php
class Login {
    
    private $UserName, $UserPassword, $success;


    public function __construct($info)
    {
        $this->UserName = $info['UserName'];
        $this->UserPassword = $info['UserPass'];
        $this->UserCheck($this->UserName, $this->UserPassword);
        
    }
    
    //Found this on through StackOverflow as a means to remove special characters
    public static function CleanInputs($Value) {
       $Value = str_replace(' ', '-', $Value); 
       $Value = preg_replace('/[^A-Za-z0-9\@.]/', '', $Value); 
       return preg_replace('/-+/', '-', $Value); 
    }
    
    private function UserCheck($user, $password)
    {
            $db = Database::getDB();
            
            
            $USERname = self::CleanInputs($user);
            $USERpassword = self::CleanInputs($password);
            
        
        
            //User Password encryption
            //$salt = '%IG47GM46MD45GB44';    
            //$encrPASS = crypt($USERpassword, $salt);
            //$query = "INSERT INTO  `CITFuser`.`login` (`user_id`,`user_name` ,`user_pass_crypt` ,`user_email`)
        //          VALUES (NULL ,  '$USERname', '$encrPASS', '$USERemail')";
            
          //  $db->exec($query);
            //echo 'You have successfully logged in';
        
            echo "<p style='color:#fff; font-size:20px'>" . $USERname . "</p><br/>";
            echo "<p style='color:#fff; font-size:20px'>" . $USERpassword . "</p><br/>";
            echo 'Success';
        }
    }

?>