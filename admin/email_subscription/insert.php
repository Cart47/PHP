<?php 

    include ('../components/cms_header.php'); 
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
        
            <h1>New Subscriber</h1>
            
            <form action="." method="post" id="add_subscriber">
            
                <input type="hidden" name="email_id" />
                
                <label class="label">Name:</label>
                <div class="clear"></div>
                <input type="text" class="textbox" name="name" size="40" /><span class="required">*</span>

                <div class="clear"></div>

                <label class="label">Email:</label>
                <div class="clear"></div>
                <input type="text" class="textbox" name="email" size="40" /><span class="required">*</span>

                <div class="clear"></div>

                <input type='radio' class='radio' name='approved' value='1' /> Approved
                <input type='radio' class='radio' name='approved' value='0' /> Pending
                <span class="required">*</span>

                <div class="clear"></div>

                <input type="hidden" name="action" value="insert" />
                <input type="submit" name="submit" value="Add New" class="btn" />
                <a href="." class="btn xtra-pad">Cancel</a>

            </form>
            
        </div><!-- end main -->
	</body>
</html>

<?php include ('../components/cms_footer.php'); ?>