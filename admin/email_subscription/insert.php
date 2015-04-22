<?php 

    include ('../components/cms_header.php'); 

    //Forces a redirect through the index if not admin
    if($_SESSION['RoleID'] != 2){

      echo  '<script type="text/javascript"> window.location.href ="../../Home/Index.php"; </script>';
    }

?>

<h1>New Subscriber</h1>

<form action="." method="post" id="add_subscriber">

    <input type="hidden" name="email_id" />

    <!-- Name -->
    <label class="label">Name:</label>
    <div class="clear"></div>
    <input type="text" class="textbox" name="name" size="40" value="<?php echo isset($name) ? $name : '' ; ?>"/>
    <?php echo isset($fields) ? $fields->getField('name')->showErrors() : '' ; ?>

    <div class="clear"></div>

    <!-- Email -->
    <label class="label">Email:</label>
    <div class="clear"></div>
    <input type="text" class="textbox" name="email" size="40" value="<?php echo isset($email) ? $email : '' ; ?>"/>
    <?php echo isset($fields) ? $fields->getField('email')->showErrors() : '' ; ?>

    <div class="clear"></div>

    <!-- Approve Email -->
    <input type='radio' class='radio' name='approved' value='1' /> Approved
    <input type='radio' class='radio' name='approved' value='0' checked /> Pending

    <div class="clear"></div>

    <!-- Insert button that triggers the insert -->
    <input type="hidden" name="action" value="insert" />
    <input type="submit" name="submit" value="Add New" class="btn" />
    <a href="." class="btn xtra-pad">Cancel</a>

</form>

<?php include ('../components/cms_footer.php'); ?>