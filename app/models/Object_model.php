<?php
class Object_model extends CI_Model {

    public function __construct(){
			parent::__construct();

			$this->load->helper(array('form', 'url'));
			$this->load->library('form_validation');
			$this->load->library('upload');

			$this->email_to = 'info@wearvitamin.com';
			$this->email_cc = '';
			
			if(empty($this->session->userdata('_session_id'))){
        		$_SESSION['_session_id'] = session_id().date("YmdHis");
			}
			
		}

		public function getStringNormal($str){
			return htmlspecialchars(strip_tags($str));
		}

    public function getDateThai($date){
  		$date = strtotime($date);
  		$thai_month_arr=array(
  			"0"=>"",
  			"1"=>"มกราคม",
  			"2"=>"กุมภาพันธ์",
  			"3"=>"มีนาคม",
  			"4"=>"เมษายน",
  			"5"=>"พฤษภาคม",
  			"6"=>"มิถุนายน",
  			"7"=>"กรกฎาคม",
  			"8"=>"สิงหาคม",
  			"9"=>"กันยายน",
  			"10"=>"ตุลาคม",
  			"11"=>"พฤศจิกายน",
  			"12"=>"ธันวาคม"
  		);

  		$thai_date_return = date("d",$date);
  		$thai_date_return.=" ".$thai_month_arr[date("n",$date)];
  		$thai_date_return.= " ".(date("Y",$date));
  		return $thai_date_return;
		}
		
		public function getEngThai($date){
  		$date = strtotime($date);
  		$thai_month_arr=array(
  			"0"	=> "",
  			"1"	=> "January",
  			"2"	=> "February",
  			"3"	=> "March",
  			"4"	=> "April",
  			"5"	=> "May",
  			"6"	=> "June",
  			"7"	=> "July",
  			"8"	=> "August",
  			"9"	=> "September",
  			"10"	=> "October",
  			"11"	=> "November",
  			"12"	=> "December"
  		);

  		$thai_date_return = date("d",$date);
  		$thai_date_return.=" ".$thai_month_arr[date("n",$date)];
  		$thai_date_return.= " ".(date("Y",$date));
  		return $thai_date_return;
  	}

    public function getMonthThai($month){
  		$thai_month_arr = array(
  			"0"=>"",
  			"1"=>"มกราคม",
  			"2"=>"กุมภาพันธ์",
  			"3"=>"มีนาคม",
  			"4"=>"เมษายน",
  			"5"=>"พฤษภาคม",
  			"6"=>"มิถุนายน",
  			"7"=>"กรกฎาคม",
  			"8"=>"สิงหาคม",
  			"9"=>"กันยายน",
  			"10"=>"ตุลาคม",
  			"11"=>"พฤศจิกายน",
  			"12"=>"ธันวาคม"
  		);
  		$thai_month_return = $thai_month_arr[$month];
  		return $thai_month_return;
		}

		public function getDateNumber($date){
  		$date = strtotime($date);
  		$month_arr = array(
  			"0"	=> "",
  			"1"	=> "January",
  			"2"	=> "February",
  			"3"	=> "March",
  			"4"	=> "April",
  			"5"	=> "May",
  			"6"	=> "June",
  			"7"	=> "July",
  			"8"	=> "August",
  			"9"	=> "September",
  			"10"	=> "October",
  			"11"	=> "November",
  			"12"	=> "December"
			);
  		
			$date_return = $month_arr[date("n",$date)];
			$date_return.= " ".date("d",$date);
  		$date_return.= ", ".(date("Y",$date));
  		return $date_return;
  	}
		
		public function number_money($number){
			return number_format($number,2,'.',',');
		}

		public function number_money2($number){
			return number_format($number,2,'.',',');
		}

		public function orderNo($no){
			return substr('0000'.$no,-4);
		}

		public function paymentType($type){
			if($type == 1){
				$data = 'PAYPAL';
			}else if($type == 2){
				$data = 'ATM';
			}
			return $data;
		}

		public function genderType($type){
			if($type == 'male'){
				$data = 'ชาย';
			}else if($type == 'female'){
				$data = 'หญิง';
			}
			return $data;
		}

    public function check_Phone($number){
      $number = $this->db->escape_str($number);
      $sql    = " SELECT * FROM _register2 WHERE _register2_Phone = '$number' AND _register2_Status = 'Enable' ";
      $query  = $this->db->query($sql);
      $data   = $query->row_array();
      if($data['_register2_ID']){
        return false;
      }else{
        return true;
      }
    }

    public function getRegisterInfo($id){
      $sql = " SELECT * FROM _register WHERE _register_ID = $id ";
      $query = $this->db->query($sql);
      return $query->row_array();
		}
		
		public function getPayemntInfo($id){
			$sql = " SELECT * FROM _confirmpayment WHERE _confirmpayment_ID = $id ";
      $query = $this->db->query($sql);
      return $query->row_array();
		}

    public function sendEmail($to,$subject,$message,$cc=null){
  	
  		$this->load->library('email');
  		$this->email->set_newline("\r\n");
  		$this->email->set_mailtype("html");
  		$this->email->from("yogibo-thailand@gmail.com");
      $this->email->to($to);

      if($cc){
  			$this->email->bcc($cc);
  		}

  		$this->email->subject($subject);
  		$this->email->message($message);
  		return $this->email->send();
  	}


    public function saveRegister(){

      $tb 	= "_register";
			$now 	= date('Y-m-d H:i:s');
			
      $_firstname 	= $this->db->escape_str($this->input->post('txt_reFirstName'));
			$_lastname  	= $this->db->escape_str($this->input->post('txt_reLastName'));
			$_gender  		= $this->db->escape_str($this->input->post('txt_reGender'));
			$_birthday  	= $this->db->escape_str($this->input->post('txt_reBirthday'));
      $_phone     	= $this->db->escape_str($this->input->post('txt_rePhone'));
			$_email     	= $this->db->escape_str($this->input->post('txt_reEmail'));
			$_password  	= $this->db->escape_str($this->input->post('txt_rePassword'));

			$inputdata = array(
					$tb.'_ID' 				=> NULL,
					$tb.'_FirstName' 		=> $_firstname,
					$tb.'_LastName' 		=> $_lastname,
					$tb.'_Gender' 			=> $_gender,
					$tb.'_Birthday' 		=> $_birthday,
					$tb.'_Phone' 		    => $_phone,
					$tb.'_Email' 		    => $_email,
					$tb.'_Password' 		=> md5($_password),

					$tb.'_CreateDate' 		=> $now,
					$tb.'_LastUpdate' 		=> $now,
					$tb.'_PrivateIP' 		=> $this->input->ip_address(),
					$tb.'_IP' 				=> $this->input->ip_address()
			);
			
			// print_r($inputdata);
			$data = $this->db->insert($tb, $inputdata);
			return $data;
			// $_id    = $this->db->insert_id();
			// $_to    = 'info@YOGIBOnaturalessence.com';
			// $_name  = $_firstname." ".$_lastname;

			// $data   = $this->contactEmail($_id,$_to,$_name);
			// return $data;
		}
		

		public function UpdateRegister($user_id){

      		$tb 	= "_register";
			$now 	= date('Y-m-d H:i:s');
			
      		$_firstname 	= $this->db->escape_str($this->input->post('txt_FirstName'));
			$_lastname  	= $this->db->escape_str($this->input->post('txt_LastName'));
			$_gender  		= $this->db->escape_str($this->input->post('txt_Gender'));
			$_birthday  	= $this->db->escape_str($this->input->post('txt_Birthday'));
      		$_phone     	= $this->db->escape_str($this->input->post('txt_Phone'));
			// $_email     	= $this->db->escape_str($this->input->post('txt_Email'));
			// $_password  	= $this->db->escape_str($this->input->post('txt_Password'));
			$_no     			= $this->db->escape_str($this->input->post('txt_No'));
			$_moo     		= $this->db->escape_str($this->input->post('txt_Moo'));
			$_soi     		= $this->db->escape_str($this->input->post('txt_Soi'));
			$_road     		= $this->db->escape_str($this->input->post('txt_Road'));
			$_province  	= $this->db->escape_str($this->input->post('txt_Province'));
			$_ampure    	= $this->db->escape_str($this->input->post('txt_Ampure'));
			$_tumbon    	= $this->db->escape_str($this->input->post('txt_Tumbon'));
			$_postcode  	= $this->db->escape_str($this->input->post('txt_Postcode'));

			$data = array(
					$tb.'_FirstName' 		=> $_firstname,
					$tb.'_LastName' 		=> $_lastname,
					$tb.'_Gender' 			=> $_gender,
					$tb.'_Birthday' 		=> $_birthday,
					$tb.'_Phone' 		    => $_phone,
					// $tb.'_Email' 		    => $_email,
					$tb.'_No' 		    	=> $_no,
					$tb.'_Village' 		  => $_moo,
					$tb.'_Soi' 		    	=> $_soi,
					$tb.'_Road' 		    => $_road,
					$tb.'_Province' 		=> $_province,
					$tb.'_Ampure' 		  => $_ampure,
					$tb.'_Tumbon' 		  => $_tumbon,
					$tb.'_Postcode' 		=> $_postcode,
					$tb.'_LastUpdate' 	=> $now
			);
			// print_r($inputdata);
			$this->db->where($tb.'_ID', $user_id);
			$data = $this->db->update($tb, $data); 
			return $data;
		
		}
		

