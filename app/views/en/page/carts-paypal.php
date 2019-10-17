<?php
defined('BASEPATH') OR exit('No direct script access allowed');

?>
<div class="carts_background carts_step4">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="paypal_box">
                    <h1 class="title">please wait... <br>The system will now proceed to the PayPal website to make a payment.</h1>

                    <?php 
                        // print_r($_SESSION);
                        $order_id = $this->session->userdata('session_order_id');
                        $rs	= $this->Object_model->getOrderInfo($order_id);

                        $ss_id = $rs['_carts_SessionID'];
                        $return_id = base64_encode($order_id);
                        $orderNo = $this->Object_model->orderNo($rs['_carts_ID']);
                        $carts = $this->Object_model->getCartsList($ss_id);
                        $cartsRow = count($carts);
                        // print_r($carts);

                        $_allProduct = '';
                        $_item_sum  = 0;
                        $_price_sum = 0;
                        $_total_sum = 0;
                        $_product_name = array();

                        if($cartsRow > 0){
                            foreach ($carts as $key => $val) {

                                if($val['_product_PricePromotion']){
                                    $price = $val['_product_PricePromotion'];
                                }else{
                                    $price = $val['_product_Price'];
                                }
                                    
                                $_product_name[$key] = $val['_product_Title']." x ".$val['_carts_item_Unit'];
                                $_item_sum  += $val['_carts_item_Unit'];
                                $_price_sum += $price * $val['_carts_item_Unit'];
                            }
                            // print_r($_product_name);
                            $_allProduct = implode(' ,',$_product_name);
                        }

                        $_delivery_id   = $rs['_carts_Deliverly'];
            			$delivery       = $this->Object_model->getDelivery($_delivery_id);
            			$delivery       = $delivery[0];
                        // print_r($delivery);

                        $_delivery_price = $delivery['_product_delivery_Price'];
                        // $_total_all = $total_sum + $_delivery_price;  
                        $_total_sum = $_price_sum + $_delivery_price;
                        // $_sum_price = 

                        $txt_No     = $rs['_carts_No'];
                        $txt_Moo    = $rs['_carts_Moo'];
                        $txt_Soi    = $rs['_carts_Soi'];
                        $txt_Road   = $rs['_carts_Road'];

                        $tum_id = $rs["_carts_Tumbon"];
                        $_tum   = $this->Object_model->getInfoTumbon($tum_id);

                        $amp_id = $rs["_carts_Ampure"];
                        $_amp   = $this->Object_model->getInfoAmpure($amp_id);

                        $pro_id     = $rs["_carts_Province"];
                        $_province  = $this->Object_model->getInfoProvince($pro_id);
                        // echo $_tum["DISTRICT_NAME"];

                        

                    ?>
                    <form action="https://secure.paypal.com/uk/cgi-bin/webscr" method="post" name="paypal" id="paypal">
                        <!-- Prepopulate the PayPal checkout page with customer details, -->
                        <input type="hidden" name="first_name" value="<?php echo $rs["_carts_FirstName"]?>">
                        <input type="hidden" name="last_name" value="<?php echo $rs["_carts_LastName"]?>">
                        <input type="hidden" name="email" value="<?php echo $rs["_carts_Email"]?>">
                        <input type="hidden" name="phone" value="<?php echo $rs["_carts_Phone"]?>">
                        <input type="hidden" name="address1" value="<?=($txt_No)?$txt_No:"";?> <?=($txt_Moo)?"หมู่ ".$txt_Moo:"";?> <?=($txt_Soi)?"ซ. ".$txt_Soi:"";?> <?=($txt_Road)?"ถ. ".$txt_Road:"";?>">
                        <input type="hidden" name="address2" value="<?php echo " ".$_tum["DISTRICT_NAME"]?>">
                        <input type="hidden" name="city" value="<?php echo $_amp["AMPHUR_NAME"]?>">
                        <input type="hidden" name="province" value="<?php echo $_province["PROVINCE_NAME"]?>">
                        <input type="hidden" name="country" value="TH">
                        <input type="hidden" name="zip" value="<?php echo $rs['_carts_Postcode']?>">
                        <input type="hidden" name="day_phone_a" value="<?php echo $rs["_carts_Phone"]?>">
                        <input type="hidden" name="day_phone_b" value="<?php echo $rs["_carts_Phone"]?>">

                        <!-- We don't need to use _ext-enter anymore to prepopulate pages -->
                        <!-- cmd = _xclick will automatically pre populate pages -->
                        <!-- More information: https://www.x.com/docs/DOC-1332 -->
                        <input type="hidden" name="cmd" value="_xclick" />
                        <input type="hidden" name="business" value="mukda.leannes@gmail.com" />
                        <input type="hidden" name="cbt" value="YOGIBO Co., Ltd." />
                        <input type="hidden" name="currency_code" value="THB" />

                        <!-- Allow the customer to enter the desired quantity -->
                        <!-- <input type="hidden" name="quantity" value="1" /> -->
                        <input type="hidden" name="item_name" value="<?=$_allProduct?>" />

                        <!-- Custom value you want to send and process back in the IPN -->
                        <input type="hidden" name="custom" value="<?php echo $ss_id?>" />

                        <input type="hidden" name="shipping" value="<?php echo $_delivery_price; ?>" />
                        <input type="hidden" name="invoice" value="<?php echo $orderNo ?>" />
                        <input type="hidden" name="amount" value="<?php echo $_price_sum; ?>" />
                        <input type="hidden" name="return" value="<?php echo site_url('carts/step4?bid='.$return_id)?>"/>
                        <input type="hidden" name="cancel_return" value="<?php echo site_url('carts/cancel?bid='.$return_id)?>" />

                        <!-- Where to send the PayPal IPN to. -->
                        <input type="hidden" name="notify_url" value="<?php echo site_url('carts')?>" />

                        <!-- <input type="button" class="bnt_order" name="order" value="ตกลง" onclick=" $('#paypal').submit();"> -->
                    </form>

                    <script>
                        $('#paypal').submit();
                    </script>
                </div>
            </div>
        </div>
    </div>
</div>
