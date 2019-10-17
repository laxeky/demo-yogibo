<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Carts extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index($action=null ,$id=null){

		$language = $this->lang->lang();
		$this->load->model('Object_model');

		$data['menu']				= "HOME";
		$data['sub_menu']			= null;
		$data['page']				= "home";
		$data['language']			= $language;
		
		$data['subject']			= "YOGIBO";
		$data['image_share']		= base_url("img/banner/img-key-01.jpg");
		$data['action']   			= $action;
		// echo $action;
		if($action == "step2"){

			// print_r($_SESSION);
			if(empty($this->session->userdata('session_carts_delivery'))){
				redirect('products');
			}

			$data['title']			= "ข้อมูลการจัดส่ง | YOGIBO";
			$session_firstname 		= $this->session->userdata('session_txt_FirstName');
			if($session_firstname != null){

				$txt_FirstName 		= !empty($this->session->userdata('session_txt_FirstName'))?$this->session->userdata('session_txt_FirstName'):"";
				$txt_LastName 		= !empty($this->session->userdata('session_txt_LastName'))?$this->session->userdata('session_txt_LastName'):"";
				$txt_Phone 			= !empty($this->session->userdata('session_txt_Phone'))?$this->session->userdata('session_txt_Phone'):"";
				$txt_Email 			= !empty($this->session->userdata('session_txt_Email'))?$this->session->userdata('session_txt_Email'):"";
				$txt_No 			= !empty($this->session->userdata('session_txt_No'))?$this->session->userdata('session_txt_No'):"";
				$txt_Moo			= !empty($this->session->userdata('session_txt_Moo'))?$this->session->userdata('session_txt_Moo'):"";
				$txt_Soi 			= !empty($this->session->userdata('session_txt_Soi'))?$this->session->userdata('session_txt_Soi'):"";
				$txt_Road			= !empty($this->session->userdata('session_txt_Road'))?$this->session->userdata('session_txt_Road'):"";
				$_province 			= !empty($this->session->userdata('session_txt_Province'))?$this->session->userdata('session_txt_Province'):"";
				$_ampure 			= !empty($this->session->userdata('session_txt_Ampure'))?$this->session->userdata('session_txt_Ampure'):"";
				$_tumbon 			= !empty($this->session->userdata('session_txt_Tumbon'))?$this->session->userdata('session_txt_Tumbon'):"";
				$txt_Postcode 		= !empty($this->session->userdata('session_txt_Postcode'))?$this->session->userdata('session_txt_Postcode'):"";

				$txt_Billing 		= !empty($this->session->userdata('session_txt_Billing'))?$this->session->userdata('session_txt_Billing'):"";

				$txt_BillFirstName 	= !empty($this->session->userdata('session_txt_BillFirstName'))?$this->session->userdata('session_txt_BillFirstName'):"";
				$txt_BillLastName 	= !empty($this->session->userdata('session_txt_BillLastName'))?$this->session->userdata('session_txt_BillLastName'):"";
				$txt_BillPhone 		= !empty($this->session->userdata('session_txt_BillPhone'))?$this->session->userdata('session_txt_BillPhone'):"";
				$txt_BillEmail 		= !empty($this->session->userdata('session_txt_BillEmail'))?$this->session->userdata('session_txt_BillEmail'):"";
				$txt_BillNo 		= !empty($this->session->userdata('session_txt_BillNo'))?$this->session->userdata('session_txt_BillNo'):"";
				$txt_BillMoo		= !empty($this->session->userdata('session_txt_BillMoo'))?$this->session->userdata('session_txt_BillMoo'):"";
				$txt_BillSoi 		= !empty($this->session->userdata('session_txt_BillSoi'))?$this->session->userdata('session_txt_BillSoi'):"";
				$txt_BillRoad		= !empty($this->session->userdata('session_txt_BillRoad'))?$this->session->userdata('session_txt_BillRoad'):"";
				$_Billprovince 		= !empty($this->session->userdata('session_txt_BillProvince'))?$this->session->userdata('session_txt_BillProvince'):"";
				$_Billampure 		= !empty($this->session->userdata('session_txt_BillAmpure'))?$this->session->userdata('session_txt_BillAmpure'):"";
				$_Billtumbon 		= !empty($this->session->userdata('session_txt_BillTumbon'))?$this->session->userdata('session_txt_BillTumbon'):"";
				$txt_BillPostcode 	= !empty($this->session->userdata('session_txt_BillPostcode'))?$this->session->userdata('session_txt_BillPostcode'):"";
				

			}else{

				$user_id 			= $this->session->userdata('YOGIBO_UserID');
				$info 				= $this->Object_model->getUserInfo($user_id);

				$txt_FirstName 		= $info['_register_FirstName'];
				$txt_LastName 		= $info['_register_LastName'];
				$txt_Phone 			= $info['_register_Phone'];
				$txt_Email 			= $info['_register_Email'];
				$txt_No 			= $info['_register_No'];
				$txt_Moo			= $info['_register_Moo'];
				$txt_Village		= $info['_register_Village'];
				$txt_Soi 			= $info['_register_Soi'];
				$txt_Road			= $info['_register_Road'];
				$_province 			= $info['_register_Province'];
				$_ampure 			= $info['_register_Ampure'];
				$_tumbon 			= $info['_register_Tumbon'];
				$txt_Postcode 		= $info['_register_Postcode'];

				$txt_Billing 		= $info['_register_Billing'];

				$txt_BillFirstName 	= $info['_register_BillFirstName'];
				$txt_BillLastName 	= $info['_register_BillLastName'];
				$txt_BillPhone 		= $info['_register_BillPhone'];
				$txt_BillEmail 		= $info['_register_BillEmail'];
				$txt_BillNo 		= $info['_register_BillNo'];
				$txt_BillMoo		= $info['_register_BillMoo'];
				// $txt_BillVillage	= $info['_register_BillVillage'];
				$txt_BillSoi 		= $info['_register_BillSoi'];
				$txt_BillRoad		= $info['_register_BillRoad'];
				$_Billprovince 		= $info['_register_BillProvince'];
				$_Billampure 		= $info['_register_BillAmpure'];
				$_Billtumbon 		= $info['_register_BillTumbon'];
				$txt_BillPostcode 	= $info['_register_BillPostcode'];

			}


			$data['txt_FirstName'] 		= $txt_FirstName;
			$data['txt_LastName'] 		= $txt_LastName;
			$data['txt_Phone'] 			= $txt_Phone;
			$data['txt_Email'] 			= $txt_Email;
			$data['txt_No'] 			= $txt_No;
			$data['txt_Moo'] 			= $txt_Moo;
			$data['txt_Soi'] 			= $txt_Soi;
			$data['txt_Road'] 			= $txt_Road;
			$data['txt_Postcode'] 		= $txt_Postcode;
			$data['txt_Province'] 		= $_province;
			$data['txt_Ampure'] 		= $_ampure;
			$data['txt_Tumbon'] 		= $_tumbon;

			$data['txt_Billing'] 		= $txt_Billing;

			$data['txt_BillFirstName'] 	= $txt_BillFirstName;
			$data['txt_BillLastName'] 	= $txt_BillLastName;
			$data['txt_BillPhone'] 		= $txt_BillPhone;
			$data['txt_BillEmail'] 		= $txt_BillEmail;
			$data['txt_BillNo'] 		= $txt_BillNo;
			$data['txt_BillMoo'] 		= $txt_BillMoo;
			$data['txt_BillSoi'] 		= $txt_BillSoi;
			$data['txt_BillRoad'] 		= $txt_BillRoad;
			$data['txt_BillPostcode'] 	= $txt_BillPostcode;
			$data['txt_BillProvince'] 	= $_Billprovince;
			$data['txt_BillAmpure'] 	= $_Billampure;
			$data['txt_BillTumbon'] 	= $_Billtumbon;
			
			// province
			$province = $this->Object_model->getProvince();
			$data['province_row'] 	= sizeof($province);
			$data['province'] 		= $province;

			// ampure
			$ampure = $this->Object_model->getAmpure($_province);
			$data['ampure_row'] 	= sizeof($ampure);
			$data['ampure'] 		= $ampure;

			// tumbon
			$tumbon = $this->Object_model->getTumbon($_ampure);
			$data['tumbon_row'] 	= sizeof($tumbon);
			$data['tumbon'] 		= $tumbon;


			// ampure bill
			$ampureBill = $this->Object_model->getAmpure($_Billprovince);
			// echo $_Billampure;
			// print_r($ampureBill);
			$data['ampureBill_row'] = sizeof($ampureBill);
			$data['ampureBill'] 	= $ampureBill;


			// tumbon bill
			$tumbonBill = $this->Object_model->getTumbon($_Billampure);
			$data['tumbonBill_row'] = sizeof($tumbonBill);
			$data['tumbonBill'] 	= $tumbonBill;

			
            $this->load->view($language.'/template/header', $data);
			$this->load->view($language.'/page/carts-step2',$data);
            $this->load->view($language.'/template/footer',$data);
            
		}else if($action == "step3"){
			
			$data['title']	= "การชำระเงิน | YOGIBO";

			$session_firstname 	= $this->session->userdata('session_txt_FirstName');
			if($session_firstname != null){
				$txt_WayPayment = !empty($this->session->userdata('session_txt_WayPayment'))?$this->session->userdata('session_txt_WayPayment'):"2";
			}else{
				redirect('products');
			}
			// $txt_WayPayment = '1';

			$data['txt_WayPayment'] = $txt_WayPayment;

			$bank = $this->Object_model->getBank();
			$data['bank'] = $bank;
			$data['bankRow'] = count($bank);

			$this->load->view($language.'/template/header', $data);
			$this->load->view($language.'/page/carts-step3',$data);
			$this->load->view($language.'/template/footer',$data);

		}else if($action == "step4"){

			$session_id = $this->session->userdata('_session_id');
			$session_payment = $this->session->userdata('session_payment');
			$bid = isset($_GET['bid'])?$_GET['bid']:null;
			if($bid != null){
				$order_id = base64_decode($_GET['bid']);
				// echo $order_id;
				// $order_id = ($_GET['bid']);
				// update status 
				$this->Object_model->updateStatusPaypal($order_id);
			}else{
				$order_id = $this->session->userdata('session_order_id');
			}
			
			if($order_id){
				$info = $this->Object_model->getOrderInfo($order_id);
				$data['rs'] = $info;
			}else{
				redirect('home');
			}


			$user_id = $this->session->userdata('YOGIBO_UserID');
			// if(!empty($user_id)){
			// 	$this->Object_model->check_Rank($user_id);
			// }
			
			$data['title']	= "สรุปรายการสั่งซื้อ | YOGIBO";
			$this->load->view($language.'/template/header', $data);
			$this->load->view($language.'/page/carts-step4',$data);
			$this->load->view($language.'/template/footer',$data);

		}else if($action == "paypal"){

			$data['title']	= "จ่ายเงินด้วย PAYPAL | YOGIBO";
			$this->load->view($language.'/template/header', $data);
			$this->load->view($language.'/page/carts-paypal',$data);
			$this->load->view($language.'/template/footer',$data);

		}else if($action == "saveCarts"){

			$data = $this->Object_model->saveCarts();
			echo $data;
		
		}else if($action == "addCarts"){

			$data = $this->Object_model->addCarts($id);
			if($data == "ok"){
				$unitNumber = $this->Object_model->countCarts();
				echo $unitNumber;
			}else{
				echo "fail";
			}

		}else if($action == "addCarts2"){

			$data = $this->Object_model->cartsStep2();
			echo $data;

		}else if($action == "sumCarts"){

			$unitNumber = $this->Object_model->countCarts();
			echo $unitNumber;

		}else if($action == "updateCarts"){

			$unit = $this->input->post('txt_Unit');
			$data = $this->Object_model->cartsUpdateUnit($id,$unit);
			echo $data;

		}else if($action == "cartsList"){

			$carts = $this->Object_model->getCartsList();
			$data['carts'] = $carts;
			$data['cartsRow'] = count($carts);
			// echo $carts;
			$this->load->view($language.'/ajax/carts_list',$data);

		}else if($action == "cartsSummary"){

			$carts = $this->Object_model->getCartsList();
			$data['carts'] = $carts;
			$data['cartsRow'] = count($carts);
			$data['hideButton'] = $id;
			// echo $carts;
			$this->load->view($language.'/ajax/carts_summary',$data);
		
		}else if($action == "cartsDelete"){

			$data = $this->Object_model->cartsDelete($id);
			echo $data;
		
		}else if($action == "addTransport"){
			
			$sessiondata = array(
				'session_carts_delivery'  => $id
			);
			$this->session->set_userdata($sessiondata);
			echo "OK";

		}else if($action == "ampure"){

			$ampure = $this->Object_model->getAmpure($id);
			$data['ampure_row'] = sizeof($ampure);
			$data['ampure'] = $ampure;
			$this->load->view($language.'/ajax/ampure',$data);

		}else if($action == "tumbon"){

			$tumbon = $this->Object_model->getTumbon($id);
			$data['tumbon_row'] = sizeof($tumbon);
			$data['tumbon'] 	= $tumbon;
			$this->load->view($language.'/ajax/tumbon',$data);

		}else if($action == "ampure_bill"){

			$ampure = $this->Object_model->getAmpure($id);
			$data['ampure_row'] = sizeof($ampure);
			$data['ampure'] = $ampure;
			$this->load->view($language.'/ajax/ampure_bill',$data);

		}else if($action == "tumbon_bill"){

			$tumbon = $this->Object_model->getTumbon($id);
			$data['tumbon_row'] = sizeof($tumbon);
			$data['tumbon'] 	= $tumbon;
			$this->load->view($language.'/ajax/tumbon_bill',$data);

		}else if($action == "postcode"){

			$post_code 	= $this->Object_model->getPostcode($id);
			echo $post_code;

		}else if($action == "bankInfo"){
			
			$bank = $this->Object_model->getBank($id);
			$data['bank_name'] 	= $bank[0]['_product_bank_Title'];
			$data['bank_title'] = $bank[0]['_product_bank_Name'];
			$data['bank_no'] 	= $bank[0]['_product_bank_No'];
			$data['bank_type'] 	= $bank[0]['_product_bank_Type'];
			$this->load->view($language.'/ajax/bank_info',$data);

		}else if($action == "emailOrder"){

			$data_email["id"] 	= 6;
			$message 			= $this->load->view($language.'/email/email-order',$data_email);
			  
		}else{

			$delivery = $this->Object_model->getDelivery();
			$data['delivery'] = $delivery;
			$data['deliveryRow'] = count($delivery);

			if($language == 'th'){
				$data['title']		= "ตระกร้าสินค้า โปรดตรวจสินค้าของคุณ | YOGIBO";
				$data['subject']	= "ตระกร้าสินค้า เครื่องดื่มบำรุงสุขภาพ น้ำลำใยสกัด 100% YOGIBO";
			}else if($language == 'en'){
				$data['title']		= "ตระกร้าสินค้า โปรดตรวจสินค้าของคุณ | YOGIBO";
				$data['subject']	= "ตระกร้าสินค้า เครื่องดื่มบำรุงสุขภาพ น้ำลำใยสกัด 100% YOGIBO";
			}else if($language == 'cn'){
				$data['title']		= "ตระกร้าสินค้า โปรดตรวจสินค้าของคุณ | YOGIBO";
				$data['subject']	= "ตระกร้าสินค้า เครื่องดื่มบำรุงสุขภาพ น้ำลำใยสกัด 100% YOGIBO";
			}
			

			$session_carts_delivery = $this->session->userdata('session_carts_delivery');
			$data['txt_SelectTransport'] = $session_carts_delivery;
			
			$this->load->view($language.'/template/header', $data);
			$this->load->view($language.'/page/carts',$data);
			$this->load->view($language.'/template/footer',$data);

		}

	}
}

?>
