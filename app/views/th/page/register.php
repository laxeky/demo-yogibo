<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="register_background">
    <div class="register_banner">
        <img src="<?=base_url('img/home/img-banner.jpg')?>">
    </div>
    <div class="icon_bar _web">
        <img src="<?=base_url('img/home/banner-bar.png')?>">
    </div>
</div>

<!-- register -->
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="register_box">
                <h2>ลงทะเบียนรับสิทธิพิเศษก่อนใคร</h2>
                <h1>จองเพื่อได้รับส่วนลดมากกว่า*</h1>
                <div class="register_block">
                    <form id="myForm" name="myForm">
                        <!-- input form -->
                        <div class="input_form">
                            <input class="input_text" type="text" id="txt_Firstname" name="txt_Firstname" placeholder="ชื่อ *" maxlength="100">
                        </div>
                        <!-- input form -->
                        <!-- input form -->
                        <div class="input_form">
                            <input class="input_text"  type="text" id="txt_Lastname" name="txt_Lastname" placeholder="นามสกุล *" maxlength="100">
                        </div>
                        <!-- input form -->
                        <!-- input form -->
                        <div class="input_form">
                            <input class="input_text"  type="text" id="txt_Phone" name="txt_Phone" placeholder="เบอร์โทรศัพท์มือถือ *" maxlength="10" onKeyPress="return CheckNumericKeyInfo(event.keyCode, event.which);">
                        </div>
                        <!-- input form -->
                        <!-- input form -->
                        <div class="input_form">
                            <input class="input_text"  type="text" id="txt_Email" name="txt_Email" placeholder="อีเมล์ *" maxlength="100" onChange="emailCheck(this);">
                        </div>
                        <!-- input form -->
                        <!-- input form -->
                        <div class="input_form">
                            <div class="txt_pre-sale">วันนี้ - วัน Pre-Sale</div>
                            <div class="bnt_submit" onclick="js_booking();">รับสิทธิ์</div>
                        </div>
                        <!-- input form -->
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="register_box2">
                <img src="<?=base_url('img/home/img-banner2.jpg')?>">
            </div>
        </div>
    </div>
</div>
<!-- register -->
