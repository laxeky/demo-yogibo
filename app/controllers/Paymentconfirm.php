<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Paymentconfirm extends CI_Controller {

	public function __construct(){
		parent::__construct();
		
	}

	public function index($action=null ,$id=null){

		$language = $this->lang->lang();
		$this->load->model('Object_model');

		$data['menu']			= "";
		$data['sub_menu']		= null;
		$data['page']			= "home";
		$data['language']		= $language;
		
		if($language == 'th'){
			$data['title']		= "แจ้งการชำระเงิน เครื่องดื่มบำรุงสุขภาพ P80";
			$data['subject']	= "แจ้งการชำระเงิน น้ำลำใยสกัด บำรุงสุขภาพ โปรดตรวจสอบรายการ | P80 Natural Essence";
		}else if($language == 'en'){
			$data['title']		= "แจ้งการชำระเงิน เครื่องดื่มบำรุงสุขภาพ P80";
			$data['subject']	= "แจ้งการชำระเงิน น้ำลำใยสกัด บำรุงสุขภาพ โปรดตรวจสอบรายการ | P80 Natural Essence";
		}else if($language == 'cn'){
			$data['title']		= "แจ้งการชำระเงิน เครื่องดื่มบำรุงสุขภาพ P80";
			$data['subject']	= "แจ้งการชำระเงิน น้ำลำใยสกัด บำรุงสุขภาพ โปรดตรวจสอบรายการ | P80 Natural Essence";
		}

		$data['image_share']	= base_url("img/banner/img-key-01.jpg");
		$data['action']   		= $action;
		// echo $action;

		if($action === 'adddata'){	

			$payment_status = $this->Object_model->paymentConfirmAdd();
			// echo $payment_status;
			// exit();
			if($payment_status == 1){
				redirect('paymentconfirm/complete');
			}else{
				// echo $return;
				$data['status'] = 'Error : ระบบไม่สามารถบันทึกข้อมูล';
				$this->load->view($language.'/template/header', $data);
				$this->load->view($language.'/page/payment-status',$data);
				$this->load->view($language.'/template/footer',$data);
			}

		}else if($action === 'complete'){

			$data['status'] = 'บันทึกข้อมูลเรียบร้อย';
			$this->load->view($language.'/template/header', $data);
			$this->load->view($language.'/page/payment-status',$data);
			$this->load->view($language.'/template/footer',$data);

		}else if($action == 'sendmail'){

			$to	= $this->Object_model->email_to;
			$cc = $this->Object_model->email_cc;

			$subject 	= "p80naturalessence ได้รับแจ้งการชำระเงิน";
			$data_email["id"] 	= $id;
			$message 		= $this->load->view($language.'/email/email-payment',$data_email,TRUE);
			$status_email 	= $this->Object_model->sendEmail($to,$subject,$message,$cc);
			redirect('paymentconfirm/complete');

		}else if($action === 'email'){
			
			$data['id'] = 23;
			$this->load->view('email/email-payment',$data);

		}else{

			$user_id = $this->session->userdata('P80_UserID');

			$txt_FirstName 	= '';
			$txt_LastName 	= '';
			$txt_Phone 		= '';
			$txt_Email 		= '';

			if($user_id != null){
				$info = $this->Object_model->getUserInfo($user_id);

				$txt_FirstName 	= $info['_register_FirstName'];
				$txt_LastName 	= $info['_register_LastName'];
				$txt_Phone 		= $info['_register_Phone'];
				$txt_Email 		= $info['_register_Email'];
			}


			$data['txt_FirstName'] 	= $txt_FirstName;
			$data['txt_LastName'] 	= $txt_LastName;
			$data['txt_Phone'] 		= $txt_Phone;
			$data['txt_Email'] 		= $txt_Email;
			
			
			$bank = $this->Object_model->getBank();
			$data['bank'] 		= $bank;
			$data['bankRow'] 	= count($bank);

			$this->load->view($language.'/template/header', $data);
			$this->load->view($language.'/page/paymentconfirm',$data);
			$this->load->view($language.'/template/footer',$data);

		}

	}
}

?>
