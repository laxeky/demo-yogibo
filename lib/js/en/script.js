
function js_open_login(){
  js_register_tab(1);
  $('#id_register').fadeIn(300);
}

function js_open_register(){
  js_register_tab(2);
  $('#id_register').fadeIn(300);
}


function js_register_tab(tab){

  var url = $('#txt_Url').val();
  $('#loadPage').show();
  
  if(tab == 1){
    // login
    var path = url+"register/Login";
    $('#id_content').load(path,function(){
      $('#tab_login1 ,#tab_login2').removeClass('active');
      $('#tab_login'+tab).addClass('active');
      $('#loadPage').hide();
    });
  }else if(tab == 2){
    // register
    var path = url+"register/Register";
    $('#id_content').load(path,function(){
      $('#tab_login1 ,#tab_login2').removeClass('active');
      $('#tab_login'+tab).addClass('active');
      $('#loadPage').hide();
    });
  }
}


function js_forgetpassword_tab(){
  var url   = $('#txt_Url').val();
  var path  = url+"register/Forgetpassword_form";

  $('#loadPage').show();
  $('#id_content').load(path,function(){
    $('#tab_login1 ,#tab_login2').removeClass('active');
    $('#tab_login1').addClass('active');
    $('#loadPage').hide();
  });
}


function js_register_thankyou(obj){

    var url = $('#txt_Url').val();
    var path = url+"register/Thankyou/"+obj;
    // alert(path);
    $('#id_register').fadeIn(300);
    $('#id_content').load(path,function(){
      $('#loadPage').hide();
    });
}


function js_register(){

    // alert();
    if($('#txt_reFirstName').val() == ''){
        alert('Please input first name');
        $('#txt_reFirstName').focus();
    
    }else if($('#txt_reLastName').val() == ''){
      alert('Please input last name');
      $('#txt_reLastName').focus();
    
    }else if($("#txt_reGender1").is(":checked") == false && $("#txt_reGender2").is(":checked") == false){
      alert('Please sellect gender');
      // $('#txt_LastName').focus();
  
    }else if($('#txt_reBirthday').val() == ''){
      alert('Please input birthday');
      $('#txt_reBirthday').focus();

    }else if($('#txt_rePhone').val() == ''){
      alert('Please input phone number');
      $('#txt_rePhone').focus();
  
    }else if($('#txt_rePhone').val().length != 10){
      alert('Please enter a 10 digit phone number');
      $('#txt_rePhone').focus();
  
    }else if($('#txt_reEmail').val() == ''){
      alert('Please input email');
      $('#txt_reEmail').focus();

    }else if($('#txt_rePassword').val() == ''){
      alert('Please enter password');
      $('#txt_rePassword').focus();

    }else if($('#txt_rePassword').val().length != 6){
      alert('Please enter password at least 6 digits');
      $('#txt_rePassword').focus();

    }else if($('#txt_reConfirmPassword').val() == ''){
      alert('Please verify your password');
      $('#txt_reConfirmPassword').focus();
    
    }else if($('#txt_rePassword').val() != $('#txt_reConfirmPassword').val()){
      alert('Please enter a password And confirm the password');
      $('#txt_rePassword ,#txt_reConfirmPassword').val('');
      $('#txt_rePassword').focus();
  
    }else{
      
      // alert('OK');
      $('#loadPage').show();
      var path    = $('#txt_Url').val();
      var my_url  = path+'register/AddRegister';

      var dataString = $("#myForm").serialize();
        $.ajax({
        type: "POST",
        url: my_url,
        data: dataString,
        dataType: "html",
        success: function(data) {
          data = jQuery.trim(data);
          // alert(data);
          console.log(data);
          if(data){
            // $('#id_content').html(mes_ok);
            js_register_thankyou(1);
          }else{
            // $('#id_content').html(mes_error);
            js_register_thankyou(2);
          }

          $('#loadPage').hide();
        }
      });
  
    }
}



function js_login(){

  if($('#txt_LoginEmail').val() == ""){

    alert('Please enter email');
    $('#txt_LoginEmail').focus();

  }else if($('#txt_LoginPassword').val() == ""){
    
    alert('Please enter password');
    $('#txt_LoginPassword').focus();

  }else{
    
    $('#loadPage').show();
    var my_url = $('#txt_Url').val()+'member/login';
    var dataString 	= $("#myForm").serialize();
    // alert(my_url);
    $.ajax({
      type: "POST",
      url: my_url,
      data: dataString,
      dataType: "html",
      success: function(data) {
        data = jQuery.trim(data);
        // alert(data);
        console.log(data);
        if(data == true){
          window.location = "https://"+$('#txt_UrlNow').val();
        }else{
          alert('Invalid email or password');
        }
        $('#loadPage').hide();
      }//end success
    });
    
  }
}


