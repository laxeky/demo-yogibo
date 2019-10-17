<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Comingsoon extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index($action=null){

		
		$data['menu']				= "home";
		$data['sub_menu']		  	= null;
		$data['page']				= "home";
		$data['language']			= "th";
		$data['title']			= "YOGIBO Thailand";
		$data['subject']		= "YOGIBO Thailand";
		$data['image_share']	= base_url("img/comingsoon/img-01.jpg");
		$data['action']   		= $action;
		// echo $action;

		$this->load->view('comingsoon',$data);

	}
}

?>
