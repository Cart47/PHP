<?php 
    
    include_once ('../components/cms_header.php'); 

    //Forces a redirect through the index if you are not admin
    if($_SESSION['RoleID'] != 2){

      echo  '<script type="text/javascript"> window.location.href ="../../Home/Index.php"; </script>';
    }

?>      

<h1>Email Subscribers</h1>

<div class="head-btn">
    <!-- Add a new subbscriber button -->
    <form action="." method="post" id="insert_email">
        <input type="hidden" name="action" value="add" />
        <button type="submit" class="btn" name="add"><i class="fa fa-plus"></i>Add a Subscriber</button>
    </form>
</div>

<div class="clear"></div>

<!---------------------------------->
<!-- Display Approved Subscribers -->
<!---------------------------------->

<h3>Approved Subscribers</h3>

<table class="tbl-email">

    <th>Name</th>
    <th>Email</th>
    <th>Edit</th>
    <th>Delete</th>

    <?php foreach ($approvedEmail as $approve) {

       echo 
       '<tr>
            <td>' . $approve->getName() . '</td>
            <td><a href="mailto:' . $approve->getEmail() . '">' . $approve->getEmail() . '</a></td>
            <td>
                <form action="." method="post" id="edit_email">                            
                    <input type="hidden" name="email_id" value="' . $approve->getEmailID() . '" />
                    <input type="hidden" name="action" value="edit" />
                    <button type="submit" class="link-btn"><i class="fa fa-pencil fa-lg"></i></button>
                </form>
            </td>
            <td>
                <form action="." method="post" id="delete_email">                            
                    <input type="hidden" name="email_id" value="' . $approve->getEmailID() . '" />
                    <input type="hidden" name="action" value="delete" />   
                    <button type="submit" class="link-btn"><i class="fa fa-trash-o fa-lg"></i></button>      
                </form>
            </td>
        </tr>';             
    }

    ?>
    
</table>

<!--------------------------------->
<!-- Display Pending Subscribers -->
<!--------------------------------->    

<h3>Pending Subscribers</h3>

<table class="tbl-email">

    <th>Name</th>
    <th>Email</th>
    <th>Edit</th>
    <th>Delete</th>

    <?php foreach ($pendingEmail as $unapprove) {

       echo 
       '<tr>
            <td>' . $unapprove->getName() . '</td>
            <td><a href="mailto:' . $unapprove->getEmail() . '">' . $unapprove->getEmail() . '</a></td>
            <td>
                <form action="." method="post" id="edit_email">                            
                    <input type="hidden" name="email_id" value="' . $unapprove->getEmailID() . '" />
                    <input type="hidden" name="action" value="edit" />
                    <button type="submit" class="link-btn"><i class="fa fa-pencil fa-lg"></i></button>      
                </form>
            </td>
            <td>
                <form action="." method="post" id="delete_email">                            
                    <input type="hidden" name="email_id" value="' . $unapprove->getEmailID() . '" />
                    <input type="hidden" name="action" value="delete" />
                    <button type="submit" class="link-btn"><i class="fa fa-trash-o fa-lg"></i></button>      
                </form>
            </td>
        </tr>';             
    }

    ?>

</table>           

<?php include ('../components/cms_footer.php'); ?>