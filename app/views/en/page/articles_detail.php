<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if($article['_article_Title']){
	$seo_title = $article['_article_SeoTitle'];
	$img = base_url('myAdmin/upload/_article/gallery/'.$articleImg[0]['_gallery_article_img_Image']);
?>
<!-- article -->
<div  class="article_bg">
  <div class="container">
    <div class="row">
		<?php
			$date  = $this->Object_model->getDateThai($article['_article_CreateDate']);
			// echo $date;
		?>
		<div class="col-md-1 col-lg-1"></div>	
		<div class="col-md-10 col-lg-10">
			<h1><?=$article['_article_Title']?></h1>
			<div class="article_detail">
				<div align="center"><img src="<?=$img?>" alt="<?=$seo_title?>"></div>
				<div class="top20"><?=$date?></div>
				<h2 class="article_title top20"><?=$article['_article_Title']?></h2>
				<div class="top20"><?=$article['_article_Subject']?></div>	
			</div>
			
			<a href="<?=site_url('articles')?>">
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