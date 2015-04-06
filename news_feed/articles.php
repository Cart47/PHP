<?php

require ('../models/news_feed/news_class.php');
require ('../models/news_feed/news_db.php');


$rssfeed = array();
$rssfeed['CITF'] = 'http://localhost/PHP/news_feed/rss';

$count = 0;
//Loop through and process each defined feed
foreach($rssfeed AS $name=>$url) {
   $rssParser = simplexml_load_file($url);

   //Ouput each article
   foreach ($rssParser->channel->item AS $item) {
       
       //Limit of 6 articles displayed on homepage
       if($count == 5 ) {
            break;
       }
       
       $date = strtotime($item->pubDate);
       
       //Article block
       echo '<div class="article-block">';
       
           //content inside of article block
           echo '<div class="article-content">';
               echo '<h3>' . ($item->title) . '</h3>';
               echo '<p class="date"><em>' . htmlentities(date('F j, Y', $date)) . '</em></p>';
               echo '<p>' . htmlentities($item->description) . '</p>';
           echo '</div>';
       
           //Read more button
           echo '<a class="more" href="' . htmlentities($item->link) . '">Read More<i class="fa fa-angle-double-right fa-lg"></i></a>';
       
       echo '</div>';
       $count++;
   }
}
