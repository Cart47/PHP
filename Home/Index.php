<?php 
if(!isset($_SESSION)) { session_start();}
    require_once ('../config.php');
    include ("../components/main_header.php"); 

?>

<main>
    
    <div id="headMain">
        
        <?php include_once("../components/main_topContent.php"); ?>
        
    </div>

    <?php include_once("../components/main_content.php"); ?>
    
</main>
            
<?php include("../components/main_footer.php");

?>