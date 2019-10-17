<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.5&appId=293770350766849";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>


    <? 

$src = base_url('myAdmin/upload/_blog/'.$rs['_blog_Image']);		
				$key = $rs['_blog_ID'];	
				$share_url = base_url().$language."/".$page."/view"."/".$key;
				$title 		= ($rs['_blog_Title'])?$rs['_blog_Title']:$rs['_blog_TitleEn'];
				$subject 	= ($rs['_blog_Subject'])?$rs['_blog_Subject']:$rs['_blog_SubjectEn'];
?>
<link rel="stylesheet" href="<?=base_url("lib/flexslider/blog.css")?>?v=1001" type="text/css" media="screen"  defer/>
<!-- product -->
<div id="products" class="products why_bg">
  <div class="container">
	 
	  <div class="row">
            <div class="col-lg-12 text-center">
                <h1>บล็อก</h1>
            </div>
        </div>
	  
    <div class="row event_detail">
      <div class="col-lg-12">
    		<div align="center">
				<div id="slider" class="flexslider" >
            		<ul class="slides">
				<?php
						if($blogImgRow > 0){
							$i=0;
							foreach($blogImg as $val){
								
								$img = base_url('myAdmin/upload/_blog/gallery/'.$val['_gallery_blog_img_Image']);
						?>
					<li><img class="blog_detail_img" src="<?=$img?>" ></li>
				<? }}?>
					</ul>
		  		 </div> 	
		  	</div>   
		  	<div class="event_thumb">
		  		<div id="carousel" class="flexslider ">
                          <ul class="slides">
							<?php
						if($blogImgRow > 0){
							$i=0;
							foreach($blogImg as $val){
								
								$img = base_url('myAdmin/upload/_blog/gallery/'.$val['_gallery_blog_img_Image']);
						?>
						<li>
							<div class="image">
								<img src="<?=$img?>" width="144" >
								
							</div>
						 </li>
						 <? }} ?>
							</ul>
		</div>
		  	</div>
		  
		  
		    <div class="top20">
		  		<?php
						if($rs['_blog_DateB']){
							echo changeformatDate($rs['_blog_DateB'],$language);
						}
								
						if(!empty($rs['_blog_DateE'])&&($rs['_blog_DateE']!="0000-00-00")){
								echo "- ".changeformatDate($rs['_blog_DateE'],$language);
						}
					
					?>
		  	</div>
		  	<div>
		  		<h2 class="style1"><?=$title?></h2>
		  	</div>
		  	<div class="top30">
		  		<?=$subject?>
		  	</div>
		  
		  	<div class="shop_flex top20">
							
							<div class="list_box"><a href="<?=site_url('blog/')?>" ><div class="bt_back">ย้อนกลับ</div></a></div>
							
						  <!-- bnt share -->
						  <div id="box_share_<?=$key?>" class="box_share">
							<div class="bt_share2">แชร์</div>
							<div id="option_share_<?=$key?>" class="option_share2">
								<div class="bnt_arrow2"></div>
								<ul class="bnt_social_link">
								  <li>
									<div class="fb-share-button" data-href="<?=$share_url?>" data-layout="button"></div>
								  </li>
								  <li>
									<a href="https://twitter.com/share" class="twitter-share-button" data-url="<?=$share_url?>">Tweet</a>
									  <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+'://platform.twitter.com/widgets.js';fjs.parentNode.insertBefore(js,fjs);}}(document, 'script', 'twitter-wjs');</script>
								  </li>
								  <li>
									<span>
									  <script type="text/javascript" src="//media.line.me/js/line-button.js?v=20140411" ></script>
									  <script type="text/javascript">
										new media_line_me.LineButton({"pc":true,"lang":"en","type":"a","text":"<?=$title?> <?=$share_url?>","withUrl":false});
									  </script>
									</span>
								  </li>
								</ul>
							</div>
						  </div>
						  <!-- bnt share -->
						</div>
		  
		  
      </div>	
	 </div>
  </div>
</div>

<script>
              $('#box_share_<?=$key?>').hover(function () {
                $('#option_share_<?=$key?>').slideDown();
              }, function () {
                $('#option_share_<?=$key?>').slideUp();
              });
            </script>

<!-- product -->

<script type="text/javascript" src="<?=base_url("lib/flexslider/jquery.flexslider.js")?>" ></script>
   <script type="text/javascript" >
	
	  
	  $('#carousel').flexslider({
		
        animation: "slide",
        controlNav: false,
		   
		directionNav: true,
        animationLoop: false,
        slideshow: false,
         itemWidth: 150,
		  itemMargin: 5,
        asNavFor: '#slider'
      });
      
      $('#slider').flexslider({
		 animation: "slide",
        controlNav: false,
		 smoothHeight: true,
		directionNav: true,
        animationLoop: false,
        slideshow: false,
		  
        sync: "#carousel",
        start: function(slider){
          //$('body').removeClass('loading');
        }
      });
</script>
