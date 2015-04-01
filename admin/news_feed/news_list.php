<?php 

    require_once ('../../config.php');
    include ('../components/cms_header.php');

    //Forces a redirect through the index
    if(!isset($pendingNews) && !isset($publishedNews)){
        header('Location: ../news_feed/'); 
    
}

?>

<section id="modalPopUp">
    <?php 

    include_once('delete.php'); 
    include_once('publish.php'); 
    
    ?>
</section>

<h1>CITF News</h1>

<h3>Unpublished Articles</h3>

<table id="form_table">

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
                <form action="." method="post" class="editArticle">                            
                    <input type="hidden" name="news_id" value="' . $unpublished->getNewsID() . '" />
                    <input type="hidden" name="action" value="edit" />
                    <button type="submit" class="link-btn"><i class="fa fa-pencil fa-lg"></i></button>   
                </form>
            </td>
            <td>
                <form action="." method="post" class="deleteUnpublished">                            
                    <input type="hidden" name="news_id" id="unpub_news_id" value="' . $unpublished->getNewsID() . '" />
                    <input type="hidden" name="action" value="delete" />
                    <button type="submit" href="#modal_del" class="link-btn modal_trigger"><i class="fa fa-trash-o fa-lg"></i></button>                
                </form>
            </td>
            <td>
                <form action="." method="post" class="publishArticle">                            
                    <input type="hidden" name="news_id" id="publish_news_id" value="' . $unpublished->getNewsID() . '" />
                    <input type="hidden" name="action" value="publish" />
                    <button type="submit" href="#modal_pub" class="link-btn modal_trigger"><i class="fa fa-globe fa-lg"></i></button>                      
                </form>
            </td>
        </tr>';             
    }

    ?>

</table>

<h3>Published Articles</h3>

<table>

    <th>Title</th>
    <th>Author</th>
    <th>Date Created</th>
    <th>Edit</th>
    <th>Delete</th>
    <th>Unpublish</th>

    <?php foreach ($publishedNews as $published) {

       echo 
       '<tr>
            <td>' . $published->getTitle() . '</td>
            <td>' . $published->getAuthor() . '</td>
            <td>' . $published->getDate() . '</td>
            <td>
                <form action="." method="post" class="editArticle">                            
                    <input type="hidden" name="news_id" value="' . $published->getNewsID() . '" />
                    <input type="hidden" name="action" value="edit" />
                    <button type="submit" class="link-btn"><i class="fa fa-pencil fa-lg"></i></button>                            
                </form>
            </td>
            <td>
                <form action="." method="post" class="deletePublished">                            
                    <input type="hidden" name="news_id" id="pub_news_id" value="' . $published->getNewsID() . '" />
                    <input type="hidden" name="action" value="delete" />
                    <button type="submit" href="#modal" class="link-btn modal_trigger"><i class="fa fa-trash-o fa-lg"></i></button>    
                </form>
            </td>
            <td>
                <form action="." method="post" class="unpublishArticle">                            
                    <input type="hidden" name="news_id" value="' . $unpublished->getNewsID() . '" />
                    <input type="hidden" name="action" value="unpublish" />
                    <button type="submit" class="link-btn"><i class="fa fa-times-circle fa-lg"></i></button>                      
                </form>
            </td>
        </tr>';             
    }

    ?>

</table>

<form action="." method="post" id="insert_news">
    <input type="hidden" name="action" value="add" />
    <button type="submit" class="btn" name="submit"><i class="fa fa-plus"></i>New Article</button>
</form>
        
<?php include ('../components/cms_footer.php'); ?>