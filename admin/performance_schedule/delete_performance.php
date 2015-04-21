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
       
        <h2>Are you sure you want to delete this performance?</h2>
        
        
        <form action="." method="post">
            <input type="hidden" name="performance_id" value="<?php echo $selectedPerformance->getPerformanceID(); ?>" />
            <input type="hidden" name="action" value="yesDeletePerformance" />
            <input type="submit" name="yes" value="Yes" />
            <a href="." class="btn">No</a>
        </form>
    </body>
</html>

<?php include ('../components/cms_footer.php'); ?>
