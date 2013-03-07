<?php

class Test extends Controller
{

	public function __construct()
	{
		parent::__construct();
		//$this->load->session('fayum_auth');
	}
	
	//default method
	public function index()
	{
		//$this->view();
		//$data['title']= 'Egyptology Field Database - Home';
		//$data['mode'] = 'view';
		$this->load->view("areas");
	}
	
	public function view()
	{
		$data['title']= 'Egyptology Field Database - Home';
		$data['mode'] = 'view';
		$this->load->view("template/header",$data);
		
	}
}
