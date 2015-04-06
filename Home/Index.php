<?php 

if(!isset($_SESSION)) { session_start();}
    require_once ('../config.php');
    include ("../components/main_header.php"); 

?> 

<div id="slider">
    <?php include_once("../image_slider/slider.php"); ?>
</div>

<?php //include_once("../components/main_content.php"); ?>
<div id="newsfeed">
    
    <h2>What's New?<a href="http://localhost/PHP/news_feed/rss" target="_blank"><i class="fa fa-rss-square fa-lg"></i></a></h2>

    <div class="article-grid">
        <?php include_once('../news_feed/articles.php'); ?>
    </div><!-- end article grid -->
    
</div><!-- end newsfeed -->

<?php include("../components/main_footer.php");

?>