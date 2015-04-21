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
        }