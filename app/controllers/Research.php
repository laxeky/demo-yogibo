<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Research extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index($action=null){

		$language = $this->lang->lang();
		$this->load->model('Object_model');

		$data['menu']				= "research";
		$data['sub_menu']		  	= null;
		$data['page']				= "research";
		$data['language']			= $language;

		if($language == 'th'){
			$data['title']		= "ผลการวิจัย น้ำสุขภาพ น้ำลำใยสกัดเข้มข้น 100% เครื่องดื่มบำรุงสุขภาพ P80";
			$data['subject']	= "ผลการวิจัย น้ำลำใยสกัดเข้มข้น 100% เครื่องดื่มบำรุงสุขภาพ | P80 Natural Essence P80 OneShot Natural Essence สกัดจากลำใยเข้มข้น 100% ด้วยการผลิตเอกสิทธิ์เฉพาะ น้ำสุขภาพแท้จริง";
		}else if($language == 'en'){
			$data['title']		= "ผลการวิจัย น้ำสุขภาพ น้ำลำใยสกัดเข้มข้น 100% เครื่องดื่มบำรุงสุขภาพ P80";
			$data['subject']	= "ผลการวิจัย น้ำลำใยสกัดเข้มข้น 100% เครื่องดื่มบำรุงสุขภาพ | P80 Natural Essence P80 OneShot Natural Essence สกัดจากลำใยเข้มข้น 100% ด้วยการผลิตเอกสิทธิ์เฉพาะ น้ำสุขภาพแท้จริง";
		}else if($language == 'cn'){
			$data['title']		= "ผลการวิจัย น้ำสุขภาพ น้ำลำใยสกัดเข้มข้น 100% เครื่องดื่มบำรุงสุขภาพ P80";
			$data['subject']	= "ผลการวิจัย น้ำลำใยสกัดเข้มข้น 100% เครื่องดื่มบำรุงสุขภาพ | P80 Natural Essence P80 OneShot Natural Essence สกัดจากลำใยเข้มข้น 100% ด้วยการผลิตเอกสิทธิ์เฉพาะ น้ำสุขภาพแท้จริง";
		}

		
		$data['image_share']	= base_url("img/banner/img-key-01.jpg");
		$data['action']   		= $action;
		// echo $action;
		
		$this->load->view($language.'/template/header', $data);
		$this->load->view($language.'/page/research',$data);
		$this->load->view($language.'/template/footer',$data);
		

	}
}

?>
