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
        
            <h1>Edit Subscriber</h1>
            
            <form action="." method="post" id="subscribe">

                <input type="hidden" name="email_id" value="<?php echo $emailByID['email_id']; ?>" />
            
                <input type="text" name="name" class="textbox" value="<?php echo $emailByID['name']; ?>"/>
                
                <div class="clear"></div>

                <input type="text" name="email" class="textbox" value="<?php echo $emailByID['email']; ?>" />

                <div class="clear"></div>
                
                <?php 

                    $options = array(1 => 'Approved', 0 => 'Pending');  

                    //Loops through each array item and adds to radio button list
                    foreach($options as $key => $value){

                        if($emailByID['approved'] == $key){

                            echo "<input type='radio' name='approved' value='" . $key . "' checked />" . $value;

                        } else {

                            echo "<input type='radio' name='approved' value='" . $key . "' />" . $value;

                        }                           
                    }              

                ?>

                <br /><br />

                <input type="hidden" name="action" value="update" />
                <input type="submit" name="submit" class="btn" value="Update" />

                <a href="." class="btn xtra-pad">Cancel</a>

            </form>
            
        </div><!-- end main -->
        
        <?php include ('../../components/cms_footer.php'); ?>
        
	</body>
</html>