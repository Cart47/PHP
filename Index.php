<?php
session_start();
require ('config.php');
include ('css/style.php');
include ('models/database.php');    
include ('models/Registration_Login/RegisterNewUser.php');
include ('models/Registration_Login/UserLogin.php'); 

$info = $_POST;
unset($_POST);

if(isset($info['registrationSent'])){
    //Need to talk to Gen about using the newly created validation for Registration
   new Registration($info);
    }

if(isset($info['loginSent'])){
    $verified = new Login($info);
    }

if(isset($_POST['subscribe'])){
    require ('./models/database.php');
    require ('./models/email_subscription/email_class.php');
    require ('./models/email_subscription/email_db.php');
    include ('./config.php');
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
    <script src="js/jquery.leanModal.min.js" type="text/javascript"></script>
    <script src="../js/facebookAPI.js" type="text/javascript"></script>
    
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
		    <?php
                include_once('components/modal.php');
            ?>
		</section>
        
        <section>
            <header>
               <nav>
                   <?php
                        include('components/main_navigation.php');
                    ?>
                </nav>
                
                <div id="headMain">
                    
                    <?php
                       include_once('components/main_header.php');
                    ?>
                 </div>
                 
             </header>
             <main>
                <?php
                    include_once('components/main_content.php');
                ?>
            </main>
            <footer>
                <?php
                    include ('components/main_footer.php'); 
                ?>
            </footer>
        </section>	 
	 </div> <!-- closing div for container -->

</body>
</html>

<!--   JS Scripts can go here -->
<!-- <script src="js/stickyHeader.js" type="text/javascript"></script> 	-->
<script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.5.3/modernizr.min.js" type="text/javascript"></script>
<script type="text/javascript" src="../js/modalTrigger.js"> </script>
