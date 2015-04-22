<?php 

if(!isset($_SESSION)) { session_start();}
    require_once ('../config.php');
    include '../models/database.php';
    include ("../components/main_header.php");
    include_once('../models/role_manager/users.php');
    include_once('../models/role_manager/role_manager.php');
    include_once('../models/volunteer/volunteer_positions.php');
?>

<h1 style="padding:100px;">Thank you very much for your interest in Volunteering, someone will contact you shortly!</h1>

<div id="social">
    
    <?php include('../components/social.php'); ?>
    
</div>

<?php include('../components/main_footer.php'); ?>