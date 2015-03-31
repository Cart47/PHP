<?php include_once('../components/cms_header.php'); 
include_once('../../models/database.php');

//including the Database call files for the Role Manager 
include_once('../../models/role_manager/users.php');
include_once('../../models/role_manager/role_manager.php');
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
            foreach($individuals as $i){
            echo '<tr><td>' .
                        $i->getIndFName() 
                . '</td><td>' .
                         $i->getIndLName()  
                . '</td><td>' .
                         $i->getUsername() 
                . '</td><td>' .
                          $i->getIndEmail()
                . '</td><td>Individual</td></tr>';
        }
        ?>   
    </table>      
</form>
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
            <th>User Role</th>
        </thead>
        <?php 
            foreach($administrators as $a){
            echo '<tr><td>' .
                        $a->getIndFName() 
                . '</td><td>' .
                         $a->getIndLName()  
                . '</td><td>' .
                         $a->getUsername() 
                . '</td><td>' .
                          $a->getIndEmail()
                . '</td><td>Individual</td></tr>';
        }
        ?>   
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
                . '</td><td>Individual</td></tr>';
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
                . '</td><td>Individual</td></tr>';
        }
        ?>   
    </table>      
</form>
<?php } ?>

<?php include ( '../components/cms_footer.php'); ?>