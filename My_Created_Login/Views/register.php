<?php
$user_name ="";
$user_email ="";



if(isset($_POST['register']))
{
    $info = $_POST;



    $user_name =$info['user_name'];
    $user_email =$info['user_email'];

    $password = $info['user_password'];
    $user_password_repeat = $info['password_repeat'];

    include '../Models/validation.php';
    include '../Models/databaseClass.php';
    include '../Models/RegisterNewUser.php';


    $validation = new validation();
    $validation->validator($info);
/*
    if($validation->errors != null){
        //echo $validation->errors;
        var_dump($validation->errors);
    } else {
    new Registration($info);
    } */
    
     if($validation->errors != null){
            //var_dump($validation->errors);
            foreach($validation->errors as $a => $b){
                echo "<p>" . $a . $b . "</p>";
            }
               
        }
    
}             
?>

       
        <a href="#formRegister">Click here to see the form</a> 
        <div id="formRegister">
            <form method="post" action="../Views/register.php">
                <span>Please Enter a Username</span><br/>
                <input type="text" name="user_name" value="<?php echo $user_name ?>">
                <br/><br/>
                <span>Please enter a Valid Email Address</span><br/>
                <input type="text" name="user_email" value="<?php echo $user_email ?>">
                <br/><br/>
                <span>Please enter a new Password</span><br/>
                <input type="text" name="user_password">
                <br/><br/>
                <span>Please repeat your password</span><br/>
                <input type="text" name="password_repeat">
                <br/><br/>
                <button type="submit" name="register">Click me!</button> 
            </form>
        </div>
    </body>
</html>
