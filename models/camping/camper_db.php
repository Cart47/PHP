<?php
class CamperDB {
  public static function getCampers() {
    $db = Database::getDB();
    $query = 'SELECT * FROM camper ORDER BY camper_id';
    $result = $db->query($query);
    $campers = array();
    foreach ($result as $row) {
      $camper = new Camper($row['camper_id'],
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
    $query = 'SELECT * FROM camper
              WHERE camper_id ='$camper_id;
    $statement = $db->query($query);
    $row = $statement->fetch();
      $camper = new Camper($row['camper_id'],
                           $row['camper_fname'],
                           $row['camper_lname'],
                           $row['camper_email'],
                           $row['group_size'],
                           $row['camps_num'],
                           $row['camps_desc']);
    return $camper;
  }

  public static function insertCamper($insert_camper){

    $db = Database::getDB();

    $camper_id = $insert_camper->getCamperID();
    $camper_fname = $insert_camper->getCamperFName();
    $camper_lname = $insert_camper->getCamperLName();
    $camper_email = $insert_camper->getCamperEmail();
    $group_size = $insert_camper->getCamperGroupSize();
    $camps_num = $insert_camper->getSiteNum();

    $query = "INSERT INTO camper
              (camper_id, camper_fname, camper_lname, camper_email, group_size, camps_num)
              VALUES
              ('$camper_id', '$camper_fname', '$camper_lname', '$camper_email', '$group_size', '$camps_num')";

    $row_count = $db->exec($query);

    return $row_count;
  }


  public static function updateCamper($camper_id, $camper_fname, $camper_lname, $camper_email, $group_size, $camps_num){

      $db = Database::getDB();

      $query = 'UPDATE camper
                SET camper_fname = "' . $camper_fname . '", camper_lname = "' .$camper_lname. '", camper_email = "' . $camper_email . '"
                WHERE camper_id ="' .$camper_id .'"';

      $row_count = $db->exec($query);

      return $row_count
  }

  public static function deleteEmail($camper_id){

    $db = Database::getDB();

    $query = "DELETE FROM camper
              WHERE camper_id ='" . $camper_id . '"';

    $row_count = $db->exec($query);

    return $row_count;
  }

}
