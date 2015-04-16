<?php 

require_once ( '../../config.php'); 
include ( '../components/cms_header.php'); 

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <form action="." method="post">
             
            <p>Edit Stage</p>
            
            <input type="hidden" name="stage_id" value="<?php echo $stageByID['stage_id']; ?>" />
            
            <input type="text" name="name" value="<?php echo $stageByID['name']; ?>" />
            
            <br /><br />          
            
            <input type="hidden" name="action" value="updateStage" />
            <input type="submit" name="submit" value="Update" />
            <a href="." class="btn">Cancel</a>
            
        </form>
        
    </body>
</html>

<?php include ('../components/cms_footer.php'); ?>