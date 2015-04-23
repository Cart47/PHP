<?php 

    include ('../../config.php');
    include ('../components/cms_header.php');

    //Forces a redirect through the index
    if($_SESSION['RoleID'] != 2){

      echo  '<script type="text/javascript"> window.location.href ="../../Home/Index.php"; </script>';
    }

?>

<h2>Unpublish article, <em><?php echo $unpublishSelected['title']; ?></em></h2>

<form action="." method="post" id="unpublish_news">

    <input type="hidden" name="news_id" value="<?php echo $unpublishSelected['news_id']; ?>" />
    <input type="hidden" name="date_published" value="<?php echo date('Y-m-d'); ?>" />
    <input type="hidden" name="action" class="btn" value="yesUnpublish" />
    <input type="submit" name="yes" class="btn" value="Yes" />
    <a href="." class="btn">No</a>

</form>

 <?php include ('../components/cms_footer.php'); ?>