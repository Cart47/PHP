<?php

Class StageDB {
    
    public static function getAllStages(){
        
        $db = Database::getDB();
        
        $query = 'SELECT * FROM stages
                  ORDER BY stage_id';
        
        $stm = $db->prepare($query);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        
        $stages = array();
        foreach ($result as $row) {
            $stage = new StageClass($row['name']);
            $stage->setStageID($row['stage_id']);
            $stages[] = $stage;
        }
        
        return $stages;
    }
    
    public static function getPerformancesForStages(){
        
        $db = Database::getDB();
        
        $query = 'SELECT * FROM stages
                  ORDER BY stage_id';
        $stm = $db->prepare($query);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        
        $query = 'SELECT DISTINCT(day) FROM performances ORDER BY day';
        $stm = $db->prepare($query);
        $stm->execute();
        $dayResult = $stm->fetchAll(PDO::FETCH_ASSOC);
        
        $stages = array();
        foreach ($result as $row) {
            
            $days = array();
            foreach($dayResult as $day){
                $getPerformers = PerformanceDB::getPerformanceByStageID($row['stage_id'], $day['day']);
                $days[] = $getPerformers;
            }
            
            $stage = new StageClass($row['name']);
            $stage->setStageID($row['stage_id']);
            $stage->setPerformers(array_filter($days));
            
            $stages[] = $stage;
            
        }
        
        //var_dump($stages[1]->getPerformers());
        return array_filter($stages);
    }
    
    public static function getStageByID($stage_id){
     
        $db = Database::getDB();
        
        $query = 'SELECT * FROM stages
                  WHERE stage_id = :stage_id';
        
        $stm = $db->prepare($query);
        $stm->bindParam(':stage_id', $stage_id, PDO::PARAM_INT);
        $stm->execute();
        $getStages = $stm->fetch(PDO::FETCH_ASSOC);
        
        return $getStages;
        
    }
    
    public static function insertStage($stage){
        
        $db = Database::getDB();
        
        $stage_id = $stage->getStageID();
        $name = $stage->getName();
        
        $query = "INSERT INTO stages
                  (stage_id, name)
                  VALUES
                  ('$stage_id', '$name')";
        
        $stm = $db->prepare($query);
        $row_count = $stm->execute();
        return $row_count;
        
    }
    
    public static function updateStage($stage_id, $name){
        
        $db = Database::getDB();
        
        $query = 'UPDATE stages
                  SET name ="' . $name . '" 
                  WHERE stage_id = :stage_id';
        
        $stm = $db->prepare($query);
        $stm->bindParam(":stage_id", $stage_id, PDO::PARAM_INT);
        $row_count = $stm->execute();
        
        return $row_count;
        
    }
    
    public static function deleteStage($stage_id) {
          
        $db = Database::getDB();
        
        $query = 'DELETE FROM stages
                  WHERE stage_id = :stage_id';
        
        $stm = $db->prepare($query);
        $stm->bindParam(':stage_id', $stage_id, PDO::PARAM_INT);
        $row_count = $stm->execute();
        return $row_count;
        
    }
    
}

