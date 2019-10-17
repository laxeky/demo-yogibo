$('#nav-icon1').click(function () {
	$(this).toggleClass('open');
	js_main_menu();
});


var status_menu = false;
function js_main_menu(option) {

	if (status_menu == false) {

		status_menu = true;
		$('.template_nav').show();
		$('.template_nav').stop().animate({
			"height": "370px",
		});

	} else {

		status_menu = false;
		$('.template_nav').stop().animate({
			"height": "0px",
		}, function () {
			$('.template_nav').hide();
		});

	}
	// alert(status_menu);
}

function js_main_menu_close() {
	status_menu = false;
	console.log(windowX);
	if (windowX <= 768) {
		$('.template_nav').stop().animate({
			"height": "0px",
		}, function () {
			$('.template_nav').hide();
			$('#nav-icon1').toggleClass();
		});
	}

}






function js_press_number(e){
	var key = e.keyCode || e.charCode;
	// console.log(key);
	if (key >= 48 && key <= 57) {
		console.log('You pressed ' + (key - 48));
		return key;
	}else{
		return false;
	}
}

function js_product_detail_tab(id){
	// alert(id);
	console.log(id);
	$("#product_detail1 ,#product_detail2 ,#product_detail3 ,#product_detail4").removeClass('active');
	$("#product_detail"+id).addClass('active');

	$('#list_data1 ,#list_data2 ,#list_data3 ,#list_data4').hide();
	$('#list_data'+id).fadeIn(300);
	
}


function js_product_image(img , id ,row){

	$('#product_img').attr('src',img);

	for(var i=0;i<row;i++){
		$("#product_gallery_"+i).removeClass('active');
	}

	$("#product_gallery_" + id).addClass('active');
	console.log(img);
}

function js_product_color(id, color, image, index, row){
	if(id != null){
		var img_url = $('#txt_Base').val() + 'myAdmin/upload/_product/';

		for(var i=0;i<row;i++){
			$('#color_box' + i).removeClass('active');
		}
		
		$('#txt_ColorID').val(id);
		$('#txt_ColorName').val(color);
		$('#product_img').attr('src', img_url + image);
		$('#color_box'+index).addClass('active');
		console.log(id+','+color+','+img);
	}
}

function js_product_color_list(id, color, image, index, row , p_id){
	if(id != null){
		var img_url = $('#txt_Base').val() + 'myAdmin/upload/_product/';

		for(var i=0;i<row;i++){
			$('#color_box_'+ p_id +'_' + i).removeClass('active');
		}
		
		$('#txt_ColorID_'+p_id).val(id);
		$('#txt_ColorName_'+p_id).val(color);
		$('#product_img_'+p_id).attr('src', img_url + image);
		$('#color_box_'+p_id+'_'+index).addClass('active');
		console.log(id+','+color+','+img);
	}
}


function js_vdoView(vdo) {
	if (vdo != null) {
		// alert(vdo); 
		var m_vdo = 'https://www.youtube.com/embed/' + vdo + '?rel=0&showinfo=0';
		$('#id_content_vdo').attr('src', m_vdo);
		$('#id_vdo').delay(300).fadeIn(300);
	}
}


function js_boxContact(action){
	if(action == 'hide'){
		$("#box_contact_box").animate({
			opacity: 0.0,
			height: "0"
		}, 500, function () {
			// Animation complete.
			$('#box_contact_icon').fadeIn(300);
		});
	}else{

		$("#box_contact_box").animate({
			opacity: 1.0,
			height: "430px"
		}, 500, function () {
			// Animation complete.
			$('#box_contact_icon').fadeOut(300);
		});

	}
}





function js_subscribeThk(id){
	var my_url = $('#txt_Url').val() + 'contact/ThkSubscribe/'+id;
	$('#area_subscribe').load(my_url, function () {
		console.log('thankyou subscribe');
	});
}

function js_subscribeClose(){

	$('#loadPage').show();
	var my_url = $('#txt_Url').val() + 'contact/CloseSubscribe';
	console.log(my_url);
	var dataString = $("#subscribeForm").serialize();
	$.ajax({
		type: "POST",
		url: my_url,
		data: dataString,
		dataType: "html",
		success: function (data) {
			data = jQuery.trim(data);
			$('#id_subscribe').fadeOut(300);
			$('#loadPage').hide();
			
			// alert(data);
			// console.log(data);
		}
	});

	
}


function js_product_order(obj) {
	$('#productForm').submit();
	// console.log($('#txt_UrlNow').val()+' : '+obj);
}

function js_productGroup(product_group){

	if (product_group != 0 && product_group != null) {
		url = $('#txt_Url').val()+'products/'+product_group;
		window.location = url;
	}
}


function js_checkBannerPromotion(){

	var my_url = $('#txt_Url').val() + 'contact/BannerPromotion';
	var dataString = '';

	$('#loadPage').show();
	$.ajax({
		type: "POST",
		url: my_url,
		data: dataString,
		dataType: "html",
		success: function (data) {
			data = jQuery.trim(data);
			console.log(data);
			if (data != 'Fail'){
				js_loadBannerPromotion();
			}

			$('#loadPage').hide();
		}
	});
}

function js_loadBannerPromotion(){
	
	var my_url = $('#txt_Url').val() + 'contact/BannerPromotion';
	$('#area_banner_promotion').load(my_url, function () {
		$('#id_banner_promotion').fadeIn(200);
	});
}

function js_bannerPromotionClose() {

	$('#loadPage').show();
	var my_url = $('#txt_Url').val() + 'contact/CloseBannerPromotion';
	console.log(my_url);
	var dataString = '';
	$.ajax({
		type: "POST",
		url: my_url,
		data: dataString,
		dataType: "html",
		success: function (data) {
			data = jQuery.trim(data);
			$('#id_banner_promotion').fadeOut(300);
			$('#loadPage').hide();

			// alert(data);
			// console.log(data);
		}
	});


}