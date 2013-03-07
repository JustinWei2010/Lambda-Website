<?php
class Users_model extends CI_Model {

	public function __construct()
	{
		//$this->load->database();
	}
	
	function login($username, $password)
	{
		$this -> db -> select('UID, USERNAME, PASSWORD');
		$this -> db -> from('USERS');
		$this -> db -> where('USERNAME = ' . "'" . $username . "'");
		$this -> db -> where('PASSWORD = ' . "'" . sha1($password) . "'");
		$this -> db -> limit(1);
		
		$query = $this -> db -> get();
		if($query -> num_rows() == 1)
		{
			return $query->result();
		}
		else
		{
			return false;
		}
	}
}