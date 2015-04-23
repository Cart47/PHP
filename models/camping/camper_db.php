<?php



class CamperDB {
  public static function getCampers() {
    $db = Database::getDB();
    $query = 'SELECT * FROM camper ORDER BY campsite_id';
    $result = $db->query($query);
    $campers = array();
    foreach ($result as $row) {
      $camper = new Camping($row['campsite_id'],
                           $row['camper_fname'],
                           $row['camper_lname'],
                           $row['camper_email'],
                           $row['group_size'],
                           $row['camps_num'],
                           $row['camps_desc']);
              $campers[] = $camper;
    }
    return $campers;
  }

  public static function getCamperByID($camper_id) {
    $db = Database::getDB();
    $query = "SELECT * FROM camper
              WHERE camper_id ='$camper_id'";
    $statement = $db->query($query);
    $row = $statement->fetch();
      $camper = new Camping($row['camper_id'],
                           $row['camper_fname'],
                           $row['camper_lname'],
                           $row['camper_email'],
                           $row['group_size'],
                           $row['camps_num'],
                           $row['camps_desc']);
    return $camper;
  }

  public static function getCamperBySiteNum($camps_num) {
    $db = Database::getDB();
    $query = "SELECT * FROM camper
              WHERE camps_num ='$camps_num'";
    $statement = $db->query($query);
    $row = $statement->fetch();
      $camper = new Camping($row['campsite_id'],
                           $row['camper_fname'],
                           $row['camper_lname'],
                           $row['camper_email'],
                           $row['group_size'],
                           $row['camps_num']);
    return $camper;
  }


  public static function insertCamper($insert_camper){

    $db = Database::getDB();


    $camper_fname = $insert_camper->getCamperFName();
    $camper_lname = $insert_camper->getCamperLName();
    $camper_email = $insert_camper->getCamperEmail();
    $group_size = $insert_camper->getCamperGroupSize();
    $camps_num = $insert_camper->getSiteNum();

    $query = "INSERT INTO camper
              ( camper_fname, camper_lname, camper_email, group_size, camps_num)
              VALUES
              ('$camper_fname', '$camper_lname', '$camper_email', '$group_size', '$camps_num')";

    $row_count = $db->exec($query);

    return $row_count;
  }


  public static function updateCamper($camper_id, $camper_fname, $camper_lname, $camper_email, $group_size, $camps_num){

      $db = Database::getDB();

      $query = 'UPDATE camper
                SET camper_fname = "' . $camper_fname . '", camper_lname = "' .$camper_lname. '", camper_email = "' . $camper_email . '"
                WHERE camper_id ="' .$camper_id .'"';

      $row_count = $db->exec($query);

      return $row_count;
  }

  public static function updateCamperBySite($camper_fname, $camper_lname, $camper_email, $group_size, $camps_num){

      $db = Database::getDB();

      $query = 'UPDATE camper
                SET camper_fname = "' . $camper_fname . '", camper_lname = "' .$camper_lname. '", camper_email = "' . $camper_email . '", group_size = "' .$group_size . '"
                WHERE camps_num ="' .$camps_num .'"';

      $row_count = $db->exec($query);

      return $row_count;
  }

  public static function removeCamperSaveSite( $camps_num){

    $db = Database::getDB();

    $query = 'UPDATE camper
              SET camper_fname = null, camper_lname = null, camper_email = null, group_size = null
              WHERE camps_num ="' .$camps_num .'"';

    $row_count = $db->exec($query);

    return $row_count;

  }

  public static function deleteEmail($camper_id){

    $db = Database::getDB();

    $query = "DELETE FROM camper
              WHERE camper_id ='" . $camper_id . '"';

    $row_count = $db->exec($query);

    return $row_count;
  }



  public static function getVaccantCampsites(){
      $db = Database::getDB();
      $query = 'SELECT  camps_num FROM camper WHERE camper_email IS null';
      $result = $db->query($query);
      $campsites = array();
      foreach ($result as $row) {
          $campsite = $row['camps_num'];

          $campsites[] = $campsite;

      }

      return $campsites;
  }



  public static function getRegisteredCampers(){
    $db = Database::getDB();
    $query = 'SELECT * FROM camper WHERE camper_email IS NOT null';
    $result = $db->query($query);
    $campers = array();
    foreach ($result as $row) {
      $camper = new Camping($row['camper_fname'],
                           $row['camper_lname'],
                           $row['camper_email'],
                           $row['group_size'],
                           $row['camps_num'],
                           $row['camps_desc']);
              $campers[] = $camper;
    }
    return $campers;
  }


}
