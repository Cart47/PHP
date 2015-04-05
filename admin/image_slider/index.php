<?php

include ('../../models/database.php');
require_once '../../models/image_slider/sliderClass.php';
require_once '../../models/image_slider/images.php';

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'image_list';
}

if($action == 'image_list'){
    include 'image_list.php';
}
/*-----------DELETE------------------*/

if ($action == 'delete') { 
    
    include 'image_list.php';
    $img_id = $_POST['image_id']; 
    Slider::deleteImage($img_id);
    
    
 /*-----------INSERT------------------*/    
} else if ($action =='insert') {
   
 /*-----------FILE UPLOAD ERRORS------------------*/
    $file_temp = $_FILES['image']['tmp_name'];
    $file_name = $_FILES['image']['name'];
    $file_size = $_FILES['image']['size'];
    $file_type = $_FILES['image']['type'];
    $file_error = $_FILES['image']['error'];

    if ($file_error > 0) {   
        
        echo "Error : ";
        switch($file_error){
            case 1: 
                echo "File exceeded upload_max_filesize";
                break;
            case 2:
                echo "File exceeded max_filesize";
                break;
            case 3:
                echo "File partially uploaded";
                break;
            case 4:
                echo "No file uploaded";
                break;            
          }
    //ADD IN VALIDATION HERE
    } else{
        
        include 'image_list.php';
        
        $img_root = "PHP/img/images/";       
        $img_url =  $img_root . $file_name;
        $img_title = $_POST['img_title'];
        $img_link = $_POST['img_links'];
        
        $target_path = "../../img/images/";
        $target_path = $target_path . $file_name;
        
        //move from temp to target
        if(move_uploaded_file($file_temp, $target_path)){
            echo "The file " . $file_name . "has been uploaded";
        } else{
            echo "There was an error";
        }
        
        $image = new Image($img_url, $img_title, $img_link); 
        Slider::insertImage($image);
        }
  /*-----------UPDATE------------------*/  
 
} else if ($action == 'update'){

    $img_id = $_POST['img_id'];
    $current_img = Slider::getImageById($img_id); 
    
    include 'update_image.php';
    
 } else if ($action == 'commit_image_update'){
   
    //ADD IN VALIDATION HERE
      
    $img_id = $_POST['img_id'];
    $img_title = $_POST['img_title'];
    $img_link = $_POST['img_links'];
    
    Slider::updateImage($img_id, $img_title, $img_link);
    
    include 'image_list.php';
    
    }
