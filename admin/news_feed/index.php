<?php

require ('../../models/database.php');
require ('../../models/news_feed/news_class.php');
require ('../../models/news_feed/news_db.php');


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
    
    $unpublish = 0;
    $publish = 1;
    //$archive = 2;
    
    $unpublishedNews = NewsDB::getNewsByStatus($unpublish);
    $publishedNews = NewsDB::getNewsByStatus($publish);
    //$archivedNews = NewsDB::getNewsByStatus($archive);
     
    include ('news_list.php');
  
    
// ---------------------------------------- //    
// ---------- Inserting Articles ---------- //
// ---------------------------------------- // 
    
} elseif ($action == 'add'){ //if add news article button is clicked
 
    include ('insert.php'); 
    
} elseif ($action == 'internal'){ //insert an internal news article
    
    $news_id = $_POST['news_id'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $author = $_POST['author'];
    $other_url = $_POST['other_url']; 
    $feature_img = $_POST['feature_img'];
    $banner_img = $_POST['banner_img'];
    $description = $_POST['description'];
    $article = $_POST['article']; 
    $type = $_POST['type'];
    $publish = $_POST['publish'];
    
    $news = new NewsClass($title, $date, $author, null, $other_url, $feature_img, $banner_img, $description, $article, $type, $publish);
    $addNews = NewsDB::insertNews($news);
    
    include ('news_list.php');
    
} elseif ($action == 'external'){ //insert an external news article
    
    $news_id = $_POST['news_id'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $author = $_POST['author'];
    $story_url = $_POST['story_url']; 
    $feature_img = $_POST['feature_img'];
    $description = $_POST['description']; 
    $type = $_POST['type'];
    $publish = $_POST['publish'];
    
    $news = new NewsClass($title, $date, $author, $story_url, null, $feature_img, null, $description, null, $type, $publish);
    $addNews = NewsDB::insertNews($news);
    
    include ('news_list.php');
    
    
// ------------------------------------------------------ //    
// ---------- Publishing and Unpublishing News ---------- //
// ------------------------------------------------------ //   
    
} elseif ($action == 'publish') { //if publish button is clicked beside article
    
    $news_id = $_POST['news_id'];
    $publishSelected = NewsDB::getNewsByID($news_id);
    
    include ('confirm.php');
    
} elseif ($action == 'yesPublish'){ //if user confirms yes to publish article
   
    $news_id = $_POST['news_id']; 
    $publish = 1;
    NewsDB::publishNews($news_id, $publish);
    
    include ('news_list.php');
    
} elseif ($action == 'unpublish') { //if UNpublish button is clicked beside article
    
    $news_id = $_POST['news_id'];
    $unpublishSelected = NewsDB::getNewsByID($news_id);
    
    include ('confirm.php');
    
} elseif ($action == 'yesUnpublish'){ //if user confirms yes to unpublish article
    
    $news_id = $_POST['news_id']; 
    $publish = 0;
    NewsDB::publishNews($news_id, $publish);
    
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
    $date = $_POST['date'];
    $author = $_POST['author'];
    $other_url = $_POST['other_url']; 
    $feature_img = $_POST['feature_img'];
    $banner_img = $_POST['banner_img'];
    $description = $_POST['description']; 
    $article = $_POST['article'];
    $type = $_POST['type'];
    $publish = $_POST['publish'];
    
    NewsDB::updateNews($news_id, $title, $date, $author, null, $other_url, $feature_img, $banner_img, $description, $article, $type, $publish);
    
    include ('news_list.php');
    
} elseif ($action == 'updateExternal') { //if the update button is clicked for an external article
    
    $news_id = $_POST['news_id'];
    $title = $_POST['title'];
    $date = $_POST['date'];
    $author = $_POST['author'];
    $story_url = $_POST['story_url']; 
    $feature_img = $_POST['feature_img'];
    $description = $_POST['description'];  
    $type = $_POST['type'];
    $publish = $_POST['publish'];
    
    NewsDB::updateNews($news_id, $title, $date, $author, $story_url, null, $feature_img, null, $description, null, $type, $publish);
    
    include ('news_list.php');
    
    
// --------------------------------------- //  
// ---------- Deleting Articles ---------- //
// --------------------------------------- //  
    
} elseif ($action == 'yesDelete'){ //if user confirms yes to delete article
    
    $news_id = $_POST['news_id']; 
    var_dump($news_id);
    NewsDB::deleteNews($news_id); 
    
    include ('news_list.php');
    
}