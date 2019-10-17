<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- research -->
<div  class="article_bg">
	<div class="container">
		<div class="row">
			<div class="col-md-12 text-center">
				<div>
					<h1 class="title_bg">FAQ</h1>
				</div>
				<h2>Frequently-asked questions</h2>
			</div>
		</div>

		<div class="row">	
			<div class="col-md-4 text-left">
				<div class="faq_title">
					About the product
				</div>
			</div>	

			<div class="col-md-8 text-left">
				<div class="faq_answer">

				<?php 	
				if($faqRow > 0){
					// $_no = 1;
					foreach($faq as $key => $val){
						$_title       = !empty($val['_faq_TitleEn'])?$val['_faq_TitleEn']:$val['_faq_Title'];
						$_description = !empty($val['_faq_SubjectEn'])?$val['_faq_SubjectEn']:$val['_faq_Subject'];
				?>
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_<?=$key?>');">
						<div class="faq_subtitle" id="faq1_<?=$key?>"><?=$_title?></div>
						</a>
						<div class="faq_answer_area" id="ans1_<?=$key?>"><?=$_description?></div>
					</div>
				<?php 
					// $_no++;
					}
				}
				?>
					
					<!-- <div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_2');">
							<div class="faq_subtitle" id="faq1_2">P80 มีประโยชน์อย่างไร </div>
						</a>
						<div class="faq_answer_area" id="ans1_2">
							ช่วยให้คุณภาพการนอนหลับดีขึ้น นอนหลับได้ลึกขึ้น ช่วยฟื้นฟูร่างกายจากภายในสู่ภายนอก ส่งผลให้
							<br>
							1.	ช่วยลดอาการปวดหลังและข้อและ office syndrome<br>
							2.	ช่วยให้ควบคุมความดันให้ปกติ<br>
							3.	ช่วยให้ความจำดี<br>
							4.	ช่วยให้สดชื่น ดูอ่อนกว่าวัย
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_3');">
						<div class="faq_subtitle" id="faq1_3">เบาหวานรับประทานได้ไหม</div>
						</a>
						<div class="faq_answer_area" id="ans1_3">
							รับประทานได้ตาม dose ที่กำหนด เพราะเป็นผลิตภัณฑ์ที่มีค่าดัชนีน้ำตาลต่ำ  ถึงแม้จะมีความหวาน แต่ก็เป็นความหวานจากธรรมชาติที่เป็นความหวานที่ดี ผู้ป่วยที่เป็นโรคเบาหวานจึงรับประทานได้ และจาก Clinical Trial พบว่า การรับประทาน P80 เป็นประจำ ไม่ทำให้ค่าน้ำตาลในเลือดเพิ่มขึ้น
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_4');">
						<div class="faq_subtitle" id="faq1_4">ฉีดอินซูลีนอยู่ ทานได้หรือไม่</div>
						</a>
						<div class="faq_answer_area" id="ans1_4">
							P80 ไม่ทำให้ค่าน้ำตาลในเลือดเพิ่มขึ้น แต่แนะนำให้ปรึกษาแพทย์ก่อนรับประทาน
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_5');">
						<div class="faq_subtitle" id="faq1_5">คนที่เป็นความดันจะหายจริงหรือไม่</div>
						</a>
						<div class="faq_answer_area" id="ans1_5">
							จากการทำ Clinical Trial ของคณะแพทย์ มหาวิทยาลัยเชียงใหม่ พบว่าการดื่ม P80 เป็นประจำทุกวันช่วยคุมความดันโลหิต
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_6');">
						<div class="faq_subtitle" id="faq1_6">P80 ช่วยเรื่องการนอนอย่างไร</div>
						</a>
						<div class="faq_answer_area" id="ans1_6">
						จากการทำ Clinical Trial ของคณะแพทย์ มหาวิทยาลัยเชียงใหม่ พบว่าการดื่ม P80 เป็นประจำทุกวันจะช่วยให้คุณภาพการนอนดีขึ้น โดยนอนหลับได้ลึก
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_7');">
						<div class="faq_subtitle" id="faq1_7">ทานไปแล้วกี่วันจึงจะเห็นผลเรื่องการนอนหลับ</div>
						</a>
						<div class="faq_answer_area" id="ans1_7">
						จากผลการทดสอบพบว่าผู้ที่มีปัญหาเรื่องการนอนหลับ เมื่อทานไปแล้ว 3 วัน จะดีขึ้น 50% และ 7 วัน จะดีขึ้น 80% นอกจากนี้เมื่อรับประทานไป 1 เดือน จะเห็นผลเรื่องการปวดเมื่อยข้อได้อย่างชัดเจน
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_8');">
						<div class="faq_subtitle" id="faq1_8">กินแล้วอ้วนไหม</div>
						</a>
						<div class="faq_answer_area" id="ans1_8">
						P80 เป็นผลิตภัณฑ์ที่มีความหวานจากผลไม้แท้ๆ ปราศจากไขมัน (0% Fat) รับประทานแล้วจึงไม่อ้วน อีกทั้งจากงานวิจัยพบว่า P80 ไม่เพิ่มระดับไขมันในเลือด 
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_9');">
						<div class="faq_subtitle" id="faq1_9">P80 เติมน้ำตาลไหม</div>
						</a>
						<div class="faq_answer_area" id="ans1_9">
						P80 ผลิตจากธรรมชาติ 100%  มีน้ำตาล ที่มาจากผลไม้ 11 g  ซึ่งน้อยกว่าน้ำอัดลมที่มีน้ำตาล 27 – 30 g 
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_10');">
						<div class="faq_subtitle" id="faq1_10">P80 มีกี่ Calories</div>
						</a>
						<div class="faq_answer_area" id="ans1_10">
						50 Calories ต่อการบริโภค 1 ครั้ง หรือ 15 ml 1 ช้อนโต๊ะ ซึ่งน้อยกว่าข้าว 1 ทัพพี ที่มี 80 Calories 
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_11');">
						<div class="faq_subtitle" id="faq1_11">รับประทานอย่างไร</div>
						</a>
						<div class="faq_answer_area" id="ans1_11">
						รับประทานวันละ 1 ช้อนโต๊ะ หรือ 15 ml สามารถรับประทานโดยตรงหรือผสมเครื่องดื่มตามใจชอบ
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_12');">
						<div class="faq_subtitle" id="faq1_12">P80 แตกต่างจากลำไยสดอย่างไร</div>
						</a>
						<div class="faq_answer_area" id="ans1_12">
						P80 เป็นเครื่องดื่มลำไยสกัดเข้มข้นข้นที่ผ่านกระบวนการผลิตที่เป็นเอกสิทธิ์เฉพาะ นำมาซึ่งไบโอเอกทีฟ คอมพาวส์ ( Bio active Compounds ) ที่ทำให้สุขภาพดีขึ้นและดูอ่อนเยาว์ ในขณะที่การรับประทานลำไยสดจะไม่ได้รับ ไบโอเอกทีฟ คอมพาวส์ ครบถ้วนตามนี้
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_13');">
						<div class="faq_subtitle" id="faq1_13">คนที่กินลำไยแล้วร้อนใน สามารถทานตัวนี้ได้ไหม</div>
						</a>
						<div class="faq_answer_area" id="ans1_13">
							P80 ประกอบด้วยลำไยสกัดเข้มข้น 100% แต่ผ่านกระบวนการผลิตพิเศษ ผู้ที่ทานลำไยสดแล้วร้อนในจึงทานได้
							<br>
							* กรณีหากทานแล้วเกิดร้อนใน แนะนำให้ทานแบบผสมน้ำ และจิบน้ำตามในระหว่างวัน
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_14');">
						<div class="faq_subtitle" id="faq1_14">คนที่แพ้ลำไยทานได้ไหม</div>
						</a>
						<div class="faq_answer_area" id="ans1_14">
							P80 ประกอบด้วยลำไยสกัดเข้มข้น 100% ในกรณีที่แพ้ลำไย จึงไม่แนะนำให้ทาน
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_15');">
						<div class="faq_subtitle" id="faq1_15">คนที่รับประทานอาหารเสริมตัวอื่น สามารถรับประทาน P80 ควบคู่ได้ไหม</div>
						</a>
						<div class="faq_answer_area" id="ans1_15">
							ได้ เพราะ P80 ผลิตจากธรรมชาติ 100% จึงสามารถรับประทานร่วมกับอาหารเสริมประเภทอื่นได้
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_16');">
						<div class="faq_subtitle" id="faq1_16">ได้รับ อย แล้วหรือไม่ </div>
						</a>
						<div class="faq_answer_area" id="ans1_16">
							P80 เป็นผลิตภัณฑ์ที่ได้รับเลข อย.เรียบร้อยแล้ว (ถ้าถามว่าเลขอะไรให้ตอบว่า อย. 50-2-01556-2-0005)
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_17');">
						<div class="faq_subtitle" id="faq1_17">มีการวิเคราะห์ หรือรับรองจากที่ไหนบ้าง</div>
						</a>
						<div class="faq_answer_area" id="ans1_17">
							P80 ได้รับการวิเคราะห์คุณประโยชน์จากมหาวิทยาลัยและห้องปฎิบัติการชั้นนำ อาทิ มหาวิทยาลัยเชียงใหม่ มหาวิทยาลัยมหิดล เป็นต้น
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_18');">
						<div class="faq_subtitle" id="faq1_18">ราคาเท่าใด</div>
						</a>
						<div class="faq_answer_area" id="ans1_18">
							P80 ขนาด 260 ml ราคา 1,200 บาท 
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_19');">
						<div class="faq_subtitle" id="faq1_19">ทำไมราคาจึงสูง</div>
						</a>
						<div class="faq_answer_area" id="ans1_19">
							P80 เป็นผลิตภัณฑ์ที่ใช้ลำไย 40-50 kg ต่อขวด มาจากกรรมวิธีการผลิตที่เป็นเอกสิทธิ์เฉพาะ นำมาซึ่งคุณค่าทางโภชนาการสูงสุด มีสรรพคุณที่มีประโยชน์ต่อร่างกายหลากหลาย ช่วยให้มีสุขภาพที่ดีขึ้นและดูอ่อนเยาว์
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_20');">
						<div class="faq_subtitle" id="faq1_20">จัดส่งภายในกี่วัน ส่งอย่างไร</div>
						</a>
						<div class="faq_answer_area" id="ans1_20">
							จัดส่งทางไปรษณีย์ ต่างจังหวัดรับสินค้าภายใน 3 วัน
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_21');">
						<div class="faq_subtitle" id="faq1_21">วิธีการเก็บ</div>
						</a>
						<div class="faq_answer_area" id="ans1_21">
							หลังเปิดขวด ให้ปิดให้สนิท
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_22');">
						<div class="faq_subtitle" id="faq1_22">ส่วนประกอบมีอะไรบ้าง</div>
						</a>
						<div class="faq_answer_area" id="ans1_22">
							P80 เป็นผลิตภัณฑ์ที่ผลิตจากธรรมชาติ 100% ไม่มีส่วนประกอบของวัตถุเจือปนและวัตถุกันเสีย
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_23');">
						<div class="faq_subtitle" id="faq1_23">กิน P80 แล้ว จะง่วงไหม</div>
						</a>
						<div class="faq_answer_area" id="ans1_23">
							ถ้าทาน P80 ตอนเช้าจะทำให้สดชื่น กระปรี้กระเปร่า ช่วยเพิ่มพลังงาน และหากทานก่อนนอนจะทำให้คุณภาพการนอนดีขึ้นโดยหลับได้ลึกขึ้น
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_24');">
						<div class="faq_subtitle" id="faq1_24">ผู้ที่นอนกรนช่วยได้ไหม</div>
						</a>
						<div class="faq_answer_area" id="ans1_24">
							ยังไม่ได้มีการทำ research ในช่วงนี้ แต่การทำ Clinical Trail และ Research พบว่าผู้ที่รับประทาน P80 จะนอนหลับได้ลึกขึ้นและมีคุณภาพการนอนที่ดี
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_25');">
						<div class="faq_subtitle" id="faq1_25">อายุการเก็บรักษาของ P80</div>
						</a>
						<div class="faq_answer_area" id="ans1_25">
							เก็บรักษาได้  18 เดือน หลังเปิดขวดเก็บได้ 3 เดือน 
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_26');">
						<div class="faq_subtitle" id="faq1_26">คนท้องรับประทานได้ไหม</div>
						</a>
						<div class="faq_answer_area" id="ans1_26">
							รับประทานได้ เพราะเป็นผลิตภัณฑ์ที่ผลิตจากธรรมชาติ 100% อีกทั้งมีคุณประโยชน์ต่อคนท้องอีกด้วย
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_27');">
						<div class="faq_subtitle" id="faq1_27">ใครเป็นคนคิดค้นผลิตภัณฑ์ P80</div>
						</a>
						<div class="faq_answer_area" id="ans1_27">
							เป็นการศึกษาค้นและวิจัยร่วมกันระหว่างมหาวิทยาลัยเชียงใหม่ และ PM group
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_28');">
						<div class="faq_subtitle" id="faq1_28">ซื้อผลิตภัณฑ์ P80 ได้ที่ไหน</div>
						</a>
						<div class="faq_answer_area" id="ans1_28">
							สามารถสั่งซื้อได้ที่ Call Center หรือสั่งผ่านทาง website : www.P80naturalessence.com   หรือ<br>
							ชำระเงินผ่านธนาคารกรุงเทพ	911-0-15678-4<br>
							ธนาคารกรุงศรีอยุธยา 		594-1-22994-4<br>
							ธนาคารธนชาต 			152-6-02232-4<br>
							ธนาคารไทยพาณิชย์		155-2-27430-5<br>
							ธนาคารกรุงไทย			985-7-35516-1
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_29');">
						<div class="faq_subtitle" id="faq1_29">ผลิตภัณฑ์ P80 โดนความร้อนแล้วประโยชน์จะหายหรือไม่ </div>
						</a>
						<div class="faq_answer_area" id="ans1_29">
							P80 ผ่านการผลิตจากกรรมวิธีที่เป็นเอกสิทธิ์เฉพาะ จึงยังคงคุณค่าของสารอาหารและประโยชน์ต่างๆ ไว้อย่างครบถ้วน
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_30');">
						<div class="faq_subtitle" id="faq1_30">ผลิตภัณฑ์ P80 มี Halal หรือไม่ </div>
						</a>
						<div class="faq_answer_area" id="ans1_30">
							ผลิตภัณฑ์ P80 มีส่วนประกอบและการผลิตที่อยู่ภายใต้เงื่อนไขของ Halal และขณะนี้อยู่ในระหว่างการดำเนินการขอเลข Halal
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_31');">
						<div class="faq_subtitle" id="faq1_31">สินค้าผลิตจากที่ใด</div>
						</a>
						<div class="faq_answer_area" id="ans1_31">
							P80 ผลิตจากโรงงานของบริษัท Natural Bev จ. ลำพูน ภายใต้ GMP และ HACCP
						</div>
					</div>
					
					<div class="faq_line">
						<a href="javascript:void(0);" onClick="js_faq('1_32');">
						<div class="faq_subtitle" id="faq1_32">สินค้าจะมีขายกี่ขนาด</div>
						</a>
						<div class="faq_answer_area" id="ans1_32">
							P80 Natural Essence มีขนาด 260 ml ราคา 1,200 บาท และ 100 ml ราคา 500 บาท และแนะนำสินค้าใหม่ P80 Nutri drink ( พร้อมดื่ม ) ขนาด 50 ml ราคา 75 บาท
						</div>
					</div> -->
					
					
					
				</div>
			</div>	
		</div>
		
	</div>
</div>
<!-- research -->
