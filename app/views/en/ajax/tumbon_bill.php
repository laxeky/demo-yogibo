<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($tumbon_row > 0){
  echo '<select class="select_box" name="txt_BillTumbon" id="txt_BillTumbon" onchange="js_getBillPostcode(this.value)">';
  echo '<option value="0">Sub-area/Sub-district</option>';
  foreach($tumbon as $val){
    echo '<option value="'.$val['DISTRICT_ID'].'">'.$val['DISTRICT_NAME_EN'].'</option>';
  }
  echo '</select>';
}
?>

