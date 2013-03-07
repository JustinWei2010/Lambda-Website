<?php

class Areas_model extends Model
{
	public function __construct()
	{
		parent::__construct();
		
		//make access to database
		$this->load_database();
	}
	
	public function test()
	{
		echo "this is testing";
	}
	public function get_brother($page = 0)
	{
	
		$sql = "SELECT * FROM BROTHERS";
		$query = $this->db->query($sql);
		var_dump($query->result_array());	
		
	}
}