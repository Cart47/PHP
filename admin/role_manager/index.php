<?php include_once('../components/cms_header.php'); 
include_once('../../models/database.php');

//including the Database call files for the Role Manager 
include_once('../../models/role_manager/users.php');
include_once('../../models/role_manager/role_manager.php');

if(isset($_POST['delete_user'])){
    $user_id = $_POST['delete_user'];
    Roles::deleteUser($user_id);
}

$users = Roles::getRoles();
//Breaks up the users based on their role ID 
$individuals = array();
$administrators = array();
$volunteers = array();
$artists = array();
foreach($users as $u){
    if ($u->getRole() == 1) {$individuals[] = $u;}
    if ($u->getRole() == 2) {$administrators[] = $u;}
    if ($u->getRole() == 3) {$volunteers[] = $u;}
    if ($u->getRole() == 4) {$artists[] = $u;} 
}
?>
    <h1>Role Manager</h1>
    <br/>
    <h2>Individuals</h2>
        <table>
            <thead>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>User Role</th>
                <th>Edit User</th>
                <th>Delete User</th>
            </thead>
            <?php 
                foreach($individuals as $i){ ?>
                <tr>
                    <td>
                        <?php echo $i->getIndFName() ?>
                    </td>
                    <td>
                        <?php echo $i->getIndLName()  ?>
                    </td>
                    <td>
                        <?php echo $i->getUsername() ?>
                    </td>
                    <td>
                        <?php echo $i->getIndEmail() ?>
                    </td>
                    <td>
                       Individual
                    </td>
                    <td>
                        <form action="." method="post">
                            <input type="hidden" name="email_id" value="<?php echo $i->getLogID() ?>" />
                            <input type="hidden" name="action" value="edit" />
                            <button type="submit" class="link-btn"><i class="fa fa-pencil fa-lg"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">
                                <input type="hidden" name="delete_user" value="<?php echo $i->getLogID() ?>" />
                                <input type="hidden" name="action" value="delete" />
                                <button type="submit" class="link-btn" onclick="confirm('Are you sure you would like to delete this member?');"><i class="fa fa-trash-o fa-lg"></i></button>
                        </form>
                    </td>
                    </tr>
                    </form>
         <?php  } ?>   
        </table>      
    <?php if (!empty($administrators)){ ?>  
    <br/>
    <h2>Administrators</h2>
    <form action="." method="post">
        <table>
            <thead>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Administrative Role</th>
            </thead>
            <?php 
                foreach($administrators as $a){ ?>
                <tr>
                    <td> 
                        <?php echo $a->getIndFName() ?>
                    </td>
                    <td>
                        <?php echo $a->getIndLName()  ?>
                    </td>
                    <td>
                        <?php echo $a->getUsername() ?>
                    </td>
                    <td>
                        <?php echo $a->getIndEmail() ?>
                    </td>
                    <td>
                        <?php echo $a->getAdminPosition()  ?>    
                    </td>
                </tr>
        <?php  } ?>   
        </table>      
    </form>
    <?php } if (!empty($artists)){ ?>  
    <br/>
    <h2>Artists</h2>
    <form action="." method="post">
        <table>
            <thead>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>User Role</th>
            </thead>
            <?php 
                foreach($artists as $art){
                echo '<tr><td>' .
                            $art->getIndFName() 
                    . '</td><td>' .
                             $art->getIndLName()  
                    . '</td><td>' .
                             $art->getUsername() 
                    . '</td><td>' .
                              $art->getIndEmail()
                    . '</td><td>Artist</td></tr>';
            }
            ?>   
        </table>      
    </form>
    <?php } if (!empty($volunteers)){ ?>        
    <br/>
    <h2>Volunteers</h2>
    <form action="." method="post">
        <table>
            <thead>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>User Role</th>
            </thead>
            <?php 
                foreach($volunteers as $v){
                echo '<tr><td>' .
                            $v->getIndFName() 
                    . '</td><td>' .
                             $v->getIndLName()  
                    . '</td><td>' .
                             $v->getUsername() 
                    . '</td><td>' .
                              $v->getIndEmail()
                    . '</td><td>Volunteer</td></tr>';
            }
            ?>   
        </table>      
    </form>
    <?php } ?>


<?php include ( '../components/cms_footer.php'); ?>