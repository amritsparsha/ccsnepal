<?php

class Site_users_uploaded_cv_model extends CI_Model
{
	public function get_legal_uploaded_cv()
	{
		$this->db->where('delete_status','0')->where('publish_status','1');
		$this->db->where('customer_id IS NOT NULL',NULL,false);

		return $this->db->get('tbl_cust_uploaded_cv')->result_array();
	}
}