<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div class="carts_background member_info">
    <div class="container">
        <div class="row">
            <div class="col-lg-2">
                <ul class="member_nav">
                    <li><a href="<?=site_url('member')?>">My Account</a></li>
                    <li><a href="<?=site_url('member/history')?>">Order History</a></li>
                    <li class="active"><a href="<?=site_url('member/wishlist')?>">Wish List</a></li>

                </ul>
            </div>
            <div class="col-lg-10">
                <h1>Wish List</h1>

                <!-- product list -->
                <div class="product_home_flex">
                    <?php
                    if($productRow > 0){
                    foreach ($product as $key => $val) {
                        $id       = $val['_product_ID'];
                        $seo_url  = $this->Object_model->url_space($val['_product_SeoName']);
                        $product_img = base_url('myAdmin/upload/_product/gallery/'.$val['_gallery_Image']);

                        $color    = $this->Object_model->getProductColor($id);
                        $colorRow = count($color);
                    ?>
                    <!-- product box -->
                    <div class="product_block">
                    <input type="hidden" name="txt_ColorID_<?=$key?>" id="txt_ColorID_<?=$id?>" >
                    <input type="hidden" name="txt_ColorName_<?=$key?>" id="txt_ColorName_<?=$id?>" >

                    <a href="<?=site_url('products/'.$seo_url)?>"><div class="img"><img id="product_img_<?=$id?>" src="<?=$product_img?>"></div></a>
                    <a href="<?=site_url('products/'.$seo_url)?>"><h2><?=$val['_product_Title']?></h2></a>
                    <div class="line"></div>
                    <div class="price"><span>฿</span><?=$this->Object_model->number_money2($val['_product_Price'])?></div>
                    
                    <?php 
                    if($colorRow > 0){
                        // echo $colorRow;
                    ?>
                    <div class="color_flex">
                    <?php 
                        foreach($color as $index => $col){
                        $_color_id    = $col['_product_color_ID'];
                        $_color_color = $col['_product_color_Color'];
                        $_color_image = $col['_product_color_Image'];
                        $_color_alt   = $col['_product_color_Alt'];
                    ?>
                        <div id="color_box_<?=$id."_".$index?>" class="box" style="background-color:#<?=$_color_color?>;" onclick="js_product_color_list('<?=$_color_id?>','<?=$_color_color?>' ,'<?=$_color_image?>','<?=$index?>','<?=$colorRow?>',<?=$id?>);"></div>
                    <?php 
                        }
                        // end foreach
                    ?> 
                    </div>
                    <?php 
                    }
                    // end color row

                    $_wishList_class = '';
                    if($id === $val['_product_wishlist_ProductID']){
                        $_wishList_class = '-active';
                    }
                    ?>

                    <div class="shop_flex">
                        <div class="list_box"><a href="javascript:void(0);" onclick="js_productCarts('<?=$id?>');"><img src="<?=base_url('img/products/icon-cart.jpg')?>" alt="carts"></a></div>
                        <div class="list_box"><a href="javascript:void(0);" onclick="js_add_wishlist('<?=$id?>');"><img id="img_wishList_<?=$id?>" src="<?=base_url('img/products/icon-wishlist'.$_wishList_class.'.jpg')?>" alt="wishlist"></a></div>
                    </div>
                    </div>
                    <!-- product box -->
                    <?php
                    }
                    }else{
                    ?>
                    <div class="product_not_found">Not found products</div>
                    <?php
                    }
                    ?>   
                </div>
                <!-- product list -->
                
            </div>
        </div>
    </div>
</div>
