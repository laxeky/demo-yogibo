<?php
defined('BASEPATH') OR exit('No direct script access allowed');
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

                    <div class="carts_point step3 active">
                        <div class="point"></div>
                        <div class="text active">Payment</div>
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
                <h1>Payment Method</h1>
                <input type="hidden" id="txt_WayPayment" name="txt_WayPayment" value="<?=$txt_WayPayment?>">
                <!-- payment box -->
                <div class="payment_box">
                    <div class="payment_box_header_flex">
                        <!-- <div id="bnt_payment1" class="block br0 active" onclick="js_select_payment(1);">
                            <img src="<?=base_url('img/payment/icon-paypal.png')?>" alt="PAYPAL">
                            <h5>CREDIT CARD</h5>
                            <div>or PayPal</div>
                        </div> -->

                        <!-- <div class="block br0">
                            <img src="<?=base_url('img/payment/icon-online-banking.png')?>" alt="online banking payment">
                        </div> -->

                        <div id="bnt_payment2" class="block"  onclick="js_select_payment(2);">
                            <img src="<?=base_url('img/payment/icon-tranfer.png')?>" alt="ATM">
                            <h5>ATM</h5>
                            <div>Bank Transfer</div>
                        </div>
                    </div>
                    <div class="payment_box_info">
                        <!-- info content -->
                        <div id="payment_box1" class="payment_info" style="display:none;">
                            <div class="title">
                                <h2>The system will proceed to the PayPal website to complete the transaction.</h2>
                                <div class="text-center">
                                    <div class="bnt_order transport_step3" name="payment" onclick="js_carts_step3();">Confirm</div>
                                </div>
                            </div>
                        </div>
                        <!-- info content -->
                        <!-- info content -->
                        <div id="payment_box2" class="payment_info" >
                            <div class="title">
                                Please make payment within 48 hours. If you don’t pay within 48 hours.<br>
                                Your order will be canceled.
                                </div>
                            
                            <div class="payment_info_flex">  

                                <div class="bank_box">
                                <?php 
                                    if($bankRow > 0){
                                        foreach($bank as $val){
                                ?>
                                        <div class="payment_detail">
                                            <div class="bank"><?=$val['_product_bank_Title']?></div>
                                            Account Name : <?=$val['_product_bank_Name']?><br>
                                            Account Type : <?=$val['_product_bank_Type']?><br>
                                            Account Number : <?=$val['_product_bank_No']?><br>
                                            
                                        </div>
                                <?php 
                                    }
                                }
                                ?>
                                </div>  

                            </div>

                            <div class="text-center">
                                <div class="bnt_order transport_step3" name="payment" onclick="js_carts_step3();">Confirm</div>
                            </div>
                        </div>
                        <!-- info content -->
                    </div>
                </div>
                <!-- payment box -->

                <!-- <div class="transport_step3">    
                    <input type="button" class="bnt_order" name="payment" value="ยืนยัน" onclick="js_carts_step3();">
                </div> -->

            </div>
            <div class="col-lg-3" id="carts_summary"></div>

        </div>
        <div class="row">
            <div class="col">
                <div class="carts_line">
                    <a href="<?=site_url('carts/step2')?>">
                        <input class="bnt_product_back" type="button" name="carts_product" value="< Billing & Shipping">
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