<?php

session_start();
include ('../components/main_header.php'); 
require_once '../config.php';

$tick_id = $_GET['tick_id'];
$tick_type = $_GET['tick_type'];
$tick_price = $_GET['tick_price'];

//STRIPE WORKS IN CENTS - CONVERT TO DOLLARS
$stripe_charge = $tick_price * 100;

$_SESSION['tick_id']=$tick_id;
$_SESSION['tick_type']=$tick_type;
$_SESSION['tick_price']=$tick_price;

?>
<form action="charge.php" method="post">
    <label>First Name: </label>
    <input type='text' id='cust_fname' name='fname'>
    
    <label>Last Name: </label>
    <input type='text' id='cust_lname' name='lname'>

    <label>Phone: </label>
    <input type='text' id='cust_phone' name='phone'>
    
    <label>Email: </label>
    <input type='text' id='cust_email' name='email'>

  <script src="https://checkout.stripe.com/checkout.js" class="stripe-button"
          data-key="<?php echo $stripe['publishable_key']; ?>"
          data-amount="<?php echo $stripe_charge ?>" 
          data-description="CITF Ticket Purchase"></script>
</form>
<?php include ('../components/main_footer.php'); ?>