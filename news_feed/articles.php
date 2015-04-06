<?php

require ('../models/news_feed/news_class.php');
require ('../models/news_feed/news_db.php');

/* Define some RSS 2.0 and other compatible feeds */
$rssfeed = array();

$rssfeed['CITF'] = 'http://localhost/PHP/news_feed/rss';


/* Loop through and process each defined feed */
foreach($rssfeed AS $name=>$url) {
   $rssParser = simplexml_load_file($url);

   /* Iterate through the items, and output each one */
   foreach ($rssParser->channel->item AS $item) {
      echo '<a href="' . htmlentities($item->link) . '">' . ($item->title) . '</a>';
			echo htmlentities($item->description) . '<br />';
			echo htmlentities($item->pubDate) . '<br />';
   }
      echo '</ul>';
}
