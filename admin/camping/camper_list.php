<?php

  include_once ('../components/cms_header.php');

  ?>
  <h1>Registered Campers</h1>

  <table class="tbl-camping">

    <th>
      Name
    </th>
    <th>
      Email
    </th>
    <th>
      Group Size
    </th>
    <th>
      Campsite Number
    </th>
    <th>
      Delete
    </th>

    <?php foreach ($campers as $c){

      echo
      '<tr>
            <td>' . $c->getCamperFName() . " ". $c->getCamperLName() . '</td>
            <td>' . $c->getCamperEmail() . '</td>
            <td>' . $c->getCamperGroupSize() . '</td>
            <td>' . $c->getSiteNum() . '</td>
            <td> <form action="." method="post" id="delete_camper">
                <input type="hidden" name="camps_num" value="' . $c->getSiteNum() . '" />
                <input type="hidden" name="action" value="delete" />
                <button type="submit" class="link-btn"><i class="fa fa-trash-o fa-lg"></i></button>
            </form>
          </td>
        </tr>';

    }

  ?>

</table>
