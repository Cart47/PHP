<?php

require ('../../models/database.php');
require ('../../models/news_feed/news_class.php');
require ('../../models/news_feed/news_db.php');

//function that gets news articles by publish status
function getNewsList(){
    
    GLOBAL $unpublishedNews;
    GLOBAL $publishedNews;
    
    $unpublishArticle = 0;
    $publishArticle = 1;
    
    $unpublishedNews = NewsDB::getNewsByStatus($unpublishArticle);
    $publishedNews = NewsDB::getNewsByStatus($publishArticle);
    
}


// -------------------------------------- //    
// ---------- Display Articles ---------- //
// -------------------------------------- //  

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'newsList';
}

if ($action == 'newsList'){ //default view
    
    getNewsList();
     
    include ('news_list.php');
  
    
// ---------------------------------------- //    
// ---------- Inserting Articles ---------- //
// ---------------------------------------- // 
    
} elseif ($action == 'add'){ //if add news article button is clicked
 
    include ('insert.php'); 
    
} elseif ($action == 'internal'){ //insert an internal news article
    
    //Image upload path and filenames
    $file_temp = $_FILES['feature_img']['tmp_name'];
    $file_name = $_FILES['feature_img']['name'];
    $file_size = $_FILES['feature_img']['size'];
    $file_type = $_FILES['feature_img']['type'];
    $file_error = $_FILES['feature_img']['error'];
    
    //specifying size requirements
    //$max_file_size = 20;
    //if($file_size > $max_file_size){
        //echo 'Image is too big.';
    //}
    
    $img_root = "PHP/img/news/";
    $img_path = $img_root . $file_name;
    
    $target_path = $_SERVER['DOCUMENT_ROOT'] . "/PHP/img/news/";
    $target_path = $target_path . $file_name;

    if(move_uploaded_file($file_temp, $target_path)){
        echo "The file " . $file_name . "has been uploaded";
    }else{
        echo 'there was an error uploading';
    }
    
    //Posted values
    $news_id = $_POST['news_id'];
    $title = $_POST['title'];
    $date_created = $_POST['date_created'];
    $author = $_POST['author'];
    $other_url = $_POST['other_url']; 
    //$feature_img = $_POST['feature_img'];
    $banner_img = $_POST['banner_img'];
    $description = $_POST['description'];
    $article = $_POST['article']; 
    $type = $_POST['type'];
    $publish = $_POST['publish'];
    
    //Call to insert
    $news = new NewsClass($title, $date_created, null, $author, null, $other_url, $img_path, $banner_img, $description, $article, $type, $publish);
    $addNews = NewsDB::insertNews($news);
    
    getNewsList();
    
    include ('news_list.php');
    
} elseif ($action == 'external'){ //insert an external news article
    
    $news_id = $_POST['news_id'];
    $title = $_POST['title'];
    $date_created = $_POST['date_created'];
    $author = $_POST['author'];
    $story_url = $_POST['story_url']; 
    $feature_img = $_POST['feature_img'];
    $description = $_POST['description']; 
    $type = $_POST['type'];
    $publish = $_POST['publish'];
    
    $news = new NewsClass($title, $date_created, null, $author, $story_url, null, $feature_img, null, $description, null, $type, $publish);
    $addNews = NewsDB::insertNews($news);
    
    getNewsList();
    
    include ('news_list.php');
    
    
// ------------------------------------------------------ //    
// ---------- Publishing and Unpublishing News ---------- //
// ------------------------------------------------------ //   
    
} elseif ($action == 'publish') { //if publish button is clicked beside article
    
    $news_id = $_POST['news_id'];
    $publishSelected = NewsDB::getNewsByID($news_id);
    
    include ('publish.php');
    
} elseif ($action == 'yesPublish'){ //if user confirms yes to publish article

    $pubdate = $_POST['date_published'];
    $published = 1;
    $news_id = $_POST['news_id'];
    
    NewsDB::publishNews($news_id, $pubdate, $published);
    
    getNewsList();
    
    include ('news_list.php');
    
} elseif ($action == 'unpublish') { //if UNpublish button is clicked beside article
    
    $news_id = $_POST['news_id'];
    $unpublishSelected = NewsDB::getNewsByID($news_id);
    
    include ('unpublish.php');
    
} elseif ($action == 'yesUnpublish'){ //if user confirms yes to unpublish article
    
    $unpubdate = $_POST['date_published'];
    $unpublished = 0;
    $news_id = $_POST['news_id'];
    
    NewsDB::publishNews($news_id, $unpubdate, $unpublished);
    
    getNewsList();
    
    include ('news_list.php');
    
    
// --------------------------------------- //      
// ---------- Updating Articles ---------- //
// --------------------------------------- //  
    
} elseif ($action == 'edit') { //if the edit button is clicked
    
    $news_id = $_POST['news_id'];
    $newsByID = NewsDB::getNewsByID($news_id);
 
    include ('update.php');
    
} elseif ($action == 'updateInternal') { //if the update button is clicked for an internal article
    
    $news_id = $_POST['news_id'];
    $title = $_POST['title'];
    $date_created = $_POST['date_created'];
    $date_published = $_POST['date_published'];
    $author = $_POST['author'];
    $other_url = $_POST['other_url']; 
    $feature_img = $_POST['feature_img'];
    $banner_img = $_POST['banner_img'];
    $description = $_POST['description']; 
    $article = $_POST['article'];
    $type = $_POST['type'];
    $publish = $_POST['publish'];
    
    NewsDB::updateNews($news_id, $title, $date_created, $date_published, $author, null, $other_url, $feature_img, $banner_img, $description, $article, $type, $publish);
    
    getNewsList();
    
    include ('news_list.php');
    
} elseif ($action == 'updateExternal') { //if the update button is clicked for an external article
    
    $news_id = $_POST['news_id'];
    $title = $_POST['title'];
    $date_created = $_POST['date_created'];
    $date_published = $_POST['date_published'];
    $author = $_POST['author'];
    $story_url = $_POST['story_url']; 
    $feature_img = $_POST['feature_img'];
    $description = $_POST['description'];  
    $type = $_POST['type'];
    $publish = $_POST['publish'];
    
    NewsDB::updateNews($news_id, $title, $date_created, $date_published, $author, $story_url, null, $feature_img, null, $description, null, $type, $publish);
    
    getNewsList();
    
    include ('news_list.php');
    
    
// --------------------------------------- //  
// ---------- Deleting Articles ---------- //
// --------------------------------------- //  
    
} elseif ($action == 'delete'){ //if user confirms yes to delete article
    
    $news_id = $_POST['news_id']; 
    $selected = NewsDB::getNewsByID($news_id);
    
    include ('delete.php');
    
} elseif ($action == 'yesDelete'){
    
    $news_id = $_POST['news_id']; 
    NewsDB::deleteNews($news_id); 
    
    getNewsList();
    
    include ('news_list.php');
    
}
