<?php 

    require_once ('config.php');
    include ("$absolute/components/main_header.php"); 

?>

<main>
    
    <div id="headMain">
        
        <?php include_once("$absolute/components/main_topContent.php"); ?>
        
    </div>

    <?php include_once("$absolute/components/main_content.php"); ?>
    
</main>
            
<?php include ("$absolute/components/main_footer.php");

?>