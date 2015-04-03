<?php

class Roles {
    
    public static function getRoles()
    {
        $db = Database::getDB();
        $query = "SELECT * FROM login 
                    JOIN individual 
                        ON login.individual_id=individual.individual_id 
                    LEFT JOIN admin 
                        ON login.admin_id=admin.admin_id ORDER BY login_id";
        $result = $db->query($query);
        $users = array();
        foreach ($result as $row) {
            $user = new User($row['login_id'],
                                 $row['admin_id'],
                                 $row['artist_id'],
                                 $row['volunteer_id'],
                                 $row['individual_id'],
                                 $row['username'],
                                 $row['role_id'],
                                 $row['ind_fname'],
                                 $row['ind_lname'],
                                 $row['ind_email'],
                                $row['ad_position']
                              );
            $users[] = $user;
            
        }
        
        return $users;
    }
    
     public static function getUserRoles($indID)
    {
        $db = Database::getDB();
        $query = "SELECT * FROM login l JOIN individual i ON l.individual_id = i.individual_id WHERE i.individual_id = '$indID'";
        $result = $db->query($query);
        $user = $result->fetch();
        $userInfo = new User($user['login_id'],
                             $user['admin_id'],
                             $user['artist_id'],
                             $user['volunteer_id'],
                             $user['individual_id'],
                             $user['username'],
                             $user['role_id'],
                             $user['ind_fname'],
                             $user['ind_lname'],
                             $user['ind_email'],
                              null);
        
        return $userInfo;
    }
    
    
     public static function deleteUser($individual_id) {
          
        $db = Database::getDB();
        
        $query = "DELETE FROM login WHERE individual_id = '$individual_id';
                  DELETE FROM individual WHERE individual_id = '$individual_id'";
        
        $row_count = $db->exec($query);
        
        return $row_count;
        
    }
}
?>