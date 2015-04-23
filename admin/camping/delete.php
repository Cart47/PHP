<?php

include ('../components/cms_header.php');

?>

<h2>Are you sure that you want to delete this camper?</h2>

  <p>
    Name:
    <?php echo $selected->getCamperFName(); echo $selected->getCamperLName(); ?>
  </p>
  <p>
    Email:
    <?php echo $selected->getCamperEmail(); ?>
  </p>
  <p>
    Group Size:
    <?php echo $selected->getCamperGroupSize(); ?>
  </p>
  <p>
    Campsite:
    <?php echo $selected->getSiteNum(); ?>
  </p>
<form action="." method="post" id="delete_camper">

  <input type="hidden" name="email_id" value=<?php echo $selected->getSiteNum(); ?>  />
  <input type="hidden" name="action" class="btn" value="yes" />
  <input type="submit" name="yes" class="btn" value="Yes" />
  <a href="." class="btn xtra-pad">No</a>

</form>

<?php include ('../components/cms_footer.php'); ?>
