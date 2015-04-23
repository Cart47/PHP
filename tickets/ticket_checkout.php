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
    <!--MAKE WIDER SO TABLE DOESNT WIDEN DEPENDING ON PRICE-->
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
                <select id='tick_quant' onchange='getQuant(this.value)'>
                    <?php 
                        for($i = 0; $i<21; $i++ ){
                           echo '<option value='.$i.'>'.$i.'</option>';
                        }
                    ?>
                </select>
            </td>
            <td id="total">$<?php //echo $total ?></td>
        </tbody>
    </table>

    <form id="tick_form" action="charge.php" method="post">
        <input type='hidden' />
       
        <input class='textbox' type='text' id='cust_fname' name='fname' placeholder="First Name">

        <input class='textbox' type='text' id='cust_lname' name='lname' placeholder="Last Name">

        <input class='textbox' type='text' id='cust_phone' name='phone' placeholder="Phone Number">

        <input class='textbox' type='text' id='cust_email' name='email' placeholder="Email">

      <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
              data-key="<?php echo $stripe['publishable_key']; ?>"
              data-amount="<?php echo $stripe_charge ?>" 
              data-description="CITF Ticket Purchase">
      </script>
        <script>
            function getQuant(quantity){
                var price = <?php echo json_encode($tick_price); ?>;
                var total = price * quantity;
                document.getElementById("total").innerHTML = "$" + total;
            }
            
        </script>
        <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
        <script type="text/javascript" src="../js/ticket.js"></script>
    </form> 
</div>
<?php include ('../components/main_footer.php'); ?>