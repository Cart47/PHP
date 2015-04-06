<?php 

if(!isset($_SESSION)) { session_start();}
    require_once ('../config.php');
    include ("../components/main_header.php"); 

?> 

<div id="slider">
    <?php include_once("../image_slider/slider.php"); ?>
</div>

<?php //include_once("../components/main_content.php"); ?>

<div id="newsfeed" class="clearfix">
    <h2>What's New?</h2>
    <?php include_once('../news_feed/articles.php'); ?>
</div>

<?php include("../components/main_footer.php");

?>