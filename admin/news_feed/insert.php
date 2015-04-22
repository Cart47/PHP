<?php 

    date_default_timezone_set('UTC'); 
    include ('../components/cms_header.php');
    
    //Forces a redirect through the index
    if($_SESSION['RoleID'] != 2){

      echo  '<script type="text/javascript"> window.location.href ="../../Home/Index.php"; </script>';
    }

?>

<h1>New Article</h1>

    <p>Select the type of article you want to make:</p>

    <label>
        <input type="radio" class="radio" name="newsType" id="int-radio" value="0" checked />Internal Article
    </label>

    <label>
        <input type="radio" class="radio" name="newsType" id="ext-radio" value="1"/>External Article    
    </label>
    


    <!-- Internal News -->
    <form action="." method="post" id="internal" enctype="multipart/form-data">
        
        <input type="hidden" name="news_id" />
        <input type="hidden" name="type" value="0" />
        <input type="hidden" name="publish" value="0" />
        <input type="hidden" name="date_created" value="<?php echo date('Y-m-d'); ?>" />

        <table class="plain">
            <tr>
                <!-- Title -->
                <td><label>Title:</label></td>
                <td>
                    <input type="text" name="int_title" class="textbox" value="<?php echo isset($int_title) ? $int_title : '' ; ?>"/>
                    <?php echo isset($fields) ? $fields->getField('int_title')->showErrors() : '' ; ?>
                </td>
            </tr>
            <tr>
                <!-- Author -->
                <td><label>Author:</label></td>
                <td>
                    <input type="text" name="int_author" class="textbox" value="<?php echo isset($int_author) ? $int_author : '' ; ?>" />
                    <?php echo isset($fields) ? $fields->getField('int_author')->showErrors() : '' ; ?>    
                </td>
            </tr>
            <tr>
                <!-- Additional URL -->
                <td><label>Additional URL:</label></td>
                <td><input type="text" name="other_url" class="textbox" /></td>
            </tr>
            <tr>
                <!-- Description -->
                <td><label>Description:</label></td>
                <td>
                    <textarea name="int_description" rows="2" cols="50" class="textarea-sm"><?php echo isset($int_description) ? $int_description : '' ; ?></textarea>
                    <?php echo isset($fields) ? $fields->getField('int_description')->showErrors() : '' ; ?>
                </td>
            </tr>
            <tr>
                <!-- Article -->
                <td><label>Article:</label></td>
                <td>
                    <textarea name="int_article" rows="5" cols="50" class="textarea-lg"><?php echo isset($int_article) ? $int_article : '' ; ?></textarea>
                    <?php echo isset($fields) ? $fields->getField('int_article')->showErrors() : '' ; ?>
                </td>
                
            </tr>
        </table>
        
        <input type="hidden" name="action" value="internal" />
        <input type="submit" name="submit" class="btn" value="Add New" />
        <a href="." class="btn">Cancel</a>

    </form>

    <div class="clear"></div>

    <!-- External News -->
    <form action="." method="post" id="external" enctype="multipart/form-data">


        <input type="hidden" name="news_id" />
        <input type="hidden" name="type" value="1" />
        <input type="hidden" name="publish" value="0" />
        <input type="hidden" name="date_created" value="<?php echo date('Y-m-d'); ?>" />

        <table class="plain">
            <tr>
                <!-- Title -->
                <td><label>Title:</label></td>
                <td>
                    <input type="text" name="ext_title" class="textbox" value="<?php echo isset($ext_title) ? $ext_title : '' ; ?>" />
                <?php echo isset($fields) ? $fields->getField('ext_title')->showErrors() : '' ; ?>
                </td>
            </tr>
            <tr>
                <!-- Author -->
                <td><label>Author:</label></td>
                <td>
                    <input type="text" name="ext_author" class="textbox" value="<?php echo isset($ext_author) ? $ext_author : '' ; ?>" />
                    <?php echo isset($fields) ? $fields->getField('ext_author')->showErrors() : '' ; ?>
                </td>
            </tr>
            <tr>
                <!-- Description -->
                <td><label>Description:</label></td>
                <td>
                    <textarea name="ext_description" rows="2" cols="50" class="textarea-sm" value="<?php echo isset($ext_description) ? $ext_description : '' ; ?>" ></textarea>
                    <?php echo isset($fields) ? $fields->getField('ext_description')->showErrors() : '' ; ?>
                </td>
            </tr>
            <tr>
                <!-- Article -->
                <td><label>Article Link:</label></td>
                <td>
                    <input type="text" name="ext_story_url" class="textbox" value="<?php echo isset($ext_story_url) ? $ext_story_url : '' ; ?>" />
                    <?php echo isset($fields) ? $fields->getField('ext_story_url')->showErrors() : '' ; ?>
                </td>
            </tr>
        </table>

        <input type="hidden" name="action" value="external" />
        <input type="submit" name="submit" class="btn" value="Add New" />
        <a href="." class="btn">Cancel</a>

</form>

<?php include ('../components/cms_footer.php'); ?>