function js_forgetpassword(){
  
  if($('#txt_forgetEmail').val() == ""){
    alert('Please enter email');
    $('#txt_forgetEmail').focus();
  }else{

    $('#loadPage').show();
    var email  = $('#txt_forgetEmail').val();
    var my_url = $('#txt_Url').val()+'register/forgetpassword';
    // alert(my_url);
    var dataString 	= $("#forgetForm").serialize();
    $.ajax({
      type: "POST",
      url: my_url,
      data: dataString,
      dataType: "html",
      success: function(data) {
        data = jQuery.trim(data);
        // alert(data);
        console.log(data);
        if(data == true){
          // alert('ระบบส่งข้อมูลการเปลี่ยนรหัสผ่านให้ท่าน ทางอีเมลเรียบร้อยแล้ว');
          $('#id_register').fadeOut(200);
          $('#area_forget_box').html('Transmission system to change your password. <br> by email successfully');
          $('#forget_box').fadeIn(300);
        }else{
          alert('ไม่พบอีเมล '+email+' ในระบบ');
        }
        $('#loadPage').hide();
      }//end success
    });
  }

}


function js_login_facebook(obj){
  // alert(obj);
  $('#loadPage').show();

  $('#txt_FacebookID').val(obj.id);
  $('#txt_FirstName').val(obj.first_name);
  $('#txt_LastName').val(obj.last_name);
  $('#txt_Email').val(obj.email);

  $('.loginHidden').hide();
  $('#loadPage').hide();

}


function js_billing(id){
  var obj = $('#area_billing');
  if(id == 1){
    obj.fadeOut(300);
  }else{
    obj.fadeIn(300);
  }
}



function js_addCarts(id){
  if(id){
    $('#loadPage').show();
    var my_url = $('#txt_Url').val()+'carts/addCarts/'+id;
		var dataString 	= "&txt_Unit=1";
				$.ajax({
				type: "POST",
				url: my_url,
				data: dataString,
				dataType: "html",
				success: function(data) {
					data = jQuery.trim(data);
					// alert(data);
          if(data == "fail"){
            alert("Error ! Can't add product to carts");
          }else{
            // alert("fail");
            $(".carts_unit").html(data);
          }
          $('#carts_box').fadeIn(300);
          $('#loadPage').hide();
				}//end success
		});
  }
}


function js_addProducts(id){

  var product_unit = $('#txt_Number').val();
  var color_id  = $('#txt_ColorID').val();
  var color     = $('#txt_ColorName').val();

  if(color_id == ''){
    alert('Please Select Color');

  }else if(Number(product_unit) <= 0) {
    alert('Please Insert QTY');
    $('#txt_Number').focus();

  }else if(id != null){

    $('#loadPage').show();  
    console.log(product_unit);
    var my_url = $('#txt_Url').val()+'carts/addCarts/'+id;
		var dataString = "&txt_Unit=" + product_unit + "&txt_Color=" + color_id+"&txt_Color_hex="+color;
		$.ajax({
				type: "POST",
				url: my_url,
				data: dataString,
				dataType: "html",
				success: function(data) {
					data = jQuery.trim(data);
					// alert(data);
          if(data == "fail"){
            alert("Error ! Can't add product to carts");
          }else{
            // alert("fail");
            $(".carts_unit").html(data);
          }
          $('#carts_box').fadeIn(300);
          $('#loadPage').hide();
				}//end success
    });
    
  }
}


function js_productCarts(id){
  // console.log(id);
  var color_id  = $('#txt_ColorID_'+id).val();
  var color     = $('#txt_ColorName_'+id).val();

  console.log(id+':'+color_id);

  if(color_id == ''){
    alert('Please Select Color');

  }else if(id != null){

    $('#loadPage').show();  

    var product_unit = 1;
    console.log(id);
    var my_url = $('#txt_Url').val()+'carts/addCarts/'+id;
		var dataString = "&txt_Unit=" + product_unit + "&txt_Color=" + color_id+"&txt_Color_hex="+color;
		$.ajax({
				type: "POST",
				url: my_url,
				data: dataString,
				dataType: "html",
				success: function(data) {
					data = jQuery.trim(data);
					// alert(data);
          if(data == "fail"){
            alert("Error ! Can't add product to carts");
          }else{
            // alert("fail");
            $(".carts_unit").html(data);
          }
          $('#carts_box').fadeIn(300);
          $('#loadPage').hide();
				}//end success
    });

  }

}


function js_carts_sum(){

  var my_url = $('#txt_Url').val()+'carts/sumCarts';
  // alert(my_url);
  var dataString 	= "";
      $.ajax({
      type: "POST",
      url: my_url,
      data: dataString,
      dataType: "html",
      success: function(data) {
        data = jQuery.trim(data);
        // alert(data);
        // console.log(data);
        if(data == ''){
          data = 0;
        }
        $(".carts_unit").html(data);
      }//end success
  });
}


