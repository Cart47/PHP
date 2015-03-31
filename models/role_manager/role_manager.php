<?php

class Roles {
    
    public static function getRoles()
    {
        $db = Database::getDB();
        $query = "SELECT * FROM login JOIN individual ON login.individual_id=individual.individual_id";
        $result = $db->query($query);
        $row = $result->fetch();
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
                                 $row['ind_email']
                              );
            $users[] = $user;
            
        }
        
        return $users;
    }
    
}
?>