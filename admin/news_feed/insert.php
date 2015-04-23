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

    <!-- Internal News -->
    <form action="." method="post" id="news" enctype="multipart/form-data">
        
        <label>
            <input type="radio" class="radio" name="type" id="int-radio" value="0" checked />Internal Article
        </label>

        <label>
            <input type="radio" class="radio" name="type" id="ext-radio" value="1"/>External Article    
        </label>
        
        <input type="hidden" name="news_id" />
        <input type="hidden" name="publish" value="0" />
        <input type="hidden" name="date_created" value="<?php echo date('Y-m-d'); ?>" />

        <table class="plain">
            <tr>
                <!-- Title -->
                <td><label>Title:</label></td>
                <td>
                    <input type="text" name="title" class="textbox" />
                </td>
            </tr>
            <tr>
                <!-- Author -->
                <td><label>Author:</label></td>
                <td>
                    <input type="text" name="author" class="textbox" />   
                </td>
            </tr>
            <tr>
                <!-- Description -->
                <td><label>Description:</label></td>
                <td>
                    <textarea name="description" rows="2" cols="50" class="textarea-sm"></textarea>
                </td>
            </tr>
            <tr class="internal">
                <!-- Article -->
                <td><label>Article:</label></td>
                <td>
                    <textarea name="article" rows="5" cols="50" class="textarea-lg"></textarea>
                </td>
            </tr>
            <tr class="internal">
                <!-- Additional URL -->
                <td><label>Additional URL:</label></td>
                <td><input type="text" name="other_url" class="textbox" /></td>
            </tr>
            <tr class="external">
                <!-- Story URL -->
                <td><label>Story URL:</label></td>
                <td><input type="text" name="story_url" class="textbox" /></td>
            </tr>
        </table>
        
        <input type="hidden" name="action" value="insertNews" />
        <input type="submit" name="submit" class="btn" value="Add New" />
        <a href="." class="btn">Cancel</a>

</form>

<?php include ('../components/cms_footer.php'); ?>