<?php
defined('BASEPATH') OR exit('No direct script access allowed');

// print_r($_SESSION);
// print_r($rs);
?>
<div class="carts_background carts_step4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="txt_thankyou">Thank you for your order Yogibo<br>We already received your order.</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="box_thankyou">
                    <h1>Summary</h1>

                    <!-- box_thankyou_flex -->
                    <div class="box_thankyou_flex">
                        <div class="block1">
                            <span>Date of Order</span> : <?=$this->Object_model->getDateNumber($rs['_carts_CreateDate'])?>
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
                            <span>Order Number</span> : <?=$this->Object_model->orderNo($rs['_carts_ID'])?>
                        </div>
                        <div class="block2"></div>
                    </div>
                    <!-- box_thankyou_flex -->   
                    
                </div>
            </div>
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
                            <td width="60%">Product Name</td>
                            <td width="20%" class="txt_center">Qty</td>
                            <td width="20%" class="text-center">Subtotal</td>
                        </tr>

                        <?php
                        $total_sum = 0;
                        $i = 1;
                        foreach ($carts as $val){
                            $id = $val['_carts_item_ID'];
                            $product_id = $val['_carts_item_ProductID'];

                            $price_normal       = $val['_product_Price'];
                            $price_promotion    = $val['_product_PricePromotion'];

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
                                        <div class="title"><?=$val['_product_Title']?></div>
                                        <div class="weight">
                                            <div class="box_carts" style="margin:0; padding:0; background-color:#<?=$val['_carts_item_Color']?>;"></div> 
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="txt_center padding_thankyou"><?=$val['_carts_item_Unit']?></div>
                            </td>
                            <td>
                                <div class="money_box">
                                    <?php 
                                    if(!empty($price_promotion)){
                                    ?>
                                        <div class="discount_price">฿ <?=$this->Object_model->number_money($price_normal * $val['_carts_item_Unit'])?></div>
                                    <?php
                                    }
                                    ?>
                                    <div class="carts_money"><span>฿</span> <?=$sum_price?></div>
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
  
                        <tr class="content doubleborderTop">
                            
                            <td colspan="2">
                                <div class="text-right padding_thankyou"><?=$delivery['_product_delivery_Title']?></div>
                            </td>
                            <td>
                                <div class="money_box">
                                    <div class="carts_money"><span>฿</span> <?=$delivery['_product_delivery_Price']?></div>
                                </div>
                            </td>
                        </tr>

                        <tr class="content doubleborderBottom">
                            <td colspan="2">
                                <div class="text-right padding_thankyou txt_total">Grand Total</div>
                            </td>
                            <td>
                                <div class="money_box">
                                    <div class="txt_total"><span>฿</span> <?=$this->Object_model->number_money($_total_all)?></div>
                                </div>
                            </td>
                        </tr>
                        
                    </table>
                </div>


                <div class="transport_address">    
                    <h1>Shipping Info</h1>
                    <div class="detail">
                        <span><?=$rs["_carts_FirstName"]?> <?=$rs["_carts_LastName"]?></span>   <a href="tel:<?=$rs["_carts_Phone"]?>">(<?=$rs["_carts_Phone"]?>)</a><br>

                        <?php
                            $txt_No     = $rs['_carts_No'];
                            $txt_Moo    = $rs['_carts_Moo'];
                            $txt_Soi    = $rs['_carts_Soi'];
                            $txt_Road   = $rs['_carts_Road'];
                        ?>
                        <?=($txt_No)?"บ้านเลขที่ ".$txt_No:"";?>
                        <?=($txt_Moo)?"หมู่ที่ ".$txt_Moo:"";?>
                        <?=($txt_Soi)?"ซอย ".$txt_Soi:"";?>
                        <?=($txt_Road)?"ถนน ".$txt_Road:"";?>
                        <?php
                            $tum_id = $rs["_carts_Tumbon"];
                            $_tum = $this->Object_model->getInfoTumbon($tum_id);
                            echo " แขวง/ตำบล ".$_tum["DISTRICT_NAME"];

                            $amp_id = $rs["_carts_Ampure"];
                            $_amp = $this->Object_model->getInfoAmpure($amp_id);
                            echo " เขต/อำเภอ ".$_amp["AMPHUR_NAME"];

                            $pro_id = $rs["_carts_Province"];
                            $_province = $this->Object_model->getInfoProvince($pro_id);
                            echo " จังหวัด ".$_province["PROVINCE_NAME"]." ".$rs['_carts_Postcode'];

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
                        <?=($txt_No)?"บ้านเลขที่ ".$txt_No:"";?>
                        <?=($txt_Moo)?"หมู่ที่ ".$txt_Moo:"";?>
                        <?=($txt_Soi)?"ซอย ".$txt_Soi:"";?>
                        <?=($txt_Road)?"ถนน ".$txt_Road:"";?>
                        <?php
                            $tum_id = $rs["_carts_BillTumbon"];
                            $_tum = $this->Object_model->getInfoTumbon($tum_id);
                            echo " แขวง/ตำบล ".$_tum["DISTRICT_NAME"];

                            $amp_id = $rs["_carts_BillAmpure"];
                            $_amp = $this->Object_model->getInfoAmpure($amp_id);
                            echo " เขต/อำเภอ ".$_amp["AMPHUR_NAME"];

                            $pro_id = $rs["_carts_BillProvince"];
                            $_province = $this->Object_model->getInfoProvince($pro_id);
                            echo " จังหวัด ".$_province["PROVINCE_NAME"]." ".$rs['_carts_BillPostcode'];
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
                                <div class="status">status Complete</div>                     
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

                        <!-- content -->
                        <!-- <div class="detail_tranfer2">
                            <div>เมื่อโอนเงินเรียบร้อยแล้ว กรุณาแจ้งหลักฐานการโอนเงินได้ 3 ช่องทาง</div>
                            <ul>
                                <li><span>1</span> แจ้งผ่านทางเว็บไซต์ <a href="<?=site_url('paymentconfirm')?>">www.p80naturalessence.com/paymentconfirm</a></li>
                                <li><span>2</span> แจ้งผ่าน Line <a href="http://line.me/ti/p/~@p80naturalessence">@P80NaturalEssence</a> หรือ <a href="https://www.facebook.com/P80Official/">www.facebook.com/P80official</a></li>
                                <li><span>3</span> แจ้งผ่านอีเมล <a href="mailto:p80.natural@gmail.com">p80.natural@gmail.com</a></li>
                            </ul>
                        </div> -->
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
                        Please make payment within 48 hours. If you don’t pay within 48 hours. Your order will be canceled.
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

        <!-- <div class="row">
            <div class="col text-center">
                <a href="javascript:void(0);" onclick="window.print();">
                    <input type="button" class="bnt_order" name="order" value="พิมพ์">
                </a>
            </div>
        </div> -->
        
    </div>
</div>
