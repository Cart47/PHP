<!-- PHP code will be placed here for intitial setups like titles etc -->
<?php
    
include_once('css/style.php');
    
?> 

<!DOCTYPE html>
<html>
 <head>
    <meta charset="UTF-8">
    <title>Chorus in the Forest Homepage</title>
    <meta name="author" content="name">
    <meta name="description" content="description here">
    <meta name="keywords" content="keywords,here">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="js/jquery-2.1.3.js" type="text/javascript"></script>
    <script src="js/jquery-ui.min.js" type="text/javascript"></script>
    <script src="js/jquery.leanModal.min.js" type="text/javascript"></script>
    
    
    <!-- Need to revisit to add in php that determines the associated styles needed and sources them out -->
    <link rel="stylesheet" href="http://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.min.css" />
    <link rel="stylesheet" href="css/Reset.css" type="text/css">
    <link rel="stylesheet" href="css/CITF-Main.css" type="text/css">
    <link rel="stylesheet" href="css/navigation.css" type="text/css">
    <?php
        new Stylesheet('contentMain', 'modalStyle');
    ?> 
 </head>
 <body>
    <?php
     if(isset($_POST['registrationSent'])){
    echo '<span style="color:white; font-size:40px">I will not eat Green Eggs </span>';
        }
    if(isset($_POST['loginSent'])){
    echo '<span style="color:white; font-size:40px">I will not eat them Sam I Am</span>';
        }

     ?>
     
	 <div id="container">
		<section id="modalPopUp">
		    <?php
                include_once('components/modal.php');
            ?>
		</section>
        
        <section>
            <header> 
                <div id="headMain">
                    <?php
                        include_once('components/main_header.php');
                    ?>
                 </div>
                 <nav>
                   <?php
                        include_once('components/main_navigation.php');
                    ?>
                 </nav>
             </header>
             <main>
                <?php
                    include_once('components/main_content.php');
                ?>
            </main>
            <footer>
                <?php
                    include_once('components/main_footer.php');
                ?>
            </footer>
        </section>	 
	 </div> <!-- closing div for container -->
	 
<!--   JS Scripts can go here -->
   <script src="js/stickyHeader.js" type="text/javascript"></script> 	
   <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.5.3/modernizr.min.js" type="text/javascript"></script>
    <script type="text/javascript" src="js/modalTrigger.js"> </script>
</body>
</html>
