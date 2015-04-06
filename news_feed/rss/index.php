<?php 

require ('../../models/database.php');
require ('../../models/news_feed/news_class.php');
require ('../../models/news_feed/news_db.php');

$article = NewsDB::getAllNews();

//Content-type header
header('Content-type: text/xml'); 

// Create the initial RSS code
echo '<?xml version="1.0" encoding="utf-8"?>
<rss version="2.0">
<channel>
<title></title>
<author></author>
<description></description>
';

foreach ($article as $item) {

	//Print each record as an item
	echo '<item>
	<title><a href="' . $_SERVER['HTTP_HOST'] . '/PHP/news_feed/read_article.php?id=' . $item->getNewsID() . '">' . htmlentities($item->getTitle()) . '</a></title>
    <description>' . htmlentities($item->getDesc()) . '</description>
    <pubDate>' . date($item->getDatePublished()) . '</pubDate>
	</item>
	';
}

//Close the channel and rss element
echo '</channel>
</rss>
';