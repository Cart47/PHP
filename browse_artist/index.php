<?php
include ('../config.php');
include ('../components/main_header.php');

require_once('../models/browse_artist/artist.php');
require_once('../models/browse_artist/artist_db.php');

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])){
    $action = $_POST['action'];
} else {
    $action = 'list_artist';
}

if($action == 'list_artist') {
    if(!isset($_GET['browse_art_id'])){
        $browse_art_id = 1;
        
    }
    else
    {
        $browse_art_id = $_GET['browse_art_id'];
    }
    
    $current_artist = ArtistDB::getArtist($browse_art_id);
    $genres = ArtistDB::getGenres();
    $artistbygenre = ArtistDB::getArtists();
    if(isset($_POST['Select_a_Genre']) AND $_POST['Select_a_Genre'] != 'all')
        {
            $artistbygenre = ArtistDB::getGenre($_POST['Select_a_Genre']);
        }
    include('browse_artist_form.php');
} else if ($action == 'view_artist'){
    $artists = ArtistDB::getArtists();
    
    include('artist_view.php');
}

include ('../components/main_footer.php');