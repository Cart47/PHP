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
            $query = "INSERT INTO  login (login_id, individual_id, username , password, role) VALUES ('null', '$volunteer', '$username', '$password', '1')";
            $loggedUser = $db->exec($query);
            return $loggedUser;
    }
    
    private function registerUser($info)
    {
            
            
            //Transforming the collected inputs into actual values and no $_POST(s)
            $USERname = Login::CleanInputs($info['user_name']);
            $USERfname = Login::CleanInputs($info['user_firstname']);
            $USERlname = Login::CleanInputs($info['user_lastname']);
            $USERemail = Login::CleanInputs($info['user_email']);         
            $USERpassword = Login::CleanInputs($info['user_password']); 
            
            $encrPASS = password_hash($USERpassword, PASSWORD_BCRYPT);
            
            $individual = $this->create_individual($USERfname, $USERlname,$USERname, $USERemail);
            $volunteerID = $this->individualID($USERname, $USERemail);
            $login = $this->registerLogin($USERname, $volunteerID, $encrPASS);
        }
    }
   