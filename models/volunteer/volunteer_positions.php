<?php 
     
class Volunteer {

public static function getVolunteerPosition() {
        $db = Database::getDB();
        $query = 'SELECT DISTINCT vol_position, volunteer_id FROM volunteer';
        $result = $db->query($query);
        return $result;
    }
    
    
}