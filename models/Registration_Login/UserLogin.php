<?php

class Login {
    
    private $UserName, $password, $UserFullName;


    public function __construct($info)
    {
        $this->UserName = $info['UserName'];
        $this->password = $info['UserPass'];
        $this->UserCheck();
    }
    
    //Found this on through StackOverflow as a means to remove special characters
    public static function CleanInputs($Value) {
       $Value = str_replace(' ', '-', $Value); 
       $Value = preg_replace('/[^A-Za-z0-9\@._]/', '', $Value); 
       return preg_replace('/-+/', '-', $Value); 
    }
    
    public function UserCheck()
    {
        $db = Database::getDB();


        $USERname = self::CleanInputs($this->UserName);
        $USERpassword = self::CleanInputs($this->password);
        
        //username check
        $query = "SELECT * FROM login JOIN individual ON login.individual_id=individual.individual_id  WHERE username='$this->UserName' OR ind_email='$this->UserName'";
        $result = $db->query($query);
        $row = $result->fetch();
        $password = $row['password'];
       
        if (password_verify($this->password, $password)){
            $_SESSION['UserFullName'] = $row['ind_fname'] . ' ' . $row['ind_lname'];
            $_SESSION['Username'] = $this->UserName; 
        }
        else {  
            return 'Invalid User Name ';
        }
       
    }
    
}
?>