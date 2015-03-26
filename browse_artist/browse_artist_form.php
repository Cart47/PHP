<!DOCTYPE html>
<!---->


<?php if(!isset($genres)){
    
     header("Location:../browse_artist");
     
}

    include '../css/style.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Chorus in the Forest | Browse Artist</title>
        <meta name="author" content="name">
        <meta name="description" content="description here">
        <meta name="keywords" content="keywords,here">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <script src="js/jquery-2.1.3.js" type="text/javascript"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.5.3/modernizr.min.js" type="text/javascript"></script>

        <!-- Need to revisit to add in php that determines the associated styles needed and sources them out -->
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
        <link rel="stylesheet" href="../css/Reset.css" type="text/css">
        <link rel="stylesheet" href="../css/CITF-Main.css" type="text/css">
        <link rel="stylesheet" href="../css/navigation.css" type="text/css">
        <?php
            new Stylesheet('contentMain', 'modalStyle');
        ?> 
    </head>
        
        <script src="../js/jquery-2.1.3.js"></script>
       <script src="../js/live_search.js"></script>
    </head>
    <body>
        
        <h1>Browse Artists</h1>
        <form action="index.php" method="post" >
            
            <select onchange="this.form.submit()" name="Select_a_Genre">
                <option value="all">All</option>
               <?php foreach($genres as $genre) : ?>
                
                <option value="<?php echo $genre; ?>" <?php if(isset($_POST['Select_a_Genre'])) {
                    if($_POST['Select_a_Genre'] == $genre){
                        echo 'selected';
                    }
                }?>><?php echo $genre; ?></option>
                <?php endforeach; ?>
            </select>
            
            <input id="search" type="text" name="search" placeholder="Search" maxlength="120"/>
            <span id="filter-count"></span>
            <table>
                <tr>
                    <th>Artist</th>
                    <th>Genre</th>
                    <th>Description</th>
                </tr>
            
        <?php foreach($artistbygenre as $artist) : ?>
                <tr class="artist">
                    <td><?php echo $artist->GetFName(); ?> <?php echo $artist->GetLName();?></td>
                    <td><?php echo $artist->GetGenre(); ?></td>
                    <td><?php echo $artist->GetDescription(); ?></td>
                </tr>
                <?php endforeach; ?>
                 </table>
        </form>
        
        
    </body>
</html>
