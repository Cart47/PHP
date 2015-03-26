<?php

class EmailDB {
    
    public static function getEmailsByStatus($option) {
        
        $db = Database::getDB();
        
        $query = 'SELECT * FROM email_subscription
                  WHERE approved ="' . $option . '"';
        
        $stm = $db->prepare($query);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        
        $emails = array();
        foreach ($result as $row) {
            $subscription = new EmailClass($row['name'],
                                           $row['email'],
                                           $row['approved']); 
            $subscription->setEmailID($row['email_id']);

            $emails[] = $subscription;
        }
   
        return $emails;
    }
    
    public static function getEmailByID($email_id){
     
        $db = Database::getDB();
        
        $query = 'SELECT * FROM email_subscription
                  WHERE email_id ="' . $email_id . '"';
        
        $result = $db->query($query);
        $getEmail = $result->fetch();
        
        return $getEmail;
        
    }

    public static function insertEmail($subscribe){
        
        $db = Database::getDB();
        
        $email_id = $subscribe->getEmailID();
        $name = $subscribe->getName();
        $email = $subscribe->getEmail();
        $approved = $subscribe->getApproval();
        
        $query = "INSERT INTO email_subscription
                  (email_id, name, email, approved)
                  VALUES
                  ('$email_id', '$name', '$email', '$approved')";
        
        $row_count = $db->exec($query);
        
        return $row_count;
        
    }
    
    public static function updateEmail($email_id, $name, $email, $approved){
        
        $db = Database::getDB();
        
        $query = 'UPDATE email_subscription
                  SET name ="' . $name . '", email ="' . $email . '", approved ="' . $approved . '"
                  WHERE email_id ="' . $email_id . '"';
        
        $row_count = $db->exec($query);
        
        return $row_count;
        
    }

    public static function deleteEmail($email_id) {
          
        $db = Database::getDB();
        
        $query = "DELETE FROM email_subscription
                  WHERE email_id ='" . $email_id . "'";
        
        $row_count = $db->exec($query);
        
        return $row_count;
        
    }
    
}

