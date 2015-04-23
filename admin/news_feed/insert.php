<?php 

    date_default_timezone_set('UTC'); 
    include ('../components/cms_header.php');
    
    //Forces a redirect through the index
    if($_SESSION['RoleID'] != 2){

      echo  '<script type="text/javascript"> window.location.href ="../../Home/Index.php"; </script>';
    }

?>

<h1>New Article</h1>

    <p>Select the type of article you want to write:</p>

    <!-- Internal News -->
    <form action="." method="post" id="news" enctype="multipart/form-data">
        
        <?php $options = array(0 => 'Internal', 1 => 'External'); ?>

                <?php foreach ($options as $value) : ?>

                    <?php if($value == $_POST['type']) : ?>
                        <label for="<?php echo $value; ?>">
                            <input class="radio" type="radio" name="type" value="<?php echo $value; ?>" checked /> <?php echo $value; ?> 
                        </label>
                    <?php else : ?>
                        <label for="<?php echo $value; ?>">
                            <input class="radio" type="radio" name="type" value="<?php echo $value; ?>" /> <?php echo $value; ?> 
                        </label>
                    <?php endif; ?>

                <?php endforeach; ?>
        
        <input type="hidden" name="news_id" />
        <input type="hidden" name="publish" value="0" />
        <input type="hidden" name="date_created" value="<?php echo date('Y-m-d'); ?>" />

        <table class="plain">
            <tr>
                <!-- Title -->
                <td><label>Title:</label></td>
                <td>
                    <input type="text" name="title" class="textbox" value="<?php echo isset($title) ? $title : '' ; ?>"/>
                    <?php echo isset($fields) ? $fields->getField('title')->showErrors() : '' ; ?>
                </td>
            </tr>
            <tr>
                <!-- Author -->
                <td><label>Author:</label></td>
                <td>
                    <input type="text" name="author" class="textbox" value="<?php echo isset($author) ? $author : '' ; ?>"/>
                    <?php echo isset($fields) ? $fields->getField('author')->showErrors() : '' ; ?>
                </td>
            </tr>
            <tr>
                <!-- Description -->
                <td><label>Description:</label></td>
                <td>
                    <textarea name="description" rows="2" cols="50" class="textarea-sm"><?php echo isset($description) ? $description : '' ; ?></textarea>
                    <?php echo isset($fields) ? $fields->getField('description')->showErrors() : '' ; ?>
                </td>
            </tr>
            <tr class="internal">
                <!-- Article -->
                <td><label>Article:</label></td>
                <td>
                    <textarea name="article" rows="5" cols="50" class="textarea-lg"><?php echo isset($article) ? $article : '' ; ?></textarea>
                    <?php echo isset($fields) ? $fields->getField('article')->showErrors() : '' ; ?>
                </td>
            </tr>
            <tr class="internal">
                <!-- Additional URL -->
                <td><label>Additional URL:</label></td>
                <td>
                    <input type="text" name="other_url" class="textbox" value="<?php echo isset($other_url) ? $other_url : '' ; ?>" />
                    <?php echo isset($fields) ? $fields->getField('other_url')->showErrors() : '' ; ?>
                </td>
            </tr>
            <tr class="external">
                <!-- Story URL -->
                <td><label>Story URL:</label></td>
                <td>
                    <input type="text" name="story_url" class="textbox" value="<?php echo isset($story_url) ? $story_url : '' ; ?>" />
                    <?php echo isset($fields) ? $fields->getField('story_url')->showErrors() : '' ; ?>
                </td>
            </tr>
        </table>
        
        <input type="hidden" name="action" value="insertNews" />
        <input type="submit" name="submit" class="btn" value="Add New" />
        <a href="." class="btn">Cancel</a>

</form>

<?php include ('../components/cms_footer.php'); ?>