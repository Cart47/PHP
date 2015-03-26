<?php 

require ('../../models/database.php');
require ('../../models/email_subscription/email_class.php');
require ('../../models/email_subscription/email_db.php');
require ('../../models/validation/field_classes.php');
require ('../../models/validation/validation_class.php');
include ('../../config.php');

//Creates an object from Validation class
$validate = new Validation();

//Creates a new fieldsArray
$fields = $validate->getFields();

//Adds the following field objects to the fieldsArray
$fields->addField('name');
$fields->addField('email');

$name='';
$email='';
$approved='';

if (isset($_POST['subscribe'])){ //If subscribe button is clicked
    
    //Creates an object from the Email class
    $subscribe = new EmailClass($name, $email, $approved);
    
    //Post values from the form
    $email_id = $_POST['email_id'];
    $name = $_POST['name']; 
    $email = $_POST['email'];
    $approved = 0;
    
    //Assigns required validation to fields
    $validate->required('name', $name);
    $validate->required('email', $email);
    
    //If there are errors
    if($fields->hasErrors()){
        
        echo 'has error'; 
        
    } else {
        
        //Inserts into the database
        EmailDB::insertEmail($subscribe);
        
        //header("Location: $hostName/PHP/Index.php");
        
        echo 'success';
        
    }
    
} else {
    
    //header("Location: $hostName/PHP/Index.php");
    
    echo 'default';
    
}