<?php
class Login {
    
    private $UserName;


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
        $query = "SELECT * FROM login JOIN individual ON login.individual_id=individual.individual_id  WHERE username='$USERname' OR ind_email='$user'";
        $result = $db->query($query);
        $row = $result->fetch();
        $password = $row['password'];
       
        if (password_verify($USERpassword, $password)){
            $this->$UserName = $row['ind_fname'] . ' ' . $row['ind_lname'];
        }
       
    }


}

?>