<?php


class Login extends Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->session('fayum_auth');
	}
	
	//default method
	public function index()
	{
		//default login mode = view
		if(!isset($_GET['mode']) || ($_GET['mode']!='view' && $_GET['mode']!='input' && $_GET['mode']!='admin'))
		{
			header( 'Location: ?controller=login&mode=view' ) ;		
		}
		$login_mode = $_GET['mode'];
		
		//check if the user is already loggined in
		if($this->fayum_auth->authenticate($login_mode)){
			header( 'Location: ?controller=home&method='.$login_mode ) ;
		}
		$data['title']= 'Egyptology Field Database - Login';
		$data['mode'] = $login_mode;
		
		/*debug purpose*/
		$this->fayum_auth->show_session();
		echo "<pre>";
		var_dump($_POST);
		echo "</pre>";
		/*End debug output*/
		$this->load->viewFile("login", $data);
	}
	public function logout()
	{

		$this->fayum_auth->clear_session();
		//redirct to login page
		header( 'Location: ?controller=login&mode=view' ) ;
	}
	
	//process login forms
	public function validate()
	{
		//if login mode is not set
		if(!isset($_GET['mode']) || ($_GET['mode']!='view' && $_GET['mode']!='input' && $_GET['mode']!='admin'))
		{
			header( 'Location: ?controller=login&mode=view' ) ;		
		}
		$login_mode = $_GET['mode'];

		//if no POST data, redirect to login page
		if(!isset($_POST['password']))
		{
			header( 'Location: ?controller=login') ;
		}
		
		//validate login
		$pw = $_POST['password'];
		$success = false;
		//var_dump($pw);
		//echo PASSWORD_INPUT;
		switch($login_mode)
		{
			case 'view':
				$success = ($pw == PASSWORD_VIEW);
				if($success)
				{
					$this->fayum_auth->set_authentication(AUTH_VIEW);
				}
				break;
			case 'input':
				$success = ($pw == PASSWORD_INPUT);
				if($success)
				{
					$this->fayum_auth->set_authentication(AUTH_INPUT);
				}
				break;
			case 'admin':
				$success = ($pw == PASSWORD_ADMIN);
				if($success)
				{
					$this->fayum_auth->set_authentication(AUTH_ADMIN);
				}
				break;				
		}
		
		//login correctly, redirect to home page
		if($success)
		{
			header( 'Location: ?controller=home&method='.$login_mode);
		//else redirect to login
		}else{
			header( 'Location: ?controller=login&mode='.$login_mode ) ;
		}
		
	}
	
	
	
}
