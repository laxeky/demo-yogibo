<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Event extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index($action=null,$id=null){

		$language = $this->lang->lang();
		$this->load->model('Object_model_update');

		$data['menu']				= "event";
		$data['sub_menu']		  	= null;
		$data['page']				= "event";
		$data['language']			= $language;

		if($language == 'th'){
			$data['title']		= "Event";
			$data['subject']	= "Event";
		}else if($language == 'en'){
			$data['title']		= "Event";
			$data['subject']	= "Event";
		}

		$data['image_share']		= base_url("img/banner/img-key-01.jpg");
		$data['action']   			= $action;
		$data['id']   				= $id;
		# echo $action;
		
		if($action=="view"){
			$page = "event_view";
			$event 	= $this->Object_model_update->getEventView($id);
			
			$data['eventRow'] 	= count($event);
			$data['rs'] 		= $event;
			
			$eventImg = $this->Object_model_update->getImageEventView($id);
			$data['eventImg'] = $eventImg;
			$data['eventImgRow'] = count($eventImg);
			
			
		}else{
			$page = "event";
			$event 	= $this->Object_model_update->getEvent();
			
			$data['eventRow'] 	= count($event);
			$data['event'] 		= $event;
		}
		
			
		
			$this->load->view($language.'/template/header', $data);
			$this->load->view($language.'/page/'.$page,$data);
			$this->load->view($language.'/template/footer',$data);
		

	}
}

?>
