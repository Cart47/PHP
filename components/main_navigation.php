<div id="navMain">
   <a href="./Index.php" id="citfLogo">Chorus in the Forest</a> 
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
    <div id="logIn">
        <ul>
           <?php
          
             if(isset($_SESSION["UserFullName"]))
                {
                 //Still need to build the kill session 
                echo '<li><a href"#">Logout</a></li><li><a href="./admin/index.php">Admin</a></li>
                      <li>Welcome, ' . $_SESSION["UserFullName"] . '</li>';
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