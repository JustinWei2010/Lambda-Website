<?php
class Chapters_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function get_chapters()
	{
		$sql = "SELECT C.LETTER, C.SCHOOL, C.LINK
				FROM CHAPTERS C
				WHERE C.TYPEID=?";
		$query = $this->db->query($sql,array(1));
		return $query->result_array();
	}
	public function get_associate()
	{
		$sql = "SELECT C.LETTER, C.SCHOOL, C.LINK
				FROM CHAPTERS C
				WHERE C.TYPEID=?";
		$query = $this->db->query($sql,array(2));
		return $query->result_array();
	}
	public function get_colony()
	{
		$sql = "SELECT C.LETTER, C.SCHOOL, C.LINK
				FROM CHAPTERS C
				WHERE C.TYPEID=?";
		$query = $this->db->query($sql,array(3));
		return $query->result_array();
	}
	
}

