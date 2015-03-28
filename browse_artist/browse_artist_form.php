<!DOCTYPE html>

<?php if(!isset($genres)){
    
     header("Location:../browse_artist");
     
}

    include ('../config.php');
    include ('../components/main_header.php');

?>

<html>
    <head>
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

<?php include ('../components/main_footer.php'); ?>