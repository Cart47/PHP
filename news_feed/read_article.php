<?php

include ("../components/main_header.php");
require ('../models/database.php');
require ('../models/news_feed/news_class.php');
require ('../models/news_feed/news_db.php');

if (isset($_GET['id'])) {
    $news_id = $_GET['id'];
} else {
    header('Location: ../Home');   
}

$thisArticle = NewsDB::getNewsByID($news_id);

//if the article does not exist (is null), show error page
if ($thisArticle == null){
    include ('error.php'); 
}

    echo '<div class="article-details">';
    echo '<h1>' . $thisArticle['title'] . '</h1>';

    $date = strtotime($thisArticle['date_published']);
    echo '<p class="date">By ' . $thisArticle['author'] . ' on ' . date('F j, Y', $date) . '</p>';
    
    echo '<p class="article-text">' . $thisArticle['article'] . '</p>';

    if($thisArticle['other_url'] != null){
        echo '<p><a class="link" href="' . $thisArticle['other_url'] . '">Click Here</a> for more information.</p>';
    }
    
    echo '</div>';

include("../components/main_footer.php"); 

?>