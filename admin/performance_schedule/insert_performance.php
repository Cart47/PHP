<?php 

require_once ( '../../config.php'); 
include ( '../components/cms_header.php'); 

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
  
                <!----------------------------->
                <!-- Dropdown list of stages -->  
                <!----------------------------->
                
                <label>Select a Stage:</label>
                <select name="stage_id" id="stages">
                    <option>--</option>
                    <?php foreach ($stages as $stage) : ?>                  

                        <option value="<?php echo $stage->getStageID(); ?>">
                            <?php echo $stage->getName(); ?>
                        </option> 

                    <?php endforeach; ?>
                
                </select>
                
                <!-- end artist listbox -->  
                
                <br />
                
                <!------------------------>
                <!-- Listbox of artists -->  
                <!------------------------>
                
                <label>Select a Performer:</label>
                <br />
                <select name="browse_art_id" id="performers" size="5" >

                    <?php foreach ($artists as $artist) : ?>                  

                        <option value="<?php echo $artist['browse_art_id']; ?>">
                            <?php echo $artist['art_band_name']; ?>
                        </option> 

                    <?php endforeach; ?>
                
                </select>
          
                <!-- end artist listbox -->  
                
                 <br />
               
                <!------------------------------->
                <!-- Radio button list of days -->  
                <!------------------------------->
                
                <label>Select a Festival Day:</label>
                <br />
                
                <!-- Array to populate radio button list -->
                <?php $days = array('Friday', 'Saturday', 'Sunday'); 
                
                    foreach($days as $value){
                        echo "<label for" . $value . ">
                              <input type='radio' name='day' value='" . $value . "'>" . $value . 
                             "</label><br />";
                    }
                ?>
                
                <!-- end radio button list for days -->  

                <br />
                
                <label>Start Time (e.g. 10:00):</label>
                <input type="text" name="start_time" />
                
                <br />

                <label>End Time (e.g. 21:00):</label>
                <input type="text" name="end_time" />
                
                <br />
                
                <label>Artist or Performance Description (250 character max):</label>
                <br />
                <textarea name="description" rows="5" cols="50"></textarea>
                
                <br />
                
                <input type="hidden" name="action" value="insertPerformance" />
                <input type="submit" name="submit" value="Create" />
                <a href="." value="">Cancel</a>
                
            </form>
        
    </body>
</html>

<?php include ('../components/cms_footer.php'); ?>