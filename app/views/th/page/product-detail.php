<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$product_id  = $product['_product_ID'];
$product_img = base_url('myAdmin/upload/_product/gallery/'.$product['_gallery_Image']);

$_group_url  = $this->Object_model->url_space($product['_group_Title']);
$_sub_url    = "";
$_product_url= $this->Object_model->url_space($product['_product_Title']);

if($product['_sub_Title']){
    $_sub_url  = $this->Object_model->url_space($product['_sub_Title']);
}

// print_r($product);

$_product_title     = $product['_product_TitleTh']?$product['_product_TitleTh']:$product['_product_Title'];
$_product_subject   = $product['_product_SubjectTh']?$product['_product_SubjectTh']:$product['_product_Subject'];
?>
<!-- product -->
<form id="productForm" name="productForm" method="post">
    <input type="hidden" name="txt_ColorID" id="txt_ColorID" >
    <input type="hidden" name="txt_ColorName" id="txt_ColorName" >
    <div id="products" class="products">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="product_nav_flex">
                        <div class="block_data"><a href="<?=site_url('products')?>">Products</a></div>
                        <div class="block_data">/</div>
                        <div class="block_data"><a href="<?=site_url('products/'.$_group_url)?>"><?=$product['_group_Title']?></a></div>
                        <?php 
                        if($_sub_url != ""){
                        ?>
                            <div class="block_data">/</div>
                            <div class="block_data"><a href="<?=site_url('products/'.$_group_url."/".$_sub_url)?>"><?=$product['_sub_Title']?></a></div>
                        <?php
                        }
                        ?>
                        <div class="block_data">/</div>
                        <div class="block_data"><a href="<?=site_url('products/'.$_product_url)?>"><?=$_product_title?></a></div>
                    </div>
                </div>
            </div>
            <div class="row">
                
                <div class="col-lg-12">
                    <!-- product detail flex -->
                    <div class="product_detail_flex">
                        <div class="product_image">
                            <div class="img"><img id="product_img" src="<?=$product_img?>"></div>
                            <div class="img_thumb_flex">
                                <?php
                                if($imageRow > 0){
                                    foreach($image as $key => $im){
                                        $_img = base_url('myAdmin/upload/_product/gallery/'.$im['_gallery_img_Image']);

                                        $_class = '';
                                        if($key == 0){
                                            $_class = 'active';
                                        }
                                ?>
                                        <div id="product_gallery_<?=$key?>" class="img_thumb <?=$_class?>" onclick="js_product_image('<?=$_img?>','<?=$key?>','<?=$imageRow?>');">
                                            <img src="<?=$_img?>">
                                        </div>
                                <?php 
                                    }
                                }
                                ?>
                            </div>
                        </div>
                        <div class="product_information">
                            <h1><?=$_product_title?></h1>
                            <div class="line"></div>
                            <div class="title"><?=$_product_subject?></div>
                            <div class="product_price_flex">
                                <div class="price flex_price">
                                    <?php 
                                    $_discount = '';
                                    if(!empty($product['_product_PricePromotion'])){
                                    $_discount = 'discount_price';
                                    }
                                    ?>
                                    <div class="<?=$_discount?>">
                                        <span>฿</span><?=$this->Object_model->number_money2($product['_product_Price'])?>
                                    </div>
                                    <?php 
                                    if(!empty($product['_product_PricePromotion'])){
                                    ?>
                                    <div>
                                        <span>฿</span><?=$this->Object_model->number_money2($product['_product_PricePromotion'])?>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                                <div class="wishlist">
                                    <a href="javascript:void(0);" onclick="js_add_wishlist('<?=$product_id?>');">
                                        <img src="<?=base_url('img/products/icon-wishlist-inner.jpg')?>"> เพิ่มในรายการที่ชอบ
                                    </a>
                                </div>
                            </div>
                            
                            <div class="product_color">
                                <?php
                                if($colorRow > 0){
                                ?>
                                <div>โปรดเลือกสี:</div>
                                <?php 
                                }
                                ?>
                                <div class="color_flex">
                                    <?php 
                                    if($colorRow > 0){
                                        foreach($color as $index => $col){
                                            $_color_id    = $col['_product_color_ID'];
                                            $_color_color = $col['_product_color_Color'];
                                            $_color_image = $col['_product_color_Image'];
                                            $_color_alt   = $col['_product_color_Alt'];
                                    ?>
                                        <div id="color_box<?=$index?>" class="box" style="background-color:#<?=$_color_color?>;" onclick="js_product_color('<?=$_color_id?>','<?=$_color_color?>' ,'<?=$_color_image?>','<?=$index?>','<?=$colorRow?>');"></div>
                                    <?php 
                                        }
                                        // end foreach
                                    }else{
                                    ?>
                                        <script>
                                            $('#txt_ColorID').val('0');
                                        </script>
                                    <?php
                                    }
                                    // end if
                                    ?>
                                </div>
                            </div>

                            <div class="product_qty_flex">
                                <div class="block">
                                    <span>จำนวน:</span> <input type="number" class="input_qty" name="txt_Number" id="txt_Number" maxlength="2" value="1" onkeydown="js_press_number(event);">
                                </div> 
                                <div class="block">
                                    <?php 
                                    $_stock = $product['_product_Stock'];
                                    if($_stock == 1){
                                    ?>
                                        <div class="bnt_carts" name="txt_addcarts" id="txt_addcarts" onclick="js_addProducts('<?=$product_id?>')">ซื้อทันที</div>
                                    <?php 
                                    }else{
                                    ?>
                                        <div class="bnt_comingsoon">Coming Soon</div>
                                    <?php
                                    }
                                    ?>
                                </div> 
                            </div>

                            <div class="product_share_flex">
                                <div class="block">
                                    <div>แชร์:</div>
                                    <div class="product_social_share_flex">
                                        <a href="javascript:void(0);" id="share_facebook"><div class="product_share share_facebook">facebook</div></a>
                                        <a href="javascript:void(0);" onclick="twitter_share('<?=$_product_title.' link:'.site_url('products/'.$_product_url)?>');"><div class="product_share share_twitter">twitter</div></a>
                                    </div> 
                                </div>
                                <div class="block">
                                    <img src="<?=base_url('img/products/img-authorize.jpg')?>">
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <!-- product detail flex -->
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <div class="product_detail_box">
                        <ul class="product_detail_nav_flex">
                            <a href="javascript:void(0);" onclick="js_product_detail_tab(1);"><li id="product_detail1" class="active">ข้อมูลสินค้า</li></a>
                            <a href="javascript:void(0);" onclick="js_product_detail_tab(2);"><li id="product_detail2">รายละเอียด</li></a>
                            <!-- <a href="javascript:void(0);" onclick="js_product_detail_tab(3);"><li id="product_detail3">Reviews</li></a> -->
                            <a href="javascript:void(0);" onclick="js_product_detail_tab(4);"><li id="product_detail4">การส่งสินค้า</li></a>
                        </ul>
                        <div class="product_description">
                            <div id="list_data1"><?=$product['_product_BenefitTh']?$product['_product_BenefitTh']:$product['_product_Benefit']?></div>
                            <div id="list_data2" class="hide_content"><?=$product['_product_EatTh']?$product['_product_EatTh']:$product['_product_Eat']?></div>
                            <div id="list_data3"  class="hide_content">
                                <div class="text-center">No Reviews</div>
                            </div>
                            <div id="list_data4"  class="hide_content">

                                <div class="product_shipping_flex">

                                    <div class="block1">การจัดส่งสินค้า:</div>
                                    <div class="block2">ทุกจังหวัดในประเทศไทย.</div>

                                    <div class="block1">เวลาการจัดส่ง:</div>
                                    <div class="block2">7 - 10 วัน</div>

                                    <!-- <div class="block1">Ship To Store Available:</div>
                                    <div class="block2">Yes</div> -->
                                </div>
                                    
                            </div>
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>

<script>
    var fbButton = document.getElementById('share_facebook');
    var url = window.location.href;

    fbButton.addEventListener('click', function() {
        window.open('https://www.facebook.com/sharer/sharer.php?u=' + url,
            'facebook-share-dialog',
            'width=700,height=500'
        );
        return false;
    });

    function twitter_share(text){
         window.open('https://twitter.com/intent/tweet?text='+text,
            'twitter-share-dialog',
            'width=700,height=500'
        );
        return false;
    }

</script>
<!-- product -->
