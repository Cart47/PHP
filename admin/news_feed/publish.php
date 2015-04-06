<?php 

    date_default_timezone_set('UTC'); 
    include ('../../config.php');
    include ('../components/cms_header.php'); 

    //Forces a redirect through the index
    if(!isset($publishSelected['news_id'])){
       header('Location: ../news_feed'); 

    }

?>

<h2>Publish article, <em><?php echo $publishSelected['title']; ?></em></h2>

<form action="." method="post" id="publish_news">

    <input type="hidden" name="news_id" value="<?php echo $publishSelected['news_id']; ?>" />
    <input type="hidden" name="date_published" value="<?php echo date('Y-m-d'); ?>" />
    <input type="hidden" name="action" class="btn" value="yesPublish" />
    <input type="submit" name="yes" class="btn" value="Yes" />
    <a href="." class="btn xtra-pad">No</a>

</form>

 <?php include ('../components/cms_footer.php'); ?>