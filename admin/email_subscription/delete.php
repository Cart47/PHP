<?php 

    include ('../components/cms_header.php'); 

    //Forces a redirect through the index if not admin
    if($_SESSION['RoleID'] != 2){

      echo  '<script type="text/javascript"> window.location.href ="../../Home/Index.php"; </script>';
    }

?>

<h2>Are you sure you want to delete <em><?php echo $selected['email']; ?></em></h2>

<form action="." method="post" id="delete_email">

    <input type="hidden" name="email_id" value="<?php echo $selected['email_id']; ?>" />
    <input type="hidden" name="action" class="btn" value="yes" />
    <input type="submit" name="yes" class="btn" value="Yes" />
    <a href="." class="btn xtra-pad">No</a>

</form>

 <?php include ('../components/cms_footer.php'); ?>