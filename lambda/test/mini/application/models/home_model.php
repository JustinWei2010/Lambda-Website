<?php

class Home_model extends Model
{
	public function __construct()
	{
		parent::__construct();
		//load database	
	}
	
	public function test()
	{
		
	}
	public function get_date()
	{
		$date = date("F j, Y, g:i a"); 
		return $date;
	}
	

}