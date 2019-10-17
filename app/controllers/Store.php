<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Store extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index($action=null,$id=null){

		$language = $this->lang->lang();
		$this->load->model('Object_model_update');

		$data['menu']				= "store";
		$data['sub_menu']		  	= null;
		$data['page']				= "store";
		$data['language']			= $language;

		if($language == 'th'){
			$data['title']		= "Store";
			$data['subject']	= "Store";
		}else if($language == 'en'){
			$data['title']		= "Store";
			$data['subject']	= "Store";
		}

		$data['image_share']		= base_url("img/banner/img-key-01.jpg");
		$data['action']   			= $action;
		$data['id']   				= $id;
		// echo $action;
		
		
			

			

			$this->load->view($language.'/template/header', $data);
			$this->load->view($language.'/page/store',$data);
			$this->load->view($language.'/template/footer',$data);
		

	}
}

?>
