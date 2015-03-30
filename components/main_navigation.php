<div id="navBar">
   <a href="../Home/Index.php" id="citfLogo">Chorus in the Forest</a> 
    <div id="logIn">

        <ul>
           <?php

             if(isset($_SESSION["UserFullName"]))
                {
                 //Still need to build the kill session 
                echo '<li>Welcome, ' . $_SESSION["UserFullName"] . '</li><li><a href="../admin/Home/index.php">Admin</a></li><li><a href"#">Logout</a></li>';
                }
            elseif ($verified == "Invalid User Name "){
                echo '<li style="color:#fff;">Invalid User Name</li>';
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
            <li><a href="#">Camping</a></li>
            <li><a href="#">Lineup</a></li>
            <li><a href="#">Festival Info</a></li>
            <li><a href="#">Get Involved</a></li>
            <li><a href="#">Store</a></li>
            <li><a href="#">Contact</a></li>
            <li><a href="#">Donate</a></li>
        </ul>
    </nav>
    
</div><!-- end navBar -->