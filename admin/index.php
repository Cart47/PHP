<!doctype html>
<html>
	<head>
		
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../css/Reset.css">
        <link rel="stylesheet" href="../css/font-awesome-4.3.0/css/font-awesome.css">
		<link rel="stylesheet" href="../css/cms.css">

		<meta charset="utf-8" />
		<title>CITF Admin</title>
	</head>
	<body>
        
        <?php 

            include ('../components/cms_header.php'); 
            include ('../components/cms_left_menu.php');

        ?>
        
        <!-- Main Content Area -->
        <div id="main">
            
            <h1>Heading 1</h1>
            <h2>Heading 2</h2>
            <h3>Heading 3</h3>
            
            <p>paragraph text...</p>
            <a href="">this is a hyperlink...</a>
            
            <form action="." method="post" id="insert_email">
                <input id="" type="submit" name="" class="btn" value="Sample Button"/>
                <input id="" type="submit" name="" class="link-btn" value="Sample Link Button"/>
            </form>
            
            <table>
                <th>head 1</th>
                <th>head 2</th>
                <th>head 3</th>
                <tr>
                    <td>content 1</td>
                    <td>content 2</td>
                    <td>content 3</td>
                    <td>
                        <input id="" type="submit" name="" class="link-btn" value="Edit"/> / 
                        <input id="" type="submit" name="" class="link-btn" value="Delete"/>
                    </td>
                </tr>
                <tr>
                    <td>content 1</td>
                    <td>content 2</td>
                    <td>content 3</td>
                    <td>
                        <input id="" type="submit" name="" class="link-btn" value="Edit"/> / 
                        <input id="" type="submit" name="" class="link-btn" value="Delete"/>
                    </td>
                </tr>
                <tr>
                    <td>content 1</td>
                    <td>content 2</td>
                    <td>content 3</td>
                    <td>
                        <input id="" type="submit" name="" class="link-btn" value="Edit"/> / 
                        <input id="" type="submit" name="" class="link-btn" value="Delete"/>
                    </td>
                </tr>
                <tr>
                    <td>content 1</td>
                    <td>content 2</td>
                    <td>content 3</td>
                    <td>
                        <input id="" type="submit" name="" class="link-btn" value="Edit"/> / 
                        <input id="" type="submit" name="" class="link-btn" value="Delete"/>
                    </td>
                </tr>
                <tr>
                    <td>content 1</td>
                    <td>content 2</td>
                    <td>content 3</td>
                    <td>
                        <input id="" type="submit" name="" class="link-btn" value="Edit"/> / 
                        <input id="" type="submit" name="" class="link-btn" value="Delete"/>
                    </td>
                </tr>
            
            </table>
            
            <input type="text" name="" value="" class="textbox" />
            
            
        
        </div><!-- end main -->
        
        <?php include ('../components/cms_footer.php'); ?>
        
	</body>
</html>