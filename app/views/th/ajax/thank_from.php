<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($id == 1){
    $message = "You have already registered.";
}else{
    $message = "Error ! Can't register ";
}
?>

<div class="box_thank_popup">
    <div class="border_thank_popup">
        <div class="txt_thankyou">
            <?=$message?>
        </div>
        <div class="txt-center">
            <a href="<?=site_url('home')?>">
                <input type="button" class="bnt_order bnt_register_top" name="bnt_register" value="Submit">
            </a>
        </div>
    </div>
</div>