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
        
        <h1>New Stage</h1>

            <form action="." method="post">
                   
                <input type="hidden" name="stage_id" />
                
                <table class="plain">
                    <tr>
                        <td><label>Stage Name:</label></td>
                    </tr>
                    <tr>
                        <td><input type="text" name="name" class="textbox" /></td>
                    </tr>
                    <tr>
                        <td>
                            <input type="hidden" name="action" value="insertStage" />
                            <input type="submit" name="submit" value="Create" class="btn"/>
                            <a href="." class="btn">Cancel</a>
                        </td>
                        <td></td>
                    </tr>

                </table>
            </form>
        
    </body>
</html>

<?php include ('../components/cms_footer.php'); ?>