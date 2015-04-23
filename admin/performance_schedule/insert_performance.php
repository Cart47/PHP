<?php 
 
    include_once ( '../components/cms_header.php');

    //Forces a redirect through the index
    if($_SESSION['RoleID'] != 2){

      echo  '<script type="text/javascript"> window.location.href ="../../Home/Index.php"; </script>';
    }

?>

        
<h1>New Performance</h1>

<form action="." method="post">

    <input type="hidden" name="performance_id" />

    <table class="plain">

    <!----------------------------->
    <!-- Dropdown list of stages -->  
    <!----------------------------->

        <tr>
            <td><label>Select a Stage:</label></td>
            <td>
                <select name="stage_id" id="stages" class="dropdown">
                    <option value='0'>--</option>

                    <?php foreach ($stages as $stage) : ?>   

                        <?php if(isset($_POST['stage_id']) && $_POST['stage_id'] == $stage->getStageID()) :  ?>
                            <option value="<?php echo $stage->getStageID(); ?>" selected>
                                <?php echo $stage->getName(); ?>
                            </option> 
                        <?php  else : ?>
                            <option value="<?php echo $stage->getStageID(); ?>">
                                <?php echo $stage->getName(); ?>
                            </option> 
                        <?php endif; ?>

                    <?php endforeach; ?>                           
                </select> 

                <?php echo isset($fields) ? $fields->getField('stage_id')->showErrors() : '' ; ?> 
            </td>
        </tr>

        <!------------------------>
        <!-- Listbox of artists -->  
        <!------------------------>

        <tr>
            <td><label>Select a Performer:</label></td>
            <td>
                <select name="browse_art_id" id="performers" size="5" class="listbox">

                    <?php foreach ($artists as $artist) : ?>                  

                        <?php if(isset($_POST['browse_art_id']) && $_POST['browse_art_id'] == $artist['browse_art_id']) : ?>
                            <option value="<?php echo $artist['browse_art_id']; ?>" selected>
                                <?php echo $artist['art_band_name']; ?>
                            </option>
                        <?php else : ?>
                            <option value="<?php echo $artist['browse_art_id']; ?>">
                                <?php echo $artist['art_band_name']; ?>
                            </option>

                        <?php endif; ?> 

                    <?php endforeach;?>

                </select>

                <?php echo isset($fields) ? $fields->getField('browse_art_id')->showErrors() : '' ; ?>

            </td>
        </tr>

        <!------------------------------->
        <!-- Radio button list of days -->  
        <!------------------------------->

        <tr>
            <td><label>Select a Festival Day:</label></td>
            <td>
                <!-- Array to populate radio button list -->
                <?php $days = array('Friday', 'Saturday', 'Sunday'); 

                    foreach ($days as $day) : ?>

                        <?php if(isset($_POST['day']) && $day == $_POST['day']) : ?>
                            <label for="<?php echo $day; ?>">
                                <input class="radio" type="radio" name="day" value="<?php echo $day; ?>" checked /> <?php echo $day; ?> 
                            </label>
                        <?php else : ?>
                            <label for="<?php echo $day; ?>">
                                <input class="radio" type="radio" name="day" value="<?php echo $day; ?>" /> <?php echo $day; ?> 
                            </label>

                        <?php endif; ?>

                    <?php endforeach; ?>
                    <?php echo isset($fields) ? $fields->getField('day')->showErrors() : '' ; ?>
            </td>
        </tr>
        <tr>
            <td><label>Start Time (e.g. 10:00):</label></td>
            <td>
                <input type="text" name="start_time" class="textbox" value="<?php echo isset($start_time) ? $start_time : '' ; ?>"/>
                <?php echo isset($fields) ? $fields->getField('start_time')->showErrors() : '' ; ?>
            </td>
        </tr>
        <tr>
            <td><label>End Time (e.g. 21:00):</label></td>
            <td>
                <input type="text" name="end_time" class="textbox" value="<?php echo isset($end_time) ? $end_time : '' ; ?>" />
                <?php echo isset($fields) ? $fields->getField('end_time')->showErrors() : '' ; ?>
            </td>
        </tr>
        <tr>
            <td><label>Artist Description (250 character max):</label></td>
            <td>
                <textarea name="description" rows="5" cols="50" value="<?php echo isset($description) ? $description : '' ; ?>"></textarea>
                <?php echo isset($fields) ? $fields->getField('description')->showErrors() : '' ; ?>
            </td>
        </tr>
        <tr>
            <td>
                <input type="hidden" name="action" value="insertPerformance" />
                <input type="submit" name="submit" value="Create" class="btn" />
                <a href="." class="btn">Cancel</a>
            </td>
            <td></td>
        </tr>

    </table>

</form>      

<?php include_once ('../components/cms_footer.php'); ?>