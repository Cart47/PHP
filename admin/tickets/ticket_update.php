<?php
include ( '../components/cms_header.php');

?>

<head>
    <title>Update Ticket</title>
    <link rel="stylesheet" type="text/css" href="../../css/slider_admin_styles.css" />
</head>
<h1>Update <?php echo $current_tick['tick_type']; ?> </h1>

<form id="update_ticket_form" action="index.php" method="post">
    <input type="hidden" name="tick_id" value="<?php echo $current_tick['tick_id']; ?>">  

    <label> Ticket type: </label>
    <input class="textbox" type="text" name="tick_type" value="<?php echo $current_tick['tick_type']; ?>"> </input>
    
    <label> Price: </label>
    <input class="textbox" type="text" name="tick_price" value="<?php echo $current_tick['tick_price']; ?>"> </input>
<br/>
        <input type="hidden" name="action" value="commit_ticket_update">
        <input type="submit" name="commit_ticket_update" value="Save" class="btn">
        <a href="index.php" class="btn">Cancel</a>
</form>