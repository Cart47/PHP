<?php 

    include ('../components/cms_header.php'); 
    include ('../components/cms_left_menu.php');

?>

<!doctype html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>CITF Admin</title>
	</head>
	<body>
        
        <!-- Main Content Area -->
        <div id="main">
            
            <!-- Text-based Styles -->
            <h1>Heading 1</h1>
            <h2>Heading 2</h2>
            <h3>Heading 3</h3>
            
            <p>this is paragraph text...</p>
            <a href="">this is a hyperlink...</a>
            
            
            <!-- Buttons -->
            <form action="." method="post" id="insert_email">
                <input type="submit" name="" class="btn" value="Sample Button"/>
                <button type="submit" class="btn" name="add"><i class="fa fa-plus"></i>Button with Icon</button>
                <input type="submit" name="" class="link-btn" value="Sample Link Button"/>
            </form>
            
            <!-- Table Styling -->
            <table>
                <th>head 1</th>
                <th>head 2</th>
                <th>head 3</th>
                <th>Edit</th>
                <th>Delete</th>
                <tr>
                    <td>content 1</td>
                    <td>content 2</td>
                    <td>content 3</td>
                    <!-- Edit Button -->
                    <td><button type="submit" class="link-btn"><i class="fa fa-pencil fa-lg"></i></button></td>
                    <!-- Delete Button -->
                    <td><button type="submit" class="link-btn"><i class="fa fa-trash-o fa-lg"></i></button></td>
                </tr>
                <tr>
                    <td>content 1</td>
                    <td>content 2</td>
                    <td>content 3</td>
                    <td><button type="submit" class="link-btn"><i class="fa fa-pencil fa-lg"></i></button></td>
                    <td><button type="submit" class="link-btn"><i class="fa fa-trash-o fa-lg"></i></button></td>
                </tr>
                <tr>
                    <td>content 1</td>
                    <td>content 2</td>
                    <td>content 3</td>
                    <td><button type="submit" class="link-btn"><i class="fa fa-pencil fa-lg"></i></button></td>
                    <td><button type="submit" class="link-btn"><i class="fa fa-trash-o fa-lg"></i></button></td>
                </tr>
            </table>
            
            <!-- Form Elements -->
            <input type="text" name="" value="" class="textbox" size="40" />
            
            <!-- Include if required field -->
            <span class="required">*</span>
            
            <!-- Good to use instead of a <br /> tag -->
            <div class="clear"></div>
            
            <select class="dropdown">
                <option>Option 1</option>
                <option>Option 2</option>
                <option>Option 3</option>
            </select>
            
            <div class="clear"></div>
            
            <input class="radio" type='radio' name='approved' value='1' checked /> Option 1
            <input class="radio" type='radio' name='approved' value='0' /> Option 2
            
            
        </div><!-- end main -->
        
        <?php include ('../components/cms_footer.php'); ?>
        
	</body>
</html>