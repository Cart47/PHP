<?php 
if(!isset($genres)){
    
     header("Location:../browse_artist");
     
}
?>
        
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
                    <td><a href="../artist_profiles/index.php?artistID=<?php echo $artist->getID(); ?>"><?php echo $artist->GetFName(); ?> <?php echo $artist->GetLName();?></a></td>
                    <td><?php echo $artist->GetGenre(); ?></td>
                    <td><?php echo $artist->GetDescription(); ?></td>
                </tr>
                <?php endforeach; ?>
                 </table>
        </form>
        
        