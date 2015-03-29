<?php

//the path is used for finding models and other files in the project
//returns /Applications/XAMPP/xamppfiles/htdocs/PHP/
$path = $_SERVER['DOCUMENT_ROOT'] . '/PHP/';


//the absolute path is used for linking scripts and stylesheets
// returns http://localhost/PHP/
$Gen = '/PHP/';
$Ian = '/PHP/PHP/';
$Matt = '/PHP/';


$server = $_SERVER['HTTP_HOST'];
$absolute = 'http://' . $server . $Gen;