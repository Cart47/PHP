<?php

class NewsDB {
    
    public static function getNewsByStatus($status) {
        
        $db = Database::getDB();
        
        $query = 'SELECT * FROM news WHERE publish = :status';
        
        $stm = $db->prepare($query);
        $stm->bindParam(':status', $status, PDO::PARAM_INT);
        $stm->execute();
        $result = $stm->fetchAll(PDO::FETCH_ASSOC);
        
        $articles = array();
        foreach ($result as $row) {
            $article = new NewsClass($row['title'],
                                     $row['date'],
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
    
    public static function publishNews($news_id) {
          
        $db = Database::getDB();
        
        $query = 'UPDATE news
                  SET publish = 1
                  WHERE news_id = :news_id';
        
        $stm = $db->prepare($query);
        $stm->bindParam(':news_id', $news_id, PDO::PARAM_INT);
        //$stm->bindParam(':publish', $publish, PDO::PARAM_INT);
        
        $row_count = $stm->execute();
        return $row_count;
        
    }
    
    public static function insertNews($news){
        
        $db = Database::getDB();
        
        $news_id = $news->getNewsID();
        $title = $news->getTitle();
        $date = $news->getDate();
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
                  (news_id, title, date, author, story_url, other_url, feature_img, banner_img, description, article, type, publish)
                  VALUES
                  ('$news_id', '$title', '$date', '$author', '$story_url', '$other_url', '$feature_img', '$banner_img', '$description', '$article', '$type', '$publish')";
        
        $stm = $db->prepare($query);
        $row_count = $stm->execute();
        return $row_count;
        
    }
    
    public static function updateNews($news_id, $title, $date, $author, $story_url, $other_url, $feature_img, $banner_img, $description, $article, $type, $publish){
        
        $db = Database::getDB();
        
        $query = 'UPDATE news
                  SET title ="' . $title . '", 
                      date ="' . $date . '", 
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
