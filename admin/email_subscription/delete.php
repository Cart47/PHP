<?php 

    include ('../../config.php');
    include ('../../components/cms_header.php'); 
    include ('../../components/cms_left_menu.php');

    //Forces a redirect through the index
    if(!isset($selected['email'])){
        header('Location: ../email_subscription'); 

    }

?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title></title>
	</head>
	<body>
        
        <!-- Main Content Area -->
        <div id="main">
        
            <h2>Are you sure you want to delete <em><?php echo $selected['email']; ?></em></h2>
        
            <form action="." method="post" id="delete_email">
                
                <input type="hidden" name="email_id" value="<?php echo $selected['email_id']; ?>" />
                <input type="hidden" name="action" class="btn" value="yes" />
                <input type="submit" name="yes" class="btn" value="Yes" />
                <a href="." class="btn xtra-pad">No</a>
                
            </form>
            
        </div><!-- end main -->
	</body>
</html>

 <?php include ('../../components/cms_footer.php'); ?>