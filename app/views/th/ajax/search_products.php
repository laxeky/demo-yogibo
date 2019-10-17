<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<form id="formSearch" name="formSearch" method="post">
    <div class="box_message">
        <!-- <input type="hidden" name="txt_MessageUserID" id="txt_MessageUserID" value="<?=$user_id?>" > -->
        <h3>ค้นหาสินค้า</h3>
        <div class="block">
            <div class="title">คำค้นหา</div>
            <input type="text" class="input_login" id="txt_Keyword" name="txt_Keyword" value="" maxlength="100" required>
        </div>
        <div class="block">
            <div class="bnt_confirm" id="btnSubmit" onclick="js_search_data();">ตกลง</div>
            <div class="bnt_confirm_cancel" id="btnCancel" onclick="$('#id_search').fadeOut(300);" >ปิด</div>
        </div>
    </div>
</form>

<script>
    $('#txt_Keyword').keypress(function(e){
        if(e.which == 13){
            js_search_data();
        }
    });
</script>