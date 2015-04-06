<?php

class NewsDB {
    
    public static function getAllNews(){
        
        $db = Database::getDB();
        
        $query = 'SELECT * FROM news
                  WHERE publish = 1
                  ORDER BY date_published DESC';
        
        $stm = $db->prepare($query);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        
        $articles = array();
        foreach ($result as $row) {
            $article = new NewsClass($row['title'],
                                     $row['date_created'],
                                     $row['date_published'],
                                     $row['author'],
                                     $row['story_url'],
                                     $row['other_url'],
                                     $row['feature_img'],
                                     $row['banner_img'],
                                     $row['description'],
                                     $row['article'],
                                     $row['type'],
                                     $row['publish']); 
            $article->setNewsID($row['news_id']);

            $articles[] = $article;
        }
        
        return $articles;
    }
    
    public static function getNewsByStatus($status) {
        
        $db = Database::getDB();
        
        $query = 'SELECT * FROM news 
                  WHERE publish = :status
                  ORDER BY date_published DESC';
        
        $stm = $db->prepare($query);
        $stm->bindParam(':status', $status, PDO::PARAM_INT);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        
        $articles = array();
        foreach ($result as $row) {
            $article = new NewsClass($row['title'],
                                     $row['date_created'],
                                     $row['date_published'],
                                     $row['author'],
                                     $row['story_url'],
                                     $row['other_url'],
                                     $row['feature_img'],
                                     $row['banner_img'],
                                     $row['description'],
                                     $row['article'],
                                     $row['type'],
                                     $row['publish']); 
            $article->setNewsID($row['news_id']);

            $articles[] = $article;
        }
        
        return $articles;
    }
    
    public static function getNewsByID($news_id){
     
        $db = Database::getDB();
        
        $query = 'SELECT * FROM news
                  WHERE news_id = :news_id';
        
        $stm = $db->prepare($query);
        $stm->bindParam(':news_id', $news_id, PDO::PARAM_INT);
        $stm->execute();
        $getNews = $stm->fetch(PDO::FETCH_ASSOC);
        
        return $getNews;
        
    }
    
    public static function publishNews($news_id, $pubdate, $publish) {
          
        $db = Database::getDB();
        
        $query = 'UPDATE news
                  SET date_published = "' . $pubdate . '", publish = "' . $publish . '"
                  WHERE news_id = :news_id';
        
        $stm = $db->prepare($query);
        $stm->bindParam(':news_id', $news_id, PDO::PARAM_INT);
        
        $row_count = $stm->execute();
        return $row_count;
        
    }
    
    public static function insertNews($news){
        
        $db = Database::getDB();
        
        $news_id = $news->getNewsID();
        $title = $news->getTitle();
        $date_created = $news->getDateCreated();
        $date_published = $news->getDatePublished();
        $author = $news->getAuthor();
        $story_url = $news->getStoryURL();
        $other_url = $news->getOtherURL();
        $feature_img = $news->getFeatureIMG();
        $banner_img = $news->getBannerIMG();
        $description = $news->getDesc();
        $article = $news->getArticle();
        $type = $news->getType();
        $publish = $news->getPublish();
        
        $query = "INSERT INTO news
                  (news_id, title, date_created, date_published, author, story_url, other_url, feature_img, banner_img, description, article, type, publish)
                  VALUES
                  ('$news_id', '$title', '$date_created', '$date_published', '$author', '$story_url', '$other_url', '$feature_img', '$banner_img', '$description', '$article', '$type', '$publish')";
        
        $stm = $db->prepare($query);
        $row_count = $stm->execute();
        return $row_count;
        
    }
    
    public static function updateNews($news_id, $title, $date_created, $date_published, $author, $story_url, $other_url, $feature_img, $banner_img, $description, $article, $type, $publish){
        
        $db = Database::getDB();
        
        $query = 'UPDATE news
                  SET title ="' . $title . '", 
                      date_created ="' . $date_created . '", 
                      date_published ="' . $date_published . '", 
                      author ="' . $author . '",
                      story_url ="' . $story_url . '",
                      other_url ="' . $other_url . '",
                      feature_img ="' . $feature_img . '",
                      banner_img ="' . $banner_img . '",
                      description ="' . $description . '",
                      article ="' . $article . '",
                      type ="' . $type . '",
                      publish ="' . $publish . '"
                  WHERE news_id = :news_id';
        
        $stm = $db->prepare($query);
        $stm->bindParam(":news_id", $news_id, PDO::PARAM_INT);
        $row_count = $stm->execute();
        
        return $row_count;
        
    }

    public static function deleteNews($news_id) {
          
        $db = Database::getDB();
        
        $query = 'DELETE FROM news
                  WHERE news_id = :news_id';
        
        $stm = $db->prepare($query);
        $stm->bindParam(':news_id', $news_id, PDO::PARAM_INT);
        $row_count = $stm->execute();
        return $row_count;
        
    }
    
}
