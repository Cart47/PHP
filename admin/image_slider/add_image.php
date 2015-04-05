<h2>Insert new image:</h2>
        <form id="add_image" action="index.php"  method="post" enctype="multipart/form-data">
    
            <input type="file" name="image" id="image"/>
            Title: 
            <input type="text" name="img_title"/>
            Link:
        <!--IF TIME MAKE LINKS DYNAMIC FROM CONTENT TABLE IN DB-->
            <select name="img_links">
                <?php
                    foreach ($links as $link_url => $link_name){    
                        echo '<option value="' . $link_url .'">' . $link_name . '</option>';
                    } 
                ?>
            </select>
            <input type="submit" name="commit_insert" value="upload" />
    
        </form> 