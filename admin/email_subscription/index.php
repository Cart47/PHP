<?php 

require ('../../models/database.php');
require ('../../models/email_subscription/email_class.php');
require ('../../models/email_subscription/email_db.php');
require ('../../models/validation/field_classes.php');
require ('../../models/validation/validation_class.php');

//function that gets emails by approved status
function getEmailList(){
    
    GLOBAL $approvedEmail;
    GLOBAL $pendingEmail;
    
    $approve = 1;
    $pending = 0;
    
    $approvedEmail = EmailDB::getEmailsByStatus($approve);
    $pendingEmail = EmailDB::getEmailsByStatus($pending);
    
}

// -------------------------------------------- //    
// ---------- Displaying Subscribers ---------- //
// -------------------------------------------- //  

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'email_list';
}

if ($action == 'email_list'){ //default view
    
    getEmailList();
      
    include ('email_list.php');

    
// ------------------------------------------- //    
// ---------- Inserting Subscribers ---------- //
// ------------------------------------------- //  
    
} elseif ($action == 'add'){ //If 'add a subscriber' button is clicked
    
    include ('insert.php');
    
} elseif ($action == 'insert'){ //If insert button is clicked
    
    $name='';
    $email='';
    $approved='';
    
    $email_id = $_POST['email_id'];
    $name = $_POST['name']; 
    $email = $_POST['email'];
    $approved = $_POST['approved'];
    
    // ----- Validation ----- //

    //Creates an object from Validation class
    $validate = new Validation();

    //Creates a new fieldsArray
    $fields = $validate->getFields();

    //Adds the following field objects to the fieldsArray
    $fields->addField('name');
    $fields->addField('email');

    //Assigns required validation to fields
    $validate->required('name', $name);
    $validate->required('email', $email);

    //If there are no errors
    if(!$fields->hasErrors()){

        //Create an object from the Email class
        $newSubscriber = new EmailClass($name, $email, $approved);

        //Insert into the database
        $addSubscriber = EmailDB::insertEmail($newSubscriber);
      
        getEmailList();
        include ('email_list.php');
        
    }else{
        
        include ('insert.php');   
    }

    
// ------------------------------------------ //    
// ---------- Updating Subscribers ---------- //
// ------------------------------------------ //  
    
} elseif ($action == 'edit'){ //If edit button is clicked
    
    $email_id = $_POST['email_id'];  
    $emailByID = EmailDB::getEmailByID($email_id);
    
    include ('update.php');
    
} elseif ($action == 'update'){ //If update button is clicked
    
    $email_id = $_POST['email_id'];
    $name = $_POST['name'];
    $email = $_POST['email']; 
    $approved = $_POST['approved'];
    
    // ----- Validation ----- //

    //Creates an object from Validation class
    $validate = new Validation();

    //Creates a new fieldsArray
    $fields = $validate->getFields();

    //Adds the following field objects to the fieldsArray
    $fields->addField('name');
    $fields->addField('email');

    //Assigns required validation to fields
    $validate->required('name', $name);
    $validate->required('email', $email);

    //If there are no errors
    if(!$fields->hasErrors()){

        //Update database
        EmailDB::updateEmail($email_id, $name, $email, $approved);
      
        getEmailList();
        
        include ('email_list.php');
        
    }else{
        
        include ('insert.php');   
    }

    
// ------------------------------------------ //    
// ---------- Deleting Subscribers ---------- //
// ------------------------------------------ //  
    
} elseif ($action == 'delete'){ //If delete button is clicked
    
    $email_id = $_POST['email_id']; 
    $selected = EmailDB::getEmailByID($email_id);
    
    include ('delete.php');
    
} elseif ($action == 'yes'){ //If user confirms delete by clicking 'yes' button
    
    $email_id = $_POST['email_id']; 
    EmailDB::deleteEmail($email_id);  
    
    getEmailList();
    
    include ('email_list.php');
    
}

?>