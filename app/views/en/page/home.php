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

<!-- banner home -->
<div class="home_banner">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-wrap="false">
        <ol class="carousel-indicators">
        <?php
        if($bannerRow > 0){
          foreach ($banner as $key => $val) {
            $add_class = "";
            if($key == 0){
              $add_class = 'class="active"';
            }
        ?>
          <li data-target="#carouselExampleIndicators" data-slide-to="<?=$key?>" <?=$add_class?>></li>
        <?php
          }
        }
        ?>
        
        </ol>
        <div class="carousel-inner">
        <?php
        if($bannerRow > 0){
          foreach ($banner as $key => $val) {
            $add_class = "";
            if($key == 0){
              $add_class = 'active';
            }

            $banner_type = $val['_banner_Type'];
            $banner_url = $val['_banner_Url'];
            $banner_imgWeb    = base_url('myAdmin/upload/_banner/'.$val['_banner_Image']);
            $banner_imgMobile = base_url('myAdmin/upload/_banner/'.$val['_banner_ImageThumb']);
        ?>
          <div class="carousel-item <?=$add_class?>">
              <?php 
              if($banner_url){
              ?>
              <a href="<?=$banner_url?>" target="_blank">
              <?php 
              }

                if($banner_type == 1){
              ?>
                <img class="d-block w-100 _banner_web" src="<?=$banner_imgWeb?>">
                <img class="d-block w-100 _banner_mobile" src="<?= $banner_imgMobile ?>">
              <?php 
                }else{
                  // video
                  $_url_vdo = base_url('myAdmin/upload/_banner/');
                  $banner_web_mp4     = $val['_banner_Mp4'];
                  $banner_mobile_mp4  = $val['_banner_Ogv'];
              ?>
                  <video class="video_banner _web" autoplay loop Muted>
                    <source src="<?=$_url_vdo.$banner_web_mp4?>" type="video/mp4">
                    Your browser does not support the video tag.
                  </video>

                  <video class="video_banner _mobile" controls loop Muted>
                    <source src="<?=$_url_vdo.$banner_mobile_mp4?>" type="video/mp4">
                    Your browser does not support the video tag.
                  </video>
              <?php
                }
              if($banner_url){
              ?>
              </a>
              <?php 
              }
              ?>
              
          </div>
        <?php 
          }
        }
        ?>

        </div>
        
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
          <span class="carousel-control-next-icon" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

    </div>
</div>

<script>
  $('.carousel').carousel({
    interval: 8000
  });

  $(".carousel").swipe({

    swipe: function(event, direction, distance, duration, fingerCount, fingerData) {
      if (direction == 'left') $(this).carousel('next');
      if (direction == 'right') $(this).carousel('prev');
    },
    allowPageScroll:"vertical"

  });
</script>
<!-- banner home -->


<!-- feature_product -->

<div class="feature_product">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">

        <h1>Best Sellers</h1>

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

              <a href="<?=site_url('products/'.$id.'/'.$seo_url)?>"><div class="img"><img id="product_img_<?=$id?>" src="<?=$product_img?>"></div></a>
              
              <div class="product_border">
                <a href="<?=site_url('products/'.$id.'/'.$seo_url)?>"><h2><?=$val['_product_Title']?></h2></a>
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
                  <div class="list_box"><a href="javascript:void(0);" onclick="js_productCarts('<?=$id?>');"><div class="bnt_buy">Buy</div></a></div>
                  <?php
                  }else{
                  ?>
                  <div class="list_box">&nbsp;</div>
                  <?php
                  }
                  ?>                 
                  <!-- bnt share -->
                  <div id="box_share_<?=$key?>" class="box_share">
                    <div class="bnt_share">Share</div>
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
            }else{
            ?>
              <div class="product_not_found">Not found products</div>
            <?php
            }
            ?>
          
        </div>

      </div>
    </div>
  </div>
</div>
<!-- feature_product -->