		public function UpdateBill($user_id){

      $tb 	= "_register";
			$now 	= date('Y-m-d H:i:s');
			
      $_firstname 	= $this->db->escape_str($this->input->post('txt_FirstName'));
			$_lastname  	= $this->db->escape_str($this->input->post('txt_LastName'));
			$_phone     	= $this->db->escape_str($this->input->post('txt_Phone'));
			$_email     	= $this->db->escape_str($this->input->post('txt_Email'));
			$_no     			= $this->db->escape_str($this->input->post('txt_No'));
			$_moo     		= $this->db->escape_str($this->input->post('txt_Moo'));
			$_soi     		= $this->db->escape_str($this->input->post('txt_Soi'));
			$_road     		= $this->db->escape_str($this->input->post('txt_Road'));
			$_province  	= $this->db->escape_str($this->input->post('txt_Province'));
			$_ampure    	= $this->db->escape_str($this->input->post('txt_Ampure'));
			$_tumbon    	= $this->db->escape_str($this->input->post('txt_Tumbon'));
			$_postcode  	= $this->db->escape_str($this->input->post('txt_Postcode'));

			$data = array(
					$tb.'_BillFirstName' 		=> $_firstname,
					$tb.'_BillLastName' 		=> $_lastname,
					$tb.'_BillPhone' 		    => $_phone,
					$tb.'_BillEmail' 		    => $_email,
					$tb.'_BillNo' 		    	=> $_no,
					$tb.'_BillMoo' 		  		=> $_moo,
					$tb.'_BillSoi' 		    	=> $_soi,
					$tb.'_BillRoad' 		    => $_road,
					$tb.'_BillProvince' 		=> $_province,
					$tb.'_BillAmpure' 		  => $_ampure,
					$tb.'_BillTumbon' 		  => $_tumbon,
					$tb.'_BillPostcode' 		=> $_postcode,
					$tb.'_LastUpdate' 			=> $now
			);
			// print_r($inputdata);
			$this->db->where($tb.'_ID', $user_id);
			$data = $this->db->update($tb, $data); 
			return $data;
		
    }
		

		public function chkBrowser($nameBroser){
			return preg_match("/".$nameBroser."/",$_SERVER['HTTP_USER_AGENT']);
		}


		public function login($user=null,$pass=null){

      if($user && $pass){
        $_email    = $user;
        $_password = md5($pass);
      }else{
        $_email    = $this->db->escape_str($this->input->post('txt_LoginEmail'));
        $_password = md5($this->db->escape_str($this->input->post('txt_LoginPassword')));
      }

			$sql = 	" SELECT * ".
							" FROM _register ".
							" WHERE _register_Status = 'Enable' ".
							" AND _register_Email = '$_email' ".
							" AND _register_Password = '$_password' ";

			// echo $sql;		
			$query = $this->db->query($sql);
			$rs    = $query->row_array($sql);
			
			if($rs['_register_ID']){
				$newdata = array(
					'YOGIBO_UserID'     => $rs['_register_ID'],
					'YOGIBO_Email'      => $rs['_register_Email'],
					'YOGIBO_FirstName'  => $rs['_register_FirstName'],
					'YOGIBO_LastName'   => $rs['_register_LastName']
				);
				$this->session->set_userdata($newdata);
				return TRUE;
			}else{
				return FALSE;
			}

    }


    public function login_facebook(){

      // if($user && $pass){
      //   $email    = $user;
      //   $password = md5($pass);
      // }else{
      //   $email    = $this->input->post('txt_loginEmail');
      //   $password = md5($this->input->post('txt_loginPassword'));
      // }
      $facebook_id  = $this->input->post('facebook_id');
      $email        = $this->input->post('email');

      $sql = " SELECT * ".
    			   " FROM _register ".
    			   " WHERE _register_Status = 'Enable' ".
             " AND _register_FacebookID = '$facebook_id' ";
  		$query = $this->db->query($sql);
      $rs    = $query->row_array($sql);
      if($rs['_register_ID']){
        $newdata = array(
          'YOGIBO_UserID'     => $rs['_register_ID'],
          'YOGIBO_Email'      => $rs['_register_Email'],
          'YOGIBO_FirstName'  => $rs['_register_FirstName'],
          'YOGIBO_LastName'   => $rs['_register_LastName']
        );
        $this->session->set_userdata($newdata);
        return TRUE;
      }else{
        // insert database from fb
        $tb 	= "_register";
    		$now 	= date('Y-m-d H:i:s');

    		$inputdata = array(
    			$tb.'_ID' 					=> NULL,
    			$tb.'_FacebookID' 	=> $this->input->post('facebook_id'),
          $tb.'_Email' 		    => $this->input->post('email'),
    			$tb.'_FirstName' 		=> $this->input->post('first_name'),
    			$tb.'_LastName' 		=> $this->input->post('last_name'),

    			$tb.'_CreateDate' 	=> $now,
    			$tb.'_LastUpdate' 	=> $now,
    			$tb.'_PrivateIP' 		=> $this->input->ip_address(),
    			$tb.'_IP' 					=> $this->input->ip_address()
    		);
    		$this->db->insert($tb, $inputdata);
        $insert_id = $this->db->insert_id();

        $newdata = array(
          'YOGIBO_UserID'     => $insert_id,
          'YOGIBO_Email'      => $this->input->post('email'),
          'YOGIBO_FirstName'  => $this->input->post('first_name'),
          'YOGIBO_LastName'   => $this->input->post('last_name')
        );
        $this->session->set_userdata($newdata);
        return TRUE;

      }
		}


		public function addCarts($product_id){

  		$tb 		= "_carts_item";
			$now 		= date('Y-m-d H:i:s');
			$colorID 		= $this->input->post('txt_Color');
			$colorHex 	= $this->input->post('txt_Color_hex');

      // check carts addCarts
      $sql = " SELECT * ".
    			   " FROM ".$tb.
						 " WHERE ".$tb."_SessionID = '".$_SESSION['_session_id']."' ".
						 " AND ".$tb."_ColorID = '$colorID' ".
             " AND ".$tb."_ProductID = '$product_id' ";
  		$query = $this->db->query($sql);
      $ch_data = $query->num_rows($sql);
      // check carts addCarts

      if($ch_data > 0){
				$item = $this->input->post('txt_Unit');
				if(isset($item)){
					$unit_item = $this->input->post('txt_Unit');
				}else{
					$unit_item = 1;
				}
				
        // update
        $this->db->where(array($tb."_SessionID" => $_SESSION['_session_id'], $tb."_ProductID" => $product_id));
        $this->db->set($tb.'_Unit', '_carts_item_Unit+'.$unit_item, FALSE);
        $this->db->update($tb);
        return true;

      }else{
        // insert
        $inputdata = array(
    			$tb.'_ID' 					=> NULL,
    			$tb.'_UserID' 		  => $this->session->userdata('YOGIBO_UserID'),
          $tb.'_SessionID' 		=> $_SESSION['_session_id'],
    			$tb.'_ProductID' 		=> $product_id,
    			$tb.'_Unit' 				=> $this->input->post('txt_Unit'),
					$tb.'_ColorID' 	  	=> $this->input->post('txt_Color'),
					$tb.'_Color' 	  		=> $this->input->post('txt_Color_hex'),
					$tb.'_Remark' 	  	=> $this->input->post('txt_Remark'),

    			$tb.'_CreateDate' 	=> $now,
    			$tb.'_LastUpdate' 	=> $now,
    			$tb.'_PrivateIP' 		=> $this->input->ip_address(),
    			$tb.'_IP' 					=> $this->input->ip_address()
    		);
    		return $this->db->insert($tb, $inputdata);
      }

		}


