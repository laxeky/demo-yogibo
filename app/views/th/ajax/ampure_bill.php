<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($ampure_row > 0){
  echo '<select class="select_box" name="txt_BillAmpure" id="txt_BillAmpure" onchange="js_getBillTumbon(this.value);" >';
  echo '<option value="0">เขต/อำเภอ</option>';
  foreach($ampure as $val){
    echo '<option value="'.$val['AMPHUR_ID'].'">'.$val['AMPHUR_NAME'].'</option>';
  }
  echo '</select>';
}

?>
