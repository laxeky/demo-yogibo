<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<table>
    <tr class="header">
        <td width="60%">Product Name</td>
        <td width="20%">Qty</td>
        <td width="20%">Subtotal</td>
    </tr>
    <?php
    $_item_sum  = 0;
    $_total_sum = 0;
    
    if($cartsRow > 0){
      foreach ($carts as $key => $val) {

        $id             = $val['_carts_item_ID'];
        $product_id     = $val['_product_ID'];
        $id_del         = $val['_carts_item_ID'];
        $price_normal   = $val['_product_Price'];
        $price_promotion= $val['_product_PricePromotion'];

        $price          = !empty($price_promotion)?$price_promotion:$price_normal;

        if(!empty($val['_gallery_Image'])){
            $product_img = base_url('myAdmin/upload/_product/' . $val['_gallery_Image']);
        }else{
            $product_img = base_url('myAdmin/upload/_product/gallery/' . $val['_gallery_Image2']);
        }
        
    ?>
    <tr class="content">
        <td>
            <div class="content_thumb_flex">
                <div class="block_data1 cart_img_hide">
                    <img src="<?=$product_img?>">
                </div>
                <div class="block_data2">
                    <div class="title"><?=$val['_product_Title']?></div>
                    <div class="weight">
                        <div class="box_carts" style="background-color:#<?=$val['_carts_item_Color']?>"></div> 
                    </div>
                    <div class="icon_close">
                        <a href="javascript:void(0);" onclick="js_carts_del(<?=$id_del?>)">
                            <img src="<?=base_url('img/carts/icon_close.jpg')?>">
                        </a>
                    </div>
                </div>
            </div>
        </td>
        <td>
            <div class="carts_number_flex">
                <div class="box_block" onclick="js_carts_update_unit('<?=$id?>',$('#txt_Number<?=$id?>').val()*1-1);">-</div>
                <div class="box_number">
                    <input type="number" class="input_carts2" name="txt_Number" id="txt_Number<?=$id?>" value="<?=$val['_carts_item_Unit']?>" min="1" max="999" maxlength="3" onchange="js_carts_update_unit('<?=$product_id?>',this.value);" onKeyPress="return CheckNumericKeyInfo(event.keyCode, event.which);">
                </div>
                <div class="box_block" onclick="js_carts_update_unit('<?=$id?>',$('#txt_Number<?=$id?>').val()*1+1);">+</div>
            </div>
        </td>
        <td>
            <div class="money_box">
                <?php 
                if(!empty($price_promotion)){
                ?>
                    <div class="discount_price"><?=$this->Object_model->number_money($price_normal * $val['_carts_item_Unit'])?></div>
                <?php
                }
                ?>
                <!-- <div class="carts_discount">฿ 960</div> -->
                <div class="carts_money"><?=$this->Object_model->number_money($price * $val['_carts_item_Unit'])?></div>
                <!-- <div class="carts_off">20%</div> -->
            </div>
        </td>
    </tr>
    <?php 
        $_item_sum += $val['_carts_item_Unit'];
        $_total_sum += $val['_product_Price'] * $val['_carts_item_Unit'];
      }
    }
    // echo $_item_sum." , total : ".$_total_sum;
    ?>

</table>

<script>
    var item_carts = <?=$_item_sum?>;
    $('#item_carts').html(item_carts+' lists');
</script>