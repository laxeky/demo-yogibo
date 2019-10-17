<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- article -->
<div  class="article_bg">
  <div class="container">
    <div class="row">
	 
			<?php
				$rowID = 0;
				if($articleRow > 0){
					foreach ($article as $val) {
					$id  = $val['_article_ID'];
					$seo_url  = $this->Object_model->url_space($val['_article_SeoName']);
					$img = base_url('myAdmin/upload/_article/gallery/'.$val['_gallery_Image']);
					// $arr_date = explode(" ",$val['_carts_CreateDate']);
					$date  = $this->Object_model->getDateThai($val['_article_CreateDate']);
			?>
							
			<div class="col-md-4 col-lg-4 article_box">
				<a href="<?=site_url('articles/'.$id.'/'.$seo_url)?>">
					<div><img src="<?=$img?>" alt="<?=$val['_article_Title']?>"></div>
				</a>
				<div class="top20"><?=$date?></div>
				<a href="<?=site_url('articles/'.$id.'/'.$seo_url)?>">
					<h1 class="ar_title top20"><?=$val['_article_Title']?></h1>
				</a>
				<div class="news_subject top20"><?=$val['_article_Subject']?></div>
				<a href="<?=site_url('articles/'.$id.'/'.$seo_url)?>">
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
