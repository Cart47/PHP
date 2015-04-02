<?php

require_once 'images.php';


class Slider{
    
    public static function getImages() {
        $db = Database::getDB();
        $query = 'SELECT * FROM image_slider';     
        $result = $db->query($query);
        $result->setFetchMode(PDO::FETCH_ASSOC);
        $slider = array();
        
    foreach ($result as $row) {
            
            $images = new Image($row['img_url'],
                                $row['img_title'],
                                $row['img_link']);
            $images->setId($row['img_id']);        
            $slider[] = $images; 
        }
        return $slider;
    }  
    
    public static function deleteImage($img_id) {

        $db = Database::getDB();
        $query = "DELETE FROM image_slider WHERE img_id = $img_id";
        $result= $db->query($query);
    }
    
    public static function insertImage($image){
        
        $db = Database::getDB();

        $img_url = $image->getUrl();
        $img_title = $image->getTitle();
        $img_link = $image->getLink();

        $query = "INSERT INTO image_slider
                    (img_url, img_title, img_link)
                 VALUES
                    ('$img_url', '$img_title', '$img_link')";
        
        $insert_count = $db->query($query);
    }
    
    public static function getImageById($img_id){
     
        $db = Database::getDB();
        $query = 'SELECT * FROM image_slider
                  WHERE img_id ="' . $img_id . '"';
        
        $result = $db->query($query);
        $getImage = $result->fetch();
        
        return $getImage;
        
        }
    
    public static function updateImage($img_id, $img_title, $img_link){               
        
        $db = Database::getDB();
        
        $query = "UPDATE image_slider 
                  SET img_title = '$img_title', 
                      img_link = '$img_link'
                  WHERE img_id = $img_id";
        
        $row_count = $db->exec($query);
        
        return $row_count;
                   
    }
}


