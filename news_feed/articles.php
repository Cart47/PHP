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
       
       echo '<div class="article-block">';
       echo '<h3><a href="' . htmlentities($item->link) . '">' . ($item->title) . '</a></h3>';
       echo htmlentities(date('F j, Y', $date)) . '<br />';
       echo '<p>' . htmlentities($item->description) . '</p>';
       echo '</div>';
       $count++;
   }
}
