<?php
include ('../components/main_header.php'); 

require_once '../models/tickets/ticketClass.php';
require_once '../models/tickets/ticket.php';
require_once '../models/database.php';

 $ticket_types = ticketdb::getTickets();

?>

<img src="../img/landing/tickets3.png" />
  
<div id='tick_types'>
        <?php             
        foreach($ticket_types as $val) {
            
            echo '  <div class="tick_img">
                    <a href="ticket_checkout.php?tick_id='. $val->getId() .'&tick_type='. $val->getType() 
                    .'&tick_price='. $val->getPrice() .'">'
                    . '<img src= http://' .$_SERVER['HTTP_HOST'].'/'. $val->getImg() .'></img></a>
                    </div>' ;
             
        }
        ?>
        <div id='tick_info'>
            
            <p>All sales are final. There will be no reissues for lost or stolen tickets. </p>
                <p>The 2015 Chorus In The Forest music festival will take place rain or shine. </p>
                <br/><br/>
               <p> All acts advertised have confirmed their appearance at the 2015 CITF, </p>
                <p>however acts are subject to change without notice.
            </p>
        </div>
    </div><!--End tick_types-->

<? include ('../components/main_footer.php'); ?>