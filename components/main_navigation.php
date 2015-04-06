<div id="navBar">
   <a href="../Home/Index.php" id="citfLogo">Chorus in the Forest</a> 
    <div id="logIn">

        <ul>
           <?php

            if (isset($_SESSION["UserFullName"]))
            {
                if ($_SESSION["UserFullName"] == "BadLogin"){
                    echo '<li>Invalid Username or Password</li>&nbsp;&nbsp;<li><a id="modal_trigger" href="#modal">Login | Register</a></li>';
                }
                elseif ($_SESSION['UserFullName'] == "BadRegistration")
                {
                    echo '<li>This Username or Password already exists</li>&nbsp;&nbsp;<li><a id="modal_trigger" href="#modal">Login | Register</a></li>';
                }
                
                else 
                {
                     //Still need to build the kill session 
                    echo '<li>Welcome, ' . $_SESSION["UserFullName"] . '</li>';
                    if($_SESSION['RoleID'] != 1){ 
                        echo '<li><a href="../admin/Home/index.php">Admin</a></li>';
                        }
                        
                     echo '<li><a href="../components/logout.php">Logout</a></li>';
                }
            }
            else
            {
                echo '<li><a id="modal_trigger" href="#modal">Login | Register</a></li>';
            }
            ?>
        </ul>

    </div><!-- end logIn -->
    
    <div id="hamburger">
        <i class="fa fa-bars"></i>
    </div>
    
    <nav id="nav">
        <ul>
            <li><a href="#">Tickets</a></li>
            <li><a href="#">Schedule</a></li>
            <li><a href="../browse_artist/index.php">Lineup</a></li>
            <li><a href="#">Camping</a></li>
            <li><a href="#">Get Involved</a></li>
            <li><a href="#">Store</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Donate</a></li>
        </ul>
    </nav>
    
</div><!-- end navBar -->