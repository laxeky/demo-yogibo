<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- header -->
<div class="register_header_flex">
    <div id="tab_login1" class="register_block" onclick="js_register_tab(1);">เข้าสู่ระบบ</div>
    <div id="tab_login2" class="register_block" onclick="js_register_tab(2);">สมัครสมาชิก</div>
</div>
<!-- header -->
<form name="myForm" id="myForm" method="POST">
    <div class="register_box_flex">
        <div class="box_content2">
            <div class="txt_title">ชื่อ *</div>
            <div class="txt_data">
                <input type="text" class="input_login" id="txt_reFirstName" name="txt_reFirstName" maxlength="100">
            </div>
        </div>
        <div class="box_content2">
            <div class="txt_title">นามสกุล *</div>
            <div class="txt_data">
                <input type="text" class="input_login" id="txt_reLastName" name="txt_reLastName" maxlength="100">
            </div>
        </div>
        <div class="box_content2">
            <div class="txt_title">เพศ *</div>
            <div class="txt_data box_registerTop">
                <input type="radio" name="txt_reGender" id="txt_reGender1" value="male" > 
                <label for="txt_reGender1">ชาย</label>
                &nbsp;&nbsp;&nbsp;
                <input type="radio" name="txt_reGender" id="txt_reGender2" value="female" > 
                <label for="txt_reGender2">หญิง</label>
            </div>
        </div>

        <div class="box_content2">
            <div class="txt_title">วันเกิด *</div>
            <div class="txt_data">
                <input type="text" class="input_login" id="txt_reBirthday" name="txt_reBirthday" maxlength="100">
            </div>
        </div>

        <div class="box_content2">
            <div class="txt_title">เบอร์โทรศัพท์ *</div>
            <div class="txt_data">
                <input type="text" class="input_login" id="txt_rePhone" name="txt_rePhone" maxlength="10" onKeyPress="return CheckNumericKeyInfo(event.keyCode, event.which);">
            </div>
        </div>

        <div class="box_content2">
            <div class="txt_title">อีเมล *</div>
            <div class="txt_data">
                <input type="email" class="input_login" id="txt_reEmail" name="txt_reEmail" maxlength="100" onChange="emailCheck(this);">
            </div>
        </div>

        <div class="box_content2">
            <div class="txt_title">รหัสผ่าน *</div>
            <div class="txt_data">
                <input type="password" class="input_login" id="txt_rePassword" name="txt_rePassword" maxlength="100">
            </div>
        </div>

        <div class="box_content2">
            <div class="txt_title">ยืนยันรหัสผ่าน *</div>
            <div class="txt_data">
                <input type="password" class="input_login" id="txt_reConfirmPassword" name="txt_reConfirmPassword" maxlength="100">
            </div>
        </div>

        <div class="box_request">
            <div class="txt_title">* โปรดระบุรายละเอียด.</div>
        </div>

    </div>

    <div class="txt-center">
        <a href="javascript:void(0);" onclick="js_register();">
            <div class="bnt_order bnt_register_top" name="bnt_register">ตกลง</div>
        </a>
    </div>
</form>

<script>
$(function(){

    $("#txt_reBirthday").datepicker({
        changeMonth: true,
        changeYear: true,
        yearRange: "-100:+0",
        dateFormat:'yy-mm-dd'
    });
    
});
</script>