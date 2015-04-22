<?php 

if(!isset($_SESSION)) { session_start();}
    require_once ('../config.php');
    include '../models/database.php';
    include ("../components/main_header.php");
    include_once('../models/role_manager/users.php');
    include_once('../models/role_manager/role_manager.php');
    include_once('../models/volunteer/volunteer_positions.php');

if(isset($_SESSION['Individual_ID'])){
    $user = Roles::getUserRoles($_SESSION['Individual_ID']);
} 

$positions = Volunteer::getVolunteerPosition();

?> 
<div id="volunteer_form">
<h1>Volunteer for a Position @ Chorus in the Forest</h1>
<?php if(!isset($_SESSION['Individual_ID'])){ ?>
        <p>Please Sign-in to view the list of current volunteer opportunities</p>
        <img src="../img/images/im_sorry.png" style="width:20%;margin-top:25px" />';
<?php  } else { ?>
         
        <h2>Available for Volunteering?</h2>
         <h3>Every volunteer is treated with the most possible respect by everyone on staff during the festival. We consider your lack of skills <br/> and need to gain valuable experience to help you eventually discover your love of gathering cats and stamp collecting hobby <br/>fascinating. Also, your in luck! We will allow you to wear your already ripped muscle shirt as your uniform</h3>
         <br/>
         <h2>Positions Available:</h2>
         <form action="./thankyou.php" method="post">
          <?php  
            foreach($positions as $p){
                echo '<input type="radio" name="position" value="' . $p['volunteer_id'] . '" /> ' . $p['vol_position'] . '<br/>';
          } ?>
              <br/>
              <input type="checkbox" name="accept" value="accept">Yes! I would love to volunteer for this position<br/>
              <input type="submit" value="Submit" />   
          </form>   
              
        <?php  } ?>
</div>
<div id="social">
    
    <?php include('../components/social.php'); ?>
    
</div>

<?php include('../components/main_footer.php'); ?>