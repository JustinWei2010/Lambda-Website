<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Admin extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->library('session');
	}
	function index()
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$this->load->view('admin/home_view', $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('admin/login', 'refresh');
		}
	}
	
	public function login()
	{
  	   $this->load->view('admin/login_view');
	}
	
	function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect('admin', 'refresh');
	}

}