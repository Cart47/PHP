<?php 
     
class Volunteer {

    public static function getVolunteerPosition() {
        $db = Database::getDB();
        $query = 'SELECT DISTINCT vol_position, volunteer_id FROM volunteer';
        $result = $db->query($query);
        return $result;
    }
    
    public static function submitRequest($request){
        $volID = $request;
        $indID = $_SESSION['Individual_ID'];    
        
        
        $db = Database::getDB();
            $query = "INSERT INTO volunteer_request (volunteer_id, individual_id) VALUES ('$volID','$indID')";
        $success = $db->exec($query);
        return $success;
    }
    
    public static function getVolunteerRequests() {
        $db = Database::getDB();
        $query = 'SELECT * FROM volunteer_request vr 
                    JOIN individual i 
                        ON vr.individual_id=i.individual_id 
                    JOIN volunteer v 
                        ON v.volunteer_id=vr.volunteer_id';
        $result = $db->query($query);
        $requests = array();
         foreach ($result as $r) {
            $request = ['FirstName' => $r['ind_fname'], 'LastName' => $r['ind_lname'], 'Position' => $r['vol_position'], 'indID' => $r['individual_id']];
            $requests[] = $request;
        }
        
        return $requests;
    }
    
    
}