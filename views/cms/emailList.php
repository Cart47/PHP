<!doctype html>
<html>
	<head>
		
        <link href='http://fonts.googleapis.com/css?family=Lobster' rel='stylesheet' type='text/css'>
        <link rel="stylesheet" href="../../css/Reset.css">
        <link rel="stylesheet" href="../../css/font-awesome-4.3.0/css/font-awesome.css">
		<link rel="stylesheet" href="../../css/cms.css">

		<meta charset="utf-8" />
		<title></title>
	</head>
	<body>
        
        <?php 

            include ('../../components/cmsHeader.php'); 
            include ('../../components/cmsLeftMenu.php'); 
        
        ?>
        
        <!-- Main Content Area -->
        <div id="main">
            
            <h1>Email Subscribers</h1>
        
            <h2>Approved Subscribers</h2>

            <table>

                <th>Name</th>
                <th>Email</th>

                <?php foreach ($approvedEmail as $approve) {

                   echo 
                   '<tr>
                        <td>' . $approve->getName() . '</td>
                        <td><a href="mailto:' . $approve->getEmail() . '">' . $approve->getEmail() . '</a></td>
                        <td>
                            <form action="." method="post" id="edit_email">                            
                                <input type="hidden" name="email_id" value="' . $approve->getEmailID() . '" />
                                <input type="submit" name="edit" value="Edit" />                           
                            </form>
                        </td>
                        <td>
                            <form action="." method="post" id="delete_email">                            
                                <input type="hidden" name="email_id" value="' . $approve->getEmailID() . '" />
                                <input type="submit" name="delete" value="Delete" />                           
                            </form>
                        </td>
                    </tr>';             
                }

                ?>

            </table>


            <h2>Pending Subscribers</h2>

            <table>

                <th>Name</th>
                <th>Email</th>

                <?php foreach ($pendingEmail as $unapprove) {

                   echo 
                   '<tr>
                        <td>' . $unapprove->getName() . '</td>
                        <td><a href="mailto:' . $unapprove->getEmail() . '">' . $unapprove->getEmail() . '</a></td>
                        <td>
                            <form action="." method="post" id="edit_email">                            
                                <input type="hidden" name="email_id" value="' . $unapprove->getEmailID() . '" />
                                <input type="submit" name="edit" value="Edit" />                           
                            </form>
                        </td>
                        <td>
                            <form action="." method="post" id="delete_email">                            
                                <input type="hidden" name="email_id" value="' . $unapprove->getEmailID() . '" />
                                <input type="submit" name="delete" value="Delete" />                           
                            </form>
                        </td>
                    </tr>';             
                }

                ?>

            </table>           
            
            <form action="." method="post" id="insert_email">
                <input id="addSubscriber" type="submit" name="add" value="Add a Subscriber"/>
            </form>
            
        </div><!-- end main -->
        
        <?php include ('../../components/cmsFooter.php'); ?>
        
	</body>
</html>