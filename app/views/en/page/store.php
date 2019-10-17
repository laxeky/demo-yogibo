<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- research -->
<div class="why_bg contact_bg ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Stores</h1>
            </div>
        </div>
		
		<?
		$store = $this->Object_model_update->getStore(2);
		$storeRow = count($store);
		
		
		if($storeRow){
						
		
		?>
		
		<div class="row">
			<div class="col-lg-12 text-left">
                <div class="store_h2">Our Branches</div>
				<div class="store_line"></div>
            </div>
			<? foreach($store as $rs){ 
				$src = base_url('myAdmin/upload/_store/'.$rs['_store_Image']);
			?>
			<div class="col-lg-6 text-left">
				<div class="store_flex">
					<div class="store_block">
						<div><img class="" src="<?=$src?>" width="100%" ></div>
						<div class="area">
							<div class="store_h2"><?=$rs['_store_TitleEn']?></div>
							<div>
								<?=$rs['_store_SubjectEn']?>
							</div>
							<div class="phone">Call  <?=$rs['_store_Phone']?></div>
							<div><?=$rs['_store_OpenEn']?></div>
							<? 
							if($rs['_store_Direction']){
							?>
							<a href="<?=$rs['_store_Direction']?>" target="_blank">
							<div class="bt_store">Get Direction</div>
							</a>
							<? } ?>
						</div>
					</div>
				</div>
			</div>
			<? } ?>
			<!--<div class="col-lg-6 " align="right">
				<div class="store_flex">
					<div class="store_block" align="left">
						<div><img class="" src="<?=base_url('img/store/2.jpg')?>" width="100%" ></div>
						<div class="area">
							<div class="store_h2">Central Chitlom</div>
							<div>
								1031 Central Embassy, L4-13/2, 4th Fl.<br>
								Prathumwan Road, Lumpini, Pathumwan,<br>
								Bangkok 10330
							</div>
							<div class="phone"><a href="tel:022551884">Call  02 111 1111</a></div>
							<div>Mon - Fri 09.00 am - 6.00 pm</div>		
							<div class="bt_store">Get Drirection</div>
						</div>
					</div>
				</div>
			</div>-->
		</div>
		<? } ?>
		<?
		$store = $this->Object_model_update->getStore(1);
		$storeRow = count($store);
		
		
		if($storeRow){
						
		
		?>
		<div class="row" >
            <div class="col-lg-12 text-left top70">
                <div class="store_h2">Head Office</div>
				<div class="store_line"></div>
            </div>
			<? foreach($store as $rs){ 
				$src = base_url('myAdmin/upload/_store/'.$rs['_store_Image']);
			?>
			<div class="col-lg-12 text-left">
				<div class="store_flex">
					<div class="store_block" style="width: 100%;">
						<div class="storeL">
							<img class="" src="<?=$src?>" width="100%" >
						</div>
						<div class="storeR">
							<div class="area">
								<div class="store_h2"><?=$rs['_store_TitleEn']?></div>
							<div>
								<?=$rs['_store_SubjectEn']?>
							</div>
							<div class="phone">Call  <?=$rs['_store_Phone']?></div>
							<div><?=$rs['_store_OpenEn']?></div>
							<? 
							if($rs['_store_Direction']){
							?>
							<a href="<?=$rs['_store_Direction']?>" target="_blank">
							<div class="bt_store">Get Direction</div>
							</a>
							<? } ?>
							</div>
						</div>
						<div class="clear"></div>
					</div>
				</div>
				
			</div>
			<? } ?>
        </div>
		<? } ?>
    </div>
</div>
<!-- research -->
