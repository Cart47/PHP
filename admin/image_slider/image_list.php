<?php
if (!isset($_SESSION)) { session_start();}
   
    include('../components/cms_header.php');
    require_once '../../models/image_slider/sliderClass.php';
    require_once '../../models/image_slider/images.php';
   

    
    $page1 = "PHP/tickets/ticket_index.php";
    $page2 = "PHP/performance_schedule/index.php";
    $page3 = "PHP/camping/index.php";
    $page4 = "PHP/lineup/views/artists.php";
    
    $name1 = "Tickets";
    $name2 = "Lineup";
    $name3 = "Camping";
    $name4 = "Artists";
    
    $links = array($page1=>$name1, $page2=>$name2, $page3=>$name3, $page4=>$name4);
  
    $_SESSION['links'] = $links;
    
  
?>
<head>
    <title>Slider Image List</title>
    <link rel="stylesheet" type="text/css" href="../../css/cms.css" />
    <link rel="stylesheet" type="text/css" href="../../css/slider_admin_styles.css" />
    
</head>
<h1>Image slider list</h1>
    <div >
        <table>
            <thead>
                <tr>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Link</th>
                </tr>
            </thead>
            <tbody>  
                <?php $images = Slider::getImages();
                //Change to display shortened link vs full url
                foreach($images as $image) : ?>
                    <tr>
                        <td><?php echo "<img class='image_list' src='http://".$_SERVER['HTTP_HOST']."/{$image->getUrl()}'/>"?></td>
                        <td><?php echo $image->getTitle()?></td>
                        <td><?php echo $image->getLink()?></td>
                        
                        <td><form id="update_image_button" action="index.php" method="post">                                           
                                <input type="hidden" name="img_id" value="<?php echo $image->getID()?>">                                
                                <input type="hidden" name="action" value="update">
                                <button type="submit" name="update_image" class="link-btn"><i class="fa fa-pencil fa-lg"></i></button>
                            </form>
                        </td>
                        <td><form id="delete_image_button" action="index.php" method="post">                                   
                              
                                <input type="hidden" name="image_id" 
                                       value="<?php echo $image->getID()?>">
                                <input type="hidden" name="action" value="delete">
                                  <button type="submit" class="link-btn" name="delete_img"><i class="fa fa-trash-o fa-lg"></i></button> 
                            </form>
                        </td>
                    </tr>
                <?php endforeach; 
                
                ?>
            </tbody>
        </table>
    </div> <!--end image_list-->
    
    <!--INSERT NEW IMAGE TO SLIDER-->
    <h2>Insert new image:</h2>
    <form id="add_image" action="index.php"  method="post" enctype="multipart/form-data">

        <input type="file" name="image" id="image"/>
        Title: 
        <input type="text" name="img_title" class="textbox"/>
        Link:
    <!--IF TIME MAKE LINKS DYNAMIC FROM CONTENT TABLE IN DB-->
        <select name="img_links" class="dropdown">
            <?php
                foreach ($links as $link_url => $link_name){    
                    echo '<option value="' . $link_url .'">' . $link_name . '</option>';
                } 
            ?>
        </select>
        <input type="hidden" name="action" value="insert">
        <button type="submit" class="btn" name="insert"><i class="fa fa-plus"></i>Add Image</button>

    </form> 
   
    <script type="text/javascript" src="../scripts/jquery-1.11.1.min.js"></script>
    <script type="text/javascript" src="../scripts/admin_scripts.js"> </script>

