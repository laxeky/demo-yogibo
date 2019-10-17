<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conditions extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index($action=null){
		
		$language = $this->lang->lang();
		$this->load->model('Object_model');
		
		$data['menu']				= "";
		$data['sub_menu']		  	= null;
		$data['page']				= "home";
		$data['language']			= $language;

		if($language == 'th'){
			$data['title']		= "Terms and conditions นโยบายของเรา | P80 Natural Essence";
			$data['subject']	= "Terms and conditions นโยบายของเรา | P80 Natural Essence น้ำลำใยสกัดเข้มข้น 100%";
		}else if($language == 'en'){
			$data['title']		= "Terms and conditions นโยบายของเรา | P80 Natural Essence";
			$data['subject']	= "Terms and conditions นโยบายของเรา | P80 Natural Essence น้ำลำใยสกัดเข้มข้น 100%";
		}else if($language == 'cn'){
			$data['title']		= "Terms and conditions นโยบายของเรา | P80 Natural Essence";
			$data['subject']	= "Terms and conditions นโยบายของเรา | P80 Natural Essence น้ำลำใยสกัดเข้มข้น 100%";
		}
		
		$data['image_share']		= base_url("img/banner/img-key-01.jpg");
		$data['action']   			= $action;
		// echo $action;

		
			$this->load->view($language.'/template/header', $data);
			$this->load->view($language.'/page/conditions',$data);
			$this->load->view($language.'/template/footer',$data);
		

	}
}

?>
