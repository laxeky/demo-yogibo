<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- header -->
<div class="register_header_flex">
    <div id="tab_login1" class="register_block" onclick="js_register_tab(1);">LOGIN</div>
    <div id="tab_login2" class="register_block" onclick="js_register_tab(2);">REGISTER</div>
</div>
<!-- header -->
<form name="myForm" id="myForm" method="POST">
    <div class="register_box_flex">
        <div class="box_content">
            <div class="txt_title">Email</div>
            <div class="txt_data">
                <input type="text" class="input_login" id="txt_LoginEmail" name="txt_LoginEmail" maxlength="100">
            </div>
        </div>
        <div class="box_content">
            <div class="txt_title">Password</div>
            <div class="txt_data">
            <input type="password" class="input_login" id="txt_LoginPassword" name="txt_LoginPassword" maxlength="100">
            </div>
        </div>
    </div>

    <div class="register_box_flex register_content">
        <div class="box_content"></div>
        <div class="box_content">
            <div class="txt_title txt_right">
                <a href="javascript:void(0);" onclick="js_forgetpassword_tab();">
                    <div class="bnt_readmore">Forget password</div>
                </a>
            </div>
        </div>
    </div>

    <div class="register_content txt-center">
        <a href="javascript:void(0);" onclick="js_login();">
            <div class="bnt_order" name="txt_login">Login</div>
        </a>
        <!-- <div class="txt_message">- หรือ -</div>
        <input type="button" class="bnt_facebook" name="txt_facebook" value="เข้าสู่ระบบผ่านเฟสบุ๊ค"> -->
    </div>
</form>

<script>
    $('#txt_LoginEmail ,#txt_LoginPassword').keypress(function(e){
        if(e.which == 13){
            js_login();
        }
    });
</script>