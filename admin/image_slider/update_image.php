<?php
include ( '../components/cms_header.php');
if(!isset($_SESSION)) { session_start();}


    $links = $_SESSION['links'];
    $img_root = "http://".$_SERVER['HTTP_HOST'] . "/";       
    $image = $img_root . $current_img['img_url'];

?>
<head>
    <title>Update Image</title>
    <link rel="stylesheet" type="text/css" href="../../css/slider_admin_styles.css" />
</head>
<h1>Update <?php echo $current_img['img_title']; ?> </h1>

<form id="update_image_form" action="index.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="img_id" value="<?php echo $current_img['img_id']; ?>">  
    
    <image class="image_list" src="<?php echo $image;?>"<image>
    <!--
    <label>Change Image: </label>
    <input type="file" name="up_image" id="image"/> 
    -->
    <label> Title: </label>
    <input class="textbox" type="text" name="img_title" value="<?php echo $current_img['img_title']; ?>"> </input>
    
    <label> Link: </label>
    <select name="img_links" class="dropdown">
        <!--NEED SELECTED VALUE TO DISPLAY AS DEFAULT-->
                <?php
                    foreach ($links as $link_url => $link_name){ 
                     //   $sel = '';
                      //  if($current_img['img_link']== $link_url){$sel = "selected";}           
                            echo '<option value="' . $link_url .'">' . $link_name . '</option>';
                    } 
                ?>
    </select>
<br/>
        <input type="hidden" name="action" value="commit_image_update">
        <input type="submit" name="commit_image_update" value="Save" class="btn">
        <input type="submit" name="cancel" value="Cancel" formaction="index.php" class="btn">
</form>