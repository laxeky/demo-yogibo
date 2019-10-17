<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>YOGIBO confirm payment</title>
</head>
<body>
<?php
  $today   = date('Y-m-d');
  $rs	     = $this->Object_model->getPayemntInfo($id);
?>
<body style="font-family: Arial, sans-serif;margin: 0px;padding: 0px;color: #333;background-color: #CCC;font-size: 14px;line-height: 16px;">

<div class="tp" style="width: 100%;">
	<div class="tp_width" style="margin: 0 auto;width: 700px;background-color: #FFF;padding: 40px;margin-top: 20px;margin-bottom: 40px;">

        <div class="logo" style="background-color: #f5f5f5;padding: 10px 15px 10px 10px;text-align: left;"><img src="<?=base_url('img/template/logo.png')?>" height="80"></div>
        <div class="request_box">
    		<h1  style="margin: 20px 0px 0px 0px;font-size: 18px;line-height: 28px;padding-bottom: 20px;">แจ้งการชำระเงิน </h1>

            <div class="title">
           	  <table width="100%" border="0" cellspacing="4" cellpadding="4"  style="margin-left: 20px;">
                  <tr>
                    <td width="35%" align="left" valign="top">ชื่อ - สกุล</td>
                    <td width="65%" align="left" valign="top" class="border_label" style="font-weight: 800;">
                      <?=$rs['_confirmpayment_FirstName']." ".$rs['_confirmpayment_LastName']?>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">เบอร์โทรศัพท์</td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;">
                      <?=$rs['_confirmpayment_Phone']?>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">อีเมล</td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;">
                      <?=$rs['_confirmpayment_Email']?>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">ธนาคาร</td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;">
                      <?php 
                        $bank = $this->Object_model->getBank($rs['_confirmpayment_Bank']);
                        echo $bank[0]['_product_bank_Title']." (".$bank[0]['_product_bank_No'].")";
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">วันที่โอนเงิน</td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;">
                      <?php
                      $_date = explode('-',$rs['_confirmpayment_Date']);
                      $_d = $_date[2];
                      $_m = $_date[1]*1;
                      $_y = ($_date[0]-543);
                      $date = $_y.'-'.$_m.'-'.$_d;
                      // echo $_date[2]." ".$this->Object_model->getMonthThai($_date[1])." ".$_date[0];
                      echo $this->Object_model->getDateThai($date)." เวลา ".$rs['_confirmpayment_Time']." น.";
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">จำนวนเงิน (บาท)</td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;">
                      <?=number_format($rs['_confirmpayment_Money'],2,'.',',')?>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top"><b>ข้อมูลการสั่งซื้อ</b></td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;">
                      <?=$rs['_confirmpayment_Subject']?>
                    </td>
                  </tr>
                  
                  <?php 
                  if($rs['_confirmpayment_Slip']){
                  ?>
                  <tr>
                    <td align="left" valign="top"><b>หลักฐานการโอนเงิน</b></td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;"></td>
                  </tr>
                  <tr>
                    <td colspan="2">
                      <?php
                      $img = base_url('upload/'.$rs['_confirmpayment_Slip']);
                      ?>
                      <img style="width:90%; height:auto;" src="<?=$img?>" />
                    </td>
                  </tr>
                  <?php 
                  }
                  ?>

                </table>

            </div>
            <div class="sign" style="margin: 50px 0px 0px 0px;padding: 0px 0px 20px 0px;font-weight: 800;border-bottom: 5px #F1F1F1 solid;">YOGIBO Shop Teams</div>
        </div>

    </div>
</div>

</body>
</html>
