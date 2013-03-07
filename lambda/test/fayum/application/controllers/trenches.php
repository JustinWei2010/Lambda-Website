<?php

class Trenches extends Controller
{
	public function __construct()
	{
		parent::__construct();

	}
	
	//default method
	public function index()
	{
		$this->view();
	}
	public function view()
	{
		$data['title']		  = 'Egyptology Field Database - Trenches';
		$data['current_mode'] = 'view';
		$data['current_page'] = 'trenches';
		$data['links'] 		  = array('home','areas','trenches','units','finds','c14data','images','GPS');
		$data['all_wrap_append']  ='';
		
		$this->load->viewFile('template/header',$data);
		$this->load->viewFile('template/footer');
	}
	
	
}
