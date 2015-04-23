<?php 

    require_once ('../../config.php');
    include ('../components/cms_header.php');
    
    //Forces a redirect through the index
    if($_SESSION['RoleID'] != 2){

      echo  '<script type="text/javascript"> window.location.href ="../../Home/Index.php"; </script>';
    }

?>
<h1>Edit Article</h1>

<form action="." method="post" id="update">

    <input type="hidden" name="news_id" value="<?php echo $newsByID['news_id']; ?>" />
    <input type="hidden" name="type" value="0" />
    <input type="hidden" name="publish" value="<?php echo $newsByID['publish']; ?>" />
    <input type="hidden" name="date_created" value="<?php echo $newsByID['date_created']; ?>" />
    <input type="hidden" name="date_published" value="<?php echo $newsByID['date_published']; ?>" />

    <table class="plain">
        <tr>
            <td><label>Title:</label></td>
            <td><input type="text" class="textbox" name="title" value="<?php echo $newsByID['title']; ?>"/></td>
        </tr>
        <tr>
            <td><label>Author:</label></td>
            <td><input type="text" class="textbox" name="author" value="<?php echo $newsByID['author']; ?>" /></td>
        </tr>
        <tr>
            <td><label>Description:</label></td>
            <td><textarea name="description" class="textarea-sm" rows="2" cols="50"><?php echo $newsByID['description']; ?></textarea></td>
        </tr>
        <?php if($newsByID['type'] == 0) :?>
        <tr>
            <td><label>Article:</label></td>
            <td><textarea name="article" class="textarea-lg" class="article" rows="5" cols="50"><?php echo $newsByID['article']; ?></textarea></td>
        </tr>
        <tr>
            <td><label>For more information:</label></td>
            <td><input type="text" class="textbox" id="other_url" name="other_url" value="<?php echo $newsByID['other_url']; ?>" /></td>
        </tr>
        <?php elseif($newsByID['type'] == 1) : ?>
        <tr>
            <td><label>Story URL:</label></td>
            <td><input type="text" class="textbox" id="story_url" name="story_url" value="<?php echo $newsByID['story_url']; ?>" /></td>
        </tr>
        <?php endif; ?>
        <tr>
            <td>
                <input type="hidden" name="action" value="updateNews" />
                <input type="submit" name="submit" class="btn" value="Update" />
                <a href="." class="btn">Cancel</a>
            </td>
            <td></td>
        </tr>
    </table>
</form>

<?php include ('../components/cms_footer.php'); ?>
