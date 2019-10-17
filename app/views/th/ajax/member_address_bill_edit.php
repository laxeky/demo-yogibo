<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="box_address_edit">
    <!-- header -->
    <div>
        <h2 class="text-center">Billing Info</h2>
    </div>
    <!-- header -->
    <form name="myForm" id="myForm" method="POST">
        <div class="register_box_flex edit_profile_box">
            <div class="box_content2">
                <div class="txt_title">First Name *</div>
                <div class="txt_data">
                    <input type="text" class="input_login" id="txt_FirstName" name="txt_FirstName" value="<?=$txt_BillFirstName?>" maxlength="100">
                </div>
            </div>
            <div class="box_content2">
                <div class="txt_title">Last Name *</div>
                <div class="txt_data">
                    <input type="text" class="input_login" id="txt_LastName" name="txt_LastName" value="<?=$txt_BillLastName?>" maxlength="100">
                </div>
            </div>

            <div class="box_content2">
                <div class="txt_title">Phone *</div>
                <div class="txt_data">
                    <input type="text" class="input_login" id="txt_Phone" name="txt_Phone" maxlength="10" value="<?=$txt_BillPhone?>" onKeyPress="return CheckNumericKeyInfo(event.keyCode, event.which);">
                </div>
            </div>

            <div class="box_content2">
                <div class="txt_title">Email *</div>
                <div class="txt_data">
                    <input type="email" class="input_login" id="txt_Email" name="txt_Email" value="<?=$txt_BillEmail?>" maxlength="100" onChange="emailCheck(this);">
                </div>
            </div>

            <div class="box_content2">
                <div class="txt_title">House Number *</div>
                <div class="txt_data">
                    <input type="text" class="input_login" id="txt_No" name="txt_No" value="<?=$txt_BillNo?>" maxlength="100">
                </div>
            </div>

            <div class="box_content2">
                <div class="txt_title">Moo</div>
                <div class="txt_data">
                    <input type="text" class="input_login" id="txt_Moo" name="txt_Moo" value="<?=$txt_BillMoo?>" maxlength="100">
                </div>
            </div>


            <div class="box_content2">
                <div class="txt_title">Soi</div>
                <div class="txt_data">
                    <input type="text" class="input_login" id="txt_Soi" name="txt_Soi" value="<?=$txt_BillSoi?>" maxlength="100">
                </div>
            </div>

            <div class="box_content2">
                <div class="txt_title">Road</div>
                <div class="txt_data">
                    <input type="text" class="input_login" id="txt_Road" name="txt_Road" value="<?=$txt_BillRoad?>" maxlength="100">
                </div>
            </div>

            <div class="box_content2">
                <div class="txt_title">Province *</div>
                <div class="txt_data">
                    <select class="select_box" name="txt_Province" id="txt_Province" onchange="js_getAmpure(this.value);">
                        <option value="0">Province</option>
                        <?php
                            if($province_row > 0){
                                foreach($province as $val){
                                    if($txt_Province == $val['PROVINCE_ID']){
                                        $sel = "selected";
                                    }else{
                                        $sel = "";
                                    }
                                    echo '<option value="'.$val['PROVINCE_ID'].'" '.$sel.'>'.$val['PROVINCE_NAME'].'</option>';
                                }
                            }
                        ?>
                    </select>
                </div>
            </div>


            <div class="box_content2">
                <div class="txt_title">Area/District *</div>
                <div class="txt_data" id="area_ampure">
                    <select class="select_box" name="txt_Ampure" id="txt_Ampure" onchange="js_getTumbon(this.value);">
                        <option value="0">Area/District</option>
                        <?php
                        if($ampure_row > 0){
                            foreach($ampure as $val){
                                if($txt_Ampure == $val['AMPHUR_ID']){
                                    $sel = "selected";
                                }else{
                                    $sel = "";
                                }
                                echo '<option value="'.$val['AMPHUR_ID'].'" '.$sel.'>'.$val['AMPHUR_NAME'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>


            <div class="box_content2">
                <div class="txt_title">Sub-area/Sub-district *</div>
                <div class="txt_data" id="area_tumbon">
                    <select class="select_box" name="txt_Tumbon" id="txt_Tumbon">
                        <option value="0">Sub-area/Sub-district</option>
                        <?php
                        if($tumbon_row > 0){
                            foreach($tumbon as $val){
                                if($txt_Tumbon == $val['DISTRICT_ID']){
                                    $sel = "selected";
                                }else{
                                    $sel = "";
                                }
                                echo '<option value="'.$val['DISTRICT_ID'].'" '.$sel.'>'.$val['DISTRICT_NAME'].'</option>';
                            }
                        }
                        ?>
                    </select>
                </div>
            </div>

            <div class="box_content2">
                <div class="txt_title">Post Code</div>
                <div class="txt_data">
                    <input type="text" class="input_login" id="txt_Postcode" name="txt_Postcode" value="<?=$txt_BillPostcode?>" maxlength="5" onKeyPress="return CheckNumericKeyInfo(event.keyCode, event.which);" >
                </div>
            </div>

        </div>

        <div class="txt-center">
            <a href="javascript:void(0);" onclick="js_memberUpdateBill();">
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