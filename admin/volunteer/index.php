<?php include_once('../components/cms_header.php'); 
//Forces a redirect through the index
if($_SESSION['RoleID'] != 2){
 
  echo  '<script type="text/javascript"> window.location.href ="../../Home/Index.php"; </script>';
}
include_once('../../models/database.php');
include_once('../../models/volunteer/volunteer_positions.php');

if(isset($_POST['addNew'])){
    $name = $_POST['volunteer_position_name'];
    $description = $_POST['volunteer_position_description'];
    $insert = Volunteer::insertNewPosition($name, $description);
}
$positions = Volunteer::getVolunteerPosition();
$request = Volunteer::getVolunteerRequests();

?>
<table>
    <tr>
        <td>
            <h3>Insert a New Volunteer Position</h3>
                <form action="./index.php" method="post" style="vertical-align: middle;">
                    <label for="volunteer_position" >Volunteer Position:</label>&nbsp;
                    <input name="volunteer_position_name" type="text" id="volunteer_position" class="textbox" />
                    <br/>
                    <label for="volunteer_description" >Volunteer Position:</label>&nbsp;
                    <textarea style="resize:none; width:300px;height:150px;"  name="volunteer_position_description" id="volunteer_description" class="textarea"></textarea><br/><br/>
                    <input type="submit" name="addNew" value="Add New Position" class="link-btn" />
                </form>
            </td>
            <td>
               <h3>Record of all Positions</h3>
                <?php  
                    foreach($positions as $p){
                    echo $p['vol_position'] . '<br/> ';  

                  } ?>
            </td>
        </tr>
    </table>
<br/>
<br/>
<h2>The Following People would like the Opportunity to Volunteer for the Following Positions </h2>
        <table>
            <thead>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Position Requested</th>
                <th>Change Role</th>
            </thead>
            <?php 
                foreach($request as $r){ ?>
                <tr>
                    <td>
                        <?php echo $r['FirstName'] ?>
                    </td>
                    <td>
                        <?php echo $r['LastName']  ?>
                    </td>
                    <td>
                        <?php echo $r['Position'] ?>
                    </td>
                    <td>
                        <form action="../role_manager/edit_user.php" method="post">
                            <input type="hidden" name="individualID" value="<?php echo $r['indID']; ?>" />
                            <input type="hidden" name="action" value="edit" />
                            <button type="submit" class="link-btn"><i class="fa fa-user fa-lg"></i></button>
                        </form>
                    </td>   
                 </tr>
            <?php  } ?>
              




<?php include ( '../components/cms_footer.php'); ?>