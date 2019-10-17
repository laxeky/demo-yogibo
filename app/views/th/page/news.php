<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- article -->
<div  class="news_bg">
  	<div class="container">
    	<div class="row">
		
			<?php
			$rowID = 0;
			if($newsRow > 0){
				foreach ($news as $val) {
				$id  	  = $val['_news_ID'];
				$seo_url  = $this->Object_model->url_space($val['_news_SeoName']);
				$img 	  = base_url('myAdmin/upload/_news/gallery/'.$val['_gallery_Image']);
				// $arr_date = explode(" ",$val['_carts_CreateDate']);
				$date  = $this->Object_model->getDateThai($val['_news_CreateDate']);
			?>
				<div class="col-md-6 col-lg-6 news_boxL text-left">
					<a href="<?=site_url('news/'.$id.'/'.$seo_url)?>">
						<div><img src="<?=$img?>"></div>
					</a>
				</div>
		
				<div class="col-md-6 col-lg-6 news_boxR text-left">
					<div class="news_box_tab">ข่าวสาร</div>
					<div class="top30"><?=$date?></div>
					<a href="<?=site_url('news/'.$id.'/'.$seo_url)?>">
						<h1 class="news_title"><?=$val['_news_Title']?></h1>
					</a>
					<div class="news_subject top20"><?=$val['_news_Subject']?></div>
					<a href="<?=site_url('news/'.$id.'/'.$seo_url)?>">
						<div class="readmore">อ่านเพิ่มเติม</div>
					</a>
				</div>
			<?php
					$rowID++;
				}// end foreach
				// echo '<script>this_news_id='.$rowID.';</script>';
			}
			?>
		
		</div> 
  	</div>
</div>
<!-- research -->
