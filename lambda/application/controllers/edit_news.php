<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Edit_news extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('news_model');
		$this->load->library('session');
	}
	function index($nid=FALSE)
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['news'] = $this->news_model->get_news($nid);
			$data['title'] = "News";
		
			if ($nid == "ajax") // load inline view for call from ajax
		        $this->load->view('admin/edit/news/edit_news_list', $data);
		    else // load the default view
		        $this->load->view("admin/edit/news/edit", $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('admin/login', 'refresh');
		}
	}
	
	public function display()
	{

		
	}
	
	/*Ajax methods*/
	public function add()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('location', 'Location', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');
		
		if ($this->form_validation->run())
		{
			$data = array(
				'TITLE' => strtoupper($_POST['title']),
				'DATE' => $_POST['date'],
				'LOCATION' => $_POST['location'],
				'CONTENT' => $_POST['content'],
				'PRIVATE' => 0,
				'NPID' => 0
			);
			$this->news_model->add_news($data);
			$data['MSG']='News Added';
			
		}else
        {
 			$data['MSG']=validation_errors(' ', ' ');
        }   

        echo json_encode($data);
	}
	
	public function update()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('title', 'Title', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('location', 'Location', 'required');
		$this->form_validation->set_rules('content', 'Content', 'required');
		
		if ($this->form_validation->run())
		{
			$data = array(
				'TITLE' => strtoupper($_POST['title']),
				'DATE' => $_POST['date'],
				'LOCATION' => $_POST['location'],
				'CONTENT' => $_POST['content'],
				'PRIVATE' => 0,
				'NPID' => 0
			);
			$this->news_model->update_news($data);
			$data['MSG']='News Updated';
			
		}else
        {
 			$data['MSG']=validation_errors(' ', ' ');
        }   

        echo json_encode($data);
	}
	
	public function delete()
	{
		$nid = $_POST['nid'];
		$this->news_model->delete_news($nid);
		$data['MSG']='News Deleted';
		echo json_encode($data);
	}


}



