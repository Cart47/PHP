<?php 

    include ('../../config.php');
    include ('../components/cms_header.php'); 

    //Forces a redirect through the index
    if(!isset($selected['news_id'])){
       header('Location: ../news_feed'); 

    }

?>

<h2>Are you sure you want to delete the article, <em><?php echo $selected['title']; ?></em></h2>

<form action="." method="post" id="delete_news">

    <input type="hidden" name="news_id" value="<?php echo $selected['news_id']; ?>" />
    <input type="hidden" name="action" class="btn" value="yesDelete" />
    <input type="submit" name="yes" class="btn" value="Yes" />
    <a href="." class="btn xtra-pad">No</a>

</form>

 <?php include ('../components/cms_footer.php'); ?>