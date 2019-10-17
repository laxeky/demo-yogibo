<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<link rel="stylesheet" href="<?=base_url("lib/flexslider/flexslider.css")?>?v=1001" type="text/css" media="screen"  /> 

<!-- article -->
<div  class="testimonial_bg">
  <div class="container">
    <div class="row">
		<div class="col text-center">
			<h1 class="title_bg">ผลลัพธ์ผู้ใช้จริง</h1>
			<h2>ทุกประสบการณ์ยืนยัน ผลลัพธ์มหัศจรรย์จากธรรมชาติ</h2>
		</div>
	</div>
	<div class="row">

		<div class="col-md-12 col-lg-12 text-center _web">
			<div class="testimonial_video" id="testimonial_video">
			<iframe width="700" height="400" src="https://www.youtube.com/embed/<?=$vdo[0]['_vdo_Code']?>" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
			</div>
		</div>
		
		<div class="col-md-12 col-lg-12 text-left">	
			<div class="txt_clipall"><b>คลิปทั้งหมด</b></div>
			
			<div id="slider" class="flexslider slide_home">
				<?php 
				if($vdoRow > 0){
				?>
				<ul class="slides">
					<?php 
					foreach($vdo as $key => $val){

						$id  	= $val['_vdo_ID'];
						$_time 	= $val['_vdo_Time'];
						$_name 	= $val['_vdo_Title'];
						$_code 	= $val['_vdo_Code'];

						if($val['_vdo_Image'] != ''){
							$img = base_url('myAdmin/upload/_vdo/'.$val['_vdo_Image']);
						}else{
							$img = base_url('img/testimonial/person.jpg');
						}
					?>
					<li>
						<div class="testimonial_box _web">
							<a href="javascript:void(0);" onClick="js_clip('<?=site_url('testimonial/view/'.$_code)?>');">
								<div class="testimonial_shadow">
									<div class="testimonial_shadow_text" >
										<div class="testimonial_shadow_name"><?=$_name?></div>
										<div class="testimonial_shadow_time"><?=$_time?> นาที</div>
										<div class="clear"></div>
									</div>
								</div>
							</a>
							<div><img src="<?=$img?>"></div> 
						</div>
						<div class="testimonial_box _mobile">
							<a href="javascript:void(0);" onclick="js_vdoView('<?=$_code?>');">
								<div class="testimonial_shadow">
									<div class="testimonial_shadow_text" >
										<div class="testimonial_shadow_name"><?=$_name?></div>
										<div class="testimonial_shadow_time"><?=$_time?> นาที</div>
										<div class="clear"></div>
									</div>
								</div>
							</a>
							<div><img src="<?=$img?>"></div> 
						</div>
					</li>
					<?php
					}
					?>
					
					<!-- <li>
						<div class="testimonial_box _web">
							<a href="javascript:void(0);" onClick="js_clip('<?=site_url('testimonial/view/2')?>');">
								<div class="testimonial_shadow">
									<div class="testimonial_shadow_text" >
										<div class="testimonial_shadow_name">พลเอก มงคล อัมพรพิสิฏฐ์</div>
										<div class="testimonial_shadow_time">1.26 นาที</div>
										<div class="clear"></div>
									</div>
								</div>
							</a>
							<div><img src="<?=base_url('img/testimonial/thumb2.jpg')?>"></div> 
						</div>

						<div class="testimonial_box _mobile">
							<a href="javascript:void(0);" onclick="js_vdoView('Svk8qJmxCHc');">
								<div class="testimonial_shadow">
									<div class="testimonial_shadow_text" >
										<div class="testimonial_shadow_name">พลเอก มงคล อัมพรพิสิฏฐ์</div>
										<div class="testimonial_shadow_time">1.26 นาที</div>
										<div class="clear"></div>
									</div>
								</div>
							</a>
							<div><img src="<?=base_url('img/testimonial/thumb2.jpg')?>"></div> 
						</div>
					</li>
					<li>
						<div class="testimonial_box _web">
							<a href="javascript:void(0);" onClick="js_clip('<?=site_url('testimonial/view/3')?>');">
								<div class="testimonial_shadow">
									<div class="testimonial_shadow_text" >
										<div class="testimonial_shadow_name">คุณหญิง ศศิมา ศรีวิกรม์</div>
										<div class="testimonial_shadow_time">1.15 นาที</div>
										<div class="clear"></div>
									</div>
								</div>
							</a>
							<div><img src="<?=base_url('img/testimonial/thumb3.jpg')?>"></div> 
						</div>

						<div class="testimonial_box _mobile">
							<a href="javascript:void(0);" onclick="js_vdoView('SDzNO6uuMKE');">
								<div class="testimonial_shadow">
									<div class="testimonial_shadow_text" >
										<div class="testimonial_shadow_name">คุณหญิง ศศิมา ศรีวิกรม์</div>
										<div class="testimonial_shadow_time">1.15 นาที</div>
										<div class="clear"></div>
									</div>
								</div>
							</a>
							<div><img src="<?=base_url('img/testimonial/thumb3.jpg')?>"></div> 
						</div>
					</li>
					<li>
						<div class="testimonial_box _web">
							<a href="javascript:void(0);" onClick="js_clip('<?=site_url('testimonial/view/4')?>');">
								<div class="testimonial_shadow">
									<div class="testimonial_shadow_text" >
										<div class="testimonial_shadow_name">คุณกร ทัพพะรังสี</div>
										<div class="testimonial_shadow_time">1.50 นาที</div>
										<div class="clear"></div>
									</div>
								</div>
							</a>
							<div><img src="<?=base_url('img/testimonial/thumb4.jpg')?>"></div> 
						</div>

						<div class="testimonial_box _mobile">
							<a href="javascript:void(0);" onclick="js_vdoView('HhAYzLmwzjY');">
								<div class="testimonial_shadow">
									<div class="testimonial_shadow_text" >
										<div class="testimonial_shadow_name">คุณกร ทัพพะรังสี</div>
										<div class="testimonial_shadow_time">1.50 นาที</div>
										<div class="clear"></div>
									</div>
								</div>
							</a>
							<div><img src="<?=base_url('img/testimonial/thumb4.jpg')?>"></div> 
						</div>

					</li>
					<li>
						<div class="testimonial_box _web">
							<a href="javascript:void(0);" onClick="js_clip('<?=site_url('testimonial/view/5')?>');">
								<div class="testimonial_shadow">
									<div class="testimonial_shadow_text" >
										<div class="testimonial_shadow_name">Natural Essence viral</div>
										<div class="testimonial_shadow_time">1.50 นาที</div>
										<div class="clear"></div>
									</div>
								</div>
							</a>
							<div><img src="<?=base_url('img/testimonial/thumb5.jpg')?>"></div> 
						</div>

						<div class="testimonial_box _mobile">
							<a href="javascript:void(0);" onclick="js_vdoView('XTkdF-iGIsQ');">
								<div class="testimonial_shadow">
									<div class="testimonial_shadow_text" >
										<div class="testimonial_shadow_name">Natural Essence viral</div>
										<div class="testimonial_shadow_time">1.50 นาที</div>
										<div class="clear"></div>
									</div>
								</div>
							</a>
							<div><img src="<?=base_url('img/testimonial/thumb5.jpg')?>"></div> 
						</div>
					</li>
					<li>
						<div class="testimonial_box _web">
							<a href="javascript:void(0);" onClick="js_clip('<?=site_url('testimonial/view/6')?>');">
								<div class="testimonial_shadow">
									<div class="testimonial_shadow_text" >
										<div class="testimonial_shadow_name">P80</div>
										<div class="testimonial_shadow_time">5.01 นาที</div>
										<div class="clear"></div>
									</div>
								</div>
							</a>
							<div><img src="<?=base_url('img/testimonial/thumb6.jpg')?>"></div> 
						</div>

						<div class="testimonial_box _mobile">
							<a href="javascript:void(0);" onclick="js_vdoView('M2k8ZQtOBrk');">
								<div class="testimonial_shadow">
									<div class="testimonial_shadow_text" >
										<div class="testimonial_shadow_name">P80</div>
										<div class="testimonial_shadow_time">5.01 นาที</div>
										<div class="clear"></div>
									</div>
								</div>
							</a>
							<div><img src="<?=base_url('img/testimonial/thumb6.jpg')?>"></div> 
						</div>
					</li>
					<li>
						<div class="testimonial_box _web">
							<a href="javascript:void(0);" onClick="js_clip('<?=site_url('testimonial/view/7')?>');">
								<div class="testimonial_shadow">
									<div class="testimonial_shadow_text" >
										<div class="testimonial_shadow_name">คุณเฉลิมชัย มหากิจศิริ </div>
										<div class="testimonial_shadow_time">0.54 นาที</div>
										<div class="clear"></div>
									</div>
								</div>
							</a>
							<div><img src="<?=base_url('img/testimonial/3.jpg')?>"></div> 
						</div>

						<div class="testimonial_box _mobile">
							<a href="javascript:void(0);" onclick="js_vdoView('Ipndg4DX-04');">
								<div class="testimonial_shadow">
									<div class="testimonial_shadow_text" >
										<div class="testimonial_shadow_name">คุณเฉลิมชัย มหากิจศิริ </div>
										<div class="testimonial_shadow_time">0.54 นาที</div>
										<div class="clear"></div>
									</div>
								</div>
							</a>
							<div><img src="<?=base_url('img/testimonial/3.jpg')?>"></div> 
						</div>

					</li>
					<li>
						<div class="testimonial_box _web">
							<a href="javascript:void(0);" onClick="js_clip('<?=site_url('testimonial/view/8')?>');">
								<div class="testimonial_shadow">
									<div class="testimonial_shadow_text" >
										<div class="testimonial_shadow_name">คุณแมนนี ปาเกียว </div>
										<div class="testimonial_shadow_time">1.12 นาที</div>
										<div class="clear"></div>
									</div>
								</div>
							</a>
							<div><img src="<?=base_url('img/testimonial/4.jpg')?>"></div> 
						</div>

						<div class="testimonial_box _mobile">
							<a href="javascript:void(0);" onclick="js_vdoView('GOHlM8vT81k');">
								<div class="testimonial_shadow">
									<div class="testimonial_shadow_text" >
										<div class="testimonial_shadow_name">คุณแมนนี ปาเกียว </div>
										<div class="testimonial_shadow_time">1.12 นาที</div>
										<div class="clear"></div>
									</div>
								</div>
							</a>
							<div><img src="<?=base_url('img/testimonial/4.jpg')?>"></div> 
						</div>

					</li> -->
				</ul>
				<?php 
				}
				?>
			</div>	
		</div>
	
	  
  	</div> 
  </div>
