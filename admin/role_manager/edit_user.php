<?php include_once('../components/cms_header.php'); 
include_once('../../models/database.php');

//including the Database call files for the Role Manager 
include_once('../../models/role_manager/users.php');
include_once('../../models/role_manager/role_manager.php');
$user = Roles::getUserRoles($_POST['edit_user']);
?>

<!---------  BASE Role Manager ---------->

<h1>Role Manager</h1>
    <br/>
    <h2>Edit Individual - <?php echo $user->getIndFName() . " " . $user->getIndLName(); ?></h2>
    <br/>
    login id
    admin id
    artist id
    First Name
    Last Name
    email
    
    
<br/>
<a href="." class="btn xtra-pad">Cancel</a>

<?php include ( '../components/cms_footer.php'); ?>