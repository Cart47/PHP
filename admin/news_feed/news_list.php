<!DOCTYPE html>

<?php 

//Forces a redirect through the index
if(!isset($pendingNews) && !isset($publishedNews)){
    header('Location: ../cms/'); 
    
}

?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <h2>Unpublished Articles</h2>
        
        <table>
            
            <th>Title</th>
            <th>Author</th>
            <th>Date Created</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Publish</th>
        
            <?php foreach ($unpublishedNews as $unpublished) {

               echo 
               '<tr>
                    <td>' . $unpublished->getTitle() . '</td>
                    <td>' . $unpublished->getAuthor() . '</td>
                    <td>' . $unpublished->getDate() . '</td>
                    <td>
                        <form action="." method="post" id="editArticle">                            
                            <input type="hidden" name="news_id" value="' . $unpublished->getNewsID() . '" />
                            <input type="hidden" name="action" value="edit" />
                            <button type="submit" class="link-btn">Edit</button> 
                        </form>
                    </td>
                    <td>
                        <form action="." method="post" id="deleteArticle">                            
                            <input type="hidden" name="news_id" value="' . $unpublished->getNewsID() . '" />
                            <input type="hidden" name="action" value="delete" />
                            <button type="submit" class="link-btn">Delete</button>                      
                        </form>
                    </td>
                    <td>
                        <form action="." method="post" id="publishArticle">                            
                            <input type="hidden" name="news_id" value="' . $unpublished->getNewsID() . '" />
                            <input type="hidden" name="action" value="publish" />
                            <button type="submit" class="link-btn">Publish</button>                      
                        </form>
                    </td>
                </tr>';             
            }

            ?>
            
        </table>
            
        <h2>Published Articles</h2>

        <table>
            
            <th>Title</th>
            <th>Author</th>
            <th>Date Created</th>
            <th>Edit</th>
            <th>Delete</th>
            <th>Publish</th>
        
            <?php foreach ($publishedNews as $published) {

               echo 
               '<tr>
                    <td>' . $published->getTitle() . '</td>
                    <td>' . $published->getAuthor() . '</td>
                    <td>' . $published->getDate() . '</td>
                    <td>
                        <form action="." method="post" id="editArticle">                            
                            <input type="hidden" name="news_id" value="' . $published->getNewsID() . '" />
                            <input type="hidden" name="action" value="edit" />
                            <button type="submit" class="link-btn">Edit</button>                            
                        </form>
                    </td>
                    <td>
                        <form action="." method="post" id="deleteArticle">                            
                            <input type="hidden" name="news_id" value="' . $published->getNewsID() . '" />
                            <input type="hidden" name="action" value="delete" />
                            <button type="submit" class="link-btn">Delete</button>                               
                        </form>
                    </td>
                    <td>
                        <form action="." method="post" id="unpublishArticle">                            
                            <input type="hidden" name="news_id" value="' . $unpublished->getNewsID() . '" />
                            <input type="hidden" name="action" value="unpublish" />
                            <button type="submit" class="link-btn">Unpublish</button>                      
                        </form>
                    </td>
                </tr>';             
            }

            ?>
            
        </table>
        
        <br /><br />
        
        <form action="." method="post" id="insert_news">
            <input type="hidden" name="action" value="add" />
            <input type="submit" name="add" value="Add a Subscriber" /> 
        </form>
        
    </body>
</html>