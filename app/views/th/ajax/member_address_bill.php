<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- information -->
<div class="info">
    <!-- content -->
    <div class="member_info_flex">
        <div class="block">
            <div class="header">Billing Info</div>
        </div>
        <div class="block">
            <div class="content_edit">
                <a href="javascript:void(0);" onclick="js_member_billEdit();" class="bnt_edit">Edit</a>
            </div>
        </div>
    </div>
    <!-- content -->

    <?php
    if($user['_register_BillFirstName']){
    ?>
    <!-- content -->
    <div class="member_info_flex">
        <div class="block_all">
            <div class="name"><?=$user['_register_BillFirstName']." ".$user['_register_BillLastName']?></div>
        </div>
    </div>
    <!-- content -->
    <!-- content -->
    <div class="member_info_flex">
        <div class="block2">
            <span>Phone :</span> <a href="tel:<?=$user['_register_BillPhone']?>"><?=$user['_register_BillPhone']?></a>
        </div>
    </div>
    <!-- content -->
    <!-- content -->
    <div class="member_info_flex">
        <div class="block_extra">
            <span>Address :</span>
            <?php
                $txt_No     = $user['_register_BillNo'];
                $txt_Moo    = $user['_register_BillMoo'];
                $txt_Soi    = $user['_register_BillSoi'];
                $txt_Road   = $user['_register_BillRoad'];

                $tum_id = $user["_register_BillTumbon"];
                $_tum   = $this->Object_model->getInfoTumbon($tum_id);
                
                $amp_id = $user["_register_BillAmpure"];
                $_amp   = $this->Object_model->getInfoAmpure($amp_id);
                
                $pro_id = $user["_register_BillProvince"];
                $_province  = $this->Object_model->getInfoProvince($pro_id);
                
            ?>
            <span>Address :</span>
            <?=($txt_No)?"House Number ".$txt_No:"";?>
            <?=($txt_Moo)?"Moo ".$txt_Moo:"";?>
            <?=($txt_Soi)?"Soi ".$txt_Soi:"";?>
            <?=($txt_Road)?"Road ".$txt_Road:"";?>
            <?php 
                echo " Sub-area/Sub-district ".$_tum["DISTRICT_NAME"];
                echo " Area/District ".$_amp["AMPHUR_NAME"];
                echo " Province ".$_province["PROVINCE_NAME"]." ".$user['_register_BillPostcode'];
            ?>
        </div>
    </div>
    <!-- content -->
    <?php 
    }
    ?>
    <!-- content -->
    <!-- <div class="member_info_flex bnt_edit_password">
        <div class="block_extra">
            <a href="#" class="bnt_edit">แก้ไขรหัสผ่าน</a>
        </div>
    </div> -->
    <!-- content -->

</div>
<!-- information -->