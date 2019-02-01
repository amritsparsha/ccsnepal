<?php 

class Todo_model extends CI_Model
{
	public function get_my_todo()
	{
		$user=$this->session->userdata('admin_id');
		$date=date('Y-m-d:H:i:s');
		$sql=$this->db->query("
				SELECT * FROM `igc_todo`
				WHERE `delete_status`='0' AND `publish_status`='1' AND `assign_by`='$user' 
				AND (`assign_date` > '$date' OR `todo_status` != '2') 
				ORDER BY `assign_date` DESC
			");
		$result=$sql->result_array();
		return $result;
	}
	public function get_my_todo_today()
	{
		$user=$this->session->userdata('admin_id');
		$date=date('Y-m-d');
		$sql=$this->db->query("
				SELECT * FROM `igc_todo`
				WHERE `delete_status`='0' AND `publish_status`='1' AND `assign_by`='$user' 
				AND `assign_date`='$date' AND `todo_status` != '2' 
				ORDER BY `assign_date` DESC
			");
		$result=$sql->result_array();
		return $result;
	}
	public function get_my_todo_completed()
	{
		$user=$this->session->userdata('admin_id');
		$date=date('Y-m-d');
		$sql=$this->db->query("
				SELECT * FROM `igc_todo`
				WHERE `delete_status`='0' AND `publish_status`='1' AND `assign_by`='$user' AND `todo_status` = '2' 
				ORDER BY `assign_date` DESC
			");
		$result=$sql->result_array();
		return $result;
	}
	public function get_my_todo_upcomings()
	{
		$user=$this->session->userdata('admin_id');
		$date=date('Y-m-d');
		$sql=$this->db->query("
				SELECT * FROM `igc_todo`
				WHERE `delete_status`='0' AND `publish_status`='1' AND `assign_by`='$user' AND `assign_date`>'$date' AND `todo_status` != '2'  
				ORDER BY `assign_date` ASC
			");
		$result=$sql->result_array();
		return $result;
	}
	public function get_my_todo_pending()
	{
		$user=$this->session->userdata('admin_id');
		$date=date('Y-m-d');
		$sql=$this->db->query("
				SELECT * FROM `igc_todo`
				WHERE `delete_status`='0' AND `publish_status`='1' AND `assign_by`='$user' AND `assign_date`<'$date' AND `todo_status` != '2'  
				ORDER BY `assign_date` ASC
			");
		$result=$sql->result_array();
		return $result;
	}
	public function countdown_date($date)
    {
        $date1=date_create($date);
		$date2=date_create(date('Y-m-d'));
		$diff=date_diff($date2,$date1);

        $day = $diff->format("%a");
        $day .= " Days";
        if($day == 1)
        {
        	$day="Tomorrow";
        }
        

        return $day;
    }
}