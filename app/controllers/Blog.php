<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Blog extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index($action=null,$id=null){

		$language = $this->lang->lang();
		$this->load->model('Object_model_update');

		$data['menu']				= "blog";
		$data['sub_menu']		  	= null;
		$data['page']				= "blog";
		$data['language']			= $language;

		if($language == 'th'){
			$data['title']		= "blog";
			$data['subject']	= "blog";
		}else if($language == 'en'){
			$data['title']		= "blog";
			$data['subject']	= "blog";
		}

		$data['image_share']		= base_url("img/banner/img-key-01.jpg");
		$data['action']   			= $action;
		$data['id']   				= $id;
		# echo $action;
		
		if($action=="view"){
			$page = "blog_view";
			$blog 	= $this->Object_model_update->getBlogView($id);
			
			$data['blogRow'] 	= count($blog);
			$data['rs'] 		= $blog;
			
			$blogImg = $this->Object_model_update->getImageBlogView($id);
			$data['blogImg'] = $blogImg;
			$data['blogImgRow'] = count($blogImg);
			
			
		}else{
			$page = "blog";
			$blog 	= $this->Object_model_update->getBlog();
			
			$data['blogRow'] 	= count($blog);
			$data['blog'] 		= $blog;
		}
		
			
		
			$this->load->view($language.'/template/header', $data);
			$this->load->view($language.'/page/'.$page,$data);
			$this->load->view($language.'/template/footer',$data);
		

	}
}

?>
