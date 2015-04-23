<?php 

    include ( '../components/cms_header.php'); 

    //Forces a redirect through the index
    if($_SESSION['RoleID'] != 2){

        echo  '<script type="text/javascript"> window.location.href ="../../Home/Index.php"; </script>';
    }

?>
        
<form action="." method="post">

    <h1>Update Stage</h1>

    <input type="hidden" name="stage_id" value="<?php echo isset($stageByID['stage_id']) ? $stageByID['stage_id'] : '' ; ?>" />

    <table class="plain">
        <tr>
            <td><label>Stage Name:</label></td>
        </tr>
        <tr>
            <td>
                <input type="text" class="textbox" name="name" value="<?php echo isset($stageByID['name']) ? $stageByID['name'] : '' ; ?>" />
                <?php echo isset($fields) ? $fields->getField('name')->showErrors() : '' ; ?>
            </td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="action" value="updateStage" />
                <input type="submit" name="submit" value="Update" class="btn" />
                <a href="." class="btn">Cancel</a>
            </td>
            <td></td>
        </tr>

    </table>

</form>


<?php include ('../components/cms_footer.php'); ?>