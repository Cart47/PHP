<?php 

require ('../../models/database.php');
require ('../../models/email_subscription/email_class.php');
require ('../../models/email_subscription/email_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'email_list';
}

if ($action == 'email_list'){ //default view
    
    $approve = 1;
    $pending = 0;
    
    $approvedEmail = EmailDB::getEmailsByStatus($approve);
    $pendingEmail = EmailDB::getEmailsByStatus($pending);
      
    include ('email_list.php');
    
} elseif ($action == 'add'){ //If 'add a subscriber' button is clicked
    
    include ('insert.php');
    
} elseif ($action == 'insert'){ //If insert button is clicked
    
    $email_id = $_POST['email_id'];
    $name = $_POST['name']; 
    $email = $_POST['email'];
    $approved = $_POST['approved'];
    
    $newSubscriber = new EmailClass($name, $email, $approved);
    $addSubscriber = EmailDB::insertEmail($newSubscriber);
    
    include ('email_list.php');
    
} elseif ($action == 'edit'){ //If edit button is clicked
    
    $email_id = $_POST['email_id'];  
    $emailByID = EmailDB::getEmailByID($email_id);
    
    include ('update.php');
    
} elseif ($action == 'update'){ //If update button is clicked
    
    $email_id = $_POST['email_id'];
    $name = $_POST['name'];
    $email = $_POST['email']; 
    $approved = $_POST['approved'];
    
    EmailDB::updateEmail($email_id, $name, $email, $approved);
    
    include ('email_list.php');

} elseif ($action == 'delete'){ //If delete button is clicked
    
    $email_id = $_POST['email_id']; 
    $selected = EmailDB::getEmailByID($email_id);
    
    include ('delete.php');
    
} elseif ($action == 'yes'){ //If user confirms delete by clicking 'yes' button
    
    $email_id = $_POST['email_id']; 
    EmailDB::deleteEmail($email_id);  
    
    $approve = 1;
    $pending = 0;
    
    $approvedEmail = EmailDB::getEmailsByStatus($approve);
    $pendingEmail = EmailDB::getEmailsByStatus($pending);
    
    include ('email_list.php');
    
}

?>