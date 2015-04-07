<?php 

    require_once ('../../config.php');
    include ('../components/cms_header.php');

    //Forces a redirect through the index
    if(!isset($newsByID)){
        header('Location: ../news_feed/'); 
    
}

?>
<h1>Edit Article</h1>

<!-- If the article clicked is an INTERNAL article, display the following form -->
<?php if($newsByID['type'] == 0) : ?>

    <form action="." method="post" id="editInternal">

        <input type="hidden" name="news_id" value="<?php echo $newsByID['news_id']; ?>" />
        <input type="hidden" name="type" value="0" />
        <input type="hidden" name="publish" value="<?php echo $newsByID['publish']; ?>" />
        <input type="hidden" name="date_created" value="<?php echo $newsByID['date_created']; ?>" />
        <input type="hidden" name="date_published" value="<?php echo $newsByID['date_published']; ?>" />

        <label>Title:</label>
        <input type="text" name="title" value="<?php echo $newsByID['title']; ?>"/>

        <div class="clear"></div>

        <label>Author:</label>
        <input type="text" name="author" value="<?php echo $newsByID['author']; ?>" />

        <div class="clear"></div>

        <label>For more information:</label>
        <input type="text" id="other_url" name="other_url" value="<?php echo $newsByID['other_url']; ?>" />

        <div class="clear"></div>

        <label>Feature Image:</label>
        <input type="text" name="feature_img" value="<?php echo $newsByID['feature_img']; ?>" />

        <div class="clear"></div>

        <label>Banner Image:</label>
        <input type="text" class="banner_img" name="banner_img" value="<?php echo $newsByID['banner_img']; ?>" />

        <div class="clear"></div>

        <label>Description:</label>
        <textarea name="description" rows="2" cols="50"><?php echo $newsByID['description']; ?></textarea>

        <div class="clear"></div>

        <label>Article:</label>
        <textarea name="article" class="article" rows="5" cols="50"><?php echo $newsByID['article']; ?></textarea>

        <div class="clear"></div>

        <input type="hidden" name="action" value="updateInternal" />
        <input type="submit" name="submit" class="btn" value="Update" />
        <a href="." class="btn xtra-pad">Cancel</a>

    </form>

<!-- If the article clicked is an EXTERNAL article, display the following form -->
<?php else : ?>

    <form action="." method="post" id="editExternal">

        <input type="hidden" name="news_id" value="<?php echo $newsByID['news_id']; ?>" />
        <input type="hidden" name="type" value="1" />
        <input type="hidden" name="publish" value="<?php echo $newsByID['publish']; ?>" />
        <input type="hidden" name="date_created" value="<?php echo $newsByID['date_created']; ?>" />
        <input type="hidden" name="date_published" value="<?php echo $newsByID['date_published']; ?>" />

        <label>Title:</label>
        <input type="text" name="title" value="<?php echo $newsByID['title']; ?>"/>

        <div class="clear"></div>

        <label>Author:</label>
        <input type="text" name="author" value="<?php echo $newsByID['author']; ?>" />

        <div class="clear"></div>

        <label>Article Link:</label>
        <input type="text" name="story_url" value="<?php echo $newsByID['story_url']; ?>" />

        <div class="clear"></div>

        <label>Feature Image:</label>
        <input type="text" name="feature_img" value="<?php echo $newsByID['feature_img']; ?>" />

        <div class="clear"></div>

        <label>Description:</label>
        <textarea name="description" rows="2" cols="50"><?php echo $newsByID['description']; ?></textarea>

        <div class="clear"></div>
        
        <input type="hidden" name="action" value="updateExternal" />
        <input type="submit" name="submit" class="btn" value="Update" />
        <a href="." class="btn xtra-pad">Cancel</a>

    </form>

<?php endif; ?>

<?php include ('../components/cms_footer.php'); ?>
