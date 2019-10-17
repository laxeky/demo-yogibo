<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>YOGIBO</title>
</head>
<body>

<?php
	$rs	= $this->Object_model->getOrderInfo($id);
?>
<body style="font-family: Arial, sans-serif;margin: 0px;padding: 0px;color: #333;background-color: #CCC;font-size: 14px;line-height: 16px;">

<div class="tp" style="width: 100%;">
	<div class="tp_width" style="margin: 0 auto;width: 700px;background-color: #FFF;padding: 40px;margin-top: 20px;margin-bottom: 40px;">

        <div class="logo" style="background-color: #FFF;padding: 5px 15px 5px 10px;text-align: left;"><img src="<?=base_url('img/template/logo.png')?>" height="80"></div>
        <div class="request_box">
    		    <h1  style="margin: 20px 0px 0px 0px;font-size: 18px;line-height: 28px;padding-bottom: 0px;">Thank you for your order</h1>
            <div style="margin: 10px 0px 20px 0px;font-size: 14px;line-height: 12px;padding-bottom: 20px;">
              Your order has been received and is now being processed. Your order details are shown below for your reference:
            </div>
            <div class="title">
                <h3>เลขที่การสั่งซื้อ #<?=$this->Object_model->orderNo($rs['_carts_ID'])?> (<?=$this->Object_model->getDateNumber($rs['_carts_CreateDate'])?>)</h3>
                <?php
                  $ss_id    = $rs['_carts_SessionID'];
                  $carts    = $this->Object_model->getCartsList($ss_id);
                  $cartsRow = count($carts);

                  if($cartsRow > 0){
                ?>
                <table width="100%" border="1" cellspacing="0" cellpadding="0">
                  <?php
                  $total_sum = 0;
                  $i = 1;
                  foreach ($carts as $val){
                    $id = $val['_carts_item_ID'];
                    $product_id = $val['_carts_item_ProductID'];

                    $price_normal       = $val['_product_Price'];
                    $price_promotion    = $val['_product_PricePromotion'];

                    if($val['_product_PricePromotion']){
                      $_promotion_alert = true;
                      $price = $val['_product_PricePromotion'];
                    }else{
                      $_promotion_alert = false;
                      $price = $val['_product_Price'];
                    }

                    $_price = $price * $val['_carts_item_Unit'];
                    $total_sum += $_price;
                    $sum_price = number_format($_price, 0 ,'.',',');
                  ?>
                  <tr style="padding:20px 10px 20px 10px;">
                    <td width="60%" align="left" valign="top" style="font-weight: 800; padding:20px 10px 20px 10px;">
                      <?=$i?>. <?=$val['_product_Title']?>
                      <div style="width: 40px; height: 40px; border: 1px #f5f5f5 solid; cursor: pointer; margin:10px 0 0px 10px; padding:0; background-color:#<?=$val['_carts_item_Color']?>;"></div> 
                    </td>
                    <td width="15%" align="center" valign="top" style="font-weight: 800; padding:20px 10px 20px 10px;"><?=$val['_carts_item_Unit']?> ชิ้น</td>
                    <td width="25%" align="right" valign="top" style="font-weight: 800; padding:20px 10px 20px 10px;">
                      <?php 
                      if(!empty($price_promotion)){
                      ?>
                          <div style="text-decoration: line-through; color: #999999; font-weight: normal;"><?=number_format($price_normal * $val['_carts_item_Unit'], 0 ,'.',',')?> บาท</div>
                      <?php
                      }
                      ?>
                      
                      <?=$sum_price?> บาท
                    </td>              
                  </tr>
                  <?php
                    $i++;
                  }

                  $_delivery_id = $rs['_carts_Deliverly'];
            			$delivery = $this->Object_model->getDelivery($_delivery_id);
            			$delivery = $delivery[0];
                  // print_r($delivery);

                  $_delivery_price = $delivery['_product_delivery_Price'];
                  $_total_all = $total_sum + $_delivery_price;
                  ?>
                  <tr>
                    <td align="left" valign="top" colspan="2" style="font-weight: 800; padding:10px 10px 10px 10px;"><?=$delivery['_product_delivery_Title']?></td>
                    <td align="right" valign="top" style="font-weight: 800; padding:10px 10px 10px 10px;">
                      <?=$delivery['_product_delivery_Price']?> บาท
                    </td>
                    <!-- <td width="20%" align="left" valign="top" style="font-weight: 800;"></td> -->
                  </tr>
                  <tr style="border-top:1px #333 solid; padding:10px 0 10px 0;">
                    <td align="left" valign="top" colspan="2" style="font-weight: 800; padding:10px 10px 10px 10px;">ยอดสุทธิ</td>
                    <!-- <td align="left" valign="top" style="font-weight: 800; padding:10px 10px 10px 10px;"></td> -->
                    <td align="right" valign="top" style="font-weight: 800; padding:10px 10px 10px 10px;"><?=number_format($_total_all, 0 ,'.',',')?> บาท</td>
                    <!-- <td width="20%" align="left" valign="top" style="font-weight: 800;"></td> -->
                  </tr>

                </table>


                <h3>การจัดส่งสินค้า</h3>
                <table width="100%" border="0" cellspacing="4" cellpadding="4"  style="margin-left: 20px;">
                  <tr>
                    <td width="25%" align="left" valign="top">ชื่อ - สกุล</td>
                    <td width="75%" align="left" valign="top" class="border_label" style="font-weight: 800;"><?=$rs["_carts_FirstName"]?> <?=$rs["_carts_LastName"]?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">โทรศัพท์</td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;"><?=$rs["_carts_Phone"]?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">อีเมล</td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;"><?=$rs["_carts_Email"]?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">ที่อยู่</td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;">
                      <?php
                        // $txt_Village = $rs['_carts_Village'];
                        $txt_No = $rs['_carts_No'];
                        $txt_Moo = $rs['_carts_Moo'];
                        $txt_Soi = $rs['_carts_Soi'];
                        $txt_Road = $rs['_carts_Road'];
                      ?>
                      <?=($txt_No)?"บ้านเลขที่ ".$txt_No:"";?>
                      <?=($txt_Moo)?"หมู่ที่ ".$txt_Moo:"";?>
                      <?=($txt_Soi)?"ซอย ".$txt_Soi:"";?>
                      <?=($txt_Road)?"ถนน ".$txt_Road:"";?>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">แขวง/ตำบล</td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;">
                      <?php
                       $tum_id = $rs["_carts_Tumbon"];
                       $_tum = $this->Object_model->getInfoTumbon($tum_id);
                       echo $_tum["DISTRICT_NAME"];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">เขต/อำเภอ</td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;">
                      <?php
                       $amp_id = $rs["_carts_Ampure"];
                       $_amp = $this->Object_model->getInfoAmpure($amp_id);
                       echo $_amp["AMPHUR_NAME"];
                      ?>
                    </td>
                  </tr>

                  <tr>
                    <td align="left" valign="top">จังหวัด</td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;">
                      <?php
                       $pro_id = $rs["_carts_Province"];
                       $_province = $this->Object_model->getInfoProvince($pro_id);
                       echo $_province["PROVINCE_NAME"]." ".$rs['_carts_Postcode'];
                      ?>
                    </td>
                  </tr>
                </table>


                <h3>ที่อยู่สำหรับออกใบกำกับภาษี</h3>
                <table width="100%" border="0" cellspacing="4" cellpadding="4"  style="margin-left: 20px;">
                  <tr>
                    <td width="25%" align="left" valign="top">ชื่อ - สกุล</td>
                    <td width="75%" align="left" valign="top" class="border_label" style="font-weight: 800;"><?=$rs["_carts_BillFirstName"]?> <?=$rs["_carts_BillLastName"]?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">โทรศัพท์</td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;"><?=$rs["_carts_BillPhone"]?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">อีเมล</td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;"><?=$rs["_carts_BillEmail"]?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">ที่อยู่</td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;">
                      <?php
                        // $txt_Village = $rs['_carts_Village'];
                        $txt_No = $rs['_carts_BillNo'];
                        $txt_Moo = $rs['_carts_BillMoo'];
                        $txt_Soi = $rs['_carts_BillSoi'];
                        $txt_Road = $rs['_carts_BillRoad'];
                      ?>
                      <?=($txt_No)?"บ้านเลขที่ ".$txt_No:"";?>
                      <?=($txt_Moo)?"หมู่ที่ ".$txt_Moo:"";?>
                      <?=($txt_Soi)?"ซอย ".$txt_Soi:"";?>
                      <?=($txt_Road)?"ถนน ".$txt_Road:"";?>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">แขวง/ตำบล</td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;">
                      <?php
                       $tum_id = $rs["_carts_BillTumbon"];
                       $_tum = $this->Object_model->getInfoTumbon($tum_id);
                       echo $_tum["DISTRICT_NAME"];
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">เขต/อำเภอ</td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;">
                      <?php
                       $amp_id = $rs["_carts_BillAmpure"];
                       $_amp = $this->Object_model->getInfoAmpure($amp_id);
                       echo $_amp["AMPHUR_NAME"];
                      ?>
                    </td>
                  </tr>

                  <tr>
                    <td align="left" valign="top">จังหวัด</td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;">
                      <?php
                       $pro_id = $rs["_carts_BillProvince"];
                       $_province = $this->Object_model->getInfoProvince($pro_id);
                       echo $_province["PROVINCE_NAME"]." ".$rs['_carts_BillPostcode'];
                      ?>
                    </td>
                  </tr>
                </table>


                <?php
                  }
                  
                  $_bank = $rs['_carts_BankID'];
                  $bankInfo = $this->Object_model->getBank();
                  $bank = $bankInfo;
                  $bankRow = count($bankInfo);
                  
                ?>
                <h3>วิธีการชำระเงิน : <?=$this->Object_model->paymentType($rs['_carts_PaymentType'])?></h3>

                <?php 
                if($bankRow > 0){
                  foreach($bank as $val){
                ?>
                <table width="100%" border="0" cellspacing="4" cellpadding="4"  style="margin: 20px 0 20px 0px; padding:10px 20px 30px 20px; border-bottom:1px #ccc solid;">
                  <tr>
                    <td width="20%" align="left" valign="top" style="font-weight: 800;">ธนาคาร</td>
                    <td width="80%" align="left" valign="top" style="font-weight: 800;"><?=$val['_product_bank_Title']?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" style="font-weight: 800;">ชื่อบัญชี</td>
                    <td align="left" valign="top" style="font-weight: 800;"><?=$val['_product_bank_Name']?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" style="font-weight: 800;">เลขที่บัญชี</td>
                    <td align="left" valign="top" style="font-weight: 800;"><?=$val['_product_bank_No']?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top" style="font-weight: 800;">ประเภท</td>
                    <td align="left" valign="top" style="font-weight: 800;"><?=$val['_product_bank_Type']?></td>
                  </tr>
                  <!-- <tr>
                    <td align="left" valign="top" style="font-weight: 800;">สาขา</td>
                    <td align="left" valign="top" style="font-weight: 800;"><?=$bank['_product_bank_Branch']?></td>
                  </tr> -->
                </table>
                <?php 
                  }
                }
                ?>


            </div>



            <div class="sign" style="margin: 50px 0px 0px 0px;padding: 0px 0px 20px 0px;font-weight: 800;border-bottom: 5px #F1F1F1 solid;">YOGIBO Shop Teams</div>
        </div>

    </div>
</div>

</body>
</html>
