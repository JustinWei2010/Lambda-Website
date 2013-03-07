<?php

class Areas extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model("areas_model");

	}
	
	//default method
	public function index()
	{
		$this->view();
	}
	public function view()
	{
		$data['title']		  = 'Egyptology Field Database - Areas';
		$data['current_mode'] = 'view';
		$data['current_page'] = 'areas';
		$data['links'] 		  = array('home','areas','trenches','units','finds','c14data','images','GPS');
		$data['all_wrap_append']  ='';
		
		$this->load->viewFile('template/header',$data);
		
		$this->areas_model->test();
		$this->load->viewFile('template/footer');
	}
	
	
}
