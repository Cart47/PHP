<?php

require ('../models/database.php');
require ('../models/performance_schedule/stage_class.php');
require ('../models/performance_schedule/stage_db.php');
require ('../models/performance_schedule/performance_class.php');
require ('../models/performance_schedule/performance_db.php');
require ('../models/browse_artist/artist.php');
require ('../models/browse_artist/artist_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'schedule';
}

if ($action == 'schedule'){ //default view
    
    $stages = StageDB::getPerformancesForStages();
    
    include ('schedule.php');
    
}