<!-- home_vdo -->
<?php 
if($vdoRow > 0){
  $vdo_code = $vdo[0]['_vdo_Code'];
?>
<div class="home_vdo">
  <div class="container">

    <div class="row">
      <div class="col-lg-12 text-center">
        <h1>Video</h1>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 text-center">
        <div class="vdo_box">
          <div class="vdo_border">
            <iframe width="100%" height="410" src="https://www.youtube.com/embed/<?=$vdo_code?>?rel=0&showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 text-center">
        <!-- bnt share -->
        <div id="box_share_vdo" class="box_share">
          <div class="bnt_share2">Share</div>
          <div id="option_share_vdo" class="option_share option_share_vdo">
              <div class="bnt_arrow bnt_arrow_vdo"></div>
              <ul class="bnt_social_link">
                <li >
                  <div class="fb-share-button" data-href="<?=site_url('vdo/'.$vdo_code)?>" data-layout="button"></div>
                </li>
                <li>
                  <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?=site_url('vdo/'.$vdo_code)?>">Tweet</a>
                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                </li>
                <li>
                  <span>
                    <div class="line-it-button" data-lang="en" data-type="share-a" data-url="<?=site_url('vdo/'.$vdo_code)?>" style="display: none;"></div>
                  </span>
                </li>
              </ul>
          </div>
        </div>
        <!-- bnt share -->
      </div>
    </div>

  </div>
</div>

<script>
  $('#box_share_vdo').hover(function () {
    $('#option_share_vdo').slideDown();
  }, function () {
    $('#option_share_vdo').slideUp();
  });
</script>

<?php 
}
?>
<!-- home_vdo -->

<!-- life_style -->
<div class="life_style">
  <div class="container">

    <div class="row">
      <div class="col-lg-5">
        <h1>It's a complete lifestyle for</h1>
        <h2>EVERYONE!</h2>
        <div class="title">Yogibo is great for modern day living. <br>Easy to move, space saving & practical!</div>
      </div>
      <div class="col-lg-7">
        <img class="img_thumb" src="<?=base_url('img/home/thumb/img-01.jpg')?>">
      </div>
    </div>

    <div class="row">
      <div class="col-lg-12">
        <div class="life_style_flex">
          <!-- content -->
          <div class="block">
            <div class="img">
              <img src="<?=base_url('img/home/thumb/img-02.jpg')?>" alt="REDUCING ANXIETY  while cradling your every moment!">
            </div>
            <div class="title">
              Yogibo mimio the security inside the
              womb REDUCING ANXIETY  while 
              cradling your every moment!
            </div>
          </div>
          <!-- content -->

          <!-- content -->
          <div class="block">
            <div class="img">
              <img src="<?=base_url('img/home/thumb/img-03.jpg')?>" alt="Most of Versatility">
            </div>
            <div class="title">Most of Versatility</div>
          </div>
          <!-- content -->

          <!-- content -->
          <div class="block">
            <div class="img">
              <img src="<?=base_url('img/home/thumb/img-04.jpg')?>" alt="It’s okay to JUMP on the furniture!">
            </div>
            <div class="title">
              Soft, durable and washable covers - 
              It’s okay to <span>JUMP</span> on the furniture!
            </div>
          </div>
          <!-- content -->

          <!-- content -->
          <div class="block">
            <div class="img">
              <img src="<?=base_url('img/home/thumb/img-05.jpg')?>" alt="Hugibo make  the child feel safe and secure.">
            </div>
            <div class="title">
              Hugibo suitable for children with 
              sensitive senses. This will make  the 
              child feel safe and secure.
            </div>
          </div>
          <!-- content -->

          <!-- content -->
          <div class="block">
            <div class="img">
              <img src="<?=base_url('img/home/thumb/img-06.jpg')?>" alt="Most of Comfortable">
            </div>
            <div class="title">Most of Comfortable</div>
          </div>
          <!-- content -->

          <!-- content -->
          <div class="block">
            <div class="img">
              <img src="<?=base_url('img/home/thumb/img-07.jpg')?>" alt="Perfect bed!">
            </div>
            <div class="title">Perfect bed!</div>
          </div>
          <!-- content -->

          <!-- content -->
          <div class="block">
            <div class="img">
              <img src="<?=base_url('img/home/thumb/img-08.jpg')?>" alt="Have fun together!">
            </div>
            <div class="title">Have fun together!</div>
          </div>
          <!-- content -->

          <!-- content -->
          <div class="block">
            <div class="img">
              <img src="<?=base_url('img/home/thumb/img-09.jpg')?>" alt="Play all day, pain free!">
            </div>
            <div class="title">Play all day, pain free!</div>
          </div>
          <!-- content -->

          <!-- content -->
          <div class="block">
            <div class="img">
              <img src="<?=base_url('img/home/thumb/img-10.jpg')?>" alt="Paws & claws friendly">
            </div>
            <div class="title">Paws & claws friendly</div>
          </div>
          <!-- content -->
        </div>
      </div>
    </div>

  </div>
</div>
<!-- life_style -->

