<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- information -->
<div class="info">
    <!-- content -->
    <div class="member_info_flex">
        <div class="block">
            <div class="header">My Account</div>
        </div>
        <div class="block">
            <div class="content_edit">
                <a href="javascript:void(0);" onclick="js_member_infoEdit();" class="bnt_edit">Edit</a>
            </div>
        </div>
    </div>
    <!-- content -->
    <!-- content -->
    <div class="member_info_flex">
        <div class="block_all">
            <div class="name"><?=$user['_register_FirstName']." ".$user['_register_LastName']?></div>
        </div>
    </div>
    <!-- content -->
    <!-- content -->
    <div class="member_info_flex">
        <div class="block2">
            <span>Gender :</span> <?=$this->Object_model->genderType($user['_register_Gender'])?>
        </div>
        <div class="block2">
            <span>Birthday :</span> <?=$this->Object_model->getDateNumber($user['_register_Birthday'])?>
        </div>
        <div class="block2">
            <span>Phone :</span> <a href="tel:<?=$user['_register_Phone']?>"><?=$user['_register_Phone']?></a>
        </div>
    </div>
    <!-- content -->
    <!-- content -->
    <div class="member_info_flex">
        <div class="block2">
            <span>Email :</span> <?=$user['_register_Email']?>
        </div>
        <div class="block2">
            <!-- <span>เฟสบุ๊ค :</span> NADECH KUGIMIYA -->
        </div>
        <div class="block2">
            <!-- <span>ไอดีไลน์ :</span> - -->
        </div>
    </div>
    <!-- content -->
    <!-- content -->
    <div class="member_info_flex">
        <div class="block_extra">
        <?php
            $txt_No     = $user['_register_No'];
            $txt_Moo    = $user['_register_Moo'];
            $txt_Soi    = $user['_register_Soi'];
            $txt_Road   = $user['_register_Road'];

            $tum_id = $user["_register_Tumbon"];
            $_tum   = $this->Object_model->getInfoTumbon($tum_id);
            
            $amp_id = $user["_register_Ampure"];
            $_amp   = $this->Object_model->getInfoAmpure($amp_id);
            
            $pro_id = $user["_register_Province"];
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
                echo " Province ".$_province["PROVINCE_NAME"]." ".$user['_register_Postcode'];
            ?>
        </div>
    </div>
    <!-- content -->
    <!-- content -->
    <div class="member_info_flex bnt_edit_password">
        <div class="block_extra">
            <a href="javascript:void(0);" onclick="js_member_changPassword();" class="bnt_edit">Edit Password</a>
        </div>
    </div>
    <!-- content -->

</div>
<!-- information -->