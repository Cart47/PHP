<?php 
    require_once ('../../config.php');
    include ('../components/cms_header.php'); 

    //Forces a redirect through the index
    if(!isset($approvedEmail) && !isset($pendingEmail)){
        header('Location: ../email_subscription'); 

    }

?>      

<h1>Email Subscribers</h1>

<h3>Approved Subscribers</h3>

<table>

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

<h3>Pending Subscribers</h3>

<table>

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

<form action="." method="post" id="insert_email">
    <input type="hidden" name="action" value="add" />
    <button type="submit" class="btn" name="add"><i class="fa fa-plus"></i>Add a Subscriber</button>
</form>


<?php include ('../components/cms_footer.php'); ?>