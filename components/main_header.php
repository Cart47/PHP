<?php
session_start();
require ('config.php');
include ('css/style.php');
include ('models/database.php');    
include ('models/Registration_Login/RegisterNewUser.php');
include ('models/Registration_Login/UserLogin.php'); 

if(isset($_POST['registrationSent'])){
    //Need to talk to Gen about using the newly created validation for Registration
   new Registration($_POST);
    }

if(isset($_POST['loginSent'])){
    $verified = new Login($_POST);
    $_SESSION['username'] = $verified->$UserName;
    
    }

if(isset($_POST['subscribe'])){
    require ('./models/email_subscription/email_class.php');
    require ('./models/email_subscription/email_db.php');
    }
?> 

<!DOCTYPE html>
<html>
 <head>
    <meta charset="UTF-8">
    <title>Chorus in the Forest Homepage</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery-2.1.3.js" type="text/javascript"></script>
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.5.3/modernizr.min.js" type="text/javascript"></script>
    
    <!-- Need to revisit to add in php that determines the associated styles needed and sources them out -->
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/Reset.css" type="text/css">
    <link rel="stylesheet" href="css/CITF-Main.css" type="text/css">
    <link rel="stylesheet" href="css/navigation.css" type="text/css">
    <?php
        new Stylesheet('contentMain', 'modalStyle');
    ?> 
 </head>
 <body>
     
     <div id="container">
		<section id="modalPopUp">
		    <?php include_once('components/modal.php'); ?>
		</section>
        
        <section><!-- closing tag is in the footer -->
            <header>
               <nav>
                   <?php include_once('components/main_navigation.php'); ?>
                </nav>   
            </header>