<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// print_r($_SESSION);
?>
<form id="cartsForm" name="cartsForm" method="POST" >
<div class="carts_background">
    <div class="container">
        <div class="row">
            <div class="col-lg-2"></div>
            <div class="col-lg-8">
                <!-- nav order -->
                <div class="carts_nav">
                    <div class="carts_point active">
                        <div class="point"></div>
                        <div class="text active">Shopping Cart</div>
                    </div>

                    <div class="carts_point step2 active">
                        <div class="point"></div>
                        <div class="text active">Billing & Shipping</div>
                    </div>

                    <div class="carts_point step3">
                        <div class="point"></div>
                        <div class="text">Payment</div>
                    </div>

                    <div class="carts_point step4">
                        <div class="point"></div>
                        <div class="text">Summary</div>
                    </div>

                </div>
                <!-- nav order -->
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class="row">
            <div class="col-lg-9">
                <h1>Shipping Info</h1>
                <div class="cart_box_send_product">

                    <!-- block -->
                    <div class="cart_box_send_product_flex">
                        <div class="block">
                            <div class="title">First Name*</div>
                            <input type="text" class="input_login" id="txt_FirstName" name="txt_FirstName" value="<?=$txt_FirstName?>" maxlength="100">
                        </div>
                        <div class="block">
                            <div class="title">Last Name*</div>
                            <input type="text" class="input_login" id="txt_LastName" name="txt_LastName"  value="<?=$txt_LastName?>" maxlength="100">
                        </div>
                        <div class="block">
                            <div class="title">Mobile Number*</div>
                            <input type="text" class="input_login" id="txt_Phone" name="txt_Phone" value="<?=$txt_Phone?>" maxlength="10" onKeyPress="return CheckNumericKeyInfo(event.keyCode, event.which);" >
                        </div>         
                    </div>
                    <!-- block -->

                    <!-- block -->
                    <div class="cart_box_send_product_flex">
                        <div class="block">
                            <div class="title">E-mail*</div>
                            <input type="text" class="input_login" id="txt_Email" name="txt_Email" value="<?=$txt_Email?>" maxlength="100" onChange="emailCheck(this);">
                        </div>
                        <div class="block">
                            <div class="title">House Number*</div>
                            <input type="text" class="input_login" id="txt_No" name="txt_No" value="<?=$txt_No?>" maxlength="100">
                        </div>
                        <div class="block">
                            <div class="title">Moo</div>
                            <input type="text" class="input_login" id="txt_Moo" name="txt_Moo" value="<?=$txt_Moo?>" maxlength="50">
                        </div>         
                    </div>
                    <!-- block -->

                    <!-- block -->
                    <div class="cart_box_send_product_flex">
                        <div class="block">
                            <div class="title">Soi</div>
                            <input type="text" class="input_login" id="txt_Soi" name="txt_Soi" value="<?=$txt_Soi?>" maxlength="100">
                        </div>
                        <div class="block">
                            <div class="title">Road</div>
                            <input type="text" class="input_login" id="txt_Road" name="txt_Road" value="<?=$txt_Road?>" maxlength="100">
                        </div>
                        <div class="block">
                            <div class="title">Province*</div>
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
                                        echo '<option value="'.$val['PROVINCE_ID'].'" '.$sel.'>'.$val['PROVINCE_NAME_EN'].'</option>';
                                        }
                                    }
                                ?>
                            </select>
                        </div>         
                    </div>
                    <!-- block -->

                    <!-- block -->
                    <div class="cart_box_send_product_flex">
                        <div class="block">
                            <div class="title">Area/District*</div>
                            <div id="area_ampure">
                                <select class="select_box" name="txt_Ampure" id="txt_Ampure">
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
                        <div class="block">
                            <div class="title">Sub-area/Sub-district*</div>
                            <div id="area_tumbon">
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
                        <div class="block">
                            <div class="title">Post Code</div>
                            <input type="text" class="input_login" id="txt_Postcode" name="txt_Postcode" value="<?=$txt_Postcode?>" maxlength="5" onKeyPress="return CheckNumericKeyInfo(event.keyCode, event.which);">
                        </div>         
                    </div>
                    <!-- block -->

                </div>


                <div class="transport_way">    
                    <h1>Billing Info</h1>
                    <div class="transport_box_flex">
                        <div class="transport_block transport_block_edit2">
                            <input type="radio" name="txt_Billing" id="txt_Billing1" value="1" onclick="js_billing(1);" <?=($txt_Billing == 1 || $txt_Billing == '')?"checked":""?> >
                            <label for="txt_Billing1">
                                Same as shipping address
                            </label>
                        </div>
                        <div class="transport_block transport_block_edit3 bl_dis">
                            <input type="radio" name="txt_Billing" id="txt_Billing2" value="2" onclick="js_billing(2);" <?=($txt_Billing == 2)?"checked":""?>>
                            <label for="txt_Billing2">
                                Different Address
                            </label>        
                        </div>
                    </div>
                    
                    <?php
                    // echo "111 : ".$txt_Billing;
                    ?>
                    <!-- other billing -->
                    <div id="area_billing" style="display:<?=($txt_Billing == 1 || $txt_Billing == null || $txt_Billing == '0')?"none":""?>;">
                        <h1 class="header_billing">Address for tax invoice</h1>
                        <div class="cart_box_send_product">

                            <!-- block -->
                            <div class="cart_box_send_product_flex">
                                <div class="block">
                                    <div class="title">First Name*</div>
                                    <input type="text" class="input_login" id="txt_BillFirstName" name="txt_BillFirstName" maxlength="100" value="<?=$txt_BillFirstName?>">
                                </div>
                                <div class="block">
                                    <div class="title">Last Name*</div>
                                    <input type="text" class="input_login" id="txt_BillLastName" name="txt_BillLastName" maxlength="100" value="<?=$txt_BillLastName?>">
                                </div>
                                <div class="block">
                                    <div class="title">Mobile Number*</div>
                                    <input type="text" class="input_login" id="txt_BillPhone" name="txt_BillPhone" maxlength="10" value="<?=$txt_BillPhone?>" onKeyPress="return CheckNumericKeyInfo(event.keyCode, event.which);">
                                </div>         
                            </div>
                            <!-- block -->

                            <!-- block -->
                            <div class="cart_box_send_product_flex">
                                <div class="block">
                                    <div class="title">Email*</div>
                                    <input type="text" class="input_login" id="txt_BillEmail" name="txt_BillEmail" maxlength="100" value="<?=$txt_BillEmail?>" onChange="emailCheck(this);">
                                </div>
                                <div class="block">
                                    <div class="title">House Number*</div>
                                    <input type="text" class="input_login" id="txt_BillNo" name="txt_BillNo" maxlength="100" value="<?=$txt_BillNo?>">
                                </div>
                                <div class="block">
                                    <div class="title">Moo</div>
                                    <input type="text" class="input_login" id="txt_BillMoo" name="txt_BillMoo" maxlength="100" value="<?=$txt_BillMoo?>">
                                </div>         
                            </div>
                            <!-- block -->

                            <!-- block -->
                            <div class="cart_box_send_product_flex">
                                <div class="block">
                                    <div class="title">Soi</div>
                                    <input type="text" class="input_login" id="txt_BillSoi" name="txt_BillSoi" maxlength="100" value="<?=$txt_BillSoi?>">
                                </div>
                                <div class="block">
                                    <div class="title">Road</div>
                                    <input type="text" class="input_login" id="txt_BillRoad" name="txt_BillRoad" maxlength="100" value="<?=$txt_BillRoad?>">
                                </div>
                                <div class="block">
                                    <div class="title">Province*</div>
                                    <select class="select_box" name="txt_BillProvince" id="txt_BillProvince" onchange="js_getBillAmpure(this.value);">
                                        <option value="0">Province</option>
                                        <?php
                                            if($province_row > 0){
                                                foreach($province as $val){
                                                if($txt_BillProvince == $val['PROVINCE_ID']){
                                                    $sel = "selected";
                                                }else{
                                                    $sel = "";
                                                }
                                                echo '<option value="'.$val['PROVINCE_ID'].'" '.$sel.'>'.$val['PROVINCE_NAME_EN'].'</option>';
                                                }
                                            }
                                        ?>
                                    </select>
                                </div>         
                            </div>
                            <!-- block -->

                            <!-- block -->
                            <div class="cart_box_send_product_flex">
                                <div class="block">
                                    <div class="title">Area/District*</div>
                                    <div id="area_ampure_bill">
                                        <select class="select_box" name="txt_BillAmpure" id="txt_BillAmpure" onchange="js_getBillTumbon(this.value);">
                                            <option value="0">Area/District</option>
                                            <?php
                                            if($ampureBill_row > 0){
                                                foreach($ampureBill as $val){
                                                    if($txt_BillAmpure == $val['AMPHUR_ID']){
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
                                <div class="block">
                                    <div class="title">Sub-area/Sub-district*</div>
                                    <div id="area_tumbon_bill">
                                        <select class="select_box" name="txt_BillTumbon" id="txt_BillTumbon">
                                            <option value="0">Sub-area/Sub-district</option>
                                            <?php
                                            if($tumbonBill_row > 0){
                                                foreach($tumbonBill as $val){
                                                    if($txt_BillTumbon == $val['DISTRICT_ID']){
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
                                <div class="block">
                                    <div class="title">Post Code</div>
                                    <input type="text" class="input_login" id="txt_BillPostcode" name="txt_BillPostcode" maxlength="5" value="<?=$txt_BillPostcode?>" onKeyPress="return CheckNumericKeyInfo(event.keyCode, event.which);">
                                </div>         
                            </div>
                            <!-- block -->

                        </div>
                    </div>
                    <!-- other billing -->
                    <div class="bnt_order bnt_top _web" name="order" onclick="js_carts_step2();">Continue</div>

                </div>

            </div>
            
            <div class="col-lg-3" id="carts_summary">
            </div>

            <div class="col-12 text-center _mobile">
                <div class="bnt_order bnt_top " name="order" onclick="js_carts_step2();">ดำเนินการต่อ</div>
            </div>

        </div>
        <div class="row">
            <div class="col">
                <div class="carts_line">
                    <a href="<?=site_url('carts')?>">
                        <input class="bnt_product_back" type="button" name="carts_product" value="<   Back to Shopping Cart">
                    </a>
                </div>
            </div>
        </div>
    </div>
    
</div>
</form>

<script>
    $('select').selectric();
    // load carts list
    js_carts_summary(1);
</script>