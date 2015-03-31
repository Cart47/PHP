</main>

<?php 

    require ('../models/validation/field_classes.php');
    require ('../models/validation/validation_class.php');

    //Creates an object from Validation class
    $validate = new Validation();

    //Creates a new fieldsArray
    $fields = $validate->getFields();

    //Adds the following field objects to the fieldsArray
    $fields->addField('name');
    $fields->addField('email');

    $name='';
    $email='';
    $approved='';

    if (isset($_POST['subscribe'])){ //If subscribe button is clicked

        //Post values from the form
        $email_id = $_POST['email_id'];
        $name = $_POST['name']; 
        $email = $_POST['email'];
        $approved = $_POST['approved'];

        //Assigns required validation to fields
        $validate->required('name', $name);
        $validate->required('email', $email);

        //If there are errors
        if(!$fields->hasErrors()){

            //Create an object from the Email class
            $subscribe = new EmailClass($name, $email, $approved);

            //Insert into the database
            EmailDB::insertEmail($subscribe);

        }  
    } 

?>


    </div><!-- closing div for container -->

    <footer>

        <div id="footContainer">

            <!---------- CONTACT INFO ---------->

            <div class="contact">

                <div id="footer-contact">
                    <h3>Chorus in the Forest Head Office</h3>
                    <p>123 Woods Road</p>
                    <p>Moosonee, Ontario, Canada</p>
                    <p>P0L 1Y0</p>

                    <div id="contact">
                        <p>(705) 555-3144</p>
                        <p>admin@citf.ca</p>
                    </div>

                    <p id="copyright">&copy; 2015 Chorus in the Forest</p>

                </div>

            </div><!-- end contact -->


            <!---------- SUBSCRIBE FORM ---------->

            <div class="subscribe">

                <!-- if there are input errors OR if the subscribe button has not been clicked, show the form -->
                <?php if($fields->hasErrors() || !isset($_POST['subscribe']) ){ ?>

                    <form action=".#footContainer" method="post" id="subscription-form">

                        <h3>Subscribe to our newsletter!</h3>

                        <input type="hidden" name="email_id" />
                        <input type="text" class="email-field" name="name" placeholder="Your Name" value="<?php echo isset($name) ? $name : '' ; ?>" />     
                        <?php echo isset($fields) ? $fields->getField('name')->showErrors() : '' ; ?>

                        <div class="clear"></div>

                        <input type="text" class="email-field" name="email" placeholder="Your Email" value="<?php echo isset($email) ? $email : '' ; ?>" />
                        <?php echo isset($fields) ? $fields->getField('email')->showErrors() : '' ; ?>

                        <div class="clear"></div>

                        <input type="hidden" name="approved" value="0"/>
                        <input type="submit" id="subscribe" name="subscribe" value="Subscribe :-)" />

                </form>

                <!-- If there are no errors and the subscribe button has been clicked, thank the user for subscribing -->
                <?php } else { 

                    echo '<h3><i class="fa fa-smile-o fa-lg"></i>Thanks for Subscribing!</h3></i>';

                }?>

            </div><!-- end right-col -->

        </div>

    </footer>

<!--   JS Scripts can go here -->
<script src="../js/jquery.leanModal.min.js" type="text/javascript"></script>
<script src="../js/modalTrigger.js" type="text/javascript"></script>
<script src="../js/modalTrigger.js" type="text/javascript"></script>

</body>
</html>


