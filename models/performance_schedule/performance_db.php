<?php

class PerformanceDB {
    
    public static function getPerformanceByID($performance_id){
     
        $db = Database::getDB();
        
        $query = 'SELECT performance_id, p.stage_id, p.browse_art_id, p.day, p.start_time, p.end_time, p.description, a.art_band_name, s.name
                  FROM performances p
                  JOIN browse_artist a
                  ON p.browse_art_id = a.browse_art_id
                  JOIN stages s
                  ON p.stage_id = s.stage_id
                  WHERE performance_id = :performance_id';
        
        $stm = $db->prepare($query);
        $stm->bindParam(':performance_id', $performance_id, PDO::PARAM_INT);
        $stm->execute();
        $row = $stm->fetch(PDO::FETCH_ASSOC);
        

            $perform = new PerformanceClass($row['stage_id'],
                                            $row['browse_art_id'],
                                            $row['day'],
                                            $row['start_time'],
                                            $row['end_time'],
                                            $row['description']);
            $perform->setPerformanceID($row['performance_id']);
            $perform->setArtistName($row['art_band_name']);
            $perform->setStageName($row['name']);
        
        return $perform;
       
    }
    
    public static function getPerformanceByStageID($stage_id, $day){
     
        $db = Database::getDB();
        
        $query = 'SELECT performance_id, p.stage_id, p.browse_art_id, day, p.start_time, p.end_time, p.description, a.art_band_name 
                  FROM performances p
                  JOIN browse_artist a 
                  ON p.browse_art_id = a.browse_art_id
                  WHERE stage_id = :stage_id
                  AND day = :day
                  ORDER BY start_time';
        
        $stm = $db->prepare($query);
        $stm->bindParam(':stage_id', $stage_id, PDO::PARAM_INT);
        $stm->bindParam(':day', $day, PDO::PARAM_STR);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        
        $stages = array();
        foreach ($result as $row) {
            $stage = new PerformanceClass($row['stage_id'],
                                          $row['browse_art_id'],
                                          $row['day'],
                                          $row['start_time'],
                                          $row['end_time'],
                                          $row['description']);
            $stage->setPerformanceID($row['performance_id']);
            $stage->setArtistName($row['art_band_name']);
            
            $stages[] = $stage;
        }

        return $stages;
      
    }
     
    public static function insertPerformance($perform){
        
        $db = Database::getDB();
        
        $performance_id = $perform->getPerformanceID();
        $stage_id = $perform->getStageID();
        $artist_id = $perform->getArtistID();
        $day = $perform->getDay();
        $start_time = $perform->getStartTime();
        $end_time = $perform->getEndTime();
        $description = $perform->getDescription();
        
        $query = "INSERT INTO performances
                  (performance_id, stage_id, browse_art_id, day, start_time, end_time, description)
                  VALUES
                  ('$performance_id', '$stage_id', '$artist_id', '$day', '$start_time', '$end_time', '$description')";
        
        $stm = $db->prepare($query);
        $row_count = $stm->execute();
        return $row_count;
        
    }
    
    public static function updatePerformance($performance_id, $stage_id, $browse_art_id, $day, $start_time, $end_time, $description){
        
        $db = Database::getDB();
        
        $query = 'UPDATE performances
                  SET stage_id ="' . $stage_id . '", browse_art_id ="' . $browse_art_id . '", day ="' . $day . '", start_time ="' . $start_time . '", end_time ="' . $end_time . '", description ="' . $description . '"
                  WHERE performance_id = :performance_id';
        
        $stm = $db->prepare($query);
        $stm->bindParam(':performance_id', $performance_id, PDO::PARAM_INT);
        $row_count = $stm->execute();
        
        return $row_count;
        
    }
    
    public static function deletePerformance($performance_id) {
          
        $db = Database::getDB();
        
        $query = 'DELETE FROM performances
                  WHERE performance_id = :performance_id';
        
        $stm = $db->prepare($query);
        $stm->bindParam(':performance_id', $performance_id, PDO::PARAM_INT);
        $row_count = $stm->execute();
        return $row_count;
        
    }
    
}

