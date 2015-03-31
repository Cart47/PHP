<?php 

    require_once ('../../config.php');
    include ('../components/cms_header.php');

?>

<h1>New Article</h1>

    <p>Select the type of article you want to make:</p>

    <label for="int-radio">Internal Article
        <input type="radio" name="newsType" id="int-radio" value="0" checked />
    </label>

    <label for="ext-radio">External Article
        <input type="radio" name="newsType" id="ext-radio" value="1"/>    
    </label>

    <br /><br/>

    <!-- Internal News -->
    <form action="." method="post" id="internal">


        <input type="hidden" name="news_id" />
        <input type="hidden" name="type" value="0" />
        <input type="hidden" name="publish" value="0" />
        <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>" />

        <label>Title:</label>
        <input type="text" name="title" />

        <br /><br />

        <label>Author:</label>
        <input type="text" name="author" />

        <br /><br />

        <label>Additional URL:</label>
        <input type="text" name="other_url" />

        <br /><br />

        <label>Feature Image:</label>
        <input type="text" name="feature_img" />

        <br /><br />

        <label>Banner Image:</label>
        <input type="text" name="banner_img" />

        <br /><br />

        <label>Description:</label>
        <textarea name="description" rows="2" cols="50"></textarea>

        <br /><br />

        <label>Article:</label>
        <textarea name="article" rows="5" cols="50"></textarea>

        <br /><br />

        <input type="hidden" name="action" value="internal" />
        <input type="submit" name="submit" value="Add" />
        <a href="." value="">Cancel</a>


    </form>

    <!-- External News -->
    <form action="." method="post" id="external">


        <input type="hidden" name="news_id" />
        <input type="hidden" name="type" value="1" />
        <input type="hidden" name="publish" value="0" />
        <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>" />

        <label>Title:</label>
        <input type="text" name="title" />

        <br /><br />

        <label>Author:</label>
        <input type="text" name="author" />

        <br /><br />

        <label>Feature Image:</label>
        <input type="text" name="feature_img" />

        <br /><br />

        <label>Description:</label>
        <textarea name="description" rows="2" cols="50"></textarea>

        <br /><br />

        <label>Article Link:</label>
        <input type="text" name="story_url" />

        <br /><br />

        <input type="hidden" name="action" value="external" />
        <input type="submit" name="submit" value="Add" />
        <a href="." value="">Cancel</a>

</form>

<?php include ('../components/cms_footer.php'); ?>