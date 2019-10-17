<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>ลงทะเบียน คอนโด ยู เกษตร-นวมินทร์</title>
</head>
<body>

<?php
	$rs	= $this->Object_model->getContactusInfo($id);
  // print_r($rs);
?>
<body style="font-family: Arial, sans-serif;margin: 0px;padding: 0px;color: #333;background-color: #CCC;font-size: 14px;line-height: 16px;">

<div class="tp" style="width: 100%;">
	<div class="tp_width" style="margin: 0 auto;width: 700px;background-color: #FFF;padding: 40px;margin-top: 20px;margin-bottom: 40px;">

        <!-- <div class="logo" style="background-color: #F1F1F1;padding: 10px 15px 5px 10px;text-align: right;"><img src="http://localhost/2015/Work_greenhomestead/img/template/img-logo.png" height="40"></div> -->
        <div class="request_box">
    		<h1  style="margin: 0px 0px 0px 0px;font-size: 18px;line-height: 28px;padding-bottom: 20px;">ลงทะเบียน คอนโด ยู เกษตร-นวมินทร์ <br> คุณ <?=$rs["_cukn_contactus_FirstName"]?> <?=$rs["_cukn_contactus_FirstName"]?></h1>

            <div class="title">
           	  <table width="100%" border="0" cellspacing="4" cellpadding="4"  style="margin-left: 20px;">
                  <tr>
                    <td width="25%" align="left" valign="top">ชื่อ - สกุล</td>
                    <td width="75%" align="left" valign="top" class="border_label" style="font-weight: 800;"><?=$rs["_cukn_contactus_FirstName"]?> <?=$rs["_cukn_contactus_LastName"]?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">โทรศัพท์</td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;"><?=$rs["_cukn_contactus_Phone"]?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">อีเมล</td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;"><?=$rs["_cukn_contactus_Email"]?></td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">จังหวัด</td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;">
                      <?php
                       $pro_id = $rs["_cukn_contactus_Province"];
                       echo $this->Object_model->getProvinceName($pro_id);
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">เขต/อำเภอ</td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;">
                      <?php
                       $amp_id = $rs["_cukn_contactus_Ampure"];
                       echo $this->Object_model->getAmpureName($amp_id);
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">แขวง/ดำบล</td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;">
                      <?php
                       $tum_id = $rs["_cukn_contactus_Tumbon"];
                       echo $this->Object_model->getTumbonName($tum_id);
                      ?>
                    </td>
                  </tr>
                  <tr>
                    <td align="left" valign="top">งบประมาณเบื้องต้น</td>
                    <td align="left" valign="top" class="border_label" style="font-weight: 800;">
                      <?php
                        // number_format($rs["_cukn_contactus_Budget"], 2, '.', ',');
                        echo $this->Object_model->getBudget($rs["_cukn_contactus_Budget"]);
                      ?>
                    </td>
                  </tr>
                </table>
            </div>



            <div class="sign" style="margin: 50px 0px 0px 0px;padding: 0px 0px 20px 0px;font-weight: 800;border-bottom: 5px #F1F1F1 solid;">Grand Unity Teams</div>
        </div>

    </div>
</div>

</body>
</html>
