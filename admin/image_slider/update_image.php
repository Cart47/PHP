<?php
include ( '../components/cms_header.php');
//session_start();
//GETTING SESSION START ERROR BUT WHEN REMOVED DON"T HAVE ACCESS TO MY SESSION VARIABLES

    $links = $_SESSION['links'];
    $img_root = "http://".$_SERVER['HTTP_HOST'] . "/";       
    $image = $img_root . $current_img['img_url'];

?>
<head>
    <title>Update Image</title>
    <link rel="stylesheet" type="text/css" href="admin_styles.css" />
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
    <input type="text" name="img_title" value="<?php echo $current_img['img_title']; ?>"> </input>
    
    <label> Link: </label>
    <select name="img_links">
                <?php
                    foreach ($links as $link_url => $link_name){ 
                        $sel = '';
                        if($current_img['img_link']== $link_url){$sel = "selected";}           
                            echo '<option'. $sel .'value="' . $link_url .'">' . $link_name . '</option>';
                    } 
                ?>
    </select>  
        <input type="hidden" name="action" value="commit_image_update">
        <input type="submit" name="commit_image_update" value="Save">
        <input type="submit" name="cancel" value="Cancel" formaction="index.php">
</form>