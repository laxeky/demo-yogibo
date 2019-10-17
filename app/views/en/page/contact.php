<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- research -->
<div class="why_bg contact_bg">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 text-center">
                <h1>Contact Us</h1>
            </div>
        </div>
		<div class="row">
			<div class="col-lg-7">

				<div class="contact_block">
					<h2>wearVitamin Co., Ltd. (Head Office)</h2>
					<div class="content_address">
						161 Nantawan Building, 17<sup>th</sup> Floor,<br>
						Rajdamri Rd., Lumpinee, Pathumwan, Bangkok 10330

						<br><br>
						Tax ID : 0105558157959 
					</div>
				</div>

				<div class="contact_block">
					<div class="txt_callcenter">Call Center</div>
					<div class="phone"><a href="tel:022551884">02 255 1884</a></div>
					<div class="txt_open">Mon - Fri 09.00 am - 6.00 pm</div>
				</div>

				<div class="contact_block">
					<div class="contact_flex">
						<a href="https://www.facebook.com/Yogibo.Thailand/" target="_blank">
							<div class="block_facebook">facebook</div>
						</a>
						<a href="https://www.instagram.com/yogibothailand/" target="_blank">
							<div class="block_instargram">instargram</div>
						</a>
						<div class="block_yogibo">YogiboThailand</div>
					</div>
				</div>

			</div>
			<div class="col-lg-5">
				<div class="contact_box">
					<form id="contactForm" name="contactForm" method="post">
						<input type="hidden" name="txt_UserID" id="txt_UserID" value='<?=$user_id?>' >
						<div class="contact_title">Please do not hesitate to contact us.</div>
						<div class="contact_label">
							<input type="text" class="input_contact" id="txt_contactEmail" name="txt_contactEmail" placeholder="Email" maxlength="100" value="<?=$email?>" onChange="emailCheck(this);">
						</div>
						<div class="contact_label">
							<textarea class="input_area_contact" id="txt_contactMessage" name="txt_contactMessage" placeholder="Enter your message" ></textarea>
						</div>
						<div class="contact_label text-center">
							<a href="javascript:void(0);" onclick="js_contact();">
								<input type="button" class="bnt_contact" name="bnt_register" value="Send">
							</a>
						</div>
					</form>
				</div>
            </div>
		</div>

		<!-- <div class="row">
			<div class="col-lg-12">
				<div class="contact_map">
					<?php
						$map_url = base_url();
						$full_map = $map_url."map_test_view.php?lat=$lat&long=$long&zoom=$zoom";
					?>
					<iframe class="google_iframe"  src="<?=$full_map?>" frameborder="0" scrolling="no"></iframe>
				</div>
			</div>
		</div> -->

    </div>
</div>
<!-- research -->
