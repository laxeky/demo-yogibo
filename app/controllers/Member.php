<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index($action=null,$id=null){

		$language = $this->lang->lang();
		$this->load->model('Object_model');

		$data['menu']			= "MEMBER";
		$data['sub_menu']		= null;
		$data['page']			= "member";
		$data['language']		= $language;
		$data['subject']		= "YOGIBO";
		$data['image_share']	= base_url("img/banner/img-key-01.jpg");

		$data['action']   = $action;
		// echo $action;
		if($action == "history"){

			$user_id = $this->session->userdata('YOGIBO_UserID');
			if(empty($user_id)){
				redirect('home');
			}

			$order 				= $this->Object_model->orderHistory($user_id);
			$data['order'] 		= $order;
			$data['orderRow'] 	= count($order);

			$data['title']		= "ประวัติการสั่งซื้อ | YOGIBO";

			if($id){

				$info = $this->Object_model->getOrderInfo($id);
				$data['rs'] = $info;

				$this->load->view($language.'/template/header', $data);
				$this->load->view($language.'/page/member-order',$data);
				$this->load->view($language.'/template/footer',$data);
				
			}else{

				$this->load->view($language.'/template/header', $data);
				$this->load->view($language.'/page/member-history',$data);
				$this->load->view($language.'/template/footer',$data);
			}

		}else if($action == "wishlist"){

			$user_id = $this->session->userdata('YOGIBO_UserID');
			if(empty($user_id)){
				redirect('home');
			}

			$data['title'] = "wishlist | YOGIBO";
			$product = $this->Object_model->getWishlist($user_id);
			$data['product'] 	= $product;
			$data['productRow'] = count($product);

			$this->load->view($language.'/template/header', $data);
			$this->load->view($language.'/page/member-wishlist',$data);
			$this->load->view($language.'/template/footer',$data);
            
		}else if($action == "login"){

			$data = $this->Object_model->login();
			echo $data;

		}else if($action == "logout"){

			$this->session->sess_destroy();
			redirect('home');
			// echo true;

		}else if($action == "login_facebook"){

			$data = $this->Object_model->login_facebook();
			echo "OK";
		
		}else if($action == "changePassword"){

			$user_id = $this->session->userdata('YOGIBO_UserID');
			if(empty($user_id)){
				redirect('home');
			}else{
				$this->load->view($language.'/ajax/member_changepassword',$data);
			}

		}else if($action == "info_view"){

			$user_id = $this->session->userdata('YOGIBO_UserID');
			if(empty($user_id)){
				redirect('home');
			}

			$user 	 = $this->Object_model->getUserInfo($user_id);
			$data['user']  = $user;
			$this->load->view($language.'/ajax/member_address_view',$data);
		
		}else if($action == "info_bill"){

			$user_id = $this->session->userdata('YOGIBO_UserID');
			if(empty($user_id)){
				redirect('home');
			}

			$user  = $this->Object_model->getUserInfo($user_id);
			$data['user'] = $user;
			$this->load->view($language.'/ajax/member_address_bill',$data);

		}else if($action == "message"){

			$user_id = $this->session->userdata('YOGIBO_UserID');
			$email   = $this->session->userdata('YOGIBO_Email');
			$data['user_id'] = $user_id;
			$data['email']	 = $email;
			$this->load->view($language.'/ajax/message',$data);

		}else if($action == "add_message"){

			$data = $this->Object_model->addMessage();
			if($data === true){
				$this->load->view($language.'/ajax/message_ok');	
			}else{
				$this->load->view($language.'/ajax/message_false');	
			}

		}else if($action == "email_message"){

			$data_email["id"] = 8;
			$this->load->view("th/email/email-message",$data_email,FALSE);

		}else if($action == "editInfo"){

			$user_id = $this->session->userdata('YOGIBO_UserID');
			if(empty($user_id)){
				redirect('home');
			}
			// echo 'aaa';
			$info  = $this->Object_model->getUserInfo($user_id);
			// print_r($info);

			$txt_FirstName 	= $info['_register_FirstName'];
			$txt_LastName 	= $info['_register_LastName'];
			$txt_Phone 		= $info['_register_Phone'];
			$txt_Email 		= $info['_register_Email'];
			$txt_No 		= $info['_register_No'];
			$txt_Moo		= $info['_register_Moo'];
			$txt_Village	= $info['_register_Village'];
			$txt_Soi 		= $info['_register_Soi'];
			$txt_Road		= $info['_register_Road'];
			$_province 		= $info['_register_Province'];
			$_ampure 		= $info['_register_Ampure'];
			$_tumbon 		= $info['_register_Tumbon'];
			$txt_Postcode 	= $info['_register_Postcode'];
			$txt_Birthday 	= $info['_register_Birthday'];
			$txt_Gender 	= $info['_register_Gender'];
			
			$data['txt_FirstName'] 	= $txt_FirstName;
			$data['txt_LastName'] 	= $txt_LastName;
			$data['txt_Phone'] 		= $txt_Phone;
			$data['txt_Email'] 		= $txt_Email;
			$data['txt_No'] 		= $txt_No;
			$data['txt_Moo'] 		= $txt_Moo;
			$data['txt_Soi'] 		= $txt_Soi;
			$data['txt_Road'] 		= $txt_Road;
			$data['txt_Postcode'] 	= $txt_Postcode;
			$data['txt_Province'] 	= $_province;
			$data['txt_Ampure'] 	= $_ampure;
			$data['txt_Tumbon'] 	= $_tumbon;
			$data['txt_Birthday'] 	= $txt_Birthday;
			$data['txt_Gender'] 	= $txt_Gender;

			// province
			$province = $this->Object_model->getProvince();
			$data['province_row'] = sizeof($province);
			$data['province'] = $province;

			// ampure
			$ampure = $this->Object_model->getAmpure($_province);
			$data['ampure_row'] = sizeof($ampure);
			$data['ampure'] = $ampure;

			// tumbon
			$tumbon = $this->Object_model->getTumbon($_ampure);
			$data['tumbon_row'] = sizeof($tumbon);
			$data['tumbon'] = $tumbon;

			$this->load->view($language.'/ajax/member_address_edit',$data);

		}else if($action == "editBill"){

			$user_id = $this->session->userdata('YOGIBO_UserID');
			if(empty($user_id)){
				redirect('home');
			}
			$info  = $this->Object_model->getUserInfo($user_id);

			// $txt_Billing 	= $info['_register_Billing'];
			$txt_BillFirstName 	= $info['_register_BillFirstName'];
			$txt_BillLastName 	= $info['_register_BillLastName'];
			$txt_BillPhone 		= $info['_register_BillPhone'];
			$txt_BillEmail 		= $info['_register_BillEmail'];
			$txt_BillNo 		= $info['_register_BillNo'];
			$txt_BillMoo		= $info['_register_BillMoo'];
			$txt_BillSoi 		= $info['_register_BillSoi'];
			$txt_BillRoad		= $info['_register_BillRoad'];
			$_Billprovince 		= $info['_register_BillProvince'];
			$_Billampure 		= $info['_register_BillAmpure'];
			$_Billtumbon 		= $info['_register_BillTumbon'];
			$txt_BillPostcode 	= $info['_register_BillPostcode'];

			// $data['txt_Billing'] 		= $txt_Billing;
			$data['txt_BillFirstName'] 	= $txt_BillFirstName;
			$data['txt_BillLastName'] 	= $txt_BillLastName;
			$data['txt_BillPhone'] 		= $txt_BillPhone;
			$data['txt_BillEmail'] 		= $txt_BillEmail;
			$data['txt_BillNo'] 		= $txt_BillNo;
			$data['txt_BillMoo'] 		= $txt_BillMoo;
			$data['txt_BillSoi'] 		= $txt_BillSoi;
			$data['txt_BillRoad'] 		= $txt_BillRoad;
			$data['txt_BillPostcode'] 	= $txt_BillPostcode;
			$data['txt_Province'] 		= $_Billprovince;
			$data['txt_Ampure'] 		= $_Billampure;
			$data['txt_Tumbon'] 		= $_Billtumbon;

			// province
			$province = $this->Object_model->getProvince();
			$data['province_row'] = sizeof($province);
			$data['province'] = $province;

			// ampure
			$ampure = $this->Object_model->getAmpure($_Billprovince);
			$data['ampure_row'] = sizeof($ampure);
			$data['ampure'] = $ampure;

			// tumbon
			$tumbon = $this->Object_model->getTumbon($_Billampure);
			$data['tumbon_row'] = sizeof($tumbon);
			$data['tumbon'] = $tumbon;
			

			$this->load->view($language.'/ajax/member_address_bill_edit',$data);

		}else if($action == 'email_test'){

			$data_email["link"] = site_url("register/token/2");
			$this->load->view($language.'/email/email_forgetpassword',$data_email);

		}else if($action == 'add_wishlist'){

			$user_id = $this->session->userdata('YOGIBO_UserID');
			if($user_id){
				$product_id = $this->db->escape_str($this->input->post('product_id'));
				$data = $this->Object_model->addWishlist($product_id ,$user_id);
				echo $data;
			}else{
				echo "Login";
			}

		}else{

			$user_id = $this->session->userdata('YOGIBO_UserID');
			if(empty($user_id)){
				redirect('home');
			}

			$user 	 = $this->Object_model->getUserInfo($user_id);
			$data['user']  = $user;
			$data['title'] = "บัญชีของฉัน | YOGIBO";
			$this->load->view($language.'/template/header', $data);
			$this->load->view($language.'/page/member-info',$data);
			$this->load->view($language.'/template/footer',$data);
		}

	}
}

?>
