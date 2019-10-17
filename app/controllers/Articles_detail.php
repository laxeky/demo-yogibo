<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles_detail extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index($action=null,$id=null){

		$language = $this->lang->lang();
		$this->load->model('Object_model');
		
		$data['menu']				= "Articles";
		$data['sub_menu']		  	= null;
		$data['page']				= "home";
		$data['language']			= $language;
		$data['title']				= "P80 Natural Essence";
		$data['subject']			= "P80 Natural Essence is 100% fruit concentrate derived from a unique process under patent to harness the nutritional benefits from bioactive compounds.";
		$data['image_share']		= base_url("img/banner/img-key-01.jpg");
		$data['action']   			= $action;
		// echo $action;

		$this->load->view($language.'/template/header', $data);
		$this->load->view($language.'/page/articles_detail',$data);
		$this->load->view($language.'/template/footer',$data);
	}
}

?>
