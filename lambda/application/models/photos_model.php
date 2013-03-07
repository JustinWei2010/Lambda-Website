<?php
class Photos_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_album()
	{
		$sql = "SELECT NAME, PAID, PRIVATE
				FROM PHOTOS_ALBUM ORDER BY DATE DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function get_album_by_id($paid)
	{
		$sql = "SELECT NAME, DATE, PRIVATE,PAID
				FROM PHOTOS_ALBUM 
				WHERE PAID =?";
		$query = $this->db->query($sql,array($paid));
		return $query->result_array();
	}

	
	public function add_album($data){
		$this->db->insert('PHOTOS_ALBUM', $data);
	}
	
	public function edit_album($paid,$data)
	{
		$this->db->where('PAID',$paid);
  		$this->db->update('PHOTOS_ALBUM',$data); 
	}

	public function get_album_photos($paid)
	{
		$sql = "SELECT PID, PNAME, PATH
				FROM PHOTOS 
				WHERE PAID =?";
		$query = $this->db->query($sql,array($paid));
		return $query->result_array();
	}
	
	public function delete_album($paid, $photo_list){
		$this->db->delete('PHOTOS_ALBUM', array('PAID' => $paid));
		
		//also delete all the pictures in the album
		$server_path = $_SERVER['DOCUMENT_ROOT'];
		$rel_path =PHOTO_FOLDER_PATH;
		foreach ($photo_list as $p)
		{	
			$path =$server_path . $rel_path . $p['PATH'];
			
			//delete thumbnail
			$ext = "." . pathinfo($path, PATHINFO_EXTENSION);
			
			$thumb = str_replace($ext, "_thumb".$ext ,$path);
			
			if (file_exists($thumb)) 
			{ 
        		unlink($thumb); 
       		}
       		
       		//delete originial picture
       		if (file_exists($path)) 
			{ 
        		unlink($path); 
       		}

		}
		$this->db->delete('PHOTOS', array('PAID' => $paid));
	}
	
	public function get_photo($pid)
	{
		$sql = "SELECT PID, PNAME, PATH
				FROM PHOTOS 
				WHERE PID =?";
		$query = $this->db->query($sql,array($pid));
		return $query->result_array();
	}
	
	public function add_photos($data)
	{
		$this->db->insert('PHOTOS', $data);
	}
	
	public function del_photo($pid, $photo){
		$this->db->delete('PHOTOS', array('PID' => $pid));
		
		$server_path = $_SERVER['DOCUMENT_ROOT'];
		$rel_path =PHOTO_FOLDER_PATH;
		
		$path =$server_path . $rel_path . $photo[0]['PATH'];
			
		//delete thumbnail
		$ext = "." . pathinfo($path, PATHINFO_EXTENSION);
		
		$thumb = str_replace($ext, "_thumb".$ext ,$path);
		
		if (file_exists($thumb)) 
		{ 
    		unlink($thumb); 
   		}
   		
   		//delete originial picture
   		if (file_exists($path)) 
		{ 
    		unlink($path); 
   		}

	}
	public function photo_rename($pid,$data)
	{
		$this->db->where('PID',$pid);
  		$this->db->update('PHOTOS',$data); 
	}

	/*------------------------------------
	
	Model functions for viewing photos
	
	------------------------------------*/
	public function get_view_album()
	{
		$sql = "SELECT PA.PAID, PA.NAME, PA.DATE, P.PATH
				FROM PHOTOS_ALBUM PA
				LEFT JOIN PHOTOS P ON PA.PAID = P.PAID
				WHERE PA.PRIVATE =0
				GROUP BY PA.PAID
				ORDER BY PA.DATE DESC";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	public function get_view_photos($paid)
	{
		$sql = "SELECT PID, PNAME, PATH
				FROM PHOTOS 
				WHERE PAID =?";
		$query = $this->db->query($sql,array($paid));
		return $query->result_array();
	}
}