<?php 

    require_once ('../config.php');
    include ('../components/main_header.php'); 

?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <script src="../js/tooltip.js" type="text/javascript"></script>
        <title></title>
    </head>
    <body>
        
        <!--------------------------------------------->
        <!-- First foreach loop gets the stage names -->
        <!--------------------------------------------->
        <?php foreach ($stages as $stage) : ?>
            
        <h2><?php echo $stage->getName() ; ?> Stage</h2>
            
            <!--------------------------------------->
            <!-- Second foreach loop gets the days -->
            <!--------------------------------------->
            <?php foreach ($stage->getPerformers() as $day) : ?>

                <div class="sched-day">
                    
                    <?php echo $day[0]->getDay(); ?>

                    <!-------------------------------------------->
                    <!-- Third foreach loop gets the performers -->
                    <!-------------------------------------------->
                    <?php foreach ($day as $performer) : ?>

                        <table>
                            <tr>
                                <td><a class="description" href="#" target="_blank" Tooltip="<?php echo $performer->getDescription(); ?>"><?php echo $performer->getArtistName(); ?></a></td>
                                <td>
                                    <?php $start = $performer->getStartTime(); ?>
                                    <?php $end = $performer->getEndTime(); ?>
                                    <?php echo date('g:i a', strtotime($start)); ?> - <?php echo date('g:i a', strtotime($end)); ?>
                                </td>
                            </tr>
                        </table>

                    <?php endforeach; ?>
                    
                </div>

            <?php endforeach; ?>

        <?php endforeach; ?>
        
    </body>
</html>
            
<?php include ('../components/main_footer.php');

?>