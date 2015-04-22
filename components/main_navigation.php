<div id="navBar" class="clearfix">
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
                    echo '<li>Welcome, ' . $_SESSION["UserFullName"] . '</li>';
                    if($_SESSION['RoleID'] == 2){ 
                        echo '<li><a href="../admin/Home/index.php">Admin</a></li>';
                        }
                    else {
                          echo '<li><a href="../admin/role_manager/edit_user.php">Profile</a></li>';  
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
    
    <nav id="nav" class="clearfix">
        <ul>
            <li><a href="../tickets/tickets_index.php">Tickets</a></li>
            <li><a href="#">Schedule</a></li>
            <li><a href="../browse_artist/index.php">Lineup</a></li>
            <li><a href="#">Camping</a></li>
            <li><a href="../volunteering/index.php">Get Involved</a></li>
            <li><a href="#">Store</a></li>
            <li><a href="#">Contact</a></li>
        </ul>
    </nav>
    
</div><!-- end navBar -->