<?php


class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}
	
	public function index()
	{
		$data['title'] = "La Lambdas";
		$this->load->view("home/index",$data);
	
	}
}
