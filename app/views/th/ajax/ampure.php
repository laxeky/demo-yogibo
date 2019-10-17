<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($ampure_row > 0){
  echo '<select class="select_box" name="txt_Ampure" id="txt_Ampure" onchange="js_getTumbon(this.value);" >';
  echo '<option value="0">เขต/อำเภอ</option>';
  foreach($ampure as $val){
    echo '<option value="'.$val['AMPHUR_ID'].'">'.$val['AMPHUR_NAME'].'</option>';
  }
  echo '</select>';
}

?>