function js_carts_list(){
  var my_url = $('#txt_Url').val()+'carts/cartsList';
  $("#id_load_carts").load(my_url,function(){
    // load summary carts
    js_carts_summary();
    
  });
}

function js_carts_summary(status){
  var my_url = $('#txt_Url').val()+'carts/cartsSummary/'+status;
  $("#carts_summary").load(my_url);
}


function js_carts_update_unit(id,unit){

  if(id && unit > 0){
    // alert(id+":"+unit);
    $('#loadPage').show();
    var my_url = $('#txt_Url').val()+'carts/updateCarts/'+id;
    var dataString 	= "&txt_Unit="+unit;
        $.ajax({
        type: "POST",
        url: my_url,
        data: dataString,
        dataType: "html",
        success: function(data) {
          data = jQuery.trim(data);
          // alert(data);
          console.log(data);
          js_carts_list();
          $('#loadPage').hide();
          js_carts_sum();
          // $(".carts_unit").html(data);
        }//end success
    });

  }
}


function js_carts_product_detail(id,unit){

  if(id && unit > 0){
    // alert(id+":"+unit);
    $('#loadPage').show();
    var my_url = $('#txt_Url').val()+'carts/updateCarts/'+id;
    var dataString 	= "&txt_Unit="+unit;
        $.ajax({
        type: "POST",
        url: my_url,
        data: dataString,
        dataType: "html",
        success: function(data) {
          data = jQuery.trim(data);
          // alert(data);
          console.log(data);
          // js_carts_list();
          $('#loadPage').hide();
          // js_carts_sum();
          // $(".carts_unit").html(data);
        }//end success
    });

  }
}


function js_add_product(action){
  if(action == '-'){
    var number = $('#txt_Number').val()*1-1;
    if(number < 1){
      number = 1;
    }
    $('#txt_Number').val(number);
  }else{
    $('#txt_Number').val($('#txt_Number').val()*1+1);
  }
}


function js_carts_del(cart_id){
  if(cart_id){
    // alert(cart_id);
    var my_url  = $('#txt_Url').val()+'carts/cartsDelete/'+cart_id;
    var dataString 	= "";
        $.ajax({
        type: "POST",
        url: my_url,
        data: dataString,
        dataType: "html",
        success: function(data) {
          data = jQuery.trim(data);
          // alert(data);
          js_carts_list();
          $('#loadPage').hide();
          // $(".carts_unit").html(data);
        }//end success
    });
  }
}


function js_carts_transport(obj){
  
  $('#loadPage').hide();
  $('#txt_SelectTransport').val(obj);

  var my_url  = $('#txt_Url').val()+'carts/addTransport/'+obj;
  var dataString 	= "";
      $.ajax({
      type: "POST",
      url: my_url,
      data: dataString,
      dataType: "html",
      success: function(data) {
        data = jQuery.trim(data);
        // alert(data);
        console.log(data);
        js_carts_list();
        $('#loadPage').hide();
        // $(".carts_unit").html(data);
      }//end success
  });
  
}


function js_carts_step1(){

  var total     = $('#txt_sumTotal').val();
  var delivery  = $('#txt_sumDelivery').val();
  var url       = $('#txt_Url').val();

  // alert($('#txt_SelectTransport').val());
  if($('#txt_SelectTransport').val() == "" || $('#txt_SelectTransport').val() == null){
    alert('Please provide receipt information.');
  }else if(total > 0){
    window.location = url+'carts/step2';
  }else{
    alert('Please select product to cart.');
  }

}


