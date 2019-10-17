<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- header -->
<div class="register_header_flex">
    <div id="tab_login1" class="register_block" onclick="js_register_tab(1);">ลืมรหัสผ่าน</div>
    <div id="tab_login2" class="register_block" onclick="js_register_tab(2);">สมัครสมาชิก</div>
</div>
<!-- header -->
<form name="forgetForm" id="forgetForm" method="POST">

    <div class="register_box_flex">
        <div class="box_content3">
            <div class="txt_title">อีเมล</div>
            <div class="txt_data">
                <input type="text" class="input_login" id="txt_forgetEmail" name="txt_forgetEmail" maxlength="100">
            </div>
        </div>
    </div>

    <div class="register_box_flex register_content">
        <div class="box_content"></div>
        <div class="box_content">
            <div class="txt_title txt_right">
                <a href="javascript:void(0);" onclick="js_register_tab(1);">
                    <div class="bnt_readmore">เข้าสู่ระบบ</div>
                </a>
            </div>
        </div>
    </div>

    <div class="register_content txt-center">
        <a href="javascript:void(0);" onclick="js_forgetpassword();";>
            <div class="bnt_order" name="txt_forgetpassword">ตกลง</div>
        </a>
    </div>

</form>

<script>
    $('#txt_LoginEmail ,#txt_LoginPassword').keypress(function(e){
        if(e.which == 13){
            js_forgetpassword();
        }
    });
</script>