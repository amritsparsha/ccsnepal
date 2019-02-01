<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_model extends CI_Model {

    public function check_user($username, $password)
    {
        $this->db->where('employer_email', $username)->where('password', $password)->where('active_status','Y')->where('delete_status','0');
        $row = $this->db->get('tbl_company_employers')->row_array();
        return $row;
    }

    public function get_admin_user_name($user_id)
    {
        $this->db->select('username');
        $row = $this->db->where('user_id', $user_id)->get('igc_users')->row_array();
        return $row;
    }


    public function update_info($date , $admin_id)
    {
        $update['last_login'] = $date;
        $this->db->where('come_id', $admin_id);
        $this->db->update('tbl_company_employers', $update);
        return TRUE;
    }

    public function get_activation_detail($code)
    {
        $this->db->where('activation_code', $code);
        $this->db->where('employer_type','Register');
        $this->db->where('active_status','N');
        $result = $this->db->get('tbl_company_employers')->row_array();
        return $result;
    }
    public function check_email_exist($str)
    {
        $this->db->where('employer_email',"$str")->where('active_status','Y');
        $row = $this->db->get('tbl_company_employers')->row_array();
        return $row;
    }







}