function js_carts_step2(){

  if($('#txt_FirstName').val() == ""){
    alert('Please input first name');
    $('#txt_FirstName').focus();

  }else if($('#txt_LastName').val() == ""){
    alert('Please input last name');
    $('#txt_LastName').focus();

  }else if($('#txt_Phone').val() == ""){
    alert('Please input phone number');
    $('#txt_Phone').focus();

  }else if($('#txt_Email').val() == ""){
    alert('Please input email');
    $('#txt_Email').focus();

  }else if($('#txt_No').val() == ""){
    alert('Please input no');
    $('#txt_No').focus();

  }else if($('#txt_Province').val() == 0){
    alert('Please select province');
    $('#txt_Province').focus();

  }else if($('#txt_Ampure').val() == 0){
    alert('Please select area/district');
    $('#txt_Ampure').focus();

  }else if($('#txt_Tumbon').val() == 0){
    alert('Please select Sub-area/Sub-district');
    $('#txt_Tumbon').focus();

  }else if($('#txt_Postcode').val() == ""){
    alert('Please select postcode');
    $('#txt_Postcode').focus();


  }else if($('#txt_BillFirstName').val() == "" && $("#txt_Billing2").is(":checked") == true){
    alert('Please input first name');
    $('#txt_BillFirstName').focus();

  }else if($('#txt_BillLastName').val() == "" && $("#txt_Billing2").is(":checked") == true){
    alert('Please input last name');
    $('#txt_BillLastName').focus();

  }else if($('#txt_BillPhone').val() == "" && $("#txt_Billing2").is(":checked") == true){
    alert('Please input phone number');
    $('#txt_BillPhone').focus();

  }else if($('#txt_BillEmail').val() == "" && $("#txt_Billing2").is(":checked") == true){
    alert('Please input email');
    $('#txt_BillEmail').focus();

  }else if($('#txt_BillNo').val() == "" && $("#txt_Billing2").is(":checked") == true){
    alert('Please input no');
    $('#txt_BillNo').focus();

  }else if($('#txt_BillProvince').val() == 0 && $("#txt_Billing2").is(":checked") == true){
    alert('Please select province');
    $('#txt_BillProvince').focus();

  }else if($('#txt_BillAmpure').val() == 0 && $("#txt_Billing2").is(":checked") == true){
    alert('Please select area/district');
    $('#txt_BillAmpure').focus();

  }else if($('#txt_BillTumbon').val() == 0 && $("#txt_Billing2").is(":checked") == true){
    alert('Please select Sub-area/Sub-district');
    $('#txt_BillTumbon').focus();

  }else if($('#txt_BillPostcode').val() == "" && $("#txt_Billing2").is(":checked") == true){
    alert('Please select postcode');
    $('#txt_BillPostcode').focus();


  }else if($("#txt_Billing1").is(":checked") == false && $("#txt_Billing2").is(":checked") == false){

    alert('Please provide billing information.');

  }else{
    // alert("ok");
    $('#loadPage').show();
    var my_url = $('#txt_Url').val()+'carts/addCarts2';
    var dataString 	= $("#cartsForm").serialize();
        $.ajax({
        type: "POST",
        url: my_url,
        data: dataString,
        dataType: "html",
        success: function(data) {
          window.location = $('#txt_Url').val()+'carts/step3';
          $('#loadPage').hide();
        }//end success
    });
  }
}


function js_carts_step3(){
  // alert('payment');
  var way_payment = $('#txt_WayPayment').val();
  if(way_payment == '' || way_payment == null){
    alert('please select payment method');

  }else if(way_payment == 2){
    var bank_tranfer = $('#txt_BankTranfer').val();
    console.log(bank_tranfer);
    if(bank_tranfer == 0){
      alert('please select bank payment');
    }else{
      js_carts_save(way_payment);
    }

  }else{
    js_carts_save_paypal();
    console.log(way_payment);
  }

}


function js_carts_save(status){

  var url    = $('#txt_Url').val();
  var my_url = url+'carts/saveCarts/';
  var dataString 	= $("#cartsForm").serialize();
  $.ajax({
      type: "POST",
      url: my_url,
      data: dataString,
      dataType: "html",
      success: function(data) {
        data = jQuery.trim(data);
        // alert(data+":"+status);
        if(data == 1 && status == 2){
          // goto carts step 4
          window.location = url+'carts/step4';
        }
        console.log(data);
      }//end success
  });

}

function js_carts_save_paypal(){

  var url    = $('#txt_Url').val();
  var my_url = url+'carts/saveCarts/';
  var dataString 	= $("#cartsForm").serialize();
  $.ajax({
      type: "POST",
      url: my_url,
      data: dataString,
      dataType: "html",
      success: function(data) {
        data = jQuery.trim(data);

        if(data == 1){
          window.location = url+'carts/paypal';
        }else{
          alert('Error ! add carts to databases');
        }
        console.log(data);
      }//end success
  });

}


function js_getAmpure(pro_id){
  var my_url = $('#txt_Url').val()+'carts/ampure/'+pro_id;
  $('#area_ampure').load(my_url,function(){
    $('select').selectric('refresh');
  });
}

function js_getTumbon(ampure_id){
  var my_url = $('#txt_Url').val()+'carts/tumbon/'+ampure_id;
  $('#area_tumbon').load(my_url,function(){
    $('select').selectric('refresh');
    // js_getPostcode(ampure_id);
  });

}

function js_getPostcode(id){
  var url    = $('#txt_Url').val();
  var my_url = url+'carts/postcode/'+id;
  var dataString 	= "";
  $.ajax({
      type: "POST",
      url: my_url,
      data: dataString,
      dataType: "html",
      success: function(data) {
        data = jQuery.trim(data);
        // alert(data);
        console.log(data);
        $('#txt_Postcode').val(data);
      }//end success
  });

}

function js_getPostcode_old(ampure_id) {
  var url = $('#txt_Url').val();
  var my_url = url + 'carts/postcode/' + ampure_id;
  var dataString = "";
  $.ajax({
    type: "POST",
    url: my_url,
    data: dataString,
    dataType: "html",
    success: function (data) {
      data = jQuery.trim(data);
      // alert(data);
      console.log(data);
      $('#txt_Postcode').val(data);
    }//end success
  });

}


