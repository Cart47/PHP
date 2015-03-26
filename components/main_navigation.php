<div id="navMain">
    <div id="citfLogo">
        <h1>
            Chorus in the Forest
        </h1>
    </div>
    <ul id="links">
        <li><a href="#">Tickets</a></li>
        <li><a href="#">Accomodations</a></li>
        <li><a href="#">Lineup</a></li>
        <li><a href="#">Festival Info</a></li>
        <li><a href="#">Get Involved</a></li>
        <li><a href="#">Shop</a></li>
        <li><a href="#">Contact</a></li>
        <li><a href="#">Donate</a></li>
        
    </ul>
    <div id="logIn">
        <ul>
           <?php
            if(!isset($_SESSION["username"]))
                {
                echo '<li><a id="modal_trigger" href="#modal">Login | Register</a></li>';
                }
             if(isset($_SESSION["username"]))
                {
                echo '<li>Welcome, ' . $_SESSION["username"] . '<a href="./admin.php">Admin</a>&nbsp;&nbsp;<a href"#">Logout</a></li>';
                }


            ?>
        </ul>
    </div>
</div>