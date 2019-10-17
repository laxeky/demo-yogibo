<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($news['_news_Title']){
	$seo_title = $news['_news_SeoTitle'];
	$img = base_url('myAdmin/upload/_news/gallery/'.$newsImg[0]['_gallery_news_img_Image']);
?>
<!-- article -->
<div  class="article_bg">
  	<div class="container">
		<div class="row">
		
			<div class="col-md-1 col-lg-1"></div>	
			<div class="col-md-10 col-lg-10 ">
				<h1><?=$news['_news_Title']?></h1>
				<div class="article_detail">
					<div align="center"><img src="<?=$img?>" alt="<?=$seo_title?>"></div>
				
					<div class="news_detail">
			
						<div class="news_box_tab">ข่าวสาร</div>
						<div class="top30">
						<?php
							$date  = $this->Object_model->getDateThai($news['_news_CreateDate']);
							echo $date;
						?>
						</div>
						<h2 class="news_title"><?=$news['_news_Title']?></h2>
						<div class="top20"><?=$news['_news_Subject']?></div>					
						<?php
						if($newsImgRow > 0){
							$i=0;
							foreach($newsImg as $val){
								if($i != 0){
								$img = base_url('myAdmin/upload/_news/gallery/'.$val['_gallery_news_img_Image']);
						?>
									<div class="news_image">
										<img src="<?=$img?>">
									</div>
						<?php
								}
							$i++;
							}
						}
						?>
						
					</div> 
				
				</div>
				<a href="<?=site_url('news')?>">
					<div class="article_back"> &lt; กลับ </div>
				</a>
			</div>
			<div class="col-md-1 col-lg-1"></div>	
			
		</div>
    
  	</div>
</div>
<!-- research -->

<?php 

}
?>