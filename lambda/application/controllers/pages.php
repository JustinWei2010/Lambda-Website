<?php

class Pages extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function brothers($subpage="brothers")
	{
		if($subpage == "brothers")
		{
			$this->load->model('brothers_model');
			$data['active_house'] = $this->brothers_model->get_active_house();
			$data['cabinet'] = $this->brothers_model->get_cabinet();
			$data['eboard'] = $this->brothers_model->get_eboard();
			$data['classes'] = $this->brothers_model->get_classes();
			$data['title'] = "Brothers";
			$this->load->view("brothers/brothers", $data);
		}else if($subpage =="chapters"){
			$this->load->model('chapters_model');
			$data['chapters'] = $this->chapters_model->get_chapters();
			$data['associate'] = $this->chapters_model->get_associate();
			$data['colony'] = $this->chapters_model->get_colony();
			$data['title']="Chapters";
			$this->load->view("brothers/chapters",$data);
		}
	}

	public function legacy($subpage="alumni")
	{
		if($subpage == "alumni")
		{
			$data['title'] = "Alumni";
			$this->load->view("Legacy/alumni", $data);
		}else if($subpage == "photos")
		{
			$data['title'] = "Photos";
			$this->load->view("Legacy/photos",$data);
		}else if($subpage == "album_list_ajax")
		{
			$this->load->model('photos_model');
			$data['album'] =$this->photos_model->get_view_album();
			
			$this->load->view("Legacy/view_album_list",$data);
			
		}else if($subpage == "photo_list_ajax")
		{
			$paid = $this->input->post('paid');

			$this->load->model('photos_model');
			$data['photos'] = $this->photos_model->get_view_photos($paid);
			$this->load->view("Legacy/view_photo_list",$data);
		
		}
		
	}
	
	public function news($nid=NULL)
	{
		$this->load->model('news_model');
		if($nid==NULL)
		{
			$n = $this->news_model->get_news(FALSE);
			
		
			$data['title'] = "News";
	
			foreach($n as & $nn){
				//$nn['CONTENT']= substr(preg_replace('#(<img) (.*)(\>)#i', '', $nn['CONTENT']),0,300);
				$nn['CONTENT'] = substr(strip_tags($nn['CONTENT']),0,300);

			}
			$data['news']=$n;
			$this->load->view("news/all_news_view", $data);
		}else{
			$n = $this->news_model->get_news($nid);
			
			$data['title'] = 'NEWS - '.$n[0]['TITLE'];
			$n[0]['CONTENT'] = preg_replace('#(<img src="upload_gallery)#i', '<img src="http://lalambdas.com/upload_gallery', $n[0]['CONTENT']);
			$data['news']=$n;
			//print_r($n);
			$this->load->view("news/single_news_view", $data);
		}
	}
	
	public function define($subpage="about")
	{
		$data['title'] = ucfirst($subpage);
		$this->load->view("define/$subpage", $data);
	}
	public function rush($subpage="rush")
	{
		if($subpage == "rush")
		{
			$data['title'] = "Rush";
			$this->load->view("rush/rush", $data);
		}else if($subpage == "lil_sis_rush")
		{
			$data['title'] = "Little Sis Rush";
			$this->load->view("rush/lil_sis_rush",$data);
		}
		
	}

}