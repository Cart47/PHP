<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
   
            <p>Edit Article</p>
            
            <!-- If the article clicked is an INTERNAL article, display the following form -->
            <?php if($newsByID['type'] == 0) : ?>
            
                <form action="." method="post" id="editInternal">

                    <input type="hidden" name="news_id" value="<?php echo $newsByID['news_id']; ?>" />
                    <input type="hidden" name="type" value="0" />
                    <input type="hidden" name="date" value="<?php echo $newsByID['date']; ?>" />

                    <label>Title:</label>
                    <input type="text" name="title" value="<?php echo $newsByID['title']; ?>"/>

                    <br /><br />

                    <label>Author:</label>
                    <input type="text" name="author" value="<?php echo $newsByID['author']; ?>" />

                    <br /><br />

                    <label>For more information:</label>
                    <input type="text" id="other_url" name="other_url" value="<?php echo $newsByID['other_url']; ?>" />

                    <br /><br />

                    <label>Feature Image:</label>
                    <input type="text" name="feature_img" value="<?php echo $newsByID['feature_img']; ?>" />

                    <br /><br />

                    <label>Banner Image:</label>
                    <input type="text" class="banner_img" name="banner_img" value="<?php echo $newsByID['banner_img']; ?>" />

                    <br /><br />

                    <label>Description:</label>
                    <textarea name="description" rows="2" cols="50"><?php echo $newsByID['description']; ?></textarea>

                    <br /><br />

                    <label>Article:</label>
                    <textarea name="article" class="article" rows="5" cols="50"><?php echo $newsByID['article']; ?></textarea>

                    <br /><br />

                    <?php 

                        $options = array(0 => 'Unpublish', 1 => 'Publish');  

                        //Loops through each array item and adds to radio button list
                        foreach($options as $key => $value){

                            if($newsByID['publish'] == $key){

                                echo "<label for='" . $value . "'><input type='radio' id='" . $value . "' name='publish' value='" . $key . "' checked />" . $value . "<br />";

                            } else {

                                echo "<label for='" . $value . "'><input type='radio' id='" . $value . "' name='publish' value='" . $key . "' />" . $value . "<br />";

                            }                           
                        }              

                    ?>

                    <br /><br />

                    <input type="hidden" name="action" value="updateInternal" />
                    <input type="submit" name="submit" value="Update" />
                    <a href="." class="btn">Cancel</a>
                    
                </form>
            
            <!-- If the article clicked is an EXTERNAL article, display the following form -->
            <?php else : ?>
            
                <form action="." method="post" id="editExternal">

                    <input type="hidden" name="news_id" value="<?php echo $newsByID['news_id']; ?>" />
                    <input type="hidden" name="type" value="1" />
                    <input type="hidden" name="date" value="<?php echo $newsByID['date']; ?>" />

                    <label>Title:</label>
                    <input type="text" name="title" value="<?php echo $newsByID['title']; ?>"/>

                    <br /><br />

                    <label>Author:</label>
                    <input type="text" name="author" value="<?php echo $newsByID['author']; ?>" />

                    <br /><br />

                    <label>Article Link:</label>
                    <input type="text" name="other_url" value="<?php echo $newsByID['story_url']; ?>" />

                    <br /><br />

                    <label>Feature Image:</label>
                    <input type="text" name="feature_img" value="<?php echo $newsByID['feature_img']; ?>" />

                    <br /><br />

                    <label>Description:</label>
                    <textarea name="description" rows="2" cols="50"><?php echo $newsByID['description']; ?></textarea>

                    <br /><br />

                    <?php 

                        $options = array(0 => 'Unpublish', 1 => 'Publish');  

                        //Loops through each array item and adds to radio button list
                        foreach($options as $key => $value){

                            if($newsByID['publish'] == $key){

                                echo "<label for='" . $value . "'><input type='radio' id='" . $value . "' name='publish' value='" . $key . "' checked />" . $value . "<br />";

                            } else {

                                echo "<label for='" . $value . "'><input type='radio' id='" . $value . "' name='publish' value='" . $key . "' />" . $value . "<br />";

                            }                           
                        }              

                    ?>

                    <br /><br />

                    <input type="hidden" name="action" value="updateExternal" />
                    <input type="submit" name="submit" value="Update" />
                    <a href="." class="btn">Cancel</a>

                </form>
   
            <?php endif; ?>
            
    </body>
</html>