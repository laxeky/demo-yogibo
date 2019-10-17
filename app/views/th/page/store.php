<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- research -->
<div class="why_bg contact_bg ">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>ร้านของเรา</h1>
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
				$_title = ($rs['_store_Title'])?$rs['_store_Title']:$rs['_store_TitleEn'];
				$_subject = ($rs['_store_Subject'])?$rs['_store_Subject']:$rs['_store_SubjectEn'];
			?>
			<div class="col-lg-6 text-left">
				<div class="store_flex">
					<div class="store_block">
						<div><img class="" src="<?=$src?>" width="100%" ></div>
						<div class="area">
							<div class="store_h2"><?=$_title?></div>
							<div>
								<?=$_subject?>
							</div>
							<div class="phone">Call  <?=$rs['_store_Phone']?></div>
							<div><?=$rs['_store_OpenEn']?></div>
							<? 
							if($rs['_store_Direction']){
							?>
							<a href="<?=$rs['_store_Direction']?>" target="_blank">
							<div class="bt_store">แผนที่</div>
							</a>
							<? } ?>
						</div>
					</div>
				</div>
			</div>
			<? } ?>
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
				$_title = ($rs['_store_Title'])?$rs['_store_Title']:$rs['_store_TitleEn'];
				$_subject = ($rs['_store_Subject'])?$rs['_store_Subject']:$rs['_store_SubjectEn'];
			?>
			<div class="col-lg-12 text-left">
				<div class="store_flex">
					<div class="store_block" style="width: 100%;">
						<div class="storeL">
							<img class="" src="<?=$src?>" width="100%" >
						</div>
						<div class="storeR">
							<div class="area">
								<div class="store_h2"><?=$_title?></div>
							<div>
								<?=$_subject?>
							</div>
							<div class="phone">Call  <?=$rs['_store_Phone']?></div>
							<div><?=$rs['_store_OpenEn']?></div>
							<? 
							if($rs['_store_Direction']){
							?>
							<a href="<?=$rs['_store_Direction']?>" target="_blank">
							<div class="bt_store">แผนที่</div>
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
