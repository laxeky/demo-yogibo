<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Howtoyogibo extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index($action=null){
		
		$language = $this->lang->lang();
		$this->load->model('Object_model');
		
		$data['menu']				= "howtoyogibo";
		$data['sub_menu']		  	= null;
		$data['page']				= "howtoyogibo";
		$data['language']			= $language;

		if($language == 'th'){
			$data['title']		= "How to yogibo";
			$data['subject']	= "How to yogibo";
		}else if($language == 'en'){
			$data['title']		= "How to yogibo";
			$data['subject']	= "How to yogibo";
		}
		
		$data['image_share']		= base_url("img/banner/img-key-01.jpg");
		$data['action']   			= $action;
		// echo $action;
		
        $this->load->view($language.'/template/header', $data);
        $this->load->view($language.'/page/howto-yogibo',$data);
        $this->load->view($language.'/template/footer',$data);
		

	}
}

?>
