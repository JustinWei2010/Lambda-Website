<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start();
class Edit_events extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('events_model');
		$this->load->library('session');
	}
	
	public function index($eid=FALSE)
	{
		if($this->session->userdata('logged_in'))
		{
			//don't know why $data['username'] = $session_data['username']; doesn't work
			$data['username'] = $this->session->userdata('username');
			$data['events'] = $this->events_model->get_events($eid);
			$data['title'] = 'Events';
		
			//$this->format($data['events']);
			
			if ($eid == "ajax") // load inline view for call from ajax
		        $this->load->view('admin/edit/events/event_list', $data);
		    else // load the default view
		        $this->load->view("admin/edit/events/edit", $data);
		}
		else
		{	
			//If no session, redirect to login page
			redirect('admin/login', 'refresh');
		}
	}
	
	public function add()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('event', 'Event Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('date', 'Date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('start', 'Start Time', 'trim|xss_clean');
		$this->form_validation->set_rules('end', 'End Time', 'trim|xss_clean');
		$this->form_validation->set_rules('location', 'Location', 'trim|required|xss_clean');
			
		if ($this->form_validation->run())
		{
			$data = array(
				'NAME' => strtoupper($_POST['event']),
				'DATE' => $_POST['date'],
				'START' => $_POST['start'],
				'END' => $_POST['end'],
				'PLACE' => $_POST['location']
			);
			
			$this->events_model->add_event($data);
			$data['MSG']='Event Added';	
		}
		else
		{
			$data['MSG']=validation_errors(' ', ' ');
		}
		echo json_encode($data);
	}
	
	public function edit()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('event', 'Event Name', 'trim|required|xss_clean');
		$this->form_validation->set_rules('date', 'Date', 'trim|required|xss_clean');
		$this->form_validation->set_rules('start', 'Start Time', 'trim|xss_clean');
		$this->form_validation->set_rules('end', 'End Time', 'trim|xss_clean');
		$this->form_validation->set_rules('location', 'Location', 'trim|required|xss_clean');
		
		if ($this->form_validation->run())
		{
			$data = array(
				'NAME' => strtoupper($_POST['event']),
				'DATE' => $_POST['date'],
				'START' => $_POST['start'],
				'END' => $_POST['end'],
				'PLACE' => $_POST['location']
			);
			
			$this->events_model->edit_event($data);
			$data['MSG']='Event Edited';	
		}
		else
		{
			$data['MSG']=validation_errors(' ', ' ');
		}
		echo json_encode($data);
	}
	
	public function delete()
	{
		$eid = $_POST['eid'];
		$this->events_model->delete_event($eid);
		$data['MSG']='Event Deleted';
		echo json_encode($data);
	}
	
	public function attendance($eid)
	{
		$data['attendance'] = $this->events_model->get_attendance($eid);
		$this->load->view('admin/edit/events/attendance', $data);
	}
	
	public function edit_attendance()
	{
		$data = array(
			'EID' => $_POST['eid'],
			'UID' => $_POST['uid'],
			'STATUS' => $_POST['status']
		);
		$this->events_model->edit_attendance($data);
	}
	
	//format info from events to display
	private function format(&$events)
	{
		foreach ($events as &$event)
		{
			$date = $event['DATE'];
			$stime = $event['START'];
			$etime = $event['END'];
			
			//date
			if(substr($date, 5, 1) == '0')
			{
				$event['DATE'] = substr($date, 6, 1) . '/' . substr($date, 8);
			}
			else
			{
				$event['DATE'] = substr($date, 5, 2) . '/' . substr($date, 8);
			}
			
			//start time
			if(substr($stime, 0, 1) == '0')
			{
				$event['START'] = substr($stime, 1, 4);
			}
			else
			{
				$event['START'] = substr($stime, 0, 5);
			}
			
			//end time
			if(substr($etime, 0, 1) == '0')
			{
				$event['END'] = substr($etime, 1, 4);
			}
			else
			{
				$event['END'] = substr($etime, 0, 5);
			}
		}
	}
}