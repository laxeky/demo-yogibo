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
                        <div class="text active">ตระกร้าสินค้า</div>
                    </div>

                    <div class="carts_point step2 active">
                        <div class="point"></div>
                        <div class="text active">ข้อมูลการจัดส่ง</div>
                    </div>

                    <div class="carts_point step3 active">
                        <div class="point"></div>
                        <div class="text active">การชำระเงิน</div>
                    </div>

                    <div class="carts_point step4">
                        <div class="point"></div>
                        <div class="text">สรุปรายการสั่งซื้อ</div>
                    </div>

                </div>
                <!-- nav order -->
            </div>
            <div class="col-lg-2"></div>
        </div>

        <div class="row">
            <div class="col-lg-9">
                <h1>การชำระเงิน</h1>
                <input type="hidden" id="txt_WayPayment" name="txt_WayPayment" value="<?=$txt_WayPayment?>">
                <!-- payment box -->
                <div class="payment_box">
                    <div class="payment_box_header_flex">
                        <div id="bnt_payment1" class="block br0 active" onclick="js_select_payment(1);">
                            <img src="<?=base_url('img/payment/icon-paypal.png')?>" alt="PAYPAL">
                            <h5>บัตรเครดิต</h5>
                            <div>หรือ PayPal</div>
                        </div>

                        <!-- <div class="block br0">
                            <img src="<?=base_url('img/payment/icon-online-banking.png')?>" alt="online banking payment">
                        </div> -->

                        <!-- <div id="bnt_payment2" class="block"  onclick="js_select_payment(2);">
                            <img src="<?=base_url('img/payment/icon-tranfer.png')?>" alt="ATM">
                            <h5>เอทีเอ็ม</h5>
                            <div>โอนเงินผ่าน เอทีเอ็ม</div>
                        </div> -->
                    </div>
                    <div class="payment_box_info">
                        <!-- info content -->
                        <div id="payment_box1" class="payment_info" style="display:none;">
                            <div class="title">
                                <h2>ระบบจะดำเนินการไปยังเว็บไซต์ของ PayPal เพื่อทำรายการ</h2>
                                <div class="text-center">
                                    <div class="bnt_order transport_step3" name="payment" onclick="js_carts_step3();">ยืนยัน</div>
                                </div>
                            </div>
                        </div>
                        <!-- info content -->
                        <!-- info content -->
                        <div id="payment_box2" class="payment_info" >
                            <div class="title">
                                กรุณาชำระค่าสินค้าภายใน 48 ชั่วโมง หากท่านไม่ชำระภายในเวลาดังกล่าว การสั่งสินค้าของท่านจะถูกยกเลิก
                                </div>
                            
                            <div class="payment_info_flex">  

                                <div class="bank_box">
                                <?php 
                                    if($bankRow > 0){
                                        foreach($bank as $val){
                                ?>
                                        <div class="payment_detail">
                                            <div class="bank"><?=$val['_product_bank_TitleEn']?></div>
                                            ชื่อบัญชี : <?=$val['_product_bank_NameEn']?><br>
                                            ประเภทบัญชี : <?=$val['_product_bank_TypeEn']?><br>
                                            เลขที่บัญชี : <?=$val['_product_bank_No']?><br>
                                            
                                        </div>
                                <?php 
                                    }
                                }
                                ?>
                                </div>  

                            </div>

                            <div class="text-center">
                                <div class="bnt_order transport_step3" name="payment" onclick="js_carts_step3();">ยืนยัน</div>
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
                        <input class="bnt_product_back" type="button" name="carts_product" value="< ข้อมูลการจัดส่ง">
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