<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Contact extends CI_Controller {

	public function __construct(){
		parent::__construct();
	}

	public function index($action=null,$id=null){

		$language = $this->lang->lang();
		$this->load->model('Object_model');

		$data['menu']			= "contactus";
		$data['sub_menu']		= null;
		$data['page']			= "contact";
		$data['language']		= $language;

		if($language == 'th'){
			$data['title']		= "Contact us";
			$data['subject']	= "Contact us";
		}else if($language == 'en'){
			$data['title']		= "Contact us";
			$data['subject']	= "Contact us";
		}

		$data['image_share']	= base_url("img/banner/img-key-01.jpg");
		$data['action']   		= $action;
		$data['id']   			= $id;
		// echo $action;
		
		if($action == "AddContact"){

			$status = $this->Object_model->saveContact();
			if($status){
				echo "OK";
			}else{
				echo "Fail";
			}

		}else if($action == "AddContactBox"){

			$status = $this->Object_model->saveContactBox();
			if($status){
				echo "OK";
			}else{
				echo "Fail";
			}

		}else if($action == "emailContact"){

			$subject = "Yogibothailand contact us";
			$data_email["id"] = 13;
			$message = $this->load->view("th/email/email-contact-box",$data_email,FALSE);
		
		}else if($action == "AddSubscribe"){

			$status = $this->Object_model->saveSubscribe();
			if ($status) {
				echo "OK";
			} else {
				echo "Fail";
			}

		}else if($action == "ThkSubscribe"){

			$this->load->view($language . '/ajax/thank_subscribe', $data);

		}else if($action == "CloseSubscribe"){

			$_SESSION['yogibo_subscribe'] = 1;
			echo "OK";

		}else if($action == "BannerPromotion"){

			$_SESSION['yogibo_promotion'] = 0;
			$_yogibo_promotion = isset($_SESSION['yogibo_promotion'])? $_SESSION['yogibo_promotion']: 0;
			if($_yogibo_promotion < 2){
				$bannerPromotion = $this->Object_model->getBannerPromotion();
				if($bannerPromotion){
					$data['bannerPromotion'] = $bannerPromotion;
					$this->load->view($language . '/ajax/banner_promotion', $data);
				}else{
					echo "Fail";
				}

			}else{
				echo "Fail";
			}
			

		}else if ($action == "CloseBannerPromotion") {

			$_SESSION['yogibo_promotion'] += 1;
			echo "OK";

		}else if($action == "LoadMap"){

			$this->load->view($language.'/ajax/map',$data);

		}else if($action == "email"){

			$data['id'] = 2;
			$this->load->view($language.'/email/email-contact',$data);

		}else{

			$user_id 	= $this->session->userdata('YOGIBO_UserID');
			$email 		= $this->session->userdata('YOGIBO_Email');
			$data['user_id'] 	= $user_id;
			$data['email'] 		= $email;

			$contact = $this->Object_model->getContactPointInfo();
			$data['lat'] 	= $contact['_contact_point_Lat'];
			$data['long'] 	= $contact['_contact_point_Long'];
			$data['zoom'] 	= $contact['_contact_point_Zoom'];

			$this->load->view($language.'/template/header', $data);
			$this->load->view($language.'/page/contact',$data);
			$this->load->view($language.'/template/footer',$data);
		}

	}
}

?>
