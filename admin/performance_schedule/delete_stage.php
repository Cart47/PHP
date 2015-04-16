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
       
        <h2>Are you sure you want to delete <?php echo $selectedStage['name']; ?></h2>
        
        
        <form action="." method="post">
            <input type="hidden" name="stage_id" value="<?php echo $selectedStage['stage_id']; ?>" />
            <input type="hidden" name="action" value="yesDeleteStage" />
            <input type="submit" name="yes" value="Yes" />
            <a href="." class="btn">No</a>
        </form>
    </body>
</html>

<?php include ('../components/cms_footer.php'); ?>