<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$_item_sum  = 0;
$_price_sum = 0;
$_total_sum = 0;

if($cartsRow > 0){
    foreach ($carts as $key => $val) {

        $price_normal   = $val['_product_Price'];
        $price_promotion= $val['_product_PricePromotion'];
        $price          = !empty($price_promotion)?$price_promotion:$price_normal;

        $_item_sum  += $val['_carts_item_Unit'];
        $_price_sum += $price * $val['_carts_item_Unit'];
    }
}

// deliverly
if(($this->session->userdata('session_carts_delivery')) != null){
    $_delivery_id   = $this->session->userdata('session_carts_delivery');
    $data_delivery  = $this->Object_model->getDelivery($_delivery_id);
    $_delivery_price = $data_delivery[0]['_product_delivery_Price'];
}else{
    $_delivery_price = 0;
}

$_total_sum = $_price_sum + $_delivery_price;
?>

<div class="carts_summary_block">
    <div class="header">สรุปรายการสั่งซื้อ</div>
    <!-- <div class="content">
        <div class="txt_title">เลือกสกุลเงิน</div>
        <div class="txt_title">
            <input type="radio" name="txt_MoneyType" id="txt_MoneyType1" value="THB" > 
            <label for="txt_MoneyType1">THB</label>
            &nbsp;&nbsp;&nbsp;
            <input type="radio" name="txt_MoneyType" id="txt_MoneyType2" value="USD" > 
            <label for="txt_MoneyType2">USD</label>
        </div>
    </div> -->
    <div class="product_carts">
        <input type="hidden" id="txt_Total" name="txt_Total">
        <h4>รายการสินค้าทั้งหมด</h4>
        <div class="product_items_list"><span id="carts_total_item"><?=$_item_sum?></span> รายการ</div>
        <div class="product_carts_flex">
            <div class="block_data">ยอดรวม</div>
            <div class="block_data right"><span class="baht">฿</span> <span id="carts_total_sum"><?=$this->Object_model->number_money($_price_sum)?></span></div>

            <div class="block_data">ค่าจัดส่ง</div>
            <div class="block_data right"><span class="baht">฿</span> <?=$this->Object_model->number_money($_delivery_price)?></div>
        </div>
        <div class="product_carts_flex">
            <div class="block_data">ยอดรวมทั้งสิ้น</div>
            <div class="block_data right txt_summary"><span class="baht">฿</span> <?=$this->Object_model->number_money($_total_sum)?></div>
        </div>
        <input type="hidden" name="txt_sumTotal" id="txt_sumTotal" value="<?=$_price_sum?>" >
        <input type="hidden" name="txt_sumDelivery" id="txt_sumDelivery" value="<?=$this->session->userdata('session_carts_delivery')?>" >
    </div>
    <?php
    if($hideButton != 1){
    ?>
    <a href="javascript:void(0);" onclick="js_carts_step1();">
        <div class="bnt_order bnt_product_carts">ดำเนินการต่อ</div>
    </a>
    <?php 
    }
    ?>

</div>