function js_getBillAmpure(pro_id){
  var my_url = $('#txt_Url').val()+'carts/ampure_bill/'+pro_id;
  $('#area_ampure_bill').load(my_url,function(){
    $('select').selectric('refresh');
  });
}

function js_getBillTumbon(ampure_id){
  var my_url = $('#txt_Url').val()+'carts/tumbon_bill/'+ampure_id;
  $('#area_tumbon_bill').load(my_url,function(){
    $('select').selectric('refresh');
    // js_getBillPostcode(ampure_id);
  });

}

function js_getBillPostcode(ampure_id){
  var url    = $('#txt_Url').val();
  var my_url = url+'carts/postcode/'+ampure_id;
  var dataString 	= "";
  $.ajax({
      type: "POST",
      url: my_url,
      data: dataString,
      dataType: "html",
      success: function(data) {
        data = jQuery.trim(data);
        console.log(data);
        $('#txt_BillPostcode').val(data);
      }//end success
  });

}


function js_getBank(id){
  if(id > 0){
    $('#loadPage').show();
    var my_url = $('#txt_Url').val()+'carts/bankInfo/'+id;
    $('#area_bank').load(my_url,function(){
      $('#loadPage').hide();
      console.log(my_url);
    });
  }else{
    $('#area_bank').html('');
  }
}


function js_select_payment(id){
  console.log(id);
  $('#bnt_payment1 , #bnt_payment2').removeClass('active');
  $('#bnt_payment'+id).addClass('active');

  $('#payment_box1 , #payment_box2').hide(200);
  $('#payment_box'+id).show(200);

  $('#txt_WayPayment').val(id);
  
}


function js_member_info_view(){

    $('#loadPage').show();
    var my_url = $('#txt_Url').val()+'member/info_view/';
    $('#member_info').load(my_url,function(){
      $('#loadPage').hide();
      console.log(my_url);
    });

}


function js_member_bill_view(){

  $('#loadPage').show();
  var my_url = $('#txt_Url').val()+'member/info_bill/';
  $('#member_bill').load(my_url,function(){
    $('#loadPage').hide();
    console.log(my_url);
  });

}


function js_product_tab(id){
  // alert(id);
  $('#bnt_product_tap1 ,#bnt_product_tap2 ,#bnt_product_tap3').removeClass('active');
  $('#bnt_product_tap'+id).addClass('active');

  $('#tab_product_1 ,#tab_product_2 ,#tab_product_3').hide();
  $('#tab_product_'+id).show(300); 
}


function js_product_updateNumber(id){
  alert(id);
}


function js_email_subscribe(){

  var email = $('#txt_SubscribeEmail').val();
  if(email != ''){
    // alert(email);
    $('#loadPage').show();
    var my_url = $('#txt_Url').val()+'member/enews';
    var dataString = '&txt_Enews='+email;
    $.ajax({
      type: "POST",
      url: my_url,
      data: dataString,
      dataType: "html",
      success: function(data) {
        data = jQuery.trim(data);
        // alert(data);
        console.log(data);
        $('#email_subscribe').html(email);
        $('#txt_SubscribeEmail').val('');

        $('#enews_box').fadeIn(300);
        $('#loadPage').hide();
      }//end success
    });

  }
}


function js_member_infoEdit(){

  var url    = $('#txt_Url').val();
  var my_url = url+'member/editInfo';

  $('#id_content').load(my_url,function(){
    $('#id_register').fadeIn(300);
  });

}

function js_memberUpdateInfo(){
  
  if($('#txt_FirstName').val() == ''){
    alert('กรุณาระบุชื่อ');
    $('#txt_FirstName').focus();

  }else if($('#txt_LastName').val() == ''){
    alert('กรุณาระบุนามสกุล');
    $('#txt_LastName').focus();

  }else if($("#txt_Gender1").is(":checked") == false && $("#txt_Gender2").is(":checked") == false){
    alert('กรุณาระบุเพศ');
    // $('#txt_LastName').focus();

  }else if($('#txt_Birthday').val() == ''){
    alert('กรุณาระบุวันเกิด');
    $('#txt_Birthday').focus();

  }else if($('#txt_Phone').val() == ''){
    alert('กรุณาระบุเบอร์โทรศัพท์');
    $('#txt_Phone').focus();

  }else if($('#txt_Phone').val().length != 10){
    alert('กรุณาระบุหมายเลขโทรศัพท์ 10 หลัก');
    $('#txt_Phone').focus();

  }else if($('#txt_Email').val() == ''){
    alert('กรุณาระบุอีเมล');
    $('#txt_Email').focus();

  }else if($('#txt_No').val() == ''){
    alert('กรุณาระบุบ้านเลขที่');
    $('#txt_No').focus();
  
  }else if($('#txt_Province').val() == 0){
    alert('กรุณาเลือกจังหวัด');
    $('#txt_Province').focus();

  }else if($('#txt_Ampure').val() == 0){
    alert('กรุณาเลือกเขต/อำเภอ');
    $('#txt_Ampure').focus();

  }else if($('#txt_Tumbon').val() == 0){
    alert('กรุณาเลือกแขวง/ตำบล');
    $('#txt_Tumbon').focus();

  }else{
    
    // alert('OK');
    $('#loadPage').show();
    var path    = $('#txt_Url').val();
    var my_url  = path+'register/UpdateRegister';

    var dataString = $("#myForm").serialize();
      $.ajax({
      type: "POST",
      url: my_url,
      data: dataString,
      dataType: "html",
      success: function(data) {
        data = jQuery.trim(data);
        // alert(data);
        console.log(data);
        if(data){
          js_member_info_view();
          $('#id_register').fadeOut(300);
          $('#confirm_box').fadeIn(300);
        }else{
          alert("Error : Can't save data");
          $('#id_register').fadeOut(300);
        }

        $('#loadPage').hide();
      }
    });

  }

}



