<?php include_once('../components/cms_header.php'); 
include_once('../../models/database.php');

//including the Database call files for the Role Manager 
include_once('../../models/role_manager/users.php');
include_once('../../models/role_manager/role_manager.php');
require_once('../../models/browse_artist/artist_db.php');
$user = Roles::getUserRoles($_POST['edit_user']);
$genres = ArtistDB::getGenres();
?>

<!---------  BASE Role Manager ---------->

<h1>Role Manager</h1>
    <br/>
    <h2>Edit&nbsp;<?php echo $user->getRole() . " - " . $user->getIndFName() . " " . $user->getIndLName(); ?></h2>
    <form action="<?php if ($user->getRoleID() == 1){echo "./edit_user.php"; }else{echo ".";}  ?> " method="post">
       <input type="hidden" value="<?php echo $user->getIndID(); ?>" name="edit_user" />
        <table>
            <tr>
                <td>
                   <label>Role:</label><br/>
                        <input type="radio" name="role" value="1" <?php if($user->getRoleID() == 1){echo 'checked';}if($user->getRoleID() != 1){echo ' disabled';} ?> />Individual
                        <input type="radio" name="role" value="2" <?php if($user->getRoleID() == 2){echo 'checked';}if($user->getRoleID() != 1){echo ' disabled';} ?> />Administrator 
                        <input type="radio" name="role" value="4" <?php if($user->getRoleID() == 4){echo 'checked';}if($user->getRoleID() != 1){echo ' disabled';} ?> />Artist
                        <input type="radio" name="role" value="3" <?php if($user->getRoleID() == 3){echo 'checked';}if($user->getRoleID() != 1){echo ' disabled';} ?> />Volunteer
                        <br/><br/>
                </td>
            </tr>
            <tr>   
                <td <?php if ($user->getRoleID() != 1){ echo 'style="border-right:2px black solid;"';} ?> >
                    <br/>
                    <label>First Name:</label><br/>
                    <input class="textbox"  type="text" name="fname" value="<?php echo $user->getIndFName() ?>"/><br/><br/>

                    <label>Last Name:</label><br/>
                    <input class="textbox"  type="text" name="lname" value="<?php echo $user->getIndLName() ?>"/><br/><br/>

                    <label>Username:</Label><br/>
                    <input class="textbox"  type="text" name="username" value="<?php echo $user->getUsername() ?>" /><br/><br/>

                    <label>Email:</label><br/>
                    <input class="textbox"  type="text" name="email" value="<?php echo $user->getIndEmail() ?>"/><br/><br/>
                <td>
                <td>
              <!------------ Administrator Edit Form    -->  
                <?php  if($user->getRoleID() == 2){ ?>
                    <label>Administrator Position:</label><br/>
                    <input class="textbox"  type="text" name="fname" value="<?php echo $user->getAdminPosition() ?>"/><br/><br/>
                    
                    <label>Administrator Description:</label><br/>
                    <textarea class="textarea"  name="admin_description"><?php echo $user->getAdminDescription() ?></textarea><br/><br/>
                <?php } ?>
              <!------------ Artist Edit Form    --> 
                <?php  if($user->getRoleID() == 4){ ?>
                    <label>Band Name:</label><br/>
                    <input class="textbox" name="band_name" value="<?php echo $user->getArtBandName() ?>"/><br/><br/>
                    
                    <table style="margin:0;">
                        <tr>
                            <td style="padding:0;">
                                <label>Artist First Name:</label><br/>
                                <input class="textbox" name="artist_lname" value="<?php echo $user->getArtFName() ?>"/>
                            </td>
                            <td>
                                <label>Artist Last Name:</label><br/>
                                <input class="textbox" name="artist_lname" value="<?php echo $user->getArtLName() ?>"/><br/><br/>
                            </td>
                        </tr>
                    </table>
                    
                    <label>Band Genre:</label><br/>
                     <select onchange="this.form.submit()" name="Select_a_Genre">
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
                    <label>Band Description:</label><br/>
                    <textarea class="textarea"  type="text" name="band_description"><?php echo $user->getArtDescription() ?></textarea><br/><br/>
                <?php } ?>
                </td>
            </tr>
            <tr>
                <td>
                     <input class="btn xtra-pad" type="submit" name="edit" value="<?php if ($user->getRoleID() == 1){echo "Update User";}else { echo "Edit";}?>" />
                     <a href="." class="btn xtra-pad">Cancel</a>
                </td>
            </tr>
           
        </form>
    </table>
<?php include ( '../components/cms_footer.php'); ?>