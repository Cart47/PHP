<?php 

require ('../../models/database.php');
require ('../../models/email_subscription/email_class.php');
require ('../../models/email_subscription/email_db.php');

if(isset($_POST['add'])) { //If 'add a subscriber' button is clicked
    
    include ('insert.php');
     
} elseif(isset($_POST['insert'])){ //If insert button is clicked

    $email_id = $_POST['email_id'];
    $name = $_POST['name']; 
    $email = $_POST['email'];
    $approved = $_POST['approved'];
    
    $newSubscriber = new EmailClass($name, $email, $approved);
    $addSubscriber = EmailDB::insertEmail($newSubscriber);
    
    include ('emailList.php');
    
} elseif(isset($_POST['edit'])) { //If edit button is clicked  
    
    $email_id = $_POST['email_id'];  
    $emailByID = EmailDB::getEmailByID($email_id);
    
    include ('update.php');
    
} elseif (isset($_POST['update'])) { //If update button is clicked
    
    $email_id = $_POST['email_id'];
    $name = $_POST['name'];
    $email = $_POST['email']; 
    $approved = $_POST['approved'];
    
    EmailDB::updateEmail($email_id, $name, $email, $approved);
    
    include ('emailList.php');

} elseif(isset($_POST['delete'])) { //If delete button is clicked
    
    $email_id = $_POST['email_id']; 
    EmailDB::deleteEmail($email_id);  
    
    include ('emailList.php');

} else { //If no buttons are clicked display pending and approved subscribers
    
    $approve = 1;
    $pending = 0;
    
    $approvedEmail = EmailDB::getEmailsByStatus($approve);
    $pendingEmail = EmailDB::getEmailsByStatus($pending);
      
    include ('emailList.php');
    
}

?>