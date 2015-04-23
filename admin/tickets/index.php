<?php
include ('../../models/database.php');
require_once '../../models/image_slider/sliderClass.php';
require_once '../../models/image_slider/images.php';
require_once '../../models/tickets/ticketClass.php';
require_once '../../models/tickets/ticket.php';

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
    $current_tick = ticketdb::getTicketsById($tick_id); 
    
        include 'ticket_update.php';
    
 } else if ($action == 'commit_ticket_update'){
   
    $tick_id = $_POST['tick_id'];
    $tick_type = $_POST['tick_type'];
    $tick_price = $_POST['tick_price'];
    
    ticketdb::updateTicket($tick_id, $tick_type, $tick_price);
    
    include 'tickets.php';
    
    }

/*-----------DELETE------------------*/

if ($action == 'delete') { 
    
    include 'tickets.php';
    $tick_id = $_POST['tick_id']; 
    ticketdb::deleteTicket($tick_id);
}
    