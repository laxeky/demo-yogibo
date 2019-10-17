<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<div class="footer_background">
  <div class="container">
      <div class="row">
        <div class="order-2 order-md-1 col-sm-12 col-md-4 col-lg-4">
          <div class="txt_callcenter">คอลเซ็นเตอร์</div>
          <div class="phone"><a href="tel:022551884">02 255 1884</a></div>
          <div class="txt_open">จันทร์ - ศุกร์ 09.00 - 18.00 น.</div>
        </div>
        <div class="order-1 order-md-2 col-sm-12 col-md-5 col-lg-4">
          <ul class="footer_social_nav">
            <li>
              <a href="https://www.facebook.com/Yogibo.Thailand/" target="_blank">
                <div class="icon_social social_facebook">facebook</div>
              </a>
            </li>
            <li>
              <a href="https://www.instagram.com/yogibothailand/" target="_blank">
                <div class="icon_social social_instargram">instargram</div>
              </a>
            </li>
             <li>
              <a href="https://www.youtube.com/channel/UCx4UWNSNh1bDVerisBH0P5g" target="_blank">
                <div class="icon_social social_youtube">youtube</div>
              </a>
            </li>
            <li>
              <a href="line://ti/p/@hgj2115j">
                <div class="icon_social social_line">line</div>
              </a>
            </li>
          </ul>
        </div>
        <div class="order-3 order-md-3 col-sm-12 col-md-3 col-lg-4">
          <div class="logo_footer _web">
            <a href="<?= site_url() ?>">
              <img class="logo_footer_right" src="<?= base_url('img/template/img-logo2.jpg') ?>">
            </a>
          </div>
        </div>
      </div>
  </div>
</div>

<div class="footer">
  <div class="container">
    <div class="row">

      <div class="col-12">
        <div class="copyright">
          © Copyright 2018. Yogibo Thailand. All Rights Reserved.
        </div>
      </div>
    </div>
  </div>
</div>

<div class="template_footer_space _mobile"></div>

<!-- nav_scrollbar -->
<div class="nav_scrollbar">
  <ul class="footer_social_nav social_nav">
    <li>
      <a href="https://www.facebook.com/Yogibo.Thailand/" target="_blank">
        <div class="icon_social social_facebook">facebook</div>
      </a>
    </li>
    <li>
      <a href="https://www.instagram.com/yogibothailand/" target="_blank">
        <div class="icon_social social_instargram">instargram</div>
      </a>
    </li>
    <li>
      <a href="https://www.youtube.com/channel/UCx4UWNSNh1bDVerisBH0P5g" target="_blank">
        <div class="icon_social social_youtube">youtube</div>
      </a>
    </li>
    <li>
      <a href="line://ti/p/@hgj2115j">
        <div class="icon_social social_line">line</div>
      </a>
    </li>
  </ul>
</div>
<!-- nav_scrollbar -->

<div id="box_contact_icon" class="box_contactus">
  <div class="bnt_contactus" onclick="js_boxContact('show');">
    <img src="<?=base_url('img/template/icon-message.png')?>"> <span class="text_contact">ติดต่อเรา</span>
  </div>
</div>

<div id="box_contact_box" class="box_contactus_input text-center">
  <div class="cHeader" onclick="js_boxContact('hide');">
    <img src="<?=base_url('img/template/icon-message.png')?>"> <span>ติดต่อเรา</span> <img src="<?=base_url('img/contact/icon-down.png')?>">
  </div>
  <div class="cBody">
    <form name="cForm" id="cForm" method="POST">
      <div class="contact_form">
        <!-- block -->
        <div class="c_block">
          <input type="text" class="input_contactUs" id="contact_FirstName" name="contact_FirstName" maxlength="100" placeholder="ชื่อ">
        </div>
        <!-- block -->
        <!-- block -->
        <div class="c_block">
          <input type="text" class="input_contactUs" id="contact_LastName" name="contact_LastName" maxlength="100" placeholder="นามสกุล">
        </div>
        <!-- block -->
        <!-- block -->
        <div class="c_block">
          <input type="text" class="input_contactUs" id="contact_Number" name="contact_Number" maxlength="10" placeholder="เบอร์โทรศัพท์" onKeyPress="return CheckNumericKeyInfo(event.keyCode, event.which);">
        </div>
        <!-- block -->
        <!-- block -->
        <div class="c_block">
          <input type="text" class="input_contactUs" id="contact_Email" name="contact_Email" maxlength="100" placeholder="อีเมล" onChange="emailCheck(this);">
        </div>
        <!-- block -->
        <!-- block -->
        <div class="c_block">
          <textarea class="area_contactUs" id="contact_Message" name="contact_Message" placeholder="ข้อความ"></textarea>
        </div>
        <div class="b_block text-center">
          <a href="javascript:void(0);" onclick="js_contactBox();">
            <div class="bnt_send">ตกลง</div>
          </a>
          <div class="c_remark"></div>
        </div>
        <!-- block -->
      </div>
    </form>
  </div>
