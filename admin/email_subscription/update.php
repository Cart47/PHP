<?php 
require_once ('../../config.php');
include ('../components/cms_header.php'); 

//Forces a redirect through the index
if($_SESSION['RoleID'] != 2){
 
  echo  '<script type="text/javascript"> window.location.href ="../../Home/Index.php"; </script>';
}

//Forces a redirect through the index
if(!isset($emailByID)){
    header('Location: ../email_subscription'); 
}

?>
    
<h1>Edit Subscriber</h1>

<form action="." method="post" id="subscribe">

    <input type="hidden" name="email_id" value="<?php echo $emailByID['email_id']; ?>" />

    <input type="text" name="name" class="textbox" size="40" value="<?php echo $emailByID['name']; ?>"/><span class="required">*</span>

    <div class="clear"></div>

    <input type="text" name="email" class="textbox" size="40" value="<?php echo $emailByID['email']; ?>" /><span class="required">*</span>

    <div class="clear"></div>

    <?php 

        $options = array(1 => 'Approved', 0 => 'Pending');  

        //Loops through each array item and adds to radio button list
        foreach($options as $key => $value){

            if($emailByID['approved'] == $key){

                echo "<input type='radio' class='radio' name='approved' value='" . $key . "' checked />" . $value;

            } else {

                echo "<input type='radio' class='radio' name='approved' value='" . $key . "' />" . $value;

            }                           
        }              

    ?>

    <br /><br />

    <input type="hidden" name="action" value="update" />
    <input type="submit" name="submit" class="btn" value="Update" />

    <a href="." class="btn xtra-pad">Cancel</a>

</form>
        
<?php include ('../components/cms_footer.php'); ?>