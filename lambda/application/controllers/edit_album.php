<?php
class Edit_album extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('photos_model');
		$this->load->library('session');
	}
	
	public function index($type=FALSE)
	{
		if($this->session->userdata('logged_in'))
		{
			$session_data = $this->session->userdata('logged_in');
			$data['username'] = $session_data['username'];
			$data['albums'] = $this->photos_model->get_album();
			if ($type == "ajax") // load inline view for call from ajax
		        $this->load->view('admin/edit/album/album_list', $data);
		    else // load the default view
		        $this->load->view("admin/edit/album/view", $data);
		}
		else
		{
			//If no session, redirect to login page
			redirect('admin/login', 'refresh');
		}

	}
	
	/*
	*	Handles JSON returned from /js/uploadify/upload.php
	*/
	public function add_photos()
	{
		
		//Decode JSON returned by /js/uploadify/upload.php
		$file = $this->input->post('filearray');
		
		$file_json = json_decode($file);
		//var_dump($file_json);
		//echo "<br><br>";
		//echo "</br>";
		//echo $file_json->file_ext ."<?br>" .$file_json->file_name;
		$photo_names = str_replace($file_json->file_ext,"",$file_json->real_name);
		$server = $_SERVER['DOCUMENT_ROOT'];
		
		/*----------------------------	
		   image thumbnail creation		
		----------------------------*/
		ini_set("memory_limit","32M"); 
		
		$config['image_library'] = 'gd2';
		//$config['image_library'] = 'ImageMagick';
		$config['source_image']	= $server . PHOTO_FOLDER_PATH . $file_json->file_name;
		//$config['quality'] = 50;
		$config['create_thumb'] = TRUE;
		$config['maintain_ratio'] = TRUE;
		$config['width']	 = 220;
		$config['height']	 = 220;
	
		$this->load->library('image_lib', $config); 
		
		if ( ! $this->image_lib->resize())
		{
			echo "thumnail error: </br>";
		    echo $this->image_lib->display_errors('<p>', '</p>');
		}
		$this->image_lib->clear();
		
		/*----------------------------	
		   image Resize 		
		----------------------------*/
		/*$config['image_library'] = 'gd2';
		$config['source_image']	= $server . PHOTO_FOLDER_PATH. $file_json->file_name;
		$config['create_thumb'] = FALSE;
		$config['maintain_ratio'] = TRUE;
		$config['width']	 = 1000;
		$config['height']	 = 1000;
		$this->image_lib->initialize($config);

		
		if ( ! $this->image_lib->resize())
		{
			echo "resize error: </br>";
		    echo $this->image_lib->display_errors('<p>', '</p>');
		}*/


		/*--------------------------*/
		$data = array(
			'PNAME' => $photo_names,
			'PATH' => $file_json->file_name,
			'PAID' => $this->input->post('albumID'),
		);
		
		$this->photos_model->add_photos($data);
		
		
		//update photos in database
		$data['json'] = $file_json;
		
		$this->load->view('admin/edit/album/uploadify',$data);
	}
	
	/*-------------Album----------*/
	public function album_add()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('type', 'Type', 'required|integer|greater_than[-1]|less_than[2]');
		
		if ($this->form_validation->run())
		{
			$data = array(
				'NAME' => $_POST['name'],
				'DATE' => $_POST['date'],
				'PRIVATE' => $_POST['type']
			);
			$this->photos_model->add_album($data);
			$data['MSG']='Album Added';
			
		}else
        {
 			$data['MSG']=validation_errors(' ', ' ');
        }   

        echo json_encode($data);
	}
	public function album_del()
	{
		$paid = $_POST['paid'];
		$photo_list = $this->photos_model->get_album_photos($paid);
		$this->photos_model->delete_album($paid, $photo_list);
		$data['MSG']='Album Deleted';
		echo json_encode($data);
	}
	
	public function get_album_edit()
	{
		$paid = $_POST['paid'];
		$data['album_info'] = $this->photos_model->get_album_by_id($paid);
		echo json_encode($data['album_info'][0]);
	}
	
	public function album_edit()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
		$this->form_validation->set_rules('date', 'Date', 'required');
		$this->form_validation->set_rules('type', 'Type', 'required|integer|greater_than[-1]|less_than[2]');
		
		if ($this->form_validation->run())
		{
			$data = array(
				'NAME' => $_POST['name'],
				'DATE' => $_POST['date'],
				'PRIVATE' => $_POST['type']
			);
			$this->photos_model->edit_album($_POST['paid'],$data);
			$data['MSG']='Album Updated';
			
		}else
        {
 			$data['MSG']=validation_errors(' ', ' ');
        }   

        echo json_encode($data);
	}
	
	
	/*-------------PHOTOS----------*/
	
	public function get_album_photos($paid)
	{
		//$paid = $_POST['paid'];
		$data['album_pics'] = $this->photos_model->get_album_photos($paid);
		$this->load->view("admin/edit/album/photo_list", $data);
	}
	
	public function photo_rename()
	{
		$this->load->library('form_validation');
		$this->form_validation->set_rules('name', 'Name', 'required');
		
		if ($this->form_validation->run())
		{
			$data = array(
				'PNAME' => ($_POST['name']),
			);
			$pid = $_POST['pid'];
			$this->photos_model->photo_rename($pid,$data);
			$data['MSG']='Photo Renamed';
			
		}else
        {
 			$data['MSG']=validation_errors(' ', ' ');
        }   

        echo json_encode($data);
	}
	
	public function photo_del()
	{
		$pid = $_POST['pid'];
		$photo = $this->photos_model->get_photo($pid);
		$this->photos_model->del_photo($pid, $photo);
		$data['MSG']='Photo Deleted';
		echo json_encode($data);
	}
	
	
	
}
/* End of File /application/controllers/upload.php */