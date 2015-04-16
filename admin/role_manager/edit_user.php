<?php include_once('../components/cms_header.php'); 
include_once('../../models/database.php');

//including the Database call files for the Role Manager 
include_once('../../models/role_manager/users.php');
include_once('../../models/role_manager/role_manager.php');
require_once('../../models/browse_artist/artist_db.php');

$userID = $_POST;
if(isset($userID['edit'])){
    Roles::EditUserRole($userID);
    unset($userID);
    $prompt = '<script>alert("Successfully Updated");</script>';
}

if(isset($_POST['individualID'])){
    $ind_ID = $_POST['individualID'];
} else {
    $ind_ID = $_SESSION['Individual_ID'];   
}

$user = Roles::getUserRoles($ind_ID);
$genres = ArtistDB::getGenres();

?>

<!---------  BASE Role Manager ---------->


<h1>Role Manager</h1>
    <br/>
    <h2>Edit&nbsp;<?php echo $user->getRole() . " - " . $user->getIndFName() . " " . $user->getIndLName(); ?></h2>
    <form action="./edit_user.php" method="post" id="edit_user">
       <input type="hidden" value="<?php echo $user->getIndID(); ?>" name="individualID" />
       <input type="hidden" value="<?php echo $user->getRoleID(); ?>" name="old_roleID" />
       <input type="hidden" value="<?php echo $user->getLogID(); ?>" name="loginID" />
        <table>
        <?php if($user->getRoleID() == 2){ ?>
            <tr>
                <td>
                   <label>Role:</label><br/>
                        <input type="radio" name="roleID" value="1" <?php if($user->getRoleID() == 1){echo 'checked';}if($user->getRoleID() != 1){echo ' disabled';} ?> />Individual
                        <input type="radio" name="roleID" value="2" <?php if($user->getRoleID() == 2){echo 'checked';}if($user->getRoleID() != 1){echo ' disabled';} ?> />Administrator 
                        <input type="radio" name="roleID" value="4" <?php if($user->getRoleID() == 4){echo 'checked';}if($user->getRoleID() != 1){echo ' disabled';} ?> />Artist
                        <input type="radio" name="roleID" value="3" <?php if($user->getRoleID() == 3){echo 'checked';}if($user->getRoleID() != 1){echo ' disabled';} ?> />Volunteer
                        <br/><br/>
                </td>
            </tr>
        <?php  } ?>
            <tr>   
                <td <?php if ($user->getRoleID() != 1){ echo 'style="border-right:2px black solid;"';} ?> >
                    <br/>
                    <label>First Name:</label><br/>
                    <input class="textbox"  type="text" name="fname" value="<?php echo $user->getIndFName() ?>" required/><br/><br/>

                    <label>Last Name:</label><br/>
                    <input class="textbox"  type="text" name="lname" value="<?php echo $user->getIndLName() ?>" required/><br/><br/>

                    <label>Username:</Label><br/>
                    <input class="textbox"  type="text" name="username" value="<?php echo $user->getUsername() ?>" required/><br/><br/>

                    <label>Email:</label><br/>
                    <input class="textbox"  type="text" name="email" value="<?php echo $user->getIndEmail() ?>" required/><br/><br/>
                <td>
                <td>
              <!------------ Administrator Edit Form    -->  
                <?php  if($user->getRoleID() == 2){ ?>
                    <input type="hidden" value="<?php echo $user->getAdminID() ?>" name="adminID" />
                    <label>Administrator Position:</label><br/>
                    <input class="textbox"  type="text" name="admin_position" value="<?php echo $user->getAdminPosition() ?>" required/><br/><br/>
                    
                    <label>Administrator Description:</label><br/>
                    <textarea class="textarea"  name="admin_description" data-parsley-trigger="keyup" data-parsley-maxlength="300" data-parsley-validation-threshold="10" required><?php echo $user->getAdminDescription() ?></textarea><br/><br/>
                <?php } ?>
                
              <!------------ Artist Edit Form    --> 
                <?php  if($user->getRoleID() == 4){ ?>
                   <input type="hidden" value="<?php echo $user->getArtistID() ?>" name="artistID" />
                    <label>Band Name:</label><br/>
                    <input class="textbox" name="band_name" value="<?php echo $user->getArtBandName() ?>" required/><br/><br/>
                    
                    <table style="margin:0;">
                        <tr>
                            <td style="padding:0;">
                                <label>Artist First Name:</label><br/>
                                <input class="textbox" name="artist_fname" value="<?php echo $user->getArtFName() ?>" required/>
                            </td>
                            <td>
                                <label>Artist Last Name:</label><br/>
                                <input class="textbox" name="artist_lname" value="<?php echo $user->getArtLName() ?>" required/><br/><br/>
                            </td>
                        </tr>
                    </table>
                    
                    <label>Band Genre:</label><br/>
                     <select name="ArtGenre">
                       <?php foreach($genres as $genre) { ?>
                            <option value="<?php echo $genre; ?>" 
                                <?php if($user->getArtGenre() == $genre){echo 'selected';}?> >
                                <?php echo $genre; ?>
                            </option>
                            <br/>
                       <?php } ?>
                    </select><br/><br/>
                      <label>Or enter a new Genre</label><br/>
                      <input class="textbox"  type="text" name="otherGenre"/>
                    <br/><br/>
                    <label>Band Members:</label><br/>
                    <textarea class="textarea"  type="text" name="band_members" required><?php echo $user->getArtMembers() ?></textarea><br/><br/>
                    <br/><br/>
                    <label>Band Description:</label><br/>
                    <textarea class="textarea"  type="text" name="band_description" data-parsley-trigger="keyup" data-parsley-maxlength="300" data-parsley-validation-threshold="10" required><?php echo $user->getArtDescription() ?></textarea><br/><br/>
                <?php } ?>
                
                <!------------ Volunteer Edit Form    -->  
                <?php  if($user->getRoleID() == 3){ ?>
                   <input type="hidden" value="<?php echo $user->getVolunteerID() ?>" name="volunteerID" />
                    <label>Volunteer Position:</label><br/>
                    <input class="textbox"  type="text" name="vol_position" value="<?php echo $user->getVolPosition() ?>" required/><br/><br/>
                    
                    <label>Volunteer Description:</label><br/>
                    <textarea class="textarea"  name="vol_description" data-parsley-trigger="keyup" data-parsley-maxlength="300" data-parsley-validation-threshold="10" required><?php echo $user->getVolDescription() ?></textarea><br/><br/>
                <?php } ?>
                
                </td>
            </tr>
            <tr>
                <td>
                    <input type=hidden value="<?php echo $user->getindID(); ?>" name="indID" />
                     <input class="btn xtra-pad" type="submit" name="edit" value="<?php if ($user->getRoleID() == 1){echo "Update User";}else { echo "Edit";}?>" />
                     <?php if($user->getRoleID() == 2){
                   echo  '<a href="." class="btn xtra-pad">Back</a>';
} ?>
                </td>
            </tr>
           
        </form>
    </table>
<?php if(isset($prompt)){echo $prompt;} ?>    
<?php include ( '../components/cms_footer.php'); ?>