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
        
            <h1>New Subscriber</h1>
            
            <form action="." method="post" id="add_subscriber">
            
                <input type="hidden" name="email_id" />

                <input type="text" class="textbox" name="name" size="40" />

                <br /><br />

                <input type="text" class="textbox" name="email" size="40" />

                <br /><br />

                <input type='radio' name='approved' value='1'  /> Approved
                <input type='radio' name='approved' value='0' checked /> Pending

                <br /><br />

                <input type="hidden" name="action" value="insert" />
                <input type="submit" name="submit" value="Add New" class="btn" />
                <a href="." class="btn xtra-pad">Cancel</a>

            </form>
            
        </div><!-- end main -->
        
        <?php include ('../../components/cms_footer.php'); ?>
        
	</body>
</html>