<?php

include ("../components/main_header.php");
require ('../models/news_feed/news_class.php');
require ('../models/news_feed/news_db.php');

if (isset($_GET['id'])) {
    $news_id = $_GET['id'];
} else {
    header('Location: ../Home');   
}

$thisArticle = NewsDB::getNewsByID($news_id);

//if the article does not exist (is null), show error page
if ($thisArticle == null){
    echo 'ERROR'; 
}

?>
<main>

<div id="article">
    
    <h1><?php echo $thisArticle['title']; ?></h1>
    
    
</div>

</main>
<?php include("../components/main_footer.php"); ?>