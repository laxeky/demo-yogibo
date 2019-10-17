<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($id == 1){
    $message = "Subscribe completed";
}else if ($id == 2) {
    $message = "You Subscribe completed";
}else{
    $message = "Error ! Can't Subscribe data ";
}
?>

<div class="subscribe_thankyou">
    <h2><?=$message?></h2>
    <a href="javascript:void(0);" onclick="js_subscribeClose();">
        <div class="bnt_subscribe">OK</div>
    </a>
</div>