function js_member_billEdit(){

  var url    = $('#txt_Url').val();
  var my_url = url+'member/editBill';

  $('#id_content').load(my_url,function(){
    $('#id_register').fadeIn(300);
  });

}



function js_memberUpdateBill(){
  
  if($('#txt_FirstName').val() == ''){
    alert('กรุณาระบุชื่อ');
    $('#txt_FirstName').focus();

  }else if($('#txt_LastName').val() == ''){
    alert('กรุณาระบุนามสกุล');
    $('#txt_LastName').focus();

  }else if($('#txt_Phone').val() == ''){
    alert('กรุณาระบุเบอร์โทรศัพท์');
    $('#txt_Phone').focus();

  }else if($('#txt_Phone').val().length != 10){
    alert('กรุณาระบุหมายเลขโทรศัพท์ 10 หลัก');
    $('#txt_Phone').focus();

  }else if($('#txt_Email').val() == ''){
    alert('กรุณาระบุอีเมล');
    $('#txt_Email').focus();

  }else if($('#txt_No').val() == ''){
    alert('กรุณาระบุบ้านเลขที่');
    $('#txt_No').focus();
  
  }else if($('#txt_Province').val() == 0){
    alert('กรุณาเลือกจังหวัด');
    $('#txt_Province').focus();

  }else if($('#txt_Ampure').val() == 0){
    alert('กรุณาเลือกเขต/อำเภอ');
    $('#txt_Ampure').focus();

  }else if($('#txt_Tumbon').val() == 0){
    alert('กรุณาเลือกแขวง/ตำบล');
    $('#txt_Tumbon').focus();

  }else{
    
    // alert('OK');
    $('#loadPage').show();
    var path    = $('#txt_Url').val();
    var my_url  = path+'register/UpdateBill';

    var dataString = $("#myForm").serialize();
      $.ajax({
      type: "POST",
      url: my_url,
      data: dataString,
      dataType: "html",
      success: function(data) {
        data = jQuery.trim(data);
        // alert(data);
        console.log(data);
        if(data){
          js_member_bill_view();
          $('#id_register').fadeOut(300);
          $('#confirm_box').fadeIn(300);
        }else{
          alert("Error : Can't save data");
          $('#id_register').fadeOut(300);
        }

        $('#loadPage').hide();
      }
    });

  }

}


function js_member_changPassword(){

  var url    = $('#txt_Url').val();
  var my_url = url+'member/changePassword';

  $('#id_content_password').load(my_url,function(){
    $('#id_forgetpassword').fadeIn(300);
  });

}


function js_memberUpdatePassword(){

    if($('#txt_OldPassword').val() == ''){
      alert('Please enter the old password.');
      $('#txt_OldPassword').focus();

    }else if($('#txt_Password').val() == ''){
        alert('Please enter the new password.');
        $('#txt_Password').focus();

    }else if($('#txt_Password').val().length != 6){
      alert('Please enter password at least 6 digits.');
      $('#txt_Password').focus();

    }else if($('#txt_ConfirmPassword').val() == ''){
      alert('Please verify your password.');
      $('#txt_ConfirmPassword').focus();

    }else if($('#txt_Password').val() != $('#txt_ConfirmPassword').val()){
      alert('Please enter a new password And confirm the new password.');
      $('#txt_Password ,#txt_ConfirmPassword').val('');
      $('#txt_Password').focus();

    }else{
      
      $('#loadPage').show();
      var path    = $('#txt_Url').val();
      var my_url  = path+'register/UpdatePassword';

      var dataString = $("#myForm").serialize();
        $.ajax({
        type: "POST",
        url: my_url,
        data: dataString,
        dataType: "html",
        success: function(data) {
          data = jQuery.trim(data);
          // alert(data);
          console.log(data);
          if(data){
            $('#id_forgetpassword').fadeOut(300);
            $('#confirm_box').fadeIn(300);
          }else{
            alert("The old password was invalid.");
            $('#id_forgetpassword').fadeOut(300);
          }

          $('#loadPage').hide();
        }
      });
      
    }
}