</div>


<!-- footer nav -->

<?php
$user_id = $this->session->userdata('P80_UserID');
?>
<!-- footer nav -->

<!-- popup -->
<div class="popup" id="id_register">
  <div class="bnt_close"><a href='javascript:void(0);' onclick="$('#id_register').fadeOut(300);"><img src="<?=base_url('img/popup/bnt-close.png')?>" /></a></div>
	<div class="popup_box">
    <div class="content_box">
      <!-- content -->
      <div id="id_content"></div>
      <!-- content -->
    </div>
	</div>
</div>
<!-- popup -->

<!-- popup -->
<div class="popup" id="id_forgetpassword">
  <div class="bnt_close"><a href='javascript:void(0);' onclick="$('#id_forgetpassword').fadeOut(300);"><img src="<?=base_url('img/popup/bnt-close.png')?>" /></a></div>
	<div class="popup_box popup_password" id="id_popup_box">
    <div class="content_box">
      <!-- content -->
      <div id="id_content_password"></div>
      <!-- content -->
    </div>
	</div>
</div>
<!-- popup -->

<!-- carts_box -->
<div class="popup" id="carts_box">
  <div class="bnt_close"><a href='javascript:void(0);' onclick="$('#carts_box').fadeOut(300);"><img src="<?=base_url('img/popup/bnt-close.png')?>" /></a></div>
	<div class="carts_popup_box">
    <div class="carts_content_box">
      <h2>เพิ่มสินค้าลงในตะกร้า</h2>
      <div class="bnt_confirm" onclick="$('#carts_box').fadeOut(300);" >ซื้อสินค้าต่อ</div>
      <a href="<?=site_url('carts')?>"><div class="bnt_confirm">ชำระเงิน</div></a>
    </div>
	</div>
</div>
<!-- carts_box -->



<!-- popup -->
<div class="popup" id="id_message">
  <div class="bnt_close"><a href='javascript:void(0);' onclick="$('#id_message').fadeOut(300);"><img src="<?=base_url('img/popup/bnt-close.png')?>" /></a></div>
	<div class="popup_message">
    <div class="content_box">
      <!-- content -->
      <div id="area_message"></div>
      <!-- content -->
    </div>
	</div>
</div>
<!-- popup -->

<!-- popup -->
<div class="popup" id="id_search">
  <div class="bnt_close"><a href='javascript:void(0);' onclick="$('#id_search').fadeOut(300);"><img src="<?=base_url('img/popup/bnt-close.png')?>" /></a></div>
	<div class="popup_message popup_search">
    <div class="content_box">
      <!-- content -->
      <div id="area_search"></div>
      <!-- content -->
    </div>
	</div>
</div>
<!-- popup -->

<!-- popup -->
<div class="popup" id="contact_box">
<div class="bnt_close"><a href='javascript:void(0)' onclick="$('#contact_box').fadeOut(300);"><img src="<?=base_url('img/popup/bnt-close.png')?>" /></a></div>
	<div class="carts_popup_box">
    <div class="carts_content_box">
      <h2>บันทึกเสร็จแล้ว</h2>
      <input class="bnt_confirm" type="button" value="ตกลง" onclick="$('#contact_box').fadeOut(300);" />
    </div>
	</div>
</div>
<!-- popup -->

<!-- popup -->
<div class="popup" id="contact_box2">
<div class="bnt_close"><a href='javascript:void(0)' onclick="$('#contact_box2').fadeOut(300);"><img src="<?=base_url('img/popup/bnt-close.png')?>" /></a></div>
	<div class="carts_popup_box">
    <div class="carts_content_box">
      <h2>บันทึกเสร็จแล้ว</h2>
      <input class="bnt_send" type="button" value="ตกลง" onclick="$('#contact_box2').fadeOut(300);" />
    </div>
	</div>
</div>
<!-- popup -->


<!-- carts_box -->
<div class="popup" id="confirm_box">
<div class="bnt_close"><a href='javascript:void(0);' onclick="$('#confirm_box').fadeOut(300);"><img src="<?=base_url('img/popup/bnt-close.png')?>" /></a></div>
	<div class="carts_popup_box">
    <div class="carts_content_box">
      <h2>บันทึกเสร็จแล้ว</h2>
      <input class="bnt_confirm" type="button" value="ตกลง" onclick="$('#confirm_box').fadeOut(300);" />
    </div>
	</div>
