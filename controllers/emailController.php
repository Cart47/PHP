<?php 

require ('../models/databaseClass.php');
require ('../models/emailSubscription/emailClass.php');
require ('../models/emailSubscription/emailDB.php');

if(isset($_POST['add'])) { //If 'add a subscriber' button is clicked
    
    include ('insert_email.php');
     
} elseif(isset($_POST['insert'])){ //If insert button is clicked

    $email_id = $_POST['email_id'];
    $name = $_POST['name']; 
    $email = $_POST['email'];
    $approved = $_POST['approved'];
    
    $newSubscriber = new EmailClass($name, $email, $approved);
    $addSubscriber = EmailDB::insertEmail($newSubscriber);
    
    include ('email.php');
    
} elseif(isset($_POST['edit'])) { //If edit button is clicked  
    
    $email_id = $_POST['email_id'];  
    $emailByID = EmailDB::getEmailByID($email_id);
    
    include ('edit_email.php');
    
} elseif (isset($_POST['update'])) { //If update button is clicked
    
    $email_id = $_POST['email_id'];
    $name = $_POST['name'];
    $email = $_POST['email']; 
    $approved = $_POST['approved'];
    
    EmailDB::updateEmail($email_id, $name, $email, $approved);
    
    include ('../views/cms/emailList.php');

} elseif(isset($_POST['cancel'])) { //If cancel button is clicked
    
    include ('../views/cms/emailList.php');

} elseif(isset($_POST['delete'])) { //If delete button is clicked
    
    $email_id = $_POST['email_id']; 
    EmailDB::deleteEmail($email_id);  
    
    include ('../views/cms/emailList.php');

} else { //If no buttons are clicked display pending and approved subscribers
    
    $approve = 1;
    $pending = 0;
    
    $approvedEmail = EmailDB::getEmailsByStatus($approve);
    $pendingEmail = EmailDB::getEmailsByStatus($pending);
      
    include ('../views/cms/emailList.php');
    
}

?>