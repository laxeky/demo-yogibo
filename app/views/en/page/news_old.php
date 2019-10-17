<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- article -->
<div  class="news_bg">
  <div class="container">
    <div class="row">
      	<div class="col-md-12 text-center">
				<div>
					<div class="title_bg">
						<h1>โปรโมชั่น &amp; ข่าวสาร</h1>
					</div>
					<h2>สิทธิพิเศษและเรื่องราวน่ารู้เพื่อการดูแลสุขภาพ</h2>
				</div>
		</div>
	 
				<div class="col-md-12 text-center">
					<!-- <div class="news_tab">
						<div class="news_tab_L">
							<li>ทั้งหมด</li>
							<li>โปรโมชั่น</li>
							<li>ข่าวสาร</li>
						</div>
						<div class="news_tab_R"></div>
						<div class="clear"></div>
					</div> -->
				</div>
		

				<?php
				$rowID = 0;
				if($newsRow > 0){
					foreach ($news as $val) {
					$id  = $val['_news_ID'];
					$img = base_url('myAdmin/upload/_news/gallery/'.$val['_gallery_Image']);
					// $arr_date = explode(" ",$val['_carts_CreateDate']);
					$date  = $this->Object_model->getDateThai($val['_news_CreateDate']);
       			?>
							<div class="col-md-6 col-lg-6 news_boxL text-left">
								<a href="<?=site_url('news/detail/'.$id)?>">
									<div><img src="<?=$img?>"></div>
								</a>
							</div>
					
							<div class="col-md-6 col-lg-6 news_boxR text-left">
								<div class="news_box_tab">ข่าวสาร</div>
								<div class="top30"><?=$date?></div>
								<div class="news_title"><?=$val['_news_Title']?></div>
								<div class="news_subject top20"><?=$val['_news_Subject']?></div>
								<a href="<?=site_url('news/detail/'.$id)?>">
									<div class="readmore">อ่านเพิ่มเติม</div>
								</a>
							</div>
				<?php
						$rowID++;
					}// end foreach
					// echo '<script>this_news_id='.$rowID.';</script>';
				}
				?>
		
		
		
				<!-- <div class="col-md-6 col-lg-6 news_boxL text-left">
					<a href="<?=base_url('news/detail/2')?>">
					<div><img src="<?=base_url('img/news/2.jpg')?>"></div>
					</a>
					</div>
					<div class="col-md-6 col-lg-6 news_boxR text-left">
					<div class="news_box_tab">โปรโมชั่น</div>
					<div class="top30">1 มี.ค. 2561</div>
					<div class="news_title">
						โปรโมชั่น P80 Natural Essence 
			สุขภาพดีที่หาซื้อได้แล้ววันนี้
					</div>
					<div class="top20">
						จิ๊กเป่ายิงฉุบสจ๊วต ผิดพลาดกู๋ครัวซองคลาสสิกนายแบบ พลานุภาพ
						มวลชนโคโยตีเซอร์ไพรส์แอลมอนด์ ตรวจสอบบาร์บี้โพลารอยด์ อันตร
						กิริยายิวสะบึมวาทกรรมวอล์ก  
					</div>
					<a href="<?=base_url('news/detail/2')?>">
						<div class="readmore">อ่านเพิ่มเติม</div>
						</a>
					</div>	 -->
		
		</div> 
  </div>
</div>
<!-- research -->
