<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<form id="myMessage" name="myMessage" method="post">
    <div class="box_message">
    <input type="hidden" name="txt_MessageUserID" id="txt_MessageUserID" value="<?=$user_id?>" >
    <h3>Message Shop</h3>
    <div class="block">
        <div class="title">Email</div>
        <input type="text" class="input_login" id="txt_MessageEmail" name="txt_MessageEmail" value="<?=$email?>" maxlength="100" required>
        <div class="invalid-feedback">Please input Email</div>
    </div>
    <div class="block">
        <div class="title">Message</div>
        <textarea class="input_area" id="txt_Message" name="txt_Message" required></textarea>
        <div class="invalid-feedback">Please input Message</div>
    </div>
    <div class="block">
        <div class="bnt_confirm" id="btnSubmit" onclick="js_addMessage();">Send</div>
        <div class="bnt_confirm_cancel" id="btnCancel" onclick="$('#id_message').fadeOut(300);">Cancel</div>
    </div>
    </div>
</form>
</form>