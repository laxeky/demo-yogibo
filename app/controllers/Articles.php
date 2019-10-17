<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Articles extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index($action=null ,$id=null){

		$language = $this->lang->lang();
		$this->load->model('Object_model');
		
		$data['menu']			= "articles";
		$data['sub_menu']		= null;
		$data['page']			= "articles";
		$data['language']		= $language;
		$data['action']   		= $action;
		// echo $action;
		$data['id'] = $id;

		if($action != null){

			$article = $this->Object_model->getArticlesView($action);
			$data['article'] = $article;

			$articleImg = $this->Object_model->getImageArticlesView($action);
			$data['articleImg']    = $articleImg;
			$data['articleImgRow'] = count($articleImg);


			$article_img 	 = base_url('myAdmin/upload/_article/gallery/'.$articleImg[0]['_gallery_article_img_Image']);
			if($language == 'th'){
				$data['title']		= $article['_article_SeoTitle'];
				$data['subject'] 	= $this->Object_model->getStringNormal($article['_article_SeoDescription']);
			}else if($language == 'en'){
				$data['title']		= $article['_article_SeoTitleEn'];
				$data['subject'] 	= $this->Object_model->getStringNormal($article['_article_SeoDescriptionEn']);
				}else if($language == 'cn'){
					$data['title']	= $article['_article_SeoTitleEn'];
				$data['subject']	= $this->Object_model->getStringNormal($article['_article_SeoDescriptionEn']);
			}
			$data['page']			= "articles/".$action;
			$data['image_share'] 	= $article_img;

			$this->load->view($language.'/template/header',$data);
			$this->load->view($language.'/page/articles_detail',$data);
			$this->load->view($language.'/template/footer',$data);

		}else{

			$keyword 		= null;
			$articleRow 	= $this->Object_model->getArticlesRow($keyword);
			$article 		= $this->Object_model->getArticlesAll($articleRow ,0 ,$keyword);
			$data['articleRow'] = $articleRow;
			$data['article'] 	= $article;

			if($language == 'th'){
				$data['title']		= "เรื่องน่ารู้ การกินอยู่เพื่อสุขภาพ การดื่มน้ำสุขภาพ จาก P80 Natural Essence";
				$data['subject']	= "บทความต่างๆ เกี่ยวกับสุขภาพ การใช้ชีวิต การซื้อของขวัญปีใหม่สำหรับญาติผู้ใหญ่ เพื่อสุขภาพที่ดีของครอบครัว เครื่องดื่มสุขภาพคืออะไร และการกินอยู่เพื่อการบำรุงสุขภาพที่ดี";
			}else if($language == 'en'){
				$data['title']		= "Tips&Tricks | P80 Natural Essence";
				$data['subject']	= "P80 Natural Essence is 100% fruit concentrate derived from a unique process under patent to harness the nutritional benefits from bioactive compounds.";
			}else if($language == 'cn'){
				$data['title']		= "Tips&Tricks | P80 Natural Essence";
				$data['subject']	= "P80 Natural Essence is 100% fruit concentrate derived from a unique process under patent to harness the nutritional benefits from bioactive compounds.";
			}
			$data['page']		= "articles";
			
			$data['image_share']= base_url("img/banner/img-key-01.jpg");

			$this->load->view($language.'/template/header', $data);
			$this->load->view($language.'/page/articles',$data);
			$this->load->view($language.'/template/footer',$data);

		}

	}
}

?>
