<?php
class Login {
    
    private $UserName, $UserPassword, $success;


    public function __construct($info)
    {
        $this->UserCheck($info['UserName'], $info['UserPass']);
        
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
        
        //username check
        $db = Database::getDB();
        $query = "SELECT * FROM login WHERE username='$USERname' OR individual_id=(SELECT individual_id FROM individual WHERE ind_email='$user')";
        $result = $db->query($query);
        $row = $result->fetch();
        $password = $row['password'];
       
        if (password_verify($USERpassword, $password)){
            return "waffles";
        }
        else
        {
            return "Pancakes";
        }
    }


}

?>