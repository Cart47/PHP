<?php

session_start();
include ('../components/main_header.php'); 
require_once '../models/tickets/ticketClass.php';
require_once '../models/tickets/ticket.php';    
require_once '../config.php';

$tick_id = $_GET['tick_id'];
$tick_type = $_GET['tick_type'];
$tick_price = $_GET['tick_price'];

//STRIPE WORKS IN CENTS - CONVERT TO DOLLARS
$stripe_charge = $tick_price * 100;

$_SESSION['tick_id']=$tick_id;
$_SESSION['tick_type']=$tick_type;
$_SESSION['tick_price']=$tick_price;

$quantity = 0;
$total = $tick_price * 4;


?>

<div id='wrap'>
    <h1>Ticket Checkout </h1>
    <table class='table' id='order_details'>
        <thead>
            <tr>
                <th>Ticket Type</th>
                <th>Cost</th>
                <th>Quantity</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            <td><?php echo $tick_type;?><a href="ticket_type.php" class='link'> Change</a></td>
            <td>$<?php echo $tick_price; ?></td>
            <td>
                <select id='tick_quant'>
                    <?php 
                        for($i = 0; $i<21; $i++ ){
                           echo '<option value='.$i.'>'.$i.'</option>';
                        }
                    ?>
                </select>
            </td>
            <td>$<?php echo $total ?></td>
        </tbody>
    </table>

    <form id="tick_form" action="charge.php" method="post">
        <input type='hidden' />

        <input class='textbox' type='text' id='cust_fname' name='fname' placeholder="eg. Abraham">

        <input class='textbox' type='text' id='cust_lname' name='lname' placeholder="eg. Smith">

        <input class='textbox' type='text' id='cust_phone' name='phone' placeholder="eg. 416-562-4687">

        <input class='textbox' type='text' id='cust_email' name='email' placeholder="eg. abesmith@gmail.com">

      <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
              data-key="<?php echo $stripe['publishable_key']; ?>"
              data-amount="<?php echo $stripe_charge ?>" 
              data-description="CITF Ticket Purchase"></script>
    </form> 
</div>
<?php include ('../components/main_footer.php'); ?>