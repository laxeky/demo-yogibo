<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	
	public function index($action=null, $id=null){

		$language = $this->lang->lang();
		$this->load->model('Object_model');

		$data['menu']		= "HOME";
		$data['sub_menu']	= null;
		$data['page']		= "home";
		$data['language']	= $language;
		$data['title']		= "YOGIBO";
		$data['subject']	= "YOGIBO";
		$data['image_share']= base_url("img/banner/img-key-01.jpg");
	
		$data['action']   	= $action;
		$data['id'] 		= $id;
		// echo $action;
		if($action == "Login"){
			$this->load->view($language.'/ajax/member_login',$data);
			
		}else if($action == "Register"){
			$this->load->view($language.'/ajax/member_register',$data);
		
		}else if($action == "Forgetpassword_form"){
			$this->load->view($language.'/ajax/member_forgetpassword',$data);

		}else if($action == "Thankyou"){
			$this->load->view($language.'/ajax/thank_from',$data);
		
		}else if($action == "AddRegister"){
			
			$data = $this->Object_model->saveRegister();
			if($data == true){

				$_email    = $this->db->escape_str($this->input->post('txt_Email'));
				$_password = $this->db->escape_str($this->input->post('txt_Password'));
				$this->Object_model->login($_email, $_password);
			}
			echo $data;

		}else if($action == "UpdateRegister"){

			$user_id = $this->session->userdata('YOGIBO_UserID');
			if(empty($user_id)){
				redirect('home');
			}else{
				$data = $this->Object_model->UpdateRegister($user_id);
				echo $data;
			}

		}else if($action == "UpdateBill"){

			$user_id = $this->session->userdata('YOGIBO_UserID');
			if($user_id){
				$data = $this->Object_model->UpdateBill($user_id);
				echo $data;
			}

		}else if($action == "UpdatePassword"){

			$user_id = $this->session->userdata('YOGIBO_UserID');
			if($user_id){
				$data = $this->Object_model->UpdatePassword($user_id);
				echo $data;
			}

		}else if($action == "forgetpassword"){
			
			$_email = $this->input->post('txt_forgetEmail');
			$data = $this->Object_model->resetPassword($_email);
			echo $data;

		}else if($action == "token"){

			$data['token'] = $id;
			$status = $this->Object_model->checkToken($id);
			// print_r($status);
			// $status['_forgetpassword_ID'] = 1;
			if($status['_forgetpassword_ID']){
				$this->load->view($language.'/template/header',$data);
				$this->load->view($language.'/page/resetpassword',$data);
				$this->load->view($language.'/template/footer');
			}else{
				redirect('home');
			}

		}else if($action == "update_password"){

			$token 	= $this->input->post('txt_Token');
			$data 	= $this->Object_model->getNewPassword($token);
			echo $data;
			
		}else{

			// $_browser = $this->Object_model->chkBrowser("Line");
			// $this->load->view('template/header', $data);
			// $this->load->view('page/home',$data);
			// $this->load->view('template/footer',$data);
		}

	}
}

?>
