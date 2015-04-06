<?php

class Roles {
    
    public static function getRoles()
    {
        $db = Database::getDB();
        $query = "SELECT * FROM login l 
                    JOIN individual i 
                        ON l.individual_id = i.individual_id 
                    LEFT JOIN admin ad
                        ON l.admin_id=ad.admin_id
                    LEFT JOIN browse_artist ba  
                        ON l.artist_id=ba.browse_art_id
                    LEFT JOIN volunteer v
                        ON l.volunteer_id=v.volunteer_id
                    LEFT JOIN roles r
                        ON l.role_id=r.role_id";
        $result = $db->query($query);
        $users = array();
        foreach ($result as $user) {
            $member = new User($user['login_id'],
                             $user['admin_id'],
                             $user['artist_id'],
                             $user['volunteer_id'],
                             $user['individual_id'],
                             $user['username'],
                             $user['role_id'],
                             $user['ind_fname'],
                             $user['ind_lname'],
                             $user['ind_email'],
                             $user['ad_position'],
                             $user['ad_description'],
                             $user['art_band_name'],
                             $user['art_fname'],
                             $user['art_lname'],
                             $user['genre'],
                             $user['description'],             
                             $user['role'],
                             $user['vol_position'],
                             $user['vol_description']
                              );  
            $users[] = $member;
            
        }
        
        return $users;
    }
    
     public static function getUserRoles($indID)
    {
        $db = Database::getDB();
        $query = "SELECT * FROM login l 
                    JOIN individual i 
                        ON l.individual_id = i.individual_id 
                    LEFT JOIN admin ad
                        ON l.admin_id=ad.admin_id
                    LEFT JOIN browse_artist ba  
                        ON l.artist_id=ba.browse_art_id
                    LEFT JOIN volunteer v
                        ON l.volunteer_id=v.volunteer_id
                    LEFT JOIN roles r
                        ON l.role_id=r.role_id     
                    WHERE i.individual_id = '$indID'";
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
                             $user['ad_position'],
                             $user['ad_description'],
                             $user['art_band_name'],
                             $user['art_fname'],
                             $user['art_lname'],
                             $user['genre'],
                             $user['description'],             
                             $user['role'],
                             $user['vol_position'],
                             $user['vol_description']
                            );
        
        return $userInfo;
    }
    
    
     public static function deleteUser($individual_id, $RoleID) {
          
        $db = Database::getDB();
        
        $query = "DELETE FROM login WHERE individual_id = '$individual_id'";
         
         if($RoleID == 2){
            $query .= " DELETE FROM admin WHERE individual_id = '$individual_id'";
        }
         
         if($RoleID == 3){
            $query .= " DELETE FROM volunteer WHERE individual_id = '$individual_id'";
        }
        
         if($RoleID == 4){
            $query .= " DELETE FROM browse_artist WHERE individual_id = '$individual_id'";
        }
        
        $row_count = $db->exec($query);
        
        return $row_count;
        
    }
}
?>