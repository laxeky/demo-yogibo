<?php 
defined('BASEPATH') or exit('No direct script access allowed');
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

<?php
// print_r($bannerPromotion);
$_type = $bannerPromotion['_banner_promotion_Type'];
$_img = $bannerPromotion['_banner_promotion_Image'];
$_imgFull = base_url('myAdmin/upload/_banner_promotion/'. $_img);
$_title = $bannerPromotion['_banner_promotion_TitleTh']? $bannerPromotion['_banner_promotion_TitleTh']: $bannerPromotion['_banner_promotion_Title'];
$_subject = $bannerPromotion['_banner_promotion_SubjectTh']? $bannerPromotion['_banner_promotion_SubjectTh']: $bannerPromotion['_banner_promotion_Subject'];
$_date = $this->Object_model->getDateThai ($bannerPromotion['_banner_promotion_DateB'])." - ". $this->Object_model->getDateThai($bannerPromotion['_banner_promotion_DateE']);
$_link = $bannerPromotion['_banner_promotion_Url'];

if($_type == 1){
?>
<div class="img">
    <img src="<?=$_imgFull?>">
</div>
<?php
}else{

    // video
    $_url_vdo = base_url('myAdmin/upload/_banner_promotion/');
    $banner_web_mp4 = $bannerPromotion['_banner_promotion_Mp4'];
    // $banner_mobile_mp4 = $bannerPromotion['_banner_promotion_Mp4mini'];
?>
<div class="img">
    <video class="video_banner_promotion" autoplay loop Muted>
        <source src="<?= $_url_vdo . $banner_web_mp4 ?>" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</div>
<?php 
}
?>
<h1><?= $_title ?></h1>
<div class="title"><?= $_subject ?></div>
<div class="date">
    ระยะเวลา : <?= $_date ?>
</div>


<!-- <div class="bnt_share_promotion"><img src="<?= base_url('img/banner-promotion/bnt-share.png') ?>"></div> -->

<!-- bnt share -->
<div id="box_share_promotion" class="box_share option_share_promotion">
    <div class="bnt_share_promotion"><img src="<?= base_url('img/banner-promotion/bnt-share.png') ?>"></div>
    <div id="option_share_promotion" class="option_share option_promotion">
        <div class="bnt_arrow bnt_arrow_vdo"></div>
        <ul class="bnt_social_link">
            <li class="vdo_top_fb">
            <div class="fb-share-button" data-href="<?=$_link?>" data-layout="button"></div>
            </li>
            <li>
                <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?=$_link?>">Tweet</a>
            </li>
            <li>
            <span>
                <div class="line-it-button" data-lang="en" data-type="share-a" data-url="<?=$_link?>" style="display: none;"></div>
            </span>
            </li>
        </ul>
    </div>
</div>
<!-- bnt share -->

<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
<script>
    $('#box_share_promotion').hover(function () {
        $('#option_share_promotion').slideDown();
    }, function () {
        $('#option_share_promotion').slideUp();
    });
</script>