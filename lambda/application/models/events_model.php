<?php
class Events_model extends CI_Model{

	public function __construct()
	{
		$this->load->database();
	}
	
	public function get_events($eid)
	{
		if($eid == FALSE || $eid == "ajax")
		{
			$sql = "SELECT EID, NAME, DATE, START, END, PLACE
			FROM EVENTS 
			ORDER BY DATE DESC";
			$query = $this->db->query($sql);
		}
		else
		{
			$sql = "SELECT EID, NAME, DATE, START, END, PLACE
				FROM EVENTS 
				WHERE EID =?
				LIMIT 1";
			$query = $this->db->query($sql,array($eid));
		}
		return $query->result_array();
	}
	
	public function add_event($data)
	{
		$this->db->insert('EVENTS', $data);
		$this->add_attendance($this->db->insert_id());
	}

	public function edit_event($data)
	{
		$this->db->where('EID',$this->input->post('eid'));
  		$this->db->update('EVENTS',$data); 
	}
	
	public function delete_event($eid)
	{
		$this->delete_attendance($eid);
		$this->db->delete('EVENTS', array('EID' => $eid));
	}
	
	public function get_attendance($eid)
	{
		$sql = "SELECT A.UID, A.STATUS, B.FIRST_NAME, B.LAST_NAME, C.CLASS 
		FROM ATTENDANCE A
		JOIN BROTHERS B
			ON A.UID = B.BROID
		JOIN CLASS C
			ON B.CLASSID = C.CLASSID
		WHERE A.EID =" . $eid . "
		ORDER BY C.YEAR ASC, FIELD(C.SEASON, 'Spring', 'Winter', 'Fall'), B.LAST_NAME, B.FIRST_NAME";
		$query = $this->db->query($sql);
		return $query->result_array();
	}
	
	private function add_attendance($eid)
	{
		$sql = "SELECT BROID
			FROM BROTHERS 
			WHERE ACTIVE=1
			ORDER BY CLASSID DESC";
		$query = $this->db->query($sql);
		$brothers = $query->result_array();
		
		foreach ($brothers as $brother)
		{
			$data = array(
				'EID' => $eid,
				'UID' => $brother['BROID'],
				'STATUS' => 3
			);
			$this->db->insert('ATTENDANCE', $data);
		}
	}
	
	public function edit_attendance($data)
	{
		$this->db->where('UID',$this->input->post('uid'));
		$this->db->where('EID',$this->input->post('eid'));
  		$this->db->update('ATTENDANCE',$data); 
	}
	
	private function delete_attendance($eid)
	{
		$this->db->delete('ATTENDANCE', array('EID' => $eid));
	}
}