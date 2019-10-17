<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?=$title?></title>
  <meta name="description" content="<?=$subject?>">
  <meta name="keywords" content="">
  <link rel="shortcut icon" href="<?=base_url('img/template/ico.jpg')?>"  type="image/x-icon" />

  <link rel="image_src" type="image/jpeg" href="<?=$image_share?>" />
  <meta property="og:title" content="<?=$title?>">
  <meta property="og:description" content="<?=$subject?>">
  <meta property="og:url" content="<?=site_url($page)?>">
  <meta property="og:image" content="<?=$image_share?>" />
  <meta property="og:site_name" content="<?=site_url($page)?>">
  <link rel="alternate" type="application/rdf+xml" href="http://opengraphprotocol.org/schema/">

  <meta itemprop="name" content="<?=$title?>">
  <meta itemprop="description" content="<?=$subject?>">
  <meta itemprop="image" content="<?=$image_share?>">

  <link rel="stylesheet" type="text/css" href="<?=base_url('lib/bootstrap-4/css/bootstrap.min.css')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url('lib/css/'.$language.'/main.css?v=0.05')?>">
  <link rel="stylesheet" type="text/css" href="<?=base_url("lib/progress-bar/pace.css")?>" />
  <link rel="stylesheet" type="text/css" href="<?=base_url("lib/option_jquery/selectric.css")?>">
  <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">

  <script src="<?=base_url('lib/jquery/jquery.js')?>"></script>
  <script src="<?=base_url('lib/bootstrap-4/js/bootstrap.min.js')?>"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js"></script>

  <script src="<?=base_url("lib/progress-bar/pace.min.js")?>"></script>
  <script src="<?=base_url("lib/option_jquery/jquery.selectric.min.js")?>"></script>
  <script src="<?=base_url('myAdmin/lib/js3-handlers.js')?>"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
  <script src="<?=base_url('lib/js/'.$language.'/script.js')?>"></script>

  <script>
    !function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
    n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
    n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
    t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
    document,'script','https://connect.facebook.net/en_US/fbevents.js');
    // Insert Your Facebook Pixel ID below. 
    fbq('init', '419174335277342');
    fbq('track', 'PageView');
    </script>
    <!-- Insert Your Facebook Pixel ID below. --> 
    <noscript><img height="1" width="1" style="display:none"
    src="https://www.facebook.com/tr?id=419174335277342&amp;ev=PageView&amp;noscript=1"
    /></noscript>
  <!-- End Facebook Pixel Code -->


  <!-- Google Tag Manager -->
  <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
  new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
  j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
  'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
  })(window,document,'script','dataLayer','GTM-W39KTK9');</script>
  <!-- End Google Tag Manager -->
	
</head>
<body>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W39KTK9"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="loadPage" class="loadPage"></div>
<input type="hidden" name="txt_Url" id="txt_Url" value="<?=site_url()?>">
<input type="hidden" name="txt_Base" id="txt_Base" value="<?=base_url()?>">
<input type="hidden" name="txt_UrlNow" id="txt_UrlNow" value="<?=$_SERVER["HTTP_HOST"].$_SERVER["REQUEST_URI"]?>" />

