<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index($action=null){

		$language = $this->lang->lang();
		// echo $language;
		$this->load->model('Object_model');
		
		$data['menu']				= "home";
		$data['sub_menu']		  	= null;
		$data['page']				= "home";
		$data['language']			= $language;

		if($language == 'th'){
			$data['title']		= "YOGIBO Thailand";
			$data['subject']	= "YOGIBO Thailand";
		}else if($language == 'en'){
			$data['title']		= "YOGIBO Thailand";
			$data['subject']	= "YOGIBO Thailand";
		}
		
		$data['image_share']	= base_url("img/banner/img-key-01.jpg");
		$data['action']   		= $action;
		// echo $action;

		if($action == "AddRegister"){

			$data = $this->Object_model->saveRegister();
			echo $data;


		}else if($action === "search"){

			$this->load->view($language.'/ajax/search_products');

		}else{

			$user_id = $this->session->userdata('Yogibo_UserID');

			$banner	 = $this->Object_model->getBanner();
			$data['banner'] 	= $banner;
			$data['bannerRow'] 	= count($banner);

			$product = $this->Object_model->getProductHome();
			$data['product'] 	= $product;
			$data['productRow'] = count($product);

			$vdo = $this->Object_model->getVdoHome();
			$data['vdo'] 		= $vdo;
			$data['vdoRow'] 	= count($vdo);

			$blog = $this->Object_model->getBlogHome();
			$data['blog'] 	 	= $blog;
			$data['blogRow'] 	= count($blog);

			$event = $this->Object_model->getEventHome();
			$data['event'] 		= $event;
			$data['eventRow'] 	= count($event);

			$this->load->view($language.'/template/header', $data);
			$this->load->view($language.'/page/home',$data);
			$this->load->view($language.'/template/footer',$data);

		}
	}
}

?>
