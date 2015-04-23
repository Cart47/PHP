<?php

require ('../../models/database.php');
require ('../../models/news_feed/news_class.php');
require ('../../models/news_feed/news_db.php');
require ('../../models/validation/field_classes.php');
require ('../../models/validation/validation_class.php');

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
 
    $type = 0;
    
    include ('insert.php'); 
    
} elseif ($action == 'insertNews'){ //insert an internal news article
    
    //Posted values
    $news_id = $_POST['news_id'];
    $title = $_POST['title'];
    $date_created = $_POST['date_created'];
    $author = $_POST['author'];
    $story_url = (isset($_POST['story_url']) ? $_POST['story_url'] : '');
    $other_url = (isset($_POST['other_url']) ? $_POST['other_url'] : ''); 
    $description = $_POST['description'];
    $article = (isset($_POST['article']) ? $_POST['article'] : '');
    $type = $_POST['type'];
    $publish = $_POST['publish'];
    
    // ----- Validation ----- //

    //Creates an object from Validation class
    $validate = new Validation();

    //Creates a new fieldsArray
    $fields = $validate->getFields();

    //Adds the following field objects to the fieldsArray
    $fields->addField('title');
    $fields->addField('author');
    $fields->addField('description');
    $fields->addField('article');
    $fields->addField('story_url');   

    //Assigns required validation to fields
    $validate->required('title', $title);
    $validate->required('author', $author);
    $validate->required('description', $description);
    
    if($type != 1){
        $validate->required('article', $article);
    }else{
        $validate->required('story_url', $story_url);
    }

    //If there are no errors
    if(!$fields->hasErrors()){

        //Create new instance of the NewsClass
        $news = new NewsClass($title, $date_created, null, $author, $story_url, $other_url, $description, $article, $type, $publish);

        //Call to Insert
        $addNews = NewsDB::insertNews($news);
      
        getNewsList();
        include ('news_list.php');
        
    }else{
        
        include ('insert.php');   
    }

    
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
    
} elseif ($action == 'updateNews') { //if the update button is clicked for an internal article
    
    $news_id = $_POST['news_id'];
    $title = $_POST['title'];
    $date_created = $_POST['date_created'];
    $date_published = $_POST['date_published'];
    $author = $_POST['author'];
    $story_url = (isset($_POST['story_url']) ? $_POST['story_url'] : '');
    $other_url = (isset($_POST['other_url']) ? $_POST['other_url'] : '');
    $description = $_POST['description']; 
    $article = (isset($_POST['article']) ? $_POST['article'] : '');
    $type = $_POST['type'];
    $publish = $_POST['publish'];
    
    NewsDB::updateNews($news_id, $title, $date_created, $date_published, $author, $story_url, $other_url, $description, $article, $type, $publish);
    
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
