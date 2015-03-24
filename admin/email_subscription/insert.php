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
        
            <h1>Insert New Subscriber</h1>
            
            <form action="." method="post" id="subscribe">

                <input type="hidden" name="email_id" />

                <input type="text" name="name" placeholder="Your Name" value="" />
                

                <br /><br />

                <input type="text" name="email" placeholder="Your Email" value="" />
                

                <br /><br />

                <input type="submit" name="submit" value="Submit" />

            </form>
            
        </div><!-- end main -->
        
        <?php include ('../../components/cms_footer.php'); ?>
        
	</body>
</html>