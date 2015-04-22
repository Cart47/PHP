<?php


    require ('../models/validation/field_classes.php');
    require ('../models/validation/validation_class.php');

    //Creates an object from Validation class
    $validate = new Validation();

    //Creates a new fieldsArray
    $fields = $validate->getFields();

    //Adds the following field objects to the fieldsArray
    $fields->addField('camper_fname');
    $fields->addField('camper_lname');
    $fields->addField('camper_email');
    $fields->addField('group_size');
    $fields->addField('camps_num');

    $camper_fname='';
    $camper_lname='';
    $camper_email='';
    $group_size='';
    $camps_num='';

    if (isset($_POST['subscribe'])){ //If subscribe button is clicked

        //Post values from the form
        $camper_id = $_POST['camper_id'];
        $camper_fname = $_POST['camper_fname'];
        $camper_lname = $_POST['camper_lname'];
        $camper_email = $_POST['camper_email'];
        $group_size = $_POST['group_size'];
        $camps_num = $_POST['camps_num'];

        //Assigns required validation to fields
        $validate->required('camper_fname', $camper_fname);
        $validate->required('camper_lname', $camper_lname);
        $validate->required('camper_email', $camper_email);
        $validate->required('group_size', $group_size);
        $validate->required('camps_num', $camps_num);


        //If there are errors
        if(!$fields->hasErrors()){

            //Create an object from the Email class
            $submitCamper = new CamperClass($camper_fname, $camper_lname, $camper_email, $group_size, $camps_num);

            //Insert into the database
            CamperDB::insertCamper($submitCamper);

        }
    }

<div class="camping">

    <!-- if there are input errors OR if the subscribe button has not been clicked, show the form -->
    <?php if($fields->hasErrors() || !isset($_POST['subscribe']) ){ ?>

        <form action="index.php" method="post" id="camper-form">

            <h3>Reserve a site to camp today</h3>

            <input type="hidden" name="camper_id" />
            <input type="text" class="camper-field" name="camper_fname" placeholder="Your First Name" value="<?php echo isset($camper_fname) ? $camper_fname : '' ; ?>" />
            <?php echo isset($fields) ? $fields->getField('camper_fname')->showErrors() : '' ; ?>
            <div class="clear"></div>

            <input type="text" class="camper-field" name="camper_lname" placeholder="Your Last Name" value="<?php echo isset($camper_lname) ? $camper_lname : '' ; ?>" />
            <?php echo isset($fields) ? $fields->getField('camper_lname')->showErrors() : '' ; ?>
            <div class="clear"></div>

            <input type="text" class="camper-field" name="camper_email" placeholder="Your Email" value="<?php echo isset($camper_email) ? $camper_email : '' ; ?>" />
            <?php echo isset($fields) ? $fields->getField('camper_email')->showErrors() : '' ; ?>
            <div class="clear"></div>

            <input type="text" class="camper-field" name="group_size" placeholder="Your Email" value="<?php echo isset($group_size) ? $group_size : '' ; ?>" />
            <?php echo isset($fields) ? $fields->getField('group_size')->showErrors() : '' ; ?>
            <div class="clear"></div>

          <input type="text" class="camper-field" name="camps_num" placeholder="Your Email" value="<?php echo isset($camps_num) ? $camps_num : '' ; ?>" />
          <?php echo isset($fields) ? $fields->getField('camps_num')->showErrors() : '' ; ?>
          <div class="clear"></div>

            <input type="hidden" name="approved" value="0"/>
            <input type="submit" id="subscribe" name="subscribe" value="Submit" />

    </form>
