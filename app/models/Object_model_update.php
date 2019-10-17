<?php

function changeformatDate($date,$lang){
	if($lang=="en"){
		$System_Config_MonthName_Short 		= array("","Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec");
		
		$text = explode("-",$date);
		
		$_date = $System_Config_MonthName_Short[intval($text[1])].", ".$text[2].", ".$text[0];
		
		
	}else{
		$System_Config_MonthName_Short 		= array("","ม.ค.","ก.พ.","มี.ค.","เม.ย.","พ.ค.","มิ.ย.","ก.ค.","ส.ค.","ก.ย.","ต.ค.","พ.ย.","ธ.ค.");
		
		$text = explode("-",$date);
		$_date = $text[2]." ".$System_Config_MonthName_Short[intval($text[1])]." ".(intval($text[0])+543);
		
	}
	
	return $_date;
}


class Object_model_update extends CI_Model {

public function getStore($typeID=null){
      $sql = " SELECT * ".
    			   " FROM _store ".
    			   " WHERE _store_Status = 'Enable' ";
      if($typeID){
        $sql .= " AND _store_TypeID = '$typeID' ";
      }
    	$sql .=	" ORDER BY  IF(_store_Order > 0 , _store_Order , _store_ID )  DESC ";
      // echo $sql;
      $query = $this->db->query($sql);
      return $query->result_array();
    }
		


public function getEvent(){
      $sql = " SELECT * ".
		   " ,(SELECT _gallery_event_img_Image FROM _gallery_event_img WHERE _gallery_event_img_GalleryID = _event_ID ORDER BY  IF(_gallery_event_img_Order > 0 , _gallery_event_img_Order , _gallery_event_img_ID )  DESC limit 1) AS _gallery_Image ".
    			   " FROM _event ".
    			   " WHERE _event_Status = 'Enable' ";
      
    	$sql .=	" ORDER BY  IF(_event_Order > 0 , _event_Order , _event_DateB )  DESC ";
      // echo $sql;
      $query = $this->db->query($sql);
      return $query->result_array();
    }
		

public function getEventView($id){
      $sql = " SELECT * ".
    			   " FROM _event ".
    			   " WHERE _event_Status = 'Enable' ".
             " AND _event_ID = '$id' ";
  		$query = $this->db->query($sql);
      return $query->row_array($sql);
    }

    public function getImageEventView($id){
      $sql = " SELECT * ".
    			   " FROM _gallery_event_img ".
    			   " WHERE _gallery_event_img_GalleryID = '$id' ".
    			   " ORDER BY  IF(_gallery_event_img_Order > 0 , _gallery_event_img_Order , _gallery_event_img_ID )  DESC ";
      $query = $this->db->query($sql);
      return $query->result_array();
		}	
	
	
	
public function getBlog(){
      $sql = " SELECT * ".
		   " ,(SELECT _gallery_blog_img_Image FROM _gallery_blog_img WHERE _gallery_blog_img_GalleryID = _blog_ID ORDER BY  IF(_gallery_blog_img_Order > 0 , _gallery_blog_img_Order , _gallery_blog_img_ID )  DESC limit 1) AS _gallery_Image ".
    			   " FROM _blog ".
    			   " WHERE _blog_Status = 'Enable' ";
      
    	$sql .=	" ORDER BY  IF(_blog_Order > 0 , _blog_Order , _blog_DateB )  DESC ";
      // echo $sql;
      $query = $this->db->query($sql);
      return $query->result_array();
    }
		

public function getBlogView($id){
      $sql = " SELECT * ".
    			   " FROM _blog ".
    			   " WHERE _blog_Status = 'Enable' ".
             " AND _blog_ID = '$id' ";
  		$query = $this->db->query($sql);
      return $query->row_array($sql);
    }

    public function getImageBlogView($id){
      $sql = " SELECT * ".
    			   " FROM _gallery_blog_img ".
    			   " WHERE _gallery_blog_img_GalleryID = '$id' ".
    			   " ORDER BY  IF(_gallery_blog_img_Order > 0 , _gallery_blog_img_Order , _gallery_blog_img_ID )  DESC ";
      $query = $this->db->query($sql);
      return $query->result_array();
		}	
	
	
}

	
	
	



?>
