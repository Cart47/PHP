<?php 

    include ('../../config.php');
    include ('../../components/cms_header.php'); 
    include ('../../components/cms_left_menu.php');

?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include 'index.php'; ?>
    </head>
    <body>
        
        <div id="main">
            
            <h1>Artist Genres</h1>
        
            <form action="index.php" method="post">

                <div id="rock">
                    
                    <h3>Rock</h3>
                    <?php $genre = "electro swing" ?>
                    <?php echo ArtistDB::countRock() ?>
                    
                </div>

                <div id="electroSwing">
                    
                    <h3>Electro Swing</h3>
                    <?php echo ArtistDB::countES() ?>
                    
                </div>
                
            </form>
    
        </div><!-- end main -->
        
    </body>
</html>

<?php include ('../../components/cms_footer.php'); ?>