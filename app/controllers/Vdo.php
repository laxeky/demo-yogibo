<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Vdo extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index($action=null,$id=null){
		
		$language = $this->lang->lang();
		$this->load->model('Object_model');
		
		$data['menu']				= "vdo";
		$data['sub_menu']		  	= null;
		$data['page']				= "vdo";
		$data['language']			= $language;
		$data['id']					= $id;

		$img_share = base_url("img/banner/img-key-01.jpg");

		if($action != null){
			
			$vdo_detail = $this->Object_model->getVdoDetail($action);
			$_title 	= $vdo_detail['_vdo_Title'];
			$_subject 	= $vdo_detail['_vdo_Title'];
			$_img		= $vdo_detail['_vdo_Image'];

			$data['title']		= $_title;
			$data['subject']	= $this->Object_model->getStringNormal($_subject);
			$img_share 			= base_url('myAdmin/upload/_vdo/'.$_img);

		}else if($language == 'th'){
			$data['title']		= "VDO yogibo";
			$data['subject']	= "VDO yogibo";
		}else if($language == 'en'){
			$data['title']		= "VDO yogibo";
			$data['subject']	= "VDO yogibo";
		}
		
		$data['image_share']		= $img_share;
		$data['action']   			= $action;
		// echo $action;

		$vdo = $this->Object_model->getVdo();
		$data['vdo'] 	= $vdo;
		$data['vdoRow'] = count($vdo);
		
		$this->load->view($language.'/template/header', $data);
		$this->load->view($language.'/page/vdo',$data);
		$this->load->view($language.'/template/footer',$data);
		

	}
}

?>
