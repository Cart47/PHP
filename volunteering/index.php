<?php 

if(!isset($_SESSION)) { session_start();}
    require_once ('../config.php');
    include '../models/database.php';
    include ("../components/main_header.php");

?> 
<div id="volunteer_form">
<h1>Volunteer for a Position @ Chorus in the Forest</h1>
<?php
     if(!isset($_SESSION['individual_id'])){
        echo '<p>Please Sign-in to view the list of current volunteer opportunities</p>
                <img src="../img/images/im_sorry.png" style="width:20%;margin-top:25px" />';
    }   
?>


</div>
<div id="social">
    
    <?php include('../components/social.php'); ?>
    
</div>

<?php include('../components/main_footer.php'); ?>