<?php

require ('../../models/database.php');
require ('../../models/performance_schedule/stage_class.php');
require ('../../models/performance_schedule/stage_db.php');
require ('../../models/performance_schedule/performance_class.php');
require ('../../models/performance_schedule/performance_db.php');
require ('../../models/browse_artist/artist.php');
require ('../../models/browse_artist/artist_db.php');
require ('../../models/validation/field_classes.php');
require ('../../models/validation/validation_class.php');


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
    
    // ----- Validation ----- //

    //Creates an object from Validation class
    $validate = new Validation();

    //Creates a new fieldsArray
    $fields = $validate->getFields();

    //Adds the following field objects to the fieldsArray
    $fields->addField('name');

    //Assigns required validation to fields
    $validate->required('name', $name);

    //If there are no errors
    if(!$fields->hasErrors()){

        //Create an object from the Email class
        $stage = new StageClass($name);

        //Insert into the database
        $addStage = StageDB::insertStage($stage);
      
        getSchedule();
    include ('schedule.php');
        
    }else{
        
        include ('insert_stage.php');   
    }
    
// -------------------------------------------- //    
// ---------- Inserting Performances ---------- //
// -------------------------------------------- // 
    
} elseif ($action == 'addPerformance'){ 
 
    $stages = StageDB::getAllStages();
    $artists = ArtistDB::getArtistNames();
    
    include ('insert_performance.php'); 
    
} elseif ($action == 'insertPerformance'){
    
    $stages = StageDB::getAllStages();
    $artists = ArtistDB::getArtistNames();
    
    $performance_id = $_POST['performance_id'];
    $stage_id = (isset($_POST['stage_id']) ? $_POST['stage_id'] : '');
    $browse_art_id = (isset($_POST['browse_art_id']) ? $_POST['browse_art_id'] : '');
    $day = (isset($_POST['day']) ? $_POST['day'] : '');
    $start_time = $_POST['start_time'];
    $end_time = $_POST['end_time'];
    $description = $_POST['description'];
    
    // ----- Validation ----- //

    //Creates an object from Validation class
    $validate = new Validation();

    //Creates a new fieldsArray
    $fields = $validate->getFields();

    //Adds the following field objects to the fieldsArray
    $fields->addField('stage_id');
    $fields->addField('browse_art_id');
    $fields->addField('day');
    $fields->addField('start_time');
    $fields->addField('end_time');
    $fields->addField('description');

    //Assigns required validation to fields
    $validate->required('stage_id', $stage_id);
    $validate->required('browse_art_id', $browse_art_id);
    $validate->required('day', $day);
    $validate->required('start_time', $start_time);
    $validate->required('end_time', $end_time);
    $validate->required('description', $description);
    
    //If there are no errors
    if(!$fields->hasErrors()){
        
        //Create new instance of PerformanceClass
        $performance = new PerformanceClass($stage_id, $browse_art_id, $day, $start_time, $end_time, $description);
        
        //Insert into database
        PerformanceDB::insertPerformance($performance);
      
        getSchedule();
        include ('schedule.php');
        
    }else{
        
        include ('insert_performance.php');   
    }

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
    
    // ----- Validation ----- //

    //Creates an object from Validation class
    $validate = new Validation();

    //Creates a new fieldsArray
    $fields = $validate->getFields();

    //Adds the following field objects to the fieldsArray
    $fields->addField('name');

    //Assigns required validation to fields
    $validate->required('name', $name);

    //If there are no errors
    if(!$fields->hasErrors()){

        //Update database
        StageDB::updateStage($stage_id, $name);
      
        getSchedule();
        include ('schedule.php');
        
    }else{
        
        include ('update_stage.php');   
    }

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