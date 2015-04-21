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
        
        <h1>Edit Performance</h1>
        
        <form action="." method="post">
            
            <input type="hidden" name="performance_id" value="<?php echo $performByID->getPerformanceID(); ?>" />
            
            <!----------------------------->
            <!-- Dropdown list of stages -->  
            <!----------------------------->
            <label>Select a Stage:</label>
            
                <select name="stage_id" id="stages">
                    
                    <option>--</option>
                    
                    <?php foreach ($stages as $stage) : ?>    
                    
                        <!-- If stage_id in the performances table matches the stage_id in the stages table, 
                        show it as the selected value -->
                        <?php if($stage->getStageID() == $performByID->getStageID()) :  ?>
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
                
                <br />
                
                <!------------------------>
                <!-- Listbox of artists -->  
                <!------------------------>
                <label>Select a Performer:</label>
                <br />
                <select name="browse_art_id" id="performers" size="5" >

                    <?php foreach ($artists as $artist) : ?>                  

                        <!-- If browse_art_id in the performances table matches the browse_art_id in the browse_artist table, 
                        show it as the selected value -->
                        <?php if($artist['browse_art_id'] == $performByID->getArtistID()) : ?>
                            <option value="<?php echo $artist['browse_art_id']; ?>" selected>
                                <?php echo $artist['art_band_name']; ?>
                            </option>
                        <?php else : ?>
                            <option value="<?php echo $artist['browse_art_id']; ?>">
                                <?php echo $artist['art_band_name']; ?>
                            </option>
                        <?php endif; ?>

                    <?php endforeach; ?>
                
                </select>
                
                <br />
                
                <!------------------------------->
                <!-- Radio button list of days -->  
                <!------------------------------->
                
                <label>Select a Festival Day:</label>
                <br />
               
                <?php $days = array('Friday', 'Saturday', 'Sunday'); ?>
                
                    <?php foreach ($days as $value) : ?>
                
                        <?php if($value == $performByID->getDay()) : ?>
                            <label for="<?php echo $value; ?>">
                                <input type="radio" name="day" value="<?php echo $value; ?>" checked /> <?php echo $value; ?> 
                            </label>
                        <?php else : ?>
                            <label for="<?php echo $value; ?>">
                                <input type="radio" name="day" value="<?php echo $value; ?>" /> <?php echo $value; ?> 
                            </label>
                        <?php endif; ?>
                
                    <?php endforeach; ?>

                <br />
            
                <label>Start Time (e.g. 10:00):</label>
                <?php $start = $performByID->getStartTime(); ?>
                <input type="text" name="start_time" value="<?php echo date('g:i', strtotime($start)); ?>"/>
                
                <br />

                <label>End Time (e.g. 21:00):</label>
                <?php $end = $performByID->getEndTime(); ?>
                <input type="text" name="end_time" value="<?php echo date('g:i', strtotime($end)); ?>"/>
                
                <br />
                
                <label>Artist or Performance Description (250 character max):</label>
                <br />
                <textarea name="description" rows="5" cols="50"><?php echo $performByID->getDescription(); ?></textarea>
            
            <br /><br />          
            
            <input type="hidden" name="action" value="updatePerformance" />
            <input type="submit" name="submit" value="Update" />
            <a href="." class="btn">Cancel</a>
            
        </form>
        
    </body>
</html>

<?php include ('../components/cms_footer.php'); ?>