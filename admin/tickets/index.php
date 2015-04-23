<?php
include ('../../models/database.php');
require_once '../../models/image_slider/sliderClass.php';
require_once '../../models/image_slider/images.php';

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'tickets';
}

if($action == 'tickets'){
    include 'tickets.php';
}

/*-------------INSERT TICKET TYPE-----------------*/

if ($action =='insert') {
   
        include 'tickets.php';

        $tick_type = $_POST['tick_type'];
        $tick_price = $_POST['tick_price'];

        $ticket = new Ticket($tick_type, $tick_price); 
        ticketdb::insertTicket($ticket);

  /*-----------UPDATE------------------*/  
 
} else if ($action == 'update'){

    $tick_id = $_POST['tick_id'];
    $current_tick = Slider::getImageById($img_id); 
    
    include 'update_image.php';
    
 } else if ($action == 'commit_image_update'){
   
    //ADD IN VALIDATION HERE
      
    $img_id = $_POST['img_id'];
    $img_title = $_POST['img_title'];
    $img_link = $_POST['img_links'];
    
    Slider::updateImage($img_id, $img_title, $img_link);
    
    include 'image_list.php';
    
    }