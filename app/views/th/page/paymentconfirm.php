<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- research -->
<div  class="product_bg">
    <div class="container">
        <div class="row">
            <div class="col text-center">
                <div>
                    <h1 class="title_bg">แจ้งการชำระเงิน</h1>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <!-- content -->
                <form name="confirmForm" id="confirmForm" enctype="multipart/form-data" method="post" action="<?=base_url('upload.php')?>">
                    <div class="register_box_flex">
                        <div class="box_content2">
                            <div class="txt_title">ชื่อ *</div>
                            <div class="txt_data">
                                <input type="text" class="input_login" id="txt_FirstName" name="txt_FirstName" value="<?=$txt_FirstName?>" maxlength="100">
                            </div>
                        </div>
                        <div class="box_content2">
                            <div class="txt_title">นามสกุล *</div>
                            <div class="txt_data">
                                <input type="text" class="input_login" id="txt_LastName" name="txt_LastName" value="<?=$txt_LastName?>" maxlength="100">
                            </div>
                        </div>

                        <div class="box_content2">
                            <div class="txt_title">เบอร์โทรศัพท์ *</div>
                            <div class="txt_data">
                                <input type="text" class="input_login" id="txt_Phone" name="txt_Phone" value="<?=$txt_Phone?>" maxlength="10" onKeyPress="return CheckNumericKeyInfo(event.keyCode, event.which);">
                            </div>
                        </div>

                        <div class="box_content2">
                            <div class="txt_title">อีเมล์ *</div>
                            <div class="txt_data">
                                <input type="email" class="input_login" id="txt_Email" name="txt_Email" value="<?=$txt_Email?>" maxlength="100" onChange="emailCheck(this);">
                            </div>
                        </div>

                        <div class="box_content2">
                            <div class="txt_title">ธนาคาร *</div>
                            <div class="txt_data">
                                <select class="select_box" name="txt_Bank" id="txt_Bank">
                                    <option value="0">เลือกธนาคาร</option>
                                    <?php
                                        if($bankRow > 0){
                                            foreach($bank as $val){
                                                if($txt_Province == $val['_product_bank_ID']){
                                                    $sel = "selected";
                                                }else{
                                                    $sel = "";
                                                }
                                                echo '<option value="'.$val['_product_bank_ID'].'" '.$sel.'>'.$val['_product_bank_Title'].' ('.$val['_product_bank_No'].') </option>';
                                            }
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>

                        <div class="box_content2">
                            <div class="txt_title">วันที่โอนเงิน *</div>
                            <div class="txt_data">
                                <input type="text" class="input_login" id="txt_Date" name="txt_Date" maxlength="50">
                            </div>
                        </div>

                        <div class="box_content2">
                            <div class="txt_title">เวลาโอนเงิน (<?=date("H.i")?>)</div>
                            <div class="txt_data">
                                <input type="text" class="input_login" id="txt_Time" name="txt_Time" maxlength="10" onKeyPress="return CheckNumericKeyInfo_dot(event.keyCode, event.which);">
                            </div>
                        </div>

                        <div class="box_content2">
                            <div class="txt_title">จำนวนเงินที่โอน *</div>
                            <div class="txt_data">
                                <input type="text" class="input_login" id="txt_Money" name="txt_Money" maxlength="10" onKeyPress="return CheckNumericKeyInfo_dot(event.keyCode, event.which);">
                            </div>
                        </div>

                        <div class="box_content2">
                            <div class="txt_title">สลิปโอนเงิน</div>
                            <div class="txt_data">
                                <input type="file" class="form-control-file input_file" id="txt_Slip" name="txt_Slip">
                            </div>
                        </div>

                        <div class="box_content3">
                            <div class="txt_title">ข้อมูลการสั่งซื้อ *</div>
                            <div class="txt_data">
                                <textarea class="input_textarea" id="txt_Subject" name="txt_Subject" ></textarea>
                            </div>
                        </div>

                        <div class="box_content3">
                            <div class="text-center">
                                <a href="javascript:void(0);" onclick="js_payment_confirm();">
                                    <input type="button" class="bnt_order bnt_register_top" name="bnt_confirm" value="ตกลง">
                                </a>
                            </div>
                        </div>

                    </div>
                </form>

                <script>
                $(function(){

                    $("#txt_Date").datepicker({
                        minDate: -3, maxDate: "0M 0D",
                        dateFormat: "yy-mm-dd"
                    });

                    $('select').selectric();
                    
                });
                </script>
                <!-- content -->
            </div>
        </div>

    </div>
</div>
<!-- research -->