</div>

<div class="testimonial_bg2">
	<div class="container">
		<div class="row">
			<div class="col">
				<div class="testtimonial_flex">
				<?php
				$rowID = 0;
				if($testimonialRow > 0){
					foreach ($testimonial as $val) {
					$id  = $val['_testimonial_ID'];

					if($val['_testimonial_Image'] != ''){
						$img = base_url('myAdmin/upload/_testimonial/'.$val['_testimonial_Image']);
					}else{
						$img = base_url('img/testimonial/person.jpg');
					}
					// echo $img;
					// $date  = $this->Object_model->getDateThai($val['_news_CreateDate']);
       			?>
					<!-- content -->
					<div class="box">
						<img class="img" src="<?=$img?>">
						<div class="name"><?=$val['_testimonial_Title']?></div>
						<div class="title"><?=$val['_testimonial_Subject']?></div>
					</div>
					<!-- content -->

				<?php
					}
				}
				?>

				<!-- content -->
				<!-- <div class="box">
					<img class="img" src="">
					<div class="title">
						ผมเป็นคนหนึ่งที่มีปัญหาเกี่ยวกับต่อมลูกหมากโต ต้องเข้าห้องน้ำวันละหลายครั้งทั้งกลางวันและกลางคืน
						ผมได้ปรึกษาหมอและรับประทานยามานานหลายเดือนก็ไม่รู้สึกดีขึ้น จนได้ลองทาน P80
						หลังจากได้ทานเพียง 2 วัน ก็รู้สึกเห็นผลได้อย่างไม่น่าเชื่อ ความถี่ที่ต้องเข้าห้องน้ำ ลดลง 80-90%
						สิ่งที่น่าสังเกตอีกอย่างคือ ฝ่ามือและฝ่าเท้าอุ่นขึ้น เข้าใจว่า พลังงานความอุ่นคงมาจาก P80
					</div>
					<div class="name">
						คุณอัครเดช
					</div>
				</div> -->
				<!-- content -->

					

				</div>
			</div>
		</div>
	</div>
</div>
<!-- research -->

<script type="text/javascript" src="<?=base_url("lib/flexslider/jquery.flexslider.js")?>" ></script>
<script type="text/javascript" >
	
	test =	$("#slider").width();
	if(test>650){
		box_width = parseInt(parseInt(test)/3)
	}else{
		box_width = parseInt(parseInt(test))	
	}
	  //alert(box_width);
	$('.flexslider').flexslider({
    	animation: "slide",
    	animationLoop: false,
		directionNav: true,  
		controlNav: false,
    	itemWidth: box_width,
    	itemMargin: 0
	});
	  
</script>

