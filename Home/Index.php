<?php 

if(!isset($_SESSION)) { session_start();}
    require_once ('../config.php');
    include ("../components/main_header.php"); 

?> 

<div id="slider">
    <?php include_once("../image_slider/slider.php"); ?>
</div>

<div id="newsfeed">
    
    <h2 id="news-title"></h2>

    <div class="article-grid">
        <?php include_once('../news_feed/articles.php'); ?>
    </div><!-- end article grid -->
    
</div><!-- end newsfeed -->

<div id="social">
    
    <?php include('../components/social.php'); ?>
    
</div>

<?php include('../components/main_footer.php'); ?>