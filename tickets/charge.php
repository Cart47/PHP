<?php
require_once '../config.php';
require '../models/tickets/customerClass.php';
require '../models/tickets/customer.php';
require '../models/database.php';

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
  //Need to fix variable amount using JS API but only if time to do further customization
  $charge = \Stripe\Charge::create(array(
      'customer' => $customer->id,
      'amount'   => 50000,
      'currency' => 'usd'
  ));
     $cust = new Customer($cust_fname, $cust_lname, $cust_phone, $cust_email);
     customerDB::insertCustomer($cust);
     
    echo "Your CITF tickets have been purchased!";
  }catch(\Stripe\Error\Card $e) {
  // The card has been declined
}

