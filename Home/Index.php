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

    <div id="icons">
        <h2 id="connect-title">Connect with CITF</h2>
        <img class="social-icon" src="../img/social/facebook.png" alt="Facebook"/>
        <img class="social-icon" src="../img/social/twitter.png" alt="Twitter"/>
        <img class="social-icon" src="../img/social/flickr.png" alt="Flickr"/>
        <img class="social-icon" src="../img/social/youtube.png" alt="Youtube"/>
        <img class="social-icon" src="../img/social/rss.png" alt="RSS"/>
    </div>
</div>

<?php include("../components/main_footer.php");

?>