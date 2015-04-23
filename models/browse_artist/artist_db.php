<?php
class ArtistDB {
    public static function getArtists() {
        $db = Database::getDB();
        $query = 'SELECT * FROM browse_artist ORDER BY browse_art_id';
        $result = $db->query($query);
        $artists = array();
        foreach ($result as $row) {
            $artist = new Artist($row['browse_art_id'],
                                 $row['art_fname'],
                                 $row['art_lname'],
                                 $row['genre'],
                                 $row['description'],
                                 $row['display'],
                                 $row['art_band_name'],
                                 $row['browse_art_picture'],
                                $row['band_members']);
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
                                 $row['art_fname'],
                                 $row['art_lname'],
                                 $row['genre'],
                                 $row['description'],
                                 $row['display'],
                                 $row['art_band_name'],
                                 $row['browse_art_picture'],
                                 $row['band_members']);
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
                                 $row['art_fname'],
                                 $row['art_lname'],
                                 $row['genre'],
                                 $row['description'],
                                 $row['display'],
                                 $row['art_band_name'],
                                 $row['browse_art_picture'],
                                 $row['band_members']);
            $artists[] = $artist;
        }

        return $artists;
    }

        public static function countAltFolk() {
        $db = Database::getDB();
        $query = "SELECT COUNT(*) FROM browse_artist WHERE genre = 'Alternative Folk' GROUP BY genre;";
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

        public static function countHardRockAcapella() {
        $db = Database::getDB();
        $query = "SELECT COUNT(*) FROM browse_artist WHERE genre = 'Hard Rock Acapella' GROUP BY genre;";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->rowCount();
        $row = $statement->fetch();


           return $row[0];
        }

        public static function countCountryGrunge() {
        $db = Database::getDB();
        $query = "SELECT COUNT(*) FROM browse_artist WHERE genre = 'Country Grunge' GROUP BY genre;";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->rowCount();
        $row = $statement->fetch();


           return $row[0];
        }

        public static function countDemocraticFolk() {
        $db = Database::getDB();
        $query = "SELECT COUNT(*) FROM browse_artist WHERE genre = 'Democratic Folk' GROUP BY genre;";
        $statement = $db->prepare($query);
        $statement->execute();
        $result = $statement->rowCount();
        $row = $statement->fetch();


           return $row[0];
        }

        


        public static function getArtistNames() {

        $db = Database::getDB();

        $query = "SELECT browse_art_id, art_band_name FROM browse_artist";
        $result = $db->query($query);

        return $result;
        }

    }
