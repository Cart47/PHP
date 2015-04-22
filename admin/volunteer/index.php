<?php include_once('../components/cms_header.php'); 
//Forces a redirect through the index
if($_SESSION['RoleID'] != 2){
 
  echo  '<script type="text/javascript"> window.location.href ="../../Home/Index.php"; </script>';
}
include_once('../../models/database.php');
include_once('../../models/volunteer/volunteer_positions.php');

$request = Volunteer::getVolunteerRequests();

?>

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