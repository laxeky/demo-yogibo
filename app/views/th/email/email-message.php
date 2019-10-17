<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Yogibo</title>
</head>
<body>
<?php
  // $id = 18;
	$rs	= $this->Object_model->getMessage($id);
?>
<body style="font-family: Arial, sans-serif;margin: 0px;padding: 0px;color: #333;background-color: #CCC;font-size: 14px;line-height: 16px;">

<div class="tp" style="width: 100%;">
	<div class="tp_width" style="margin: 0 auto;width: 700px;background-color: #FFF;padding: 40px;margin-top: 20px;margin-bottom: 40px;">

        <div class="logo" style="background-color: #FFF;padding: 10px 15px 10px 10px;text-align: left;"><img src="<?=base_url('img/template/logo.png')?>" height="60"></div>
        <div class="request_box">
    		<h1  style="margin: 20px 0px 0px 0px;font-size: 18px;line-height: 28px;padding-bottom: 20px;">ข้อความ</h1>

            <div class="title">
                <table width="100%" border="0" cellspacing="4" cellpadding="4"  style="margin-left: 20px;">
                    <tr>
                        <td width="30%" align="left" valign="top">อีเมล</td>
                        <td width="70%" align="left" valign="top" class="border_label" style="font-weight: 800;"><?=$rs["_message_Email"]?></td>
                    </tr>
                    <tr>
                        <td align="left" valign="top">ข้อความ</td>
                        <td align="left" valign="top" class="border_label" style="font-weight: 800;"><?=$rs["_message_Message"]?></td>
                    </tr>
                </table>
            </div>
            <div class="sign" style="margin: 50px 0px 0px 0px;padding: 0px 0px 20px 0px;font-weight: 800;border-bottom: 5px #F1F1F1 solid;">Yogibo Shop Teams</div>
        </div>

    </div>
</div>

</body>
</html>
