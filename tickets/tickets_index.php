<?php

require_once '../models/tickets/customerClass.php';
require_once '../models/tickets/customer.php';
require_once '../models/database.php';

if (isset($_POST['action'])) {
    $action = $_POST['action'];
} else if (isset($_GET['action'])) {
    $action = $_GET['action'];
} else {
    $action = 'ticket_type';
}

if($action == 'ticket_type'){
    include 'ticket_type.php';
}

if($action == 'ticket_checkout'){
    include 'ticket_checkout.php';
}
