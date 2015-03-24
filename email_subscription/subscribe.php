<form action="." method="post" id="subscribe">

    <h3>Subscribe to our newsletter!</h3>

    <input type="hidden" name="email_id" />

    <input type="text" name="name" placeholder="Your Name" value="<?php echo $name; ?>" />
    <?php echo $fields->getField('name')->showErrors();?>

    <br /><br />

    <input type="text" name="email" placeholder="Your Email" value="<?php echo $email; ?>" />
    <?php echo $fields->getField('email')->showErrors();?>

    <br /><br />

    <input type="submit" name="submit" value="Submit" />

</form>