function js_payment_confirm(){

  if($('#txt_FirstName').val() == ''){
    alert('กรุณาระบุชื่อ');
    $('#txt_FirstName').focus();

  }else if($('#txt_LastName').val() == ''){
    alert('กรุณาระบุนามสกุล');
    $('#txt_LastName').focus();

  }else if($('#txt_Phone').val() == ''){
    alert('กรุณาระบุเบอร์โทรศัพท์');
    $('#txt_Phone').focus();

  }else if($('#txt_Phone').val().length != 10){
    alert('กรุณาระบุหมายเลขโทรศัพท์ 10 หลัก');
    $('#txt_Phone').focus();

  }else if($('#txt_Email').val() == ''){
    alert('กรุณาระบุอีเมล');
    $('#txt_Email').focus();

  }else if($('#txt_Bank').val() == 0){
    alert('กรุณาเลือกธนาคาร');
    $('#txt_Bank').focus();
  
  }else if($('#txt_Date').val() == ''){
    alert('กรุณาระบุวันที่โอนเงิน');
    $('#txt_Date').focus();

  // }else if($('#txt_Time').val() == ''){
  //   alert('กรุณาระบุเวลาโอนเงิน');
  //   $('#txt_Time').focus();

  }else if($('#txt_Money').val() == ''){
    alert('กรุณาระบุจำนวนเงินที่โอน');
    $('#txt_Money').focus();

  }else if($('#txt_Subject').val() == ''){
    alert('กรุณาระบุข้อมูลการสั่งซื้อ');
    $('#txt_Subject').focus();

  }else{
    // alert('OK');
    $('#confirmForm').submit();
  }
  
}


function js_vdoView(vdo){
  if(vdo != null){
    // alert(vdo); 
    var m_vdo = 'https://www.youtube.com/embed/'+vdo+'?rel=0&showinfo=0';
    $('#id_content_vdo').attr('src',m_vdo);
    $('#id_vdo').delay(1000).fadeIn(300);
  }
}


function js_vdoClose(){
  $('#id_content_vdo').attr('src','');
  $('#id_vdo').fadeOut(300);
}



function js_change_password(){
  // alert(123);
  if($('#txt_Password').val() == ""){
    alert('Please enter the new password.');
    $('#txt_Password').focus();

  }else if($('#txt_Password').val().length <= 5){
    alert('Please enter password at least 6 digits.');
    $('#txt_Password').focus();

  }else if($('#txt_ConfirmPassword').val() == ""){
    alert('Please verify your password.');
    $('#txt_ConfirmPassword').focus();

  }else if($('#txt_Password').val() != $('#txt_ConfirmPassword').val()){
    alert('Please enter a new password And confirm the new password.');
    $('#txt_Password').val('');
    $('#txt_ConfirmPassword').val('');
    $('#txt_Password').focus();

  }else{

    $('#loadPage').show();
    var email  = $('#txt_forgetEmail').val();
    var my_url = $('#txt_Url').val()+'register/update_password';
    var dataString 	= $("#resetForm").serialize();
    $.ajax({
      type: "POST",
      url: my_url,
      data: dataString,
      dataType: "html",
      success: function(data) {
        data = jQuery.trim(data);
        // alert(data);
        console.log(data);

        if(data == true){
          // alert('ระบบส่งข้อมูลการเปลี่ยนรหัสผ่านให้ท่าน ทางอีเมลเรียบร้อยแล้ว');
          $('#area_forget2_box').html('The password has been changed.');
          $('#forget2_box').fadeIn(300);
        }else{
          // alert('ไม่พบอีเมล '+email+' ในระบบ');
        }
        $('#loadPage').hide();
      }//end success
    });

  }
}


function js_add_wishlist(id) {
  console.log(id);
  if(id != null){
    $('#loadPage').show();
    var my_url = $('#txt_Url').val() + 'member/add_wishlist';
    var dataString = "&product_id="+id;
    $.ajax({
      type: "POST",
      url: my_url,
      data: dataString,
      dataType: "html",
      success: function (data) {
        data = jQuery.trim(data);
        // alert(data);
        console.log(data);
        if (data == true) {
          $('#area_forget_box').html('Add wishlist complete');
          $('#forget_box').fadeIn(300);

          var imgObj = $('#img_wishList_'+id);
          if(imgObj){
            var img_wishlist = $('#txt_Base').val() + 'img/products/icon-wishlist-active.jpg';
            imgObj.attr('src',img_wishlist);
          }

        } else if (data == 'Login'){
          $('#area_forget_box').html('Please login before add wishlist');
          $('#forget_box').fadeIn(300);
        }

        $('#loadPage').hide();
      } //end success
    });
  }
}


function js_message(){

  var url = $('#txt_Url').val();
  var my_url = url + 'member/message';
  // console.log(my_url);
  $('#area_message').load(my_url,function(){
    $('#id_message').fadeIn(300);
  });
  
}


