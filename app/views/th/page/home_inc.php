<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- banner home -->
<div class="home_banner">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
        <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
        <div class="carousel-item active">
            <img class="d-block w-100" src="<?=base_url('img/banner-home/img-key.jpg')?>" alt="First slide">
        </div>
        <div class="carousel-item">
            <img class="d-block w-100" src="<?=base_url('img/banner-home/img-key2.jpg')?>" alt="Second slide">
        </div>
        </div>
        <!-- <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
        </a> -->
    </div>
</div>

<script>
  $('.carousel').carousel({
    interval: 8000
  });
</script>
<!-- banner home -->


<!-- product -->
<div id="products" class="product_bg">
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1>ผลิตภัณฑ์</h1>
        <img src="<?=base_url('img/home/product-header-line.png')?>">
        <h2>P80 ทุกหยดอุดมด้วยสารอาหารที่ดีต่อร่างกาย</h2>
      </div>
    </div>
    <div class="row">

    <?php
    if($productRow > 0){
      foreach ($product as $key => $val) {
        
        $id = $val['_product_ID'];
        $product_img = base_url('myAdmin/upload/_product/gallery/'.$val['_gallery_Image']);
    ?>
      <!-- col -->
      <div class="col-md-4 col-lg-4">
        <!-- product -->
        <div class="product_box">  
          <a href="<?=site_url('products/'.$id)?>">
            <div class="img">
              <img src="<?=$product_img?>">
            </div>
          </a>
          <div class="product_info">
            <a href="<?=site_url('products/'.$id)?>">
              <h3><?=$val['_product_Title']?></h3>
              <div class="subject">
                <?=$val['_product_Description']?>
              </div>
              
              <div class="product_price_flex">
                <div class="weight">
                  <?=$val['_product_Weight']?>
                </div>
                <div class="price">
                  ฿ <?=$val['_product_Price']?> .-
                </div>
              </div>

              <input type="button" class="bnt_order" name="order" value="ข้อมูลสินค้า">
            </a>
            <!-- <input type="button" class="bnt_order" name="order" value="ข้อมูลสินค้า" onclick="js_addCarts('<?=$id?>')"> -->
            
          </div>
        </div>
        <!-- product -->
      </div>
      <!-- col -->
    <?php
      } // end forearch
    } // end if
    ?>     

      
    </div>
  </div>
</div>
<!-- product -->


<!-- news & promotion -->
<!-- <div class="news_background">
  
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1>โปรโมชั่น & ข่าวสาร</h1>
        <img src="<?=base_url('img/home/product-header-line.png')?>">
        <h2>สิทธิพิเศษและเรื่องราวน่ารู้เพื่อการดูแลสุขภาพ</h2>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <div class="box_news">
          <div class="img_preview">
            <img src="<?=base_url('img/promotion/img-promotion-review.jpg')?>">
          </div>

          <div class="box_news_content">
            <div class="date">1 มี.ค. 2561</div>
            <div class="title">
              กรรมาชนต่อยอดไง พะเรอซิ่งมอลล์ เซ็กซี่คอ<br>บลูเบอร์รี่ฉลุยทีวีแครกเกอร์ รวมมิตร
            </div>
            <div class="subject">
              จิ๊กเป่ายิงฉุบสจ๊วต ผิดพลาดกู๋ครัวซองคลาสสิกนายแบบ พลานุภาพ
              มวลชนโคโยตีเซอร์ไพรส์แอลมอนด์ ตรวจสอบบาร์บี้โพลารอยด์ อันตร
              กิริยายิวสะบึมวาทกรรมวอล์ก
            </div>

            <a href="#">
              <input type="button" class="bnt_readmore" value="อ่านเพิ่มเติม">
            </a>
          </div>

        </div>
      </div>
    </div>
  </div>

</div> -->
<!-- news & promotion -->


<!-- research -->
<div class="research_background">
  
  <div class="container">
    <div class="row">
      <div class="col-lg-12 text-center">
        <h1>งานวิจัย</h1>
        <img src="<?=base_url('img/home/product-header-line.png')?>">
        <h2>งานวิจัยระดับโลกสู่เครื่องดื่มลำไยสกัดเข้มข้น</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-5 col-lg-5">
        <img src="<?=base_url('img/research/icon-5.png')?>" alt="">
      </div>
      <div class="col-md-6 col-lg-6">

        <div class="research_box">
          <h3>พิสูจน์ผลลัพธ์จริง จาก Clinical Trial <br>และงานวิจัยชั้นนำ</h3>
          <div class="title">
            ผลิตภัณฑ์ลำไยสกัดเข้มข้น<br>
            ภายใต้ขนวนการผลิตที่เป็นเอกสิทธิ์เฉพาะ<br>
            นำมาซึ่งสารต้านอนุมูลอิสระ และประโยชน์อื่นๆ
          </div>

          <!-- <input type="button" class="bnt_research" value="ดูงานวิจัย" > -->
        </div>

      </div>
      <div class="col-lg-1">
      </div>
    </div>
  </div>

</div>



<div class="research_background2">

  <!-- include file -->
  <link rel="stylesheet" href="<?=base_url('lib/slide-box/feature-carousel.css')?>" charset="utf-8" />
  <!-- <script src="//code.jquery.com/jquery-1.7.0.min.js"></script> -->
  <script src="<?=base_url('lib/slide-box/jquery.featureCarousel.js')?>" type="text/javascript" charset="utf-8"></script>
  <!-- include file -->
  
  <div class="container">
    <div class="row">
      <div class="col-md-12 col-lg-12 text-center">
        <h1>ความประทับใจ</h1>
        <img src="<?=base_url('img/home/product-header-line.png')?>">
        <h2>ทุกประสบการณ์ยืนยัน ผลลัพธ์มหัศจรรย์จากธรรมชาติ</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 col-lg-12">

        <div class="impress_box">
          <!-- slide -->
          <div class="carousel-container">
    
            <div id="carousel">
              <div class="carousel-feature">
                <a href="#">
                  <iframe class="carousel-image" width="560" height="315" src="https://www.youtube.com/embed/e4zLwjV2W24?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                </a> 
              </div>
              <div class="carousel-feature">
                <a href="#">
                  <iframe class="carousel-image" width="560" height="315" src="https://www.youtube.com/embed/Ipndg4DX-04?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                </a> 
              </div>
              <div class="carousel-feature">
                <a href="#ghi">
                  <iframe class="carousel-image" width="560" height="315" src="https://www.youtube.com/embed/N_q27RNXaME?rel=0&showinfo=0" frameborder="0" allowfullscreen></iframe>
                </a> 
              </div> 
            </div>
          
          </div>
          <!-- slide -->
        </div>

      </div>
    </div>
  </div>

</div>

<script type="text/javascript">
      $(document).ready(function() {
        var carousel = $("#carousel").featureCarousel({
         
        });
      });
    </script>
<!-- research -->