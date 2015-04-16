<?php include_once('../components/cms_header.php'); 
include_once('../../models/database.php');

//including the Database call files for the Role Manager 
include_once('../../models/role_manager/users.php');
include_once('../../models/role_manager/role_manager.php');

if(isset($_POST['delete_user'])){
    $user_id = $_POST['delete_user'];
    $user_roleID = $_POST['user_roleID'];
    $user_role = $_POST['user_role'];
    Roles::deleteUser($user_id, $user_roleID, $user_role );
    unset($_POST);
}

$users = Roles::getRoles();
//Breaks up the users based on their role ID 
$individuals = array();
$administrators = array();
$volunteers = array();
$artists = array();
foreach($users as $u){
    if ($u->getRoleID() == 1) {$individuals[] = $u;}
    if ($u->getRoleID() == 2) {$administrators[] = $u;}
    if ($u->getRoleID() == 3) {$volunteers[] = $u;}
    if ($u->getRoleID() == 4) {$artists[] = $u;} 
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
                        <form action="./edit_user.php" method="post">
                            <input type="hidden" name="individualID" value="<?php echo $i->getindID() ?>" />
                            <input type="hidden" name="action" value="edit" />
                            <button type="submit" class="link-btn"><i class="fa fa-pencil fa-lg"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">
                                <input type="hidden" name="delete_user" value="<?php echo $i->getindID() ?>" />
                                <input type="hidden" name="user_roleID" value="<?php echo $i->getRoleID() ?>" />
                                <input type="hidden" name="action" value="delete" />
                                <button type="submit" class="link-btn"><i class="fa fa-trash-o fa-lg"></i></button>
                        </form>
                    </td>
                    </tr>
                    </form>
         <?php  } ?>   
        </table>      
    <?php if (!empty($administrators)){ ?>  
    <br/>
    <h2>Administrators</h2>
        <table>
            <thead>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Administrative Position</th>
                <th>Administrative Position Description</th>
                <th>Edit Admin</th>
                <th>Delete Admin</th>
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
                    <td>
                        <?php echo $a->getAdminDescription()  ?>    
                    </td>
                    <td>
                        <form action="./edit_user.php" method="post">
                            <input type="hidden" name="individualID" value="<?php echo $a->getindID() ?>" />
                            <input type="hidden" name="action" value="edit" />
                            <button type="submit" class="link-btn"><i class="fa fa-pencil fa-lg"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">
                                <input type="hidden" name="delete_user" value="<?php echo $a->getindID() ?>" />
                                <input type="hidden" name="user_roleID" value="<?php echo $a->getRoleID() ?>" />
                                <input type="hidden" name="user_role" value="<?php echo $a->getAdminID() ?>" />
                                <input type="hidden" name="action" value="delete" />
                                <button type="submit" class="link-btn"><i class="fa fa-trash-o fa-lg"></i></button>
                        </form>
                    </td>
                </tr>
        <?php  } ?>   
        </table>      
    <?php } if (!empty($artists)){ ?>  
    <br/>
    <h2>Artists</h2>
        <table>
            <thead>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Band Name</th>
                <th>Genre</th>
                <th>Edit Artist</th>
                <th>Delete Artist</th>
            </thead>
            <?php foreach($artists as $art){ ?>
                 <tr>
                    <td> 
                        <?php echo $art->getIndFName() ?>
                    </td>
                    <td>
                        <?php echo $art->getIndLName()  ?>
                    </td>
                    <td>
                        <?php echo $art->getUsername() ?>
                    </td>
                    <td>
                        <?php echo $art->getIndEmail() ?>
                    </td>
                    <td>
                        <?php echo $art->getArtBandName()  ?>    
                    </td>
                    <td>
                        <?php echo $art->getArtGenre()  ?>    
                    </td>
                    <td>
                        <form action="./edit_user.php" method="post">
                            <input type="hidden" name="individualID" value="<?php echo $art->getindID() ?>" />
                            <input type="hidden" name="action" value="edit" />
                            <button type="submit" class="link-btn"><i class="fa fa-pencil fa-lg"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">
                                <input type="hidden" name="delete_user" value="<?php echo $art->getindID() ?>" />
                                <input type="hidden" name="user_roleID" value="<?php echo $art->getRoleID() ?>" />
                                <input type="hidden" name="user_role" value="<?php echo $art->getArtistID() ?>" />
                                <input type="hidden" name="action" value="delete" />
                                <button type="submit" class="link-btn"><i class="fa fa-trash-o fa-lg"></i></button>
                        </form>
                    </td>
                </tr>
                <?php } ?>
        </table>      
    <?php } if (!empty($volunteers)){ ?>        
    <br/>
    <h2>Volunteers</h2>
        <table>
            <thead>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Username</th>
                <th>Email</th>
                <th>Volunteer Role</th>
                <th>Volunteer Position Description</th>
                <th>Edit Volunteer</th>
                <th>Delete Volunteer</th>
            </thead>
            <?php foreach($volunteers as $v){ ?>
                 <tr>
                    <td> 
                        <?php echo $v->getIndFName() ?>
                    </td>
                    <td>
                        <?php echo $v->getIndLName()  ?>
                    </td>
                    <td>
                        <?php echo $v->getUsername() ?>
                    </td>
                    <td>
                        <?php echo $v->getIndEmail() ?>
                    </td>
                    <td>
                        <?php echo $v->getVolPosition()  ?>    
                    </td>
                    <td>
                        <?php echo $v->getVolDescription()  ?>    
                    </td>
                    <td>
                        <form action="./edit_user.php" method="post">
                            <input type="hidden" name="individualID" value="<?php echo $v->getindID() ?>" />
                            <input type="hidden" name="action" value="edit" />
                            <button type="submit" class="link-btn"><i class="fa fa-pencil fa-lg"></i></button>
                        </form>
                    </td>
                    <td>
                        <form action="." method="post">
                                <input type="hidden" name="delete_user" value="<?php echo $v->getindID() ?>" />
                                <input type="hidden" name="user_roleID" value="<?php echo $v->getRoleID() ?>" />
                                <input type="hidden" name="user_role" value="<?php echo $v->getVolunteerID() ?>" />
                                <input type="hidden" name="action" value="delete" />
                                <button type="submit" class="link-btn"><i class="fa fa-trash-o fa-lg"></i></button>
                        </form>
                    </td>
                      <?php } ?>
                </tr> 
        </table>      
    <?php } ?>


<?php include ( '../components/cms_footer.php'); ?>