<!-- blog -->
<div class="blog_bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <!-- blog_flex -->
        <div class="blog_flex">
          <div class="block blogLeft">
            <!-- inner -->
            <div class="blog_header">
              <img src="<?=base_url('img/home/icon-01.png')?>"> <div class="title_text">Event</div>
            </div>

              <?php 
              if ($eventRow > 0) {
                $b_id       = $event['_event_ID'];
                $b_title    = !empty($event['_event_TitleEn']) ? $event['_event_TitleEn'] : $event['_event_Title'];
                $b_subject  = !empty($event['_blog_SubjectEn']) ? $event['_event_SubjectEn'] : $event['_event_Subject'];
              ?>
            <div class="blog_content">
              <div class="date"><?= $this->Object_model->getEngThai($event['_event_DateB']); ?></div>
              <div class="title"><?= $b_title ?></div>
              <div class="subject"><?= $b_subject ?></div>
              <div class="blog_detail_flex">
                <a href="<?= site_url('event/view/' . $b_id) ?>"><div class="bnt_detail">See Details ></div></a>
                <a href="<?=site_url('event')?>"><div class="bnt_all">See All</div></a>
              </div>
            </div>
            <?php 
            }
            ?>
            <!-- inner -->
          </div>
          <div class="block blogRight">
            <!-- inner -->
            <div class="blog_header">
              <img src="<?=base_url('img/home/icon-02.png')?>"> <div class="title_text">Blog</div>
            </div>
            <?php 
            if($blogRow > 0){
              $e_id       = $blog['_blog_ID'];
              $e_title    = !empty($blog['_blog_TitleEn'])? $blog['_blog_TitleEn']: $blog['_blog_Title'];
              $e_subject  = !empty($blog['_blog_SubjectEn']) ? $blog['_blog_SubjectEn'] : $blog['_blog_Subject'];
            ?>
            <div class="blog_content">
              <div class="date"><?=$this->Object_model->getEngThai($blog['_blog_DateB']);?></div>
              <div class="title"><?= $e_title ?></div>
              <div class="subject"><?= $e_subject ?></div>
              <div class="blog_detail_flex">
                <a href="<?= site_url('blog/view/'. $e_id) ?>"><div class="bnt_detail">Read More ></div></a>
                <a href="<?= site_url('blog') ?>"><div class="bnt_all">See All</div></a>
              </div>
            </div>
            <?php 
            }
            ?>
            <!-- inner -->
          </div>
        </div>
        <!-- blog_flex -->
      </div>
    </div>
  </div>
</div>
<!-- blog -->

<!-- social_style -->
<div class="social_style">
  <div class="container">
    <div class="row">
      <div class="col-lg-8">
        
        <div class="header">
          <img src="<?=base_url('img/home/thumb/img-icon-yogibo.jpg')?>"> @YogiboThailand
        </div>
        <div class="ig_flex">
          <!-- block -->
          <div class="block">
            <div class="img">
              <img src="<?=base_url('img/home/thumb/ig-01.jpg')?>">
            </div>
            <div class="like">124 Likes</div>
            <div class="title">Yogibo vibrant colors and fab design</div>
          </div>
          <!-- block -->
          <!-- block -->
          <div class="block">
            <div class="img">
              <img src="<?=base_url('img/home/thumb/ig-02.jpg')?>">
            </div>
            <div class="like">124 Likes</div>
            <div class="title">Yogibo vibrant colors and fab design</div>
          </div>
          <!-- block -->
          <!-- block -->
          <div class="block">
            <div class="img">
              <img src="<?=base_url('img/home/thumb/ig-03.jpg')?>">
            </div>
            <div class="like">124 Likes</div>
            <div class="title">Yogibo vibrant colors and fab design</div>
          </div>
          <!-- block -->
          <!-- block -->
          <div class="block">
            <div class="img">
              <img src="<?=base_url('img/home/thumb/ig-04.jpg')?>">
            </div>
            <div class="like">124 Likes</div>
            <div class="title">Yogibo vibrant colors and fab design</div>
          </div>
          <!-- block -->
          <!-- block -->
          <div class="block">
            <div class="img">
              <img src="<?=base_url('img/home/thumb/ig-05.jpg')?>">
            </div>
            <div class="like">124 Likes</div>
            <div class="title">Yogibo vibrant colors and fab design</div>
          </div>
          <!-- block -->
          <!-- block -->
          <div class="block">
            <div class="img">
              <img src="<?=base_url('img/home/thumb/ig-06.jpg')?>">
            </div>
            <div class="like">124 Likes</div>
            <div class="title">Yogibo vibrant colors and fab design</div>
          </div>
          <!-- block -->
        </div>
        
      </div>
      <div class="col-lg-4">
        <iframe class="fb_frame" src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2FYogibo.Thailand%2F&tabs=timeline&width=350&height=650&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId=293770350766849" width="350" height="650" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
      </div>
    </div>
  </div>
</div>
<!-- social_style -->