<?php
class Brothers_model extends CI_Model {

	public function __construct()
	{
		$this->load->database();
	}
	public function get_active_house()
	{
		$sql = "SELECT B.FIRST_NAME,B.LAST_NAME, BP.PATH, B.PRIVATE, B.HOME_TOWN, B.MAJOR, B.DETAIL, B.BROID, C.SYMBOL, C.CLASS, C.YEAR, C.SEASON
				FROM CLASS C
				JOIN CURRENT_HOUSE CH 
					ON C.CLASSID = CH.CLASSID
				LEFT JOIN BROTHERS B 
					ON C.CLASSID = B.CLASSID
				LEFT JOIN BROTHERS_PHOTO BP 
					ON B.BPID = BP.BPID
				WHERE B.PRIVATE=0 
		
				ORDER BY C.YEAR DESC , FIELD( C.SEASON, 'Fall', 'Spring', 'Winter' ), B.LAST_NAME, B.FIRST_NAME";
		$query = $this->db->query($sql);
		$result = array();
		$temp = array();
		$class ="";
		foreach($query->result_array() as $r)
		{
			if($class!=$r['CLASS'])
			{
				$class = $r['CLASS'];
				
				if($temp) $result[]=$temp;
				$temp=array();
				$temp[]=$r;
			}else
			{
				$temp[]=$r;
			}
		
		}
		$result[]=$temp;
		return array_reverse($result);
	}
	public function get_brother($broid)
	{
		$sql = "SELECT B.FIRST_NAME,B.LAST_NAME, BP.PATH,B.HOME_TOWN, B.MAJOR, B.DETAIL, B.EMAIL
				FROM  BROTHERS B
				LEFT JOIN BROTHERS_PHOTO BP
				ON B.BPID=BP.BPID
				WHERE BROID =?";
		$query = $this->db->query($sql,array($broid));
		return $query->result_array();
	}
	public function get_cabinet()
	{
		$sql = "SELECT B.BROID, B.PRIVATE, B.FIRST_NAME,B.LAST_NAME, CC.TITLE
				FROM CURRENT_CABINET CC
				JOIN BROTHERS B ON CC.BROID = B.BROID
				WHERE B.PRIVATE=0
				ORDER BY CC.CABINET_ID";
		$query = $this->db->query($sql);
		return $query->result_array();	
	}
	public function get_eboard()
	{
		$sql = "SELECT B.BROID, B.FIRST_NAME,B.LAST_NAME, CE.TITLE
				FROM CURRENT_EBOARD CE
				JOIN BROTHERS B ON CE.BROID = B.BROID
				ORDER BY CE.EBOARD_ID";
		$query = $this->db->query($sql);
		return $query->result_array();	
	
	}
	public function get_classes()
	{
		$sql = "SELECT CLASS, SYMBOL, YEAR, SEASON
				FROM CLASS
				ORDER BY YEAR DESC, FIELD(SEASON,'Fall','Spring','Winter')";
		$query = $this->db->query($sql);
		return $query->result_array();	
	
	}
	public function get_chapters()
	{
		
	}

}
