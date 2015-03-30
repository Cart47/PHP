<?php

require_once($_SERVER['DOCUMENT_ROOT'] . '/PHP/config.php');
require_once($path . 'models/database.php');

class ArtistDB {
    public static function getArtists() {
        $db = Database::getDB();
        $query = 'SELECT * FROM browse_artist '
                . 'ORDER BY browse_art_id';
        $result = $db->query($query);
        $artists = array();
        foreach ($result as $row) {
            $artist = new Artist($row['browse_art_id'],
                                 $row['artist_id'],
                                 $row['art_fname'],
                                 $row['art_lname'],
                                 $row['genre'],
                                 $row['description'],
                                 $row['display']);
            $artists[] = $artist;
            
        }
        
        return $artists;
    }
    
    public static function getGenres() {
        $db = Database::getDB();
        $query = 'SELECT DISTINCT genre FROM browse_artist ORDER BY browse_art_id';
        $result = $db->query($query);
        $genres = array();
        foreach ($result as $row) {
            $genre = $row['genre'];
                                 
            $genres[] = $genre;
            
        }
        
        return $genres;
    }
    
    public static function getArtist($bartist_id) {
        $db = Database::getDB();
        $query = "SELECT * FROM browse_artist
                WHERE browse_art_id ='$bartist_id'";
        $statement = $db->query($query);
        $row = $statement->fetch();
        $artist = new Artist($row['browse_art_id'],
                                 $row['artist_id'],
                                 $row['art_fname'],
                                 $row['art_lname'],
                                 $row['genre'],
                                 $row['description'],
                                 $row['display']);
        return $artist;
    }

    public static function getGenre($genre) {
         $db = Database::getDB();
         $query = "SELECT  * FROM browse_artist
                   WHERE genre ='$genre'";
         $statement =$db->query($query);
         $artists = array();
         foreach ($statement as $row) {
             
         
         $artist = new Artist($row['browse_art_id'],
                                 $row['artist_id'],
                                 $row['art_fname'],
                                 $row['art_lname'],
                                 $row['genre'],
                                 $row['description'],
                                 $row['display']);
            $artists[] = $artist;
        }
        
        return $artists;
    }
    
        public static function countRock() {
        $db = Database::getDB();
        $query = "SELECT COUNT(*) FROM browse_artist WHERE genre = 'Rock' GROUP BY genre;";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->rowCount();
        $row = $statement->fetch();
         
            
           return $row[0];  
        }
        
        
        public static function countES() {
        $db = Database::getDB();
        $query = "SELECT COUNT(*) FROM browse_artist WHERE genre = 'Electro-Swing' GROUP BY genre;";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->rowCount();
        $row = $statement->fetch();
         
            
           return $row[0];  
        }

    }
