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
                
                <label>Title:</label>
                <input type="text" name="name" />
                
                <br /><br />

                <input type="hidden" name="action" value="insertStage" />
                <input type="submit" name="submit" value="Create" />
                <a href="." value="">Cancel</a>
                
            </form>
        
    </body>
</html>

<?php include ('../components/cms_footer.php'); ?>