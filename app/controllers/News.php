<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class News extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index($action=null ,$id=null){

		$language = $this->lang->lang();
		$this->load->model('Object_model');

		$data['menu']				= "Testimonial";
		$data['sub_menu']		  	= null;
		$data['language']			= $language;
		$data['action']				= $action;
		// echo $action;
		$data['id'] = $id;
		if($action != null){

			$news = $this->Object_model->getNewsView($action);
			$data['news'] = $news;

			$newsImg = $this->Object_model->getImageNewsView($action);
			$data['newsImg'] = $newsImg;
			$data['newsImgRow'] = count($newsImg);


			$news_img 	 = base_url('myAdmin/upload/_news/gallery/'.$newsImg[0]['_gallery_news_img_Image']);
			if($language == 'th'){
				$data['title']		= $news['_news_SeoTitle'];
				$data['subject'] 	= $this->Object_model->getStringNormal($news['_news_SeoDescription']);

			}else if($language == 'en'){
				$data['title']		= $news['_news_SeoTitleEn'];
				$data['subject'] 	= $this->Object_model->getStringNormal($news['_news_SeoDescriptionEn']);

			}else if($language == 'cn'){
				$data['title']		= $news['_news_SeoTitleEn'];
				$data['subject'] 	= $this->Object_model->getStringNormal($news['_news_SeoDescriptionEn']);
			}
			$data['page']			= "news/".$id;
			$data['image_share'] 	= $news_img;

			$this->load->view($language.'/template/header',$data);
			$this->load->view($language.'/page/news_detail',$data);
			$this->load->view($language.'/template/footer',$data);

		}else{

			$keyword 	= null;
			$newsRow 	= $this->Object_model->getNewsRow($keyword);
			$news 		= $this->Object_model->getNewsAll($newsRow ,0 ,$keyword);

			$data['newsRow'] 	= $newsRow;
			$data['news'] 		= $news;

			if($language == 'th'){
				$data['title']		= "ข่าวสารจากเรา P80 Natural Essence เครื่องดื่มบำรุงสุขภาพ น้ำลำใยสกัดเข้มข้น";
				$data['subject']	= "ติดตามข่าวสารจากเรา เครื่องดื่มบำรุงสุขภาพ P80 Natural Essence P80Oneshot เครื่องดื่มสุขภาพ น้ำลำใยสกัดเข้มข้น";
			}else if($language == 'en'){
				$data['title']		= "ข่าวสารจากเรา P80 Natural Essence เครื่องดื่มบำรุงสุขภาพ น้ำลำใยสกัดเข้มข้น";
				$data['subject']	= "ติดตามข่าวสารจากเรา เครื่องดื่มบำรุงสุขภาพ P80 Natural Essence P80Oneshot เครื่องดื่มสุขภาพ น้ำลำใยสกัดเข้มข้น";
			}else if($language == 'cn'){
				$data['title']		= "ข่าวสารจากเรา P80 Natural Essence เครื่องดื่มบำรุงสุขภาพ น้ำลำใยสกัดเข้มข้น";
				$data['subject']	= "ติดตามข่าวสารจากเรา เครื่องดื่มบำรุงสุขภาพ P80 Natural Essence P80Oneshot เครื่องดื่มสุขภาพ น้ำลำใยสกัดเข้มข้น";
			}
			$data['page']		= "news";

			
			$data['image_share']= base_url("img/banner/img-key-01.jpg");

			$this->load->view($language.'/template/header',$data);
			$this->load->view($language.'/page/news',$data);
			$this->load->view($language.'/template/footer',$data);

		}
	}
}

?>
