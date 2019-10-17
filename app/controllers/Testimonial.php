<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Testimonial extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index($action=null,$id=null){

		$language = $this->lang->lang();
		$this->load->model('Object_model');

		$data['menu']				= "testimonial";
		$data['sub_menu']		  	= null;
		$data['page']				= "testimonial";
		$data['language']			= $language;

		if($language == 'th'){
			$data['title']		= "ผลลัพธ์จากผู้ใช้จริง น้ำสุขภาพ น้ำลำใยสกัดเข้มข้น 100% เครื่องดื่มบำรุงสุขภาพ P80";
			$data['subject']	= "ผลลัพธ์จากผู้ใช้จริง เครื่องดื่มสุขภาพ น้ำลำใยสกัดเข้มข้น 100% P80Oneshot P80 Natural Essence สกัดจากลำใยเข้มข้น 100% ด้วยการผลิตเอกสิทธิ์เฉพาะ น้ำสุขภาพแท้จริง เป็นกระเช้าของขวัญปีใหม่ให้คนที่คุณรัก";
		}else if($language == 'en'){
			$data['title']		= "ผลลัพธ์จากผู้ใช้จริง น้ำสุขภาพ น้ำลำใยสกัดเข้มข้น 100% เครื่องดื่มบำรุงสุขภาพ P80";
			$data['subject']	= "ผลลัพธ์จากผู้ใช้จริง เครื่องดื่มสุขภาพ น้ำลำใยสกัดเข้มข้น 100% P80Oneshot P80 Natural Essence สกัดจากลำใยเข้มข้น 100% ด้วยการผลิตเอกสิทธิ์เฉพาะ น้ำสุขภาพแท้จริง เป็นกระเช้าของขวัญปีใหม่ให้คนที่คุณรัก";
		}else if($language == 'cn'){
			$data['title']		= "ผลลัพธ์จากผู้ใช้จริง น้ำสุขภาพ น้ำลำใยสกัดเข้มข้น 100% เครื่องดื่มบำรุงสุขภาพ P80";
			$data['subject']	= "ผลลัพธ์จากผู้ใช้จริง เครื่องดื่มสุขภาพ น้ำลำใยสกัดเข้มข้น 100% P80Oneshot P80 Natural Essence สกัดจากลำใยเข้มข้น 100% ด้วยการผลิตเอกสิทธิ์เฉพาะ น้ำสุขภาพแท้จริง เป็นกระเช้าของขวัญปีใหม่ให้คนที่คุณรัก";
		}

		
		$data['image_share']	= base_url("img/banner/img-key-01.jpg");
		$data['action']   		= $action;
		// echo $action;
		$data['id']   			= $id;
		if($id){
			$this->load->view($language.'/ajax/testimonial',$data);
		}else{

			$testimonialRow 	= $this->Object_model->getTestimonialRow();
			$testimonial 		= $this->Object_model->getTestimonialAll($testimonialRow,0,'');

			$data['testimonialRow'] = $testimonialRow;
			$data['testimonial'] 	= $testimonial;


			$vdo = $this->Object_model->getVdo();
			$data['vdoRow'] 	= count($vdo);
			$data['vdo']		= $vdo;

			$this->load->view($language.'/template/header', $data);
			$this->load->view($language.'/page/testimonial',$data);
			$this->load->view($language.'/template/footer',$data);
		}
	}
}

?>
