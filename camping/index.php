<?php
    include ('../config.php');
    include ('../components/main_header.php');

    require ('../models/database.php');
    require('../models/camping/camper.php');
    require('../models/camping/camper_db.php');
    require ('../models/validation/field_classes.php');
    require ('../models/validation/validation_class.php');

  /*  //Creates an object from Validation class
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
    $vacantsite
*/

    $vacantsites = CamperDB::getVaccantCampsites();

    if (isset($_POST['submit'])){ //If submit button is clicked



        //Post values from the form
//        $campsite_id = $_POST['campsite_id'];
        $camper_fname = $_POST['camper_fname'];
        $camper_lname = $_POST['camper_lname'];
        $camper_email = $_POST['camper_email'];
        $group_size = $_POST['group_size'];
        $camps_num = $_POST['camps_num'];

        //Assigns required validation to fields
        /*
        $validate->required('camper_fname', $camper_fname);
        $validate->required('camper_lname', $camper_lname);
        $validate->required('camper_email', $camper_email);
        $validate->required('group_size', $group_size);
        $validate->required('camps_num', $camps_num);
        */

        //If there are errors
        //if(!$fields->hasErrors()){

            //Create an object from the Camping class
            //$submitCamper = new Camping($camper_fname, $camper_lname, $camper_email, $group_size, $camps_num);

            //Insert into the database
            CamperDB::updateCamperBySite($camper_fname, $camper_lname, $camper_email, $group_size, $camps_num);

        }
  //  }


?>

<div class="camping">

    <!-- if there are input errors OR if the submit button has not been clicked, show the form -->


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


            <div class="clear"></div>

            <select name="group_size">

                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
            </select>
            <div class="clear"></div>

          <select name="camps_num">
              <option value="all">Select a CampSite</option>
             <?php foreach($vacantsites as $vacantsite) : ?>

              <option value="<?php echo $vacantsite; ?>"> <?php echo $vacantsite; ?></option>
              <?php endforeach; ?>
          </select>

            <input type="hidden" name="approved" value="0"/>
            <input type="submit" id="submit" name="submit" value="Submit" />

    </form>
