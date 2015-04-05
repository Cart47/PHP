<?php

class Registration {
    
    private $newUser, $newEmail, $newPassword, $success;


    public function __construct($info)
    {
           $this->registerUser($info);
    }
    
    public function create_individual($fname, $lname, $username, $email)
    {
        $db = Database::getDB();
            $query = "INSERT INTO individual (individual_id, ind_fname , ind_lname, ind_username, ind_email) VALUES ('null','$fname', '$lname', '$username', '$email')";
        $individual = $db->exec($query);
        return $individual;
         
    }
    
    public function individualID($username, $email )
    {
        $db = Database::getDB();
        $query = "SELECT * FROM individual WHERE ind_username='$username' AND ind_email='$email'";
        $result = $db->query($query);
        $row = $result->fetch();
        $volunteer = $row['individual_id'];
        return $volunteer;
    }
    
    public function registerLogin($username, $volunteer, $password)
    {
            $db = Database::getDB();
            $query = "INSERT INTO  login (login_id, individual_id, username , password, role_id) VALUES ('null', '$volunteer', '$username', '$password', '1')";
            $loggedUser = $db->exec($query);
            return $loggedUser;
    }
    
    private function checkForDuplicates($username, $userEmail) 
    {
        $db = Database::getDB();   
        $query = "SELECT * FROM individual WHERE ind_username='$username' OR ind_email='$userEmail'";
        $result = $db->query($query);
        $row = $result->fetch();
        if(!empty($row['ind_username']) || !empty($row['ind_email'])){
            return false;
        } 
        else
        {
            return true;
        }
    }
    
    
    
    private function registerUser($info)
    {
            
            
            //Transforming the collected inputs into actual values and no $_POST(s)
            $USERname = Login::CleanInputs($info['UserName']);
            $USERfname = Login::CleanInputs($info['user_firstname']);
            $USERlname = Login::CleanInputs($info['user_lastname']);
            $USERemail = Login::CleanInputs($info['user_email']);         
            $USERpassword = Login::CleanInputs($info['UserPass']); 
            
            $check = $this->checkForDuplicates($USERname, $USERemail);
        
            if ($check == true){
                $encrPASS = password_hash($USERpassword, PASSWORD_BCRYPT);

                $individual = $this->create_individual($USERfname, $USERlname,$USERname, $USERemail);
                $volunteerID = $this->individualID($USERname, $USERemail);
                $login = $this->registerLogin($USERname, $volunteerID, $encrPASS);
                return true;    
            }
            else 
            {
                return false;
            }
    }
}
   