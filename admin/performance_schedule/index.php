<?php

require ('../../models/database.php');
require ('../../models/performance_schedule/stage_class.php');
require ('../../models/performance_schedule/stage_db.php');
require ('../../models/performance_schedule/performance_class.php');
require ('../../models/performance_schedule/performance_db.php');
require ('../../models/browse_artist/artist.php');
require ('../../models/browse_artist/artist_db.php');


//Function gets the performances by day and stage using global variables
function getSchedule(){
    
    if(isset($_GET['id'])) {
        $stage_id = $_GET['id'];
    }else{
        $stage_id = 2;
    }
    
    GLOBAL $stages;
    GLOBAL $friday;
    GLOBAL $saturday;
    GLOBAL $sunday;
    GLOBAL $stageName;
    
    $stages = StageDB::getAllStages();
    $stageName = StageDB::getStageByID($stage_id);
    
    $fri = 'Friday';
    $sat = 'Saturday';
    $sun = 'Sunday';
    $friday = PerformanceDB::getPerformanceByStageID($stage_id, $fri);
    $saturday = PerformanceDB::getPerformanceByStageID($stage_id, $sat);
    $sunday = PerformanceDB::getPerformanceByStageID($stage_id, $sun);
    
}


if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'schedule';
}

if ($action == 'schedule'){ //default view
    
    getSchedule();
    include ('schedule.php');
    
// -------------------------------------- //    
// ---------- Inserting Stages ---------- //
// -------------------------------------- // 
    
} elseif ($action == 'addStage'){ 
 
    include ('insert_stage.php'); 
    
} elseif ($action == 'insertStage'){
    
    $stage_id = $_POST['stage_id'];
    $name = $_POST['name'];
    
    $stage = new StageClass($name);
    $addStage = StageDB::insertStage($stage);
    
    getSchedule();
    include ('schedule.php');
    
// -------------------------------------------- //    
// ---------- Inserting Performances ---------- //
// -------------------------------------------- // 
    
} elseif ($action == 'addPerformance'){ 
 
    $stages = StageDB::getAllStages();
    $artists = ArtistDB::getArtistNames();
    
    include ('insert_performance.php'); 
    
} elseif ($action == 'insertPerformance'){
    
    $performance_id = $_POST['performance_id'];
    $stage_id = $_POST['stage_id'];
    $artist_id = $_POST['browse_art_id'];
    $day = $_POST['day'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $description = $_POST['description'];
    
    $performance = new PerformanceClass($stage_id, $artist_id, $day, $start_time, $end_time, $description);
    $addPerformance = PerformanceDB::insertPerformance($performance);
    
    getSchedule();
    include ('schedule.php');

// ------------------------------------- //    
// ---------- Updating Stages ---------- //
// ------------------------------------- // 
    
} elseif ($action == 'editStage'){ 
 
    $stage_id = $_POST['stage_id'];  
    $stageByID = StageDB::getStageByID($stage_id);
    
    include ('update_stage.php'); 
    
} elseif ($action == 'updateStage'){ 
 
    $stage_id = $_POST['stage_id'];
    $name = $_POST['name'];
    
    StageDB::updateStage($stage_id, $name);
    
    getSchedule();
    include ('schedule.php'); 

// ------------------------------------------- //    
// ---------- Updating Performances ---------- //
// ------------------------------------------- //     
 
} elseif ($action == 'editPerformance'){ 
    
    $performance_id = $_POST['performance_id'];
 
    $stages = StageDB::getAllStages();
    $artists = ArtistDB::getArtistNames();
    
    $performByID = PerformanceDB::getPerformanceByID($performance_id);

    include ('update_performance.php'); 
    
} elseif ($action == 'updatePerformance'){ 
 
    $performance_id = $_POST['performance_id'];
    $stage_id = $_POST['stage_id'];
    $artist_id = $_POST['browse_art_id'];
    $day = $_POST['day'];
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $description = $_POST['description'];
      
    PerformanceDB::updatePerformance($performance_id, $stage_id, $artist_id, $day, $start_time, $end_time, $description);
    
    getSchedule();
    include ('schedule.php');     
    
    
// ------------------------------------- //    
// ---------- Deleting Stages ---------- //
// ------------------------------------- // 
    
} elseif ($action == 'deleteStage'){ 
 
    $stage_id = $_POST['stage_id']; 
    $selectedStage = StageDB::getStageByID($stage_id);
    
    include ('delete_stage.php'); 
    
} elseif ($action == 'yesDeleteStage'){ 
 
    $stage_id = $_POST['stage_id']; 
    StageDB::deleteStage($stage_id);
    
    getSchedule();
    include ('schedule.php'); 
    
    
// ------------------------------------------- //    
// ---------- Deleting Performances ---------- //
// ------------------------------------------- // 

} elseif ($action == 'deletePerformance'){ 
 
    $performance_id = $_POST['performance_id']; 
    
    $selectedPerformance = PerformanceDB::getPerformanceByID($performance_id);

    include ('delete_performance.php'); 
    
} elseif ($action == 'yesDeletePerformance'){ 
 
    $performance_id = $_POST['performance_id']; 
    PerformanceDB::deletePerformance($performance_id);
    
    getSchedule();
    include ('schedule.php'); 
    
}