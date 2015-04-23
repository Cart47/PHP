<?php

  require ('../../models/database.php');
  require('../../models/camping/camper.php');
  require('../../models/camping/camper_db.php');

<<<<<<< Updated upstream
  if (isset($_POST['action'])) {
      $action = $_POST['action'];
  } else if (isset($_GET['action'])) {
      $action = $_GET['action'];
  } else {
      $action = 'camper_list';
  }

  if($action == 'camper_list'){

    $campers = CamperDB::getRegisteredCampers();

    include ('camper_list.php');
  } elseif ($action == 'delete'){

    $camps_num = '';

    $camps_num = $_POST['camps_num'];
    $selected = CamperDB::getCamperBySiteNum($camps_num);

    include ('delete.php');

  } elseif ($action == 'yes'){



    @$camps_num = $_POST['camps_num'];
    $selected = CamperDB::removeCamperSaveSite(null, null, null, null, $camps_num);

    $campers = CamperDB::getRegisteredCampers();
=======
$campsite = Campers::getVacantCampsites();
>>>>>>> Stashed changes

    include ('camper_list.php');
  }