</div>
<!-- carts_box -->


<!-- popup -->
<div class="popup" id="id_vdo">
  <div class="bnt_close"><a href='javascript:void(0);' onclick="js_vdoClose();"><img src="<?=base_url('img/popup/bnt-close.png')?>" /></a></div>
	<div class="popup_box popup_vdo">
    <div class="content_box">
      <!-- content -->
      <div class="box_vdo">
        <h1>วีดีโอ</h1>
        <iframe id="id_content_vdo" class="content_vdo" width="560" height="315"  frameborder="0" allowfullscreen></iframe>
      </div>
      <!-- content -->
    </div>
	</div>
</div>
<!-- popup -->

<!-- carts_box -->
<div class="popup" id="forget_box">
<div class="bnt_close"><a href='javascript:void(0);' onclick="$('#forget_box').fadeOut(300);"><img src="<?=base_url('img/popup/bnt-close.png')?>" /></a></div>
	<div class="carts_popup_box">
    <div class="carts_content_box">
      <h2 id="area_forget_box"></h2>
      <input class="bnt_confirm" type="button" value="OK" onclick="$('#forget_box').fadeOut(300);" />
    </div>
	</div>
</div>
<!-- carts_box -->

<!-- carts_box -->
<div class="popup" id="forget2_box">
<div class="bnt_close"><a href='javascript:void(0);' onclick="window.location='<?=site_url('home');?>';"><img src="<?=base_url('img/popup/bnt-close.png')?>" /></a></div>
	<div class="carts_popup_box">
    <div class="carts_content_box">
      <h2 id="area_forget2_box"></h2>
      <input class="bnt_confirm" type="button" value="OK" onclick="window.location='<?=site_url('home');?>';" />
    </div>
	</div>
</div>
<!-- carts_box -->

<!-- popup -->
<div class="popup" id="id_subscribe">
	<div class="popup_subscribe">
    <div class="bnt_close_subscribe" onclick="js_subscribeClose();"><img src="<?=base_url('img/email-subscribe/icon-close.png')?>"></div>
    <h1>ติตตามข่าวสารและโปรโมชั่น<br>โยกิโบ ประเทศไทย</h1>
    <div class="box_subscribe">
      <div id="area_subscribe">
        <form id="subscribeForm" name="subscribeForm" method="post">
          <!-- block -->
          <div class="subscribe_block">
            <input type="text" class="input_subscribe" id="subscribe_FirstName" name="subscribe_FirstName" maxlength="100" placeholder="ชื่อ">
          </div>
          <!-- block -->
          <!-- block -->
          <div class="subscribe_block">
            <input type="text" class="input_subscribe" id="subscribe_LastName" name="subscribe_LastName" maxlength="100" placeholder="นามสกุล">
          </div>
          <!-- block -->
          <!-- block -->
          <div class="subscribe_block">
            <input type="text" class="input_subscribe" id="subscribe_Phone" name="subscribe_Phone" maxlength="10" placeholder="เบอร์โทรศัพท์" onKeyPress="return CheckNumericKeyInfo(event.keyCode, event.which);">
          </div>
          <!-- block -->
          <!-- block -->
          <div class="subscribe_block">
            <input type="text" class="input_subscribe" id="subscribe_Email" name="subscribe_Email" maxlength="100" placeholder="อีเมล" onChange="emailCheck(this);">
          </div>
          <!-- block -->
          <!-- block -->
          <div class="subscribe_block">
            <a href="javascript:void(0);" onclick="js_subscribeBox();">
              <div class="bnt_subscribe">ส่ง</div>
            </a>
            <div id="subscribe_remark" class="c_remark"></div>
          </div>
          <!-- block -->
        </form>
      </div>
    </div>
	</div>
</div>
<!-- popup -->


<!-- popup -->
<div class="popup" id="id_banner_promotion">
	<div class="popup_banner_promotion">
    <div class="bnt_close_subscribe" onclick="js_bannerPromotionClose();"><img src="<?= base_url('img/banner-promotion/icon-close.png') ?>"></div>
    <div id="area_banner_promotion" class="content"></div>  
	</div>
</div>
<!-- popup -->


<script src="<?=base_url('lib/js/custom.js')?>"></script>
<script>
  js_carts_sum();
  <?php 
  if(empty($_SESSION['yogibo_subscribe'])){
  ?>
    $('#id_subscribe').fadeIn(300);
  <?php 
  }
  ?>

  js_checkBannerPromotion();
</script>

</body>
</html>
