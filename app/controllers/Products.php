<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index($action=null,$id=null){

		$language = $this->lang->lang();
		$this->load->model('Object_model');

		$data['menu']		= "products";
		$data['page']		= "products";
		$data['sub_menu']	= null;
		$data['language']	= $language;
		$data['action']   	= $action;
		$data['search']   	= null;

		
		if(isset($_GET['utm_source'])){
			$_SESSION['utm_source']		= $_GET['utm_source'];
			$_SESSION['utm_medium']		= $_GET['utm_medium'];
			$_SESSION['utm_campaign']	= $_GET['utm_campaign'];
		}
		// print_r($_SESSION);
		
		if($action != null){
			
			$product = $this->Object_model->getProductView($action , $language);
			$data['product'] = $product;
			
			if($product){

				$product_id = $product['_product_ID'];

				$product_group 	= $this->Object_model->getProductCategories();
				$data['product_group'] 		= $product_group;
				$data['product_groupRow'] 	= count($product_group);

				$image    = $this->Object_model->getProductImages($product_id);
				$imageRow = count($image);
				$data['image']		= $image;
				$data['imageRow']	= $imageRow;

				$color    = $this->Object_model->getProductColor($product_id);
				$colorRow = count($color);
				$data['color']		= $color;
				$data['colorRow']	= $colorRow;

				$product_img = base_url('myAdmin/upload/_product/gallery/'.$product['_gallery_Image']);
				if($language == 'th'){
					$data['title']		= $product['_product_SeoTitle'];
					$data['subject'] 	= $this->Object_model->getStringNormal($product['_product_SeoDescription']);
				}else if($language == 'en'){
					$data['title']		= $product['_product_SeoTitle'];
					$data['subject'] 	= $this->Object_model->getStringNormal($product['_product_SeoDescription']);
				}
				$data['page']			= "products/".$action;
				$data['image_share'] 	= $product_img;

				$this->load->view($language.'/template/header', $data);
				$this->load->view($language.'/page/product-detail',$data);
				$this->load->view($language.'/template/footer',$data);


			}else{

				// group call
				$_group_id_active	= null;
				$_group2_id_active	= null;

				$_group_title 		= $this->Object_model->url_space_decode($action);
				$_group_id_active 	= $this->Object_model->getCategoriesID($_group_title);
				$data['group_id_active']  = $_group_id_active;

				$data['group2_id_active']  = "";
				if(!empty($id)){
					// group 2 call
					$_group_title 				= $this->Object_model->url_space_decode($id);
					$_group2_id_active 			= $this->Object_model->getCategoriesID2($_group_title);
					$data['group2_id_active']  	= $_group2_id_active;
				}
				

				$product_group 					= $this->Object_model->getProductCategories();
				$data['product_group'] 			= $product_group;
				$data['product_groupRow'] 		= count($product_group);

				if($language == 'th'){
					$data['title']		= "Products";
					$data['subject']	= "Products";
				}else if($language == 'en'){
					$data['title']		= "Products";
					$data['subject']	= "Products";
				}

				$_order = isset($_POST['txt_Order'])? $_POST['txt_Order']:'0';
				$data['txt_Order'] = $_order;

				// echo $_order;
				$keyword = null;
				if($action === 'search'){
					$keyword = $this->db->escape_str($id);
					$data['search'] = $keyword;
				}

				$data['page']			= "products";
				$data['image_share']	= base_url("img/banner/img-key-01.jpg");

				$product = $this->Object_model->getProduct($_group_id_active, $_group2_id_active, $keyword ,null ,null , $_order);
				$data['product'] 		= $product;
				$data['productRow'] 	= count($product);

				$this->load->view($language.'/template/header', $data);
				$this->load->view($language.'/page/product',$data);
				$this->load->view($language.'/template/footer',$data);

			}

		}else{

			if($language == 'th'){
				$data['title']		= "Products";
				$data['subject']	= "Products";
			}else if($language == 'en'){
				$data['title']		= "Products";
				$data['subject']	= "Products";
			}

			$data['page']		= "products";
			$data['image_share']= base_url("img/banner/img-key-01.jpg");


			$_group_id_active	= null;
			$_group2_id_active	= null;

			$data['group_id_active']  	= $_group_id_active;
			$data['group2_id_active']  	= $_group2_id_active;

			$product_group 				= $this->Object_model->getProductCategories();
			$data['product_group'] 		= $product_group;
			$data['product_groupRow'] 	= count($product_group);

			// $product = $this->Object_model->getProductByCat();
			// $data['product'] 	= $product;
			// $data['productRow'] = count($product);

			// echo "abc";
			$this->load->view($language.'/template/header', $data);
			$this->load->view($language.'/page/product-index',$data);
			$this->load->view($language.'/template/footer',$data);
		}

	}
}

?>
