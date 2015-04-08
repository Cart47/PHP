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
<title>Chorus in the Forest News</title>
<description>Stay informed with the latest news...</description>
<link>http://chorusintheforest.ca</link>
';

foreach ($article as $item) {

	//Print each record as an item
	echo '<item>
	<title>' . htmlentities($item->getTitle()) . '</title>
    <description>' . htmlentities($item->getDesc()) . '</description>
    <pubDate>' . date($item->getDatePublished()) . '</pubDate>';
    //If Type is 0, it is an internal article, get article link by id
    if($item->getType() == 0){
        echo '<link type="internal">http://' . $_SERVER['HTTP_HOST'] . '/PHP/news_feed/read_article.php?id=' . $item->getNewsID() . '</link>';
    //If Type is 1, it is an external article, get story url
    } elseif ($item->getType() == 1){
        echo '<link type="external">' . $item->getStoryURL() . '</link>';
    }
    echo '</item>';
}

//Close the channel and rss element
echo '</channel>
</rss>
';