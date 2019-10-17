<?php


class Object_model_static extends CI_Model {
	
	public function php_split_title($str){
		$vowels = array("<p>", "</p>"," ","<br>","</br>");
		$str = str_replace($vowels, "-",$str);
		 
		$vowels = array(",");
		$str = str_replace($vowels, "",$str); 
		 
		return $str;
		 
	}
	
	public function php_split_youtube($str){
	$vowels = array("/watch?", "v=","=" , "http://youtu.be/","http://www.youtube.com","https://www.youtube.com","https://youtu.be/");
	return str_replace($vowels, "",$str);
}



	
	public function __construct(){
			parent::__construct();

			$this->load->helper(array('form'));
			$this->load->library('form_validation');
			$this->load->library("pagination");

			$this->form_validation->set_error_delimiters('<span class="error">', '</span>');
	}


	public function saveContactUs(){
			$tb 	= "_contact";
			$now 	= date('Y-m-d H:i:s');
			$inputdata = array(
				$tb.'_ID' 					=> NULL,
				$tb.'_FirstName' 		=> $this->db->escape_str($this->input->post('txt_FirstName')),
				$tb.'_LastName' 		=> $this->db->escape_str($this->input->post('txt_LastName')),
				$tb.'_Email' 				=> $this->db->escape_str($this->input->post('txt_Email')),
				$tb.'_Phone' 				=> $this->db->escape_str($this->input->post('txt_Phone')),
				$tb.'_Subject' 			=> $this->db->escape_str($this->input->post('txt_Subject')),
			
				$tb.'_CreateDate' 	=> $now,
				$tb.'_LastUpdate' 	=> $now,
				$tb.'_PrivateIP' 		=> $this->input->ip_address(),
				$tb.'_IP' 					=> $this->input->ip_address()
			);
			
		$return 	 = $this->db->insert($tb, $inputdata);
		$insert_id = $this->db->insert_id();

		$to				= $this->Object_model->email_to;
		$cc 			= $this->Object_model->email_cc;
		$subject 	= "ติดต่อเรา คุณ ".$this->db->escape_str($this->input->post('txt_FirstName'))." ".$this->db->escape_str($this->input->post('txt_LastName'));

		$data_email["id"] = $insert_id;
		$message 	= $this->load->view('email/email-contact',$data_email,TRUE);
		$data 		= $this->Object_model->sendEmail($to,$subject,$message,$cc);

		return $return;

	}

}

?>
