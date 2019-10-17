<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Faq extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index($action=null){

		$language = $this->lang->lang();
		$this->load->model('Object_model');

		$data['menu']				= "faq";
		$data['sub_menu']		  	= null;
		$data['page']				= "faq";
		$data['language']			= $language;

		if($language == 'th'){
			$data['title']		= "FAQ ตอบคำถามพบบ่อย | P80OneShot Natural Essence";
			$data['subject']	= "FAQ | P80 Natural Essence is 100% fruit concentrate derived from a unique process under patent to harness the nutritional benefits from bioactive compounds.";
		}else if($language == 'en'){
			$data['title']		= "FAQ ตอบคำถามพบบ่อย | P80OneShot Natural Essence";
			$data['subject']	= "FAQ | P80 Natural Essence is 100% fruit concentrate derived from a unique process under patent to harness the nutritional benefits from bioactive compounds.";
		}else if($language == 'cn'){
			$data['title']		= "FAQ ตอบคำถามพบบ่อย | P80OneShot Natural Essence";
			$data['subject']	= "FAQ | P80 Natural Essence is 100% fruit concentrate derived from a unique process under patent to harness the nutritional benefits from bioactive compounds.";
		}

		$data['image_share']		= base_url("img/banner/img-key-01.jpg");
		$data['action']   			= $action;
		// echo $action;
		
		$faq = $this->Object_model->getFaq();
		$data['faq'] 	= $faq;
		$data['faqRow'] = count($faq);
		
		$this->load->view($language.'/template/header', $data);
		$this->load->view($language.'/page/faq',$data);
		$this->load->view($language.'/template/footer',$data);
		

	}
}

?>
