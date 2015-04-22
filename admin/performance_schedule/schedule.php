<?php 

require_once ('../../config.php'); 
include ('../components/cms_header.php'); 
//Forces a redirect through the index
if($_SESSION['RoleID'] != 2){
 
  echo  '<script type="text/javascript"> window.location.href ="../../Home/Index.php"; </script>';
}


?>

<html>
    <head>
        <meta charset="UTF-8">
        <script src="../js/jquery-2.1.3.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
        
        <h1>Performance Schedule</h1>
        
        <div class="head-btn">
            <div class="inline-btns">
            <!-- Add Stage Button -->
                <form action="." method="post">
                    <input type="hidden" name="action" value="addStage" />
                    <button type="submit" class="btn" name="add"><i class="fa fa-plus"></i>Add a Stage</button>
                </form>
            </div>
            
            <div class="inline-btns">
                <!-- Add Performance Button -->
                <form action="." method="post">
                    <input type="hidden" name="action" value="addPerformance" />
                    <button type="submit" class="btn" name="add"><i class="fa fa-plus"></i>Add a Performance</button>
                </form>
            </div>
        </div>
   
        <?php foreach ($stages as $stage) : ?>
            
            <table class="plain stage">
                <tr>
                    <td colspan="2">
                        <a href="?id=<?php echo $stage->getStageID(); ?>">
                            <?php echo $stage->getName(); ?>
                        </a>
                    </td>
                </tr>
                <tr>
                    <td>
                        <form action="." method="post" id="editStage">                            
                            <input type="hidden" name="stage_id" value="<?php echo $stage->getStageID(); ?>" />
                            <input type="hidden" name="action" value="editStage" />
                            <button type="submit" class="link-btn"><i class="fa fa-pencil fa-lg"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="." method="post" id="deleteStage">                            
                            <input type="hidden" name="stage_id" value="<?php echo $stage->getStageID(); ?>" />
                            <input type="hidden" name="action" value="deleteStage" />
                            <button type="submit" class="link-btn"><i class="fa fa-trash-o fa-lg"></i></button> 
                        </form>
                    </td>
                </tr>
            </table>
            
        <?php endforeach; ?>
        
        <br /><br />
        
        <h3>Performances for the <?php echo $stageName['name']; ?> Stage:</h3>
        
        <br />
        
        <!------------------>
        <!-- Friday Table -->
        <!------------------>
        
        <h2>Friday</h2>
        
        <?php if($friday == null) : ?>
            <p>No scheduled performances</p>
        <?php else : ?>
            <table class="sched-day">
                
                <th>Performer</th>
                <th>Timeslot</th>
                <th>Edit</th>
                <th>Delete</th>
                
                <?php foreach ($friday as $fri) : ?>

                    <tr>
                        <td>
                            <?php echo $fri->getArtistName(); ?>
                        </td>
                        <td>
                            <?php $start = $fri->getStartTime(); ?>
                            <?php $end = $fri->getEndTime(); ?>
                            <?php echo date('g:i a', strtotime($start)); ?> - <?php echo date('g:i a', strtotime($end)); ?>
                        </td>
                        <td>
                            <form action="." method="post">                            
                                <input type="hidden" name="performance_id" value="<?php echo $fri->getPerformanceID(); ?>" />
                                <input type="hidden" name="action" value="editPerformance" />
                                <button type="submit" class="link-btn">Edit</button>                      
                            </form>
                        </td>
                        <td>
                            <form action="." method="post">                            
                                <input type="hidden" name="performance_id" value="<?php echo $fri->getPerformanceID(); ?>" />
                                <input type="hidden" name="action" value="deletePerformance" />
                                <button type="submit" class="link-btn">Delete</button>                      
                            </form>
                        </td>
                    </tr>
                
                <?php endforeach; ?>
                
            </table>
        <?php endif; ?>
        
        <br /><br />
        
        <!-------------------->
        <!-- Saturday Table -->
        <!-------------------->
        
        <h2>Saturday</h2>
        <?php if($saturday == null) : ?>
            <p>No scheduled performances</p>
        <?php else : ?>
        <table class="sched-day">
            
            <th>Performer</th>
            <th>Timeslot</th>
            <th>Edit</th>
            <th>Delete</th>
            
            <?php foreach ($saturday as $sat) : ?>
                <tr>
                    <td>
                        <?php echo $sat->getArtistName(); ?>
                    </td>
                    <td>
                        <?php $start = $sat->getStartTime(); ?>
                        <?php $end = $sat->getEndTime(); ?>
                        <?php echo date('g:i a', strtotime($start)); ?> - <?php echo date('g:i a', strtotime($end)); ?>
                    </td>
                    <td>
                        <form action="." method="post">                            
                            <input type="hidden" name="performance_id" value="<?php echo $sat->getPerformanceID(); ?>" />
                            <input type="hidden" name="action" value="editPerformance" />
                            <button type="submit" class="link-btn">Edit</button>                      
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">                            
                            <input type="hidden" name="stage_id" value="<?php echo $sat->getPerformanceID(); ?>" />
                            <input type="hidden" name="action" value="deletePerformance" />
                            <button type="submit" class="link-btn">Delete</button>                      
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
        
        <br /><br />
        
        <!------------------>
        <!-- Sunday Table -->
        <!------------------>
        
        <h2>Sunday</h2>
        
        <?php if($sunday == null) : ?>
            <p>No scheduled performances</p>
        <?php else : ?>
        <table class="sched-day">
            
            <th>Performer</th>
            <th>Timeslot</th>
            <th>Edit</th>
            <th>Delete</th>
            
            <?php foreach ($sunday as $sun) : ?>
                <tr>
                    <td>
                        <?php echo $sun->getArtistName(); ?>
                    </td>
                    <td>
                        <?php $start = $sun->getStartTime(); ?>
                        <?php $end = $sun->getEndTime(); ?>
                        <?php echo date('g:i a', strtotime($start)); ?> - <?php echo date('g:i a', strtotime($end)); ?>
                    </td>
                    <td>
                        <form action="." method="post">                            
                            <input type="hidden" name="performance_id" value="<?php echo $sun->getPerformanceID(); ?>" />
                            <input type="hidden" name="action" value="editPerformance" />
                            <button type="submit" class="link-btn">Edit</button>                      
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">                            
                            <input type="hidden" name="performance_id" value="<?php echo $sun->getPerformanceID(); ?>" />
                            <input type="hidden" name="action" value="deletePerformance" />
                            <button type="submit" class="link-btn">Delete</button>                      
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
        <?php endif; ?>
        <br /><br />
        
    </body>
</html>

<?php include ('../components/cms_footer.php'); ?>