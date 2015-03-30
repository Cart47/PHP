<?php if(!isset($_SESSION)) { session_start(); } ?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8" />
    <title>CITF Admin</title>
    <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="../../css/Reset.css">
    <link rel="stylesheet" href="../../css/font-awesome-4.3.0/css/font-awesome.css">
    <link rel="stylesheet" href="../../css/cms.css">
</head>

<body>
    <div id="header-container">


        <div id="citf">Chorus in the Forest</div>

        <ul id="cms-top-nav">
            <li><a href="."><i class="fa fa-home"></i>CMS Home</a>
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
            <a class="left-mnu-itm" href="">
                <i class="fa fa-caret-right fa-lg"></i> Tickets
            </a>
            <a class="left-mnu-itm" href="">
                <i class="fa fa-caret-right fa-lg"></i> Accomodations
            </a>
            <a class="left-mnu-itm" href="">
                <i class="fa fa-caret-right fa-lg"></i> Lineup
            </a>
            <a class="left-mnu-itm" href="">
                <i class="fa fa-caret-right fa-lg"></i> Festival Info</a>
            <a class="left-mnu-itm" href="">
                <i class="fa fa-caret-right fa-lg"></i> Get Involved</a>
            <a class="left-mnu-itm" href="">
                <i class="fa fa-caret-right fa-lg"></i> Shop
            </a>
            <a class="left-mnu-itm" href="">
                <i class="fa fa-caret-right fa-lg"></i> Contact
            </a>
        </div>
        <div class="left-menu">
            <a class="left-mnu-itm" href="">
                <i class="fa fa fa-picture-o fa-lg"></i> Homepage Slider</a>
            <a class="left-mnu-itm" href="">
                <i class="fa fa-newspaper-o fa-lg"></i> News
            </a>
            <a class="left-mnu-itm" href="">
                <i class="fa fa-heart fa-lg"></i> Donations
            </a>
            <a class="left-mnu-itm" href="../email_subscription/index.php">
                <i class="fa fa fa-envelope-o fa-lg"></i> Email Subscribers</a>
            <a class="left-mnu-itm" href="">
                <i class="fa fa-users fa-lg"></i> Users
            </a>
        </div>
    </div>
