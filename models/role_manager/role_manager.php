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
    
    
     public static function deleteUser($individual_id, $RoleID, $user_role) {
          
        $db = Database::getDB();
        
        $query = "DELETE FROM login WHERE individual_id = '$individual_id';
                  DELETE FROM individual WHEREindividual_id = '$individual_id'";
         
         $row_count = $db->exec($query);
         
         if($RoleID == 2){
            self::deleteAdminUser($user_role);
        }
         
         if($RoleID == 3){
            self::deleteVolunteerUser($user_role);
        }
        
         if($RoleID == 4){
           self::deleteArtistUser($user_role);
        }
        
        return $row_count;
        
    }
    
     public static function deleteAdminUser($admin_id) {
     
        $db = Database::getDB();
         
        $query = " DELETE FROM admin WHERE admin_id = '$individual_id'";
        
        $row_count = $db->exec($query);
        
        return $row_count;
     }
    
    public static function deleteArtistUser($artist_id) {
     
        $db = Database::getDB();
         
        $query = " DELETE FROM artist WHERE browse_art_id = '$artist_id'";
        
        $row_count = $db->exec($query);
        
        return $row_count;
     }
       
    public static function deleteVolunteerUser($volunteer_id) {
     
        $db = Database::getDB();
         
        $query = " DELETE FROM volunteer WHERE volunteer_id = '$volunteer_id'";
        
        $row_count = $db->exec($query);
        
        return $row_count;
     }
    
    public static function EditUserRole($info)
    {
        if(isset($info['roleID'])){$roleIDnew = $info['roleID'];}
            else{$roleIDnew = $info['old_roleID'];}
        $roleIDold = $info['old_roleID'];
        $newRole = 'individual_id';
        $loginID = $_POST['loginID'];
        
        $db = Database::getDB();
        
        
        if($roleIDold != 1){
            
            if($roleIDold == 2){
            
                $adminID = $_POST['adminID'];
                $adminPosition = $_POST['admin_position'];
                $adminDescritption = $_POST['admin_description'];
                
                
                $query = "UPDATE admin SET ad_position='$adminPosition', ad_description='$adminDescritption' WHERE admin_id='$adminID'";
            
            }
            
            if($roleIDold == 3){
            
                $volID = $_POST['volunteerID'];
                $volPosition = $_POST['vol_position'];
                $volDescritption = $_POST['vol_description'];
                
                
                $query = "UPDATE volunteer SET vol_position='$volPosition', vol_description='$volDescritption' WHERE volunteer_id='$volID'";
                
            
            }
            if($roleIDold == 4){
            
                $ArtistID = $_POST['artistID'];
                $band_name = $_POST['band_name'];
                $art_fname = $_POST['artist_fname'];
                $art_lname = $_POST['artist_lname'];
                if (!empty($_POST['otherGenre'])){
                    $artGenre = $_POST['otherGenre'];
                } 
                else {
                    $artGenre = $_POST['ArtGenre'];
                }
                $band_description =  $_POST['band_description'];   
                
                
                $query = "UPDATE browse_artist SET art_band_name='$band_name', art_fname='$art_fname', art_lname='$art_lname', genre='$artGenre', description='$band_description' WHERE browse_art_id='$ArtistID'";
            
            }
        
            $change = $db->exec($query);
        }
        
        //For the individual table. If the new role is different from the reassigned role this executes to create a new role in that associated table.
        if($roleIDnew != $roleIDold ){
            
            if($roleIDnew == 2){
                
                $query2 = "INSERT INTO admin VALUES (null, ' ', null);";
                $individual = $db->exec($query2);
                
                $query3 = "SELECT MAX(admin_id) AS adminID FROM admin";
                $result = $db->query($query3);
                $row = $result->fetch();
                $newRoleID = $row['adminID'];
                $newRole = 'admin_id';
                
            }
            
            if($roleIDnew == 3){
            
                $query2 = "INSERT INTO volunteer VALUES (null, ' ', null);";
                $individual = $db->exec($query2);
                
                $query3 = "SELECT MAX(volunteer_id) AS volunteerID FROM volunteer";
                $result = $db->query($query3);
                $row = $result->fetch();
                $newRoleID = $row['volunteerID'];
                $newRole = 'volunteer_id';
            
            }
            if($roleIDnew == 4){
             
                $query2 = "INSERT INTO browse_artist VALUES (null, null, null, null, null, ' ', null);";
                $individual = $db->exec($query2);
                
                $query3 = "SELECT MAX(browse_art_id) AS artistID FROM browse_artist";
                $result = $db->query($query3);
                $row = $result->fetch();
                $newRoleID = $row['artistID'];
                $newRole = 'artist_id';
            
            }
            
            $query5 = "UPDATE login
                  SET $newRole='$newRoleID', role_id='$roleIDnew' 
                  WHERE login_id='$loginID'";
        
            $login_change = $db->exec($query5);
        }
        
        //Updates the Individual Table after setting-up/reassigning the roles
        $indID = $info['indID'];
        $fname = $info['fname'];
        $lname = $info['lname'];
        $username = $info['username'];
        $email = $info['email'];
        
        $query4 = "UPDATE individual
                  SET ind_fname='$fname', ind_lname='$lname', ind_username ='$username', ind_email='$email' 
                  WHERE individual_id='$indID'";
        
        $individual_change = $db->exec($query4);
        
        
            $query6 = "UPDATE login
                  SET username='$username',
                  WHERE login_id='$loginID'";
        
            $login_username_change = $db->exec($query6);
          
        return $individual_change;
    }
    
    
}
?>