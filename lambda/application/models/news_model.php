<?php
class News_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function get_news($nid)
	{
		if ($nid == FALSE || $nid == "ajax")
		{
			$sql = "SELECT NID, TITLE, LOCATION, CONTENT, DATE
					FROM NEWS ORDER BY DATE DESC";
			//$query = $this->db->get('NEWS');
			$query = $this->db->query($sql);
			return $query->result_array();
		}else{
			$sql = "SELECT NID, TITLE, LOCATION,CONTENT,DATE
				FROM NEWS 
				WHERE NID =?
				LIMIT 1";
			$query = $this->db->query($sql,array($nid));
		}
		//$news = $query->row_array();
		return $query->result_array();
	}
	
	public function add_news($data){
		$this->db->insert('NEWS', $data);
	}
	public function update_news($data){
		$this->db->where('NID',$this->input->post('nid'));
  		$this->db->update('NEWS',$data); 
	}
	public function delete_news($nid){
		$this->db->delete('NEWS', array('NID' => $nid));
	}

}
