<?php

class Home extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->session('fayum_auth');

	}
	
	//default method
	public function index()
	{
		$this->view();
		
	}
	
	public function view()
	{
		if(!$this->fayum_auth->authenticate('view'))
		{
			header( 'Location: ?controller=login' ) ;
		}
		$data['title']		  = 'Egyptology Field Database - Home';
		$data['current_mode'] = 'view';
		$data['current_page'] = 'home';
		$data['links'] 		  = array('home','areas','trenches','units','finds','c14data','images','GPS');
		$data['all_wrap_append']  ='';
		$this->fayum_auth->show_session();
		$this->load->viewFile('template/header',$data);
		
		//variables for main view 
		$main['options'] = array('areas', 'trenches', 'units', 'finds','c14_data', 'images', 'GPS');
		$main['reports'] = array('testr1', 'testr2', 'testr3');

		$main['current_mode'] = 'view';
		$this->load->viewFile('home', $main);
		$this->load->viewFile('template/footer');
	
	}
	public function input()
	{
		if(!$this->fayum_auth->authenticate('input'))
		{
			header( 'Location: ?controller=login&mode=input' ) ;
		}
		$data['title']		  = 'Egyptology Field Database - Home';
		$data['current_mode'] = 'input';
		$data['current_page'] = 'home';
		$data['links'] 		  = array('home','areas','trenches','units','finds','c14data','images','GPS');

		$data['all_wrap_append']  ='';
		$this->fayum_auth->show_session();
		$this->load->viewFile('template/header',$data);
		
		//variables for main view 
		$main['options'] = array('areas', 'trenches', 'units', 'finds','c14_data', 'images', 'GPS');
		$main['reports'] = array('testr1', 'testr2', 'testr3');
		$main['current_mode'] = 'input';
		$this->load->viewFile('home', $main);
		$this->load->viewFile('template/footer');
	
	}
	public function admin()
	{
		if(!$this->fayum_auth->authenticate('admin'))
		{
			header( 'Location: ?controller=login&mode=admin' ) ;
		}
		$data['title']		  = 'Egyptology Field Database - Home';
		$data['current_mode'] = 'admin';
		$data['current_page'] = 'home';
		$data['links'] 		  = array('home','areas','trenches','units','finds','c14data','images','GPS');

		$data['all_wrap_append']  ='';
		$this->fayum_auth->show_session();
		$this->load->viewFile('template/header',$data);
		
		//variables for main view 
		$main['options'] = array('areas', 'trenches', 'units', 'finds','c14_data', 'images', 'GPS');
		$main['reports'] = array('testr1', 'testr2', 'testr3');
		$main['current_mode'] = 'admin';
		$this->load->viewFile('home', $main);
		$this->load->viewFile('template/footer');
	
	}
	
	
	
}