		public function cartsStep2(){

      $newdata = array(
        'session_txt_FirstName'   		=> $this->input->post('txt_FirstName'),
        'session_txt_LastName'    		=> $this->input->post('txt_LastName'),
        'session_txt_Phone'       		=> $this->input->post('txt_Phone'),
        'session_txt_Email'       		=> $this->input->post('txt_Email'),
        'session_txt_No'          		=> $this->input->post('txt_No'),
        'session_txt_Moo'         		=> $this->input->post('txt_Moo'),
        'session_txt_Soi'         		=> $this->input->post('txt_Soi'),
        'session_txt_Road'        		=> $this->input->post('txt_Road'),
        'session_txt_Province'    		=> $this->input->post('txt_Province'),
        'session_txt_Ampure'      		=> $this->input->post('txt_Ampure'),
        'session_txt_Tumbon'      		=> $this->input->post('txt_Tumbon'),
				'session_txt_Postcode'    		=> $this->input->post('txt_Postcode'),
				
				'session_txt_Billing'					=> $this->input->post('txt_Billing'),

				'session_txt_BillFirstName'   => $this->input->post('txt_BillFirstName'),
        'session_txt_BillLastName'    => $this->input->post('txt_BillLastName'),
        'session_txt_BillPhone'       => $this->input->post('txt_BillPhone'),
        'session_txt_BillEmail'       => $this->input->post('txt_BillEmail'),
        'session_txt_BillNo'          => $this->input->post('txt_BillNo'),
        'session_txt_BillMoo'         => $this->input->post('txt_BillMoo'),
        'session_txt_BillSoi'         => $this->input->post('txt_BillSoi'),
        'session_txt_BillRoad'        => $this->input->post('txt_BillRoad'),
        'session_txt_BillProvince'    => $this->input->post('txt_BillProvince'),
        'session_txt_BillAmpure'      => $this->input->post('txt_BillAmpure'),
        'session_txt_BillTumbon'      => $this->input->post('txt_BillTumbon'),
				'session_txt_BillPostcode'    => $this->input->post('txt_BillPostcode'),
      );
      $this->session->set_userdata($newdata);
			return true;
			
		}
		

		public function saveCarts(){

			$tb 	= "_carts";
			$now 	= date('Y-m-d H:i:s');

			$billingType  = $this->session->userdata('session_txt_Billing');

			if($billingType == 2){

				$_FirstName 	= $this->session->userdata('session_txt_FirstName');
				$_LastName 		= $this->session->userdata('session_txt_LastName');
				$_Phone 		= $this->session->userdata('session_txt_Phone');
				$_Email 		= $this->session->userdata('session_txt_Email');

				$_No 			= $this->session->userdata('session_txt_No');
				$_Moo 			= $this->session->userdata('session_txt_Moo');
				$_Soi 			= $this->session->userdata('session_txt_Soi');
				$_Road 			= $this->session->userdata('session_txt_Road');
				$_Tumbon 		= $this->session->userdata('session_txt_Tumbon');
				$_Ampure 		= $this->session->userdata('session_txt_Ampure');
				$_Province 		= $this->session->userdata('session_txt_Province');
				$_Postcode 		= $this->session->userdata('session_txt_Postcode');

				$_BillFirstName = $this->session->userdata('session_txt_BillFirstName');
				$_BillLastName 	= $this->session->userdata('session_txt_BillLastName');
				$_BillPhone 	= $this->session->userdata('session_txt_BillPhone');
				$_BillEmail 	= $this->session->userdata('session_txt_BillEmail');
				$_BillNo 		= $this->session->userdata('session_txt_BillNo');
				$_BillMoo 		= $this->session->userdata('session_txt_BillMoo');
				$_BillSoi 		= $this->session->userdata('session_txt_BillSoi');
				$_BillRoad 		= $this->session->userdata('session_txt_BillRoad');
				$_BillTumbon 	= $this->session->userdata('session_txt_BillTumbon');
				$_BillAmpure 	= $this->session->userdata('session_txt_BillAmpure');
				$_BillProvince 	= $this->session->userdata('session_txt_BillProvince');
				$_BillPostcode 	= $this->session->userdata('session_txt_BillPostcode');
				
			}else{

				$_FirstName 	= $this->session->userdata('session_txt_FirstName');
				$_LastName 		= $this->session->userdata('session_txt_LastName');
				$_Phone 		= $this->session->userdata('session_txt_Phone');
				$_Email 		= $this->session->userdata('session_txt_Email');

				$_No 			= $this->session->userdata('session_txt_No');
				$_Moo 			= $this->session->userdata('session_txt_Moo');
				$_Soi 			= $this->session->userdata('session_txt_Soi');
				$_Road 			= $this->session->userdata('session_txt_Road');
				$_Tumbon 		= $this->session->userdata('session_txt_Tumbon');
				$_Ampure 		= $this->session->userdata('session_txt_Ampure');
				$_Province 		= $this->session->userdata('session_txt_Province');
				$_Postcode 		= $this->session->userdata('session_txt_Postcode');

				$_BillFirstName = $this->session->userdata('session_txt_FirstName');
				$_BillLastName 	= $this->session->userdata('session_txt_LastName');
				$_BillPhone 	= $this->session->userdata('session_txt_Phone');
				$_BillEmail 	= $this->session->userdata('session_txt_Email');
				$_BillNo 		= $this->session->userdata('session_txt_No');
				$_BillMoo 		= $this->session->userdata('session_txt_Moo');
				$_BillSoi 		= $this->session->userdata('session_txt_Soi');
				$_BillRoad 		= $this->session->userdata('session_txt_Road');
				$_BillTumbon 	= $this->session->userdata('session_txt_Tumbon');
				$_BillAmpure 	= $this->session->userdata('session_txt_Ampure');
				$_BillProvince 	= $this->session->userdata('session_txt_Province');
				$_BillPostcode 	= $this->session->userdata('session_txt_Postcode');

			}
			
			$utm_source		= isset($_SESSION['utm_source'])?$_SESSION['utm_source']:'';
			$utm_medium		= isset($_SESSION['utm_medium'])?$_SESSION['utm_medium']:'';
			$utm_campaign	= isset($_SESSION['utm_campaign'])?$_SESSION['utm_campaign']:'';

      $inputdata = array(
        $tb.'_ID' 			  => NULL,
        $tb.'_UserID' 		  => $this->session->userdata('YOGIBO_UserID'),
		$tb.'_SessionID' 	  => $this->session->userdata('_session_id'),
				
        $tb.'_FirstName' 	  => $_FirstName,
        $tb.'_LastName' 	  => $_LastName,
        $tb.'_Phone' 	  	  => $_Phone,
        $tb.'_Email' 	      => $_Email,

        $tb.'_No' 	  	      => $_No,
        $tb.'_Moo' 	  	      => $_Moo,
        $tb.'_Soi' 	  	      => $_Soi,
        $tb.'_Road' 	  	  => $_Road,
        $tb.'_Tumbon' 	  	  => $_Tumbon,
        $tb.'_Ampure' 	  	  => $_Ampure,
        $tb.'_Province' 	  => $_Province,
		$tb.'_Postcode' 	  => $_Postcode,

		$tb.'_BillFirstName'  => $_BillFirstName,
        $tb.'_BillLastName'   => $_BillLastName,
        $tb.'_BillPhone' 	  => $_BillPhone,
        $tb.'_BillEmail' 	  => $_BillEmail,
		$tb.'_BillNo' 	  	  => $_BillNo,
        $tb.'_BillMoo' 	  	  => $_BillMoo,
        $tb.'_BillSoi' 	  	  => $_BillSoi,
        $tb.'_BillRoad' 	  => $_BillRoad,
        $tb.'_BillTumbon' 	  => $_BillTumbon,
        $tb.'_BillAmpure' 	  => $_BillAmpure,
        $tb.'_BillProvince'   => $_BillProvince,
        $tb.'_BillPostcode'   => $_BillPostcode,

        $tb.'_Deliverly' 	  => $this->session->userdata('session_carts_delivery'),
        $tb.'_PaymentType' 	  => $this->db->escape_str($this->input->post('txt_WayPayment')),
        $tb.'_BankID' 	  	  => $this->db->escape_str($this->input->post('txt_BankTranfer')),
		$tb.'_Accept' 	  	  => "Yes",
		
		$tb.'_Source' 		  => $utm_source,
		$tb.'_Medium' 		  => $utm_medium,
		$tb.'_Campaign' 	  => $utm_campaign,

        $tb.'_CreateDate' 	  => $now,
        $tb.'_LastUpdate' 	  => $now,
        $tb.'_PrivateIP' 	  => $this->input->ip_address(),
        $tb.'_IP' 			  => $this->input->ip_address()
      );
      // print_r($inputdata);
      $data = $this->db->insert($tb, $inputdata);
			$insert_id = $this->db->insert_id();
			
			$_SESSION['session_payment'] 	= $this->db->escape_str($this->input->post('txt_WayPayment'));
			$_SESSION['session_order_id'] = $insert_id;

      $this->Object_model->orderEmail($insert_id,$_Email);

      if($data == true){

        // update info data
        if($this->session->userdata('YOGIBO_UserID')){

          $user_id = $this->session->userdata('YOGIBO_UserID');
					$tb = "_register";
					
					if($billingType == 1){

						$update_data = array(
							$tb.'_FirstName' 				=> $this->session->userdata('session_txt_FirstName'),
							$tb.'_LastName' 				=> $this->session->userdata('session_txt_LastName'),
							$tb.'_Phone' 		    		=> $this->session->userdata('session_txt_Phone'),
							$tb.'_Email' 		    		=> $this->session->userdata('session_txt_Email'),
							$tb.'_No' 		      		=> $this->session->userdata('session_txt_No'),
							$tb.'_Moo' 		      		=> $this->session->userdata('session_txt_Moo'),
							$tb.'_Soi' 		      		=> $this->session->userdata('session_txt_Soi'),
							$tb.'_Road' 		    		=> $this->session->userdata('session_txt_Road'),
							$tb.'_Tumbon' 		  		=> $this->session->userdata('session_txt_Tumbon'),
							$tb.'_Ampure' 		  		=> $this->session->userdata('session_txt_Ampure'),
							$tb.'_Province' 				=> $this->session->userdata('session_txt_Province'),
							$tb.'_Postcode' 				=> $this->session->userdata('session_txt_Postcode'),
							$tb.'_LastUpdate' 			=> $now
						);

					}else{

						$update_data = array(
							$tb.'_FirstName' 				=> $this->session->userdata('session_txt_FirstName'),
							$tb.'_LastName' 				=> $this->session->userdata('session_txt_LastName'),
							$tb.'_Phone' 		    		=> $this->session->userdata('session_txt_Phone'),
							$tb.'_Email' 		    		=> $this->session->userdata('session_txt_Email'),
							$tb.'_No' 		      		=> $this->session->userdata('session_txt_No'),
							$tb.'_Moo' 		      		=> $this->session->userdata('session_txt_Moo'),
							$tb.'_Soi' 		      		=> $this->session->userdata('session_txt_Soi'),
							$tb.'_Road' 		    		=> $this->session->userdata('session_txt_Road'),
							$tb.'_Tumbon' 		  		=> $this->session->userdata('session_txt_Tumbon'),
							$tb.'_Ampure' 		  		=> $this->session->userdata('session_txt_Ampure'),
							$tb.'_Province' 				=> $this->session->userdata('session_txt_Province'),
							$tb.'_Postcode' 				=> $this->session->userdata('session_txt_Postcode'),
							
							$tb.'_BillFirstName' 		=> $this->session->userdata('session_txt_BillFirstName'),
							$tb.'_BillLastName' 		=> $this->session->userdata('session_txt_BillLastName'),
							$tb.'_BillPhone' 		    => $this->session->userdata('session_txt_BillPhone'),
							$tb.'_BillEmail' 		    => $this->session->userdata('session_txt_BillEmail'),
							$tb.'_BillNo' 		      => $this->session->userdata('session_txt_BillNo'),
							$tb.'_BillMoo' 		      => $this->session->userdata('session_txt_BillMoo'),
							$tb.'_BillSoi' 		      => $this->session->userdata('session_txt_BillSoi'),
							$tb.'_BillRoad' 		    => $this->session->userdata('session_txt_BillRoad'),
							$tb.'_BillTumbon' 		  => $this->session->userdata('session_txt_BillTumbon'),
							$tb.'_BillAmpure' 		  => $this->session->userdata('session_txt_BillAmpure'),
							$tb.'_BillProvince' 		=> $this->session->userdata('session_txt_BillProvince'),
							$tb.'_BillPostcode' 		=> $this->session->userdata('session_txt_BillPostcode'),
							
							$tb.'_LastUpdate' 			=> $now
						);
						
					}
					$status = $this->db->update($tb, $update_data, array($tb."_ID" => $user_id));
					
        }
        // unset session
        unset(
          $_SESSION['_session_id'],
          $_SESSION['session_txt_FirstName'],
          $_SESSION['session_txt_LastName'],
          $_SESSION['session_txt_Phone'],
          $_SESSION['session_txt_Email'],
          $_SESSION['session_txt_No'],
          $_SESSION['session_txt_Moo'],
          $_SESSION['session_txt_Soi'],
          $_SESSION['session_txt_Road'],
          $_SESSION['session_txt_Tumbon'],
          $_SESSION['session_txt_Ampure'],
          $_SESSION['session_txt_Province'],
          $_SESSION['session_txt_Postcode'],
					$_SESSION['session_carts_delivery'],
					$_SESSION['session_txt_BillFirstName'],
          $_SESSION['session_txt_BillLastName'],
          $_SESSION['session_txt_BillPhone'],
          $_SESSION['session_txt_BillEmail'],
          $_SESSION['session_txt_BillNo'],
          $_SESSION['session_txt_BillMoo'],
          $_SESSION['session_txt_BillSoi'],
          $_SESSION['session_txt_BillRoad'],
          $_SESSION['session_txt_BillTumbon'],
          $_SESSION['session_txt_BillAmpure'],
          $_SESSION['session_txt_BillProvince'],
					$_SESSION['session_txt_BillPostcode'],
					$_SESSION['session_txt_Billing']
        );
			}

      return $data;

		}


