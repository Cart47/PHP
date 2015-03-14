<!-- PHP code will be placed here for intitial setups like titles etc -->
<?php
    
include '../css/style.php';
include '../models/databaseClass.php';    
include '../controllers/RegisterNewUser.php';
include '../controllers/validation.php'; 
include '../controllers/UserLogin.php'; 

$validation = new Validation();
$info = $_POST;
unset($_POST);

if(isset($info['registrationSent']))
{
 // These will be session variables, taught March 19
 // $user_name =$info['user_name'];
 // $user_email =$info['user_email'];   
    $validation->validator($info);
    if(empty($validation->errors)){
        new Registration($info);
    } 
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
    <script src="../js/jquery-2.1.3.js" type="text/javascript"></script>
    <script src="../js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="../js/jquery.leanModal.min.js" type="text/javascript"></script>
     <script src="../js/facebookAPI.js" type="text/javascript"></script>
    
    <!-- Need to revisit to add in php that determines the associated styles needed and sources them out  -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    <link rel="stylesheet" href="../css/Reset.css" type="text/css">
    <link rel="stylesheet" href="../css/CITF-Main.css" type="text/css">
    <?php
        new Stylesheet('contentMain', 'modalStyle', 'head');
    ?> 
 </head>
 <body>
  <?php
        if($validation->errors != null){
            foreach($validation->errors as $a => $b){
                echo "<p style='color:#fff; font-size:20px'>" . $a . $b . "</p>";
            }    
        }
    if(isset($info['loginSent'])){
        new Login($info);
    }
  ?>
  
  <!--  Bullshit Facebook API code that I can't crack -->
   <section style="width:300px;height:150px;background-color:#fff;">
   
    <div class="fb-login-button" data-max-rows="4" data-size="xlarge" data-show-faces="true" data-auto-logout-link="true" scope="email"></div>
    <br/>
    
    <!-- <span id="fbLogout" onclick="fbLogout()"><a class="fb_button fb_button_medium"><span class="fb_button_text">Logout</span></a></span> -->
    <div
      class="fb-like"
      data-share="true"
      data-width="450"
      data-show-faces="true">
    </div>
    <div id="null"></div>
     </section>
	 
<!-- -------------------------Above is testing AREA ------------------------------------- -->
	 	 
	 <div id="container">
		<section id="modalPopUp">
		    <?php
                include_once('../components/modal.php');
            ?>
		</section>
        
        <section>
            <header> 
                <div id="headMain">
                    <?php
                        include_once('../components/HeaderMain.php');
                    ?>
                 </div>
                 <nav>
                   <?php
                        include_once('../components/NavigationMain.php');
                    ?>
                 </nav>
             </header>
             <main>
                <?php
                    include_once('../components/mainContent.php');
                ?>
            </main>
            <footer>
                <?php
                    include_once('../components/FooterMain.php');
                ?>
            </footer>
        </section>	 
	 </div> <!-- closing div for container -->
	 
    <!--   JS Scripts can go here -->
    <script src="../js/stickyHeader.js" type="text/javascript"></script> 	
    <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.5.3/modernizr.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="../js/modalTrigger.js"> </script>
</body>
</html>
