<?php
require_once '../models/tickets/ticketClass.php';
require_once '../models/tickets/ticket.php';
require_once '../models/database.php';

 $ticket_types = ticketdb::getTickets();

?>
<div id="ticket_type">
           
        <?php             
        foreach($ticket_types as $val) {
            
            echo '<a href="ticket_checkout.php?tick_id='. $val->getId() .'&tick_type='. $val->getType() 
                    .'&tick_price='. $val->getPrice() .'">'
                    . '<img src= http://' .$_SERVER['HTTP_HOST'].'/'. $val->getImg() .'></img></a>' ;
             
        }
        ?>
   
</div><!--End ticket type-->