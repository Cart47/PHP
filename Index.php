<!-- PHP code will be placed here for intitial setups like titles etc -->


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
    
    <!-- Need to revisit to add in php that determines the associated styles needed and sources them out -->
    <link rel="stylesheet" href="css/Reset.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/CITF-Main.css" type="text/css">
    <?php
        include_once('css/style.php');
        new Stylesheet('contentMain');
    ?> 
 </head>
 <body>
	 <div id="container">
		<section id="modalPopUp">
		    <?php
                include_once('components/modal.php');
            ?>
		</section>
        
        <main>
            <header> 
                <div id="headMain">
                    <?php
                        include_once('components/HeaderMain.php');
                    ?>
                 </div>
                 <nav>
                   <?php
                        include_once('components/NavigationMain.php');
                    ?>
                 </nav>
             </header>
             <main>
                <?php
                    include_once('components/mainContent.php');
                ?>
            </main>
            <footer>
                <?php
                    include_once('components/FooterMain.php');
                ?>
            </footer>
        </main>	 
	 </div> <!-- closing div for container -->
	 
<!--   JS Scripts can go here -->
      <script type="text/javascript">
        $("#modal_trigger").leanModal({top : 200, overlay : 0.6, closeButton: ".modal_close" });

        $(function(){
            // Calling Login Form
            $("#login_form").click(function(){
                $(".social_login").hide();
                $(".user_login").show();
                return false;
            });

            // Calling Register Form
            $("#register_form").click(function(){
                $(".social_login").hide();
                $(".user_register").show();
                $(".header_title").text('Register');
                return false;
            });

            // Going back to Social Forms
            $(".back_btn").click(function(){
                $(".user_login").hide();
                $(".user_register").hide();
                $(".social_login").show();
                $(".header_title").text('Login');
                return false;
            });

        })
    </script>
   <script src="js/stickyHeader.js" type="text/javascript"></script> 	
   <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.5.3/modernizr.min.js" type="text/javascript"></script>
</body>
</html>
