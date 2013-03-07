<?php

class Trenches_model extends Model
{
	public function __construct()
	{
		parent::__construct();
		$this->DB= load_class("DB", 'database');
	}
	
	//default method
	public function index()
	{

	}
	public function test(){
		echo "this is testing";
	}

}