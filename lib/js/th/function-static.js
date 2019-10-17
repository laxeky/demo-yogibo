



function js_contact(url_path){
	if(document.getElementById('txt_FirstName').value == "" ){
		alert('กรุณาระบุ ชื่อ');
		// document.getElementById("txt_FirstName").className = "input_contact_error";
		document.getElementById('txt_FirstName').focus();

	}else if(document.getElementById('txt_LastName').value == "" ){
		alert('กรุณาระบุ นามสกุล');
		// document.getElementById("txt_LastName").className = "input_contact_error";
		document.getElementById('txt_LastName').focus();

	}else if(document.getElementById('txt_Phone').value == "" ){
		alert('กรุณาระบุ เบอร์โทรศัพท์');
		// document.getElementById("txt_Phone").className = "input_contact_error";
		document.getElementById('txt_Phone').focus();
	}else if(document.getElementById('txt_Phone').value.length < 9 ){
		alert('กรุณาตรวจสอบเบอร์โทรศัพท์');
		// document.getElementById("txt_Phone").className = "input_contact_error";
		document.getElementById('txt_Phone').focus();
	}else if(document.getElementById('txt_Email').value == "" ){
		alert('กรุณาระบุ อีเมล');
		// document.getElementById("txt_Email").className = "input_contact_error";
		document.getElementById('txt_Email').focus();

	}else if(document.getElementById('txt_Subject').value == ""  ){
		alert('กรุณาระบุ รายละเอียด');
		// document.getElementById("txt_Subject").className = "input_contact_error";
		document.getElementById('txt_Subject').focus();

	}else{

		$("#loadPage").show();
		
		var dataString = $("#myForm").serialize();
		dataString += "&action=add_register";
		$.ajax({
		type: "POST",
		 url: url_path+"/AddContact",
		data: dataString,
		dataType: "html",
		success: function(data) {
			$("#loadPage").hide();
			data = jQuery.trim(data);
			//alert(data);
			arr_data = data.split("|");
		//	alert(arr_data[0]);
			if(data == "False"){
				alert('ระบบขัดข้อง กรุณาติดต่อเจ้าหน้าที่ค่ะ');
				$("#loadPage").hide();
			}else if(data=="False_Register"){
				alert('มีผู้ลงทะเบียน ที่ใช้ชื่อ และนามสกุลนี้แล้วค่ะ');
			}else{
				$('#confirm_box').fadeIn(300);
				$('#txt_FirstName ,#txt_LastName ,#txt_Phone ,#txt_Email ,#txt_Subject').val('');
				// alert('บันทึกข้อมูลแล้วค่ะ');
				// window.location = url_path;
			}
			//$("#loadPage").hide();
		}//end success
		});
	
	}

}


function js_faq(id){
	if ($('#ans'+id).is(':hidden')){
		$('#faq'+id).removeClass('faq_subtitle');
		$('#faq'+id).addClass('faq_subtitle_show');
		$('#ans'+id).slideDown();
	}else{
		$('#faq'+id).removeClass('faq_subtitle_show');
		$('#faq'+id).addClass('faq_subtitle');
		$('#ans'+id).slideUp();
	}
	
}

function js_clip(url_path) {
	var dataString = "";
	$.ajax({
		type: "POST",
		url: url_path,
		data: dataString,
		dataType: "html",
		success: function (data) {
			data = jQuery.trim(data);
			$("#testimonial_video").html(data);
			//$("#loadPage").hide();
		} //end success
	});
}

function js_map(id){
	
	if(id=="google"){
		$("#contact_google").show();
		$("#contact_map").hide();
		
		$("#bt_map1_active").hide();
		$("#bt_map1").show();
		
		$("#bt_map2").hide();
		$("#bt_map2_active").show();
		
		
	}else{
		$("#contact_map").show();
		$("#contact_google").hide();
		
		$("#bt_map1").hide();
		$("#bt_map1_active").show();
		
		$("#bt_map2_active").hide();
		$("#bt_map2").show();
	}
}


function js_footer_map(url_path){
	//alert(id);
	var dataString = "action=add_register";
		$.ajax({
		type: "POST",
		 url: url_path,
		data: dataString,
		dataType: "html",
		success: function(data) {
			
			data = jQuery.trim(data);
		//	alert(data);
			//$("#area_product_item").fadeIn();
		
			//document.getElementById('popup_concept').innerHTML = data;
			$("#footer_map").show();
			$("#footer_map_area").html(data);
			
		}//end success
		});
}


