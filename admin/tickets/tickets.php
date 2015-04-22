<?php
include('../components/cms_header.php');
require_once '../../models/tickets/ticketClass.php';
require_once '../../models/tickets/ticket.php';

?>

<head>
    <title>Ticket Details</title>
    <link rel="stylesheet" type="text/css" href="../../css/cms.css" />
 <!--   <link rel="stylesheet" type="text/css" href="../../css/slider_admin_styles.css" />-->
    
</head>
<h1>Ticket Detail</h1>
    <div >
        <table>
            <thead>
                <tr>
                 <!--   <th>Image</th>-->
                    <th>Type</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>  
                <?php $tickets = ticketdb::getTickets(); ?>
    
                <? foreach($tickets as $ticket)  :?>
                    <tr>
        
                        <td><?php echo $ticket->getType()?></td>
                        <td><?php echo '$'.$ticket->getPrice()?></td>
                       
                        <td><form id="delete_ticket_button" action="index.php" method="post">                                   
                              
                                <input type="hidden" name="ticket_id" 
                                       value="<?php echo $ticket->getID()?>">
                                <input type="hidden" name="action" value="delete">
                                <input type="submit" name="delete_image" value="delete">
                            </form>
                        </td>
                        <td><form id="update_ticket_button" action="index.php" method="post">                                                                
                                <input type="hidden" name="img_id" 
                                       value="<?php echo $ticket->getID()?>">
                                <input type="hidden" name="action" value="update">
                                <input type="submit" name="update_image" value="update">
                            </form>
                        </td>
                    </tr>
                <?php endforeach;?>
            </tbody>
        </table>
    </div> <!--end image_list-->

<!--INSERT NEW IMAGE TO SLIDER-->
    <h2>Insert new ticket type:</h2>
    <form id="add_ticket" action="index.php"  method="post"/>
        <label>Ticket type: </label>
        <input type="text" name="tick_type"/>
        <label>Price (eg.78): </label>
        <input type="text" name="tick_price"/>
        <input type="hidden" name="action" value="insert">
        <input type="submit" name="insert" value="insert" />

    </form> 
   
    <script type="text/javascript" src="../scripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../scripts/admin_scripts.js"> </script>