		public function updateStatusPaypal($id){

			$tb 	= "_carts";
			$now 	= date('Y-m-d H:i:s');

			$update_data = array(
				$tb.'_Step' 				=> 2,
				$tb.'_LastUpdate' 	=> $now
			);

			$status = $this->db->update($tb, $update_data, array($tb."_ID" => $id));
			return $status;

		}

		public function updateStatusPaypalCancle($id){

			$tb 	= "_carts";
			$now 	= date('Y-m-d H:i:s');

			$update_data = array(
				$tb.'_Step' 				=> 6,
				$tb.'_LastUpdate' 	=> $now
			);

			$status = $this->db->update($tb, $update_data, array($tb."_ID" => $id));
			return $status;

		}


		public function cartsStatus($status){

			$data = '';
			if($status == 0 || $status == 1){
				$data = "รอการชำระเงิน";
			}else if($status == 2){
				$data = "ชำระเงินเรียบร้อย";
			}else if($status == 3){
				$data = "จัดเตรียมสินค้า";
			}else if($status == 4){
				$data = "จัดส่งสินค้า";
			}else if($status == 5){
				$data = "เรียบร้อย";
			}else if($status == 6){
				$data = "ยกเลิก";
			}
			return $data;

		}

		public function cartsStatusEn($status){

			$data = '';
			if($status == 0 || $status == 1){
				$data = "Waiting payment";
			}else if($status == 2){
				$data = "Payment completed";
			}else if($status == 3){
				$data = "Preparation products";
			}else if($status == 4){
				$data = "Delivery completed";
			}else if($status == 5){
				$data = "Finished";
			}else if($status == 6){
				$data = "Cancel";
			}
			return $data;

		}
		
		
    // get count carts items
    public function countCarts(){
      // $_session_id = session_id();
      $tb  = "_carts_item";
      // check carts addCarts
      $sql = " SELECT SUM(".$tb."_Unit) AS ".$tb."_UnitCount ".
    			   " FROM ".$tb.
    			   " WHERE ".$tb."_SessionID = '".$_SESSION['_session_id']."' ";
      // echo $sql;
      $query = $this->db->query($sql);
      $rs =  $query->row_array();
      return $rs[$tb.'_UnitCount'];
		}



		public function getCartsList($id=null){
			// $_session_id = session_id();
			// $sql = 	" SELECT * ".
			// 				" ,(SELECT _gallery_img_Image FROM _gallery_img WHERE _gallery_img_GalleryID = _product_ID ORDER BY  IF(_gallery_img_Order > 0 , _gallery_img_Order , _gallery_img_ID )  DESC limit 1) AS _gallery_Image ".
			// 				" FROM _carts_item ".
			// 				" INNER JOIN _product ON _product_ID = _carts_item_ProductID ";

			$sql = 	" SELECT * ".
							" ,(SELECT _product_color_Image FROM _product_color WHERE _product_color_ID = _carts_item_ColorID ) AS _gallery_Image ".
							" ,(SELECT _gallery_img_Image FROM _gallery_img WHERE _gallery_img_GalleryID = _product_ID ORDER BY  IF(_gallery_img_Order > 0 , _gallery_img_Order , _gallery_img_ID )  DESC limit 1) AS _gallery_Image2 " .
							" FROM _carts_item ".
							" INNER JOIN _product ON _product_ID = _carts_item_ProductID ";

			if($id){
				$sql .= " WHERE _carts_item_SessionID = '".$id."' ";
			}else if($_SESSION['_session_id']){
				$sql .= " WHERE _carts_item_SessionID = '".$_SESSION['_session_id']."' ";
			}
			$sql .= " ORDER BY _carts_item_ID ASC";
			// echo $sql;
			$query = $this->db->query($sql);
			return $query->result_array();

		}
		