<!-- template header -->
<div class="template_nav_header">
  <div class="template_top_nav_flex">
    <?php
    $user_id = $this->session->userdata('YOGIBO_UserID');
    if($user_id != null){
      $user_name = !empty($this->session->userdata('YOGIBO_FirstName'))?($this->session->userdata('YOGIBO_FirstName')." ".$this->session->userdata('P80_LastName')):$this->session->userdata('YOGIBO_Email');
    ?>
      <div class="block txt_login br0">
        <a href="<?=site_url('member')?>"><img src="<?=base_url('img/home/icon-user.png')?>"> <?=$user_name?></a>
      </div>
      <div class="block txt_login br0">
        <a href="<?=site_url('member/logout')?>">log out</a>
      </div>
    <?php
    }else{
    ?>
      <div class="block txt_login br0">
        <a href="javascript:void(0);" onclick="js_open_login();">เข้าสู่ระบบ</a>
      </div>
      <div class="block txt_login br0">
        <a href="javascript:void(0);" onclick="js_open_register();">สมัครสมาชิก</a>
      </div>
    <?php
    }
    ?>
    
    <div class="block carts_pos br0">
      <a href="<?= site_url('carts') ?>"><div class="box_carts_items carts_unit">0</div></a>
      <a href="<?=site_url('carts')?>">
        <img class="icon_message _web" src="<?=base_url('img/template/icon-carts.jpg')?>">
        <img class="icon_message _mobile" src="<?=base_url('img/template/icon-carts.png')?>">
      </a>
    </div>
    <div class="block br0">
      <a href="javascript:void(0);" onclick="js_message()">
        <img class="icon_message _web" src="<?=base_url('img/template/icon-message.jpg')?>">
        <img class="icon_message _mobile" src="<?=base_url('img/template/icon-message2.png')?>">
      </a>
    </div>
    <div class="block txt_lanuage br0 _web">
      <span class="<?=($this->lang->lang() == "en") ? "active" : "" ?>"><?= anchor($this->lang->switch_uri('en'), 'EN'); ?></span>
      /
      <span class="<?=($this->lang->lang() == "th") ? "active" : "" ?>"><?=anchor($this->lang->switch_uri('th'), 'TH'); ?></span>
    </div>
    <div class="block">
      <a href="javascript:void(0);" onclick="js_search();">
        <img class="icon_message _web" src="<?=base_url('img/template/icon-search.jpg')?>">
        <img class="icon_message _mobile" src="<?=base_url('img/template/icon-search.png')?>">
      </a>
    </div>
    
  </div>
</div>

<div class="template_header_background">
  <div class="container">
    <div class="row">
      <div class="col-lg-2">
        <div class="bg_mobile_logo">
          <a href="<?=site_url()?>">
            <img class="template_logo" src="<?=base_url('img/template/img-logo.jpg')?>" >
          </a>
        </div>

        <div id="nav-icon1">
          <span></span>
          <span></span>
          <span></span>
        </div>

      </div>
      <div class="col-lg-10">
        <!-- template top -->
        <ul class="template_nav">
          <li class="lanuage _mobile">
            <span class="<?= ($this->lang->lang() == "en") ? "active" : "" ?>"><?= anchor($this->lang->switch_uri('en'), 'EN'); ?></span>
            |
            <span class="<?= ($this->lang->lang() == "th") ? "active" : "" ?>"><?= anchor($this->lang->switch_uri('th'), 'TH'); ?></span>       
          </li>
          <li><a href="<?=site_url()?>" class="<?=($menu == 'home')?'active':''?>">หน้าหลัก</a></li>
          <li><a href="<?=site_url('whyyogibo')?>" class="<?=($menu == 'whyyogibo')?'active':''?>">เกี่ยวกับโยกิโบ</a></li>
          <li><a href="<?=site_url('howtoyogibo')?>" class="<?=($menu == 'howtoyogibo')?'active':''?>">การใช้โยกิโบ</a></li>
          <li><a href="<?=site_url('products')?>" class="<?=($menu == 'products')?'active':''?>">ผลิตภัณฑ์</a></li>
          <li><a href="<?=site_url('vdo')?>" class="<?=($menu == 'vdo')?'active':''?>">วีดีโอ</a></li>
          <li><a href="<?=site_url('Store')?>" class="<?=($menu == 'store')?'active':''?>">ร้านของเรา</a></li>
          <li><a href="<?= site_url('blog') ?>" class="<?= ($menu == 'blog') ? 'active' : '' ?>">บล็อก</a></li>
          <li><a href="<?= site_url('event') ?>" class="<?= ($menu == 'event') ? 'active' : '' ?>">กิจกรรม</a></li>
        </ul>
        <!-- template top -->
      </div>
    </div>
  </div>
</div>

<div class="space_mobile _mobile"></div>
<!-- template header -->