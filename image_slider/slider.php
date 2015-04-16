<?php

require '../models/database.php';
require '../models/image_slider/images.php';
require '../models/image_slider/sliderClass.php';
?>
<head>
    <link rel="stylesheet" type="text/css" href="../css/slider_style.css" />
      
</head>
<body>
    <header>
        <div id="slider_wrap">
            <div id="slider">
                <ul>                          
                      <?php 
                      $images = Slider::getImages(); 
                      $count = 1;                      
                      foreach($images as $val){ 
                        echo "<li><a href='http://".$_SERVER['HTTP_HOST']."/{$val->getLink()}'><img id='{$count}' src='http://".$_SERVER['HTTP_HOST']."/{$val->getUrl()}'></img></a></li>";  
                      ++$count; }
                        ?>                         
                </ul>
            </div>
           <!--
            <a class="left" href="#" onclick="prev();return false;"><img src="images/arrow-left.png"></img></a>
            <a class="right" href="#" onclick="next();return false;"><img src="images/arrow-right.png"></img></a>
           -->
        </div><!--End slider wrap-->
       
    </header>
    <script type="text/javascript" src="../js/jquery-2.1.3.js"></script>
    <script type="text/javascript" src="../js/slider_script.js"> </script>
</body>