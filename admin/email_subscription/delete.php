<!doctype html>
<html>
	<head>
		
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../../css/Reset.css">
        <link rel="stylesheet" href="../../css/font-awesome-4.3.0/css/font-awesome.css">
		<link rel="stylesheet" href="../../css/cms.css">

		<meta charset="utf-8" />
		<title></title>
	</head>
	<body>
        
        <?php 

            include ('../../components/cms_header.php'); 
            include ('../../components/cms_left_menu.php');             

        ?>
        
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
        
        <?php include ('../../components/cms_footer.php'); ?>
        
	</body>
</html>