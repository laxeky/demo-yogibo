<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- research -->
<form id="resetForm" name="resetForm" method="post">
<div  class="article_bg">
    <div class="container">
        <div class="row">   
            <div class="col-md-12 text-center">
                <h1 class="title_bg">Reset Password</h1>		  
                <!-- <h2>
                    หากลูกค้ายังพบข้อสงสัยเกี่ยวกับผลิตภัณฑ์ หรือต้องการสอบถามข้อมูลเพิ่มเติม<br>
                    สามารถติดต่อบริษัทฯ ได้ที่แบบฟอร์มด้านล่างนี้
                </h2> -->
            </div>
        </div>  
        <div class="row">
            <div class="col">
                <input type='hidden' name="txt_Token" id="txt_Token" value="<?=$token?>">
                <div class="register_box_flex">
                    <div class="box_content">
                        <div class="txt_title">New Password</div>
                        <div class="txt_data">
                        <input type="password" class="input_login" id="txt_Password" name="txt_Password" maxlength="100">
                        </div>
                    </div>
                    <div class="box_content">
                        <div class="txt_title">Confirm Password</div>
                        <div class="txt_data">
                        <input type="password" class="input_login" id="txt_ConfirmPassword" name="txt_ConfirmPassword" maxlength="100">
                        </div>
                    </div>
                </div>

                <div class="register_content text-center">
                    <a href="javascript:void(0);" onclick="js_change_password();">
                        <input type="button" class="bnt_order" name="txt_login" value="Submit">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>

</form>
<!-- research -->