function js_addMessage() {
  if ($('#txt_MessageEmail').val() == ''){
    alert('Please input Email');
    $('#txt_MessageEmail').focus();
  } else if ($('#txt_Message').val() == '') {
    alert('Please input Message');
    $('#txt_Message').focus();
  }else {
    // console.log('OK');
    $('#loadPage').show();
    var my_url = $('#txt_Url').val() + 'member/add_message';
    var dataString = $("#myMessage").serialize();
    $.ajax({
      type: "POST",
      url: my_url,
      data: dataString,
      dataType: "html",
      success: function (data) {
        data = jQuery.trim(data);
        // console.log(data);

        $('#area_message').html(data);
        $('#loadPage').hide();
      } //end success
    });

  }
}


function js_search() {

  var url = $('#txt_Url').val();
  var my_url = url + 'home/search';
  // console.log(my_url);
  $('#area_search').load(my_url, function () {
    $('#id_search').fadeIn(300);
  });

}


function js_search_data(){

  if($('#txt_Keyword').val() == ''){

    alert('Please input keyword');
    $('#txt_Keyword').focus();
 
  }else{
    // console.log('OK');
    $('#loadPage').show();
    var keyword = $('#txt_Keyword').val();
    var my_url = $('#txt_Url').val() + 'products/search/' + keyword;
    window.location = my_url;

  }
  
}

function js_contact(){

  if ($('#txt_contactEmail').val() == '') {
    alert('please input email');
    $('#txt_contactEmail').focus();

  } else if ($('#txt_contactMessage').val() == '') {
    alert('please input message');
    $('#txt_contactMessage').focus();

  } else {
    // alert('OK');
    $('#loadPage').show();

    var my_url = $('#txt_Url').val() + 'contact/AddContact';
    var dataString = $("#contactForm").serialize();
    $.ajax({
      type: "POST",
      url: my_url,
      data: dataString,
      dataType: "html",
      success: function (data) {
        data = jQuery.trim(data);
        // alert(data);
        console.log(data);
        if (data == "OK") {
          $('#contact_box').fadeIn(300);
        }else{
          alert("Error ! Can't add data");
        }

        $('#txt_contactEmail').val('');
        $('#txt_contactMessage').val('');

        $('#loadPage').hide();
      }
    });

  }
}


function js_subscribeBox() {

  if ($('#subscribe_FirstName').val() != '' &&
    $('#subscribe_LastName').val() != '' &&
    $('#subscribe_Phone').val() != '' &&
    $('#subscribe_Email').val() != '') {

    $('#loadPage').show();
    var my_url = $('#txt_Url').val() + 'contact/AddSubscribe';
    var dataString = $("#subscribeForm").serialize();
    $.ajax({
      type: "POST",
      url: my_url,
      data: dataString,
      dataType: "html",
      success: function (data) {
        data = jQuery.trim(data);
        // alert(data);
        console.log(data);

        $('#subscribe_remark').html('');
        $('#subscribe_FirstName').val('');
        $('#subscribe_LastName').val('');
        $('#subscribe_Phone').val('');
        $('#subscribe_Email').val('');
        $('.input_subscribe').removeClass('input_Error');

        if (data == "OK") {
          js_subscribeThk(1);
        } else if (data == "HaveData") {
          js_subscribeThk(2);
        } else {
          js_subscribeThk(3);
        }
        $('#loadPage').hide();

      }
    });
    // console.log('ok !');

  } else {
    $('.input_subscribe').addClass('input_Error');
    $('#subscribe_remark').html('* Required field');
  }

}


function js_contactBox() {

  if ($('#contact_FirstName').val() != '' &&
    $('#contact_LastName').val() != '' &&
    $('#contact_Number').val() != '' &&
    $('#contact_Email').val() != '' &&
    $('#contact_Message').val() != '') {

    $('#loadPage').show();
    var my_url = $('#txt_Url').val() + 'contact/AddContactBox';
    var dataString = $("#cForm").serialize();
    $.ajax({
      type: "POST",
      url: my_url,
      data: dataString,
      dataType: "html",
      success: function (data) {
        data = jQuery.trim(data);
        // alert(data);
        console.log(data);
        if (data == "OK") {
          $('#contact_box2').fadeIn(300);
        } else {
          alert("Error ! Can't add data");
        }
        $('#loadPage').hide();

        $('.c_remark').html('');
        $('#contact_FirstName').val('');
        $('#contact_LastName').val('');
        $('#contact_Number').val('');
        $('#contact_Email').val('');
        $('#contact_Message').val('');
        $('.input_contactUs ,.area_contactUs').removeClass('input_Error');

      }
    });
    // console.log('ok !');

  } else {
    $('.input_contactUs ,.area_contactUs').addClass('input_Error');
    $('.c_remark').html('* Required field');
  }

}