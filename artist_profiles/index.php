<?php 

if(!isset($_SESSION)) { session_start();}
   
require_once ('../config.php');
include ("../components/main_header.php"); 
require_once('../models/browse_artist/artist.php');
require_once('../models/browse_artist/artist_db.php');

if(isset($_GET['artistID'])){
$artistID = $_GET['artistID'];    
$artist =  ArtistDB::getArtist($artistID);
}


?> 
<div id="artistProfile">

<img id="artistImage" src="<?php echo $artist->GetPicture() ?>" 
     alt="This is a picture of <?php echo $artist->GetFName() . " " . $artist->GetLName();?>" 
     title="This is a picture of <?php echo $artist->GetFName() . " " . $artist->GetLName();?>" />

<section id="artistInformtion">
   <h1><?php echo $artist->GetBandName()  ?></h1>
   <h2><?php echo $artist->GetGenre()  ?></h2>
   <h3>Members</h3>   
   <p><br/><?php echo $artist->GetMembers()  ?></p>
</section>
<section id="artistDescription">
    <h2>Band Description</h2>
    <p><?php echo $artist->GetDescription()  ?></p>
</section>
<!--
Profile Information
Description-->

</div>

<?php include("../components/main_footer.php");?>