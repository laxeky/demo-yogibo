<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="carts_background carts_step4">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <ul class="member_nav">
                    <li><a href="<?=site_url('member')?>">My Account</a></li>
                    <li class="active"><a href="<?=site_url('member/history')?>">Order History</a></li>
                    <li><a href="<?=site_url('member/wishlist')?>">Wish List</a></li>
                </ul>
            </div>
            <div class="col-lg-10">
                <div class="box_thankyou box_history_order">
                    <h1>Order History</h1>

                    <!-- box_thankyou_flex -->
                    <div class="box_thankyou_flex">
                        <div class="block1">
                            <span>Order date</span> : <?=$this->Object_model->getDateNumber($rs['_carts_CreateDate'])?>
                        </div>
                        <div class="block2">
                            <!-- <div class="box_thankyou_flex_start">
                                <input class="bnt_print" type="button" name="carts_product" value="">
                                <input class="bnt_download" type="button" name="carts_product" value="ดาวน์โหลดใบกำกับภาษี">
                            </div> -->
                        </div>
                    </div>
                    <!-- box_thankyou_flex -->

                    <!-- box_thankyou_flex -->
                    <div class="box_thankyou_flex">
                        <div class="block1">
                            <span>Order number</span> : <?=$this->Object_model->orderNo($rs['_carts_ID'])?>
                        </div>
                        <div class="block2"></div>
                    </div>
                    <!-- box_thankyou_flex -->   

                    <!-- box_thankyou_flex -->
                    <!-- <div class="box_thankyou_flex">
                        <div class="block1">
                            <span>ติดตามสินค้า</span> : <?=$this->Object_model->orderNo($rs['_carts_ID'])?>
                        </div>
                        <div class="block2"></div>
                    </div> -->
                    <!-- box_thankyou_flex -->  

                    <!-- box_thankyou_flex -->
                    <div class="box_thankyou_flex">
                        <div class="block1">
                            <span>Status</span> : <?=$this->Object_model->cartsStatus($rs['_carts_Step'])?>
                        </div>
                        <div class="block2"></div>
                    </div>
                    <!-- box_thankyou_flex -->  
                    
                </div>

                <?php
                    $ss_id = $rs['_carts_SessionID'];
                    $carts = $this->Object_model->getCartsList($ss_id);
                    $cartsRow = count($carts);

                    if($cartsRow > 0){
                ?>
                <div class="row">
                    <div class="col">
                        <h1 class="header_thankyou">Product Lists</h1>
                        <div class="cart_box_list">
                            <table>
                                <tr class="header">
                                    <td width="60%">Product</td>
                                    <td width="20%" class="txt_center">Number</td>
                                    <td width="20%" class="text-center">Price</td>
                                </tr>

                                <?php
                                $total_sum = 0;
                                $i = 1;
                                foreach ($carts as $val){
                                    $id = $val['_carts_item_ID'];
                                    $product_id = $val['_carts_item_ProductID'];

                                    if($val['_product_PricePromotion']){
                                    $_promotion_alert = true;
                                    $price = $val['_product_PricePromotion'];
                                    }else{
                                    $_promotion_alert = false;
                                    $price = $val['_product_Price'];
                                    }

                                    $_price = $price * $val['_carts_item_Unit'];
                                    $total_sum += $_price;
                                    $sum_price = $this->Object_model->number_money($_price);
                                ?>
                                
                                <tr class="content">
                                    <td>
                                        <div class="content_thumb_flex padding_thankyou">                                  
                                            <div class="block_data3">
                                                <div class="title">
                                                    <?=$val['_product_Title']?>
                                                </div>
                                                <div class="weight">
                                                    <div class="box_carts" style="margin:0; padding:0; background-color:#<?=$val['_carts_item_Color']?>;"></div> 
                                                </div>
                                            </div>
                                            <div class="block_data4">
                                                <div class="weight"><?=$val['_product_Weight']?></div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="txt_center padding_thankyou"><?=$val['_carts_item_Unit']?></div>
                                    </td>
                                    <td>
                                        <div class="money_box">
                                            <!-- <div class="carts_discount">฿ 960</div> -->
                                            <div class="carts_money">฿ <?=$sum_price?></div>
                                            <!-- <div class="carts_off">20%</div> -->
                                        </div>
                                    </td>
                                </tr>

                                <?php
                                    $i++;
                                }

                                $_delivery_id = $rs['_carts_Deliverly'];
                                $delivery = $this->Object_model->getDelivery($_delivery_id);
                                $delivery = $delivery[0];
                                    // print_r($delivery);

                                $_delivery_price = $delivery['_product_delivery_Price'];
                                $_total_all = $total_sum + $_delivery_price;
                                ?>
                                <!-- <tr class="content">
                                    <td>
                                        <div class="content_thumb_flex padding_thankyou">                                  
                                            <div class="block_data3">
                                                <div class="title">P80 Natural Essence</div>
                                            </div>
                                            <div class="block_data4">
                                                <div class="weight">260 มล.</div>
                                            </div>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="txt_center padding_thankyou">1</div>
                                    </td>
                                    <td>
                                        <div class="money_box">
                                            <div class="carts_discount">฿ 960</div>
                                            <div class="carts_money">฿ 500</div>
                                            <div class="carts_off">20%</div>
                                        </div>
                                    </td>
                                </tr> -->


                                <tr class="content doubleborderTop">                           
                                    <td colspan="2">
                                        <div class="text-right padding_thankyou"><?=$delivery['_product_delivery_Title']?></div>
                                    </td>
                                    <td>
                                        <div class="money_box">
                                            <div class="carts_money">฿ <?=$delivery['_product_delivery_Price']?></div>
                                        </div>
                                    </td>
                                </tr>

                                <tr class="content doubleborderBottom">
                                    <td colspan="2">
                                        <div class="text-right padding_thankyou txt_total">Total</div>
                                    </td>
                                    <td>
                                        <div class="money_box">
                                            <div class="txt_total">฿ <?=$this->Object_model->number_money($_total_all)?></div>
                                        </div>
                                    </td>
                                </tr>
                                
                            </table>
                        </div>


                        <div class="transport_address">    
                            <h1>Address delivery</h1>
                            <div class="detail">
                                <span><?=$rs["_carts_FirstName"]?> <?=$rs["_carts_LastName"]?></span>   <a href="tel:<?=$rs["_carts_Phone"]?>">(<?=$rs["_carts_Phone"]?>)</a><br>

                                <?php
                                    $txt_No     = $rs['_carts_No'];
                                    $txt_Moo    = $rs['_carts_Moo'];
                                    $txt_Soi    = $rs['_carts_Soi'];
                                    $txt_Road   = $rs['_carts_Road'];
                                ?>
                                <?=($txt_No)?"House Number ".$txt_No:"";?>
                                <?=($txt_Moo)?"Moo ".$txt_Moo:"";?>
                                <?=($txt_Soi)?"Soi ".$txt_Soi:"";?>
                                <?=($txt_Road)?"Road ".$txt_Road:"";?>
                                <?php
                                    $tum_id = $rs["_carts_Tumbon"];
                                    $_tum = $this->Object_model->getInfoTumbon($tum_id);
                                    echo " Sub-area/Sub-district ".$_tum["DISTRICT_NAME"];

                                    $amp_id = $rs["_carts_Ampure"];
                                    $_amp = $this->Object_model->getInfoAmpure($amp_id);
                                    echo " Area/District ".$_amp["AMPHUR_NAME"];

                                    $pro_id = $rs["_carts_Province"];
                                    $_province = $this->Object_model->getInfoProvince($pro_id);
                                    echo " Province ".$_province["PROVINCE_NAME"]." ".$rs['_carts_Postcode'];

                                ?>
                                
                            </div>
                        </div>


                        <div class="transport_address">    
                            <h1>Billing Info</h1>
                            <div class="detail">
                                <span><?=$rs["_carts_BillFirstName"]?> <?=$rs["_carts_BillLastName"]?></span>   <a href="tel:<?=$rs["_carts_BillPhone"]?>">(<?=$rs["_carts_BillPhone"]?>)</a><br>
                                <?php
                                    $txt_No     = $rs['_carts_BillNo'];
                                    $txt_Moo    = $rs['_carts_BillMoo'];
                                    $txt_Soi    = $rs['_carts_BillSoi'];
                                    $txt_Road   = $rs['_carts_BillRoad'];
                                ?>
                                <?=($txt_No)?"House Number ".$txt_No:"";?>
                                <?=($txt_Moo)?"Moo ".$txt_Moo:"";?>
                                <?=($txt_Soi)?"Soi ".$txt_Soi:"";?>
                                <?=($txt_Road)?"Road ".$txt_Road:"";?>
                                <?php
                                    $tum_id = $rs["_carts_BillTumbon"];
                                    $_tum = $this->Object_model->getInfoTumbon($tum_id);
                                    echo " Sub-area/Sub-district ".$_tum["DISTRICT_NAME"];

                                    $amp_id = $rs["_carts_BillAmpure"];
                                    $_amp = $this->Object_model->getInfoAmpure($amp_id);
                                    echo " Area/District ".$_amp["AMPHUR_NAME"];

                                    $pro_id = $rs["_carts_BillProvince"];
                                    $_province = $this->Object_model->getInfoProvince($pro_id);
                                    echo " Province ".$_province["PROVINCE_NAME"]." ".$rs['_carts_BillPostcode'];
                                ?>
                            </div>
                        </div>


                        <div class="transport_address">    
                            <h1>Payment</h1>
                            
                            <?php 
                            if($rs['_carts_PaymentType'] == 1){
                            ?>
                            <div class="transport_address_flex">
                                <!-- content -->
                                <div class="detail_tranfer1">
                                    <div class="detail bor_bt0">
                                        <div class="header"><span>PAYPAL</span></div>
                                        <!-- <div class="status">สถานะ </div> -->
                                    </div>
                                </div>
                                <!-- content -->
                            </div>
                            <?php
                            }else if($rs['_carts_PaymentType'] == 2){

                                $_bank = $rs['_carts_BankID'];
                                $bankInfo = $this->Object_model->getBank();
                                $bank = $bankInfo;
                                $bankRow = count($bankInfo);
                            ?>
                            <div class="transport_address_flex">
                                <!-- content -->
                                <div class="detail_tranfer1">
                                    <div class="detail bor_bt0">
                                        <div class="header"><span>ATM</span><br>โอนเงินผ่านธนาคาร</div>
                                        <?php 
                                        if($bankRow > 0){
                                            foreach($bank as $val){
                                        ?>
                                            <div class="payment_detail">
                                                <div class="bank"><?=$val['_product_bank_Title']?></div>
                                                ชื่อบัญชี : <?=$val['_product_bank_Name']?><br>
                                                ประเภทบัญชี : <?=$val['_product_bank_Type']?><br>
                                                เลขที่บัญชี : <?=$val['_product_bank_No']?><br>
                                                <!-- สาขา : ชิดลม -->
                                            </div>

                                        <?php 
                                            }
                                        }
                                        ?>
                                    </div>
                                </div>
                                <!-- content -->
                            </div>
                            <?php 
                            }
                            ?>

                        </div>
                        
                        <?php
                        if($rs['_carts_PaymentType'] == 2){
                        ?>
                        <div class="transport_address">
                            <div class="remark">
                                Please pay within 48 hours if you do not pay within this time. Your order will be canceled.
                            </div>
                        </div>
                        <?php 
                        }
                        ?>

                    </div>

                </div>

                <?php 
                    }
                    // end if carts rows
                ?>

                <div class="row">
                    <div class="col text-center">
                        <a href="<?=site_url('member/history')?>">
                            <input type="button" class="bnt_order bnt_history" name="order" value="back to Order History">
                        </a>
                    </div>
                </div>
                
            </div>
        </div>
        
    </div>
</div>
