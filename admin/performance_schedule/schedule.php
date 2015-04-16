<?php 

require_once ('../../config.php'); 
include ('../components/cms_header.php'); 

?>

<!DOCTYPE html>

<?php 

//Forces a redirect through the index
//if(!isset($pendingNews) && !isset($publishedNews)){
//    header('Location: ../cms/'); 
//    
//}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <script src="../js/jquery-2.1.3.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
        
        <h2>Performance Schedule</h2>
   
        <?php foreach ($stages as $stage) : ?>
            
            <table class="stage">
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
                            <button type="submit" class="link-btn">Edit</button>                      
                        </form>
                    </td>
                    <td>
                        <form action="." method="post" id="deleteStage">                            
                            <input type="hidden" name="stage_id" value="<?php echo $stage->getStageID(); ?>" />
                            <input type="hidden" name="action" value="deleteStage" />
                            <button type="submit" class="link-btn">Delete</button>                      
                        </form>
                    </td>
                </tr>
            </table>
            
        <?php endforeach; ?>
        
        <br /><br />
        
        <p>Performances for the <strong><?php echo $stageName['name']; ?> Stage</strong>:</p>
        
        <!------------------>
        <!-- Friday Table -->
        <!------------------>
        
        <h2>Friday</h2>
        
        <?php if($friday == null) : ?>
            <p>No scheduled performances</p>
        <?php else : ?>
            <table>
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
        
        
        <!-------------------->
        <!-- Saturday Table -->
        <!-------------------->
        
        <h2>Saturday</h2>
        <?php if($saturday == null) : ?>
            <p>No scheduled performances</p>
        <?php else : ?>
        <table>
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
        
        <!------------------>
        <!-- Sunday Table -->
        <!------------------>
        
        <h2>Sunday</h2>
        
        <?php if($sunday == null) : ?>
            <p>No scheduled performances</p>
        <?php else : ?>
        <table>
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
        
        <form action="." method="post">
            <input type="hidden" name="action" value="addStage" />
            <input type="submit" name="add" value="New Stage" /> 
        </form>
        <form action="." method="post">
            <input type="hidden" name="action" value="addPerformance" />
            <input type="submit" name="add" value="New Performance" /> 
        </form>
        
    </body>
</html>

<?php include ('../components/cms_footer.php'); ?>