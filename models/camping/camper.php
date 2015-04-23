<?php

class Camping {
  private $camper_id;
  private $camper_fname;
  private $camper_lname;
  private $camper_email;
  private $group_size;
  private $camps_num;
  private $camps_desc;

  public function __construct($camper_fname, $camper_lname, $camper_email, $group_size, $camps_num){
    $this->camper_fname = $camper_fname;
    $this->camper_lname = $camper_lname;
    $this->camper_email = $camper_email;
    $this->group_size = $group_size;
    $this->camps_num = $camps_num;

  }

  public function getCamperID(){
    return $this->camper_id;
  }

  public function setCamperID($value){
    $this->camper_id = $value;
  }

  public function getCamperFName(){
    return $this->camper_fname;
  }

  public function setCamperFName($value){
    $this->camper_fname = $value;
  }

  public function getCamperLName(){
    return $this->camper_lname;
  }

  public function setCamperLName($value){
    $this->camper_lname = $value;
  }

  public function getCamperEmail(){
    return $this->camper_email;
  }

  public function setCamperEmail($value){
    $this->camper_email = $value;
  }

  public function getCamperGroupSize(){
    return $this->group_size;
  }

  public function setCamperGroupSize($value){
    $this->group_size = $value;
  }

  public function getSiteNum(){
    return $this->camps_num;
  }

  public function setSiteNum($value){
    $this->camps_num = $value;
  }

  public function getCampSDesc(){
    return $this->camps_desc;
  }


}
