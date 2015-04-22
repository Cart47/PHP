<?php
include ('../components/main_header.php');

require_once '../config.php';
require '../models/tickets/customerClass.php';
require '../models/tickets/customer.php';
require '../models/database.php';?>

<?php
//GET CREDIT CARD DETAILS FROM FORM
  $token  = $_POST['stripeToken'];
    
//CUSTOMER INFO - IF CHARGE GOES THROUGH INSERT VALUES INTO DB  
   $cust_fname = $_POST['fname'];
   $cust_lname = $_POST['lname'];
   $cust_phone = $_POST['phone'];
   $cust_email = $_POST['email'];  

  try{
  $customer = \Stripe\Customer::create(array(
      'email' => 'customer@example.com',
      'card'  => $token
  ));

  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => 50000,
      'currency' => 'usd'
  ));
      $cust = new Customer($cust_fname, $cust_lname, $cust_phone, $cust_email);
      customerDB::insertCustomer($cust);
    
    echo
    '<div id="success">
        <h1>SUCCESS!</h1>
        <h2>Your 2015 CIFT tickets have been purchased.</h2>
    </div>';
      
  }catch(\Stripe\Error\Card $e) {
  // The card has been declined
      echo "Your card has been declined.";
}

include ('../components/main_footer.php');


