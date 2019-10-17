<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<script src="https://d.line-scdn.net/r/web/social-plugin/js/thirdparty/loader.min.js" async="async" defer="defer"></script>

<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=293770350766849";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>

<!-- product -->
<div id="products" class="products">
  <div class="container">
    <div class="row">
      <div class="col-lg-3">
          <div class="_web">
            <?php 
            $arr_group = array();

            if($product_groupRow > 0){
                foreach($product_group as $group){
                    $_group_id      = $group['_product_group_ID'];
                    $_group_title   = $group['_product_group_TitleTh']?$group['_product_group_TitleTh']:$group['_product_group_Title'];
                    $_group_url     = $this->Object_model->url_space($group['_product_group_Title']);
                    
                    $arr_group[] = $group['_product_group_ID'];

                    $_class_active  = "";
                    if($group_id_active === $_group_id && empty($group2_id_active)){
                    $_class_active = "active";
                    }

                    // call group 2
                    $product_group2    = $this->Object_model->getProductCategories2($_group_id);
                    $product_group2Row = count($product_group2);
            ?>
                    <a href="<?=site_url('products/'.$_group_url);?>"><h2 class="<?=$_class_active?>"><?=$_group_title?></h2></a>
            <?php 
                    if($product_group2Row > 0){
                        echo '<ul class="products_cat">';
                        foreach($product_group2 as $group2){
                            $_group2_id      = $group2['_product_group_level2_ID'];
                            $_group2_title   = $group2['_product_group_level2_TitleTh']?$group2['_product_group_level2_TitleTh']:$group2['_product_group_level2_Title'];
                            $_group2_url     = $this->Object_model->url_space($group2['_product_group_level2_Title']);

                            $_class_active2  = "";
                            if($group2_id_active === $_group2_id){
                            $_class_active2 = "active";
                            }
            ?>
                            <li>
                                <a href="<?=site_url('products/'.$_group_url.'/'.$_group2_url);?>" class="<?=$_class_active2?>">
                                <div><?=$_group2_title?></div>
                                <div></div>
                                </a>
                            </li> 
            <?php 
                        }
                        echo ' </ul>';
                    }
                }
            }
            ?>
            </div>
            
            <!-- group mobile -->
            <div class="_mobile">
                <select id="txt_productGroup" name="txt_productGroup" class="select_box" onchange="js_productGroup(this.value);">
                    <option value="0">เลือกกลุ่มสินค้า</option>
                    <?php 
                    if ($product_groupRow > 0) {
                        foreach ($product_group as $group) {
                            $_group_id = $group['_product_group_ID'];
                            $_group_title = $group['_product_group_TitleTh']?$group['_product_group_TitleTh']:$group['_product_group_Title'];
                            $_group_url = $this->Object_model->url_space($group['_product_group_Title']);

                            $_class_active = "";
                            if ($group_id_active === $_group_id && empty($group2_id_active)) {
                                $_class_active = "selected";
                            }

                            
                            $product_group2 = $this->Object_model->getProductCategories2($_group_id);
                            $product_group2Row = count($product_group2);

                    ?>
                            <option value="<?= $_group_url ?>" <?= $_class_active ?>><?= $_group_title ?></option>
                    <?php 
                            if ($product_group2Row > 0) {
                                
                                foreach ($product_group2 as $group2) {
                                    $_group2_id = $group2['_product_group_level2_ID'];
                                    $_group2_title = $group2['_product_group_level2_TitleTh']?$group2['_product_group_level2_TitleTh']:$group2['_product_group_level2_Title'];
                                    $_group2_url = $this->Object_model->url_space($group2['_product_group_level2_Title']);

                                    $_class_active2 = "";
                                    if ($group2_id_active === $_group2_id) {
                                        $_class_active2 = "selected";
                                    }
                    ?>
                                    <option value="<?= $_group_url . '/' . $_group2_url ?>" <?= $_class_active2 ?>>- <?= $_group2_title ?></option>
                    <?php 
                                }
                                
                            }
                        }
                    }
                    ?>


                </select>
            </div>
            <!-- group mobile -->
      </div>

      <div class="col-lg-9">
        <div class="product_box">
          <div class="product_box_flex">
            <h3>
              <?php
                if($search != null){
                  echo 'คำค้นหา : '.$search;
                }else if($action != null){
                  echo $action;
                }else{
                  echo 'ทั้งหมด';
                }
                ?>
              </h3>
          </div>

          <div class="product_home_flex">

            <?php

            // $arr_group = array(12,8,9,10,11);

            foreach($arr_group as $group_id){
            
                $pd_group   = $this->Object_model->getProductCategories($group_id);
                $pd_name    = $pd_group[0]['_product_group_TitleTh']?$pd_group[0]['_product_group_TitleTh']:$pd_group[0]['_product_group_Title'];
                $pd_name_url = $this->Object_model->url_space($pd_name);
                // echo $pd_name;
            ?>
                <div class="product_group_header">
                    <?=$pd_name ?>
                </div>

            <?php
                $product    = $this->Object_model->getProduct($group_id,null,null,'6','0');
                $productRow = count($product);

                if($productRow > 0){
                    foreach ($product as $key => $val) {
                        $id       = $val['_product_ID'];
                        $seo_url  = $this->Object_model->url_space($val['_product_SeoName']);
                        $product_img = base_url('myAdmin/upload/_product/gallery/'.$val['_gallery_Image']);

                        $_product_title = ($val['_product_TitleTh'])?$val['_product_TitleTh']:$val['_product_Title'];

                        $color    = $this->Object_model->getProductColor($id);
                        $colorRow = count($color);
            ?>
                    <!-- product box -->
                    <div class="product_block">
                    <input type="hidden" name="txt_ColorID_<?=$key?>" id="txt_ColorID_<?=$id?>" >
                    <input type="hidden" name="txt_ColorName_<?=$key?>" id="txt_ColorName_<?=$id?>" >

                    <a href="<?=site_url('products/'.$id.'/'.$seo_url)?>"><div class="img"><img id="product_img_<?=$id?>" src="<?=$product_img?>"></div></a>
                    
                    <div class="product_border">
                        <a href="<?=site_url('products/'.$id.'/'.$seo_url)?>"><h2><?=$_product_title?></h2></a>
                        <div class="line"></div>
                        <div class="price flex_price">
                        <?php 
                        $_discount = '';
                        if(!empty($val['_product_PricePromotion'])){
                            $_discount = 'discount_price';
                        }
                        ?>
                            <div class="<?=$_discount?>">
                            <span>฿</span><?=$this->Object_model->number_money2($val['_product_Price'])?>
                            </div>
                        <?php 
                        if(!empty($val['_product_PricePromotion'])){
                        ?>
                            <div>
                            <span>฿</span><?=$this->Object_model->number_money2($val['_product_PricePromotion'])?>
                            </div>
                        <?php
                        }
                        ?>

                        </div>
                        
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
                        } else {
                        ?>
                            <script>
                                $('#txt_ColorID_<?= $id ?>').val('0');
                            </script>
                        <?php 
                        }
                        // end color row

                        $_wishList_class = '';
                        if($id === $val['_product_wishlist_ProductID']){
                        $_wishList_class = '-active';
                        }

                        
                        ?>

                        <div class="shop_flex">
                        <?php 
                        $_stock = $val['_product_Stock'];
                        if($_stock == 1){
                        ?>
                        <div class="list_box"><a href="javascript:void(0);" onclick="js_productCarts('<?=$id?>');"><div class="bnt_buy">ซื้อทันที</div></a></div>
                        <?php
                        }else{
                        ?>
                        <div class="list_box">
                            <div class="bnt_comingsoon">Coming Soon</div>
                        </div>
                        <?php 
                        }
                        ?>
                        <!-- bnt share -->
                        <div id="box_share_<?=$key?>" class="box_share">
                            <div class="bnt_share">แชร์</div>
                            <div id="option_share_<?=$key?>" class="option_share">
                                <div class="bnt_arrow"></div>
                                <ul class="bnt_social_link">
                                    <li>
                                        <div class="fb-share-button" data-href="<?=site_url('products/'.$id.'/'.$seo_url)?>" data-layout="button"></div>
                                    </li>
                                    <li>
                                        <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?=site_url('products/'.$id.'/'.$seo_url)?>">Tweet</a>
                                        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                                    </li>
                                    <li>
                                        <span>
                                            <div class="line-it-button" data-lang="en" data-type="share-a" data-url="<?=site_url('products/'.$id.'/'.$seo_url)?>" style="display: none;"></div>
                                        </span>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- bnt share -->
                        </div>

                    </div>
                    </div>
                    <!-- product box -->
                    <script>
                    $('#box_share_<?=$key?>').hover(function () {
                        $('#option_share_<?=$key?>').slideDown();
                    }, function () {
                        $('#option_share_<?=$key?>').slideUp();
                    });
                    </script>

            <?php
                    }
                }
            ?>
                <a href="<?=site_url('products/'.$pd_name_url)?>">
                    <div class="bnt_viewall">ดูทั้งหมด</div>
                </a>
                
            <?php
            }
            ?>
            
          </div>

        </div>
      </div>

    </div>
  </div>
</div>
<!-- product -->
<script>
  $('select').selectric();
</script>