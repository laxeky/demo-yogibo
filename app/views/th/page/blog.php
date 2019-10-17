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

<!-- product -->
<div id="products" class="products why_bg">
  <div class="container">
	 
	  <div class="row">
            <div class="col-lg-12 text-center">
                <h1>บล็อก</h1>
            </div>
        </div>
	  
    <div class="row">
      
	<?
	
		if($blogRow){
				foreach($blog as $rs){ 
				#$src = base_url('myAdmin/upload/_blog/'.$rs['_blog_Image']);	
					$src 	  = base_url('myAdmin/upload/_blog/gallery/'.$rs['_gallery_Image']);
					$key 		= $rs['_blog_ID'];	
					$share_url = base_url().$language."/".$page."/view"."/".$key;

					$_title = ($rs['_blog_Title'])?$rs['_blog_Title']:$rs['_blog_TitleEn'];
					$_description = ($rs['_blog_Description'])?$rs['_blog_Description']:$rs['_blog_DescriptionEn'];
		?>
      <div class="col-lg-4">
        <div class="product_box">
           <div class="event_flex">
				 <div class="event_flex_block">
					 <a href="<?=base_url().$language."/".$page."/view"."/".$key?>" >
					 <img class="img" src="<?=$src?>" >
					 </a>
					 <div class="product_border">
						<div>
						<?
			if($rs['_blog_DateB']){
				echo changeformatDate($rs['_blog_DateB'],$language);
			}
					
					if(!empty($rs['_blog_DateE'])&&($rs['_blog_DateE']!="0000-00-00")){
				echo "- ".changeformatDate($rs['_blog_DateE'],$language);
			}
					
							?>
						</div>
						<div>
						 	<h2 class="style1"><?=$_title?></h2>
						 </div>	
						 <div>
						 	<?=$_description?>
						 </div>
						 
						<div class="shop_flex top20">
							
							<div class="list_box"><a href="<?=base_url().$language."/".$page."/view"."/".$key?>" ><div class="bnt_more2">อ่านต่อ</div></a></div>
							
						  <!-- bnt share -->
						  <div id="box_share_<?=$key?>" class="box_share">
							<div class="bnt_share">แชร์</div>
							<div id="option_share_<?=$key?>" class="event_share">
								<div class="bnt_arrow"></div>
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
						<script>
              $('#box_share_<?=$key?>').hover(function () {
                $('#option_share_<?=$key?>').slideDown();
              }, function () {
                $('#option_share_<?=$key?>').slideUp();
              });
            </script>
					  </div>
					</div>
          			</div>
				 </div>
          </div>
		<? }} ?>
		
			
		
		
        </div>
      </div>

    </div>
  </div>
</div>
<!-- product -->
<script>
  $('select').selectric();
</script>