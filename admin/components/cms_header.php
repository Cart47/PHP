<?php if(!isset($_SESSION)) { session_start(); } ?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <title>CITF Admin</title>
    
    <!-- Stylesheets -->
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../../css/Reset.css">
    <link rel="stylesheet" href="../../css/font-awesome-4.3.0/css/font-awesome.css">
    <link rel="stylesheet" href="../../css/cms.css">
    
    <!-- Javascript -->
    <script src="../../js/jquery-2.1.3.js"></script>
    <script src="../../js/news_forms.js"></script>
</head>

<body>
    <div id="header-container">


        <div id="citf"><a href="../Home/">Chorus in the Forest</a></div>

        <ul id="cms-top-nav">
            <li><a href="."><i class="fa fa-home"></i>CMS</a>
            </li>
            <li><a href="../../Home/Index.php"><i class="fa fa-external-link"></i>Visit Site</a>
            </li>
        </ul>

        <a id="signout" href="">Sign Out</a>

        <div id="user">
            <p>Welcome,
                <em>
               <?php
                if(isset($_SESSION['UserFullName'])){
                    echo $_SESSION['UserFullName'];
                } else {
                    echo "Unknown";   
                }
                
                ?>
           </em>
            </p>
        </div>

    </div>
    <div id="left-col-menu">
        <div class="left-menu">
            
            <!-- Users -->
            <a class="left-mnu-itm" href="../role_manager/index.php"><i class="fa fa-users fa-lg"></i>Users</a>
            
            <!-- Tickets -->
            <a class="left-mnu-itm" href=""><i class="fa fa-ticket fa-lg"></i>Tickets</a>
            
            <!-- Camping -->
            <a class="left-mnu-itm" href=""><i class="fa fa-bed fa-lg"></i>Camping</a>
            
            <!-- Lineup -->
            <a class="left-mnu-itm" href=""><i class="fa fa-music fa-lg"></i>Lineup</a>
            
            <!-- Schedule -->
            <a class="left-mnu-itm" href=""><i class="fa fa-clock-o fa-lg"></i>Festival Schedule</a>
            
            <!-- Voluteer -->
            <a class="left-mnu-itm" href=""><i class="fa fa-smile-o fa-lg"></i>Volunteer</a>
            
            <!-- Store -->
            <a class="left-mnu-itm" href=""><i class="fa fa-shopping-cart fa-lg"></i>Store</a>
            
            <!-- Homepage Slider -->
            <a class="left-mnu-itm" href=""><i class="fa fa fa-picture-o fa-lg"></i>Homepage Slider</a>
            
            <!-- News -->
            <a class="left-mnu-itm" href="../news_feed/"><i class="fa fa-newspaper-o fa-lg"></i>News</a>
            
            <!-- Donations -->
            <a class="left-mnu-itm" href=""><i class="fa fa-heart fa-lg"></i>Donations</a>
            
            <!-- Email Subscriptions -->
            <a class="left-mnu-itm" href="../email_subscription/"><i class="fa fa fa-envelope-o fa-lg"></i>Email Subscribers</a>
            
            <!-- Contact -->
            <a class="left-mnu-itm" href=""><i class="fa fa-phone fa-lg"></i>Contact</a>
            
        </div>
    </div>
    
    <!-- Main Content Area -->
    <div id="main">
