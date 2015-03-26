<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
        <?php include 'index.php'; ?>
    </head>
    <body>
        
        
        <form action="index.php" method="post">
            
            
            <div id="rock">
                <h4>Rock</h4>
                <?php $genre = "electro swing" ?>
            <?php echo ArtistDB::countRock() ?>
            </div>
            
            <div id="electroSwing">
                <h4>Electro Swing</h4>
                <?php echo ArtistDB::countES() ?>
            </div>
            </form>
    </body>
</html>
