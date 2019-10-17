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

<!-- research -->
<div  class="why_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>วีดีโอ</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12 text-center">
                <iframe width="100%" height="626" src="https://www.youtube.com/embed/<?=$vdo[0]['_vdo_Code']?>?rel=0&showinfo=0" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>

                <!-- bnt share -->
                <div class="option_share_box_vdo">
                    <div id="box_share_vdo" class="box_share">
                        <div class="bnt_share2">แชร์</div>
                        <div id="option_share_vdo" class="option_share option_share_vdo">
                            <div class="bnt_arrow bnt_arrow_vdo"></div>
                            <ul class="bnt_social_link">
                                <li class="vdo_top_fb">
                                <div class="fb-share-button" data-href="<?=site_url('vdo/'.$vdo[0]['_vdo_Code'])?>" data-layout="button"></div>
                                </li>
                                <li>
                                <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?=site_url('vdo/'.$vdo[0]['_vdo_Code'])?>">Tweet</a>
                                    <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                                </li>
                                <li>
                                <span>
                                    <div class="line-it-button" data-lang="en" data-type="share-a" data-url="<?=site_url('vdo/'.$vdo[0]['_vdo_Code'])?>" style="display: none;"></div>
                                </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- bnt share -->

                <script>
                    $('#box_share_vdo').hover(function () {
                        $('#option_share_vdo').slideDown();
                    }, function () {
                        $('#option_share_vdo').slideUp();
                    });
                </script>
            </div>
            <div class="col-lg-12">
                <div class="vdo_flex">

                    <?php 
                    if($vdoRow > 0){
                        $i = 1;

                        foreach($vdo as $key => $val){
                            $id  	= $val['_vdo_ID'];
                            $_name 	= $val['_vdo_TitleEn']?$val['_vdo_TitleEn']:$val['_vdo_Title'];
                            $_code 	= $val['_vdo_Code'];

                            if($val['_vdo_Image'] != ''){
                                $img = base_url('myAdmin/upload/_vdo/'.$val['_vdo_Image']);
                            }else{
                                $img = base_url('img/testimonial/person.jpg');
                            }
                    ?>
                                <!-- item -->
                                <div class="box_vdo_thumb">
                                    <div class="block_vdo block_vdo<?=$i?>">
                                        <a href="javascript:void(0);" onclick="js_vdoView('<?=$_code?>');">
                                            <div class="img">
                                                <div class="label_title"><?=$_name?></div>
                                                <div class="label_play"></div>
                                                <img src="<?=$img?>">
                                            </div>
                                        </a>
                                    </div>

                                    <!-- bnt share -->
                                    <div id="box_share_<?=$key?>" class="box_share box_share_vdo">
                                        <div class="bnt_share_vdo">แชร์</div>
                                        <div id="option_share_<?=$key?>" class="option_share option_share_all_vdo">
                                            <div class="bnt_arrow"></div>
                                            <ul class="bnt_social_link">
                                            <li class="vdo_top_fb">
                                                <div class="fb-share-button" data-href="<?=site_url('vdo/'.$_code)?>" data-layout="button"></div>
                                            </li>
                                            <li>
                                                <a href="https://twitter.com/share" class="twitter-share-button" data-url="<?=site_url('vdo/'.$_code)?>">Tweet</a>
                                                <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
                                            </li>
                                            <li>
                                                <span>
                                                <div class="line-it-button" data-lang="en" data-type="share-a" data-url="<?=site_url('vdo/'.$_code)?>" style="display: none;"></div>
                                                </span>
                                            </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <!-- bnt share -->

                                </div>
                                <!-- item -->

                                <script>
                                    $('#box_share_<?=$key?>').hover(function () {
                                        $('#option_share_<?=$key?>').slideDown();
                                    }, function () {
                                        $('#option_share_<?=$key?>').slideUp();
                                    });
                                </script>
                    <?php 
                            if($i === 3){
                                $i = 0;
                            }
                            $i++;
                        
                        }
                    }
                    ?>
                    
                </div>
            </div>
        </div>
        <div class="row">
            
        </div>

    </div>
</div>

<?php
if(!empty($action)){
?>
<script>
$(function() {
    js_vdoView('<?=$action?>');
    console.log( "ready!" );
});
</script>

<?php 
}
?>
<!-- research -->
