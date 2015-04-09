<?php

require ('../models/news_feed/news_class.php');
require ('../models/news_feed/news_db.php');

$article = NewsDB::getHomepageNews();

foreach ($article as $item) {

        $date = strtotime($item->getDatePublished());
       
        //Article block
        echo '<div class="article-block">';
    
            //content inside of article block
            echo '<div class="article-content">';
                echo '<h3>' . $item->getTitle() . '</h3>';
                echo '<p class="date"><em>' . date('F j, Y', $date) . '</em></p>';
                echo '<p>' . $item->getDesc() . '</p>';
            echo '</div>';

           //Read more button based on internal or external article
           if($item->getType() == 0) {
               echo '<a class="more" href="http://' . $_SERVER['HTTP_HOST'] . '/news_feed/read_article.php?id=' . $item->getNewsID() . '">Read More<i class="fa fa-angle-double-right fa-lg"></i></a>';
           } elseif($item->getType() == 1) {
               echo '<a class="more" href="' . $item->getStoryURL() . '" target="_blank">Read More<i class="fa fa-external-link"></i></a>';
           }
       
       echo '</div>';
}