    public function cartsUpdateUnit($id,$unit){
      // $_session_id = session_id();
      $tb 	= "_carts_item";
      $this->db->where(array($tb."_SessionID" => $_SESSION['_session_id'], $tb."_ID" => $id));
      $this->db->set($tb.'_Unit', $unit, FALSE);
      $this->db->update($tb);
			return true;
			
    }

    public function cartsDelete($id){
      $this->db->where('_carts_item_ID', $id);
      $this->db->delete('_carts_item');
			return true;
		}
		

		public function getDelivery($id=null){
      $sql = " SELECT * ".
    			   " FROM _product_delivery ".
    			   " WHERE _product_delivery_Status = 'Enable' ";
      if($id){
        $sql .= " AND _product_delivery_ID = '$id' ";
      }
    	$sql .=	" ORDER BY  IF(_product_delivery_Order > 0 , _product_delivery_Order , _product_delivery_ID )  DESC ";
      // echo $sql;
      $query = $this->db->query($sql);
      return $query->result_array();
    }
		
		// CATEGORIES
	public function getProductCategories($id=null){
      	$sql = 	" SELECT * ".
    		 	" FROM _product_group ".
				" WHERE _product_group_Status = 'Enable' ";
		if($id != null){
			$sql .= " AND _product_group_ID = '$id' ";
		}
    	$sql .= " ORDER BY  IF(_product_group_Order > 0 , _product_group_Order , _product_group_ID )  DESC ";
      	$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getProductCategories2($group_id){
      $sql = 	" SELECT * ".
    			" FROM _product_group_level2 ".
						 " WHERE _product_group_level2_Status = 'Enable' ".
						 " AND _product_group_level2_GroupID = '$group_id' ".
    			   " ORDER BY  IF(_product_group_level2_Order > 0 , _product_group_level2_Order , _product_group_level2_ID )  ASC ";
      $query = $this->db->query($sql);
			return $query->result_array();
		}

		public function getCategoriesID($group_title){
      $sql = " SELECT * ".
    			   " FROM _product_group ".
    			   " WHERE _product_group_Status = 'Enable' ".
						 " AND _product_group_Title = '$group_title' ";
			// echo $sql;
      $query = $this->db->query($sql);
			$data  = $query->row_array();
			return $data['_product_group_ID'];
		}

		public function getCategoriesID2($group_title){
      $sql = " SELECT * ".
    			   " FROM _product_group_level2 ".
    			   " WHERE _product_group_level2_Status = 'Enable' ".
						 " AND _product_group_level2_Title = '$group_title' ";
			// echo $sql;
      $query = $this->db->query($sql);
			$data  = $query->row_array();
			return $data['_product_group_level2_ID'];
			
		}


		public function getProductHome(){

			$user_id = $this->session->userdata('YOGIBO_UserID');

      		// $sql = 	" SELECT * ".
            //  		" ,(SELECT _gallery_img_Image FROM _gallery_img WHERE _gallery_img_GalleryID = _product_ID ORDER BY  IF(_gallery_img_Order > 0 , _gallery_img_Order , _gallery_img_ID )  DESC limit 1) AS _gallery_Image ".
			// 		" FROM _product ".
			// 		" LEFT JOIN _product_wishlist ON _product_wishlist_ProductID = _product_ID AND _product_wishlist_UserID = '$user_id'  ".
    		// 	    " WHERE _product_Status = 'Enable' ".
    		// 	    " ORDER BY  IF(_product_Order > 0 , _product_Order , _product_ID )  DESC limit 8 ";
      		// $query = $this->db->query($sql);
			// return $query->result_array();

			$sql =  " SELECT * ".
					" ,(SELECT _gallery_img_Image FROM _gallery_img WHERE _gallery_img_GalleryID = _product_ID ORDER BY  IF(_gallery_img_Order > 0 , _gallery_img_Order , _gallery_img_ID )  DESC limit 1) AS _gallery_Image ".
					" FROM 	_product_home ".
					" INNER JOIN _product ON _product_ID = _product_home_ProductID ".
					" LEFT JOIN _product_wishlist ON _product_wishlist_ProductID = _product_ID AND _product_wishlist_UserID = '$user_id'  ".
					" WHERE _product_Status = 'Enable' ";
			$sql .= " ORDER BY _product_home_ID ASC ";
			  
			$query = $this->db->query($sql);
			return $query->result_array();
		}

		public function getProduct($group_id=null, $group2_id=null ,$keyword=null ,$limit=null ,$start=null ,$order=null){

			// echo "order : ".$order;
			$user_id = $this->session->userdata('YOGIBO_UserID');

      		$sql =  " SELECT * ".
             		" ,(SELECT _gallery_img_Image FROM _gallery_img WHERE _gallery_img_GalleryID = _product_ID ORDER BY  IF(_gallery_img_Order > 0 , _gallery_img_Order , _gallery_img_ID )  DESC limit 1) AS _gallery_Image ".
					" FROM _product ".
					" LEFT JOIN _product_wishlist ON _product_wishlist_ProductID = _product_ID AND _product_wishlist_UserID = '$user_id' ".
					// " LEFT JOIN _product_group ON _product_group_ID = _product_GroupID ".
					" LEFT JOIN _product_group_level2 ON _product_group_level2_ID = _product_SubGroupID ".
					" WHERE _product_Status = 'Enable' ";
			
			if($keyword != null){
				$sql .= " AND (_product_Title like'%$keyword%' ";
				$sql .= " OR _product_Subject like'%$keyword%' ";
				$sql .= " OR _product_Benefit like'%$keyword%' ";
				$sql .= " OR _product_Eat like'%$keyword%' ";
				$sql .= " )";
			}

			if($group_id != null){
				$sql .= " AND ( _product_GroupID = '$group_id' ".
						" OR _product_GroupID2 = '$group_id' )";
			}
			if($group2_id != null){
				$sql .= " AND ( _product_SubGroupID = '$group2_id' ".
						" OR _product_SubGroupID2 = '$group2_id' )";
			}
		
			
			if($order == 'created_at_desc'){
				$sql .= " ORDER BY  _product_ID DESC ";

			}else if($order == 'created_at_asc') {
				$sql .= " ORDER BY  _product_ID ASC ";

			}else if($order == 'price_desc') {
				$sql .= " ORDER BY  _product_Price DESC ";

			}else if($order == 'price_asc') {
				$sql .= " ORDER BY  _product_Price ASC ";

			}else{

				if($group_id){
					$sql .= " ORDER BY _product_group_level2_ID ASC , IF(_product_Order > 0 , _product_Order , _product_ID )  DESC";
				}else{
					$sql .= " ORDER BY  IF(_product_Order > 0 , _product_Order , _product_ID )  DESC ";
				}
				
			}

			if($limit != null && $start != null){
				$sql .= " limit $start,$limit ";
			}
			
		// echo $sql;
      	$query = $this->db->query($sql);
		return $query->result_array();
	}


	public function getProductByCat(){

		$user_id = $this->session->userdata('YOGIBO_UserID');

		$sql = 	" SELECT * " .
						" ,(SELECT _gallery_img_Image FROM _gallery_img WHERE _gallery_img_GalleryID = _product_ID ORDER BY  IF(_gallery_img_Order > 0 , _gallery_img_Order , _gallery_img_ID )  DESC limit 1) AS _gallery_Image " .
						" FROM _product " .
						" LEFT JOIN _product_wishlist ON _product_wishlist_ProductID = _product_ID AND _product_wishlist_UserID = '$user_id' " .
						" WHERE _product_Status = 'Enable' ";

		$sql .= " ORDER BY  IF(_product_Order > 0 , _product_Order , _product_ID )  DESC ";
			
			// echo $sql;
		$query = $this->db->query($sql);
		return $query->result_array();
	}


		public function getProductView($id,$lanuage){

			$urlname = $this->db->escape_str($id);

      $sql = " SELECT * ".
						 " ,(SELECT _gallery_img_Image FROM _gallery_img WHERE _gallery_img_GalleryID = _product_ID ORDER BY  IF(_gallery_img_Order > 0 , _gallery_img_Order , _gallery_img_ID )  DESC limit 1) AS _gallery_Image ".
						 " ,(SELECT _product_group_Title FROM _product_group WHERE _product_group_ID = _product_GroupID) AS _group_Title ".
						 " ,(SELECT _product_group_level2_Title FROM _product_group_level2 WHERE _product_group_level2_ID = _product_SubGroupID) AS _sub_Title ".
						 " FROM _product ".
						 " WHERE _product_Status = 'Enable' ".
						 " AND _product_ID = '$urlname' ";

			// if($lanuage == 'th'){
			// 	$sql .= " AND _product_SeoName = '$urlname' ";
			// }else if($lanuage == 'en'){
			// 	$sql .= " AND _product_SeoName = '$urlname' ";
			// }
						 
			// echo $sql;
      $query = $this->db->query($sql);
			return $query->row_array();
			
		}

		public function getProductImages($product_id){
      $sql = " SELECT * ".
    			   " FROM _gallery_img ".
						 " WHERE _gallery_img_GalleryID = '$product_id' ";
			$sql .= " ORDER BY  IF(_gallery_img_Order > 0 , _gallery_img_Order , _gallery_img_ID ) DESC";
			// echo $sql;
      $query = $this->db->query($sql);
			return $query->result_array();
		}

		public function getProductColor($product_id){
      $sql = " SELECT * ".
    			   " FROM _product_color ".
						 " WHERE _product_color_Status = 'Enable' ".
						 " AND _product_color_ProductID = '$product_id' ".
    			   " ORDER BY  _product_color_ID ASC ";
      $query = $this->db->query($sql);
			return $query->result_array();
		}

	public function getWishlist($user_id){
      $sql = 	" SELECT * ".
             	" ,(SELECT _gallery_img_Image FROM _gallery_img WHERE _gallery_img_GalleryID = _product_ID ORDER BY  IF(_gallery_img_Order > 0 , _gallery_img_Order , _gallery_img_ID )  DESC limit 1) AS _gallery_Image ".
				" FROM _product ".
				" INNER JOIN _product_wishlist ON _product_wishlist_ProductID = _product_ID ".
				" WHERE _product_Status = 'Enable' ".
				" AND _product_wishlist_UserID = $user_id ";	 
			
    	$sql .=	" ORDER BY  _product_wishlist_ID  DESC ";
      	$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getProvince(){
		$lang = $this->lang->lang();
		// echo $language;
  		$sql =  " SELECT * ".
				" FROM province ";
		if($lang == 'th'){
			$sql .= " ORDER BY  PROVINCE_NAME ASC ";
		}else{
			$sql .= " ORDER BY  PROVINCE_NAME_EN ASC ";
		}	
		// echo $sql;
  		$query = $this->db->query($sql);
      	return $query->result_array($sql);
	}
		

    public function getAmpure($province_id){
		$lang = $this->lang->lang();
  		$sql =  " SELECT * ".
  			    " FROM amphur ".
				" WHERE PROVINCE_ID = '$province_id' ";
		if($lang == 'th'){
			$sql .= " ORDER BY AMPHUR_NAME ASC ";
		}else{
			$sql .= " ORDER BY AMPHUR_NAME_EN ASC ";
		}
  		$query = $this->db->query($sql);
      	return $query->result_array($sql);
	}
		

    public function getTumbon($amphur_id){
		$lang = $this->lang->lang();
  		$sql = 	 " SELECT * ".
  			     " FROM district ".
            	 " WHERE AMPHUR_ID = '$amphur_id' ";
				
		if($lang == 'th'){
			$sql .= " ORDER BY DISTRICT_NAME ASC ";
		}else{
			$sql .= " ORDER BY DISTRICT_NAME_EN ASC ";
		}
  		$query = $this->db->query($sql);
     	return $query->result_array($sql);
	}
		

	public function getPostcode($id){
  		$sql = " SELECT * ".
  			     " FROM district ".
             	 " WHERE DISTRICT_ID = '$id' ";
  		$query = $this->db->query($sql);
		$data = $query->row_array($sql);
		return $data['DISTRICT_CODE'];
	}

	public function getUserInfo($id){
      	$sql =  " SELECT * ".
  			    " FROM _register ".
             	" WHERE _register_ID = '$id' ";
  		$query = $this->db->query($sql);
      	return $query->row_array($sql);
    }
		

		public function getBank($id=null){
  		$sql = " SELECT * ".
						 " FROM _product_bank ";

			if($id != null){
				$sql .= " WHERE _product_bank_ID = '$id' ";
			}

  		$sql .= " ORDER BY  IF(_product_bank_Order > 0 , _product_bank_Order , _product_bank_ID )  DESC";
  		$query = $this->db->query($sql);
      return $query->result_array($sql);
		}


		public function getOrderInfo($id){
      $sql = " SELECT * ".
  			     " FROM _carts ".
             " WHERE _carts_ID = '$id' ";
  		$query = $this->db->query($sql);
      return $query->row_array($sql);
		}
		
		public function orderHistory($user_id){
      $sql = " SELECT * ".
  			     " FROM _carts ".
             " WHERE _carts_UserID = '$user_id' ".
  			     " ORDER BY _carts_ID DESC ";
  		$query = $this->db->query($sql);
      return $query->result_array($sql);
    }


		public function getInfoProvince($id){
      $sql = " SELECT * ".
  			     " FROM province ".
             " WHERE PROVINCE_ID = '$id' ";
  		$query = $this->db->query($sql);
      return $query->row_array($sql);
    }

    public function getInfoAmpure($id){
      $sql = " SELECT * ".
  			     " FROM amphur ".
             " WHERE AMPHUR_ID = '$id' ".
  			     " ORDER BY AMPHUR_NAME ASC ";
  		$query = $this->db->query($sql);
      return $query->row_array($sql);
    }

    public function getInfoTumbon($id){
      $sql = " SELECT * ".
  			     " FROM district ".
             " WHERE DISTRICT_ID = '$id' ".
  			     " ORDER BY DISTRICT_NAME ASC ";
  		$query = $this->db->query($sql);
      return $query->row_array($sql);
		}

		public function getInfoContact($id){
      $sql = " SELECT * ".
  			 " FROM _contactus ".
             " WHERE _contactus_ID = '$id' ";
  		$query = $this->db->query($sql);
      return $query->row_array();
		}
		

		public function orderEmail($id,$email){

  		if($id){
				$language	= $this->lang->lang();
  			$to				= $email;
				$cc 			= $this->email_cc;
				// $date			= $this->Object_model->getMonthThai(date('m'))." ".date('d').",".date('Y');
  			$subject 	= "Your YOGIBO order receipt from ";

  			$data_email["id"] = $id;
  			$message 	= $this->load->view($language.'/email/email-order',$data_email,TRUE);
				$data 		= $this->sendEmail($to,$subject,$message,$cc);
				// $data = true;
  			return $data;
  		}else{
  			return FALSE;
  		}
		}
		


		public function getNewsRow($keyword){
			
  		$sql = " SELECT * ".
    			   " FROM _news ".
    			   " WHERE _news_Status = 'Enable' ";
      if($keyword){
         $sql .= " AND (_news_Title like'%$keyword%' ";
         $sql .= " OR _news_Subject like'%$keyword%' )";
      }
  		$sql .= " ORDER BY  IF(_news_Order > 0 , _news_Order , _news_ID )  DESC";

  		$query = $this->db->query($sql);
      return $query->num_rows($sql);

    }

  	public function getNewsAll($limit, $start, $keyword){
  		$sql =  " SELECT * ".
              " ,(SELECT _gallery_news_img_Image FROM _gallery_news_img WHERE _gallery_news_img_GalleryID = _news_ID ORDER BY  IF(_gallery_news_img_Order > 0 , _gallery_news_img_Order , _gallery_news_img_ID )  DESC limit 1) AS _gallery_Image ".
              " FROM _news ".
              " WHERE _news_Status = 'Enable' ";
      if($keyword){
         $sql .= " AND (_news_Title like'%$keyword%' ";
         $sql .= " OR _news_Subject like'%$keyword%' )";
      }

  		$sql .= " ORDER BY  IF(_news_Order > 0 , _news_Order , _news_ID )  DESC limit $start,$limit";
  		#echo $sql;
      $query = $this->db->query($sql);
  		return $query->result_array();
    }


	public function getVdo(){
		$sql =  " SELECT * ".
				" FROM 	_vdo ".
				" WHERE _vdo_Status = 'Enable' ";
		$sql .= " ORDER BY  IF(_vdo_Order > 0 , _vdo_Order , _vdo_ID )  DESC ";
		#echo $sql;
		$query = $this->db->query($sql);
		return $query->result_array();
	}

	public function getVdoDetail($code){
		$sql =  " SELECT * ".
				" FROM 	_vdo ".
				" WHERE _vdo_Status = 'Enable' ".
				" AND _vdo_Code = '$code' ";
		$query = $this->db->query($sql);
		return $query->row_array();
	}


	public function getVdoHome(){

  		$sql =  " SELECT * ".
				" FROM 	_vdo_home ".
				" INNER JOIN _vdo ON  _vdo_ID = _vdo_home_VdoID ".
				" WHERE _vdo_Status = 'Enable' ";
  		$sql .= " ORDER BY _vdo_home_ID ASC ";
  		#echo $sql;
      	$query = $this->db->query($sql);
  		return $query->result_array();
	}
		

		public function getBanner(){
  		$sql =  " SELECT * ".
              " FROM 	_banner ".
							" WHERE _banner_Status = 'Enable' ";
  		$sql .= " ORDER BY  IF(_banner_Order > 0 , _banner_Order , _banner_ID )  DESC ";
  		#echo $sql;
      $query = $this->db->query($sql);
  		return $query->result_array();
    }


		public function UpdatePassword($user_id){

			$old_password = $this->db->escape_str($this->input->post('txt_OldPassword'));
			$new_password = $this->db->escape_str($this->input->post('txt_Password'));

			// check old password true
			$sql = " SELECT _register_ID ".
    			   " FROM _register ".
    			   " WHERE _register_Password = '".md5($old_password)."' ".
             " AND _register_ID = '$user_id' ";
  		$query 	= $this->db->query($sql);
			$data 	= $query->row_array();
			$_uid 	= $data['_register_ID'];

			if($user_id === $_uid){
				// update new password
				$tb 	= "_register";
				$now 	= date('Y-m-d H:i:s');

				$update_data = array(
					$tb.'_Password' 		=> md5($new_password),
					$tb.'_LastUpdate' 	=> $now
				);
				
				$status = $this->db->update($tb, $update_data, array($tb."_ID" => $user_id));
				return $status;

			}else{
				return false;
			}
			
		}



		public function paymentConfirmAdd(){

			if($this->db->escape_str($this->input->post('txt_FirstName')) != null){

					$config['upload_path'] 		= './uploads/';
					$config['allowed_types'] 	= 'gif|jpg|jpeg|png';
					$config['max_size']     	= '1000000KB';
					$this->upload->initialize($config);
					
					/* upload image */
					$_slip  = "";
					if($_FILES['txt_Slip']['name']){
						$this->upload->do_upload('txt_Slip');
						if(!$this->upload->display_errors()){
							$_slip	=	$this->upload->data('file_name');
						}else{
							//  echo $this->upload->display_errors();
							return $this->upload->display_errors();
						}
					}
					/* upload image */
					
					// $_slip = '';

					$tb 	= "_confirmpayment";
					$now 	= date('Y-m-d H:i:s');
					$data = array(
						$tb.'_ID' 					=> NULL,
						$tb.'_FirstName' 		=> $this->db->escape_str($this->input->post('txt_FirstName')),
						$tb.'_LastName' 		=> $this->db->escape_str($this->input->post('txt_LastName')),
						$tb.'_Phone' 		    => $this->db->escape_str($this->input->post('txt_Phone')),
						$tb.'_Email' 		    => $this->db->escape_str($this->input->post('txt_Email')),
						$tb.'_Bank' 		    => $this->db->escape_str($this->input->post('txt_Bank')),
						$tb.'_Date' 		    => $this->db->escape_str($this->input->post('txt_Date')),
						$tb.'_Time' 		    => $this->db->escape_str($this->input->post('txt_Time')),
						$tb.'_Money' 		    => $this->db->escape_str($this->input->post('txt_Money')),
						$tb.'_Slip' 		    => $_slip,
						$tb.'_Subject' 		  => $this->db->escape_str($this->input->post('txt_Subject')),

						$tb.'_CreateDate' 	=> $now,
						$tb.'_LastUpdate' 	=> $now,
						$tb.'_PrivateIP' 		=> $this->input->ip_address(),
						$tb.'_IP' 					=> $this->input->ip_address()
					);
					$data = $this->db->insert($tb, $data);
					$insert_id = $this->db->insert_id();

					$language	= $this->lang->lang();

					$to		= $this->email_to;
					$cc 	= $this->email_cc;

					$subject 	= "Payment Confirmation ".$this->db->escape_str($this->input->post('txt_FirstName'))." ".$this->db->escape_str($this->input->post('txt_LastName'));
					$data_email["id"] 	= $insert_id;
					$message 	= $this->load->view($language.'/email/email-payment',$data_email,TRUE);
					// echo $message;
					// $status_email = $this->sendEmail($to,$subject,$message,$cc);
					return $data;
					// return $data;
				}
		}



		public function resetPassword($email){
  		// get user id
  		$sql 		= " SELECT * FROM _register WHERE _register_Email = ? ";
			$binds 	= array($email);
			// echo $sql;
  		$query  = $this->db->query($sql, $binds);
  		$rs		  = $query->row_array();

  		// insert data to forgetpassword
  		$now 	     = date('Y-m-d H:i:s');
  		$tb		     = "_forgetpassword";
  		$_userID   = $rs["_register_ID"];
      if($_userID){
    		$_tokenID 	= $this->generate_token();
    		$data = array(
          $tb.'_ID' 						=> NULL,
          $tb.'_UserID' 				=> $_userID,
    			$tb.'_Token' 				  => $_tokenID,
    			$tb.'_Email' 					=> $email,

    		  $tb.'_CreateDate' 		=> $now,
    		  $tb.'_LastUpdate' 		=> $now,
    			$tb.'_PrivateIP' 			=> $this->input->ip_address(),
    			$tb.'_IP' 						=> $this->input->ip_address()
        );

    		if($this->db->insert($tb, $data)){

					$language		= $this->lang->lang();
    			$to				  = $email;
          $cc         = "";
    			$subject 		= "Reset password YOGIBO";

    			$data_email["link"] = site_url("register/token/".$_tokenID);
    			$message 	  = $this->load->view($language.'/email/email_forgetpassword',$data_email,TRUE);
    			$data 			= $this->sendEmail($to,$subject,$message,$cc);
    			return $data;
    		}
      }
  		else
  			return FALSE;
		}
		


		function generate_token($len = 32){
  		// Array of potential characters, shuffled.
  		$chars = array(
  			'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm',
  			'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z',
  			'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M',
  			'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z',
  			'0', '1', '2', '3', '4', '5', '6', '7', '8', '9'
  		);
  		shuffle($chars);
  		$num_chars = count($chars) - 1;
  		$token = '';
  		// Create random token at the specified length.
  		for ($i = 0; $i < $len; $i++){
  			$token .= $chars[mt_rand(0, $num_chars)];
  		}
  		return $token;
		}
		

		public function checkToken($token){
  		$sql 		= " SELECT * FROM _forgetpassword WHERE _forgetpassword_Token = ? AND _forgetpassword_Active = ? ";
  		$binds 	= array($token,0);
  		$query  = $this->db->query($sql, $binds);
  		return $query->row_array();
		}
		

		public function getNewPassword($token){
  		// get user id
  		$sql 		= " SELECT * FROM _forgetpassword WHERE _forgetpassword_Token = ? ";
  		$binds 	= array($token);
  		$query  = $this->db->query($sql, $binds);
  		$rs		  = $query->row_array();

  		// insert data to forgetpassword
  		$now 	  = date('Y-m-d H:i:s');
  		$tb		  = "_forgetpassword";

  		$id				= $rs["_forgetpassword_ID"];
  		$userID		= $rs["_forgetpassword_UserID"];
  		$email		= $rs["_forgetpassword_Email"];

  		$data = array(
  			$tb.'_Active' 				=> 1,
  			$tb.'_ActiveDate' 		=> $now,
  		  $tb.'_LastUpdate' 		=> $now
      );

  		$status = $this->db->update($tb, $data, array($tb."_ID" => $id));

  		 if($status){
					//update new password
					$tb		= "_register";
					$data = array(
						$tb.'_Password' 		=> md5($this->input->post('txt_Password')),
						$tb.'_LastUpdate' 	=> $now
					);
					return $this->db->update($tb, $data, array($tb."_ID" => $userID , $tb."_Email" => $email));
  		 }
		}


		public function get_ProductItems($session_id){
			// check sum shopping
			$sql_item = " SELECT * ".
									" FROM _carts_item ".
									" LEFT JOIN _product ON _product_ID = _carts_item_ProductID ".
									" WHERE _carts_item_SessionID = '$session_id' ";
			$query_item = $this->db->query($sql_item);
			return $query_item->result_array();
		}
		

		public function get_DeliverlyPrice($id){
			$_deliverly_price = 0;
			if($id != null){
				$sql = 	" SELECT * ".
								" FROM _product_delivery ".
								" WHERE _product_delivery_ID = '$id' ";
				$query 	= $this->db->query($sql);
				$data 	= $query->row_array();
				$_deliverly_price = $data['_product_delivery_Price'];
			}
			return $_deliverly_price;

		}


		public function addWishlist($id ,$user_id){

			// add wishlist
			$sql = " SELECT _product_wishlist_ID ".
    			   " FROM _product_wishlist ".
    			   " WHERE _product_wishlist_ProductID = '$id' ".
             " AND _product_wishlist_UserID = '$user_id' ";
  		$query 	= $this->db->query($sql);
			$data 	= $query->row_array();

			if(empty($data['_product_wishlist_ID'])){
				// update wishlist
				// $wishlist_id 	= ;
				$now 	= date('Y-m-d H:i:s');
  			$tb		= "_product_wishlist";
				$data = array(
          $tb.'_ID' 						=> NULL,
          $tb.'_UserID' 				=> $user_id,
    			$tb.'_ProductID' 			=> $id,

    		  $tb.'_CreateDate' 		=> $now,
    		  $tb.'_LastUpdate' 		=> $now,
    			$tb.'_PrivateIP' 			=> $this->input->ip_address(),
    			$tb.'_IP' 						=> $this->input->ip_address()
				);
				// print_r($data);
    		return $this->db->insert($tb, $data);
			}else{
				return true;
			}

		}
		

		public function url_space($title){
				return str_replace(" ","-",$title);
		}

		public function url_space_decode($title){
				return str_replace("-"," ",$title);
		}


	public function addMessage(){

      	$now 	= date('Y-m-d H:i:s');
		$tb		= "_message";
		$data = array(
			$tb.'_ID' 				=> NULL,
			$tb.'_UserID' 			=> $this->db->escape_str($this->input->post('txt_MessageUserID')),
			$tb.'_Email' 			=> $this->db->escape_str($this->input->post('txt_MessageEmail')),
			$tb.'_Message' 			=> $this->db->escape_str($this->input->post('txt_Message')),

			$tb.'_CreateDate' 		=> $now,
			$tb.'_LastUpdate' 		=> $now,
			$tb.'_PrivateIP' 		=> $this->input->ip_address(),
			$tb.'_IP' 				=> $this->input->ip_address()
		);
		// print_r($data);
		$data_save = $this->db->insert($tb, $data);
		$_id  = $this->db->insert_id();
		$data = $this->messageEmail($_id);
		return $data_save;
		
	}

	public function messageEmail($id){

		if($id){
			$language 	= $this->lang->lang();
			$to  = $this->email_to;
			$cc  = $this->email_cc;

			$subject = "Yogibothailand message";
			$data_email["id"] = $id;
			$message = $this->load->view("th/email/email-message",$data_email,TRUE);
			$data = $this->sendEmail($to,$subject,$message,$cc);
			return TRUE;
		}else{
			return FALSE;
		}

	}


	public function getMessage($id){
		$sql = " SELECT * FROM _message WHERE _message_ID = '$id' ";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
		

	public function getContactPointInfo(){
		$sql = " SELECT * FROM _contact_point ORDER BY _contact_point_ID DESC limit 1 ";
		$query = $this->db->query($sql);
		return $query->row_array();
	}
		

	public function saveContact(){

      $now 	= date('Y-m-d H:i:s');
			$tb		= "_contactus";
			$data = array(
				$tb.'_ID' 				=> NULL,
				$tb.'_UserID' 			=> $this->db->escape_str($this->input->post('txt_UserID')),
				$tb.'_Email' 			=> $this->db->escape_str($this->input->post('txt_contactEmail')),
				$tb.'_Subject' 			=> $this->db->escape_str($this->input->post('txt_contactMessage')),

				$tb.'_CreateDate' 		=> $now,
				$tb.'_LastUpdate' 		=> $now,
				$tb.'_PrivateIP' 		=> $this->input->ip_address(),
				$tb.'_IP' 				=> $this->input->ip_address()
			);
			// print_r($data);
			$this->db->insert($tb, $data);
			$_id  = $this->db->insert_id();
      $data = $this->contactEmail($_id);
      return $data;
		
		}

	public function saveContactBox(){

      	$now 	= date('Y-m-d H:i:s');
		$tb		= "_contactus";
		$data = array(
			$tb.'_ID' 					=> NULL,
			$tb.'_FirstName' 			=> $this->db->escape_str($this->input->post('contact_FirstName')),
			$tb.'_LastName' 			=> $this->db->escape_str($this->input->post('contact_LastName')),
			$tb.'_Phone' 				=> $this->db->escape_str($this->input->post('contact_Number')),
			$tb.'_Email' 				=> $this->db->escape_str($this->input->post('contact_Email')),
			$tb.'_Subject' 				=> $this->db->escape_str($this->input->post('contact_Message')),

			$tb.'_CreateDate' 			=> $now,
			$tb.'_LastUpdate' 			=> $now,
			$tb.'_PrivateIP' 			=> $this->input->ip_address(),
			$tb.'_IP' 					=> $this->input->ip_address()
		);

		// print_r($data);
		$data = $this->db->insert($tb, $data);
		$_id  = $this->db->insert_id();
		$data = $this->contactEmailBox($_id);
		return $data;
		
	}

	public function contactEmailBox($id){

		if($id){
			$language 	= $this->lang->lang();
			$to  = $this->email_to;
			$cc  = $this->email_cc;

			$subject = "Yogibothailand contact us";
			$data_email["id"] = $id;
			$message = $this->load->view("th/email/email-contact-box",$data_email,TRUE);
			$data = $this->sendEmail($to,$subject,$message,$cc);
			return TRUE;
		}else{
			return FALSE;
		}

	}


	public function saveSubscribe(){

		$now = date('Y-m-d H:i:s');
		$tb = "_enews";

		$_email = $this->db->escape_str($this->input->post('subscribe_Email'));

		$sql = " SELECT * " .
						" FROM " . $tb .
						" WHERE " . $tb . "_Email = '$_email' ";
		$query = $this->db->query($sql);
		$rs = $query->row_array($sql);
		
		if (empty($rs[$tb . '_ID'])) {

			$data = array(
				$tb . '_ID' 				=> null,
				$tb . '_FirstName' 	=> $this->db->escape_str($this->input->post('subscribe_FirstName')),
				$tb . '_LastName' 	=> $this->db->escape_str($this->input->post('subscribe_LastName')),
				$tb . '_Phone' 			=> $this->db->escape_str($this->input->post('subscribe_Phone')),
				$tb . '_Email' 			=> $this->db->escape_str($this->input->post('subscribe_Email')),

				$tb . '_CreateDate' => $now,
				$tb . '_LastUpdate' => $now,
				$tb . '_PrivateIP' 	=> $this->input->ip_address(),
				$tb . '_IP' 				=> $this->input->ip_address()
			);
				// print_r($data);
			$data = $this->db->insert($tb, $data);
				// $_id  = $this->db->insert_id();
				// $data = $this->contactEmail($_id);
			return $data;

		}else{
			return "HaveData";
		}

	}

	public function contactEmail($id){

		if($id){
			$language 	= $this->lang->lang();
			$to  = $this->email_to;
			$cc  = $this->email_cc;

			$subject = "YogiboThailand contact us";
			$data_email["id"] = $id;
			$message = $this->load->view($language."/email/email-contact",$data_email,TRUE);
			$data = $this->sendEmail($to,$subject,$message,$cc);
			return TRUE;
		}else{
			return FALSE;
		}

	}


	public function getBlogHome(){
		$sql = 	" SELECT * " .
				" ,(SELECT _gallery_blog_img_Image FROM _gallery_blog_img WHERE _gallery_blog_img_GalleryID = _blog_ID ORDER BY  IF(_gallery_blog_img_Order > 0 , _gallery_blog_img_Order , _gallery_blog_img_ID )  DESC limit 1) AS _gallery_Image " .
				" FROM _blog " .
				" WHERE _blog_Status = 'Enable' ";
		$sql .= " ORDER BY  IF(_blog_Order > 0 , _blog_Order , _blog_DateB )  DESC limit 1";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function getEventHome(){
		$sql = 	" SELECT * " .
				" ,(SELECT _gallery_event_img_Image FROM _gallery_event_img WHERE _gallery_event_img_GalleryID = _event_ID ORDER BY  IF(_gallery_event_img_Order > 0 , _gallery_event_img_Order , _gallery_event_img_ID )  DESC limit 1) AS _gallery_Image " .
				" FROM _event " .
				" WHERE _event_Status = 'Enable' ";
		$sql .= " ORDER BY  IF(_event_Order > 0 , _event_Order , _event_DateB )  DESC limit 1";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

	public function getBannerPromotion(){
		$date = date('Y-m-d');

		$sql = 	" SELECT * " .
				" FROM _banner_promotion " .
				" WHERE _banner_promotion_Status = 'Enable' ".
				" AND (_banner_promotion_DateB <= '$date' AND _banner_promotion_DateE >= '$date') ";
		// $sql .= " ORDER BY  IF(_banner_promotion_Order > 0 ,_banner_promotion_Order , _banner_promotion_DateB )  DESC limit 1";
		$query = $this->db->query($sql);
		return $query->row_array();
	}

}
?>
