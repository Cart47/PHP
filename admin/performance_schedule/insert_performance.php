<?php 

require_once ( '../../config.php'); 
include ( '../components/cms_header.php');
//Forces a redirect through the index
if($_SESSION['RoleID'] != 2){
 
  echo  '<script type="text/javascript"> window.location.href ="../../Home/Index.php"; </script>';
}

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
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
                                <option>--</option>
                                
                                <?php foreach ($stages as $stage) : ?>                  

                                <option value="<?php echo $stage->getStageID(); ?>">
                                    <?php echo $stage->getName(); ?>
                                </option> 
                                
                                <?php endforeach; ?>

                            </select>          
                            <!-- end artist listbox -->  
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

                                    <option value="<?php echo $artist['browse_art_id']; ?>">
                                        <?php echo $artist['art_band_name']; ?>
                                    </option> 

                                <?php endforeach; ?>
                
                            </select>
                            <!-- end artist listbox -->  
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

                                foreach($days as $value){
                                    echo "<label for" . $value . ">
                                          <input type='radio' class='radio' name='day' value='" . $value . "'>" . $value . 
                                         "</label>";
                                }
                            ?>

                            <!-- end radio button list for days -->  
                        </td>
                    </tr>
                    <tr>
                        <td><label>Start Time (e.g. 10:00):</label></td>
                        <td><input type="text" name="start_time" class="textbox" /></td>
                    </tr>
                    <tr>
                        <td><label>End Time (e.g. 21:00):</label></td>
                        <td><input type="text" name="end_time" class="textbox" /></td>
                    </tr>
                    <tr>
                        <td><label>Artist Description (250 character max):</label></td>
                        <td><textarea name="description" rows="5" cols="50"></textarea></td>
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
    </body>
</html>

<?php include ('../components/cms_footer.php'); ?>