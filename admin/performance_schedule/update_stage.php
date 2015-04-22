<?php 

require_once ( '../../config.php'); 
include ( '../components/cms_header.php'); 
//Forces a redirect through the index
if($_SESSION['RoleID'] != 2){
 
  echo  '<script type="text/javascript"> window.location.href ="../../Home/Index.php"; </script>';
}

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <form action="." method="post">
             
            <h1>Update Stage</h1>
            
            <input type="hidden" name="stage_id" value="<?php echo $stageByID['stage_id']; ?>" />
            
            <table class="plain">
                <tr>
                    <td><label>Stage Name:</label></td>
                </tr>
                <tr>
                    <td><input type="text" class="textbox" name="name" value="<?php echo $stageByID['name']; ?>" /></td>
                </tr>
                <tr>
                    <td>
                        <input type="hidden" name="action" value="updateStage" />
                        <input type="submit" name="submit" value="Update" class="btn" />
                        <a href="." class="btn">Cancel</a>
                    </td>
                    <td></td>
                </tr>

            </table>
            
        </form>
        
    </body>
</html>

<?php include ('../components/cms_footer.php'); ?>