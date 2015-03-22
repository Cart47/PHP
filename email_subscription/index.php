<?php 

require ('../model/database.php');
require ('../model/email.php');
require ('../model/email_db.php');

if (isset($_POST['submit'])){ //If submit button is clicked
    
    $email_id = $_POST['email_id'];
    $name = $_POST['name']; 
    $email = $_POST['email'];
    $approved = 0;
    
    $subscribe = new EmailClass($name, $email, $approved);
    $addEmail = EmailDB::insertEmail($subscribe);
    
    include ('subscribe.php');
    
} else { //If no buttons are clicked, show form
    
    include ('subscribe.php');
    
}