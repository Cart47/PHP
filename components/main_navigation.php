<div id="navMain">
   <a href="../Index.php">
       <div id="citfLogo">
            <h1>
                Chorus in the Forest
            </h1>
        </div>
    </a> 
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
          
             if(isset($_SESSION["UserFullName"]))
                {
                 //Still need to build the kill session 
                echo '<li><a href"#">Logout</a></li><li><a href="./admin/index.php">Admin</a></li><li style="color:#fff;">Welcome, ' . $_SESSION["UserFullName"] . '</li>';
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
    </div>
</div>