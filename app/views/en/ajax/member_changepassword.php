<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="box_address_edit">
    <!-- header -->
    <div>
        <h2 class="text-center">Change Password</h2>
    </div>
    <!-- header -->
    <form name="myForm" id="myForm" method="POST">
        <div class="register_box_flex edit_profile_box">
            <div class="box_content2">
                <div class="txt_title">Old Password *</div>
                <div class="txt_data">
                    <input type="password" class="input_login" id="txt_OldPassword" name="txt_OldPassword" maxlength="100">
                </div>
            </div>
            <div class="box_content2">
                <div class="txt_title">New Password *</div>
                <div class="txt_data">
                    <input type="password" class="input_login" id="txt_Password" name="txt_Password" maxlength="100">
                </div>
            </div>

            <div class="box_content2">
                <div class="txt_title">Confirm Password *</div>
                <div class="txt_data">
                    <input type="password" class="input_login" id="txt_ConfirmPassword" name="txt_ConfirmPassword" maxlength="100" >
                </div>
            </div>

        </div>

        <div class="txt-center">
            <a href="javascript:void(0);" onclick="js_memberUpdatePassword();">
                <input type="button" class="bnt_order bnt_register_top" name="bnt_register" value="Submit">
            </a>
        </div>

    </form>
</div>

<script>
$(function(){
    $('select').selectric();
});
</script>